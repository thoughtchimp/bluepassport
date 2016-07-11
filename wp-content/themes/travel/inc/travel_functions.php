<?php
/*
* travel theme custom functions and hooks .
* 
*/

//social media share buttons
function travel_social_sharing_buttons($travelURL,$postTitle,$postid) 
{
	$travelTitle = str_replace( ' ', '%20', $postTitle);
	$travelThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($postid), 'full' );
	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.$travelTitle.'&amp;url='.$travelURL.'&amp;via=travel';
	$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$travelURL;
	$googleURL = 'https://plus.google.com/share?url='.$travelURL;
	$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$travelURL.'&amp;media='.$travelThumbnail[0].'&amp;description='.$travelTitle;
	$content = '';
	$content .= '<div class="travel-social">';
	$content .= '<h5>SHARE ON</h5> <a class="travel-link travel-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
	$content .= '<a class="travel-link travel-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
	$content .= '<a class="travel-link travel-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
	$content .= '<a class="travel-link travel-pinterest" href="'.$pinterestURL.'" target="_blank">Pin It</a>';
	$content .= '</div>';
	return $content;
};

/*custom function site title*/
function travel_blog_name( $output) {
    $title = explode(" ",$output);
	if(isset($title[1])){
		$title[1] = "<span class='brand-color'><b> $title[1] </b></span>";
	}
    return implode('',$title);
}

//action hook for requiring plugins needed for the theme 
add_action( 'tgmpa_register', 'travel_register_required_plugins' );

function travel_register_required_plugins()
{
	$plugins = array(
		array(
				'name'      => 'Email Subscribers',
				'slug'      => 'email-subscribers',
				'required'  => true,
			)
		);
	$config = array(
		'id'           => 'tgmpa_email_subscribers',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'is_automatic' => true,
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		);
	tgmpa( $plugins, $config );
}

//travel theme remove customize menu..
add_action( 'admin_menu', 'travel_remove_customize_menu' );

function travel_remove_customize_menu(){
  	global $submenu;
  	unset($submenu['themes.php'][6]); 
	unset($submenu['themes.php'][20]); 
}

//add header site navigation class
add_filter('wp_head','travel_add_header_style');
function travel_add_header_style()
{
	?>
	<style>
		#site-navigation{
			border-radius: 0px;
			background-color: <?php echo ot_get_option('color_scheme'); ?>;
			height: 50px;
			border-bottom: 1px solid #1e1e1e;
		}
	</style>
<?php
}




