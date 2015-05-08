<?php

// Show page content above posts
add_action('genesis_before_loop', 'wpgw_include_page');

function wpgw_include_page(){

	$page = get_posts(array('name' => 'gallery', 'post_type' => 'page'));
	echo '<article class="post entry">';
	echo '<header class="entry-header"><h1 class="entry-title">'.$page[0]->post_title.'</h1></header>';
	echo '<div class="entry-content">'.apply_filters('the_content', $page[0]->post_content).'</div>';
	echo '</article>';
        
}

// Remove the standard loop and add custom
remove_action ('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'custom_do_grid_loop');

function custom_do_grid_loop(){

	global $paged;
    if (!isset($paged) || !$paged){
        $paged = 1;
    }

	$context = Timber::get_context();
	$args = array(
		'post_type' => 'gallery',
		'posts_per_page' => 5,
		'paged' => $paged
	);
	query_posts($args);
	$galleries = Timber::get_posts();
	$context['pagination'] = Timber::get_pagination();

	$context['galleries'] = $galleries;
	Timber::render('/lib/inc/views/archive-gallery.twig', $context);

}
 
genesis();

?>