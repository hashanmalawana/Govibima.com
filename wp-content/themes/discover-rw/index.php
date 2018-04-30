<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package discover-rw
 */

$sidebar = discover_rw_get_option('sidebar');
$layout = discover_rw_get_option('blog_layout');

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main page-cont">
		<div class="cont maincont">

			<?php
			if ( have_posts() ) :
				?>
				<div class="fr-posts-wrap">
					<h2>
						<?php
						if (!empty($wp_query->queried_object->post_title)) {
							echo esc_html($wp_query->queried_object->post_title);
						} else {
							single_cat_title();
						}
						?>
					</h2><ul class="fr-posts-sections"><!-- h2 & .fr-posts-sections without space -->
						<?php
						$blog_categories = wp_list_categories( array(
							'show_option_all'    => esc_html__('All posts', 'discover-rw'),
							'show_count'         => 0,
							'hide_empty'         => true,
							'use_desc_for_title' => false,
							'hierarchical'       => true,
							'title_li'           => '',
							'echo'               => 1,
							'depth'              => 1,
						) );
						?>
						<li class="fr-posts-sections-more"><span><?php esc_html_e('...', 'discover-rw'); ?></span><ul class="fr-posts-sections-sub"></ul></li>
					</ul>
					<div class="fr-posts-cont<?php if ($sidebar == 'hide') echo ' no-sidebar'; ?>">
						<div class="fr-posts-lt<?php if ($sidebar == 'sticky') : ?> content-sticky<?php endif; ?>">


							<?php if ($sidebar == 'sticky') : ?>
							<div class="theiaStickySidebar">
							<?php endif; ?>


							<div class="post-list<?php if ($layout == 'full') echo ' post-list-full'; elseif ($layout == 'masonry2') echo ' post-list-col-2'; ?>"<?php if ($layout !== 'full') echo ' id="post-list"'; ?>>
								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part('template-parts/loop');
									?>
									<?php
								endwhile;
								?>
							</div>
							<?php
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
							
							<?php if ($sidebar == 'sticky') : ?>
							</div>
							<?php endif; ?>
							
						</div>
						<?php
						if ($sidebar !== 'hide') {
							get_sidebar();
						}
						?>
					</div>
				</div>

				<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>