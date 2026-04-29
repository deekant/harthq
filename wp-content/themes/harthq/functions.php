<?php
/**
 * Theme bootstrap and asset loading.
 */

function harthq_enqueue_assets() {
	$style_map = array(
		'homepage' => is_front_page(),
		'about' => is_page_template( 'about.php' ),
		'heartbeat' => is_page_template( 'heartbeat.php' ),
		'privacy' => is_page_template( 'privacy.php' ),
	);

	foreach ( $style_map as $slug => $should_load ) {
		if ( ! $should_load ) {
			continue;
		}

		$rel = '/assets/css/' . $slug . '.css';
		$path = get_template_directory() . $rel;
		if ( file_exists( $path ) ) {
			wp_enqueue_style(
				'harthq-' . $slug,
				get_template_directory_uri() . $rel,
				array(),
				filemtime( $path )
			);
		}
	}

	$main_js_path = get_template_directory() . '/assets/js/main.js';
	if ( file_exists( $main_js_path ) ) {
		wp_enqueue_script(
			'harthq-main',
			get_template_directory_uri() . '/assets/js/main.js',
			array(),
			filemtime( $main_js_path ),
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'harthq_enqueue_assets' );

/**
 * Save ACF JSON in the theme's acf-json directory.
 *
 * @param string $path Existing save path.
 * @return string
 */
function harthq_acf_json_save_point( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'harthq_acf_json_save_point' );

/**
 * Load ACF JSON from the theme's acf-json directory.
 *
 * @param array $paths Existing load paths.
 * @return array
 */
function harthq_acf_json_load_point( $paths ) {
	// Remove default plugin path so theme JSON is authoritative.
	unset( $paths[0] );

	$paths[] = get_stylesheet_directory() . '/acf-json';

	return $paths;
}
add_filter( 'acf/settings/load_json', 'harthq_acf_json_load_point' );

/**
 * Seed homepage about-section ACF values once.
 *
 * This helper runs one time in admin, writes initial values for
 * proof bar items and problem quotes, then sets a lock option.
 */
function harthq_seed_homepage_about_acf_once() {
	if ( ! is_admin() || ! function_exists( 'update_field' ) ) {
		return;
	}

	if ( get_option( 'harthq_about_acf_seeded_v1' ) ) {
		return;
	}

	$front_page_id = (int) get_option( 'page_on_front' );
	if ( ! $front_page_id ) {
		return;
	}

	$proof_items = array(
		array(
			'text' => 'Registered psychologists & counsellors only',
		),
		array(
			'text' => 'AHPRA, APS, PACFA aware',
		),
		array(
			'text' => 'No lock-in, cancel anytime',
		),
		array(
			'text' => 'Built by the team behind The Hart Centre',
		),
		array(
			'text' => 'Australia-based support team',
		),
	);

	$problem_quotes = array(
		array(
			'quote_text' => "\"I don't have a work-life balance problem. I have an admin problem that looks like a work-life balance problem.\"",
		),
		array(
			'quote_text' => "\"Every hour on admin is an hour I could have billed. You don't always do that maths, but when you do it's uncomfortable.\"",
		),
		array(
			'quote_text' => "\"I'm essentially paying myself \$30 an hour to do admin I hate, instead of \$150 an hour to do work I love.\"",
		),
		array(
			'quote_text' => "\"I went part-time because I was burning out - but half of it wasn't the clients, it was everything around the clients.\"",
		),
		array(
			'quote_text' => "\"The admin doesn't stay in its lane, it bleeds into everything. I'm thinking about a referral letter while I'm trying to be present with a client.\"",
		),
	);

	$seed_payload = array(
		'proof_bar'       => array(
			'items'         => $proof_items,
			'show_dividers' => 1,
		),
		'problem_section' => array(
			'tag'       => 'The real problem',
			'heading'   => "You didn't train for <em>six years</em> to spend your afternoons on admin.",
			'body_text' => "Most practitioners running private practices are losing 7-13 hours a week to tasks that have nothing to do with clinical work. Chasing cancellations. Updating notes. Following up missed appointments. Trying to figure out why referrals dried up.",
			'cta'       => array(
				'label' => 'See what HartHQ does →',
				'url'   => '#services',
			),
			'quotes'    => $problem_quotes,
		),
	);

	// Seed only if fields are currently empty, to avoid overriding manual edits.
	$existing_about_data = get_field( 'proof_bar', $front_page_id );
	$existing_problem    = get_field( 'problem_section', $front_page_id );
	if ( ! empty( $existing_about_data ) || ! empty( $existing_problem ) ) {
		update_option( 'harthq_about_acf_seeded_v1', 1, false );
		return;
	}

	update_field( 'field_harthq_proof_bar_group', $seed_payload['proof_bar'], $front_page_id );
	update_field( 'field_harthq_problem_section_group', $seed_payload['problem_section'], $front_page_id );

	update_option( 'harthq_about_acf_seeded_v1', 1, false );
}
add_action( 'admin_init', 'harthq_seed_homepage_about_acf_once' );
