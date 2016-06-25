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
    //if ( $show != 'name' ) return $output;
    $title = explode(" ",$output);
	if(isset($title[1])){
		$title[1] = "<span class='brand-color'><b> $title[1] </b></span>";
	}
    return implode('',$title);
}

/*filter hook for site title*/
/*
function travel_bloginfo_name($output,$show) {
    if ( $show != 'name' ) return $output;
    return ot_get_option('site_title');
}
add_filter('bloginfo','travel_bloginfo_name', 10, 2);*/

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

//action hook option tree value is saved.
add_action('ot_after_theme_options_save','update_site_title');
function update_site_title()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'options';
	$col_value = ot_get_option('site_title');
	$wpdb->query("update $table_name SET option_value='$col_value' WHERE option_name= 'blogname' ");
}

/*add_action('admin_init','travel_blogname_update');
function travel_blogname_update()
{	
	$url =  explode("/", $_SERVER["REQUEST_URI"], 3)[2];
	if ( $url == 'wp-admin/options-general.php' ) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'options';
		echo $blog_name = $wpdb->get_row("select option_value from $table_name  WHERE option_name= 'blogname' ")->option_value;
		echo "<br/>";
		echo "<br/>";
		echo $opt_tree_value = $wpdb->get_row("select option_value from $table_name  WHERE option_name= 'option_tree' ")->option_value;
		echo "<br/>";
		echo "<br/>";
		echo $col_value = str_replace(ot_get_option('site_title'),$blog_name, $opt_tree_value);
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if ($conn) {
			$sql = " update $table_name SET option_value = $col_value WHERE option_name= 'option_tree' ";
			mysqli_query($conn, $sql);
		}
		mysqli_close($conn);
		 


		//$wpdb->query("");
		/*$wpdb->update( 
			$table_name, 
			array( 
				'option_value' => $col_value,	// string
			), 
			array( 'option_name' => 'option_tree' ), 
			array( 
				'%s',	// value1
			), 
			array( '%s' ) 
		);*/
		//update_option( 'option_tree' , $col_value); 
	//}
//}



