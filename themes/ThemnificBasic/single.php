<?php get_header(); ?>
<div class="fix"></div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
	<?php //custom metabox
    $fea_post_sidebar = get_post_meta($post->ID, 'dbt_post_sidebar_float', true);
    ?>
	<div class="box"> 
 
            <?php if($fea_post_sidebar == 'disable')  {
				
            }elseif($fea_post_sidebar == 'right'){
				echo '<div id="mycontent" class="floatright">';
            }elseif($fea_post_sidebar == 'left'){
				echo '<div id="mycontent" class="floatleft">';
                } else {
				echo '<div id="mycontent" class="floatleft">';
            }?>






		<div <?php post_class(); ?>>
        		<h2 class="leading"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="bigmeta">
                        <?php the_time('M j, y') ?> &bull; 
                        <?php the_category(', ') ?> &bull; 
                        <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
                </div> 
                <?php $video_input = get_post_meta($post->ID, 'dbt_video', true);?>
				<?php  echo ($video_input); ?>	
                
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


            <?php if($fea_post_sidebar == 'disable')  {

                } else {
				echo '	</div><!-- end #mycontent -->';
			 	get_sidebar(); 
            }?>



        </div>
<div style="clear: both;"></div>
<?php get_footer(); ?>