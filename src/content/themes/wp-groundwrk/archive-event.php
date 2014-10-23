<?php

// Show page content above posts
add_action('genesis_before_loop', 'wpgw_include_page');

function wpgw_include_page(){

	$page = get_posts(array('name' => 'events', 'post_type' => 'page'));
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
		'post_type' => 'event',
		'posts_per_page' => 5,
		'paged' => $paged
	);
	query_posts($args);
	$events = Timber::get_posts();
	$context['pagination'] = Timber::get_pagination();

	foreach($events as $key => $event){

		$start_date = date('Ymd', get_field('wpgw_event_start_date', $event->id, false));
		$end_date = date('Ymd', get_field('wpgw_event_end_date', $event->id, false));

		if($start_date === $end_date){
			$events[$key]->event_date = date('d/m/Y H:i', get_field('wpgw_event_start_date', $event->id, false)).' - '.date('H:i', get_field('wpgw_event_end_date', $event->id, false));
		}else{
			$events[$key]->event_date = date('d/m/Y H:i', get_field('wpgw_event_start_date', $event->id, false)).' - '.date('d/m/Y H:i', get_field('wpgw_event_end_date', $event->id, false));
		}
	}
	$context['events'] = $events;
	Timber::render('/lib/inc/views/archive-events.twig', $context);

}
 
genesis();

?>