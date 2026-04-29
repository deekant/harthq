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
$proof_bar          = get_field( 'proof_bar' );
$problem_section    = get_field( 'problem_section' );

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
      <div class="hero-card-label">HartBeat Score Preview</div>
      <h3>Practice Health at a Glance</h3>
      <p class="hero-card-sub">Five dimensions. One monthly score. Know exactly where your practice is leaking.</p>

      <div class="heartbeat-preview">
        <div class="hb-bars">
          <div class="hb-bar hb-bar-1"></div>
          <div class="hb-bar hb-bar-2"></div>
          <div class="hb-bar hb-bar-3"></div>
          <div class="hb-bar hb-bar-4"></div>
          <div class="hb-bar hb-bar-5"></div>
        </div>
        <div class="hb-labels">
          <div class="hb-label">Capacity</div>
          <div class="hb-label">Revenue</div>
          <div class="hb-label">Conversion</div>
          <div class="hb-label">Retention</div>
          <div class="hb-label">Efficiency</div>
        </div>
      </div>

      <div class="hb-score-row">
        <span class="hb-score-label">Your HartBeat score</span>
        <span class="hb-score-val">72 <span>/ 100</span></span>
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
    <span class="tag">How HartHQ works</span>
    <h2>One path. <em>Less on your plate.</em></h2>
    <p class="how-intro">Start with your free HartBeat score. See exactly where your practice is leaking time. Then let us handle the admin - so you can focus on clients.</p>

    <div class="how-steps">
      <div class="how-step">
        <div class="how-step-icon"><svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.23999 10.08C6.23999 7.95922 7.95922 6.23999 10.08 6.23999H37.92C40.0408 6.23999 41.76 7.95922 41.76 10.08V37.92C41.76 40.0408 40.0408 41.76 37.92 41.76H10.08C7.95922 41.76 6.23999 40.0408 6.23999 37.92V10.08Z" stroke="white" stroke-width="1.5"/>
