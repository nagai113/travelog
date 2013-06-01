<?php
add_action( 'widgets_init', 'ci_widgets_init' );
if( !function_exists('ci_widgets_init') ):
function ci_widgets_init() {

	register_sidebar(array(
		'name' => __( 'Right Sidebar', 'ci_theme'),
		'id' => 'sidebar-right',
		'description' => __( 'Sidebar on the right.', 'ci_theme'),
		'before_widget' => '<section class="block sidebar-item %1$s %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));	

	register_sidebar(array(
		'name' => __( 'Pages Sidebar', 'ci_theme'),
		'id' => 'sidebar-pages',
		'description' => __( 'Sidebar on the right of static pages. If there are no widgets assigned to this area, the "Right Sidebar" will be used instead.', 'ci_theme'),
		'before_widget' => '<section class="block sidebar-item %1$s %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));	

}
endif;
?>
