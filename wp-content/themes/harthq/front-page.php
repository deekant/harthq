<?php
/**
 * Front page template.
 */

$hero_eyebrow_text = get_field( 'hero_eyebrow_text' );
$hero_heading      = get_field( 'hero_heading_line_1' );
$hero_subtext      = get_field( 'hero_subtext' );

$hero_primary_cta   = get_field( 'hero_primary_cta' );
$hero_secondary_cta = get_field( 'hero_secondary_cta' );
$hero_trust         = get_field( 'hero_trust' );
$hero_card          = get_field( 'hero_card' );
$proof_bar          = get_field( 'proof_bar' );
$problem_section    = get_field( 'problem_section' );
$how_steps          = get_field( 'how_steps' );

$primary_cta_label = $hero_primary_cta['label'] ?? '';
$primary_cta_url   = $hero_primary_cta['url'] ?? '';

$secondary_cta_label = $hero_secondary_cta['label'] ?? '';
$secondary_cta_url   = $hero_secondary_cta['url'] ?? '';

$trust_text  = $hero_trust['text'] ?? '';
$trust_stats = ! empty( $hero_trust['stats'] ) && is_array( $hero_trust['stats'] ) ? $hero_trust['stats'] : array();

$proof_items         = ! empty( $proof_bar['items'] ) && is_array( $proof_bar['items'] ) ? $proof_bar['items'] : array();
$proof_show_dividers = isset( $proof_bar['show_dividers'] ) ? (bool) $proof_bar['show_dividers'] : true;

$problem_tag     = $problem_section['tag'] ?? '';
$problem_heading = $problem_section['heading'] ?? '';
$problem_body    = $problem_section['body_text'] ?? '';
$problem_cta     = $problem_section['cta'] ?? array();
$problem_quotes  = ! empty( $problem_section['quotes'] ) && is_array( $problem_section['quotes'] ) ? $problem_section['quotes'] : array();

$how_section_tag     = get_field( 'how_section_tag' );
$how_section_heading = get_field( 'how_section_heading' );
$how_section_intro   = get_field( 'how_section_intro' );
$how_steps = is_array( $how_steps ) ? $how_steps : array();

$services_section_tag      = get_field( 'services_section_tag' );
$services_section_heading  = get_field( 'services_section_heading' );
$services_section_intro    = get_field( 'services_section_intro' );
$services_concierge_label  = get_field( 'services_concierge_label' );
$services_concierge_intro  = get_field( 'services_concierge_intro' );
$services_cards            = get_field( 'services_cards' );

$heartbeat_section_tag     = get_field( 'heartbeat_section_tag' );
$heartbeat_section_heading = get_field( 'heartbeat_section_heading' );
$heartbeat_section_intro   = get_field( 'heartbeat_section_intro' );
$heartbeat_dimensions      = get_field( 'heartbeat_dimensions' );
$heartbeat_cta             = get_field( 'heartbeat_cta' );
$heartbeat_visual          = get_field( 'heartbeat_visual' );

$testimonials_section_tag     = get_field( 'testimonials_section_tag' );
$testimonials_section_heading = get_field( 'testimonials_section_heading' );
$testimonials_section_intro   = get_field( 'testimonials_section_intro' );
$testimonials_items           = get_field( 'testimonials_items' );

$calculator_section_tag    = get_field( 'calculator_section_tag' );
$calculator_section_heading = get_field( 'calculator_section_heading' );
$calculator_section_intro   = get_field( 'calculator_section_intro' );
$calculator_section_button  = get_field( 'calculator_section_button' );

