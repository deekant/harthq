<?php
/**
 * Index fallback template.
 */

get_header();
?>
<main class="site-main"> 
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class(); ?>>
				<?php the_title('<h1>', '</h1>'); ?>
				<?php the_content(); ?>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<p><?php esc_html_e('No content found.', 'harthq'); ?></p>
	<?php endif; ?>
</main>
<?php
get_footer();
