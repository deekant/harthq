<?php
/**
 * Shared site header: Hart heart sprite + primary nav.
 * Front page: ACF homepage_menu_*.
 * Other templates: Menu tab (full URLs, relative URLs, and anchors supported).
 *
 * @package HartHQ
 */

$site_logo_text         = harthq_resolve_nav_logo_text();
$site_logo_text_allowed = array(
	'em'   => array(),
	'span' => array( 'class' => true ),
);
$site_nav_items = harthq_get_nav_links_for_header();
$site_nav_cta   = harthq_get_nav_cta_for_header();
$nav_cta_label   = (string) ( $site_nav_cta['label'] ?? '' );
$nav_cta_url     = (string) ( $site_nav_cta['url'] ?? '' );
$nav_cta_new_tab = ! empty( $site_nav_cta['open_new_tab'] );
$nav_cta_target  = $nav_cta_new_tab ? ' target="_blank" rel="noopener noreferrer"' : '';
$nav_cta_href    = harthq_resolve_nav_cta_href( $nav_cta_url, $nav_cta_label );

// Inner pages: full Menu tab (nav_links). Default to HartBeat + About only if repeater is empty.
if ( ! harthq_nav_uses_homepage_menu() ) {
	$valid_nav_items = array();
	foreach ( $site_nav_items as $menu_item ) {
		if ( ! is_array( $menu_item ) ) {
			continue;
		}
		$row_label = trim( (string) ( $menu_item['label'] ?? '' ) );
		$row_url   = trim( (string) ( $menu_item['url'] ?? '' ) );
		if ( $row_label === '' || $row_url === '' ) {
			continue;
		}
		$valid_nav_items[] = $menu_item;
	}

	if ( $valid_nav_items !== array() ) {
		$site_nav_items = $valid_nav_items;
	} else {
		$site_nav_items = array(
			array(
				'label' => 'HartBeat Score',
				'url'   => '/heartbeat/',
			),
			array(
				'label' => 'About',
				'url'   => '/about/',
			),
		);
	}
}
?>
<!-- Shared Hart Centre heart mark - exact official paths -->
<svg width="0" height="0" style="position:absolute">
	<defs>
		<symbol id="hart-heart" viewBox="0 0 204 226" xmlns="http://www.w3.org/2000/svg">
			<path fill="currentColor" d="M184.5,153.88c-3.5.61-18.27,3.02-38,4.02,2.53-3.92,4.74-8.05,6.58-12.37,14.03-32.9,15.95-94.39-17.63-122.62-33.6-28.21-59.36,1.23-60.73,21.78-1.39,20.55,11.65,43.33,11.65,43.33-19.33-2.76-65.79-3.15-68.32,31.51-2.45,33.52,40.1,48.16,83.73,49.92,6,.25,11.84.21,17.45-.05-20.34,25.16-49.38,39.52-55.95,42.57-.74.34-1.04,1.23-.66,1.95h0c.34.65,1.12.95,1.8.68,30.53-11.95,57.46-26.59,74.83-47,23.55-3.19,40.76-9.25,45.92-11.21.81-.31,1.11-1.31.59-2.01h0c-.3-.4-.79-.6-1.28-.52ZM136.38,138.1c-2.22,7.26-5.42,14.01-9.25,20.23-10.38-.07-21.42-.68-32.47-2.13-45.4-5.99-52.52-26.76-43.82-39.64,8.81-13.04,29.57-15.19,38.76-16.56,3.63-.55,6.99-1.2,9.77-1.8,2.01-.44,3.06-2.63,2.15-4.47-2.04-4.11-4.1-8.7-6.09-13.74-10.43-26.37,17.63-49.23,31.2-34.04,13.57,15.19,24.77,43.09,9.74,92.17Z"/>
		</symbol>
	</defs>
</svg>

<nav class="nav" id="nav">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
		<svg class="nav-logo-mark" viewBox="0 0 204 226" style="color:#B8B0E8">
			<use href="#hart-heart"/>
		</svg>
		<span class="nav-logo-text"><?php echo wp_kses( $site_logo_text, $site_logo_text_allowed ); ?></span>
	</a>

	<ul class="nav-links">
		<?php foreach ( $site_nav_items as $menu_item ) : ?>
			<?php
			$item_label = (string) ( $menu_item['label'] ?? '' );
			$item_url   = (string) ( $menu_item['url'] ?? '' );
			if ( $item_label === '' || $item_url === '' ) {
				continue;
			}
			$item_new_tab = ! empty( $menu_item['open_new_tab'] );
			$item_target  = $item_new_tab ? ' target="_blank" rel="noopener noreferrer"' : '';
			$item_href = harthq_resolve_nav_menu_item_href( $item_url );
			$item_active = harthq_nav_item_is_current( $item_url ) ? ' class="active"' : '';
			$item_attrs  = $item_target . $item_active;
			?>
			<li><a href="<?php echo esc_url( $item_href ); ?>"<?php echo $item_attrs; ?>><?php echo esc_html( $item_label ); ?></a></li>
		<?php endforeach; ?>
		<?php if ( $nav_cta_label !== '' ) : ?>
			<li class="nav-mobile-cta-item"><a href="<?php echo esc_url( $nav_cta_href ); ?>" class="nav-mobile-cta"<?php echo $nav_cta_target; ?>><?php echo esc_html( $nav_cta_label ); ?></a></li>
		<?php endif; ?>
	</ul>

	<?php if ( $nav_cta_label !== '' ) : ?>
	<a href="<?php echo esc_url( $nav_cta_href ); ?>" class="nav-cta"<?php echo $nav_cta_target; ?>><?php echo esc_html( $nav_cta_label ); ?></a>
	<?php endif; ?>

	<button class="nav-mobile-toggle" id="mobileToggle" aria-label="Menu">
		<span></span><span></span><span></span>
	</button>
</nav>
