<?php

// Event custom post type

addPostType('status', array( 
	'label' => __('Service Status', 'wpgw'),  
	'singular_label' => __('Service Status', 'wpgw'),  
	'public' => true,  
	'show_ui' => true,  
	'capability_type' => 'post',  
	'hierarchical' => false,  
	'has_archive' => true,
	'supports' => array('title', 'author'),
	'menu_position' => 6,
	'menu_icon' => 'dashicons-dashboard',
	'rewrite' => array(
		'slug'=>'status'
	),
));

addTaxonomy('status-type', 'status', array(
	'hierarchical' => true, 
	'label' => 'Status Types', 
	'singular_label' => 'Status Type', 
	'rewrite' => true, 
	'slug' => 'status-type'
));