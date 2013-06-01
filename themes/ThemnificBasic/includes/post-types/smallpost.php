	<a href="<?php the_permalink(); ?>">
    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'folio-image'); ?>
    <img class="bags" src="<?php echo get_template_directory_uri(); ?>/js/timthumb.php?src=<?php echo $image[0]; ?>&amp;w=267&amp;h=150" alt="<?php the_title(); ?>" width='267' height='150' /></a>
    <h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="smallmeta">
			<?php the_time('M j, y') ?> &bull; 
            <?php the_category(', ') ?>
    </div> 
	<p><?php echo pov_excerpt( get_the_excerpt(), '200'); ?></p>