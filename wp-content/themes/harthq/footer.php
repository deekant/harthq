<?php
/**
 * Theme footer.
 */

$footer_logo         = get_field( 'footer_logo', 'option' );
$footer_tagline      = get_field( 'footer_tagline', 'option' );
$footer_columns      = get_field( 'footer_columns', 'option' );
$footer_copyright    = get_field( 'footer_copyright', 'option' );
$footer_bottom_links = get_field( 'footer_bottom_links', 'option' );

$footer_columns      = is_array( $footer_columns ) ? $footer_columns : array();
$footer_bottom_links = is_array( $footer_bottom_links ) ? $footer_bottom_links : array();
?>
<footer class="footer">
	<div class="footer-inner">
		<div class="footer-brand">
			<div class="footer-logo-text">
				<?php echo wp_kses( (string) $footer_logo, array( 'em' => array() ) ); ?>
			</div>
			<p><?php echo esc_html( (string) $footer_tagline ); ?></p>
		</div>

		<?php foreach ( $footer_columns as $footer_column ) : ?>
			<div class="footer-col">
				<h4><?php echo esc_html( $footer_column['column_heading'] ?? '' ); ?></h4>
				<ul>
					<?php
					$column_links = ! empty( $footer_column['column_links'] ) && is_array( $footer_column['column_links'] )
						? $footer_column['column_links']
						: array();
					?>
					<?php foreach ( $column_links as $column_link ) : ?>
						<?php
						$link_url      = (string) ( $column_link['link_url'] ?? '' );
						$link_label    = (string) ( $column_link['link_label'] ?? '' );
						$link_new_tab  = ! empty( $column_link['open_new_tab'] );
						$target_attr   = $link_new_tab ? ' target="_blank" rel="noopener noreferrer"' : '';
						?>
						<li><a href="<?php echo esc_url( $link_url ); ?>"<?php echo $target_attr; ?>><?php echo esc_html( $link_label ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="footer-bottom">
		<p><?php echo esc_html( (string) $footer_copyright ); ?></p>
		<div class="footer-bottom-links">
			<?php foreach ( $footer_bottom_links as $bottom_link ) : ?>
				<?php
				$bottom_link_url     = (string) ( $bottom_link['link_url'] ?? '' );
				$bottom_link_label   = (string) ( $bottom_link['link_label'] ?? '' );
				$bottom_link_new_tab = ! empty( $bottom_link['open_new_tab'] );
				$target_attr         = $bottom_link_new_tab ? ' target="_blank" rel="noopener noreferrer"' : '';
				?>
				<a href="<?php echo esc_url( $bottom_link_url ); ?>"<?php echo $target_attr; ?>><?php echo esc_html( $bottom_link_label ); ?></a>
			<?php endforeach; ?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
