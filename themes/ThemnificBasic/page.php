<?php get_header(); ?>
<div class="fix"></div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
	<div class="box"> 
 
       	<div id="mycontent" class="floatright">

		<div class="post">
        		<h2 class="leading"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                 <div class="entry">
                 <?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:','themnific') . '</span>', 'after' => '</div>' ) ); ?>
                    <?php the_tags( '<p>' . __( 'Tags: ','themnific') . '', ', ', '</p>'); ?>
                 <?php comments_template(); ?>
                </div>
            </div>



	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria','themnific');?>.</p>

	<?php endif; ?>

	</div>
            <?php get_sidebar(); ?>



        </div>
<div style="clear: both;"></div>
<?php get_footer(); ?>