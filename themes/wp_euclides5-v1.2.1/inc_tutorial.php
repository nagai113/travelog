<?php $isTutorial = get_post_meta($post->ID, 'ci_post_tutorial', true) == 'selected' ? true : false; ?>
<p class="tags">
	<?php 
		if ($isTutorial)
		{
			foreach(get_the_tags() as $the_tag)
			{
				echo '<a href="' . get_tag_link($the_tag->term_id) . '">';
				echo '<img src="' . get_child_or_parent_file_uri('/images/icon_' . $the_tag->slug . '.png') . '" />';
				echo '</a>';
			}
		}
		else
		{
			the_tags('');
		}
	?>
</p>

<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to: %s', 'ci_theme'), get_the_title())); ?>"><?php the_title(); ?></a></h2>

<p class="date"><?php echo get_the_date(); ?></p>

<?php if ($isTutorial): ?>

	<?php the_post_thumbnail('ci_euclides_blog', array('class'=>'post-thumb alignleft')); ?>

	<?php echo wpautop( get_post_meta($post->ID, 'ci_post_description', true) ); ?>

	<section class="meta group">
		<p>
			<?php 
				// Demo and Download buttons will have an extra class of 'buttons-1' or 'buttons-2'
				// This way they can be styled if one or both exist.
				$demolink = esc_url(get_post_meta($post->ID, 'ci_post_demo_link', true));
				$downlink = esc_url(get_post_meta($post->ID, 'ci_post_download_link', true));
				$buttons = 0;
				if (!empty($demolink)) $buttons++;
				if (!empty($downlink)) $buttons++;
				$extraClass = "buttons-".$buttons;
			?>

			<?php if (!empty($demolink)): ?>
				<a class="meta-button <?php echo $extraClass; ?>" href="<?php echo $demolink; ?>"><span><?php _e('View Demo', 'ci_theme'); ?></span></a>
			<?php endif; ?>

			<?php if (!empty($downlink)): ?>
				<a class="meta-button <?php echo $extraClass; ?>" href="<?php echo $downlink; ?>"><span><?php _e('Download', 'ci_theme'); ?></span></a>
			<?php endif; ?>
		</p>

		<ul>
			<?php if(get_post_meta($post->ID, 'ci_post_level', true)!=''): ?>
				<li><?php _e('Level:', 'ci_theme'); ?> <span><?php echo get_post_meta($post->ID, 'ci_post_level', true); ?></span></li>
			<?php endif; ?>
			<?php if(get_post_meta($post->ID, 'ci_post_duration', true)!=''): ?>
				<li><?php _e('Duration:', 'ci_theme'); ?> <span><?php echo get_post_meta($post->ID, 'ci_post_duration', true); ?></span></li>
			<?php endif; ?>

			<li><?php _e('Author:', 'ci_theme'); ?> <span><?php the_author_link(); ?></span></li>
		</ul>
	</section>

	<?php if( is_single() ) the_content(); ?>

<?php else: ?>

	<?php the_post_thumbnail('ci_euclides_blog', array('class'=>'post-thumb alignleft')); ?>
	<?php ci_e_content(); ?>

<?php endif; ?>
