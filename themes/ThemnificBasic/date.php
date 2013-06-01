<?php get_header(); ?>

<div class="fix"></div>
<div class="box">
<div id="mycontent" class="float<?php echo get_option('themnific_sidfloat');?>">
    
		<?php if (have_posts()) : ?>
	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h4 class="leading"><?php _e('Archive for the','themnific');?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category','themnific');?></h4>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h4 class="leading"><?php _e('Posts Tagged','themnific');?> &#8216;<?php single_tag_title(); ?>&#8217;</h4>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h4 class="leading"><?php _e('Archive for','themnific');?> <?php the_time('F jS, Y'); ?></h4>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h4 class="leading"><?php _e('Archive for','themnific');?> <?php the_time('F, Y'); ?></h4>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h4 class="leading"><?php _e('Archive for','themnific');?> <?php the_time('Y'); ?></h4>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h4 class="leading"><?php _e('Author Archive','themnific');?></h4>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h4 class="leading"><?php _e('Blog Archives','themnific');?></h4>
 	  <?php } ?>
    
    
    
<ul class="<?php echo get_option('themnific_ptype_latestpost');?>">
		<?php while (have_posts()) : the_post(); ?>
		<?php $ptype_latestpost = get_option('themnific_ptype_latestpost'); ?>

                <li>
                <?php get_template_part('/includes/post-types/'.$ptype_latestpost.'');?>
                </li>
                
   		<?php endwhile; ?>         
</ul>
<div style="clear: both;"></div>
		
			
			<div class="clear"></div>
			<div class="navigation">
			<div class="nav-previous fl"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts' ) ); ?></div>
			<div class="nav-next fr"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>' ) ); ?></div>
			</div>

	<?php else : ?><?php endif; ?>
    
	</div>
		<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