$cta_section_tag              = get_field( 'cta_section_tag' );
$cta_section_heading          = get_field( 'cta_section_heading' );
$cta_section_intro            = get_field( 'cta_section_intro' );
$cta_section_primary_button   = get_field( 'cta_section_primary_button' );
$cta_section_secondary_button = get_field( 'cta_section_secondary_button' );
$cta_section_note             = get_field( 'cta_section_note' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HartHQ - Practice Growth Partners for Psychologists & Counsellors</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&family=Figtree:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<?php wp_head(); ?>
</head>
<body>
<?php wp_body_open(); ?>

<!-- Shared Hart Centre heart mark - exact official paths -->
<svg width="0" height="0" style="position:absolute">
  <defs>
    <symbol id="hart-heart" viewBox="0 0 204 226" xmlns="http://www.w3.org/2000/svg">
      <path fill="currentColor" d="M184.5,153.88c-3.5.61-18.27,3.02-38,4.02,2.53-3.92,4.74-8.05,6.58-12.37,14.03-32.9,15.95-94.39-17.63-122.62-33.6-28.21-59.36,1.23-60.73,21.78-1.39,20.55,11.65,43.33,11.65,43.33-19.33-2.76-65.79-3.15-68.32,31.51-2.45,33.52,40.1,48.16,83.73,49.92,6,.25,11.84.21,17.45-.05-20.34,25.16-49.38,39.52-55.95,42.57-.74.34-1.04,1.23-.66,1.95h0c.34.65,1.12.95,1.8.68,30.53-11.95,57.46-26.59,74.83-47,23.55-3.19,40.76-9.25,45.92-11.21.81-.31,1.11-1.31.59-2.01h0c-.3-.4-.79-.6-1.28-.52ZM136.38,138.1c-2.22,7.26-5.42,14.01-9.25,20.23-10.38-.07-21.42-.68-32.47-2.13-45.4-5.99-52.52-26.76-43.82-39.64,8.81-13.04,29.57-15.19,38.76-16.56,3.63-.55,6.99-1.2,9.77-1.8,2.01-.44,3.06-2.63,2.15-4.47-2.04-4.11-4.1-8.7-6.09-13.74-10.43-26.37,17.63-49.23,31.2-34.04,13.57,15.19,24.77,43.09,9.74,92.17Z"/>
    </symbol>
  </defs>
</svg>
<nav class="nav" id="nav">
  <a href="#" class="nav-logo">
    <!-- Hart Centre heart mark -->
    <svg class="nav-logo-mark" viewBox="0 0 204 226" style="color:#B8B0E8">
      <use href="#hart-heart"/>
    </svg>
    <span class="nav-logo-text">Hart<span>HQ</span></span>
  </a>

  <ul class="nav-links">
    <li><a href="#about">About</a></li>
    <li><a href="#how">How it works</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#heartbeat">HartBeat</a></li>
    <li><a href="#resources">Resources</a></li>
  </ul>

  <a href="#get-started" class="nav-cta">Get started</a>

  <button class="nav-mobile-toggle" id="mobileToggle" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
</nav>

<!-- HERO -->
<section class="hero">
  <!-- Watermark - actual Hart Centre heart mark -->
  <svg class="hero-watermark" viewBox="0 0 204 226" style="color:white">
    <use href="#hart-heart"/>
  </svg>

  <div class="hero-inner">
    <div class="hero-content">
      <div class="hero-eyebrow fade-up">
        <div class="hero-eyebrow-dot"></div>
        <span><?php echo esc_html( $hero_eyebrow_text ?? '' ); ?></span>
      </div>

      <h1 class="fade-up delay-1">
        <?php echo wp_kses( $hero_heading ?? '', array( 'em' => array(), 'br' => array() ) ); ?>
      </h1>

      <p class="hero-sub fade-up delay-2">
        <?php echo esc_html( $hero_subtext ?? '' ); ?>
      </p>

      <div class="hero-actions fade-up delay-3">
        <a href="<?php echo esc_url( $primary_cta_url ); ?>" class="btn btn-primary"><?php echo esc_html( $primary_cta_label ); ?></a>
        <a href="<?php echo esc_url( $secondary_cta_url ); ?>" target="_blank" class="btn btn-outline"><?php echo esc_html( $secondary_cta_label ); ?></a>
      </div>

      <div class="hero-trust fade-up delay-4">
        <span class="hero-trust-text"><?php echo esc_html( $trust_text ); ?></span>
        <div class="hero-trust-stats">
          <?php foreach ( $trust_stats as $trust_stat ) : ?>
            <div class="hero-stat">
              <span class="hero-stat-num"><?php echo esc_html( $trust_stat['value'] ?? '' ); ?></span>
              <span class="hero-stat-label"><?php echo esc_html( $trust_stat['label'] ?? '' ); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Hero right card -->
    <div class="hero-card fade-up delay-3">
      <div class="hero-card-label"><?php echo esc_html( $hero_card['label'] ); ?></div>
      <h3><?php echo esc_html( $hero_card['title'] ); ?></h3>
      <p class="hero-card-sub"><?php echo esc_html( $hero_card['subtitle'] ); ?></p>

      <div class="heartbeat-preview">
        <div class="hb-bars">
          <div class="hb-bar hb-bar-1"></div>
          <div class="hb-bar hb-bar-2"></div>
          <div class="hb-bar hb-bar-3"></div>
          <div class="hb-bar hb-bar-4"></div>
          <div class="hb-bar hb-bar-5"></div>
        </div>
        <div class="hb-labels">
          <?php foreach ( $hero_card['dimensions'] as $hero_card_dimension ) : ?>
            <div class="hb-label"><?php echo esc_html( $hero_card_dimension['name'] ); ?></div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="hb-score-row">
        <span class="hb-score-label"><?php echo esc_html( $hero_card['score_label'] ); ?></span>
        <span class="hb-score-val"><?php echo esc_html( $hero_card['score_value'] ); ?> <span>/ 100</span></span>
      </div>

    </div>
  </div>
</section>

<!-- PROOF BAR -->
<div class="proof-bar">
  <div class="proof-bar-inner">
    <?php foreach ( $proof_items as $proof_item_index => $proof_item ) : ?>
      <div class="proof-item">
        <?php if ( ! empty( $proof_item['icon_svg'] ) ) : ?>
          <?php echo wp_kses( $proof_item['icon_svg'], array( 'svg' => array( 'xmlns' => true, 'width' => true, 'height' => true, 'viewbox' => true, 'fill' => true, 'class' => true ), 'path' => array( 'd' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true, 'stroke-linecap' => true, 'stroke-linejoin' => true, 'stroke-miterlimit' => true ), 'circle' => array( 'cx' => true, 'cy' => true, 'r' => true, 'fill' => true ) ) ); ?>
        <?php endif; ?>
        <?php echo esc_html( $proof_item['text'] ?? '' ); ?>
      </div>
      <?php if ( $proof_show_dividers && $proof_item_index < ( count( $proof_items ) - 1 ) ) : ?>
        <div class="proof-divider"></div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>

<!-- PROBLEM SECTION -->
<section class="problem" id="about">
  <div class="problem-inner">
    <div class="problem-content">
      <span class="tag"><?php echo esc_html( $problem_tag ); ?></span>
      <h2><?php echo wp_kses( $problem_heading, array( 'em' => array() ) ); ?></h2>
      <p><?php echo esc_html( $problem_body ); ?></p>
      <a href="<?php echo esc_url( $problem_cta['url'] ?? '' ); ?>" class="btn btn-ghost"><?php echo esc_html( $problem_cta['label'] ?? '' ); ?></a>
    </div>

    <div class="problem-quotes">
      <?php foreach ( $problem_quotes as $problem_quote ) : ?>
        <div class="problem-quote">
          <p><?php echo esc_html( $problem_quote['quote_text'] ?? '' ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="how" id="how">
  <div class="how-inner">
    <span class="tag"><?php echo esc_html( $how_section_tag ); ?></span>
    <h2><?php echo wp_kses( $how_section_heading, array( 'em' => array() ) ); ?></h2>
    <p class="how-intro"><?php echo esc_html( $how_section_intro ); ?></p>

    <div class="how-steps">
      <?php foreach ( $how_steps as $how_step ) : ?>
        <div class="how-step">
          <?php if ( ! empty( $how_step['icon_svg'] ) ) : ?>
            <div class="how-step-icon">
              <?php echo wp_kses( $how_step['icon_svg'], array( 'svg' => array( 'xmlns' => true, 'width' => true, 'height' => true, 'viewbox' => true, 'fill' => true, 'class' => true ), 'path' => array( 'd' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true, 'stroke-linecap' => true, 'stroke-linejoin' => true, 'stroke-miterlimit' => true ), 'circle' => array( 'cx' => true, 'cy' => true, 'r' => true, 'fill' => true ) ) ); ?>
            </div>
          <?php endif; ?>
          <div class="step-num"><?php echo esc_html( $how_step['step_number'] ?? '' ); ?></div>
          <h3><?php echo esc_html( $how_step['step_title'] ?? '' ); ?></h3>
          <p><?php echo esc_html( $how_step['step_body'] ?? '' ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section class="services" id="services">
  <div class="services-inner">
    <div class="services-header">
      <div>
        <span class="tag"><?php echo esc_html( $services_section_tag ); ?></span>
        <h2><?php echo wp_kses( $services_section_heading, array( 'em' => array() ) ); ?></h2>
      </div>
      <p><?php echo esc_html( $services_section_intro ); ?></p>
    </div>

    <div class="services-grid">

      <!-- Concierge label row -->
      <div style="grid-column: 1 / -1; margin-bottom: -8px;">
        <span class="tag" style="color:var(--teal);"><?php echo esc_html( $services_concierge_label ); ?></span>
        <p style="font-size:15px; margin-top: 6px; max-width: 600px;"><?php echo esc_html( $services_concierge_intro ); ?></p>
      </div>

      <?php foreach ( $services_cards as $service_card_index => $service_card ) : ?>
        <div class="service-card sc-concierge" style="grid-column: auto;<?php echo 1 === $service_card_index ? ' background: linear-gradient(145deg, #152240 0%, var(--teal-dark) 100%); border: 1px solid rgba(90,173,160,0.2); position:relative;' : ''; ?>">
          <?php if ( '' !== trim( (string) $service_card['card_tag'] ) ) : ?>
            <div style="position:absolute;top:20px;right:20px;background:var(--teal-mid);color:white;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;padding:4px 12px;border-radius:100px;font-family:var(--ff-body);"><?php echo esc_html( $service_card['card_tag'] ); ?></div>
          <?php endif; ?>
          <div>
            <div class="service-badge badge-full"><?php echo esc_html( $service_card['badge'] ); ?></div>
            <h3><?php echo esc_html( $service_card['title'] ); ?></h3>
            <div class="service-price"><?php echo esc_html( $service_card['price'] ); ?> <small style="font-size:18px;color:rgba(255,255,255,0.4)"><?php echo esc_html( $service_card['price_suffix'] ); ?></small></div>
            <div class="service-price-note"><?php echo esc_html( $service_card['price_note'] ); ?></div>
            <p class="service-desc"><?php echo esc_html( $service_card['description'] ); ?></p>
            <ul class="service-features">
              <?php foreach ( $service_card['features'] as $service_feature ) : ?>
                <li>
                  <div class="feat-check"><svg viewBox="0 0 10 10" fill="none"><path d="M2 5l2.5 2.5L8 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                  <?php echo esc_html( $service_feature['text'] ); ?>
                </li>
              <?php endforeach; ?>
            </ul>
            <div class="guarantee-tag" style="margin-bottom:20px;<?php echo 1 === $service_card_index ? ' color:var(--teal-light); background:rgba(90,173,160,0.15);' : ''; ?>">
              <?php echo esc_html( $service_card['guarantee_text'] ); ?>
            </div>
            <a href="<?php echo esc_url( $service_card['cta']['url'] ); ?>" target="_blank" class="btn <?php echo 1 === $service_card_index ? 'btn-teal' : 'btn-primary'; ?>" style="width:100%;justify-content:center;"><?php echo esc_html( $service_card['cta']['label'] ); ?></a>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- HEARTBEAT SECTION -->
<section class="heartbeat" id="heartbeat">
  <div class="heartbeat-inner">
    <div class="heartbeat-content">
      <span class="tag"><?php echo esc_html( $heartbeat_section_tag ); ?></span>
      <h2><?php echo wp_kses( $heartbeat_section_heading, array( 'em' => array(), 'br' => array() ) ); ?></h2>
      <p><?php echo esc_html( $heartbeat_section_intro ); ?></p>

      <div class="hb-dimensions">
        <?php foreach ( $heartbeat_dimensions as $heartbeat_dimension ) : ?>
          <div class="hb-dim">
            <div class="hb-dim-label"><?php echo esc_html( $heartbeat_dimension['label'] ); ?></div>
            <div class="hb-dim-bar-wrap">
              <div class="hb-dim-bar" style="width:<?php echo esc_attr( $heartbeat_dimension['bar_width_percent'] ); ?>%;background:<?php echo esc_attr( $heartbeat_dimension['bar_background'] ); ?>"></div>
            </div>
            <div class="hb-dim-score" style="<?php echo '' !== trim( (string) $heartbeat_dimension['score_color'] ) ? 'color:' . esc_attr( $heartbeat_dimension['score_color'] ) : ''; ?>"><?php echo esc_html( $heartbeat_dimension['score'] ); ?></div>
          </div>
        <?php endforeach; ?>
      </div>

      <a href="<?php echo esc_url( $heartbeat_cta['url'] ); ?>" class="btn btn-teal"><?php echo esc_html( $heartbeat_cta['label'] ); ?></a>
    </div>

    <!-- Visual -->
    <div class="hb-visual">
      <div class="hb-visual-header">
        <div class="hb-visual-title"><?php echo esc_html( $heartbeat_visual['title'] ); ?></div>
        <div class="hb-badge"><?php echo esc_html( $heartbeat_visual['badge'] ); ?></div>
      </div>

      <div class="hb-score-big">
        <div class="hb-score-circle">
          <div class="hb-score-number"><?php echo esc_html( $heartbeat_visual['score_value'] ); ?><sub>/100</sub></div>
        </div>
        <div class="hb-score-desc"><?php echo wp_kses( $heartbeat_visual['overall_score_line'], array( 'strong' => array() ) ); ?></div>
      </div>

      <div class="hb-dim-list">
        <?php foreach ( $heartbeat_visual['dimensions'] as $heartbeat_visual_dimension ) : ?>
          <div class="hb-dim-row">
            <div class="hb-dim-dot" style="background:<?php echo esc_attr( $heartbeat_visual_dimension['dot_color'] ); ?>"></div>
            <div class="hb-dim-name"><?php echo esc_html( $heartbeat_visual_dimension['name'] ); ?></div>
            <div class="hb-dim-pct" style="<?php echo '' !== trim( (string) $heartbeat_visual_dimension['percent_color'] ) ? 'color:' . esc_attr( $heartbeat_visual_dimension['percent_color'] ) : ''; ?>"><?php echo esc_html( $heartbeat_visual_dimension['percent_text'] ); ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials" id="testimonials">
  <div class="testimonials-inner">
    <span class="tag"><?php echo esc_html( $testimonials_section_tag ); ?></span>
    <h2><?php echo wp_kses( $testimonials_section_heading, array( 'em' => array(), 'br' => array() ) ); ?></h2>
    <p class="testimonials-intro"><?php echo esc_html( $testimonials_section_intro ); ?></p>

    <div class="testi-grid">
      <?php foreach ( $testimonials_items as $testimonials_item ) : ?>
        <div class="testi-card">
          <p class="testi-text"><?php echo esc_html( $testimonials_item['quote_text'] ); ?></p>
          <div class="testi-author">
            <div class="testi-avatar"><?php echo esc_html( $testimonials_item['author_initial'] ); ?></div>
            <div>
              <div class="testi-name"><?php echo esc_html( $testimonials_item['author_name'] ); ?></div>
              <div class="testi-role"><?php echo esc_html( $testimonials_item['author_role'] ); ?></div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CALCULATOR TEASER -->
<section class="calc-teaser" id="calculator">
  <div class="calc-teaser-inner">
    <div class="calc-content">
      <span class="tag"><?php echo esc_html( $calculator_section_tag ); ?></span>
      <h2><?php echo wp_kses( $calculator_section_heading, array( 'em' => array(), 'br' => array() ) ); ?></h2>
      <p><?php echo esc_html( $calculator_section_intro ); ?></p>
      <a href="<?php echo esc_url( $calculator_section_button['url'] ); ?>" class="btn btn-primary"><?php echo esc_html( $calculator_section_button['label'] ); ?></a>
    </div>

    <div class="calc-preview">
      <div class="calc-slider-wrap">
        <div class="calc-slider-label">
          <span>Session fee</span>
          <span style="color:var(--dark);font-weight:600">$220/hr</span>
        </div>
        <input type="range" min="100" max="400" value="220" style="width:100%;accent-color:var(--purple)">
      </div>
      <div class="calc-slider-wrap">
        <div class="calc-slider-label">
          <span>Sessions per week</span>
          <span style="color:var(--dark);font-weight:600">22 sessions</span>
        </div>
        <input type="range" min="5" max="40" value="22" style="width:100%;accent-color:var(--teal)">
      </div>
      <div class="calc-divider"></div>
      <div class="calc-row">
        <span class="calc-label">Annual revenue (current)</span>
        <span class="calc-value">$222,640</span>
      </div>
      <div class="calc-row">
        <span class="calc-label">Hours spent on admin</span>
        <span class="calc-value">312 hrs/yr</span>
      </div>
      <div class="calc-row">
        <span class="calc-label">Admin cost at your rate</span>
        <span class="calc-value" style="color:#e05555">$68,640</span>
      </div>
      <div class="calc-divider"></div>
      <div class="calc-row">
        <span class="calc-label">Potential annual gain</span>
        <span class="calc-value positive">+$20,240</span>
      </div>
    </div>
  </div>
</section>

<!-- CTA FINAL -->
<section class="cta-final" id="get-started">
  <div class="cta-final-inner">
    <span class="tag"><?php echo esc_html( $cta_section_tag ); ?></span>
    <h2><?php echo wp_kses( $cta_section_heading, array( 'em' => array(), 'br' => array() ) ); ?></h2>
    <p><?php echo esc_html( $cta_section_intro ); ?></p>
    <div class="cta-final-actions">
      <a href="<?php echo esc_url( $cta_section_primary_button['url'] ); ?>" class="btn btn-primary"><?php echo esc_html( $cta_section_primary_button['label'] ); ?></a>
      <a href="<?php echo esc_url( $cta_section_secondary_button['url'] ); ?>" target="_blank" class="btn btn-outline"><?php echo esc_html( $cta_section_secondary_button['label'] ); ?></a>
    </div>
    <p class="cta-note"><?php echo esc_html( $cta_section_note ); ?></p>
  </div>
</section>

<!-- FOOTER -->
<footer class="footer">
  <div class="footer-inner">
    <div class="footer-brand">
      <div class="footer-logo-text">Hart<span>HQ</span></div>
      <p>Practice growth partners for psychologists and counsellors in private practice. Built by the team behind The Hart Centre.</p>
    </div>

    <div class="footer-col">
      <h4>Services</h4>
      <ul>
        <li><a href="#services">Individual Support & Administration</a></li>
        <li><a href="#services">Group Support & Administration</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Tools</h4>
      <ul>
        <li><a href="#heartbeat">HartBeat Score</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Company</h4>
      <ul>
        <li><a href="<?php echo esc_url( home_url('/about/') ); ?>">About</a></li>
        <li><a href="https://thehartcentre.com.au" target="_blank">The Hart Centre</a></li>
        <li><a href="<?php echo esc_url( home_url('/about/#contact') ); ?>">Contact</a></li>
        <li><a href="<?php echo esc_url( home_url('/privacy-policy/') ); ?>">Privacy Policy</a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2026 HartHQ. Part of The Hart Centre group. ABN 46 143 297 509.</p>
    <div class="footer-bottom-links">
      <a href="<?php echo esc_url( home_url('/privacy-policy/') ); ?>">Privacy</a>
      <a href="https://thehartcentre.com.au" target="_blank">thehartcentre.com.au</a>
    </div>
  </div>
</footer>



<?php wp_footer(); ?>
</body>
</html>
