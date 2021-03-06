<?php
//
// Post tutorial related functions.
//
add_action('admin_init', 'ci_add_cpt_post_meta');
add_action('save_post', 'ci_update_cpt_post_meta');

if( !function_exists('ci_add_cpt_post_meta') ):
function ci_add_cpt_post_meta(){
	add_meta_box("ci_post_meta", __('Tutorial Details', 'ci_theme'), "ci_add_cpt_post_meta_box", "post", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_post_meta') ):
function ci_update_cpt_post_meta(){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if (isset($_POST['post_view']) and $_POST['post_view']=='list') return;

	if (isset($_POST['post_type']) && $_POST['post_type'] == "post")
	{
		update_post_meta($post->ID, "ci_post_tutorial", (isset($_POST["ci_post_tutorial"]) ? $_POST["ci_post_tutorial"] : '') );
		update_post_meta($post->ID, "ci_post_demo_link", (isset($_POST["ci_post_demo_link"]) ? $_POST["ci_post_demo_link"] : '') );
		update_post_meta($post->ID, "ci_post_download_link", (isset($_POST["ci_post_download_link"]) ? $_POST["ci_post_download_link"] : '') );
		update_post_meta($post->ID, "ci_post_level", (isset($_POST["ci_post_level"]) ? $_POST["ci_post_level"] : '') );
		update_post_meta($post->ID, "ci_post_duration", (isset($_POST["ci_post_duration"]) ? $_POST["ci_post_duration"] : '') );
		update_post_meta($post->ID, "ci_post_description", (isset($_POST["ci_post_description"]) ? $_POST["ci_post_description"] : '') );
	}
}
endif;

if( !function_exists('ci_add_cpt_post_meta_box') ):
function ci_add_cpt_post_meta_box(){
	global $post;
	$tutorial = get_post_meta($post->ID, 'ci_post_tutorial', true);
	$demolink = get_post_meta($post->ID, 'ci_post_demo_link', true);
	$downloadlink = get_post_meta($post->ID, 'ci_post_download_link', true);
	$level = get_post_meta($post->ID, 'ci_post_level', true);
	$duration = get_post_meta($post->ID, 'ci_post_duration', true);
	$description = get_post_meta($post->ID, 'ci_post_description', true);
	?>

	<p>
		<input id="ci_post_tutorial" type="checkbox" class="code" name="ci_post_tutorial" value="selected" <?php checked($tutorial, 'selected'); ?> />
		<label for="ci_post_tutorial"><?php _e('Is this a tutorial post?', 'ci_theme'); ?></label>
	</p>
	<p>
		<label for="ci_post_description"><?php _e('Tutorial introduction', 'ci_theme'); ?></label>
		<textarea id="ci_post_description" name="ci_post_description" rows="5" cols="80" style="width:99%"><?php echo esc_textarea($description); ?></textarea>	
	</p>

	<p>
		<label for="ci_post_duration"><?php _e('Tutorial duration', 'ci_theme'); ?></label>
		<input id="ci_post_duration" type="text" class="code widefat" name="ci_post_duration" value="<?php echo esc_attr($duration); ?>" />
	</p>

	<p>
		<label for="ci_post_level"><?php _e('Tutorial level of difficulty', 'ci_theme'); ?></label>
		<select id="ci_post_level" name="ci_post_level">
			<option value="" <?php selected($level, ''); ?>></option>
			<option value="Very Easy" <?php selected($level, 'Very Easy'); ?>><?php _ex('Very Easy', 'level of difficulty', 'ci_theme'); ?></option>
			<option value="Easy" <?php selected($level, 'Easy'); ?>><?php _ex('Easy', 'level of difficulty', 'ci_theme'); ?></option>
			<option value="Normal" <?php selected($level, 'Normal'); ?>><?php _ex('Normal', 'level of difficulty', 'ci_theme'); ?></option>
			<option value="Intermediate" <?php selected($level, 'Intermediate'); ?>><?php _ex('Intermediate', 'level of difficulty', 'ci_theme'); ?></option>
			<option value="Hard" <?php selected($level, 'Hard'); ?>><?php _ex('Hard', 'level of difficulty', 'ci_theme'); ?></option>
			<option value="Very Hard" <?php selected($level, 'Very Hard'); ?>><?php _ex('Very Hard', 'level of difficulty', 'ci_theme'); ?></option>
			<option value="Guru" <?php selected($level, 'Guru'); ?>><?php _ex('Guru', 'level of difficulty', 'ci_theme'); ?></option>
		</select>
	</p>

	<p>
		<label for="ci_post_demo_link"><?php _e('Tutorial demo link URL', 'ci_theme'); ?></label>
		<input id="ci_post_demo_link" type="text" class="code widefat" name="ci_post_demo_link" value="<?php echo esc_url($demolink); ?>" />
	</p>
	
	<p>
		<label for="ci_post_download_link"><?php _e('Tutorial download link URL', 'ci_theme'); ?></label>
		<input id="ci_post_download_link" type="text" class="code widefat" name="ci_post_download_link" value="<?php echo esc_url($downloadlink); ?>" />
	</p>
	<?php
}
endif;


//
// Quote post type custom admin list
//
add_filter("manage_edit-post_columns", "post_edit_columns");  
add_action("manage_posts_custom_column",  "post_custom_columns");  

if( !function_exists('post_edit_columns') ):
function post_edit_columns($columns){  
	$new_columns = array(
		"cb" => $columns['cb'],
		"title" => $columns['title'],
		"author" => $columns['author'],
		"categories" => $columns['categories'],
		"tags" => $columns['tags'],
		"is_tutorial" => __('Tutorial?', 'ci_theme'),
		"comments" => $columns['comments'],
		"date" => $columns['date']
	);
	
	return $new_columns;
}  
endif;
  
if( !function_exists('post_custom_columns') ):
function post_custom_columns($column){  
	global $post;  
	switch ($column)  
	{  
		case "is_tutorial":  
			echo (get_post_meta($post->ID, 'ci_post_tutorial', true)=='selected' ? '&radic;' : '');
		break;  
	}  
}
endif;

?>
