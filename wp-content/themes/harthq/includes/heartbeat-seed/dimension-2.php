<?php
/**
 * HartBeat page default ACF row — dimension 2.
 *
 * @return array<string, mixed>
 */
return array(
	'dimension_tag'         => 'Continuity',
	'dimension_title'       => 'Clinical Continuity',
	'dimension_description' => 'Are clients completing therapy - or dropping out before they get the outcomes they came for?',
	'dimension_questions'   => array(
		array(
			'question_text'  => 'On average, how many sessions does a typical client have with you before ending treatment?',
			'question_options' => array(
				array( 'option_label' => "1–3 sessions - most don't come back" ),
				array( 'option_label' => '4–5 sessions - short courses' ),
				array( 'option_label' => '6–8 sessions - reasonable completion' ),
				array( 'option_label' => '9–12 sessions - good depth of work' ),
				array( 'option_label' => '13+ sessions - clients complete full course of therapy' ),
			),
		),
		array(
			'question_text'  => 'How do most clients rebook their next appointment?',
			'question_options' => array(
				array( 'option_label' => 'They contact us when they feel ready' ),
				array( 'option_label' => "We send a reminder but many don't respond" ),
				array( 'option_label' => "I suggest rebooking in session but don't always follow up" ),
				array( 'option_label' => 'Most clients rebook before leaving or get an automated prompt' ),
				array( 'option_label' => 'We have a systematic rebooking process - most are booked before leaving' ),
			),
		),
		array(
			'question_text'  => 'How often do clients drop out of therapy without a planned ending?',
			'question_options' => array(
				array( 'option_label' => "Very often - it's the norm" ),
				array( 'option_label' => "Often - maybe half don't have a formal ending" ),
				array( 'option_label' => 'Sometimes - maybe a third drop out unplanned' ),
				array( 'option_label' => 'Occasionally - most clients have planned endings' ),
				array( 'option_label' => 'Rarely - therapy endings are collaborative and planned' ),
			),
		),
		array(
			'question_text'  => 'Do you have a consistent process for following up clients who miss an appointment or go quiet?',
			'question_options' => array(
				array( 'option_label' => "No - if they don't rebook, we wait" ),
				array( 'option_label' => 'Sometimes - depends on the client' ),
				array( 'option_label' => "We send a message but don't always follow through" ),
				array( 'option_label' => 'Yes - we follow up within 48 hours' ),
				array( 'option_label' => 'Yes - we have a clear protocol and it works well' ),
			),
		),
	),
);
