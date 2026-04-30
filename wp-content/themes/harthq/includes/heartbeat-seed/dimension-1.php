<?php
/**
 * HartBeat page default ACF row — dimension 1.
 *
 * @return array<string, mixed>
 */
return array(
	'dimension_tag'         => 'Capacity',
	'dimension_title'       => 'Capacity Utilisation',
	'dimension_description' => "Are you working at a volume that's sustainable - and are the sessions you schedule actually happening?",
	'dimension_questions'   => array(
		array(
			'question_text'   => 'What percentage of your scheduled sessions are actually delivered? (accounting for no-shows and same-day cancellations)',
			'question_options'  => array(
				array( 'option_label' => 'Under 70% - I lose a lot of sessions' ),
				array( 'option_label' => '70–79% - fairly common gaps' ),
				array( 'option_label' => '80–84% - occasional gaps' ),
				array( 'option_label' => '85–92% - mostly solid' ),
				array( 'option_label' => '93%+ - very few missed sessions' ),
			),
		),
		array(
			'question_text'   => 'How many client sessions do you typically see in a week?',
			'question_options'  => array(
				array( 'option_label' => 'Fewer than 10 - well below capacity' ),
				array( 'option_label' => '10–14 - building but not full' ),
				array( 'option_label' => '15–18 - comfortably occupied' ),
				array( 'option_label' => '19–22 - near capacity' ),
				array( 'option_label' => '23+ - full, sometimes overcommitted' ),
			),
		),
		array(
			'question_text'   => 'When a client cancels, how quickly can you typically fill that slot?',
			'question_options'  => array(
				array( 'option_label' => 'Rarely - gaps stay empty' ),
				array( 'option_label' => 'Sometimes - depends on the week' ),
				array( 'option_label' => 'Often - I have a short list to call' ),
				array( 'option_label' => 'Usually - I have a waitlist' ),
				array( 'option_label' => 'Always - waitlist means gaps never stay empty' ),
			),
		),
		array(
			'question_text'   => 'Do you have a written cancellation policy that you enforce consistently?',
			'question_options'  => array(
				array( 'option_label' => 'No policy - I handle it case by case' ),
				array( 'option_label' => 'I have a policy but rarely enforce it' ),
				array( 'option_label' => 'I have a policy but make frequent exceptions' ),
				array( 'option_label' => 'I have a policy and apply it most of the time' ),
				array( 'option_label' => 'Clear policy, consistently applied - clients know upfront' ),
			),
		),
	),
);
