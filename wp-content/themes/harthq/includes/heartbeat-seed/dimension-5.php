<?php
/**
 * HartBeat page default ACF row — dimension 5.
 *
 * @return array<string, mixed>
 */
return array(
	'dimension_tag'         => 'Resilience',
	'dimension_title'       => 'Practice Resilience',
	'dimension_description' => 'How vulnerable is your practice to disruption - and how would it hold up if life got complicated?',
	'dimension_questions'   => array(
		array(
			'question_text'  => 'How consistently does new client work arrive without you actively chasing it?',
			'question_options' => array(
				array( 'option_label' => "Rarely - I'm always actively hunting for new clients" ),
				array( 'option_label' => 'Inconsistently - good months and dry months' ),
				array( 'option_label' => 'Fairly regularly - I have some reliable sources' ),
				array( 'option_label' => 'Consistently - referrals come in without much effort' ),
				array( 'option_label' => 'Always - I have a waitlist and turn away work' ),
			),
		),
		array(
			'question_text'  => 'How would your weekly income be affected if your 3 longest-attending clients all ended therapy at the same time?',
			'question_options' => array(
				array( 'option_label' => 'It would be a major blow - they make up most of my income' ),
				array( 'option_label' => 'Significant impact - it would take months to recover' ),
				array( 'option_label' => 'Noticeable but manageable - I have enough other clients' ),
				array( 'option_label' => 'Modest impact - I have a good spread at different stages' ),
				array( 'option_label' => 'Minimal - my caseload is well distributed across many clients' ),
			),
		),
		array(
			'question_text'  => 'How quickly can a new client get an appointment with you?',
			'question_options' => array(
				array( 'option_label' => 'Same week - I have availability most weeks' ),
				array( 'option_label' => 'About 1 week wait' ),
				array( 'option_label' => 'About 2 weeks wait' ),
				array( 'option_label' => '3-4 weeks wait' ),
				array( 'option_label' => '5+ weeks - I have an active waitlist' ),
			),
		),
		array(
			'question_text'  => 'If you needed to take 4 weeks off unexpectedly, how would your practice hold up?',
			'question_options' => array(
				array( 'option_label' => 'It would collapse - everything depends on me being present' ),
				array( 'option_label' => "Very difficult - I'd lose clients and income significantly" ),
				array( 'option_label' => 'Manageable but painful - some systems exist' ),
				array( 'option_label' => 'Mostly fine - admin could be covered, clients would hold' ),
				array( 'option_label' => 'Well covered - I have documented processes and client communication plans' ),
			),
		),
	),
);
