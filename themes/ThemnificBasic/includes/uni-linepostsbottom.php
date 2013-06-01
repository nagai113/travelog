<div class="box">
<?php if (get_option('themnific_title_bottomline') == "") {} else { ?>
<h4 class="leading"><?php echo get_option('themnific_title_bottomline');?></h4>
<?php } ?>
<?php $bottomline_style = get_option('themnific_bottomline_style'); ?>
<ul class="bigtips">
			<?php $bottomline_category = get_option('themnific_bottomline_category');
			$bottomline_count = get_option('themnific_bottomline_count');
            $my_query = new WP_Query('category_name= '. $bottomline_category .'&showposts='.$bottomline_count.''); 
            while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
            ?>	
            
                <li class="bags">
                <?php get_template_part('/includes/post-types/line-bigtips');?>
                </li>
            
            <?php endwhile; ?>
</ul>

<div style="clear: both;"></div>
</div>
<!-- end bottom line posts-->