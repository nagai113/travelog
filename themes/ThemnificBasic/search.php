<?php get_header(); ?>
<div class="fix"></div>
<div class="box">
<div id="mycontent" class="float<?php echo get_option('themnific_sidfloat');?>">

		<h4 class="leading"><?php _e('Search Results for','themnific');?> "<?php echo $s; ?>"</h4>

		<?php if (have_posts()) : ?>
	


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
