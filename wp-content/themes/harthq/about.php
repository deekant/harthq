<?php
/**
 * Template Name: About Page
 */
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

<!-- Shared Hart Centre heart mark - exact official paths -->
<svg width="0" height="0" style="position:absolute">
  <defs>
    <symbol id="hart-heart" viewBox="0 0 204 226" xmlns="http://www.w3.org/2000/svg">
      <path fill="currentColor" d="M184.5,153.88c-3.5.61-18.27,3.02-38,4.02,2.53-3.92,4.74-8.05,6.58-12.37,14.03-32.9,15.95-94.39-17.63-122.62-33.6-28.21-59.36,1.23-60.73,21.78-1.39,20.55,11.65,43.33,11.65,43.33-19.33-2.76-65.79-3.15-68.32,31.51-2.45,33.52,40.1,48.16,83.73,49.92,6,.25,11.84.21,17.45-.05-20.34,25.16-49.38,39.52-55.95,42.57-.74.34-1.04,1.23-.66,1.95h0c.34.65,1.12.95,1.8.68,30.53-11.95,57.46-26.59,74.83-47,23.55-3.19,40.76-9.25,45.92-11.21.81-.31,1.11-1.31.59-2.01h0c-.3-.4-.79-.6-1.28-.52ZM136.38,138.1c-2.22,7.26-5.42,14.01-9.25,20.23-10.38-.07-21.42-.68-32.47-2.13-45.4-5.99-52.52-26.76-43.82-39.64,8.81-13.04,29.57-15.19,38.76-16.56,3.63-.55,6.99-1.2,9.77-1.8,2.01-.44,3.06-2.63,2.15-4.47-2.04-4.11-4.1-8.7-6.09-13.74-10.43-26.37,17.63-49.23,31.2-34.04,13.57,15.19,24.77,43.09,9.74,92.17Z"/>
    </symbol>
  </defs>
</svg>

<!-- NAV -->
<nav class="nav" id="nav">
  <a href="<?php echo esc_url( home_url('/') ); ?>" class="nav-logo">
    <svg class="nav-logo-mark" viewBox="0 0 204 226" style="color:#B8B0E8">
      <use href="#hart-heart"/>
    </svg>
    <span class="nav-logo-text">Hart<span>HQ</span></span>
  </a>
  <ul class="nav-links">
    <li><a href="<?php echo esc_url( home_url('/heartbeat/') ); ?>">HartBeat Score</a></li>
    <li><a href="<?php echo esc_url( home_url('/about/') ); ?>" class="active">About</a></li>
  </ul>
  <a href="<?php echo esc_url( home_url('/heartbeat/') ); ?>" class="nav-cta">Get your HartBeat score</a>
  <button class="nav-mobile-toggle" id="mobileToggle" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
</nav>

<!-- HERO -->
<section class="hero">
  <svg class="hero-watermark" viewBox="0 0 204 226" style="color:white">
    <use href="#hart-heart"/>
  </svg>
  <div class="hero-inner">
    <div class="hero-eyebrow">
      <span class="hero-eyebrow-dot"></span>
      <span>Built by the team behind The Hart Centre</span>
    </div>
    <h1>We know what it costs<br>to run a practice <em>alone.</em></h1>
    <p class="hero-sub">HartHQ was built to change that. Backed by The Hart Centre's 18 years working alongside Australian therapists, we understand what's actually eating your time - and your margins.</p>
    <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url('/heartbeat/') ); ?>" class="btn btn-primary">Take the HartBeat quiz - free</a>
      <a href="#contact" class="btn btn-outline">Get in touch</a>
    </div>
  </div>
</section>

