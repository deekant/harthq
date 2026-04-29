<?php
/**
 * Front page template.
 */
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
        <span>For psychologists &amp; counsellors in private practice</span>
      </div>

      <h1 class="fade-up delay-1">
        Your practice,<br>
        <em>running properly.</em>
      </h1>

      <p class="hero-sub fade-up delay-2">
        Most practitioners don't need more clients - they need a practice that runs properly. HartHQ is the admin, reporting and systems layer that gets your time back so you can focus on clinical work.
      </p>

      <div class="hero-actions fade-up delay-3">
        <a href="#heartbeat" class="btn btn-primary">Get your free HartBeat score →</a>
        <a href="https://hart-hq.zohobookings.com/#/intro" target="_blank" class="btn btn-outline">Book a free call</a>
      </div>

      <div class="hero-trust fade-up delay-4">
        <span class="hero-trust-text">Trusted by practitioners across Australia</span>
        <div class="hero-trust-stats">
          <div class="hero-stat">
            <span class="hero-stat-num">400+</span>
            <span class="hero-stat-label">Practitioners</span>
          </div>
          <div class="hero-stat">
            <span class="hero-stat-num">6 hrs</span>
            <span class="hero-stat-label">Avg time saved/wk</span>
          </div>
          <div class="hero-stat">
            <span class="hero-stat-num">$0</span>
            <span class="hero-stat-label">Lock-in contract</span>
          </div>
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
    <div class="proof-item">
    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="16" cy="16" r="11.4286" fill="#E7E4FB"/>
<path d="M5.66671 12C6.95537 12 8.00004 10.9553 8.00004 9.66668C8.00004 8.37801 6.95537 7.33334 5.66671 7.33334C4.37804 7.33334 3.33337 8.37801 3.33337 9.66668C3.33337 10.9553 4.37804 12 5.66671 12Z" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M0.666626 10.6667C2.66663 10.6667 5.37396 11.8793 6.98396 13.3013L12.872 18.4993C13.4813 19.0367 14.266 19.3333 15.0786 19.3333H30V24C30 24.7367 29.4033 25.3333 28.6666 25.3333H28C27.2633 25.3333 26.6666 24.7367 26.6666 24V23.3333C26.6666 22.9653 26.368 22.6667 26 22.6667H10.6666C10.2986 22.6667 9.99996 22.9653 9.99996 23.3333V24C9.99996 24.7367 9.40329 25.3333 8.66663 25.3333H7.99996C7.26329 25.3333 6.66663 24.7367 6.66663 24V19.3333L2.58929 13.444" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M9.66669 15.6967C8.65936 14.8067 8.59402 13.2473 9.54802 12.276C10.4427 11.3647 11.9327 11.4067 12.8894 12.252L15.09 14.1733C15.4547 14.4913 15.922 14.6667 16.4054 14.6667H17.7087C18.078 14.6667 18.44 14.5647 18.7547 14.3713L22.832 11.87C23.382 11.5327 24.094 11.6373 24.5234 12.118L28.876 16.9913C29.3914 17.5687 29.334 18.4567 28.7474 18.962C28.1994 19.434 27.38 19.4053 26.8674 18.8953L23.5714 15.6173L20.058 19.3333" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linejoin="round"/>
</svg>
      Registered psychologists &amp; counsellors only
    </div>
    <div class="proof-divider"></div>
    <div class="proof-item">
    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="16" cy="16" r="11.4286" fill="#D5EBE0"/>