<path d="M23.5391 13.2517C23.7241 12.8628 24.2759 12.8628 24.4609 13.2517L27.4107 19.4542C27.4851 19.6107 27.6334 19.7188 27.8048 19.7415L34.5955 20.6396C35.0214 20.696 35.1919 21.2225 34.8803 21.5193L29.9127 26.2507C29.7874 26.3701 29.7307 26.5451 29.7622 26.7156L31.0093 33.4731C31.0875 33.8969 30.6411 34.2223 30.2635 34.0167L24.2436 30.7385C24.0917 30.6558 23.9084 30.6558 23.7564 30.7385L17.7365 34.0167C17.359 34.2223 16.9126 33.8969 16.9908 33.4731L18.2379 26.7156C18.2693 26.5451 18.2127 26.3701 18.0873 26.2507L13.1197 21.5193C12.8082 21.2225 12.9787 20.696 13.4046 20.6396L20.1952 19.7415C20.3666 19.7188 20.5149 19.6107 20.5894 19.4542L23.5391 13.2517Z" stroke="#B8B0E8" stroke-width="1.5"/>
</svg>
</div>
        <div class="step-num">Step 01</div>
        <h3>Get your HartBeat score</h3>
        <p>The free HartBeat quiz takes 5 minutes and shows you exactly where admin is costing you time and money. Five dimensions. One clear picture of where your practice stands.</p>
      </div>

      <div class="how-step">
        <div class="how-step-icon"><svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16 9V5C16 4.45 15.55 4 15 4H11C10.45 4 10 4.45 10 5V9H8C5.791 9 4 10.791 4 13V36C4 38.209 5.791 40 8 40H38C40.209 40 42 38.209 42 36L42.0001 13C42.0001 11.548 41.2271 10.276 40.0691 9.57596" stroke="white" stroke-width="1.875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M20 9H30V5C30 4.45 30.45 4 31 4H35C35.55 4 36 4.45 36 5V9" stroke="white" stroke-width="1.875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M11 25H15V22" stroke="#A8D5CD" stroke-width="1.875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M21 25H25V22" stroke="#A8D5CD" stroke-width="1.875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M11 34H15V31" stroke="#A8D5CD" stroke-width="1.875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M21 34H25V31" stroke="#A8D5CD" stroke-width="1.875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M31 25H35V22" stroke="#A8D5CD" stroke-width="1.875" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</div>
        <div class="step-num">Step 02</div>
        <h3>Book a free call</h3>
        <p>We look at your score together and talk through what's actually weighing on your practice. No pitch. Just an honest conversation about what would make the biggest difference.</p>
      </div>

      <div class="how-step">
        <div class="how-step-icon"><svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M42.0921 24.858L43.0001 23.95C46.8661 20.084 46.8661 13.816 43.0001 9.95004C39.1341 6.08404 32.8661 6.08404 29.0001 9.95004L21.3 17.65C22.228 19.392 24.2041 20.32 26.1291 19.885" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M30.41 26.182L34.031 29.803M34.031 29.803C35.088 30.86 35.088 32.574 34.031 33.631C32.974 34.688 31.26 34.688 30.203 33.631L26.582 30.01M34.031 29.803C35.088 30.86 36.8021 30.86 37.8591 29.803C38.9161 28.746 38.9161 27.032 37.8591 25.975L30.1931 18.293M26.5819 30.011L30.2029 33.632C31.2599 34.689 31.2599 36.403 30.2029 37.46C29.1459 38.517 27.4319 38.517 26.3749 37.46M26.3749 37.46L22.7539 33.839M26.3749 37.46C27.4319 38.517 27.432 40.231 26.375 41.288C25.318 42.345 23.604 42.345 22.547 41.288L6.74301 25.502C2.54401 21.308 2.51201 14.513 6.67001 10.278C10.873 5.99803 17.758 5.95903 22.01 10.191L22.47 10.686" stroke="#B8B0E8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</div>
        <div class="step-num">Step 03</div>
        <h3>We handle the admin</h3>
        <p>Our HartHQ admin team takes calls, manages your calendar, handles invoicing and client follow-up - in AU hours, allied health-trained. You get your time back. Your practice runs properly.</p>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section class="services" id="services">
  <div class="services-inner">
    <div class="services-header">
      <div>
        <span class="tag">Plans &amp; services</span>
        <h2>Admin support, <em>handled.</em></h2>
      </div>
      <p>Real people, AU hours, allied health-trained. Everything that isn't clinical work - off your plate. No lock-in.</p>
    </div>

    <div class="services-grid">

      <!-- Concierge label row -->
      <div style="grid-column: 1 / -1; margin-bottom: -8px;">
        <span class="tag" style="color:var(--teal);">HartHQ Concierge · Full service · Australia</span>
        <p style="font-size:15px; margin-top: 6px; max-width: 600px;">Our HartHQ admin team runs your practice. Real people, AU hours, allied health-trained. Everything off your plate - including the phone.</p>
      </div>

      <!-- Individual Support & Administration -->
      <div class="service-card sc-concierge" style="grid-column: auto;">
        <div>
          <div class="service-badge badge-full">Individual · Solo practitioner</div>
          <h3>Individual Support & Administration</h3>
          <div class="service-price">From $250 <small style="font-size:18px;color:rgba(255,255,255,0.4)">/week</small></div>
          <div class="service-price-note">For solo psychologists &amp; counsellors</div>
          <p class="service-desc">Your own dedicated support - one practice, one team, everything handled. Built for the solo practitioner who wants their time back without building an admin team.</p>
          <ul class="service-features">
            <li>
              <div class="feat-check"><svg viewBox="0 0 10 10" fill="none"><path d="M2 5l2.5 2.5L8 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Calls answered 9am-5pm, outbound from your number
            </li>
            <li>
              <div class="feat-check"><svg viewBox="0 0 10 10" fill="none"><path d="M2 5l2.5 2.5L8 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Email management with clients, referrers and third parties
            </li>
            <li>
              <div class="feat-check"><svg viewBox="0 0 10 10" fill="none"><path d="M2 5l2.5 2.5L8 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Bookings, cancellations and rescheduling across your calendar systems
            </li>
            <li>
              <div class="feat-check"><svg viewBox="0 0 10 10" fill="none"><path d="M2 5l2.5 2.5L8 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Letters and reports for clients, doctors and health funds
            </li>
            <li>
              <div class="feat-check"><svg viewBox="0 0 10 10" fill="none"><path d="M2 5l2.5 2.5L8 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Invoicing, Medicare, DVA and health fund claims
            </li>
            <li>
              <div class="feat-check"><svg viewBox="0 0 10 10" fill="none"><path d="M2 5l2.5 2.5L8 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Client records - creation, maintenance and document filing
            </li>
          </ul>
          <div class="guarantee-tag" style="margin-bottom:20px;">
            ⏱️ Practitioners typically recover 6+ hours per week
          </div>
          <a href="https://hart-hq.zohobookings.com/#/intro" target="_blank" class="btn btn-primary" style="width:100%;justify-content:center;">Enquire about Individual →</a>
        </div>
      </div>

      <!-- Group Support & Administration -->
      <div class="service-card sc-concierge" style="grid-column: auto; background: linear-gradient(145deg, #152240 0%, var(--teal-dark) 100%); border: 1px solid rgba(90,173,160,0.2); position:relative;">
        <div style="position:absolute;top:20px;right:20px;background:var(--teal-mid);color:white;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;padding:4px 12px;border-radius:100px;font-family:var(--ff-body);">Best for groups</div>
        <div>
          <div class="service-badge badge-full">Group · Multi-practitioner</div>
          <h3>Group Support & Administration</h3>
          <div class="service-price">From $350 <small style="font-size:18px;color:rgba(255,255,255,0.4)">/week</small></div>
          <div class="service-price-note">For group practices &amp; multi-clinician settings</div>
          <p class="service-desc">Everything in Individual, scaled for a group practice. Coordinate across multiple clinicians, manage shared calendars, and keep the whole practice running smoothly.</p>
          <ul class="service-features">
            <li>
              <div class="feat-check"><svg viewBox="0 0 10 10" fill="none"><path d="M2 5l2.5 2.5L8 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Everything in Individual Support &amp; Administration
            </li>
            <li>
              <div class="feat-check"><svg viewBox="0 0 10 10" fill="none"><path d="M2 5l2.5 2.5L8 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Multi-clinician calendar and booking coordination
            </li>
            <li>
              <div class="feat-check"><svg viewBox="0 0 10 10" fill="none"><path d="M2 5l2.5 2.5L8 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Billing and claims handled across all clinicians
            </li>
            <li>
              <div class="feat-check"><svg viewBox="0 0 10 10" fill="none"><path d="M2 5l2.5 2.5L8 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Client records maintained per clinician
            </li>
          </ul>
          <div class="guarantee-tag" style="margin-bottom:20px; color:var(--teal-light); background:rgba(90,173,160,0.15);">
            ⏱️ Practitioners typically recover 6+ hours per week
          </div>
          <a href="https://hart-hq.zohobookings.com/#/intro" target="_blank" class="btn btn-teal" style="width:100%;justify-content:center;">Enquire about Group →</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- HEARTBEAT SECTION -->
