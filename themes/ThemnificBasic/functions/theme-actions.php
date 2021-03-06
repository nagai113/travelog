<?php 

/*-----------------------------------------------------------------------------------*/
/* Custom functions */
/*-----------------------------------------------------------------------------------*/


	global $themnific_options;
	$output = '';

// Add custom styling
add_action('themnific_head','themnific_custom_styling');
function themnific_custom_styling() {
	
	// Get options
	$home = home_url();
	
	$sec_body_color = get_option('themnific_custom_color');
	$thi_body_color = get_option('themnific_thi_body_color');
	$for_body_color = get_option('themnific_for_body_color');
	$body_color = get_option('themnific_body_color');
	$text_color = get_option('themnific_text_color');
	$text_color_alter = get_option('themnific_text_color_alter');
	$body_color_sec = get_option('themnific_body_color_sec');
	$sec_text_color = get_option('themnific_sec_text_color');
	$thi_text_color = get_option('themnific_thi_text_color');
	$link = get_option('themnific_link_color');
	$link_alter = get_option('themnific_link_color_alter');
	$hover = get_option('themnific_link_hover_color');
	$sec_link = get_option('themnific_sec_link_color');
	$sec_hover = get_option('themnific_sec_link_hover_color');
	$thi_hover = get_option('themnific_thi_link_hover_color');
	$button = get_option('themnific_button_color');
	$body_bg = get_option('themnific_body_bg');
	$body_bg_sec = get_option('themnific_body_bg_sec');
	$shadows = get_option('themnific_shadows_color');
	$shadows_sec = get_option('themnific_shadows_color_sec');
	$shadows_thi = get_option('themnific_shadows_color_thi');
	$border = get_option('themnific_border_color');
	$border_sec = get_option('themnific_border_color_sec');
	    $custom_css = get_option('themnific_custom_css');
		
	// Add CSS to output
		if ($custom_css)
		$output .= $custom_css ;
	
	if ($body_color)
		$output .= '
		body,
		ul#serinfo,
		#serinfo-nav li.current
		{background-color:'.$body_color.'}' . "\n";
	if ($sec_body_color)
		$output .= '
		#sliderwrap,
		#slider-wrapper,
		#header,
		#footer,
		.nav li ul li,
		a.viewproject
		{background-color:'.$sec_body_color.'}' . "\n";
	if ($thi_body_color)
		$output .= '
		#navigation,.nav li ul a,.nav li ul li a, ul.bigpost li.alter,#social
		{background-color:'.$thi_body_color.'}' . "\n";
	if ($for_body_color)
		$output .= '
		#sliderwarp span#bg,
		#sldback,
		.inpost3
		{background-color:'.$for_body_color.'}' . "\n";
	if ($text_color)
		$output .= 'body {color:'.$text_color.'}' . "\n";	
	if ($sec_text_color)
		$output .= '
		#header,
		#footer 
		{color:'.$sec_text_color.'}' . "\n";
	if ($text_color_alter)
		$output .= 'ul.bigpost li.alter p,ul.bigpost li.alter .bigmeta {color:'.$text_color_alter.' !important}' . "\n";
	if ($link)
		$output .= 'a:link, a:visited,#portfolio-filter a {color:'.$link.'}' . "\n";
	if ($link_alter)
		$output .= 'ul.bigpost li.alter a {color:'.$link_alter.'}' . "\n";
	if ($hover)
		$output .= 'a:hover {color:'.$hover.'}' . "\n";
	if ($sec_link)
		$output .= '
		#footer a,.nav a,#social a,.nav li ul a,.nav li ul li a,
		a.viewproject {color:'.$sec_link.'}' . "\n";
	if ($sec_hover)
		$output .= '
		#footer a:hover,.nav a:hover,.nav li ul a:hover,.nav li ul li a:hover
		{color:'.$sec_hover.'}' . "\n";
	if ($thi_hover)
		$output .= '
		ul.bigpost li.alter a:hover,#social a:hover
		{color:'.$thi_hover.'}' . "\n";
		
		
		

	if ($body_bg)
		$output .= '
		body
		{background-image:url('.$home.'/wp-content/themes/ThemnificPro/images/bg/'.$body_bg.')}' . "\n";
		
	if ($body_bg_sec)
		$output .= '
		#header,#footer
		{background-image:url('.$home.'/wp-content/themes/ThemnificPro/images/bg/'.$body_bg_sec.')}' . "\n";
		
	if ($border)
		$output .= 'h1.pagetitle,h2.leading,h3.leading,h3.pagetitle,h4.leading,.bigmeta, .meta,#sidebar h2,#hometab,ul#serinfo,ul#serinfo-nav li,ul.medpost li p,.smallmeta {border-color:'.$border.' !important}' . "\n";	

	if ($border_sec)
		$output .= 'ul.bigpost li.alter .bigmeta,ul.bigpost li.alter {border-color:'.$border_sec.' !important}' . "\n";

	if ($body_color)
		$output .= '#serinfo-nav li.current {border-bottom-color:'.$body_color.' !important}' . "\n";	


	if ($shadows)
		$output .= 'body,#portfolio-filter a {text-shadow:0 1px 1px '.$shadows.'}' . "\n";
		
	if ($shadows_sec)
		$output .= '#header,#footer {text-shadow:0 1px 1px '.$shadows_sec.'}' . "\n";
		
	if ($shadows_thi)
		$output .= '#social,.nav a,ul.bigpost li.alter {text-shadow:0 1px 1px '.$shadows_thi.'}' . "\n";


	if ($button)
		$output .= '.button, .reply a {background-color:'.$button.'}' . "\n";

		// General Typography		
		$font_text = get_option('themnific_font_text');	
		$font_text_sec = get_option('themnific_font_text_sec');	
		
		$font_nav = get_option('themnific_font_nav');
		$font_h1 = get_option('themnific_font_h1');	
		$font_h2 = get_option('themnific_font_h2');	
		$font_h3 = get_option('themnific_font_h3');	
		$font_h3_footer = get_option('themnific_font_h3_footer');
		$font_h4 = get_option('themnific_font_h4');	
		$font_h5 = get_option('themnific_font_h5');	
		$font_h6 = get_option('themnific_font_h5');	
	
	
		if ( $font_text )
			$output .= 'body {font:'.$font_text["style"].' '.$font_text["size"].'px/1.8em '.stripslashes($font_text["face"]).';color:'.$font_text["color"].'}' . "\n";
		if ( $font_text )
			$output .= '#header,#footer {font:'.$font_text_sec["style"].' '.$font_text_sec["size"].'px/1.5em '.stripslashes($font_text_sec["face"]).';color:'.$font_text_sec["color"].'}' . "\n";
			$output .= '.navs a,#socials a {font:'.$font_nav["style"].' '.$font_nav["size"].'px/1.5em '.stripslashes($font_nav["face"]).';color:'.$font_nav["color"].'}' . "\n";
		if ( $font_h1 )
			$output .= 'h1 {font:'.$font_h1["style"].' '.$font_h1["size"].'px/1.5em '.stripslashes($font_h1["face"]).';color:'.$font_h1["color"].'}';	
		if ( $font_h2 )
			$output .= 'h2,.nivo-caption p {font:'.$font_h2["style"].' '.$font_h2["size"].'px/1.5em '.stripslashes($font_h2["face"]).';color:'.$font_h2["color"].'}';	
		if ( $font_h3 )
			$output .= 'h3 {font:'.$font_h3["style"].' '.$font_h3["size"].'px/1.5em '.stripslashes($font_h3["face"]).';color:'.$font_h3["color"].'}';	
		if ( $font_h3_footer )
			$output .= '#footer h3 {font:'.$font_h3_footer["style"].' '.$font_h3_footer["size"].'px/1.5em '.stripslashes($font_h3_footer["face"]).';color:'.$font_h3_footer["color"].'}';	
		if ( $font_h4 )
			$output .= 'h4 {font:'.$font_h4["style"].' '.$font_h4["size"].'px/1.5em '.stripslashes($font_h4["face"]).';color:'.$font_h4["color"].'}';	
		if ( $font_h5 )
			$output .= 'h5 {font:'.$font_h5["style"].' '.$font_h5["size"].'px/1.5em '.stripslashes($font_h5["face"]).';color:'.$font_h5["color"].'}';	
		if ( $font_h6 )
			$output .= 'h6 {font:'.$font_h6["style"].' '.$font_h6["size"].'px/1.5em '.stripslashes($font_h6["face"]).';color:'.$font_h6["color"].'}' . "\n";	

	
	// Output styles
		if ($output <> '') {
			$output = "<!-- Themnific Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
	}
		
} 


				

?>