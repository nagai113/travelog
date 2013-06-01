<div id="sliderwarp">
<div class="hrlineB"></div>
<div id="coinslid" class="slpost bags">
<?php 
	$featucat = get_option('themnific_slider1_category');
	$my_query = new WP_Query('showposts=4&category_name='. $featucat .'');	 
	if ($my_query->have_posts()) :
?>
	<!-- Start Slider Image -->
	<div class="tabbig"><span></span>
	<?php while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>	
	
		<div id="feature-<?php the_ID(); ?>" >
        		<a href="<?php the_permalink() ?>"><?php /* The Post Thumbnail*/?>
						<?php if (has_post_thumbnail()) { ?>
						<img class="entry_image" src="<?php echo get_template_directory_uri(); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&amp;w=935&amp;h=350&amp;q=90&amp;zc=1" alt="<?php the_title_attribute(); ?>"/>
				
						<?php } elseif (catch_that_image()) { ?>
						<img class="entry_image" src="<?php echo get_template_directory_uri(); ?>/js/timthumb.php?src=<?php echo catch_that_image() ?>&amp;w=935&amp;h=350&amp;q=90&amp;zc=1" alt="<?php the_title_attribute(); ?>"/>
						<?php } else { ?>
					
						<?php } ?></a>
                        <?php if (get_option('themnific_disinpost') <> "true") { ?>
                        <div class="inpost rad">
                            <h2><a href="<?php the_permalink() ?>">
                            <?php echo short_title('...', 10); ?>
                            </a></h2>
                            <p><?php echo pov_excerpt( get_the_excerpt(), '300'); ?></p>
                        </div>
						<?php } ?>
		</div>
		
		
		<?php endwhile; ?>
	
	
	
	</div>
	<?php endif; ?>
	<!-- End Slider Image -->



	<!-- Start Slider Small -->
	<?php if ($my_query->have_posts()) :?>

		<ul id="tabsmall" >
		<?php while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>	
    		<li class="rad">
				<a class="slthumb" href="#feature-<?php the_ID(); ?>"></a>
			</li>
		<?php endwhile; ?>
		</ul>
	
	<?php endif; ?>
	<!-- End Slider Small -->


</div>
</div>
<div style="clear: both;"></div>
<!-- end slider -->