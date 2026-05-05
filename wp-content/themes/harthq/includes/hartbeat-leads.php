<?php
/**
 * HartBeat results email capture: CPT in admin + AJAX capture + admin email.
 *
 * @package HartHQ
 */

declare(strict_types=1);

const HARTHQ_LEAD_NONCE_ACTION = 'hartbeat_lead';
const HARTHQ_LEAD_POST_TYPE    = 'hartbeat_lead';
const HARTHQ_LEAD_NOTIFY_EMAIL = 'kantalinsky.dima@gmail.com';

/**
 * Register CPT for captured HartBeat emails (admin list only).
 */
function harthq_register_hartbeat_lead_post_type(): void {
	register_post_type(
		HARTHQ_LEAD_POST_TYPE,
		array(
			'labels'              => array(
				'name'          => __( 'HartBeat leads', 'harthq' ),
				'singular_name' => __( 'HartBeat lead', 'harthq' ),
				'menu_name'     => __( 'HartBeat leads', 'harthq' ),
				'add_new'       => __( 'Add lead', 'harthq' ),
				'add_new_item'  => __( 'Add new lead', 'harthq' ),
				'edit_item'     => __( 'Edit lead', 'harthq' ),
				'view_item'     => __( 'View lead', 'harthq' ),
				'search_items'  => __( 'Search leads', 'harthq' ),
				'not_found'     => __( 'No leads found', 'harthq' ),
			),
			'public'              => false,
			'publicly_queryable'  => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-email-alt',
			'menu_position'       => 26,
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'hierarchical'        => false,
			'supports'            => array( 'title', 'editor' ),
			'has_archive'         => false,
			'rewrite'             => false,
			'can_export'          => true,
		)
	);
}
add_action( 'init', 'harthq_register_hartbeat_lead_post_type' );

/**
 * Localize script with AJAX URL + nonce on HartBeat template.
 */
function harthq_localize_hartbeat_lead_script(): void {
	if ( ! is_page_template( 'heartbeat.php' ) ) {
		return;
	}
	if ( ! wp_script_is( 'harthq-main', 'enqueued' ) ) {
		return;
	}
	wp_localize_script(
		'harthq-main',
		'harthqHeartBeatLead',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( HARTHQ_LEAD_NONCE_ACTION ),
			'action'  => 'hartbeat_submit_lead',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'harthq_localize_hartbeat_lead_script', 25 );

/**
 * AJAX: save email + score summary as a lead post, notify HQ.
 */
function harthq_ajax_hartbeat_submit_lead(): void {
	check_ajax_referer( HARTHQ_LEAD_NONCE_ACTION, 'nonce' );

	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( (string) $_POST['email'] ) ) : '';
	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => __( 'Invalid email.', 'harthq' ) ), 400 );
	}

	$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( (string) $_SERVER['REMOTE_ADDR'] ) ) : '';
	if ( $ip !== '' ) {
		$key   = 'harthq_hb_lead_' . md5( $ip );
		$count = (int) get_transient( $key );
		if ( $count >= 15 ) {
			wp_send_json_error( array( 'message' => __( 'Too many requests. Try again later.', 'harthq' ) ), 429 );
		}
		set_transient( $key, $count + 1, HOUR_IN_SECONDS );
	}

	$score       = isset( $_POST['score'] ) ? sanitize_text_field( wp_unslash( (string) $_POST['score'] ) ) : '';
	$band        = isset( $_POST['band'] ) ? sanitize_text_field( wp_unslash( (string) $_POST['band'] ) ) : '';
	$dimensions  = isset( $_POST['dimensions'] ) ? sanitize_textarea_field( wp_unslash( (string) $_POST['dimensions'] ) ) : '';

	$body_lines = array(
		__( 'HartBeat score', 'harthq' ) . ': ' . $score,
		__( 'Band', 'harthq' ) . ': ' . $band,
		'',
		__( 'Score by dimension', 'harthq' ) . ':',
		$dimensions,
	);
	$content = implode( "\n", $body_lines );

	$admins    = get_users(
		array(
			'role'   => 'administrator',
			'number' => 1,
			'fields' => 'ID',
		)
	);
	$author_id = ! empty( $admins ) ? (int) $admins[0] : 1;

	$post_id = wp_insert_post(
		array(
			'post_type'    => HARTHQ_LEAD_POST_TYPE,
			'post_status'  => 'publish',
			'post_title'   => $email,
			'post_content' => $content,
			'post_author'  => $author_id,
		),
		true
	);

	if ( is_wp_error( $post_id ) || ! $post_id ) {
		wp_send_json_error( array( 'message' => __( 'Could not save. Please try again.', 'harthq' ) ), 500 );
	}

	$edit_link = admin_url( 'post.php?post=' . (int) $post_id . '&action=edit' );
	$mail_subj = sprintf(
		/* translators: %s: submitter email */
		__( '[HartHQ] New HartBeat lead: %s', 'harthq' ),
		$email
	);
	$mail_body = implode(
		"\n",
		array(
			__( 'A visitor submitted their email from the HartBeat results modal.', 'harthq' ),
			'',
			__( 'Email', 'harthq' ) . ': ' . $email,
			__( 'Score', 'harthq' ) . ': ' . $score,
			__( 'Band', 'harthq' ) . ': ' . $band,
			'',
			__( 'Dimensions', 'harthq' ) . ":\n" . $dimensions,
			'',
			__( 'View in WordPress:', 'harthq' ) . ' ' . $edit_link,
			'',
			'— HartHQ',
		)
	);

	$sent = wp_mail(
		HARTHQ_LEAD_NOTIFY_EMAIL,
		$mail_subj,
		$mail_body,
		array( 'Content-Type: text/plain; charset=UTF-8' )
	);

	if ( ! $sent && defined( 'WP_DEBUG' ) && WP_DEBUG && defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) {
		error_log( 'harthq_hartbeat_lead: wp_mail failed (check SMTP / local mail). Recipient: ' . HARTHQ_LEAD_NOTIFY_EMAIL );
	}

	wp_send_json_success( array( 'post_id' => (int) $post_id ) );
}
add_action( 'wp_ajax_hartbeat_submit_lead', 'harthq_ajax_hartbeat_submit_lead' );
add_action( 'wp_ajax_nopriv_hartbeat_submit_lead', 'harthq_ajax_hartbeat_submit_lead' );
