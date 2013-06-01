<?php 
	get_template_part('panel/constants');

	load_theme_textdomain( 'ci_theme', get_template_directory() . '/lang' );

	// This is the main options array. Can be accessed as a global in order to reduce function calls.
	$ci = get_option(THEME_OPTIONS);
	$ci_defaults = array();

	// The $content_width needs to be before the inclusion of the rest of the files, as it is used inside of some of them.
	if ( ! isset( $content_width ) ) $content_width = 640;

	//
	// Let's bootstrap the theme.
	//
	get_template_part('panel/bootstrap');


	//
	// Define our various image sizes.
	//
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 110, true );
	add_image_size( 'ci_euclides_cptr', 181, 90, true);
	add_image_size( 'ci_euclides_side', 284, 120, true);
	add_image_size( 'ci_euclides_blog', 180, 180, true);


	// Let the user choose a color scheme on each post individually.
	add_ci_theme_support('post-color-scheme', array('page', 'post'));


	add_fancybox_support();

?>