<path d="M20.6694 13.0006L15.2207 20.3339L11.3361 17.0006" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M27.8348 16.3338C27.8348 17.5458 26.4742 18.5278 26.1188 19.6211C25.7508 20.7545 26.2615 22.3458 25.5755 23.2891C24.8822 24.2418 23.2062 24.2445 22.2535 24.9378C21.3102 25.6245 20.7935 27.2218 19.6602 27.5898C18.5668 27.9451 17.2148 26.9678 16.0028 26.9678C14.7908 26.9678 13.4388 27.9444 12.3455 27.5898C11.2122 27.2218 10.6955 25.6245 9.75218 24.9378C8.79951 24.2445 7.12351 24.2418 6.43018 23.2891C5.74351 22.3458 6.25484 20.7545 5.88684 19.6211C5.53218 18.5278 4.17151 17.5458 4.17151 16.3338C4.17151 15.1218 5.53218 14.1398 5.88751 13.0465C6.25551 11.9131 5.74484 10.3218 6.43084 9.37845C7.12418 8.42578 8.80018 8.42312 9.75284 7.72978C10.6962 7.04312 11.2128 5.44578 12.3462 5.07778C13.4395 4.72245 14.7915 5.69978 16.0035 5.69978C17.2155 5.69978 18.5675 4.72312 19.6608 5.07778C20.7942 5.44578 21.3108 7.04312 22.2542 7.72978C23.2068 8.42312 24.8828 8.42578 25.5762 9.37845C26.2628 10.3218 25.7515 11.9131 26.1195 13.0465C26.4742 14.1398 27.8348 15.1218 27.8348 16.3338Z" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
      AHPRA, APS, PACFA aware
    </div>
    <div class="proof-divider"></div>
    <div class="proof-item">
    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="16" cy="16" r="11.4286" fill="#E7E4FB"/>
<path d="M25.3333 22.6667V25.3333L26.6666 26.6667" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M25.3333 30.6667C28.2789 30.6667 30.6667 28.2789 30.6667 25.3333C30.6667 22.3878 28.2789 20 25.3333 20C22.3878 20 20 22.3878 20 25.3333C20 28.2789 22.3878 30.6667 25.3333 30.6667Z" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round"/>
<path d="M17.3334 26.6667H5.33335C3.86069 26.6667 2.66669 25.4727 2.66669 24V8.66666C2.66669 7.19399 3.86069 5.99999 5.33335 5.99999H6.66669V3.33332C6.66669 2.96666 6.96669 2.66666 7.33335 2.66666H10C10.3667 2.66666 10.6667 2.96666 10.6667 3.33332V5.99999" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M26.7127 6.384C27.4847 6.85067 28 7.69867 28 8.66667V20.6667" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M13.3333 5.99999H20V3.33332C20 2.96666 20.3 2.66666 20.6666 2.66666H23.3333C23.7 2.66666 24 2.96666 24 3.33332V5.99999" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7.33331 16.6667H9.99998V14.6667" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M14 16.6667H16.6667V14.6667" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7.33331 22.6667H9.99998V20.6667" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M14 22.6667H16.6667V20.6667" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M20.6667 16.6667H23.3334V14.6667" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
      No lock-in, cancel anytime
    </div>
    <div class="proof-divider"></div>
    <div class="proof-item">
    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="16.0001" cy="16" r="13.7143" fill="#E7E4FB"/>
<path d="M7.08663 15.3333C8.37529 15.3333 9.41996 14.2887 9.41996 13C9.41996 11.7113 8.37529 10.6667 7.08663 10.6667C5.79796 10.6667 4.7533 11.7113 4.7533 13C4.7533 14.2887 5.79796 15.3333 7.08663 15.3333Z" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M25.0866 15.3333C26.3753 15.3333 27.42 14.2887 27.42 13C27.42 11.7113 26.3753 10.6667 25.0866 10.6667C23.798 10.6667 22.7533 11.7113 22.7533 13C22.7533 14.2887 23.798 15.3333 25.0866 15.3333Z" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M25.426 22.6667H28.678C29.4994 22.6667 30.0814 21.88 29.8267 21.114L29.6494 20.58C29.0047 18.6433 27.1634 17.3333 25.0867 17.3333C23.572 17.3333 22.182 18.0307 21.2914 19.1593" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M6.74785 22.6667H3.49585C2.67451 22.6667 2.09251 21.88 2.34718 21.114L2.52451 20.58C3.16918 18.6433 5.00985 17.3333 7.08651 17.3333C8.60118 17.3333 9.99118 18.0307 10.8818 19.1593" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M11.244 24H20.93C22.038 24 22.8226 22.918 22.4793 21.8647L22.24 21.1307C21.3706 18.468 18.888 16.6667 16.0866 16.6667C13.286 16.6667 10.8026 18.468 9.93396 21.1307L9.69463 21.8647C9.3513 22.918 10.136 24 11.244 24Z" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M16.0865 14C17.7434 14 19.0865 12.6569 19.0865 11C19.0865 9.34315 17.7434 8 16.0865 8C14.4297 8 13.0865 9.34315 13.0865 11C13.0865 12.6569 14.4297 14 16.0865 14Z" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
      Built by the team behind The Hart Centre
    </div>
    <div class="proof-divider"></div>
    <div class="proof-item">
    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="16" cy="16" r="11.4286" fill="#C8E8E4"/>
