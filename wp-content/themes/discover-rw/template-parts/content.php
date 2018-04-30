<?php
/**
 * Template part for displaying posts.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	the_title( '<h1 class="entry-title">', '</h1>' );

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
</article><!-- #post-## -->
