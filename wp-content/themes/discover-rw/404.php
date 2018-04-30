<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package discover-rw
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="maincont stylization err404">
			<div class="cont">
				<p class="err404-ttl"><?php esc_html_e('404', 'discover-rw'); ?></p>
				<h1><?php esc_html_e( 'Oops, This Page Could Not Be Found!', 'discover-rw' ); ?></h1>
				<p><?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable', 'discover-rw' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>