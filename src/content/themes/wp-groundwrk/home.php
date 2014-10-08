<?php 
/**
 * Template Name: Blog
 */

// Show page content above posts
add_action('genesis_before_loop', 'wpgw_include_page');

function wpgw_include_page(){

	$page = get_posts(array('name' => 'news', 'post_type' => 'page'));
	echo '<article class="post entry">';
	echo '<header class="entry-header"><h1 class="entry-title">'.$page[0]->post_title.'</h1></header>';
	echo '<div class="entry-content">'.apply_filters('the_content', $page[0]->post_content).'</div>';
	echo '</article>';
        
}

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'genesis_standard_loop', 5);
 
genesis();