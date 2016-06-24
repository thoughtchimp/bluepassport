<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travel
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo wp_title();?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,900,300,100,700' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
	<style>
		#site-navigation{
			border-radius: 0px;
		    background-color: <?php echo ot_get_option('color_scheme'); ?>;
		    height: 50px;
		    border-bottom: 1px solid #1e1e1e;
		}
	</style>

</head>

<body <?php body_class(); ?> >
<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
		<!-- site navigation -->
		<nav id="site-navigation" class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span> 
		      </button>
		    	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo travel_blog_name(ot_get_option('site_title')); ?></a>
			</div>
		    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
		      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ,'menu_class'=>'nav navbar-nav' ,'container'=> 'ul') ); ?>
		    </div>
		  </div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
