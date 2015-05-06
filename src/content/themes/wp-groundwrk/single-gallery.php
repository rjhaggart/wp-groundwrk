<?php

// Remove the standard loop and add custom
remove_action ('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'custom_do_grid_loop');

function custom_do_grid_loop(){

	$gallery = new TimberPost();

	$context['gallery'] = $gallery;

	Timber::render('lib/inc/views/single-gallery.twig', $context);

}
 
genesis();

?>
