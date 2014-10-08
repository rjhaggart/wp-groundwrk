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