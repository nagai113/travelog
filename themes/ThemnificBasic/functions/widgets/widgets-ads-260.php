<?php
/*---------------------------------------------------------------------------------*/
/* Ads Widget */
/*---------------------------------------------------------------------------------*/

class AdWidget extends WP_Widget {

	function AdWidget() {
		$widget_ops = array('description' => 'Use this widget to add any type of Ad as a widget. Widget is disabled for basic version!' );
		parent::WP_Widget(false, __('Themnific - Ads Widget 260px', ''),$widget_ops);      
	}

	function widget($args, $instance) {  

        echo '';

		echo '';

	}
} 

register_widget('AdWidget');
?>