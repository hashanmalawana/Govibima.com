<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package discover-rw
 */

$sidebar = get_theme_mod('sidebar', 'sticky');

if ( ! is_active_sidebar( 'discover-sb-1' ) ) {
	return;
}
?>
<aside id="secondary" class="stylization fr-posts-rt<?php if ($sidebar == 'sticky') : ?> sidebar-sticky<?php endif; ?>">

	<?php if ($sidebar == 'sticky') : ?>
	<div class="theiaStickySidebar">
	<?php endif; ?>
	
	<div class="fr-posts-rt-inner">
	
	<?php dynamic_sidebar( 'discover-sb-1' ); ?>

	</div>

	<?php if ($sidebar == 'sticky') : ?>
	</div>
	<?php endif; ?>
		
</aside>