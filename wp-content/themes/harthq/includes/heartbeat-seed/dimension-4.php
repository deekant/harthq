<?php
/**
 * HartBeat page default ACF row — dimension 4.
 *
 * @return array<string, mixed>
 */
return array(
	'dimension_tag'         => 'Operations',
	'dimension_title'       => 'Administrative Load',
	'dimension_description' => "How much of your working week is spent on tasks that don't require your clinical expertise?",
	'dimension_questions'   => array(
		array(
			'question_text'  => 'How many hours per week do you personally spend on practice administration? (scheduling, invoicing, client communications, reports, insurance)',
			'question_options' => array(
				array( 'option_label' => 'More than 12 hours' ),
				array( 'option_label' => '9–12 hours' ),
				array( 'option_label' => '6–8 hours' ),
				array( 'option_label' => '3–5 hours' ),
				array( 'option_label' => 'Under 3 hours - I have good systems or support' ),
			),
		),
		array(
			'question_text'  => 'When a new client enquires, how quickly are they typically responded to?',
			'question_options' => array(
				array( 'option_label' => 'Often more than 48 hours - I miss some enquiries' ),
				array( 'option_label' => 'Usually within 24–48 hours' ),
				array( 'option_label' => 'Within same business day' ),
				array( 'option_label' => 'Within a few hours' ),
				array( 'option_label' => 'Within the hour - I have a system for this' ),
			),
		),
		array(
			'question_text'  => 'How automated is your client intake, reminders, and invoicing?',
			'question_options' => array(
				array( 'option_label' => 'Almost nothing is automated - I do it manually' ),
				array( 'option_label' => 'Some automation - reminders only' ),
				array( 'option_label' => 'Moderate - reminders and invoicing, intake still manual' ),
				array( 'option_label' => 'Mostly automated - I check and adjust but rarely input' ),
				array( 'option_label' => 'Fully systemised - intake, reminders, invoicing run without me' ),
			),
		),
		array(
			'question_text'  => "Do you review your practice's financial health (revenue trends, no-show rate, avg client value) on a regular basis?",
			'question_options' => array(
				array( 'option_label' => "Never - I don't really look at the numbers" ),
				array( 'option_label' => 'Once a year, around tax time' ),
				array( 'option_label' => 'Quarterly - I check in a few times a year' ),
				array( 'option_label' => 'Monthly - I have a rough sense of how the practice is tracking' ),
				array( 'option_label' => 'Monthly with a structured report - I know my key numbers' ),
			),
		),
	),
);
