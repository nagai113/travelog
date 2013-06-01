<?php
/*---------------------------------------------------------------------------------*/
/* Twitter widget */
/*---------------------------------------------------------------------------------*/
class Twitter extends WP_Widget {

   function Twitter() {
	   $widget_ops = array('description' => 'Add your Twitter feed to your sidebar with this widget. Widget is disabled for basic version!' );
       parent::WP_Widget(false, __('Themnific - Twitter Stream', ''),$widget_ops);      
   }
   
	function widget($args, $instance) {  

        echo '';

		echo '';

	}
} 
register_widget('Twitter');
?>