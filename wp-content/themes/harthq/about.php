<?php
/**
 * Template Name: About Page
 */

$allowed_inline = array(
	'em' => array(),
	'br' => array(),
);
$allowed_contact_note = array(
	'a'      => array(
		'href'   => true,
		'target' => true,
		'rel'    => true,
	),
	'strong' => array(),
	'em'     => array(),
	'br'     => array(),
);
$allowed_svg = array(
	'svg'    => array(
		'width'   => true,
		'height'  => true,
		'viewbox' => true,
		'fill'    => true,
		'xmlns'   => true,
	),
	'path'   => array(
		'd'                => true,
		'fill'             => true,
		'stroke'           => true,
		'stroke-width'     => true,
		'stroke-linecap'   => true,
		'stroke-linejoin'  => true,
		'stroke-miterlimit'=> true,
	),
	'circle' => array(
		'cx'   => true,
		'cy'   => true,
		'r'    => true,
		'fill' => true,
	),
);

$about_hero_eyebrow       = '';
$about_hero_heading       = '';
$about_hero_subtext       = '';
$about_hero_primary_cta   = array();
$about_hero_secondary_cta = array();

$about_origin_tag        = '';
$about_origin_heading    = '';
$about_origin_stats      = array();
$about_origin_paragraphs = array();

$about_beliefs_tag    = '';
$about_beliefs_heading= '';
$about_beliefs_intro  = '';
$about_belief_cards   = array();

$about_connection_tag        = '';
$about_connection_heading    = '';
$about_connection_paragraphs = array();
$about_connection_button     = array();
$about_connection_card_label = '';
$about_connection_points     = array();

$about_how_tag    = '';
$about_how_heading= '';
$about_how_intro  = '';
$about_how_steps  = array();

$about_contact_tag     = '';
$about_contact_heading = '';
$about_contact_intro   = '';
$about_contact_options = array();
$about_contact_note    = '';

$about_final_cta_tag              = '';
$about_final_cta_heading          = '';
$about_final_cta_text             = '';
$about_final_cta_primary_button   = array();
$about_final_cta_secondary_button = array();
$about_final_cta_note             = '';

if ( function_exists( 'get_field' ) ) {
	$about_hero_eyebrow       = (string) get_field( 'about_hero_eyebrow' );
	$about_hero_heading       = (string) get_field( 'about_hero_heading' );
	$about_hero_subtext       = (string) get_field( 'about_hero_subtext' );
	$about_hero_primary_cta   = get_field( 'about_hero_primary_cta' );
	$about_hero_secondary_cta = get_field( 'about_hero_secondary_cta' );

	$about_origin_tag        = (string) get_field( 'about_origin_tag' );
	$about_origin_heading    = (string) get_field( 'about_origin_heading' );
	$about_origin_stats      = get_field( 'about_origin_stats' );
	$about_origin_paragraphs = get_field( 'about_origin_paragraphs' );

	$about_beliefs_tag     = (string) get_field( 'about_beliefs_tag' );
	$about_beliefs_heading = (string) get_field( 'about_beliefs_heading' );
	$about_beliefs_intro   = (string) get_field( 'about_beliefs_intro' );
	$about_belief_cards    = get_field( 'about_belief_cards' );

	$about_connection_tag        = (string) get_field( 'about_connection_tag' );
	$about_connection_heading    = (string) get_field( 'about_connection_heading' );
	$about_connection_paragraphs = get_field( 'about_connection_paragraphs' );
	$about_connection_button     = get_field( 'about_connection_button' );
	$about_connection_card_label = (string) get_field( 'about_connection_card_label' );
	$about_connection_points     = get_field( 'about_connection_points' );

	$about_how_tag     = (string) get_field( 'about_how_tag' );
	$about_how_heading = (string) get_field( 'about_how_heading' );
	$about_how_intro   = (string) get_field( 'about_how_intro' );
	$about_how_steps   = get_field( 'about_how_steps' );

	$about_contact_tag     = (string) get_field( 'about_contact_tag' );
	$about_contact_heading = (string) get_field( 'about_contact_heading' );
	$about_contact_intro   = (string) get_field( 'about_contact_intro' );
	$about_contact_options = get_field( 'about_contact_options' );
	$about_contact_note    = (string) get_field( 'about_contact_note' );

	$about_final_cta_tag              = (string) get_field( 'about_final_cta_tag' );
	$about_final_cta_heading          = (string) get_field( 'about_final_cta_heading' );
	$about_final_cta_text             = (string) get_field( 'about_final_cta_text' );
	$about_final_cta_primary_button   = get_field( 'about_final_cta_primary_button' );
	$about_final_cta_secondary_button = get_field( 'about_final_cta_secondary_button' );
	$about_final_cta_note             = (string) get_field( 'about_final_cta_note' );
}

