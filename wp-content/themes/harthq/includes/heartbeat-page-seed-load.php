<?php
/**
 * Default dimension rows for HartBeat page ACF seeding.
 *
 * @return array<int, array<string, mixed>>
 */
function harthq_get_heartbeat_page_seed_dimensions() {
	$base = __DIR__ . '/heartbeat-seed';

	return array(
		require $base . '/dimension-1.php',
		require $base . '/dimension-2.php',
		require $base . '/dimension-3.php',
		require $base . '/dimension-4.php',
		require $base . '/dimension-5.php',
	);
}