<section class="heartbeat" id="heartbeat">
  <div class="heartbeat-inner">
    <div class="heartbeat-content">
      <span class="tag">Free tool</span>
      <h2>What's your<br><em>HartBeat score?</em></h2>
      <p>A 5-minute quiz that shows you exactly where your practice stands across five key dimensions - and where the biggest opportunities are.</p>

      <div class="hb-dimensions">
        <div class="hb-dim">
          <div class="hb-dim-label">Capacity</div>
          <div class="hb-dim-bar-wrap">
            <div class="hb-dim-bar" style="width:82%;background:linear-gradient(90deg,var(--teal-mid),var(--teal))"></div>
          </div>
          <div class="hb-dim-score">82</div>
        </div>
        <div class="hb-dim">
          <div class="hb-dim-label">Revenue integrity</div>
          <div class="hb-dim-bar-wrap">
            <div class="hb-dim-bar" style="width:65%;background:linear-gradient(90deg,var(--purple-light),var(--purple))"></div>
          </div>
          <div class="hb-dim-score">65</div>
        </div>
        <div class="hb-dim">
          <div class="hb-dim-label">Conversion</div>
          <div class="hb-dim-bar-wrap">
            <div class="hb-dim-bar" style="width:71%;background:linear-gradient(90deg,var(--teal-light),var(--teal-mid))"></div>
          </div>
          <div class="hb-dim-score">71</div>
        </div>
        <div class="hb-dim">
          <div class="hb-dim-label">Retention</div>
          <div class="hb-dim-bar-wrap">
            <div class="hb-dim-bar" style="width:40%;background:linear-gradient(90deg,#f5a0a0,#e05555)"></div>
          </div>
          <div class="hb-dim-score" style="color:#f5a0a0">40</div>
        </div>
        <div class="hb-dim">
          <div class="hb-dim-label">Efficiency</div>
          <div class="hb-dim-bar-wrap">
            <div class="hb-dim-bar" style="width:78%;background:linear-gradient(90deg,var(--teal-mid),var(--teal))"></div>
          </div>
          <div class="hb-dim-score">78</div>
        </div>
      </div>

      <a href="#" class="btn btn-teal">Take the free HartBeat quiz →</a>
    </div>

    <!-- Visual -->
    <div class="hb-visual">
      <div class="hb-visual-header">
        <div class="hb-visual-title">Practice Health Report</div>
        <div class="hb-badge">Sample</div>
      </div>

      <div class="hb-score-big">
        <div class="hb-score-circle">
          <div class="hb-score-number">67<sub>/100</sub></div>
        </div>
        <div class="hb-score-desc">Overall HartBeat score - <strong style="color:rgba(255,255,255,0.7)">Needs attention</strong></div>
      </div>

      <div class="hb-dim-list">
        <div class="hb-dim-row">
          <div class="hb-dim-dot" style="background:var(--teal-mid)"></div>
          <div class="hb-dim-name">Capacity utilisation</div>
          <div class="hb-dim-pct">82%</div>
        </div>
        <div class="hb-dim-row">
          <div class="hb-dim-dot" style="background:var(--purple-light)"></div>
          <div class="hb-dim-name">Revenue integrity</div>
          <div class="hb-dim-pct">65%</div>
        </div>
        <div class="hb-dim-row">
          <div class="hb-dim-dot" style="background:var(--teal-light)"></div>
          <div class="hb-dim-name">Enquiry conversion</div>
          <div class="hb-dim-pct">71%</div>
        </div>
        <div class="hb-dim-row">
          <div class="hb-dim-dot" style="background:#e05555"></div>
          <div class="hb-dim-name">Client retention</div>
          <div class="hb-dim-pct" style="color:#f5a0a0">40% ⚠️</div>
        </div>
        <div class="hb-dim-row">
          <div class="hb-dim-dot" style="background:var(--teal-mid)"></div>
          <div class="hb-dim-name">Operational efficiency</div>
          <div class="hb-dim-pct">78%</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials" id="testimonials">
  <div class="testimonials-inner">
    <span class="tag">What practitioners say</span>
    <h2>Built for the way<br><em>clinicians actually work.</em></h2>
    <p class="testimonials-intro">From psychologists across Australia - here's what working with The Hart Centre looks like in practice.</p>

    <div class="testi-grid">
      <div class="testi-card">
        <p class="testi-text">Hart is excellent! I have worked with them for years and most of my clients are from them. I don't like to do marketing and it's an expensive business, so I allocate my marketing budget in my accounts to them because I get a steady stream of work. The booking service is excellent. They book straight into Google Calendar and you can sync that with whatever you're using presently.</p>
        <div class="testi-author">
          <div class="testi-avatar">K</div>
          <div>
            <div class="testi-name">Kathrine</div>
            <div class="testi-role">Psychologist · Perth, WA</div>
          </div>
        </div>
      </div>

      <div class="testi-card">
        <p class="testi-text">As a Hart Associate, I have been extremely well supported in my professional practice through a responsible and client-focused referral process. The Reception/Administration team at Hart also make communication an absolute pleasure and navigate the complexities of scheduling with grace and efficiency. Their understanding and attention to detail is integral in enhancing my ability to focus on my role as therapist.</p>
        <div class="testi-author">
          <div class="testi-avatar">A</div>
          <div>
            <div class="testi-name">Anita</div>
            <div class="testi-role">Psychologist · Camberwell, VIC</div>
          </div>
        </div>
      </div>

      <div class="testi-card">
        <p class="testi-text">I have been with Hart for several years now and can't speak more highly of the service. The Hart Centre admin staff are amazing, always working for the best interests of the client and the associates. They are efficient, friendly and always willing to help with any issues that may arise.</p>
        <div class="testi-author">
          <div class="testi-avatar">S</div>
          <div>
            <div class="testi-name">Sanja</div>
            <div class="testi-role">Psychologist · Hampton, VIC</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CALCULATOR TEASER -->
<section class="calc-teaser" id="calculator">
  <div class="calc-teaser-inner">
    <div class="calc-content">
      <span class="tag">Practice calculator</span>
      <h2>See what your<br>practice <em>could</em> earn.</h2>
      <p>Enter your session fee and current hours and we'll show you exactly what six recovered hours per week adds up to across a year - plus what your blended hourly rate actually looks like right now.</p>
      <a href="#" class="btn btn-primary">Open the full calculator →</a>
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
    <span class="tag">Get started today</span>
    <h2>Your practice deserves<br>to <em>run properly.</em></h2>
    <p>Start with your free HartBeat score. See where admin is costing you. Then let us handle it.</p>
    <div class="cta-final-actions">
      <a href="#heartbeat" class="btn btn-primary">Get your free HartBeat score</a>
      <a href="https://hart-hq.zohobookings.com/#/intro" target="_blank" class="btn btn-outline">Book a free call</a>
    </div>
    <p class="cta-note">No lock-in. Cancel anytime. Built by the team behind The Hart Centre.</p>
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
