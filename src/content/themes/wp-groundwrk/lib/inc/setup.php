<?php

// Scripts & Enqeueing
function wpgw_scripts_and_styles(){

	global $wp_styles;

	// SCRIPTS //////////////////////////////////

	// Deregister the superfish scripts
    wp_deregister_script('superfish');
    wp_deregister_script('superfish-args');

    // Replace jQuery with Google CDN version
	wp_deregister_script('jquery');
	wp_deregister_script('jquery-ui');
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), '1.11.1');
	wp_enqueue_script('jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js', array('jquery'), '1.11.1', true);

	// jRespond
	wp_enqueue_script('jrespond', get_stylesheet_directory_uri().'/lib/vendors/jrespond/jrespond.js', array('jquery'), '1.11.1', true);

	// Sidr
	wp_enqueue_script('sidr-plugin', get_stylesheet_directory_uri().'/lib/vendors/sidr/jquery.sidr.min.js', array('jquery'), '1.11.1', true);

	// Bootstrap
	wp_enqueue_script('script-bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array('jquery'), '3.2.0', true);

	// Fancybox
	wp_enqueue_script('fancybox-plugin-mousewheel', get_stylesheet_directory_uri().'/lib/vendors/fancybox/lib/jquery.mousewheel-3.0.6.pack.js', array('jquery'), '3.0.6', true);
	wp_register_style('wpgw-fancybox-style', get_stylesheet_directory_uri().'/lib/vendors/fancybox/source/jquery.fancybox.css', array(), '2.1.5');
	wp_enqueue_style('wpgw-fancybox-style');
	wp_enqueue_script('fancybox-plugin', get_stylesheet_directory_uri().'/lib/vendors/fancybox/source/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true);

	// Main script file
	wp_enqueue_script('script-main', get_stylesheet_directory_uri().'/lib/js/main.js', array('jquery'), CHILD_THEME_VERSION, true);

	// STYLES ///////////////////////////////////

    // Main stylesheet
	wp_register_style('wpgw-child-style', get_stylesheet_directory_uri().'/lib/css/style.css', array(), filemtime(CHILD_DIR.'/lib/css/style.css'));
	wp_enqueue_style('wpgw-child-style');

	// Custom stylesheet
	wp_register_style('wpgw-child-custom-style', get_stylesheet_directory_uri().'/custom.css', array(), filemtime(CHILD_DIR.'/custom.css'));
	wp_enqueue_style('wpgw-child-custom-style');

	// Font Awesome
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', false, '4.2.0', 'screen');

	// Google Fonts
	wp_enqueue_style('googlefonts-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,700', false, CHILD_THEME_VERSION, 'screen');
	wp_enqueue_style('googlefonts-lato', '//fonts.googleapis.com/css?family=Lato:300,400,700,900', false, CHILD_THEME_VERSION, 'screen');

}

// Add custom stylesheet
function wpgw_add_editor_styles(){
	add_editor_style(get_stylesheet_directory_uri().'/custom.css');
}

// Add favicon
function wpgw_child_load_favicon(){
	
	$context['path'] = get_stylesheet_directory_uri();
	$context['cachebust'] = date('dmyhis');
	Timber::render('/lib/inc/views/icon.twig', $context);

}

// Add Google Analytics tracking code
function wpgw_google_analytics(){

	$context['gaid'] = get_option('wpgw_analytics');
	Timber::render('/lib/inc/views/google-analytics.twig', $context);
	
}

// Customize the credits
function wpgw_child_footer_creds_text(){

	$context['date'] = date('Y');
	$context['copyright'] = get_option('wpgw_copyright');
	Timber::render('/lib/inc/views/footer-creds.twig', $context);

}

/*
Adding the conditional wrapper around ie stylesheet
Source: http://code.garyjones.co.uk/ie-conditional-style-sheets-wordpress/
*/
function wpgw_ie_conditional($tag, $handle){

	if('child-ie-only' == $handle){
		$tag = '<!--[if lte IE 9]>'."\n".$tag.'<![endif]-->'."\n";
	}
	return $tag;

}

/*
The responsive meta tag should be added to the genesis
core shortly, so keep tabs on that. I also added Google
Chrome Frame support & some other "mobile friendly"
meta tags. they're pretty rad.
*/
function wpgw_child_viewport_meta(){

	echo '<meta name="HandheldFriendly" content="True" />';
	echo '<meta name="MobileOptimized" content="320" />';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" />';

}
/*
If you name your child theme something that already exists in the
wordpress repo, then you may get an alert offering a "theme update"
for a theme that's not even yours. Weird, I know. Anyway, here's a
fix for that.

credit: Mark Jaquith
http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
*/
function wpgw_dont_update($r, $url){

	if(0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' )){
		return $r; // Not a theme update request. Bail immediately.
	}

	$themes = unserialize( $r['body']['themes']);
	unset( $themes[ get_option('template' ) ]);
	unset( $themes[ get_option('stylesheet' ) ]);
	$r['body']['themes'] = serialize( $themes);
	return $r;

}

/*
This remove the p from around imgs. For more checkout:
http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
*/
function wpgw_filter_ptags_on_images($content){

   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);

}

