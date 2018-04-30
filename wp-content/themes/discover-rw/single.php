<?php
/**
 * The template for displaying all single posts.
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php if (have_posts()) : ?>
			<?php while ( have_posts() ) : the_post();
				$category = get_the_category();
				$next_post = get_next_post();
				$prev_post = get_previous_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('maincont stylization'); ?>>

					<div class="post-top<?php
					if (!has_post_thumbnail()) {
						echo ' post-top-nophoto';
					}
					?>">
						<?php
						if (has_post_thumbnail()) :
							$img_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'discover_rw_1920x1200');
							?>
							<p class="post-top-img" style="background: url(<?php echo esc_url($img_src[0]); ?>);">
								<img src="<?php echo esc_url($img_src[0]); ?>" alt="">
							</p>
						<?php endif; ?>
						<div class="cont post-ttl">
							<h1><?php the_title(); ?></h1>
							<p class="post-ttl-info">
								<span class="post-ttl-cat">
									<?php foreach ($category as $key=>$cat) : ?>
										<a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a><?php echo ($key+1<count($category)) ? ', ' : ''; ?>
									<?php endforeach; ?>
								</span>
								<time datetime="<?php echo get_the_date('Y-m-d H:i'); ?>"><?php echo get_the_date(); ?></time>
							</p>
							<?php if (!empty($next_post) || !empty($prev_post)) : ?>
							<ul class="post-ttl-nav<?php if (empty($next_post) || empty($prev_post)) echo ' post-ttl-nav-one'; ?>">
								<?php if (!empty($prev_post)) : ?>
								<li class="post-ttl-prev">
									<a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
										<i class="fa fa-angle-left"></i>
										<?php if (empty($next_post)) echo esc_html($prev_post->post_title); ?>
									</a>
								</li>
								<?php endif; ?>
								<?php if (!empty($next_post)) : ?>
								<li class="post-ttl-next">
									<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
										<?php echo esc_html($next_post->post_title); ?>
										<i class="fa fa-angle-right"></i>
									</a>
								</li>
								<?php endif; ?>
							</ul>
							<?php endif; ?>
						</div>
					</div>
					<div class="cont post-cont">

						<?php
						the_content();

						wp_link_pages( array(
							'before'           => '<p class="link-pages">',
							'after'            => '</p>',
							'link_before'      => '<span>',
							'link_after'       => '</span>',
							'nextpagelink'     => '<i class="fa fa-angle-right"></i>',
							'previouspagelink' => '<i class="fa fa-angle-left"></i>',
						) );
						?>
					</div>

					<?php
					// Tags
					the_tags('<div class="post-tags"><div class="cont">', '', '</div></div>');

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>

				</article>

			<?php endwhile; ?>
		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
