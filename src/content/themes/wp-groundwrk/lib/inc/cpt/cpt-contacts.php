<?php

// Contact custom post type

addPostType('contacts', array( 
	'label' => __('Contacts', 'wpgw'),  
	'singular_label' => __('Event', 'wpgw'),  
	'public' => true,  
	'show_ui' => true,  
	'capability_type' => 'post',  
	'hierarchical' => false,  
	'has_archive' => true,
	'supports' => array('title'),
	'menu_position' => 6,
	'menu_icon' => 'dashicons-groups',
));

addTaxonomy('contact-type', 'contacts', array(
	'hierarchical' => true, 
	'label' => 'Contact Types', 
	'singular_label' => 'Contact Type', 
	'rewrite' => true, 
	'slug' => 'contact-type'
));