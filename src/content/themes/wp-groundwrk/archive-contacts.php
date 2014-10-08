<?php

// Remove the standard loop and add custom
remove_action ('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'custom_do_grid_loop');

function custom_do_grid_loop(){

	$context['posts'] = Timber::get_posts();
	Timber::render('/lib/inc/views/archive-contacts.twig', $context);

}

// Remove Post Info
remove_action('genesis_before_post_content','genesis_post_info');
remove_action('genesis_after_post_content','genesis_post_meta');
 
genesis();

?>