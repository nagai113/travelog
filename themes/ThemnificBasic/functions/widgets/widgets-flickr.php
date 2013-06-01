<?php
/*---------------------------------------------------------------------------------*/
/* Flickr widget */
/*---------------------------------------------------------------------------------*/
class flickr extends WP_Widget {

	function flickr() {
		$widget_ops = array('description' => 'This Flickr widget populates photos from a Flickr ID. Widget is disabled for basic version!' );

		parent::WP_Widget(false, __('Themnific - Flickr', ''),$widget_ops);      
	}

	function widget($args, $instance) {  

        echo '';

		echo '';

	}
} 

register_widget('flickr');
?>