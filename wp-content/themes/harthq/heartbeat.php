<?php
/**
 * Template Name: Heartbeat Page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HartBeat Score - Free Practice Health Assessment | HartHQ</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&family=Figtree:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<?php wp_head(); ?>
</head>
<body>
<?php wp_body_open(); ?>

<!-- Shared heart mark symbol -->
<svg width="0" height="0" style="position:absolute">
  <defs>
    <symbol id="hart-heart" viewBox="0 0 204 226" xmlns="http://www.w3.org/2000/svg">
      <path fill="currentColor" d="M184.5,153.88c-3.5.61-18.27,3.02-38,4.02,2.53-3.92,4.74-8.05,6.58-12.37,14.03-32.9,15.95-94.39-17.63-122.62-33.6-28.21-59.36,1.23-60.73,21.78-1.39,20.55,11.65,43.33,11.65,43.33-19.33-2.76-65.79-3.15-68.32,31.51-2.45,33.52,40.1,48.16,83.73,49.92,6,.25,11.84.21,17.45-.05-20.34,25.16-49.38,39.52-55.95,42.57-.74.34-1.04,1.23-.66,1.95h0c.34.65,1.12.95,1.8.68,30.53-11.95,57.46-26.59,74.83-47,23.55-3.19,40.76-9.25,45.92-11.21.81-.31,1.11-1.31.59-2.01h0c-.3-.4-.79-.6-1.28-.52ZM136.38,138.1c-2.22,7.26-5.42,14.01-9.25,20.23-10.38-.07-21.42-.68-32.47-2.13-45.4-5.99-52.52-26.76-43.82-39.64,8.81-13.04,29.57-15.19,38.76-16.56,3.63-.55,6.99-1.2,9.77-1.8,2.01-.44,3.06-2.63,2.15-4.47-2.04-4.11-4.1-8.7-6.09-13.74-10.43-26.37,17.63-49.23,31.2-34.04,13.57,15.19,24.77,43.09,9.74,92.17Z"/>
    </symbol>
  </defs>
</svg>

<!-- NAV -->
<nav class="nav">
  <a href="<?php echo esc_url( home_url('/') ); ?>" class="nav-logo">
    <svg class="nav-logo-mark" viewBox="0 0 204 226" style="color:#B8B0E8">
      <use href="#hart-heart"/>
    </svg>
    <span class="nav-logo-text">Hart<span>HQ</span></span>
  </a>
  <span class="nav-tag">Practice Health Assessment</span>
  <a href="<?php echo esc_url( home_url('/') ); ?>" class="nav-back">← Back to HartHQ</a>
</nav>

<!-- HERO -->
<div class="hero">
  <svg class="hero-watermark" viewBox="0 0 204 226">
    <use href="#hart-heart"/>
  </svg>
  <div class="hero-eyebrow">HartBeat Score - Free</div>
  <h1>How healthy is<br><em>your practice?</em></h1>
  <p class="hero-sub">20 questions across 5 dimensions of practice health. Takes about 4 minutes. No right or wrong answers - just an honest look at where you are.</p>
  <div class="hero-pills">
    <div class="hero-pill"><div class="pill-dot"></div>5 dimensions</div>
    <div class="hero-pill"><div class="pill-dot"></div>20 questions</div>
    <div class="hero-pill"><div class="pill-dot"></div>Score out of 100</div>
    <div class="hero-pill"><div class="pill-dot"></div>~4 minutes</div>
  </div>
</div>

<!-- PROGRESS -->
<div class="progress-bar">
  <div class="progress-label">
    <span class="pl-text">Your progress</span>
    <span class="pl-count" id="progress-count">0 of 20 answered</span>
  </div>
  <div class="progress-track">
    <div class="progress-fill" id="progress-fill"></div>
  </div>
</div>

<!-- MAIN -->
<div class="main" id="main-content">

  <!-- ── DIMENSION 1: CAPACITY ── -->
  <div class="dimension d1" id="dim-1">
    <div class="dim-header">
      <div class="dim-number">01</div>
      <div class="dim-info">
        <div class="dim-tag">Dimension 1</div>
        <div class="dim-title">Capacity Utilisation</div>
        <div class="dim-desc">Are you working at a volume that's sustainable - and are the sessions you schedule actually happening?</div>
      </div>
      <div class="dim-score-badge" id="badge-1">
        <div class="dsb-val" id="score-d1">-</div>
        <div class="dsb-max">/20</div>
      </div>
    </div>
    <div class="questions">

      <div class="question" data-dim="1" data-q="1">
        <div class="q-text">What percentage of your scheduled sessions are actually delivered? (accounting for no-shows and same-day cancellations)</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>Under 70% - I lose a lot of sessions<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>70–79% - fairly common gaps<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>80–84% - occasional gaps<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>85–92% - mostly solid<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>93%+ - very few missed sessions<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="1" data-q="2">
        <div class="q-text">How many client sessions do you typically see in a week?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>Fewer than 10 - well below capacity<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>10–14 - building but not full<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>15–18 - comfortably occupied<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>19–22 - near capacity<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>23+ - full, sometimes overcommitted<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="1" data-q="3">
        <div class="q-text">When a client cancels, how quickly can you typically fill that slot?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>Rarely - gaps stay empty<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>Sometimes - depends on the week<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>Often - I have a short list to call<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Usually - I have a waitlist<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Always - waitlist means gaps never stay empty<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="1" data-q="4">
        <div class="q-text">Do you have a written cancellation policy that you enforce consistently?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>No policy - I handle it case by case<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>I have a policy but rarely enforce it<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>I have a policy but make frequent exceptions<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>I have a policy and apply it most of the time<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Clear policy, consistently applied - clients know upfront<div class="opt-score">5/5</div></button>
        </div>
      </div>

    </div>
  </div>

  <!-- ── DIMENSION 2: CLINICAL CONTINUITY ── -->
  <div class="dimension d2" id="dim-2">
    <div class="dim-header">
      <div class="dim-number">02</div>
      <div class="dim-info">
        <div class="dim-tag">Dimension 2</div>
        <div class="dim-title">Clinical Continuity</div>
        <div class="dim-desc">Are clients completing therapy - or dropping out before they get the outcomes they came for?</div>
      </div>
      <div class="dim-score-badge" id="badge-2">
        <div class="dsb-val" id="score-d2">-</div>
        <div class="dsb-max">/20</div>
      </div>
    </div>
    <div class="questions">

      <div class="question" data-dim="2" data-q="1">
        <div class="q-text">On average, how many sessions does a typical client have with you before ending treatment?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>1–3 sessions - most don't come back<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>4–5 sessions - short courses<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>6–8 sessions - reasonable completion<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>9–12 sessions - good depth of work<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>13+ sessions - clients complete full course of therapy<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="2" data-q="2">
        <div class="q-text">How do most clients rebook their next appointment?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>They contact us when they feel ready<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>We send a reminder but many don't respond<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>I suggest rebooking in session but don't always follow up<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Most clients rebook before leaving or get an automated prompt<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>We have a systematic rebooking process - most are booked before leaving<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="2" data-q="3">
        <div class="q-text">How often do clients drop out of therapy without a planned ending?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>Very often - it's the norm<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>Often - maybe half don't have a formal ending<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>Sometimes - maybe a third drop out unplanned<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Occasionally - most clients have planned endings<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Rarely - therapy endings are collaborative and planned<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="2" data-q="4">
        <div class="q-text">Do you have a consistent process for following up clients who miss an appointment or go quiet?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>No - if they don't rebook, we wait<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>Sometimes - depends on the client<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>We send a message but don't always follow through<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Yes - we follow up within 48 hours<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Yes - we have a clear protocol and it works well<div class="opt-score">5/5</div></button>
        </div>
      </div>

    </div>
  </div>

  <!-- ── DIMENSION 3: REVENUE INTEGRITY ── -->
  <div class="dimension d3" id="dim-3">
    <div class="dim-header">
      <div class="dim-number">03</div>
      <div class="dim-info">
        <div class="dim-tag">Dimension 3</div>
        <div class="dim-title">Revenue Integrity</div>
        <div class="dim-desc">Are you being appropriately compensated for your expertise - and is your fee structure working for you?</div>
      </div>
      <div class="dim-score-badge" id="badge-3">
        <div class="dsb-val" id="score-d3">-</div>
        <div class="dsb-max">/20</div>
      </div>
    </div>
    <div class="questions">

      <div class="question" data-dim="3" data-q="1">
        <div class="q-text">When did you last review and adjust your session fee?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>More than 3 years ago - or never<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>2–3 years ago<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>1–2 years ago<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Within the last 12 months<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Within the last 6 months - I review it regularly<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="3" data-q="2">
        <div class="q-text">How does your fee compare to other practitioners in your area with similar experience?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>I genuinely don't know<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>Probably below average - I've kept fees low<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>Around average for my area<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Slightly above average - I've positioned deliberately<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Above average - my niche and experience justify a premium<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="3" data-q="3">
        <div class="q-text">What proportion of your clients pay your full private fee (vs. reduced gap fee via Medicare or concession)?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>Under 20% - almost all are Medicare or concession<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>20–40% full fee<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>40–60% full fee<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>60–80% full fee<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Over 80% - mostly private, minimal Medicare dependency<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="3" data-q="4">
        <div class="q-text">Do you accept clients through EAP panels, BetterHelp, or similar platforms that set the fee for you?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>Yes - a significant portion of my caseload is platform-referred<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>Yes - some EAP or platform clients<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>A small number - I'm selective about panels<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Very few - I've moved away from platform dependency<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>No - I set my own fees across my entire caseload<div class="opt-score">5/5</div></button>
        </div>
      </div>

    </div>
  </div>

  <!-- ── DIMENSION 4: ADMINISTRATIVE LOAD ── -->
  <div class="dimension d4" id="dim-4">
    <div class="dim-header">
      <div class="dim-number">04</div>
      <div class="dim-info">
        <div class="dim-tag">Dimension 4</div>
        <div class="dim-title">Administrative Load</div>
        <div class="dim-desc">How much of your working week is spent on tasks that don't require your clinical expertise?</div>
      </div>
      <div class="dim-score-badge" id="badge-4">
        <div class="dsb-val" id="score-d4">-</div>
        <div class="dsb-max">/20</div>
      </div>
    </div>
    <div class="questions">

      <div class="question" data-dim="4" data-q="1">
        <div class="q-text">How many hours per week do you personally spend on practice administration? (scheduling, invoicing, client communications, reports, insurance)</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>More than 12 hours<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>9–12 hours<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>6–8 hours<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>3–5 hours<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Under 3 hours - I have good systems or support<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="4" data-q="2">
        <div class="q-text">When a new client enquires, how quickly are they typically responded to?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>Often more than 48 hours - I miss some enquiries<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>Usually within 24–48 hours<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>Within same business day<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Within a few hours<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Within the hour - I have a system for this<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="4" data-q="3">
        <div class="q-text">How automated is your client intake, reminders, and invoicing?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>Almost nothing is automated - I do it manually<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>Some automation - reminders only<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>Moderate - reminders and invoicing, intake still manual<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Mostly automated - I check and adjust but rarely input<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Fully systemised - intake, reminders, invoicing run without me<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="4" data-q="4">
        <div class="q-text">Do you review your practice's financial health (revenue trends, no-show rate, avg client value) on a regular basis?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>Never - I don't really look at the numbers<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>Once a year, around tax time<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>Quarterly - I check in a few times a year<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Monthly - I have a rough sense of how the practice is tracking<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Monthly with a structured report - I know my key numbers<div class="opt-score">5/5</div></button>
        </div>
      </div>

    </div>
  </div>

  <!-- ── DIMENSION 5: PRACTICE RESILIENCE ── -->
  <div class="dimension d5" id="dim-5">
    <div class="dim-header">
      <div class="dim-number">05</div>
      <div class="dim-info">
        <div class="dim-tag">Dimension 5</div>
        <div class="dim-title">Practice Resilience</div>
        <div class="dim-desc">How vulnerable is your practice to disruption - and how would it hold up if life got complicated?</div>
      </div>
      <div class="dim-score-badge" id="badge-5">
        <div class="dsb-val" id="score-d5">-</div>
        <div class="dsb-max">/20</div>
      </div>
    </div>
    <div class="questions">

      <div class="question" data-dim="5" data-q="1">
        <div class="q-text">How consistently does new client work arrive without you actively chasing it?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>Rarely - I'm always actively hunting for new clients<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>Inconsistently - good months and dry months<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>Fairly regularly - I have some reliable sources<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Consistently - referrals come in without much effort<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Always - I have a waitlist and turn away work<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="5" data-q="2">
        <div class="q-text">How would your weekly income be affected if your 3 longest-attending clients all ended therapy at the same time?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>It would be a major blow - they make up most of my income<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>Significant impact - it would take months to recover<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>Noticeable but manageable - I have enough other clients<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Modest impact - I have a good spread at different stages<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Minimal - my caseload is well distributed across many clients<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="5" data-q="3">
        <div class="q-text">How quickly can a new client get an appointment with you?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>Same week - I have availability most weeks<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>About 1 week wait<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>About 2 weeks wait<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>3-4 weeks wait<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>5+ weeks - I have an active waitlist<div class="opt-score">5/5</div></button>
        </div>
      </div>

      <div class="question" data-dim="5" data-q="4">
        <div class="q-text">If you needed to take 4 weeks off unexpectedly, how would your practice hold up?</div>
        <div class="options">
          <button class="opt" data-score="1" onclick="selectOpt(this)"><div class="opt-dot"></div>It would collapse - everything depends on me being present<div class="opt-score">1/5</div></button>
          <button class="opt" data-score="2" onclick="selectOpt(this)"><div class="opt-dot"></div>Very difficult - I'd lose clients and income significantly<div class="opt-score">2/5</div></button>
          <button class="opt" data-score="3" onclick="selectOpt(this)"><div class="opt-dot"></div>Manageable but painful - some systems exist<div class="opt-score">3/5</div></button>
          <button class="opt" data-score="4" onclick="selectOpt(this)"><div class="opt-dot"></div>Mostly fine - admin could be covered, clients would hold<div class="opt-score">4/5</div></button>
          <button class="opt" data-score="5" onclick="selectOpt(this)"><div class="opt-dot"></div>Well covered - I have documented processes and client communication plans<div class="opt-score">5/5</div></button>
        </div>
      </div>

    </div>
  </div>

  <!-- SUBMIT -->
  <div class="submit-wrap" id="submit-wrap">
    <button class="submit-btn" id="submit-btn" onclick="showResults()">Calculate my HartBeat Score →</button>
    <div class="submit-note">Your responses are not stored or shared.</div>
  </div>

  <!-- ── RESULTS ── -->
  <div id="results">

    <div class="results-hero">
      <div class="rh-tag">Your HartBeat Score</div>
      <div class="score-display" id="final-score">-</div>
      <div class="score-band" id="score-band">-</div>
      <div class="score-desc" id="score-desc">-</div>
      <div style="margin-top:20px;">
        <button onclick="showEmailModal()" style="display:inline-flex;align-items:center;gap:8px;font-family:var(--ff-body);font-size:14px;font-weight:600;padding:11px 22px;border-radius:100px;border:1.5px solid var(--purple-light);background:transparent;color:var(--purple);cursor:pointer;transition:all 0.2s;" onmouseover="this.style.background='var(--purple-pale)'" onmouseout="this.style.background='transparent'">
          ✉ Email my results to myself
        </button>
      </div>
    </div>

    <!-- EMAIL MODAL -->
    <div id="email-modal" style="display:none;position:fixed;inset:0;background:rgba(15,26,62,0.6);z-index:500;align-items:center;justify-content:center;">
      <div style="background:white;border-radius:20px;padding:40px;max-width:440px;width:90%;position:relative;">
        <button onclick="hideEmailModal()" style="position:absolute;top:16px;right:16px;background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-muted);">×</button>
        <h3 style="font-family:var(--ff-head);font-size:24px;font-weight:400;color:var(--navy);margin-bottom:8px;">Email my results</h3>
        <p style="font-size:14px;color:var(--text-muted);margin-bottom:24px;line-height:1.6;">Enter your email and we'll open a pre-filled message with your full HartBeat results. Hit send from your email client to get a copy.</p>
        <label style="font-size:12px;font-weight:600;letter-spacing:0.8px;text-transform:uppercase;color:var(--text-muted);font-family:var(--ff-body);">Your email address</label>
        <input type="email" id="email-input" placeholder="you@yourpractice.com.au" style="width:100%;margin-top:8px;margin-bottom:20px;padding:12px 16px;border:1.5px solid var(--light-grey);border-radius:10px;font-family:var(--ff-body);font-size:15px;outline:none;" onfocus="this.style.borderColor='var(--purple)'" onblur="this.style.borderColor='var(--light-grey)'">
        <button onclick="sendResultsEmail()" style="width:100%;padding:14px;background:var(--purple);color:white;border:none;border-radius:100px;font-family:var(--ff-body);font-size:15px;font-weight:600;cursor:pointer;">Open in my email app →</button>
        <p style="font-size:11px;color:var(--text-muted);margin-top:12px;text-align:center;">A copy will also go to the HartHQ team so we can follow up.</p>
      </div>
    </div>

    <!-- BURNOUT INDICATOR -->
    <div id="burnout-indicator"></div>

    <!-- DIM BARS -->
    <div class="dim-bars">
      <div class="db-title">Score by dimension</div>

      <div class="dim-bar-row">
        <div class="dbr-header">
          <span class="dbr-label">Capacity Utilisation</span>
          <span class="dbr-score" style="color:var(--d1);" id="bar-score-1">0/20</span>
        </div>
        <div class="dbr-track"><div class="dbr-fill" id="bar-fill-1" style="background:var(--d1);"></div></div>
        <div class="dbr-insight" id="bar-insight-1"></div>
      </div>

      <div class="dim-bar-row">
        <div class="dbr-header">
          <span class="dbr-label">Clinical Continuity</span>
          <span class="dbr-score" style="color:var(--d2);" id="bar-score-2">0/20</span>
        </div>
        <div class="dbr-track"><div class="dbr-fill" id="bar-fill-2" style="background:var(--d2);"></div></div>
        <div class="dbr-insight" id="bar-insight-2"></div>
      </div>

      <div class="dim-bar-row">
        <div class="dbr-header">
          <span class="dbr-label">Revenue Integrity</span>
          <span class="dbr-score" style="color:var(--d3);" id="bar-score-3">0/20</span>
        </div>
        <div class="dbr-track"><div class="dbr-fill" id="bar-fill-3" style="background:var(--d3);"></div></div>
        <div class="dbr-insight" id="bar-insight-3"></div>
      </div>

      <div class="dim-bar-row">
        <div class="dbr-header">
          <span class="dbr-label">Administrative Load</span>
          <span class="dbr-score" style="color:var(--d4);" id="bar-score-4">0/20</span>
        </div>
        <div class="dbr-track"><div class="dbr-fill" id="bar-fill-4" style="background:var(--d4);"></div></div>
        <div class="dbr-insight" id="bar-insight-4"></div>
      </div>

      <div class="dim-bar-row">
        <div class="dbr-header">
          <span class="dbr-label">Practice Resilience</span>
          <span class="dbr-score" style="color:var(--d5);" id="bar-score-5">0/20</span>
        </div>
        <div class="dbr-track"><div class="dbr-fill" id="bar-fill-5" style="background:var(--d5);"></div></div>
        <div class="dbr-insight" id="bar-insight-5"></div>
      </div>

    </div>

    <!-- PRIORITY CARDS -->
    <div class="priority-cards" id="priority-cards"></div>

    <!-- HARDHQ CTA -->
    <div class="hardhq-cta" id="hardhq-cta"></div>

    <!-- MINI CALCULATOR -->
    <div class="mini-calc">
      <div class="mini-calc-title">What is your admin actually costing you?</div>
      <div class="mini-calc-sub">Enter your numbers to see the revenue impact of getting your admin time back.</div>

      <div class="calc-inputs">
        <div>
          <div class="calc-input-label">Your session fee</div>
          <div class="calc-input-wrap">
            <span class="calc-input-symbol">$</span>
            <input type="number" id="calc-fee" value="200" min="80" max="500" step="10" oninput="updateMiniCalc()">
          </div>
        </div>
        <div>
          <div class="calc-input-label">Sessions / week</div>
          <div class="calc-input-wrap">
            <input type="number" id="calc-sessions" value="20" min="1" max="40" step="1" oninput="updateMiniCalc()">
            <span class="calc-input-symbol" style="font-size:11px;white-space:nowrap">ses</span>
          </div>
          <div id="notes-hint" style="font-size:10px;color:var(--text-muted);margin-top:4px;font-style:italic;">+ 10 hrs notes + prep est.</div>
        </div>
        <div>
          <div class="calc-input-label">Admin hrs / week</div>
          <div class="calc-input-wrap">
            <input type="number" id="calc-admin" value="8" min="3" max="20" step="1" oninput="updateMiniCalc()">
            <span class="calc-input-symbol" style="font-size:11px;white-space:nowrap">hrs</span>
          </div>
        </div>
        <div>
          <div class="calc-input-label">Working weeks / yr</div>
          <div class="calc-input-wrap">
            <input type="number" id="calc-weeks" value="46" min="36" max="50" step="1" oninput="updateMiniCalc()">
            <span class="calc-input-symbol" style="font-size:11px;white-space:nowrap">wks</span>
          </div>
        </div>
      </div>

      <div class="calc-results">
        <div class="calc-result-box crb-red">
          <div class="crb-label">Your admin costs you</div>
          <div class="crb-val" id="mc-cost">$0</div>
          <div class="crb-sub">per year at your rate</div>
        </div>
        <div class="calc-result-box crb-purple">
          <div class="crb-label">Hours returned / week</div>
          <div class="crb-val" id="mc-hours">0 hrs</div>
          <div class="crb-sub">admin drops to ~2 hrs</div>
        </div>
        <div class="calc-result-box crb-teal">
          <div class="crb-label">Net gain if hours filled</div>
          <div class="crb-val" id="mc-gain">$0</div>
          <div class="crb-sub" id="mc-gain-sub">after HartHQ from $250/wk</div>
        </div>
      </div>

      <div class="calc-note">Assumes HartHQ reduces your admin to ~2 hrs/week. 75% of saved hours realistically become sessions. Net gain shown after estimated HartHQ Individual Support & Administration cost from $250/wk. Estimates only - run your own numbers with your accountant.</div>

      <!-- BLENDED RATE ROW -->
      <div style="margin-top:20px; padding-top:18px; border-top:1px solid var(--light-grey);">
        <div style="font-size:10px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;color:var(--text-muted);font-family:var(--ff-body);margin-bottom:10px;">Your blended hourly rate</div>
        <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;">
          <div style="background:var(--off-white);border:1px solid var(--light-grey);border-radius:10px;padding:14px;text-align:center;">
            <div style="font-size:9px;font-weight:700;letter-spacing:0.8px;text-transform:uppercase;color:var(--text-muted);font-family:var(--ff-body);margin-bottom:6px;line-height:1.3;">Your rate now</div>
            <div style="font-family:var(--ff-head);font-size:22px;font-weight:600;color:var(--dark);line-height:1;" id="mc-blended-now">-</div>
            <div style="font-size:9px;color:var(--text-muted);margin-top:4px;font-family:var(--ff-body);">per hour actually worked</div>
          </div>
          <div style="background:var(--purple-pale);border:1px solid var(--purple-light);border-radius:10px;padding:14px;text-align:center;">
            <div style="font-size:9px;font-weight:700;letter-spacing:0.8px;text-transform:uppercase;color:var(--purple);font-family:var(--ff-body);margin-bottom:6px;line-height:1.3;">Admin off your plate</div>
            <div style="font-family:var(--ff-head);font-size:22px;font-weight:600;color:var(--purple);line-height:1;" id="mc-blended-mid">-</div>
            <div style="font-size:9px;color:var(--purple);margin-top:4px;font-family:var(--ff-body);opacity:0.8;">same revenue, fewer hours</div>
          </div>
          <div style="background:var(--teal-pale);border:1px solid var(--teal-light);border-radius:10px;padding:14px;text-align:center;">
            <div style="font-size:9px;font-weight:700;letter-spacing:0.8px;text-transform:uppercase;color:var(--teal);font-family:var(--ff-body);margin-bottom:6px;line-height:1.3;">Admin off + hours filled</div>
            <div style="font-family:var(--ff-head);font-size:22px;font-weight:600;color:var(--teal);line-height:1;" id="mc-blended-best">-</div>
            <div style="font-size:9px;color:var(--teal);margin-top:4px;font-family:var(--ff-body);opacity:0.8;">more revenue, fewer hours</div>
          </div>
        </div>
      </div>

      <!-- WEEK BREAKDOWN TABLE -->
      <div style="margin-top:16px;background:var(--off-white);border:1px solid var(--light-grey);border-radius:10px;padding:14px 16px;">
        <div style="font-size:10px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;color:var(--text-muted);font-family:var(--ff-body);margin-bottom:10px;">Your working week, broken down</div>
        <div style="display:flex;justify-content:space-between;font-size:12px;font-family:var(--ff-body);padding:5px 0;border-bottom:1px solid var(--light-grey);color:var(--text-muted);">
          <span>Client sessions</span><span id="wb-sessions">-</span>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:12px;font-family:var(--ff-body);padding:5px 0;border-bottom:1px solid var(--light-grey);color:var(--text-muted);">
          <span>Notes + Prep (est. 30 min each)</span><span id="wb-notes">-</span>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:12px;font-family:var(--ff-body);padding:5px 0;border-bottom:1px solid var(--light-grey);color:var(--text-muted);">
          <span>Admin</span><span id="wb-admin" style="color:#e05555;">-</span>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:12px;font-family:var(--ff-body);padding:6px 0 0;font-weight:600;color:var(--text);">
          <span>Total hours worked</span><span id="wb-total">-</span>
        </div>
      </div>
    </div>

    <!-- PRODUCT CTA CARDS -->
    <div class="product-ctas">
      <a href="#concierge" class="product-cta-card">
        <div class="pcc-tag" style="color:var(--purple);">Full admin support</div>
        <div class="pcc-title">Individual Support & Administration</div>
        <div class="pcc-price">From $250<span style="font-size:14px;color:var(--text-muted);font-family:var(--ff-body);font-weight:400;">/week</span></div>
        <div class="pcc-desc">Our HartHQ admin team handles your calls, calendar and invoicing. Practitioners typically recover 6+ hours per week.</div>
        <div class="pcc-link" style="color:var(--purple);">Enquire about Concierge <span>→</span></div>
      </a>
      <a href="#concierge" class="product-cta-card">
        <div class="pcc-tag" style="color:var(--teal);">For group practices</div>
        <div class="pcc-title">Group Support & Administration</div>
        <div class="pcc-price">From $350<span style="font-size:14px;color:var(--text-muted);font-family:var(--ff-body);font-weight:400;">/week</span></div>
        <div class="pcc-desc">Everything in Individual, scaled for a group practice. Coordinate across multiple clinicians with one dedicated support team.</div>
        <div class="pcc-link" style="color:var(--teal);">Enquire about Group <span>→</span></div>
      </a>
    </div>

    <div class="disclaimer">HartBeat Score is a self-reported practice health indicator. It is not a clinical or financial assessment and results should not be used as the basis for significant business decisions without independent advice. Scores reflect your responses at the time of completion and will change as your practice evolves.</div>

    <button class="restart-btn" onclick="restartAssessment()">↩ Start over</button>

  </div><!-- /results -->

</div><!-- /main -->


<?php wp_footer(); ?>
</body>
</html>
