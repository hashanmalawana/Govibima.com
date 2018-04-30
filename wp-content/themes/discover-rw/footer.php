<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 */

$copyright = discover_rw_get_option('copyright');
?>

	</div><!-- #content -->

	<?php if (is_active_sidebar( 'discover-footer' )) : ?>
	<footer class="site-footer footer-wrap">
		<div class="cont footer">
			<?php
			dynamic_sidebar( 'discover-footer' );
			?>
		</div>
	</footer>
	<?php endif; ?>

	<?php if (!empty( $copyright )) : ?>
		<p class="footer-copyright"><?php echo wp_kses_post($copyright); ?></p>
	<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
