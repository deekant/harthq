<?php
/**
 * Template Name: Heartbeat Page
 */

$page_id = 0;
if ( is_singular( 'page' ) ) {
	$page_id = (int) get_queried_object_id();
	if ( ! $page_id ) {
		$page_id = (int) get_the_ID();
	}
}

$heartbeat_hero_eyebrow  = '';
$heartbeat_hero_heading  = '';
$heartbeat_hero_subtext  = '';
$heartbeat_hero_pills    = array();
$heartbeat_dimensions    = array();
$heartbeat_submit_button_label    = '';
$heartbeat_submit_note            = '';
$heartbeat_results_hero_tag     = '';
$heartbeat_results_email_button_label = '';
$heartbeat_email_modal_title    = '';
$heartbeat_email_modal_intro    = '';
$heartbeat_email_modal_field_label = '';
$heartbeat_email_modal_placeholder = '';
$heartbeat_email_modal_submit_label = '';
$heartbeat_email_modal_footer_note = '';
$heartbeat_dim_bars_title       = '';
$heartbeat_calc_title           = '';
$heartbeat_calc_subtitle        = '';
$heartbeat_calc_label_fee       = '';
$heartbeat_calc_label_sessions = '';
$heartbeat_calc_label_admin     = '';
$heartbeat_calc_label_weeks     = '';
$heartbeat_calc_notes_hint      = '';
$heartbeat_calc_result_label_cost = '';
$heartbeat_calc_result_sub_cost = '';
$heartbeat_calc_result_label_hours = '';
$heartbeat_calc_result_sub_hours = '';
$heartbeat_calc_result_label_net = '';
$heartbeat_calc_result_sub_net = '';
$heartbeat_calc_disclaimer     = '';
$heartbeat_calc_blended_section_title = '';
$heartbeat_calc_blended_col_now_title = '';
$heartbeat_calc_blended_col_now_sub = '';
$heartbeat_calc_blended_col_mid_title = '';
$heartbeat_calc_blended_col_mid_sub = '';
$heartbeat_calc_blended_col_best_title = '';
$heartbeat_calc_blended_col_best_sub = '';
$heartbeat_calc_week_section_title = '';
$heartbeat_calc_week_row_sessions = '';
$heartbeat_calc_week_row_notes = '';
$heartbeat_calc_week_row_admin = '';
$heartbeat_calc_week_row_total = '';
$heartbeat_product_cards = array();
$heartbeat_results_disclaimer = '';
$heartbeat_restart_label = '';

