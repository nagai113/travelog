<?php $video_input = get_post_meta($post->ID, 'dbt_video', true);?>
	<?php if($video_input) {?>
    <span class="videolink"><a href="<?php the_permalink(); ?>"><?php echo short_title('...', 7);?></a></span>  
    <?php echo ($video_input); 
    } else {?>

    <a href="<?php the_permalink(); ?>">
    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'folio-image'); ?>
    <img class="" src="<?php echo get_template_directory_uri(); ?>/js/timthumb.php?src=<?php echo $image[0]; ?>&amp;w=270&amp;h=200" alt="<?php the_title(); ?>" width='270' height='200' /></a>


    <div class="linemeta">
    <h2><?php echo short_title('...', 12);?></h2>
			<?php the_time('M j, y') ?>
    </div> 
    
	<?php }?>