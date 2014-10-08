<?php

// Child theme (do not remove)
define('CHILD_THEME_NAME', 'WP Groundwrk');
define('CHILD_THEME_URL', 'http://haggart.me/wp-groundwrk/');
define('CHILD_THEME_VERSION', 'v1.0');

// Child Theme Setup //////////////////////////////////////////////////////////

// We're going to fire this off when we activate the child theme
add_action('genesis_setup', 'wpgw_theme_setup', 15);

function wpgw_theme_setup(){

	// INCLUDES /////////////////////////////////
	
	// Functions to support our child theme
	require_once(CHILD_DIR.'/lib/inc/setup.php');

	// Customise WP Admin
	include_once(CHILD_DIR.'/lib/inc/custom-admin.php');

	// WP Custom Post Types
	include_once(CHILD_DIR.'/lib/inc/cpt/cpt.php');

	// THEME SUPPORT ////////////////////////////

	// Add HTML5 markup structure
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));

	// Add viewport meta tag for mobile browsers
	add_theme_support('genesis-responsive-viewport');

	// Add support for custom background
	add_theme_support('custom-background');

	// Add support for 3-column footer widgets
	add_theme_support('genesis-footer-widgets', 3);

	// CUSTOMISING GENESIS //////////////////////

	//  - SCRIPTS, STYLES, & WP_HEAD ////////////

	// Remove default stylesheet
	remove_action('genesis_meta', 'genesis_load_stylesheet');
	
	// Enqueue base scripts and styles
	add_action('wp_enqueue_scripts', 'wpgw_scripts_and_styles', 999);

	// Add custom stylesheet
	add_action('after_setup_theme', 'wpgw_add_editor_styles');

	// Replace favicon
	remove_action('wp_head', 'genesis_load_favicon');
	add_action('genesis_meta', 'wpgw_child_load_favicon');

	// Adding the mobile friendly meta
	add_action('genesis_meta', 'wpgw_child_viewport_meta');
	
	// Who uses the rsd link anyway? axe it
	remove_action( 'wp_head', 'rsd_link');                    
	
	// Remove Windows Live Writer
	remove_action('wp_head', 'wlwmanifest_link');                       
	
	// Index link
	remove_action('wp_head', 'index_rel_link');                         
	
	// Previous link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);            
	
	// Start link
	remove_action('wp_head', 'start_post_rel_link', 10, 0);             
	
	// Links for Adjacent Posts
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 
	
	// Remove WP version
	remove_action('wp_head', 'wp_generator');  

	// Add id="main-content" attributes to <main> element
	add_filter('genesis_attr_content', 'wpgw_attr_content');

	//  - FOOTER ////////////////////////////////

	// Footer credits
	add_filter('genesis_footer_creds_text', 'wpgw_child_footer_creds_text');

	// Add support for 3-column footer widgets
	add_theme_support('genesis-footer-widgets', 3);

	// CLEAN UP WORDPRESS ///////////////////////
	
	// Remove p around images
	add_filter('the_content', 'wpgw_filter_ptags_on_images');
	
	// Clean up gallery output in Wordpress
	add_filter('gallery_style', 'wpgw_gallery_style');

	// Custom page <title>
	add_filter('wp_title', 'wpgw_custom_title');

	// BREADCRUMBS //////////////////////////////

	// Modify breadcrumbs
	add_filter('genesis_breadcrumb_args', 'wpgw_breadcrumb_args');

	// Replace breadcrumbs "Home" with Home Icon
	add_filter('genesis_home_crumb', 'wpgw_breadcrumb_home_link'); // Genesis >= 1.5

	// Reposition the breadcrumbs
	remove_action('genesis_before_loop', 'genesis_do_breadcrumbs');
	add_action('genesis_after_header', 'genesis_do_breadcrumbs');

	// STICKY FOOTER ////////////////////////////
	
	// Sticky Footer Functions
	add_action('genesis_before_header', 'wpgw_stickyfoot_wrap_begin');
	add_action('genesis_before_footer', 'wpgw_stickyfoot_wrap_end');

}