if ( function_exists( 'get_field' ) && $page_id ) {
	$heartbeat_hero_eyebrow  = (string) get_field( 'heartbeat_hero_eyebrow', $page_id );
	$heartbeat_hero_heading  = (string) get_field( 'heartbeat_hero_heading', $page_id );
	$heartbeat_hero_subtext  = (string) get_field( 'heartbeat_hero_subtext', $page_id );
	$pills                   = get_field( 'heartbeat_hero_pills', $page_id );
	$heartbeat_hero_pills    = is_array( $pills ) ? $pills : array();
	$dims                    = get_field( 'heartbeat_dimensions', $page_id );
	$heartbeat_dimensions    = is_array( $dims ) ? $dims : array();
	$heartbeat_submit_button_label       = (string) get_field( 'heartbeat_submit_button_label', $page_id );
	$heartbeat_submit_note               = (string) get_field( 'heartbeat_submit_note', $page_id );
	$heartbeat_results_hero_tag        = (string) get_field( 'heartbeat_results_hero_tag', $page_id );
	$heartbeat_results_email_button_label = (string) get_field( 'heartbeat_results_email_button_label', $page_id );
	$heartbeat_email_modal_title         = (string) get_field( 'heartbeat_email_modal_title', $page_id );
	$heartbeat_email_modal_intro         = (string) get_field( 'heartbeat_email_modal_intro', $page_id );
	$heartbeat_email_modal_field_label   = (string) get_field( 'heartbeat_email_modal_field_label', $page_id );
	$heartbeat_email_modal_placeholder   = (string) get_field( 'heartbeat_email_modal_placeholder', $page_id );
	$heartbeat_email_modal_submit_label  = (string) get_field( 'heartbeat_email_modal_submit_label', $page_id );
	$heartbeat_email_modal_footer_note   = (string) get_field( 'heartbeat_email_modal_footer_note', $page_id );
	$heartbeat_dim_bars_title            = (string) get_field( 'heartbeat_dim_bars_title', $page_id );
	$heartbeat_calc_title                = (string) get_field( 'heartbeat_calc_title', $page_id );
	$heartbeat_calc_subtitle             = (string) get_field( 'heartbeat_calc_subtitle', $page_id );
	$heartbeat_calc_label_fee            = (string) get_field( 'heartbeat_calc_label_fee', $page_id );
	$heartbeat_calc_label_sessions       = (string) get_field( 'heartbeat_calc_label_sessions', $page_id );
	$heartbeat_calc_label_admin          = (string) get_field( 'heartbeat_calc_label_admin', $page_id );
	$heartbeat_calc_label_weeks          = (string) get_field( 'heartbeat_calc_label_weeks', $page_id );
	$heartbeat_calc_notes_hint           = (string) get_field( 'heartbeat_calc_notes_hint', $page_id );
	$heartbeat_calc_result_label_cost    = (string) get_field( 'heartbeat_calc_result_label_cost', $page_id );
	$heartbeat_calc_result_sub_cost      = (string) get_field( 'heartbeat_calc_result_sub_cost', $page_id );
	$heartbeat_calc_result_label_hours   = (string) get_field( 'heartbeat_calc_result_label_hours', $page_id );
	$heartbeat_calc_result_sub_hours     = (string) get_field( 'heartbeat_calc_result_sub_hours', $page_id );
	$heartbeat_calc_result_label_net     = (string) get_field( 'heartbeat_calc_result_label_net', $page_id );
	$heartbeat_calc_result_sub_net       = (string) get_field( 'heartbeat_calc_result_sub_net', $page_id );
	$heartbeat_calc_disclaimer           = (string) get_field( 'heartbeat_calc_disclaimer', $page_id );
	$heartbeat_calc_blended_section_title = (string) get_field( 'heartbeat_calc_blended_section_title', $page_id );
	$heartbeat_calc_blended_col_now_title = (string) get_field( 'heartbeat_calc_blended_col_now_title', $page_id );
	$heartbeat_calc_blended_col_now_sub  = (string) get_field( 'heartbeat_calc_blended_col_now_sub', $page_id );
	$heartbeat_calc_blended_col_mid_title = (string) get_field( 'heartbeat_calc_blended_col_mid_title', $page_id );
	$heartbeat_calc_blended_col_mid_sub  = (string) get_field( 'heartbeat_calc_blended_col_mid_sub', $page_id );
	$heartbeat_calc_blended_col_best_title = (string) get_field( 'heartbeat_calc_blended_col_best_title', $page_id );
	$heartbeat_calc_blended_col_best_sub = (string) get_field( 'heartbeat_calc_blended_col_best_sub', $page_id );
	$heartbeat_calc_week_section_title   = (string) get_field( 'heartbeat_calc_week_section_title', $page_id );
	$heartbeat_calc_week_row_sessions    = (string) get_field( 'heartbeat_calc_week_row_sessions', $page_id );
	$heartbeat_calc_week_row_notes       = (string) get_field( 'heartbeat_calc_week_row_notes', $page_id );
	$heartbeat_calc_week_row_admin       = (string) get_field( 'heartbeat_calc_week_row_admin', $page_id );
	$heartbeat_calc_week_row_total       = (string) get_field( 'heartbeat_calc_week_row_total', $page_id );
	$cards                               = get_field( 'heartbeat_product_cards', $page_id );
	$heartbeat_product_cards             = is_array( $cards ) ? $cards : array();
	$heartbeat_results_disclaimer        = (string) get_field( 'heartbeat_results_disclaimer', $page_id );
	$heartbeat_restart_label             = (string) get_field( 'heartbeat_restart_label', $page_id );
}

