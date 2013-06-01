<div class="box">
<?php if (get_option('themnific_title_topline') == "") {} else { ?>
<h4 class="leading">
<?php 
//echo get_option('themnific_topline_category');
echo get_option('themnific_title_topline');
?>
</h4>
<?php } ?>

<?php $topline_style = get_option('themnific_topline_style'); ?>
<ul class="<?php echo get_option('themnific_topline_style');?>">
			<?php $topline_category = get_option('themnific_topline_category');
			$topline_count = get_option('themnific_topline_count');
            $my_query = new WP_Query('category_name= '. $topline_category .'&showposts=1'); 
            while ($my_query->have_posts()) : $my_query->the_post();
            ?>	
            
                <li class="bags">
                <?php get_template_part('/includes/post-types/line-'.$topline_style.'');?>
                </li>
            
            <?php endwhile; ?>
            

			<?php $topline_category = get_option('themnific_topline_category');
			$topline_count = get_option('themnific_topline_count');
            $my_query = new WP_Query('category_name= '. $topline_category .'&showposts=2&offset=2'); 
            while ($my_query->have_posts()) : $my_query->the_post();
            ?>	
            
                <li class="bags">
                <?php get_template_part('/includes/post-types/line-'.$topline_style.'');?>
                </li>
            
            <?php endwhile; ?>
            
            
</ul>

<div style="clear: both;"></div>
</div>
<!-- end top line posts-->