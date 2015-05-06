<?php

// Event custom post type

addPostType('gallery', array( 
	'label' => __('Gallery', 'wpgw'),  
	'singular_label' => __('Gallery', 'wpgw'),  
	'public' => true,  
	'show_ui' => true,  
	'capability_type' => 'post',  
	'hierarchical' => false,  
	'has_archive' => true,
	'supports' => array('title', 'editor', 'author'),
	'menu_position' => 6,
	'menu_icon' => 'dashicons-format-gallery',
	'rewrite' => array(
		'slug'=>'gallery'
	),
));

addTaxonomy('gallery-type', 'gallery', array(
	'hierarchical' => true, 
	'label' => 'Gallery Types', 
	'singular_label' => 'Gallery Type', 
	'rewrite' => true, 
	'slug' => 'gallery-type'
));