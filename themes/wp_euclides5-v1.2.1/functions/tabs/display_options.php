<?php global $ci, $ci_defaults, $load_defaults, $content_width; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_display_options', 30);
	if( !function_exists('ci_add_tab_display_options') ):
		function ci_add_tab_display_options($tabs) 
		{ 
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Display Options', 'ci_theme'); 
			return $tabs; 
		}
	endif;
	
	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	load_panel_snippet('excerpt');
	load_panel_snippet('seo');
	load_panel_snippet('comments');

	// Remove custom featured image size support for posts
	add_filter('ci_featured_image_post_types', 'ci_remove_featured_img_cpt');
	if( !function_exists('ci_remove_featured_img_cpt') ):
	function ci_remove_featured_img_cpt($post_types)
	{
		$pos = array_search('post', $post_types);
		if($pos !== false)
			unset( $post_types[$pos] );

		return $post_types;		
	}
	endif;
	load_panel_snippet('featured_image_single');

	// Change the Read more markup
	add_filter('ci-read-more-link', 'ci_theme_readmore', 10, 3);
	if( !function_exists('ci_theme_readmore') ):
	function ci_theme_readmore($html, $text, $link)
	{
		return '<a class="more-link" href="'. $link . '"><span class="read-more">' . $text . '</span></a>';
	}
	endif;

?>
<?php else: ?>

	<?php load_panel_snippet('excerpt'); ?>	

	<?php load_panel_snippet('seo'); ?>	

	<?php load_panel_snippet('comments'); ?>
	
	<?php load_panel_snippet('featured_image_single'); ?>

<?php endif; ?>
