<?php
/**
 * Error 404 template.
 *
 * @package HartHQ
 */

get_header();
?>
<div class="inner-page-hero-strip" aria-hidden="true"></div>
<main class="error-404" id="primary">
	<div class="error-404-inner">
		<h1 class="error-404-code">404</h1>
		<p class="error-404-subtitle"><?php esc_html_e( 'The content you are looking for was not found', 'harthq' ); ?></p>
		<a class="error-404-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Homepage', 'harthq' ); ?></a>
	</div>
</main>
<?php
get_footer();
