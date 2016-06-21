<?php
/*
@package Travel Theme
	
	========================
		ADMIN PAGE
	========================
*/
//Generate Travel Admin Page
function travel_add_admin_page() {
	add_menu_page( 'Travel Theme Options', 'Theme Options', 'edit_theme_options', 'travel_theme_options', 'travel_theme_create_page');
}
add_action( 'admin_menu', 'travel_add_admin_page' );

function travel_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/travel-admin.php' );
}

/*//Activate custom settings
	add_action( 'admin_init', 'travel_custom_settings' );

function travel_custom_settings() {
	register_setting( 'travel-settings-group', 'header' );
	add_settings_section( 'travel-header-options', 'Header', 'travel_header_options', 'travel_theme_options');
	add_settings_field( 'homepage_header', 'Header Image', 'travel_header_image_options', 'travel_theme_options', 'travel-header-options');
}

function travel_header_options() {
	echo 'Customize your Sidebar Information';
}

function travel_header_image_options() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />';
}




function travel_theme_settings_page() {
	
	echo '<h1>travel Custom CSS</h1>';
	
}*/