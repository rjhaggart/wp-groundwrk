<?php

// Custom post type functions
// Dashicons - http://melchoyce.github.io/dashicons/

/**
* @name: addPostType
* @description: Custom function to add custom post types
* @params: string $name, array $args
* @return: void
*/
if(!function_exists('addPostType')){
	function addPostType($name, $args = array()){
	
		add_action('init', function() use($name, $args){
		
			$upper = ucwords($name);
			
			$name = strtolower(str_replace(' ', '_', $name));
			
			$args = array_merge(
				array(
					'public' => true,
					'label' => "All $upper",
					'labels' => array('add_new_item' => "Add New $upper"),
					'supports' => array('title', 'editor', 'comments'),
					'taxonomies' => array('post_tag')
				),
				$args
			);
		
			register_post_type($name, $args);
		});
		
	}
}

/**
* @name: addTaxonomy
* @description: Custom function to add custom taxonomy
* @params: string $name, string $postType, array $args
* @return: void
*/
if(!function_exists('addTaxonomy')){
	function addTaxonomy($name, $postType, $args = array()){
	
		add_action('init', function() use($name, $postType, $args){
		
			$upper = ucwords($name);
			
			$name = strtolower(str_replace(' ', '-', $name));	
			
			$args = array_merge(
				array(
					'label' => $upper
				),
				$args
			);
		
			//name of taxonomy, associated post type, options
			register_taxonomy($name, $postType, $args);	
		});
		
	}
}

include_once(CHILD_DIR.'/lib/inc/cpt/cpt-contacts.php');
