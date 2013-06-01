<div class="box">
<div id="mycontent" class="float<?php echo get_option('themnific_sidfloat');?>">


<!-- latest posts section-->

<?php if (get_option('themnific_title_latestpost') == "") {} else { ?>
<h4 class="leading"><?php echo get_option('themnific_title_latestpost');?></h4>
<?php } ?>

<?php $ptype_latestpost = get_option('themnific_ptype_latestpost'); ?>
<ul class="<?php echo get_option('themnific_ptype_latestpost');?>">
			<?php 
		    $latestcount = get_option('themnific_count_latestpost');
			$the_query = new WP_Query('showposts='.$latestcount.'&orderby=post_date&order=desc');	
			while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
			?>	

                <li>
                <?php get_template_part('/includes/post-types/'.$ptype_latestpost.'');?>
                </li>
                
			<?php endwhile; ?>
            
</ul>

			<a class="viewarchive" href="<?php echo get_option('themnific_url_blog');?>"><?php _e('View More Posts','themnific');?> &raquo;</a>

<div style="clear: both;"></div>
<!-- end latest posts section-->


</div><!-- end #mycontent-->




<?php get_sidebar(); ?>
</div><!-- end magazine .box-->