<path d="M20.2734 17.4547L22.6874 19.8687C23.392 20.5733 23.392 21.716 22.6874 22.4207C21.9827 23.1253 20.84 23.1253 20.1354 22.4207L17.7214 20.0067" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M17.7213 20.0073L20.1352 22.4213C20.8399 23.126 20.8399 24.2687 20.1352 24.9733C19.4306 25.678 18.2879 25.678 17.5833 24.9733L15.1693 22.5593" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M28.0613 16.572L28.6667 15.9667C31.244 13.3893 31.244 9.21067 28.6667 6.63333C26.0893 4.056 21.9107 4.056 19.3333 6.63333L14.2 11.7667C14.8187 12.928 16.136 13.5467 17.4193 13.2567C18.236 13.072 19.0293 12.752 20.1287 12.1953L25.2393 17.3167C25.944 18.0213 25.944 19.164 25.2393 19.8687C24.5347 20.5733 23.392 20.5733 22.6873 19.8687L20.2733 17.4547" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15.1693 22.5593L17.5833 24.9733C18.288 25.678 18.288 26.8207 17.5833 27.5253C16.8787 28.23 15.736 28.23 15.0313 27.5253L4.49532 17.0013C1.69599 14.2053 1.67465 9.67534 4.44665 6.852C7.24865 3.99867 11.8387 3.97267 14.6733 6.794L14.98 7.124" stroke="#1C1C1E" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
      Australia-based support team
    </div>
  </div>
</div>

<!-- PROBLEM SECTION -->
<section class="problem" id="about">
  <div class="problem-inner">
    <div class="problem-content">
      <span class="tag">The real problem</span>
      <h2>You didn't train for <em>six years</em> to spend your afternoons on admin.</h2>
      <p>Most practitioners running private practices are losing 7-13 hours a week to tasks that have nothing to do with clinical work. Chasing cancellations. Updating notes. Following up missed appointments. Trying to figure out why referrals dried up.</p>
      <p>The numbers in your practice don't lie - but unless someone's watching them, they'll quietly erode your income, your time, and eventually your energy for the work you love.</p>
      <a href="#services" class="btn btn-ghost">See what HartHQ does →</a>
    </div>

    <div class="problem-quotes">
      <div class="problem-quote">
        <p>"I don't have a work-life balance problem. I have an admin problem that looks like a work-life balance problem."</p>
      </div>
      <div class="problem-quote">
        <p>"Every hour on admin is an hour I could have billed. You don't always do that maths, but when you do it's uncomfortable."</p>
      </div>
      <div class="problem-quote">
        <p>"I'm essentially paying myself $30 an hour to do admin I hate, instead of $150 an hour to do work I love."</p>
      </div>
      <div class="problem-quote">
        <p>"I went part-time because I was burning out - but half of it wasn't the clients, it was everything around the clients."</p>
      </div>
      <div class="problem-quote">
        <p>"The admin doesn't stay in its lane, it bleeds into everything. I'm thinking about a referral letter while I'm trying to be present with a client."</p>
      </div>
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
