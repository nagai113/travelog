<?php
/*
Template Name: Blog Template
*/
?>
<?php get_header(); ?>
	<div class="box">
    <div class="fix"></div>
	<div id="mycontent" class="float<?php echo get_option('themnific_sidfloat');?>">
	<?php
            $temp = $wp_query;
            $limit = get_option('posts_per_page');
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $wp_query= null;
            $wp_query = new WP_Query();
            $wp_query->query('showposts=' . $limit . '&paged=' . $paged);
            $wp_query->is_home = false;
	?>
	<?php if (have_posts()) : ?>

    
		<?php $ptype_latestpost = get_option('themnific_ptype_latestpost'); ?>
        <ul class="<?php echo get_option('themnific_ptype_latestpost');?>">
	<?php while (have_posts()) : the_post(); ?>
                <li>
                <?php get_template_part('/includes/post-types/'.$ptype_latestpost.'');?>
                </li>
	<?php endwhile; ?>
		</ul><!-- end post -->
        

			
			<div class="clear"></div>
			<div class="navigation">
			<div class="nav-previous fl"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts','themnific') ); ?></div>
			<div class="nav-next fr"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>','themnific') ); ?></div>
			</div>
			
	<?php else : ?>

			<h1>Sorry, no posts matched your criteria.</h1>
		
	<?php endif; ?>

	</div>
		<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>