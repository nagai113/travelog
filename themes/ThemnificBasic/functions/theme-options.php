<?php

add_action('init','themnific_options');  
function themnific_options(){
	
// VARIABLES
$themename = "Themnific Basic";
$shortname = "themnific";

// Populate 52Themes option in array for use in theme 
global $themnific_options; 
$themnific_options = get_option('themnific_options');

$GLOBALS['template_path'] = get_template_directory_uri();;

//Access the WordPress Categories via an Array
$themnific_categories = array();  
$themnific_categories_obj = get_categories('hide_empty=0');
foreach ($themnific_categories_obj as $themnific_cat) {
    $themnific_categories[$themnific_cat->cat_ID] = $themnific_cat->cat_name;}
$categories_tmp = array_unshift($themnific_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$themnific_pages = array();
$themnific_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($themnific_pages_obj as $themnific_page) {
    $themnific_pages[$themnific_page->ID] = $themnific_page->post_name; }
$themnific_pages_tmp = array_unshift($themnific_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 


//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}
// Set the Options Array
$bgurl =  get_template_directory_uri() . '/functions/images/bg';
//More Options
$all_uploads_path =  home_url() . '/wp-content/uploads/';
$all_uploads = get_option('themnific_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

// THIS IS THE DIFFERENT FIELDS
$options = array();   

$options[] = array( "name" => "General Settings",
                    "type" => "heading");

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");    

$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
                                               
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");        

$options[] = array( "name" => "Show Categories menu",
                    "desc" => "Check to show categories menu in header.",
                    "id" => $shortname."_cat_menu",
                    "std" => "false",
                    "type" => "checkbox");
					
$options[] = array( "name" => "Blog URL",
					"desc" => "Enter your URL. (Create page using Blog template)",
					"id" => $shortname."_url_blog",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Portfolio URL",
					"desc" => "Enter your URL. (Create page using Portfolio template)
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Disable Shordcodes",
					"desc" => "Disable shordcodes if you don't want to use this feature. Improve Website performance.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Disable Google Webfonts",
					"desc" => "Disable webfonts if you don't want to use this feature. Improve Website performance.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");
					
					

// general layout

$options[] = array( "name" => "General Layout",
					"type" => "heading");   
					
$options[] = array( "name" => "Core - Homepage Type",
                    "desc" => "Choose Core - Homepage type.
					<br/><b><i>Portfolio function is disabled for basic version!</i></b>",
                    "id" => $shortname."_homepage",
					"type" => "select2",
					"options" => array(
					"core-magazine" => "Blog/Magazine",
					"core-portfolio" => "Portfolio", 
					) );
					
					
$options[] = array( "name" => "Header Element",
                    "desc" => "Choose element for header section. <br />* go to Static Ads section to set up advertisement.
					<br/><b><i>Function is disabled for basic version!</i></b>",
                    "id" => $shortname."",
					"type" => "select2",
					"options" => array(
					"" => "None",
					"uni-searchformhead" => "Search Input",
					"uni-headad" => "Advertisements section*", 
					) ); 
					
					
$options[] = array( "name" => "Sidebar Floatation",
                    "desc" => "Choose general position of sidebar (note: You can change sidebar position for every post individually)
					<br/><b><i>Function is disabled for basic version!</i></b>.",
                    "id" => $shortname."",
					"type" => "select2",
					"options" => array(
					"right" => "Right Sidebar",
					"left" => "Left Sidebar",
					) ); 

$options[] = array( "name" => "Disable Sidebar tabs",
					"desc" => "Check to disable area
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");

$options[] = array( "name" => "Disable Social Networks",
					"desc" => "Check to disable area
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Disable Footer Widgets",
					"desc" => "Check to disable area
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");
					                        
// primary styling

$options[] = array( "name" => " Primary Styling - Body",
					"type" => "heading");
					
$options[] = array( "name" =>  "Body Background Color",
					"desc" => "Pick a custom color for background color of the theme e.g. #32333d",
					"id" => "themnific_body_color",
					"std" => "#f5f5f5",
					"type" => "color");
					
$options[] = array( "name" => "General Text Font Style",
					"desc" => "Select the typography used in general text. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).
					<br/><b><i>Google Webfonts - function is disabled for basic version!</i></b>",
					"id" => $shortname."_font_text",
					"std" => array('size' => '13','face' => 'Georgia, serif','style' => 'normal','color' => '#53648f'),
					"type" => "typography"); 

					
$options[] = array( "name" =>  "Link Color",
					"desc" => "Pick a custom color for links. e.g. #585a66",
					"id" => "themnific_link_color",
					"std" => "#585a66",
					"type" => "color");     

$options[] = array( "name" =>  "Link Hover Color",
					"desc" => "Pick a custom color for links (hover). #73b8f5",
					"id" => "themnific_link_hover_color",
					"std" => "#73b8f5",
					"type" => "color"); 
					
$options[] = array( "name" =>  "Text Shadows",
					"desc" => "Pick a custom color for text shadows. e.g. #fff
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => "",
					"std" => "#fff",
					"type" => "color");   
					
$options[] = array( "name" =>  "Borders",
					"desc" => "Pick a custom color for text shadows. e.g. #fff",
					"id" => "themnific_border_color",
					"std" => "#ddd",
					"type" => "color"); 
					
					
$options[] = array( "name" => "Background overlay",
                    "desc" => "Choose bg overlay.
					<br/><b><i>Function is disabled for basic version!</i></b>",
                    "id" => $shortname."",
					"type" => "select2",
					"options" => array(
					"" => "None",
					"bg-line1.png" => "Line 1",
					"bg-line2.png" => "Line 2", 
					"bg-line3.png" => "Line 3", 
					"bg-line4.png" => "Line 4", 
					"bg-line5.png" => "Line 5", 
					"bg-square1.png" => "Square 1",
					"bg-square2.png" => "Square 2",
					"bg-square3.png" => "Square 3",
					"bg-dots1.png" => "Dots",
					"bg-zig.png" => "Zig Zag", 
					) );
																					  
	
// secondary styling	
	
$options[] = array( "name" => "Secondary Styling - Header, Footer",
					"type" => "heading");
					
 
$options[] = array( "name" =>  "Header,Footer Background Color",
					"desc" => "Pick a custom color for background color of the theme e.g. #32333d",
					"id" => "themnific_custom_color",
					"std" => "#32333d",
					"type" => "color"); 

					
$options[] = array( "name" => "Secondary Text Font Style",
					"desc" => "Select the typography for header and footer <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).
					<br/><b><i>Google Webfonts - Function is disabled for basic version!</i></b>",
					"id" => $shortname."_font_text_sec",
					"std" => array('size' => '14','face' => 'Arial, sans-serif','style' => 'normal','color' => '#555555'),
					"type" => "typography");  
     
					
$options[] = array( "name" =>  "Secondary Link Color",
					"desc" => "Pick a custom color for links in slider, footer and headings area. #f0f0f0",
					"id" => "themnific_sec_link_color",
					"std" => "#f0f0f0",
					"type" => "color");     

$options[] = array( "name" =>  "Secondary Link Hover Color",
					"desc" => "Pick a custom color for links (hover) in slider, footer and headings area. e.g. #fff",
					"id" => "themnific_sec_link_hover_color",
					"std" => "#fff",
					"type" => "color");       
					

$options[] = array( "name" =>  "Secondary Text Shadows",
					"desc" => "Pick a custom color for text shadows. e.g. #fff
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => "",
					"std" => "#fff",
					"type" => "color");  

			

$options[] = array( "name" => "Secondary Background overlay",
                    "desc" => "Choose bg overlay.
					<br/><b><i>Function is disabled for basic version!</i></b>",
                    "id" => $shortname."",
					"type" => "select2",
					"options" => array(
					"" => "None",
					"bg-line1.png" => "Line 1",
					"bg-line2.png" => "Line 2", 
					"bg-line3.png" => "Line 3", 
					"bg-line4.png" => "Line 4", 
					"bg-line5.png" => "Line 5", 
					"bg-square1.png" => "Square 1",
					"bg-square2.png" => "Square 2",
					"bg-square3.png" => "Square 3",
					"bg-dots1.png" => "Dots",
					"bg-zig.png" => "Zig Zag", 
					) );
	

// other styling	
	
$options[] = array( "name" => "Other Styling - Navigation, Elements, Alternatives",
					"type" => "heading");				     


$options[] = array( "name" =>  "Navigation + Alternative Background Color",
					"desc" => "Pick a custom color for background color of the theme e.g. #32333d",
					"id" => "themnific_thi_body_color",
					"std" => "#b3ac9f",
					"type" => "color"); 
					
$options[] = array( "name" =>  "Alternative Borders",
					"desc" => "Pick a custom color for borders. e.g. #fff
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => "",
					"std" => "#ddd",
					"type" => "color");

$options[] = array( "name" =>  "Slider Background Color",
					"desc" => "Pick a custom color for background color of the theme e.g. #32333d
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => "",
					"std" => "#b3ac9f",
					"type" => "color"); 


$options[] = array( "name" => "Navigation Font Style",
					"desc" => "Select the typography for navigation and social networks.. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => array('size' => '10','face' => 'Arial, sans-serif','style' => 'normal','color' => '#333'),
					"type" => "typography");  
					
$options[] = array( "name" =>  "Alternative Text Color",
					"desc" => "Pick a custom color for text in alternative section. e.g. #fff
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => "",
					"std" => "#000",
					"type" => "color");  	

$options[] = array( "name" =>  "Alternative Link Color",
					"desc" => "Pick a custom color for links in alternative section. e.g. #fff
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => "",
					"std" => "#000",
					"type" => "color");  					
					
$options[] = array( "name" =>  "Navigation + Alternative Link Hover Color",
					"desc" => "Pick a custom color for links (hover) in navigation. e.g. #fff
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => "",
					"std" => "#fff",
					"type" => "color");       
					

$options[] = array( "name" =>  "Navigation + Alternative Text Shadows",
					"desc" => "Pick a custom color for text shadows. e.g. #fff
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => "",
					"std" => "#fff",
					"type" => "color");  
					
					
					


$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");




$options[] = array( "name" => "Headings Typography",
					"type" => "heading");    

$options[] = array( "name" => "H1 Font Style",
					"desc" => "Select the typography you want for heading H1. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => array('size' => '28','face' => 'Georgia, serif','style' => 'normal','color' => '#222222'),
					"type" => "typography");  

$options[] = array( "name" => "H2 Font Style",
					"desc" => "Select the typography you want for heading H2. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => array('size' => '24','face' => 'Georgia, serif','style' => 'normal','color' => '#222222'),
					"type" => "typography");  

$options[] = array( "name" => "H3 Font Style",
					"desc" => "Select the typography you want for heading H3 <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).
					<br/><b><i>Google Webfonts - Function is disabled for basic version!</i></b>",
					"id" => $shortname."_font_h3",
					"std" => array('size' => '20','face' => 'Georgia, serif','style' => 'normal','color' => '#222222'),
					"type" => "typography"); 
					
$options[] = array( "name" => "Footer H3 Font Style",
					"desc" => "Select the typography you want for footer heading H3. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).
					<br/><b><i>Google Webfonts - Function is disabled for basic version!</i></b>",
					"id" => $shortname."_font_h3_footer",
					"std" => array('size' => '20','face' => 'Georgia, serif','style' => 'normal','color' => '#222222'),
					"type" => "typography"); 

$options[] = array( "name" => "H4 Font Style",
					"desc" => "Select the typography you want for heading H4. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => array('size' => '16','face' => 'Georgia, serif','style' => 'normal','color' => '#222222'),
					"type" => "typography");  
					
$options[] = array( "name" => "H5 & H6 Font Style",
					"desc" => "Select the typography you want for heading H5 and H6. <br />* semi-safe font <br />** @font-face rule <br />*** Google Webfonts (Must be allowed in General Settings tab).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => array('size' => '14','face' => 'Georgia, serif','style' => 'normal','color' => '#222222'),
					"type" => "typography"); 


// static featured

$options[] = array( "name" => "Line Posts - Universal featured sections",
					"type" => "heading");  
					
					  

$options[] = array("name" => "Top Line posts - Title",
					"desc" => "Enter some text here.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "Featured",
					"type" => "text"); 


$options[] = array( "name" => "Top Line posts - Style",
					"desc" => "Choose style of top line posts
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"type" => "select2",
					"options" => array(
					"bigtips" => "Big Posts",
					"smalltips" => "Small Posts",
					) );

$options[] = array( "name" => "Top Line posts - Category",
					"desc" => "Select a Category for Top Line Posts. (upload images to the post content).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $themnific_categories);	
					
$options[] = array("name" => "Top Line posts - Number of posts",
					"desc" => "Recommend: 3 posts for Bigposts, 5 posts for Smallposts
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "3",
					"type" => "text");  

$options[] = array( "name" => "Disable Top Line posts",
                    "desc" => "<b><i>Function is disabled for basic version!</i></b>",
                    "id" => $shortname."",
                    "std" => "false",
                    "type" => "checkbox");	



$options[] = array("name" => "Bottom Line posts - Title",
					"desc" => "Enter some text here.",
					"id" => $shortname."_title_bottomline",
					"std" => "Enter some text here",
					"type" => "text"); 

$options[] = array( "name" => "Bottom Line posts - Style",
					"desc" => "Choose style of bottom line posts
					<br/><b><i>Small Posts - Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"type" => "select2",
					"options" => array(
					"bigtips" => "Big Posts",
					"smalltips" => "Small Posts",
					) );

$options[] = array( "name" => "Bottom Line posts - Category",
					"desc" => "Select a Category for Bottom Line Posts. (upload images to the post content).",
					"id" => $shortname."_bottomline_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $themnific_categories);	
					
$options[] = array("name" => "Bottom Line posts - Number of posts",
					"desc" => "Recommend: 3 posts for Bigposts, 5 posts for Smallposts",
					"id" => $shortname."_bottomline_count",
					"std" => "3",
					"type" => "text");  

$options[] = array( "name" => "Disable Bottom Line posts",
                    "desc" => "",
                    "id" => $shortname."_bottomline_dis",
                    "std" => "false",
                    "type" => "checkbox");	




// magazine sliders

$options[] = array( "name" => "Magazine Sliders",
					"type" => "heading");    


$options[] = array( "name" => "Type of Featured slider",
					"desc" => "Choose slider that you want to display in homepage
					<br/><b><i>Small slider - Function is disabled for basic version!</i></b>",
					"id" => $shortname."_type_slider_mag",
					"type" => "select2",
					"options" => array(
					"" => "None",
					"slider-large" => "Full (Big) Slider",
					"slider-small" => "Small (Content) Slider", 
					) );


$options[] = array( "name" => "Slider Category (Homepage)",
					"desc" => "Select a Category for Slider 1. (upload images to the post content).",
					"id" => $shortname."_slider1_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $themnific_categories);






// magazine layout

$options[] = array( "name" => "Magazine Layout - Latest posts",
					"type" => "heading"); 

$options[] = array("name" => "Latest Post Title",
					"desc" => "Enter some text here.",
					"id" => $shortname."_title_latestpost",
					"std" => "Latest Posts",
					"type" => "text");					


$options[] = array("name" => "Number of latest posts",
					"desc" => "",
					"id" => $shortname."_count_latestpost",
					"std" => "6",
					"type" => "text");  
					
$options[] = array( "name" => "Latest Posts Post Type",
                    "desc" => "Choose post type.
					<br/><b><i>Medium, Plain posts - Function is disabled for basic version!</i></b>",
                    "id" => $shortname."_ptype_latestpost",
					"type" => "select2",
					"options" => array(
					"bigpost" => "Large post",
					"medpost" => "Medium posts", 
					"smallpost" => "Small posts",
					"plainpost" => "Plain post", 
					) );

$options[] = array( "name" => "Disable Latest Post Section",
					"desc" => "Check to disable blog area
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."_dislatestpost",
					"std" => "false",
					"type" => "checkbox");
					


// magazine layout

$options[] = array( "name" => "Magazine Layout - Featured, Popular posts",
					"type" => "heading"); 
					
					
					
$options[] = array("name" => "Top Featured Title",
					"desc" => "Enter some text here.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "Featured",
					"type" => "text");   

$options[] = array( "name" => "Top Featured Category",
					"desc" => "Select a Category for Slider 1. (upload images to the post content).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $themnific_categories);
					
$options[] = array("name" => "Number of posts",
					"desc" => "<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "1",
					"type" => "text");  
					
$options[] = array( "name" => "Top Featured Post Type",
                    "desc" => "Choose post type.
					<br/><b><i>Function is disabled for basic version!</i></b>",
                    "id" => $shortname."",
					"type" => "select2",
					"options" => array(
					"bigpost" => "Large post",
					"medpost" => "Medium posts", 
					"smallpost" => "Small posts",
					"plainpost" => "Plain post", 
					) );
					
$options[] = array( "name" => "Disable Alternative style of large post",
                    "desc" => "<b><i>Function is disabled for basic version!</i></b>",
                    "id" => $shortname."",
                    "std" => "false",
                    "type" => "checkbox");
					
$options[] = array( "name" => "Disable Top Featured Section",
					"desc" => "Check to disable blog area
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");
					

					
					


$options[] = array("name" => "Popular Post Title",
					"desc" => "Enter some text here.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "Popular",
					"type" => "text");					


$options[] = array("name" => "Number of Popular posts",
					"desc" => "<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "6",
					"type" => "text");  
					
$options[] = array( "name" => "Popular Posts Post Type",
                    "desc" => "Choose post type.
					<br/><b><i>Function is disabled for basic version!</i></b>",
                    "id" => $shortname."",
					"type" => "select2",
					"options" => array(
					"bigpost" => "Large post",
					"medpost" => "Medium posts", 
					"smallpost" => "Small posts",
					"plainpost" => "Plain post", 
					) );

$options[] = array( "name" => "Disable Popular Post Section",
					"desc" => "Check to disable blog area.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");






// portfolio setup

$options[] = array( "name" => "Portfolio Setup",
					"type" => "heading");  
					
$options[] = array("name" => "Main Title",
					"desc" => "Enter title heading.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");	
					
$options[] = array("name" => "Portfolio Title",
					"desc" => "Enter title heading.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => "Homepage Portfolio - Posts Style",
					"desc" => "Choose folio style that you want to display in homepage
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"type" => "select2",
					"options" => array(
					"foliopost-plain" => "Plain posts",
					"foliopost-basic" => "Basic posts",
					"foliopost-full" => "Full posts",
					) );
					
$options[] = array("name" => "Number of Portfolio Items",
					"desc" => "<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "8",
					"type" => "text");  

$options[] = array("name" => "Blog Section Title",
					"desc" => "Enter title heading.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");	
					
$options[] = array("name" => "Number of Latest Blog Posts",
					"desc" => "<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "4",
					"type" => "text"); 

					
$options[] = array("name" => "About Us - Title",
					"desc" => "<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text"); 
					
$options[] = array("name" => "About Us - Info text",
					"desc" => "Enter About Information
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "textarea"); 
					
					
$options[] = array("name" => "About Us - Map/Video",
					"desc" => "Enter your embed HTML code here (e.g. Google Maps code). Width 432px.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "textarea"); 

					
// portfolio layout

$options[] = array( "name" => "Portfolio Layout",
					"type" => "heading");    

$options[] = array( "name" => "Services",
					"desc" => "Check to disable services area
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");

$options[] = array( "name" => "Homepage Portfolio",
					"desc" => "Check to disable portfolio area
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");

$options[] = array( "name" => "Homepage Blog",
					"desc" => "Check to disable blog area
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "About Us",
					"desc" => "Check to disable blog area
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");


// portfolio sliders

$options[] = array( "name" => "Portfolio Sliders",
					"type" => "heading");    


$options[] = array( "name" => "Type of Featured slider",
					"desc" => "Choose slider that you want to display in homepage. <br />* Use following lines to set Nivo slider. <br />** Use custom post types named <b>Slider</b> to set up slider.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"type" => "select2",
					"options" => array(
					"" => "None",
					"slider-nivo" => "Nivo Slider*",
					"slider-content" => "Content Slider 1**", 
					"slider-content2" => "Center Slider**", 
					) );

$options[] = array("name" => "Nivo Slider",
					"desc" => "<b><i>Function is disabled for basic version!</i></b>",
					"id" => "",
					"std" => "",
					"type" => ""); 


$options[] = array("name" => "Image 1 URL",
					"desc" => "Enter your image url here (940x350px).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");   
	   
$options[] = array("name" => "Link 1 URL",
					"desc" => "Enter link url here.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "#",
					"type" => "text");
					
$options[] = array("name" => "Caption 1",
					"desc" => "Enter some text here (optional)
					<br/><b><i>Function is disabled for basic version!</i></b>.",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");
	
$options[] = array("name" => "Image 2 URL",
					"desc" => "Enter your image url here (940x350px).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text"); 
	   
$options[] = array("name" => "Link 2 URL",
					"desc" => "Enter link url here.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "#",
					"type" => "text");
					
$options[] = array("name" => "Caption 2",
					"desc" => "Enter some text here (optional).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");

$options[] = array("name" => "Image 3 URL",
					"desc" => "Enter your image url here (940x350px).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");   
	   
$options[] = array("name" => "Link 3 URL",
					"desc" => "Enter link url here.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "#",
					"type" => "text");
					
$options[] = array("name" => "Caption 3",
					"desc" => "Enter some text here (optional).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");

$options[] = array("name" => "Image 4 URL",
					"desc" => "Enter your image url here (940x350px).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");  
	   
$options[] = array("name" => "Link 4 URL",
					"desc" => "Enter link url here.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "#",
					"type" => "text");

$options[] = array("name" => "Caption 4",
					"desc" => "Enter some text here (optional).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");


					



// social networks	

$options[] = array( "name" => "Social Networks",
    				"type" => "heading");


$options[] = array( "name" => "Facebook",
					"desc" => "",
					"id" => $shortname."_socials_fa",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Twitter",
					"desc" => "",
					"id" => $shortname."_socials_tw",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "You Tube",
					"desc" => "",
					"id" => $shortname."_socials_yo",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Vimeo",
					"desc" => "",
					"id" => $shortname."_socials_vi",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Tumblr",
					"desc" => "",
					"id" => $shortname."_socials_tu",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Deviant Art",
					"desc" => "",
					"id" => $shortname."_socials_de",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Flickr",
					"desc" => "",
					"id" => $shortname."_socials_fl",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Linked In",
					"desc" => "",
					"id" => $shortname."_socials_li",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Last FM",
					"desc" => "",
					"id" => $shortname."_socials_la",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Myspace",
					"desc" => "",
					"id" => $shortname."_socials_my",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Posterous",
					"desc" => "",
					"id" => $shortname."_socials_po",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Spotify",
					"desc" => "",
					"id" => $shortname."_socials_sp",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Skype",
					"desc" => "",
					"id" => $shortname."_socials_sk",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Yahoo",
					"desc" => "",
					"id" => $shortname."_socials_ya",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Delicious",
					"desc" => "",
					"id" => $shortname."_socials_dl",
					"std" => "",
					"type" => "text");



					
// footer
$options[] = array( "name" => "Footer",
                    "type" => "heading");
					

					
$options[] = array( "name" => "Enable Custom Footer (Left)",
					"desc" => "Activate to add the custom text below to the theme footer.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Custom Text (Left)",
					"desc" => "Custom HTML and Text that will appear in the footer of your theme.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "<p></p>",
					"type" => "textarea");
	
						
$options[] = array( "name" => "Enable Custom Footer (Right)",
					"desc" => "Activate to add the custom text below to the theme footer
					<br/><b><i>Function is disabled for basic version!</i></b>.",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Custom Text (Right)",
					"desc" => "Custom HTML and Text that will appear in the footer of your theme.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "<p></p>",
					"type" => "textarea");


// ads					
					
$options[] = array( "name" => "Static Ads",
					"type" => "heading");  
					

$options[] = array("name" => "Header 468 Image 1 URL",
					"desc" => "Enter your image url here (468x60px).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");   
	   
$options[] = array("name" => "Header 468 Link 1 URL",
					"desc" => "Enter link url here.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "#",
					"type" => "text");



$options[] = array("name" => "Content 468 Image 1 URL",
					"desc" => "Enter your image url here (468x60px).
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "",
					"type" => "text");   
	   
$options[] = array("name" => "Content 468 Link 1 URL",
					"desc" => "Enter link url here.
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "#",
					"type" => "text");


$options[] = array( "name" => "Disable Content Ad",
					"desc" => "Check to disable ad area
					<br/><b><i>Function is disabled for basic version!</i></b>",
					"id" => $shortname."",
					"std" => "false",
					"type" => "checkbox");



							                        
update_option('themnific_template',$options);      
update_option('themnific_themename',$themename);   
update_option('themnific_shortname',$shortname);

                                     
// Themnific Metabox Options
$themnific_metaboxes = array();

$themnific_metaboxes[] = array (	"name" => "image",
							"label" => "Image",
							"type" => "upload",
							"desc" => "Upload file here...");							
    
update_option('themnific_custom_template',$themnific_metaboxes);      

}

?>