/*
Wordpress LOVES to inject css into the header.
we're going to stop that since it's gross and we
want our code to be as clean as possible
*/

// Remove WP version from RSS
function wpgw_rss_version(){ 

	return '';

}

// Remove CSS from gallery
function wpgw_gallery_style($css){

	return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);

}

// Flexslider hook into page
function wpgw_child_flexslider_page(){

	$flexslider = array('carousels' => get_field('wpgw_carousel'));

	if(!empty($flexslider['carousels'])){

		Timber::render('/lib/inc/views/flexslider.twig', $flexslider);

	}

}

// Remove permalink from custom post types
function wpgw_hide_permalinks($in){
    
	global $post;
	
	$cpts = array('special');
	
	if(in_array($post->post_type, $cpts)){
	
		print_r($post->post_type);
	
		$out = preg_replace('~<div id="edit-slug-box".*</div>~Ui', '', $in);
	
		return $out;
	}
	
	return false;
	
}

// Custom page <title>
function wpgw_custom_title($title){

	if($title === get_bloginfo('name').' –'){
		return 'Home &#8211; '.get_bloginfo('name');
	}else{
		return $title.' &#8211; '.get_bloginfo('name');
	}

}

// Modify breadcrumbs
function wpgw_breadcrumb_args( $args ) {
	$args['home'] = 'Home';
	$args['sep'] = '';
	$args['list_sep'] = ''; // Genesis 1.5 and later
	$args['prefix'] = '<div class="wrapper-breadcrumb">'."\n".'<div class="wrap">'."\n".'<div class="breadcrumb">';
	$args['suffix'] = '</div>'."\n".'</div>'."\n".'</div>';
	$args['heirarchial_attachments'] = true; // Genesis 1.5 and later
	$args['heirarchial_categories'] = true; // Genesis 1.5 and later
	$args['display'] = true;
	$args['labels']['prefix'] = '';
	$args['labels']['author'] = 'Archives for ';
	$args['labels']['category'] = 'Archives for '; // Genesis 1.6 and later
	$args['labels']['tag'] = 'Archives for ';
	$args['labels']['date'] = 'Archives for ';
	$args['labels']['search'] = 'Search for ';
	$args['labels']['tax'] = 'Archives for ';
	$args['labels']['post_type'] = '';
	$args['labels']['404'] = 'Not found: '; // Genesis 1.5 and later
return $args;
}

// Replace breadcrumbs "Home" with Home Icon
function wpgw_breadcrumb_home_link( $crumb ){

	$crumb = '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '"><span class="glyphicon glyphicon-home"></span></a>';
	return $crumb;

}

// Sticky Footer Functions
function wpgw_stickyfoot_wrap_begin(){

	echo '<div class="page-wrap">';
}
 
function wpgw_stickyfoot_wrap_end(){

	echo '</div><!-- page-wrap -->';

}

// Add id="main-content" attributes to <main> element
function wpgw_attr_content($attr){

     $attr['id'] = 'main-content';
     return $attr;
    
}

// Header top content
function wpgw_header_top_content(){

	$search = sprintf('<span class="custom-search"><i class="fa fa-search"></i>%s</span>', __(genesis_search_form()));
	echo '<div class="header-top-content"><div class="wrap"><div class="row"><div class="col-md-4 col-md-push-8">'.$search.'</div></div></div></div>';

}

// Homepage carousel
function wpgw_page_carousel(){

	$carousel_images = get_field('wpgw_page_carousel');

	//var_dump($carousel_images); exit;

	if($carousel_images !== false){

		$context['nav'] = '';
		foreach($carousel_images as $carousel_image => $val){
			$active = '';
			if($carousel_image === 0) $active = 'class="active"';
			$context['nav'] .= '<li data-target="#page-carousel" data-slide-to="'.$carousel_image.'" '.$active.'></li>';
		} 


		$context['images'] = $carousel_images;

		Timber::render('lib/inc/views/page-carousel.twig', $context, false);
	}

}

// Homepage news
function wpgw_home_news(){

	if(is_front_page()){

		$args = array('numberposts' => 3);
		$context['latest_news'] = Timber::get_posts($args);

		Timber::render('lib/inc/views/latest-news.twig', $context, false);
	
	}

}

// Page gallery
function wpgw_page_gallery(){

	$cpt = get_post_type();

	if(is_single()){

		if($cpt === 'post' || $cpt === 'event'){

			$context['post'] = Timber::get_post();

			Timber::render('lib/inc/views/page-gallery.twig', $context, false);
		
		}

	}

}

// Custom logo
function wpgw_custom_logo(){

	if(get_theme_mod('wpgw_logo')){

		$context = array(
			'url' => esc_url(home_url( '/' )),
			'title' => esc_attr(get_bloginfo('name', 'display')),
			'img' => esc_url(get_theme_mod('wpgw_logo')),
			'alt' => esc_attr(get_bloginfo('name', 'display'))
		);

		Timber::render('lib/inc/views/custom-logo.twig', $context, false);
	}else{
		echo 'test';
	}

}
