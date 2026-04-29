<?php
/**
 * Shared top navigation for About/Privacy pages.
 *
 * @var array $args
 */
$active = isset($args['active']) ? (string) $args['active'] : '';
?>
<!-- Shared Hart Centre heart mark - exact official paths -->
<svg width="0" height="0" style="position:absolute">
  <defs>
    <symbol id="hart-heart" viewBox="0 0 204 226" xmlns="http://www.w3.org/2000/svg">
      <path fill="currentColor" d="M184.5,153.88c-3.5.61-18.27,3.02-38,4.02,2.53-3.92,4.74-8.05,6.58-12.37,14.03-32.9,15.95-94.39-17.63-122.62-33.6-28.21-59.36,1.23-60.73,21.78-1.39,20.55,11.65,43.33,11.65,43.33-19.33-2.76-65.79-3.15-68.32,31.51-2.45,33.52,40.1,48.16,83.73,49.92,6,.25,11.84.21,17.45-.05-20.34,25.16-49.38,39.52-55.95,42.57-.74.34-1.04,1.23-.66,1.95h0c.34.65,1.12.95,1.8.68,30.53-11.95,57.46-26.59,74.83-47,23.55-3.19,40.76-9.25,45.92-11.21.81-.31,1.11-1.31.59-2.01h0c-.3-.4-.79-.6-1.28-.52ZM136.38,138.1c-2.22,7.26-5.42,14.01-9.25,20.23-10.38-.07-21.42-.68-32.47-2.13-45.4-5.99-52.52-26.76-43.82-39.64,8.81-13.04,29.57-15.19,38.76-16.56,3.63-.55,6.99-1.2,9.77-1.8,2.01-.44,3.06-2.63,2.15-4.47-2.04-4.11-4.1-8.7-6.09-13.74-10.43-26.37,17.63-49.23,31.2-34.04,13.57,15.19,24.77,43.09,9.74,92.17Z"/>
    </symbol>
  </defs>
</svg>

<!-- NAV -->
<nav class="about-nav policy-nav" id="nav">
  <a href="<?php echo esc_url( home_url('/') ); ?>" class="about-nav-logo policy-nav-logo">
    <svg class="about-nav-logo-mark policy-nav-logo-mark" viewBox="0 0 204 226" style="color:#B8B0E8">
      <use href="#hart-heart"/>
    </svg>
    <span class="about-nav-logo-text policy-nav-logo-text">Hart<span>HQ</span></span>
  </a>
  <ul class="about-nav-links policy-nav-links">
    <li><a href="<?php echo esc_url( home_url('/heartbeat/') ); ?>">HartBeat Score</a></li>
    <li><a href="<?php echo esc_url( home_url('/about/') ); ?>"<?php echo $active === 'about' ? ' class="about-active"' : ''; ?>>About</a></li>
  </ul>
  <a href="<?php echo esc_url( home_url('/heartbeat/') ); ?>" class="about-nav-cta policy-nav-cta">Get your HartBeat score</a>
  <button class="about-nav-mobile-toggle policy-nav-mobile-toggle" id="mobileToggle" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
</nav>
