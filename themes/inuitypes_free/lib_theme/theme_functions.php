<?php

/* Custom WP 3.0 Menus */
/*------------------------------------------------------------------*/

if ( function_exists('wp_nav_menu') ) {

add_action( 'init', 'register_bizz_menus' );

function register_bizz_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'footer-menu' => __( 'Footer Menu' )
		)
	);
}

}

/* FAQs Custom Post Type */
/*------------------------------------------------------------------*/

add_action( 'init', 'create_my_faqs_post_type' );

function create_my_faqs_post_type() {
	
	$args = array(
        'label' => __('FAQs', 'bizzthemes'),
        'singular_label' => __('FAQ', 'bizzthemes'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'page',
		'taxonomies' => array('faq_category', 'faq_tag'),
        'hierarchical' => false,
		'rewrite' => true,  // 'rewrite' => array('slug' => 'faqs'),
		'menu_position' => 35,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
        'supports' => array('title', 'editor', 'comments', 'revisions')
    );
	
	register_post_type( 'faqs' , $args );
		
	register_taxonomy( 'faq_category', 'faqs', array(
		'hierarchical' => true,
	 	'update_count_callback' => '_update_post_term_count',
		'label' => __( 'FAQ Categories', 'bizzthemes' ),
		'singular_label' => __( 'FAQ Category', 'bizzthemes' ),
		'query_var' => false,
		'rewrite' => false,
		'public' => true,
		'show_ui' => true,
		'_builtin' => true,
	) ) ;
	
	register_taxonomy( 'faq_tag', 'faqs', array(
	 	'hierarchical' => false,
		'update_count_callback' => '_update_post_term_count',
		'label' => __( 'FAQ Tags', 'bizzthemes' ),
		'singular_label' => __( 'FAQ Tag', 'bizzthemes' ),
		'query_var' => false,
		'rewrite' => false,
		'public' => true,
		'show_ui' => true,
		'_builtin' => true,
	) );
   
}

add_action("manage_posts_custom_column", "my_custom_faqs_columns");
add_filter("manage_edit-faqs_columns", "my_faqs_columns");
 
function my_faqs_columns($faq_columns)
{
	$faq_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Question",
		"author" => "Author",
		"faq_category" => "Category",
		"faq_tag" => "Tags",
		"comments" => '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>',
		"date" => "Date"
	);	
	return $faq_columns;
}
 
function my_custom_faqs_columns($faq_column)
{
	global $faq_post, $post;
	if ("ID" == $faq_column) echo $post->ID;
	elseif ("author" == $faq_column) echo $post->post_author;
	elseif ("faq_category" == $faq_column) {
		
		$post_terms = get_the_term_list( $post->ID, 'faq_category', '', ', ', '' );
		echo $post_terms;
		
	}
	elseif ("faq_tag" == $faq_column) { 
		
		$post_terms = get_the_term_list( $post->ID, 'faq_tag', '', ', ', '' );
		echo $post_terms;
		
	}
	
}

/* Portfolio Custom Post Type */
/*------------------------------------------------------------------*/

/*

add_action( 'init', 'create_my_folio_post_type' );

function create_my_folio_post_type() {
	
	$args = array(
        'label' => __('Portfolio'),
        'singular_label' => __('Portfolio Item'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'page',
		'taxonomies' => array('folio_category', 'folio_tag'),
        'hierarchical' => false,
        'rewrite' => true,
		'menu_position' => 35,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
        'supports' => array('title', 'editor', 'comments', 'revisions')
    );
	
	register_post_type( 'folio' , $args );
		
	register_taxonomy( 'folio_category', 'folio', array(
		'hierarchical' => true,
	 	'update_count_callback' => '_update_post_term_count',
		'label' => __( 'Folio Categories' ),
		'singular_label' => __( 'Portfolio Category' ),
		'query_var' => false,
		'rewrite' => false,
		'public' => true,
		'show_ui' => true,
		'_builtin' => true,
	) ) ;
   
}

add_action("manage_posts_custom_column", "my_custom_folio_columns");
add_filter("manage_edit-folio_columns", "my_folio_columns");
 
function my_folio_columns($folio_columns)
{
	$folio_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Title",
		"author" => "Author",
		"folio_category" => "Category",
		"comments" => '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>',
		"date" => "Date"
	);	
	return $folio_columns;
}
 
function my_custom_folio_columns($folio_column)
{
	global $post;
	if ("ID" == $folio_column) echo $post->ID;
	elseif ("author" == $folio_column) echo $post->post_author;
	elseif ("folio_category" == $folio_column) {
		
		$folio_categories = get_the_terms($post->ID, "folio_category");
        $folio_categories_html = array();
        foreach ($folio_categories as $folio_cat)
            array_push($folio_categories_html, '<a href="' . get_term_link($folio_cat->slug, "folio_category") . '">' . $folio_cat->name . '</a>');
            echo implode($folio_categories_html, ", ");
		
	}
	
}

*/

?>