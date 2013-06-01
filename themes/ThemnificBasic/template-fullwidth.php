<?php
/*
Template Name: Full Width
*/
?>
<?php get_header(); ?>
<div class="fix"></div>
		
	<div class="box"> 
		<div class="post">
        		<h2 class="leading"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="bigmeta">
                        <?php the_time('M j, y') ?>
                </div> 
                
                 <div class="entry">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
    						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    						
				<?php endwhile; endif; ?>
                </div>
            </div>

 </div>

<?php get_footer(); ?>