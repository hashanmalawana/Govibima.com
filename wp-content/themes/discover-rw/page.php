<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package discover-rw
 */
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main page-cont">

		<?php
		while ( have_posts() ) : the_post();
			$page_content = get_the_content();
			if (!empty($page_content)) :
				?>
				<div class="cont maincont stylization">
					<?php
						get_template_part( 'template-parts/content', 'page' );
					?>
				</div>
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					echo '<div class="stylization">';
					comments_template();
					echo '</div>';
				}
				?>
			<?php
			endif;
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>