<?php
/**
 * travel functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package travel
 */

//require(get_template_directory(). '/inc/theme-options.php' );

//require get_template_directory() . '/inc/functions-admin.php';

add_filter( 'ot_theme_mode', '__return_true' );
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

require( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );

add_filter( 'ot_show_pages', '__return_false' );
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
function travel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'travel_content_width', 640 );
}
add_action( 'after_setup_theme', 'travel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travel_widgets_init() {
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

//shortcode for single post page center featured image.
function featured_img() {
if (has_post_thumbnail() ) {
    $image_id = get_post_thumbnail_id();  
    $image_url = wp_get_attachment_image_src($image_id,'large');  
    $image_url = $image_url[0]; 
    $result = '<img src="'.$image_url.'" />';
    return $result;
}
return;
}
add_shortcode ('featured_image', 'featured_img');
/**
 * Enqueue scripts and styles.
 */
function travel_scripts() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'travel-style', get_stylesheet_uri() );
	wp_enqueue_script('jQuery');
	wp_enqueue_script( 'travel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jQuery'), '3.3.6', true );
	wp_enqueue_script( 'travel-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'travel_scripts' );

//for enqueing the scripts and styles for admin
add_action('admin_init','travel_admin_init');
function travel_admin_init()
{
	wp_enqueue_style('admin-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'travel-style', get_template_directory_uri() . '/css/admin-style.css');
}
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/*//add custom header image option in header.php
$args = array(
	'width'         => 980,
	'height'        => 60,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );*/