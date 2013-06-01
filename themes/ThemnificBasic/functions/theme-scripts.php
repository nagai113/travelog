<?php
if ( ! is_admin() ) { add_action( 'wp_print_scripts', 'themnific_add_javascript' ); }

if ( ! function_exists( 'themnific_add_javascript' ) ) {
	function themnific_add_javascript() {

		// Load Common scripts	
		wp_enqueue_script('jquery-1.6.1.min', get_stylesheet_directory_uri() .'/js/jquery-1.6.1.min.js');
		wp_enqueue_script( 'superfish', get_template_directory_uri().'/js/superfish.js');
		wp_enqueue_script( 'jquery.hoverIntent.minified', get_template_directory_uri().'/js/jquery.hoverIntent.minified.js');
		wp_enqueue_script('ownScript', get_stylesheet_directory_uri() .'/js/ownScript.js','','', true);
		

		// Load Coin Slider scripts		


		if ( is_home()) { 
			wp_enqueue_script('jquery-ui-personalized-1.5.2.packed', get_stylesheet_directory_uri() .'/js/jquery-ui-personalized-1.5.2.packed.js');
			wp_enqueue_script('coin-slider.min', get_stylesheet_directory_uri() .'/js/coin-slider.min.js');
			wp_enqueue_script('sprinkle', get_stylesheet_directory_uri() .'/js/sprinkle.js');
		} 

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	}
}
?>