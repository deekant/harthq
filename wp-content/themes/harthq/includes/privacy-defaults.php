<?php
/**
 * Default Privacy Policy ACF values (used until fields are filled or for one-time seeding).
 *
 * @return array<string, string>
 */
function harthq_privacy_get_default_fields() {
	$dir = __DIR__;
	$body = '';
	$path = $dir . '/privacy-default-body.html';
	if ( is_readable( $path ) ) {
		$body = (string) file_get_contents( $path );
	}

	return array(
		'privacy_header_eyebrow' => 'Last updated: April 2026',
		'privacy_header_heading' => 'Privacy Policy',
		'privacy_header_intro'   => 'HartHQ is committed to protecting your privacy in accordance with the Australian Privacy Act 1988 and the Australian Privacy Principles (APPs).',
		'privacy_summary_box'    => '<p><strong>Plain English summary:</strong> We collect your name, email, and practice details when you use our tools or purchase our products. We use this to deliver our services and, if you opt in, to send you relevant practice growth content. We don\'t sell your data. You can access, correct, or delete your information at any time by contacting us.</p>',
		'privacy_body'           => $body,
	);
}