<!-- ORIGIN -->
<section class="origin">
  <div class="origin-inner">
    <div class="origin-stat-block">
      <div class="origin-stat">
        <div class="origin-stat-num">18<em>+</em></div>
        <div class="origin-stat-label">Years working with Australian psychologists and counsellors through The Hart Centre</div>
      </div>
      <div class="origin-stat">
        <div class="origin-stat-num">400<em>+</em></div>
        <div class="origin-stat-label">We've worked with over 400 psychologists and therapists across The Hart Centre network over our time, so we know the profession deeply</div>
      </div>
      <div class="origin-stat">
        <div class="origin-stat-num">6<em>hrs</em></div>
        <div class="origin-stat-label">Typically recovered per week by practitioners using HartHQ admin support</div>
      </div>
    </div>
    <div class="origin-copy">
      <span class="tag">Our story</span>
      <h2>Built on 18 years of experience.</h2>
      <p>The Hart Centre has been connecting clients with therapists across Australia for nearly two decades. Working closely alongside hundreds of psychologists and counsellors in that time, we kept seeing the same problem.</p>
      <p>Incredibly skilled clinicians spending hours each week on admin that had nothing to do with therapy. Notes. Invoices. Emails. Scheduling. Fee reviews that never happened. Systems that didn't talk to each other. Time that should have been spent with clients, or simply resting.</p>
      <p>Three years ago, we built HartHQ as our answer to that problem - a dedicated practice support and growth service, built specifically for Australian therapists who are serious about building a practice that's both clinically meaningful and financially sustainable.</p>
    </div>
  </div>
</section>

<!-- WHAT WE BELIEVE -->
<section class="beliefs">
  <div class="beliefs-inner">
    <div class="beliefs-header">
      <span class="tag">What we believe</span>
      <h2>Good therapy starts with a<br><em>well-run practice.</em></h2>
      <p>We're not here to add complexity. We're here to clear the decks so you can focus on the work you trained for.</p>
    </div>
    <div class="beliefs-grid">
      <div class="belief-card">
        <div class="belief-icon">🕐</div>
        <h3>Time is clinical</h3>
        <p>Every hour you spend on admin is an hour you're not spending with a client, on CPD, or on your own wellbeing. That's not a minor inconvenience - it's a clinical quality issue.</p>
      </div>
      <div class="belief-card">
        <div class="belief-icon">📊</div>
        <h3>Know your numbers</h3>
        <p>Too many practitioners are running at a loss without realising it. Your fee hasn't kept pace with inflation. Your blended hourly rate is much lower than you think. Knowing changes everything.</p>
      </div>
      <div class="belief-card">
        <div class="belief-icon">🛡️</div>
        <h3>Sustainable, not just busy</h3>
        <p>A full caseload isn't the goal - a sustainable one is. We help practices build the systems and margins to still be running, and thriving, five years from now.</p>
      </div>
    </div>
  </div>
</section>

<!-- HART CENTRE CONNECTION -->
<section class="connection">
  <div class="connection-inner">
    <div class="connection-copy">
      <span class="tag">The Hart Centre connection</span>
      <h2>18 years of trust,<br><em>one step further.</em></h2>
      <p>HartHQ is the practice support arm of The Hart Centre - Australia's trusted relationship therapy referral network, operating for nearly two decades. Three years ago, we launched HartHQ to channel everything we'd learned working alongside practitioners into a dedicated practice growth service.</p>
      <p>If you're already a Hart Centre associate, you'll recognise our approach: practical, honest, and firmly on the side of the practitioner.</p>
      <a href="https://thehartcentre.com.au" target="_blank" class="connection-link">
        Visit The Hart Centre
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8H13M13 8L9 4M13 8L9 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
    <div class="connection-card">
      <div class="connection-card-label">What this means for you</div>
      <div class="connection-point">
        <div class="connection-point-icon">✓</div>
        <div class="connection-point-text">
          <strong>Deep practitioner knowledge</strong>
          <span>We're not a generic VA service. We understand Medicare, rebate systems, clinical notes, and the specific pressures of Australian private practice.</span>
        </div>
      </div>
      <div class="connection-point">
        <div class="connection-point-icon">✓</div>
        <div class="connection-point-text">
          <strong>Consistent client flow</strong>
          <span>Hart Centre associates benefit from referrals to support a steady, full caseload - so your Concierge time goes toward clients, not chasing enquiries.</span>
        </div>
      </div>
      <div class="connection-point">
        <div class="connection-point-icon">✓</div>
        <div class="connection-point-text">
          <strong>Real time back in your week</strong>
          <span>Practitioners using HartHQ typically recover 6+ hours per week - time that goes back into client work, CPD, or simply switching off.</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- HOW WE WORK -->
