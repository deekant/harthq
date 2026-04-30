<?php
/**
 * HartBeat page default ACF row — dimension 3.
 *
 * @return array<string, mixed>
 */
return array(
	'dimension_tag'         => 'Revenue',
	'dimension_title'       => 'Revenue Integrity',
	'dimension_description' => 'Are you being appropriately compensated for your expertise - and is your fee structure working for you?',
	'dimension_questions'   => array(
		array(
			'question_text'  => 'When did you last review and adjust your session fee?',
			'question_options' => array(
				array( 'option_label' => 'More than 3 years ago - or never' ),
				array( 'option_label' => '2–3 years ago' ),
				array( 'option_label' => '1–2 years ago' ),
				array( 'option_label' => 'Within the last 12 months' ),
				array( 'option_label' => 'Within the last 6 months - I review it regularly' ),
			),
		),
		array(
			'question_text'  => 'How does your fee compare to other practitioners in your area with similar experience?',
			'question_options' => array(
				array( 'option_label' => "I genuinely don't know" ),
				array( 'option_label' => "Probably below average - I've kept fees low" ),
				array( 'option_label' => 'Around average for my area' ),
				array( 'option_label' => "Slightly above average - I've positioned deliberately" ),
				array( 'option_label' => 'Above average - my niche and experience justify a premium' ),
			),
		),
		array(
			'question_text'  => 'What proportion of your clients pay your full private fee (vs. reduced gap fee via Medicare or concession)?',
			'question_options' => array(
				array( 'option_label' => 'Under 20% - almost all are Medicare or concession' ),
				array( 'option_label' => '20–40% full fee' ),
				array( 'option_label' => '40–60% full fee' ),
				array( 'option_label' => '60–80% full fee' ),
				array( 'option_label' => 'Over 80% - mostly private, minimal Medicare dependency' ),
			),
		),
		array(
			'question_text'  => 'Do you accept clients through EAP panels, BetterHelp, or similar platforms that set the fee for you?',
			'question_options' => array(
				array( 'option_label' => 'Yes - a significant portion of my caseload is platform-referred' ),
				array( 'option_label' => 'Yes - some EAP or platform clients' ),
				array( 'option_label' => "A small number - I'm selective about panels" ),
				array( 'option_label' => "Very few - I've moved away from platform dependency" ),
				array( 'option_label' => 'No - I set my own fees across my entire caseload' ),
			),
		),
	),
);
