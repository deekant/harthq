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
 * Register ACF options page (footer, future shared menus).
 */
function harthq_acf_options_page() {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}

	acf_add_options_page(
		array(
			'page_title' => 'HartHQ Site Options',
			'menu_title' => 'Site Options',
			'menu_slug'  => 'harthq-site-options',
			'capability' => 'manage_options',
			'redirect'   => false,
			'position'   => 61,
			'icon_url'   => 'dashicons-admin-generic',
		)
	);
}
add_action( 'acf/init', 'harthq_acf_options_page' );

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

/**
 * Seed homepage heartbeat-section ACF values once.
 *
 * Repeater defaults from local JSON may not hydrate reliably on existing posts,
 * so we write initial repeater rows directly to the front page when empty.
 */
function harthq_seed_homepage_heartbeat_acf_once() {
	if ( ! is_admin() || ! function_exists( 'update_field' ) ) {
		return;
	}

	if ( get_option( 'harthq_heartbeat_acf_seeded_v1' ) ) {
		return;
	}

	$front_page_id = (int) get_option( 'page_on_front' );
	if ( ! $front_page_id ) {
		return;
	}

	$heartbeat_dimensions = array(
		array(
			'label'             => 'Capacity',
			'score'             => 82,
			'bar_width_percent' => 82,
			'bar_background'    => 'linear-gradient(90deg,var(--teal-mid),var(--teal))',
			'score_color'       => '',
		),
		array(
			'label'             => 'Revenue integrity',
			'score'             => 65,
			'bar_width_percent' => 65,
			'bar_background'    => 'linear-gradient(90deg,var(--purple-light),var(--purple))',
			'score_color'       => '',
		),
		array(
			'label'             => 'Conversion',
			'score'             => 71,
			'bar_width_percent' => 71,
			'bar_background'    => 'linear-gradient(90deg,var(--teal-light),var(--teal-mid))',
			'score_color'       => '',
		),
		array(
			'label'             => 'Retention',
			'score'             => 40,
			'bar_width_percent' => 40,
			'bar_background'    => 'linear-gradient(90deg,#f5a0a0,#e05555)',
			'score_color'       => '#f5a0a0',
		),
		array(
			'label'             => 'Efficiency',
			'score'             => 78,
			'bar_width_percent' => 78,
			'bar_background'    => 'linear-gradient(90deg,var(--teal-mid),var(--teal))',
			'score_color'       => '',
		),
	);

	$heartbeat_visual_dimensions = array(
		array(
			'dot_color'     => 'var(--teal-mid)',
			'name'          => 'Capacity utilisation',
			'percent_text'  => '82%',
			'percent_color' => '',
		),
		array(
			'dot_color'     => 'var(--purple-light)',
			'name'          => 'Revenue integrity',
			'percent_text'  => '65%',
			'percent_color' => '',
		),
		array(
			'dot_color'     => 'var(--teal-light)',
			'name'          => 'Enquiry conversion',
			'percent_text'  => '71%',
			'percent_color' => '',
		),
		array(
			'dot_color'     => '#e05555',
			'name'          => 'Client retention',
			'percent_text'  => '40% ⚠️',
			'percent_color' => '#f5a0a0',
		),
		array(
			'dot_color'     => 'var(--teal-mid)',
			'name'          => 'Operational efficiency',
			'percent_text'  => '78%',
			'percent_color' => '',
		),
	);

	$heartbeat_visual = array(
		'title'              => 'Practice Health Report',
		'badge'              => 'Sample',
		'score_value'        => 67,
		'overall_score_line' => 'Overall HartBeat score - <strong>Needs attention</strong>',
		'dimensions'         => $heartbeat_visual_dimensions,
	);

	$existing_dimensions = get_field( 'heartbeat_dimensions', $front_page_id );
	$existing_visual     = get_field( 'heartbeat_visual', $front_page_id );
	$existing_visual_rows = is_array( $existing_visual ) && ! empty( $existing_visual['dimensions'] )
		? $existing_visual['dimensions']
		: array();

	if ( ! empty( $existing_dimensions ) || ! empty( $existing_visual_rows ) ) {
		update_option( 'harthq_heartbeat_acf_seeded_v1', 1, false );
		return;
	}

	update_field( 'field_harthq_heartbeat_dimensions', $heartbeat_dimensions, $front_page_id );
	update_field( 'field_harthq_heartbeat_visual', $heartbeat_visual, $front_page_id );

	update_option( 'harthq_heartbeat_acf_seeded_v1', 1, false );
}
add_action( 'admin_init', 'harthq_seed_homepage_heartbeat_acf_once' );

/**
 * Seed homepage testimonials-section ACF values once.
 *
 * Local JSON repeater defaults are not always applied to existing posts, so
 * this writes initial testimonial rows directly when the field is empty.
 */
function harthq_seed_homepage_testimonials_acf_once() {
	if ( ! is_admin() || ! function_exists( 'update_field' ) ) {
		return;
	}

	if ( get_option( 'harthq_testimonials_acf_seeded_v1' ) ) {
		return;
	}

	$front_page_id = (int) get_option( 'page_on_front' );
	if ( ! $front_page_id ) {
		return;
	}

	$testimonials_items = array(
		array(
			'quote_text'     => "Hart is excellent! I have worked with them for years and most of my clients are from them. I don't like to do marketing and it's an expensive business, so I allocate my marketing budget in my accounts to them because I get a steady stream of work. The booking service is excellent. They book straight into Google Calendar and you can sync that with whatever you're using presently.",
			'author_initial' => 'K',
			'author_name'    => 'Kathrine',
			'author_role'    => 'Psychologist · Perth, WA',
		),
		array(
			'quote_text'     => 'As a Hart Associate, I have been extremely well supported in my professional practice through a responsible and client-focused referral process. The Reception/Administration team at Hart also make communication an absolute pleasure and navigate the complexities of scheduling with grace and efficiency. Their understanding and attention to detail is integral in enhancing my ability to focus on my role as therapist.',
			'author_initial' => 'A',
			'author_name'    => 'Anita',
			'author_role'    => 'Psychologist · Camberwell, VIC',
		),
		array(
			'quote_text'     => "I have been with Hart for several years now and can't speak more highly of the service. The Hart Centre admin staff are amazing, always working for the best interests of the client and the associates. They are efficient, friendly and always willing to help with any issues that may arise.",
			'author_initial' => 'S',
			'author_name'    => 'Sanja',
			'author_role'    => 'Psychologist · Hampton, VIC',
		),
	);

	$existing_testimonials = get_field( 'testimonials_items', $front_page_id );
	if ( ! empty( $existing_testimonials ) ) {
		update_option( 'harthq_testimonials_acf_seeded_v1', 1, false );
		return;
	}

	update_field( 'field_harthq_testimonials_items', $testimonials_items, $front_page_id );
	update_option( 'harthq_testimonials_acf_seeded_v1', 1, false );
}
add_action( 'admin_init', 'harthq_seed_homepage_testimonials_acf_once' );
