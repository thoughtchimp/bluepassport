<?php
/**
 * travel functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package travel
 */

/**
 * travel only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

add_filter( 'ot_theme_mode', '__return_true' );
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
require( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Enqueue scripts and styles.
 */

function travel_theme_scripts() {
	
	//scripts
    wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery  
    wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"), false);
    wp_enqueue_script('jquery');
    wp_register_script( 'travel', get_template_directory_uri() . '/js/travel.js', array('jquery'), '1.0', false );
	wp_enqueue_script( 'travel');
	wp_register_script( 'travel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true ); 
	wp_register_script( 'travel-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	wp_enqueue_script( 'bootstrap-js');
	wp_enqueue_script( 'travel-skip-link-focus-fix');
	wp_enqueue_script( 'travel-navigation');
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'travel-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'travel_theme_scripts' );

if ( ! function_exists( 'travel_setup' ) ) :
function travel_setup() {
	load_theme_textdomain( 'travel', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'travel' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'travel_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'travel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travel_content_width() 
{
	$GLOBALS['content_width'] = apply_filters( 'travel_content_width', 640 );
}
add_action( 'after_setup_theme', 'travel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travel_widgets_init() 
{
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'travel' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'travel' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'travel_widgets_init' );




//for enqueing the scripts and styles for admin
add_action('admin_init','travel_admin_init');
function travel_admin_init()
{
	wp_enqueue_style('admin-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'travel-style', get_template_directory_uri() . '/css/admin-style.css');
}

/*
*	library for requiring plugin needed on theme activation .
*/
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
/**
 * cutom travel filters and custom function for the theme .
 */
require get_template_directory() . '/inc/travel_functions.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
