<?php
/**
 * Theme bootstrap and asset loading.
 */

function harthq_enqueue_assets() {
	$chrome_rel  = '/style.css';
	$chrome_path = get_template_directory() . $chrome_rel;
	$chrome_deps = array();

	if ( file_exists( $chrome_path ) ) {
		wp_enqueue_style(
			'harthq-site-chrome',
			get_template_directory_uri() . $chrome_rel,
			array(),
			filemtime( $chrome_path )
		);
		$chrome_deps = array( 'harthq-site-chrome' );
	}

	$style_map = array(
		'homepage'  => is_front_page(),
		'about'     => is_page_template( 'about.php' ),
		'heartbeat' => is_page_template( 'heartbeat.php' ),
		'privacy'   => is_page_template( 'privacy.php' ),
		'404'       => is_404(),
	);

	foreach ( $style_map as $slug => $should_load ) {
		if ( ! $should_load ) {
			continue;
		}

		$rel  = '/assets/css/' . $slug . '.css';
		$path = get_template_directory() . $rel;
		if ( file_exists( $path ) ) {
			wp_enqueue_style(
				'harthq-' . $slug,
				get_template_directory_uri() . $rel,
				$chrome_deps,
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

require_once get_template_directory() . '/includes/theme-helpers.php';
require_once get_template_directory() . '/includes/hartbeat-leads.php';

// Site-wide options (footer, menus): ACF options page menu slug `site-settings`; use get_field( $name, 'option' ) to read.
