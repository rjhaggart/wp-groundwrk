<?php

// Custom stylesheet to change wysiwyg editor font
add_editor_style(get_stylesheet_directory_uri().'/lib/css/wp-admin/wp-editor.css');

// Change the WP admin favicon
add_action('admin_head', 'wpgw_child_load_favicon');

/**
 * Change WP admin login logo
 */
function wpgw_login_head(){

	$context['path'] = get_stylesheet_directory_uri();
	Timber::render('/lib/inc/views/admin-login-logo.twig', $context);

}
add_action('login_head', 'wpgw_login_head');
	
/**
 * Remove unused sections from the admin menu
 */
function remove_menus(){

	global $menu;
	
	$restricted = array(__('Comments', 'wpgw'));
	
	end($menu);
	
	while(prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"", $restricted)){unset($menu[key($menu)]);}
	}
	
}
add_action('admin_menu', 'remove_menus');


// MEDIA LIBRARY ////////////////////////////
	
/**
 * Remove 'Link To' option to none
 */
function wpgw_always_link_images_to_none(){
	return 'none';
}
add_action('pre_option_image_default_link_type', 'wpgw_always_link_images_to_none');

/**
 * Set default image size to full
 */
function wpgw_always_default_to_full_image_size(){
	return 'large'; 
}
add_action('pre_option_image_default_size', 'wpgw_always_default_to_full_image_size');

// THEME CUSTOMISER /////////////////////////////

/**
 * Logo uploader
 * Attribution, Kirk Wight http://goo.gl/34Roim
 */
function wpgw_theme_customizer($wp_customize) {

	// Create new section for logo upload
	$wp_customize->add_section( 'wpgw_logo_section' , array(
		'title'       => __('Logo', 'wpgw'),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description in the header',
	));

	// Register new setting
	$wp_customize->add_setting('wpgw_logo');

	// Use image uploader for setting our logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpgw_logo', array(
		'label'    => __('Logo', 'wpgw'),
		'section'  => 'wpgw_logo_section',
		'settings' => 'wpgw_logo',
	)));

}
add_action('customize_register', 'wpgw_theme_customizer');