$about_hero_primary_cta = is_array( $about_hero_primary_cta ) ? $about_hero_primary_cta : array();
$about_hero_secondary_cta = is_array( $about_hero_secondary_cta ) ? $about_hero_secondary_cta : array();
$hero_primary_label = (string) ( $about_hero_primary_cta['label'] ?? '' );
$hero_primary_url   = (string) ( $about_hero_primary_cta['url'] ?? '' );
$hero_secondary_label = (string) ( $about_hero_secondary_cta['label'] ?? '' );
$hero_secondary_url   = (string) ( $about_hero_secondary_cta['url'] ?? '' );

$about_origin_stats = is_array( $about_origin_stats ) ? $about_origin_stats : array();
$about_origin_paragraphs = is_array( $about_origin_paragraphs ) ? $about_origin_paragraphs : array();
$about_belief_cards = is_array( $about_belief_cards ) ? $about_belief_cards : array();
$about_connection_paragraphs = is_array( $about_connection_paragraphs ) ? $about_connection_paragraphs : array();
$about_connection_button = is_array( $about_connection_button ) ? $about_connection_button : array();
$connection_btn_label = (string) ( $about_connection_button['label'] ?? '' );
$connection_btn_url   = (string) ( $about_connection_button['url'] ?? '' );
$connection_btn_new_tab = ! empty( $about_connection_button['open_new_tab'] );
$connection_btn_target = $connection_btn_new_tab ? ' target="_blank" rel="noopener noreferrer"' : '';
$about_connection_points = is_array( $about_connection_points ) ? $about_connection_points : array();
$about_how_steps = is_array( $about_how_steps ) ? $about_how_steps : array();
$about_contact_options = is_array( $about_contact_options ) ? $about_contact_options : array();
$about_final_cta_primary_button = is_array( $about_final_cta_primary_button ) ? $about_final_cta_primary_button : array();
$about_final_cta_secondary_button = is_array( $about_final_cta_secondary_button ) ? $about_final_cta_secondary_button : array();
$final_primary_label = (string) ( $about_final_cta_primary_button['label'] ?? '' );
$final_primary_url   = (string) ( $about_final_cta_primary_button['url'] ?? '' );
$final_secondary_label = (string) ( $about_final_cta_secondary_button['label'] ?? '' );
$final_secondary_url   = (string) ( $about_final_cta_secondary_button['url'] ?? '' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About HartHQ - Practice Growth Partners for Australian Therapists</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&family=Figtree:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body>
<?php wp_body_open(); ?>
<?php get_template_part( 'template-parts/site', 'navigation' ); ?>

<section class="hero">
  <svg class="hero-watermark" viewBox="0 0 204 226" style="color:white"><use href="#hart-heart"/></svg>
  <div class="hero-inner">
    <div class="hero-eyebrow"><span class="hero-eyebrow-dot"></span><span><?php echo esc_html( $about_hero_eyebrow ); ?></span></div>
    <h1><?php echo wp_kses( $about_hero_heading, $allowed_inline ); ?></h1>
    <p class="hero-sub"><?php echo esc_html( $about_hero_subtext ); ?></p>
    <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
      <a href="<?php echo esc_url( $hero_primary_url ); ?>" class="btn btn-primary"><?php echo esc_html( $hero_primary_label ); ?></a>
      <a href="<?php echo esc_url( $hero_secondary_url ); ?>" class="btn btn-outline"><?php echo esc_html( $hero_secondary_label ); ?></a>
    </div>
  </div>
</section>

<section class="origin">
  <div class="origin-inner">
    <div class="origin-stat-block">
      <?php foreach ( $about_origin_stats as $origin_stat ) : ?>
        <div class="origin-stat">
          <div class="origin-stat-num"><?php echo esc_html( (string) ( $origin_stat['stat_number'] ?? '' ) ); ?></div>
          <div class="origin-stat-label"><?php echo esc_html( (string) ( $origin_stat['stat_label'] ?? '' ) ); ?></div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="origin-copy">
      <span class="tag"><?php echo esc_html( $about_origin_tag ); ?></span>
      <h2><?php echo esc_html( $about_origin_heading ); ?></h2>
      <?php foreach ( $about_origin_paragraphs as $origin_para ) : ?>
        <p><?php echo esc_html( (string) ( $origin_para['text'] ?? '' ) ); ?></p>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="beliefs">
  <div class="beliefs-inner">
    <div class="beliefs-header">
      <span class="tag"><?php echo esc_html( $about_beliefs_tag ); ?></span>
      <h2><?php echo wp_kses( $about_beliefs_heading, $allowed_inline ); ?></h2>
      <p><?php echo esc_html( $about_beliefs_intro ); ?></p>
    </div>
    <div class="beliefs-grid">
      <?php foreach ( $about_belief_cards as $belief_card ) : ?>
        <div class="belief-card">
          <div class="belief-icon"><?php echo wp_kses( (string) ( $belief_card['icon_svg'] ?? '' ), $allowed_svg ); ?></div>
          <h3><?php echo esc_html( (string) ( $belief_card['title'] ?? '' ) ); ?></h3>
          <p><?php echo esc_html( (string) ( $belief_card['text'] ?? '' ) ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="connection">
  <div class="connection-inner">
    <div class="connection-copy">
      <span class="tag"><?php echo esc_html( $about_connection_tag ); ?></span>
      <h2><?php echo wp_kses( $about_connection_heading, $allowed_inline ); ?></h2>
      <?php foreach ( $about_connection_paragraphs as $connection_para ) : ?>
        <p><?php echo esc_html( (string) ( $connection_para['text'] ?? '' ) ); ?></p>
      <?php endforeach; ?>
      <a href="<?php echo esc_url( $connection_btn_url ); ?>"<?php echo $connection_btn_target; ?> class="btn btn-primary">
        <?php echo esc_html( $connection_btn_label ); ?>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8H13M13 8L9 4M13 8L9 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
    <div class="connection-card">
      <div class="connection-card-label"><?php echo esc_html( $about_connection_card_label ); ?></div>
      <?php foreach ( $about_connection_points as $connection_point ) : ?>
        <div class="connection-point">
          <div class="connection-point-icon">✓</div>
          <div class="connection-point-text">
            <strong><?php echo esc_html( (string) ( $connection_point['title'] ?? '' ) ); ?></strong>
            <span><?php echo esc_html( (string) ( $connection_point['description'] ?? '' ) ); ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="how-we-work">
  <div class="how-we-work-inner">
    <div class="how-we-work-header">
      <span class="tag"><?php echo esc_html( $about_how_tag ); ?></span>
      <h2><?php echo wp_kses( $about_how_heading, $allowed_inline ); ?></h2>
      <p><?php echo esc_html( $about_how_intro ); ?></p>
    </div>
    <div class="how-grid">
      <?php foreach ( $about_how_steps as $how_step ) : ?>
        <div class="how-card">
          <div class="how-num"><?php echo esc_html( (string) ( $how_step['step_number'] ?? '' ) ); ?></div>
          <h3><?php echo esc_html( (string) ( $how_step['title'] ?? '' ) ); ?></h3>
          <p><?php echo esc_html( (string) ( $how_step['text'] ?? '' ) ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="contact" id="contact">
  <div class="contact-inner">
    <span class="tag"><?php echo esc_html( $about_contact_tag ); ?></span>
    <h2><?php echo wp_kses( $about_contact_heading, $allowed_inline ); ?></h2>
    <p style="font-size:17px; margin-bottom:48px; max-width:560px; margin-left:auto; margin-right:auto;"><?php echo esc_html( $about_contact_intro ); ?></p>
    <div class="contact-options">
      <?php foreach ( $about_contact_options as $contact_option ) : ?>
        <?php
        $contact_button = is_array( $contact_option['button'] ?? null ) ? $contact_option['button'] : array();
        $contact_btn_label = (string) ( $contact_button['label'] ?? '' );
        $contact_btn_url   = (string) ( $contact_button['url'] ?? '' );
        $contact_btn_new_tab = ! empty( $contact_button['open_new_tab'] );
        $contact_btn_target = $contact_btn_new_tab ? ' target="_blank" rel="noopener noreferrer"' : '';
        $contact_btn_class  = $contact_btn_url !== '' && strpos( $contact_btn_url, 'mailto:' ) === 0 ? 'btn btn-ghost' : 'btn btn-teal';
        ?>
        <div class="contact-option">
          <div class="contact-option-icon"><?php echo wp_kses( (string) ( $contact_option['icon_svg'] ?? '' ), $allowed_svg ); ?></div>
          <h3><?php echo esc_html( (string) ( $contact_option['title'] ?? '' ) ); ?></h3>
          <p><?php echo esc_html( (string) ( $contact_option['text'] ?? '' ) ); ?></p>
          <?php if ( $contact_btn_label !== '' ) : ?>
            <a href="<?php echo esc_url( $contact_btn_url ); ?>" class="<?php echo esc_attr( $contact_btn_class ); ?>"<?php echo $contact_btn_target; ?>><?php echo esc_html( $contact_btn_label ); ?></a>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
    <p class="contact-note"><?php echo wp_kses( $about_contact_note, $allowed_contact_note ); ?></p>
  </div>
</section>

<section class="cta-final">
  <span class="tag"><?php echo esc_html( $about_final_cta_tag ); ?></span>
  <h2><?php echo wp_kses( $about_final_cta_heading, $allowed_inline ); ?></h2>
  <p><?php echo esc_html( $about_final_cta_text ); ?></p>
  <div class="cta-final-actions">
    <a href="<?php echo esc_url( $final_primary_url ); ?>" class="btn btn-primary"><?php echo esc_html( $final_primary_label ); ?></a>
    <a href="<?php echo esc_url( $final_secondary_url ); ?>" class="btn btn-outline"><?php echo esc_html( $final_secondary_label ); ?></a>
  </div>
  <p class="cta-note"><?php echo esc_html( $about_final_cta_note ); ?></p>
</section>

<?php get_footer(); ?>