$heartbeat_question_count = 0;
foreach ( $heartbeat_dimensions as $dim_row_count ) {
	if ( ! is_array( $dim_row_count ) ) {
		continue;
	}
	$qq = $dim_row_count['dimension_questions'] ?? null;
	if ( ! is_array( $qq ) ) {
		continue;
	}
	foreach ( $qq as $qr ) {
		if ( ! is_array( $qr ) ) {
			continue;
		}
		$qo = $qr['question_options'] ?? null;
		if ( ! is_array( $qo ) ) {
			continue;
		}
		$opt_n = 0;
		foreach ( $qo as $ox ) {
			if ( is_array( $ox ) ) {
				++$opt_n;
			}
		}
		if ( $opt_n > 0 ) {
			++$heartbeat_question_count;
		}
	}
}

$allowed_hero_heading = array(
	'em' => array(),
	'br' => array(),
);
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
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
    <svg class="nav-logo-mark" viewBox="0 0 204 226" style="color:#B8B0E8">
      <use href="#hart-heart"/>
    </svg>
    <span class="nav-logo-text">Hart<span>HQ</span></span>
  </a>
  <span class="nav-tag">Practice Health Assessment</span>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-back">← Back to HartHQ</a>
</nav>

<!-- HERO -->
<div class="hero">
  <svg class="hero-watermark" viewBox="0 0 204 226">
    <use href="#hart-heart"/>
  </svg>
  <div class="hero-eyebrow"><?php echo esc_html( $heartbeat_hero_eyebrow ); ?></div>
  <h1><?php echo wp_kses( $heartbeat_hero_heading, $allowed_hero_heading ); ?></h1>
  <p class="hero-sub"><?php echo esc_html( $heartbeat_hero_subtext ); ?></p>
  <div class="hero-pills">
    <?php foreach ( $heartbeat_hero_pills as $pill_row ) : ?>
      <?php $pl = is_array( $pill_row ) ? (string) ( $pill_row['pill_label'] ?? '' ) : ''; ?>
    <div class="hero-pill"><div class="pill-dot"></div><?php echo esc_html( $pl ); ?></div>
    <?php endforeach; ?>
  </div>
</div>

<!-- PROGRESS -->
<div class="progress-bar">
  <div class="progress-label">
    <span class="pl-text">Your progress</span>
    <span class="pl-count" id="progress-count">0 of <?php echo (int) $heartbeat_question_count; ?> answered</span>
  </div>
  <div class="progress-track">
    <div class="progress-fill" id="progress-fill"></div>
  </div>
</div>

