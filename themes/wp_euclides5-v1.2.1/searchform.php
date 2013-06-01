<form action="<?php echo home_url('/'); ?>" id="searchform" method="get" role="search">
	<div>
		<label for="s" class="screen-reader-text"><?php _e('Search for', 'ci_theme'); ?>:</label>
		<input type="text" id="s" name="s" class="text" value="<?php the_search_query(); ?>">
		<input type="submit" class="button" value="<?php _e('Search', 'ci_theme'); ?>" id="searchsubmit">
	</div>
</form>
