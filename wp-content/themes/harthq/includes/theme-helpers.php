<?php
/**
 * Nav, privacy TOC, and HartBeat URL helpers.
 *
 * @package HartHQ
 */

declare(strict_types=1);

/**
 * Second parameter for get_field() / update_field() for HartHQ site-wide ACF fields.
 *
 * ACF stores options in wp_options; this must be the literal `option`, not the WP admin
 * menu slug (`site-settings` in acf-json location rules).
 */
function harthq_acf_site_settings_id(): string {
	return 'option';
}

/**
 * Escape a HartBeat CTA href (hash or URL).
 */
function harthq_heartbeat_esc_link_href( string $url ): string {
	$url = trim( $url );
	if ( $url === '' ) {
		return '#';
	}
	if ( strpos( $url, '#' ) === 0 ) {
		return esc_attr( $url );
	}

	return esc_url( $url );
}

/**
 * Resolve a nav or CTA URL for output (home-relative anchors, paths, absolute URLs).
 */
function harthq_resolve_nav_menu_item_href( string $url ): string {
	$url = trim( $url );
	if ( $url === '' ) {
		return '#';
	}
	if ( strpos( $url, '#' ) === 0 ) {
		return esc_url( home_url( '/' ) . ltrim( $url, '/' ) );
	}
	if ( preg_match( '#^https?://#i', $url ) ) {
		return esc_url( $url );
	}

	return esc_url( home_url( $url ) );
}

/**
 * @param string $url   Raw URL from ACF.
 * @param string $label Unused; kept for call-site compatibility.
 */
function harthq_resolve_nav_cta_href( string $url, string $label = '' ): string {
	unset( $label );
	$url = trim( $url );
	if ( $url === '' ) {
		return '#';
	}

	return harthq_resolve_nav_menu_item_href( $url );
}

function harthq_nav_uses_homepage_menu(): bool {
	return is_front_page();
}

function harthq_resolve_nav_logo_text(): string {
	$opt = harthq_acf_site_settings_id();
	if ( is_front_page() ) {
		$v = function_exists( 'get_field' ) ? get_field( 'homepage_menu_logo', $opt ) : null;
	} else {
		$v = function_exists( 'get_field' ) ? get_field( 'logo_text', $opt ) : null;
	}

	return is_string( $v ) && trim( $v ) !== '' ? $v : 'Hart<em>HQ</em>';
}

/**
 * @return array<int, array<string, mixed>>
 */
function harthq_get_nav_links_for_header(): array {
	$opt = harthq_acf_site_settings_id();
	if ( is_front_page() ) {
		$items = function_exists( 'get_field' ) ? get_field( 'homepage_menu_items', $opt ) : null;
	} else {
		$items = function_exists( 'get_field' ) ? get_field( 'nav_links', $opt ) : null;
	}

	return is_array( $items ) ? $items : array();
}

/**
 * @return array<string, mixed>
 */
function harthq_get_nav_cta_for_header(): array {
	$opt = harthq_acf_site_settings_id();
	if ( ! function_exists( 'get_field' ) ) {
		return array();
	}

	if ( is_front_page() ) {
		$cta = get_field( 'homepage_menu_cta', $opt );
		return is_array( $cta ) ? $cta : array();
	}

	$cta = get_field( 'nav_cta', $opt );
	return is_array( $cta ) ? $cta : array();
}

function harthq_nav_item_is_current( string $url ): bool {
	$url = trim( $url );
	if ( $url === '' ) {
		return false;
	}
	if ( str_starts_with( $url, '#' ) ) {
		return is_front_page();
	}

	$resolved = harthq_resolve_nav_menu_item_href( $url );
	if ( is_singular() ) {
		$here = get_permalink();
	} else {
		$here = home_url( add_query_arg( array() ) );
	}
	if ( ! is_string( $here ) || $here === '' ) {
		return false;
	}

	return untrailingslashit( strtolower( $resolved ) ) === untrailingslashit( strtolower( $here ) );
}

/**
 * Extract H2 headings for policy TOC and ensure each H2 has a unique id.
 *
 * @param string $html Policy main column HTML.
 * @return array{items: array<int, array{id: string, label: string}>, html: string}
 */
function harthq_policy_h2_nav_from_html( string $html ): array {
	$items    = array();
	$used_ids = array();

	if ( trim( $html ) === '' ) {
		return array(
			'items' => $items,
			'html'  => $html,
		);
	}

	$out = preg_replace_callback(
		'/<h2\s*([^>]*)>(.*?)<\/h2>/is',
		static function ( array $m ) use ( &$items, &$used_ids ): string {
			$attrs = trim( $m[1] );
			$inner = $m[2];
			$label = trim( wp_strip_all_tags( $inner ) );
			$slug  = sanitize_title( $label );
			$base  = $slug;
			$i     = 2;
			while ( in_array( $slug, $used_ids, true ) ) {
				$slug = $base . '-' . $i;
				++$i;
			}
			$used_ids[] = $slug;
			$items[]    = array(
				'id'    => $slug,
				'label' => $label,
			);

			if ( preg_match( '/\bid\s*=/i', $attrs ) ) {
				return '<h2 ' . $attrs . '>' . $inner . '</h2>';
			}

			$gap = ( $attrs !== '' ) ? ' ' : '';

			return '<h2 id="' . esc_attr( $slug ) . '"' . $gap . $attrs . '>' . $inner . '</h2>';
		},
		$html
	);

	return array(
		'items' => $items,
		'html'  => is_string( $out ) ? $out : $html,
	);
}

/**
 * Restore page template assignments when metadata is missing.
 */
function harthq_ensure_page_templates(): void {
	if ( ! is_admin() ) {
		return;
	}

	$template_map = array(
		'about'          => 'about.php',
		'heartbeat'      => 'heartbeat.php',
		'privacy-policy' => 'privacy.php',
		'privacy'        => 'privacy.php',
	);

	foreach ( $template_map as $path => $template_file ) {
		$page = get_page_by_path( $path, OBJECT, 'page' );
		if ( ! ( $page instanceof WP_Post ) ) {
			continue;
		}

		$current = get_page_template_slug( $page->ID );
		if ( $current !== $template_file ) {
			update_post_meta( $page->ID, '_wp_page_template', $template_file );
		}
	}
}
add_action( 'admin_init', 'harthq_ensure_page_templates' );