<section class="how-we-work">
  <div class="how-we-work-inner">
    <div class="how-we-work-header">
      <span class="tag">How we work</span>
      <h2>Simple. Practical. <em>No lock-in.</em></h2>
      <p>We don't believe in complicated onboarding or 12-month commitments. You start where it makes sense for your practice right now.</p>
    </div>
    <div class="how-grid">
      <div class="how-card">
        <div class="how-num">01</div>
        <h3>Start with your HartBeat</h3>
        <p>The free HartBeat quiz shows you exactly where your practice is leaking time and money. It takes 5 minutes and gives you a clear picture of where to focus.</p>
      </div>
      <div class="how-card">
        <div class="how-num">02</div>
        <h3>Pick your entry point</h3>
        <p>Start with a toolkit, a Fee Review, or jump straight into Concierge support. There's no wrong answer - just the right fit for where you are now.</p>
      </div>
      <div class="how-card">
        <div class="how-num">03</div>
        <h3>We handle the rest</h3>
        <p>Our HartHQ admin team takes on the tasks that shouldn't be on your plate. You stay in the room with clients. We keep everything else running.</p>
      </div>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section class="contact" id="contact">
  <div class="contact-inner">
    <span class="tag">Get in touch</span>
    <h2>Ready to talk about<br><em>your practice?</em></h2>
    <p style="font-size:18px; margin-bottom:48px; max-width:520px; margin-left:auto; margin-right:auto;">Whether you have a question, want to explore what's right for your practice, or just want to know more - we'd love to hear from you.</p>
    <div class="contact-options">
      <div class="contact-option">
        <div class="contact-option-icon">📅</div>
        <h3>Book a chat</h3>
        <p>A free 20-minute conversation about where you're at and whether HartHQ is the right fit. No pressure, no pitch.</p>
        <a href="https://hart-hq.zohobookings.com/#/intro" target="_blank" class="btn btn-teal">Book a free call</a>
      </div>
      <div class="contact-option">
        <div class="contact-option-icon">✉️</div>
        <h3>Send us a message</h3>
        <p>Prefer to write? Email us directly and someone from our team will get back to you within one business day.</p>
        <a href="mailto:hq@thehartcentre.com.au" class="btn btn-ghost">hq@thehartcentre.com.au</a>
      </div>
    </div>
    <p class="contact-note">Based in Australia. We work with practitioners across all states and territories.<br>HartHQ is part of <a href="https://thehartcentre.com.au" target="_blank">The Hart Centre</a> group. ABN 46 143 297 509.</p>
  </div>
</section>

<!-- CTA FINAL -->
<section class="cta-final">
  <span class="tag">Get started</span>
  <h2>See what your practice<br>score looks like.</h2>
  <p>The HartBeat quiz is free, takes 5 minutes, and gives you a clear picture of where time and money are being lost.</p>
  <div class="cta-final-actions">
    <a href="<?php echo esc_url( home_url('/heartbeat/') ); ?>" class="btn btn-primary">Take the HartBeat quiz - free</a>
    <a href="<?php echo esc_url( home_url('/about/#contact') ); ?>" class="btn btn-outline">Get in touch</a>
  </div>
  <p class="cta-note">No lock-in. Cancel anytime. Built by the team behind The Hart Centre.</p>
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
        <li><a href="<?php echo esc_url( home_url('/heartbeat/') ); ?>">HartBeat Score</a></li>
        <li><a href="https://hart-hq.zohobookings.com/#/intro" target="_blank">Book a free call</a></li>
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
    <div class="footer-col">
      <h4>Get in touch</h4>
      <ul>
        <li><a href="mailto:hq@thehartcentre.com.au">hq@thehartcentre.com.au</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2025 HartHQ. Part of The Hart Centre group. ABN 46 143 297 509.</p>
    <div class="footer-bottom-links">
      <a href="<?php echo esc_url( home_url('/privacy-policy/') ); ?>">Privacy</a>
      <a href="https://thehartcentre.com.au" target="_blank">thehartcentre.com.au</a>
    </div>
  </div>
</footer>


<?php wp_footer(); ?>
</body>
</html>
