<?php
/**
 * Template Name: Privacy Policy Page
 *
 * ACF field map (by section)
 * ─────────────────────────
 * Page header (gradient band)
 *   • privacy_header_eyebrow — e.g. “Last updated: …”
 *   • privacy_header_heading — Main H1 (also used for the HTML document title with site name).
 *   • privacy_header_intro   — Lead paragraph under H1.
 *
 * Sidebar
 *   — Label is always “CONTENTS”. TOC links come from each H2 in privacy_body.
 *
 * Main column
 *   • privacy_summary_box — WYSIWYG for the highlighted “Plain English” box.
 *   • privacy_body        — WYSIWYG for all policy sections; use H2 for each numbered section.
 */

$page_id = 0;
if ( is_singular( 'page' ) ) {
	$page_id = (int) get_queried_object_id();
	if ( ! $page_id ) {
		$page_id = (int) get_the_ID();
	}
}
$defaults = harthq_privacy_get_default_fields();

$privacy_header_eyebrow = $defaults['privacy_header_eyebrow'];
$privacy_header_heading = $defaults['privacy_header_heading'];
$privacy_header_intro   = $defaults['privacy_header_intro'];
$privacy_summary_box    = $defaults['privacy_summary_box'];
$privacy_body_raw       = $defaults['privacy_body'];

if ( function_exists( 'get_field' ) && $page_id ) {
	$g = get_field( 'privacy_header_eyebrow', $page_id );
	if ( is_string( $g ) && trim( $g ) !== '' ) {
		$privacy_header_eyebrow = $g;
	}
	$g = get_field( 'privacy_header_heading', $page_id );
	if ( is_string( $g ) && trim( $g ) !== '' ) {
		$privacy_header_heading = $g;
	}
	$g = get_field( 'privacy_header_intro', $page_id );
	if ( is_string( $g ) && trim( $g ) !== '' ) {
		$privacy_header_intro = $g;
	}
	$g = get_field( 'privacy_summary_box', $page_id );
	if ( is_string( $g ) && trim( $g ) !== '' ) {
		$privacy_summary_box = $g;
	}
	$g = get_field( 'privacy_body', $page_id );
	if ( is_string( $g ) && trim( $g ) !== '' ) {
		$privacy_body_raw = $g;
	}
}

$policy_parsed = harthq_policy_h2_nav_from_html( $privacy_body_raw );
$privacy_body_html = $policy_parsed['html'];
$policy_nav_items  = $policy_parsed['items'];

$allowed_policy = wp_kses_allowed_html( 'post' );
if ( isset( $allowed_policy['a'] ) && is_array( $allowed_policy['a'] ) ) {
	$allowed_policy['a']['target'] = true;
	$allowed_policy['a']['rel']    = true;
}
if ( isset( $allowed_policy['p'] ) && is_array( $allowed_policy['p'] ) ) {
	$allowed_policy['p']['style'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo esc_html( $privacy_header_heading . ' - ' . get_bloginfo( 'name', 'display' ) ); ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&family=Figtree:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<?php wp_head(); ?>
</head>
<body>
<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/site', 'navigation' ); ?>

<!-- PAGE HEADER -->
<div class="page-header">
  <span class="updated"><?php echo esc_html( $privacy_header_eyebrow ); ?></span>
  <h1><?php echo esc_html( $privacy_header_heading ); ?></h1>
  <p><?php echo esc_html( $privacy_header_intro ); ?></p>
</div>

<!-- POLICY CONTENT -->
<div class="policy-wrap">

  <nav class="policy-nav" aria-label="<?php echo esc_attr( 'Policy sections' ); ?>">
    <div class="policy-nav-label">CONTENTS</div>
    <?php if ( ! empty( $policy_nav_items ) ) : ?>
    <ul>
      <?php foreach ( $policy_nav_items as $nav_item ) : ?>
      <li><a href="#<?php echo esc_attr( $nav_item['id'] ); ?>"><?php echo esc_html( $nav_item['label'] ); ?></a></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
  </nav>

  <div class="policy-content">

    <?php if ( trim( wp_strip_all_tags( $privacy_summary_box ) ) !== '' ) : ?>
    <div class="info-box">
      <?php echo wp_kses( $privacy_summary_box, $allowed_policy ); ?>
    </div>
    <?php endif; ?>

    <?php echo wp_kses( $privacy_body_html, $allowed_policy ); ?>

  </div>
</div>

<?php get_footer(); ?>
