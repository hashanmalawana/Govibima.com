<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 */

$header_logo = get_theme_mod( 'custom_logo' );
if (!empty($header_logo)) {
	$header_logo_img = wp_get_attachment_image_src( $header_logo , 'full' );
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	
	<header id="masthead" class="site-header header-wrap">

		<div class="cont header"><?php
			if (!empty($header_logo_img[0])) :
				?><p class="h-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($header_logo_img[0]); ?>" alt="<?php bloginfo('site_name'); ?>"></a>
				<?php // .h-logo & .h-menu without spacing ?></p><?php endif; ?><nav id="site-navigation" class="main-navigation h-menu">
				<?php
				wp_nav_menu( array( 'container' => false, 'container_class' => '', 'container_id' => '', 'menu_class' => 'menu', 'menu_id' => '', 'echo' => true, 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'theme_location' => 'primary' ) );
				?>
			</nav>
			<a href="#" class="h-menu-btn" id="menu-btn"><?php esc_html_e( 'Menu', 'discover-rw' ); ?></a>
		</div>
		<?php get_search_form(); ?>
	</header><!-- #masthead -->

	<nav id="mainmenu" class="main-navigation mainmenu">
		<div class="mainmenu-close" id="mainmenu-close">
			<div class="mainmenu-close-line"></div>
			<div class="mainmenu-close-line"></div>
			<div class="mainmenu-close-line"></div>
			<div class="mainmenu-close-line"></div>
		</div>
	<?php
	wp_nav_menu( array( 'container' => false, 'container_class' => '', 'container_id' => '', 'menu_class' => 'menu', 'menu_id' => 'primary-menu', 'echo' => true, 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'theme_location' => 'primary' ) );
	?>
	</nav>

	<div id="content" class="site-content">