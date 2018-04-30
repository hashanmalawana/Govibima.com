<?php
/**
 * Discover functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package discover-rw
 */

if ( ! function_exists( 'discover_rw_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function discover_rw_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Loads the theme's translated strings.
	 */
	load_theme_textdomain( 'discover-rw', get_template_directory() . '/languages' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 200 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'discover-rw' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
    * Enable support for custom logo.
    */
	add_theme_support( 'custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
	) );
	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'discover_rw_custom_background_args', array(
		'default-color' => '#ffffff',
		'default-image' => '',
	) ) );

	// Add Image Sizes
	add_image_size( 'discover_rw_1920x730', '1920', '730', array('center', 'center') );
	add_image_size( 'discover_rw_413x213', '413', '213', array('center', 'center') );
	add_image_size( 'discover_rw_1920x1200', '1920', '1200' );
	add_image_size( 'discover_rw_1240x1200', '1240', '1200' );
	add_image_size( 'discover_rw_820x820', '820', '820' );
	add_image_size( 'discover_rw_400x9999', '400', '9999' );
}
endif;
add_action( 'after_setup_theme', 'discover_rw_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function discover_rw_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'discover_rw_content_width', 1270 );
}
add_action( 'after_setup_theme', 'discover_rw_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function discover_rw_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Posts Sidebar', 'discover-rw' ),
		'id'            => 'discover-sb-1',
		'description'   => esc_html__( 'Add widgets here.', 'discover-rw' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'discover-rw' ),
		'id'            => 'discover-footer',
		'description'   => esc_html__( 'Add widgets here.', 'discover-rw' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );
}
add_action( 'widgets_init', 'discover_rw_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function discover_rw_styles_scripts() {

	// Enqueue a .less style sheet
	wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/css/font-awesome.css' );
	wp_enqueue_style( 'bxslider', get_template_directory_uri(). '/css/jquery.bxslider.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri(). '/css/swiper.css' );
	wp_enqueue_style( 'photoswipe', get_template_directory_uri(). '/css/photoswipe.css' );
	wp_enqueue_style( 'discover_rw-style', get_template_directory_uri(). '/css/style.css' );
	wp_enqueue_style( 'discover_rw-media', get_template_directory_uri(). '/css/media.css' );

	// Enqueue a styles
	wp_enqueue_style( 'discover_rw-style', get_stylesheet_uri() );

	// Enqueue scripts
	wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri().'/js/theia-sticky-sidebar.js', array( 'jquery' ));
	wp_enqueue_script( 'discover_rw-main', get_template_directory_uri().'/js/main.js', array( 'jquery' ), null, true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'discover_rw_styles_scripts' );


/**
 * Set up the WordPress core custom header feature.
 */
function discover_rw_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'discover_rw_custom_header_args', array(
		'default-image'          => '',
		'width'                  => 1920,
		'height'                 => 120,
		'flex-height'            => true,
		'header-text'   		 => false,
	) ) );
}
add_action( 'after_setup_theme', 'discover_rw_custom_header_setup' );


/*
 * Pingback function
 */
function discover_rw_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="'.esc_url( get_blofinfo( 'pingback_url' ) ).'">';
	}
}
add_action( 'wp_head', 'discover_rw_pingback_header' );


// Theme Functions
require_once( trailingslashit( get_template_directory() ) . 'inc/theme-functions.php' );





/*
 * THEME OPTIONS
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/customizer.php' );

// Show Customizations
require_once( trailingslashit( get_template_directory() ) . 'inc/dynamic.php' );
/*
 * THEME OPTIONS
 */



/*
 * CUSTOM WIDGETS
 */
include(trailingslashit( get_template_directory() ) . 'inc/widgets/widget-featured.php');
include(trailingslashit( get_template_directory() ) . 'inc/widgets/widget-social.php');
/*
 * CUSTOM WIDGETS
 */



