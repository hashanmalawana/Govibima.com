<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package discover-rw
 */

$layout = 'full';

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main page-cont">
			<div class="cont maincont stylization">
				<?php
				if ( have_posts() ) : ?>

					<h1 class="page-title align-center"><?php
						// Translators: %s Search Query
						printf( esc_html__( 'Search Results for: %s', 'discover-rw' ), '<span>' . get_search_query() . '</span>' );
						?></h1>
				
					<div class="post-list post-list-full">

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part('template-parts/loop');

					endwhile;

					the_posts_pagination( array(
						'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
						'format'       => '',
						'add_args'     => '',
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'total'        => $wp_query->max_num_pages,
						'prev_text'    => '<i class="fa fa-angle-double-left"></i> '.esc_html__('Prev', 'discover-rw'),
						'next_text'    => esc_html__('Next', 'discover-rw').' <i class="fa fa-angle-double-right"></i>',
						'type'         => 'list',
						'end_size'     => 1,
						'mid_size'     => 2,
						'screen_reader_text' => ' '
					) );
					?>
					</div>
					<?php

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
?>