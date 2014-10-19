<?php

// Remove the standard loop and add custom
remove_action ('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'custom_do_grid_loop');

function custom_do_grid_loop(){

	$event = new TimberPost();

	$start_date = date('Ymd', get_field('wpgw_event_start_date', $event->id, false));
	$end_date = date('Ymd', get_field('wpgw_event_end_date', $event->id, false));

	if($start_date === $end_date){
		$event->event_date = date('d/m/Y H:i', get_field('wpgw_event_start_date', $event->id, false)).' - '.date('H:i', get_field('wpgw_event_end_date', $event->id, false));
	}else{
		$event->event_date = date('d/m/Y H:i', get_field('wpgw_event_start_date', $event->id, false)).' - '.date('d/m/Y H:i', get_field('wpgw_event_end_date', $event->id, false));
	}

	$context['event'] = $event;

	Timber::render('lib/inc/views/single-event.twig', $context);

}
 
genesis();

?>