<!-- MAIN -->
<div class="main" id="main-content">

  <?php
	$dim_i = 0;
	foreach ( $heartbeat_dimensions as $dim_row ) :
		if ( ! is_array( $dim_row ) ) {
			continue;
		}
		++$dim_i;
		$dim_class = 'd' . $dim_i;
		$dim_tag   = (string) ( $dim_row['dimension_tag'] ?? '' );
		$dim_title = (string) ( $dim_row['dimension_title'] ?? '' );
		$dim_desc  = (string) ( $dim_row['dimension_description'] ?? '' );
		$questions = $dim_row['dimension_questions'] ?? null;
		$questions = is_array( $questions ) ? $questions : array();
		$dim_question_count = 0;
		$dim_max_score        = 0;
		foreach ( $questions as $q_row_count ) {
			if ( ! is_array( $q_row_count ) ) {
				continue;
			}
			$opts_for_max = $q_row_count['question_options'] ?? null;
			$opts_for_max = is_array( $opts_for_max ) ? $opts_for_max : array();
			$n_opts       = 0;
			foreach ( $opts_for_max as $opt_m ) {
				if ( is_array( $opt_m ) ) {
					++$n_opts;
				}
			}
			if ( $n_opts < 1 ) {
				continue;
			}
			++$dim_question_count;
			$dim_max_score += $n_opts;
		}
		?>
  <div class="dimension <?php echo esc_attr( $dim_class ); ?>" id="dim-<?php echo (int) $dim_i; ?>">
    <div class="dim-header">
      <div class="dim-number"><?php echo esc_html( str_pad( (string) $dim_i, 2, '0', STR_PAD_LEFT ) ); ?></div>
      <div class="dim-info">
        <?php if ( '' !== $dim_tag ) : ?>
        <div class="dim-tag"><?php echo esc_html( $dim_tag ); ?></div>
        <?php endif; ?>
        <div class="dim-title"><?php echo esc_html( $dim_title ); ?></div>
        <div class="dim-desc"><?php echo esc_html( $dim_desc ); ?></div>
      </div>
      <div class="dim-score-badge" id="badge-<?php echo (int) $dim_i; ?>">
        <div class="dsb-val" id="score-d<?php echo (int) $dim_i; ?>">-</div>
        <div class="dsb-max">/<?php echo (int) $dim_max_score; ?></div>
      </div>
    </div>
    <div class="questions">
		<?php
		$q_i = 0;
		foreach ( $questions as $q_row ) :
			if ( ! is_array( $q_row ) ) {
				continue;
			}
			$q_text  = (string) ( $q_row['question_text'] ?? '' );
			$options = $q_row['question_options'] ?? null;
			$options = is_array( $options ) ? $options : array();
			$q_max_score = 0;
			foreach ( $options as $opt_row_cnt ) {
				if ( is_array( $opt_row_cnt ) ) {
					++$q_max_score;
				}
			}
			if ( $q_max_score < 1 ) {
				continue;
			}
			++$q_i;
			?>
      <div class="question" data-dim="<?php echo (int) $dim_i; ?>" data-q="<?php echo (int) $q_i; ?>" data-max-score="<?php echo (int) $q_max_score; ?>">
        <div class="q-text"><?php echo esc_html( $q_text ); ?></div>
        <div class="options">
			<?php
			$opt_score = 0;
			foreach ( $options as $opt_row ) :
				if ( ! is_array( $opt_row ) ) {
					continue;
				}
				++$opt_score;
				$opt_label = (string) ( $opt_row['option_label'] ?? '' );
				?>
          <button class="opt" data-score="<?php echo (int) $opt_score; ?>" onclick="selectOpt(this)"><div class="opt-dot"></div><?php echo esc_html( $opt_label ); ?><div class="opt-score"><?php echo (int) $opt_score; ?>/<?php echo (int) $q_max_score; ?></div></button>
			<?php endforeach; ?>
        </div>
      </div>
		<?php endforeach; ?>
    </div>
  </div>
	<?php endforeach; ?>

  <!-- SUBMIT -->
  <div class="submit-wrap" id="submit-wrap">
    <button class="submit-btn" id="submit-btn" onclick="showResults()"><?php echo esc_html( $heartbeat_submit_button_label ); ?></button>
    <div class="submit-note"><?php echo esc_html( $heartbeat_submit_note ); ?></div>
  </div>

  <!-- ── RESULTS ── -->
  <div id="results">

    <div class="results-hero">
      <div class="rh-tag"><?php echo esc_html( $heartbeat_results_hero_tag ); ?></div>
      <div class="score-display" id="final-score">-</div>
      <div class="score-band" id="score-band">-</div>
      <div class="score-desc" id="score-desc">-</div>
      <div style="margin-top:20px;">
        <button type="button" onclick="showEmailModal()" style="display:inline-flex;align-items:center;gap:8px;font-family:var(--ff-body);font-size:14px;font-weight:600;padding:11px 22px;border-radius:100px;border:1.5px solid var(--purple-light);background:transparent;color:var(--purple);cursor:pointer;transition:all 0.2s;" onmouseover="this.style.background='var(--purple-pale)'" onmouseout="this.style.background='transparent'">
          <?php echo esc_html( $heartbeat_results_email_button_label ); ?>
        </button>
      </div>
    </div>

    <!-- EMAIL MODAL -->
    <div id="email-modal" style="display:none;position:fixed;inset:0;background:rgba(15,26,62,0.6);z-index:500;align-items:center;justify-content:center;">
      <div style="background:white;border-radius:20px;padding:40px;max-width:440px;width:90%;position:relative;">
        <button type="button" onclick="hideEmailModal()" style="position:absolute;top:16px;right:16px;background:none;border:none;font-size:20px;cursor:pointer;color:var(--text-muted);">×</button>
        <h3 style="font-family:var(--ff-head);font-size:24px;font-weight:400;color:var(--navy);margin-bottom:8px;"><?php echo esc_html( $heartbeat_email_modal_title ); ?></h3>
        <p style="font-size:14px;color:var(--text-muted);margin-bottom:24px;line-height:1.6;"><?php echo esc_html( $heartbeat_email_modal_intro ); ?></p>
        <label style="font-size:12px;font-weight:600;letter-spacing:0.8px;text-transform:uppercase;color:var(--text-muted);font-family:var(--ff-body);"><?php echo esc_html( $heartbeat_email_modal_field_label ); ?></label>
        <input type="email" id="email-input" placeholder="<?php echo esc_attr( $heartbeat_email_modal_placeholder ); ?>" style="width:100%;margin-top:8px;margin-bottom:20px;padding:12px 16px;border:1.5px solid var(--light-grey);border-radius:10px;font-family:var(--ff-body);font-size:15px;outline:none;" onfocus="this.style.borderColor='var(--purple)'" onblur="this.style.borderColor='var(--light-grey)'">
        <button type="button" onclick="sendResultsEmail()" style="width:100%;padding:14px;background:var(--purple);color:white;border:none;border-radius:100px;font-family:var(--ff-body);font-size:15px;font-weight:600;cursor:pointer;"><?php echo esc_html( $heartbeat_email_modal_submit_label ); ?></button>
        <p style="font-size:11px;color:var(--text-muted);margin-top:12px;text-align:center;"><?php echo esc_html( $heartbeat_email_modal_footer_note ); ?></p>
      </div>
    </div>

    <!-- BURNOUT INDICATOR -->
    <div id="burnout-indicator"></div>

    <!-- DIM BARS -->
    <div class="dim-bars">
      <div class="db-title"><?php echo esc_html( $heartbeat_dim_bars_title ); ?></div>

		<?php
		$bar_i = 0;
		foreach ( $heartbeat_dimensions as $dim_row_bar ) :
			if ( ! is_array( $dim_row_bar ) ) {
				continue;
			}
			++$bar_i;
			$bar_label = (string) ( $dim_row_bar['dimension_title'] ?? '' );
			$dvar      = 'var(--d' . $bar_i . ')';
			?>
      <div class="dim-bar-row">
        <div class="dbr-header">
          <span class="dbr-label"><?php echo esc_html( $bar_label ); ?></span>
          <span class="dbr-score" style="color:<?php echo esc_attr( $dvar ); ?>;" id="bar-score-<?php echo (int) $bar_i; ?>">0/20</span>
        </div>
        <div class="dbr-track"><div class="dbr-fill" id="bar-fill-<?php echo (int) $bar_i; ?>" style="background:<?php echo esc_attr( $dvar ); ?>;"></div></div>
        <div class="dbr-insight" id="bar-insight-<?php echo (int) $bar_i; ?>"></div>
      </div>
		<?php endforeach; ?>

    </div>

    <!-- PRIORITY CARDS -->
    <div class="priority-cards" id="priority-cards"></div>

    <!-- HARDHQ CTA -->
    <div class="hardhq-cta" id="hardhq-cta"></div>

    <!-- MINI CALCULATOR -->
    <div class="mini-calc">
      <div class="mini-calc-title"><?php echo esc_html( $heartbeat_calc_title ); ?></div>
      <div class="mini-calc-sub"><?php echo esc_html( $heartbeat_calc_subtitle ); ?></div>

      <div class="calc-inputs">
        <div>
          <div class="calc-input-label"><?php echo esc_html( $heartbeat_calc_label_fee ); ?></div>
          <div class="calc-input-wrap">
            <span class="calc-input-symbol">$</span>
            <input type="number" id="calc-fee" value="200" min="80" max="500" step="10" oninput="updateMiniCalc()">
          </div>
        </div>
        <div>
          <div class="calc-input-label"><?php echo esc_html( $heartbeat_calc_label_sessions ); ?></div>
          <div class="calc-input-wrap">
            <input type="number" id="calc-sessions" value="20" min="1" max="40" step="1" oninput="updateMiniCalc()">
            <span class="calc-input-symbol" style="font-size:11px;white-space:nowrap">ses</span>
          </div>
          <div id="notes-hint" style="font-size:10px;color:var(--text-muted);margin-top:4px;font-style:italic;"><?php echo esc_html( $heartbeat_calc_notes_hint ); ?></div>
        </div>
        <div>
          <div class="calc-input-label"><?php echo esc_html( $heartbeat_calc_label_admin ); ?></div>
          <div class="calc-input-wrap">
            <input type="number" id="calc-admin" value="8" min="3" max="20" step="1" oninput="updateMiniCalc()">
            <span class="calc-input-symbol" style="font-size:11px;white-space:nowrap">hrs</span>
          </div>
        </div>
        <div>
          <div class="calc-input-label"><?php echo esc_html( $heartbeat_calc_label_weeks ); ?></div>
          <div class="calc-input-wrap">
            <input type="number" id="calc-weeks" value="46" min="36" max="50" step="1" oninput="updateMiniCalc()">
            <span class="calc-input-symbol" style="font-size:11px;white-space:nowrap">wks</span>
          </div>
        </div>
      </div>

      <div class="calc-results">
        <div class="calc-result-box crb-red">
          <div class="crb-label"><?php echo esc_html( $heartbeat_calc_result_label_cost ); ?></div>
          <div class="crb-val" id="mc-cost">$0</div>
          <div class="crb-sub"><?php echo esc_html( $heartbeat_calc_result_sub_cost ); ?></div>
        </div>
        <div class="calc-result-box crb-purple">
          <div class="crb-label"><?php echo esc_html( $heartbeat_calc_result_label_hours ); ?></div>
          <div class="crb-val" id="mc-hours">0 hrs</div>
          <div class="crb-sub"><?php echo esc_html( $heartbeat_calc_result_sub_hours ); ?></div>
        </div>
        <div class="calc-result-box crb-teal">
          <div class="crb-label"><?php echo esc_html( $heartbeat_calc_result_label_net ); ?></div>
          <div class="crb-val" id="mc-gain">$0</div>
          <div class="crb-sub" id="mc-gain-sub"><?php echo esc_html( $heartbeat_calc_result_sub_net ); ?></div>
        </div>
      </div>

      <div class="calc-note"><?php echo esc_html( $heartbeat_calc_disclaimer ); ?></div>

      <!-- BLENDED RATE ROW -->
      <div style="margin-top:20px; padding-top:18px; border-top:1px solid var(--light-grey);">
        <div style="font-size:10px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;color:var(--text-muted);font-family:var(--ff-body);margin-bottom:10px;"><?php echo esc_html( $heartbeat_calc_blended_section_title ); ?></div>
        <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;">
          <div style="background:var(--off-white);border:1px solid var(--light-grey);border-radius:10px;padding:14px;text-align:center;">
            <div style="font-size:9px;font-weight:700;letter-spacing:0.8px;text-transform:uppercase;color:var(--text-muted);font-family:var(--ff-body);margin-bottom:6px;line-height:1.3;"><?php echo esc_html( $heartbeat_calc_blended_col_now_title ); ?></div>
            <div style="font-family:var(--ff-head);font-size:22px;font-weight:600;color:var(--dark);line-height:1;" id="mc-blended-now">-</div>
            <div style="font-size:9px;color:var(--text-muted);margin-top:4px;font-family:var(--ff-body);"><?php echo esc_html( $heartbeat_calc_blended_col_now_sub ); ?></div>
          </div>
          <div style="background:var(--purple-pale);border:1px solid var(--purple-light);border-radius:10px;padding:14px;text-align:center;">
            <div style="font-size:9px;font-weight:700;letter-spacing:0.8px;text-transform:uppercase;color:var(--purple);font-family:var(--ff-body);margin-bottom:6px;line-height:1.3;"><?php echo esc_html( $heartbeat_calc_blended_col_mid_title ); ?></div>
            <div style="font-family:var(--ff-head);font-size:22px;font-weight:600;color:var(--purple);line-height:1;" id="mc-blended-mid">-</div>
            <div style="font-size:9px;color:var(--purple);margin-top:4px;font-family:var(--ff-body);opacity:0.8;"><?php echo esc_html( $heartbeat_calc_blended_col_mid_sub ); ?></div>
          </div>
          <div style="background:var(--teal-pale);border:1px solid var(--teal-light);border-radius:10px;padding:14px;text-align:center;">
            <div style="font-size:9px;font-weight:700;letter-spacing:0.8px;text-transform:uppercase;color:var(--teal);font-family:var(--ff-body);margin-bottom:6px;line-height:1.3;"><?php echo esc_html( $heartbeat_calc_blended_col_best_title ); ?></div>
            <div style="font-family:var(--ff-head);font-size:22px;font-weight:600;color:var(--teal);line-height:1;" id="mc-blended-best">-</div>
            <div style="font-size:9px;color:var(--teal);margin-top:4px;font-family:var(--ff-body);opacity:0.8;"><?php echo esc_html( $heartbeat_calc_blended_col_best_sub ); ?></div>
          </div>
        </div>
      </div>

      <!-- WEEK BREAKDOWN TABLE -->
      <div style="margin-top:16px;background:var(--off-white);border:1px solid var(--light-grey);border-radius:10px;padding:14px 16px;">
        <div style="font-size:10px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;color:var(--text-muted);font-family:var(--ff-body);margin-bottom:10px;"><?php echo esc_html( $heartbeat_calc_week_section_title ); ?></div>
        <div style="display:flex;justify-content:space-between;font-size:12px;font-family:var(--ff-body);padding:5px 0;border-bottom:1px solid var(--light-grey);color:var(--text-muted);">
          <span><?php echo esc_html( $heartbeat_calc_week_row_sessions ); ?></span><span id="wb-sessions">-</span>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:12px;font-family:var(--ff-body);padding:5px 0;border-bottom:1px solid var(--light-grey);color:var(--text-muted);">
          <span><?php echo esc_html( $heartbeat_calc_week_row_notes ); ?></span><span id="wb-notes">-</span>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:12px;font-family:var(--ff-body);padding:5px 0;border-bottom:1px solid var(--light-grey);color:var(--text-muted);">
          <span><?php echo esc_html( $heartbeat_calc_week_row_admin ); ?></span><span id="wb-admin" style="color:#e05555;">-</span>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:12px;font-family:var(--ff-body);padding:6px 0 0;font-weight:600;color:var(--text);">
          <span><?php echo esc_html( $heartbeat_calc_week_row_total ); ?></span><span id="wb-total">-</span>
        </div>
      </div>
    </div>

    <!-- PRODUCT CTA CARDS -->
    <div class="product-ctas">
		<?php
		$card_n = 0;
		foreach ( $heartbeat_product_cards as $card ) :
			if ( ! is_array( $card ) ) {
				continue;
			}
			++$card_n;
			$accent = ( 0 === $card_n % 2 ) ? 'pcc-accent-teal' : 'pcc-accent-purple';
			$href   = harthq_heartbeat_esc_link_href( (string) ( $card['card_link_url'] ?? '' ) );
			?>
      <a href="<?php echo $href; ?>" class="product-cta-card <?php echo esc_attr( $accent ); ?>">
        <div class="pcc-tag"><?php echo esc_html( (string) ( $card['card_tag'] ?? '' ) ); ?></div>
        <div class="pcc-title"><?php echo esc_html( (string) ( $card['card_title'] ?? '' ) ); ?></div>
        <div class="pcc-price"><?php echo esc_html( (string) ( $card['card_price_line'] ?? '' ) ); ?></div>
        <div class="pcc-desc"><?php echo esc_html( (string) ( $card['card_description'] ?? '' ) ); ?></div>
        <div class="pcc-link"><?php echo esc_html( (string) ( $card['card_link_label'] ?? '' ) ); ?></div>
      </a>
		<?php endforeach; ?>
    </div>

    <div class="disclaimer"><?php echo esc_html( $heartbeat_results_disclaimer ); ?></div>

    <button type="button" class="restart-btn" onclick="restartAssessment()"><?php echo esc_html( $heartbeat_restart_label ); ?></button>

  </div><!-- /results -->

</div><!-- /main -->

<?php get_footer(); ?>
