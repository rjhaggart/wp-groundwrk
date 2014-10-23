<?php

// Event custom post type

addPostType('event', array( 
	'label' => __('Events', 'wpgw'),  
	'singular_label' => __('Event', 'wpgw'),  
	'public' => true,  
	'show_ui' => true,  
	'capability_type' => 'post',  
	'hierarchical' => false,  
	'has_archive' => true,
	'supports' => array('title', 'editor', 'thumbnail', 'author'),
	'menu_position' => 6,
	'menu_icon' => 'dashicons-calendar',
	'rewrite' => array(
		'slug'=>'events'
	),
));

addTaxonomy('event-type', 'event', array(
	'hierarchical' => true, 
	'label' => 'Event Types', 
	'singular_label' => 'Event Type', 
	'rewrite' => true, 
	'slug' => 'event-type'
));