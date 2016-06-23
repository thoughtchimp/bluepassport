<?php
/**
 * travel back compat functionality
 *
 * Prevents travel from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package WordPress
 * @subpackage travel
 * @since travel 1.0
 */

/**
 * Prevent switching to travel on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since travel 1.0
 */
function travel_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'travel_upgrade_notice' );
}
add_action( 'after_switch_theme', 'travel_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * travel on WordPress versions prior to 4.4.
 *
 * @since travel 1.0
 *
 * @global string $wp_version WordPress version.
 */
function travel_upgrade_notice() {
	$message = sprintf( __( 'travel requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'travel' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since travel 1.0
 *
 * @global string $wp_version WordPress version.
 */
function travel_customize() {
	wp_die( sprintf( __( 'travel requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'travel' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'travel_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since travel 1.0
 *
 * @global string $wp_version WordPress version.
 */
function travel_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'travel requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'travel' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'travel_preview' );
