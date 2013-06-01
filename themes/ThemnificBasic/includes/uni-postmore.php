			<!-- start related posts -->
            <h2><?php _e('You may be interested in the following related articles as well.','themnific');?></h2>		
			<ul>	
				
			<?php
			$backup = $post;
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

				$args=array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'showposts'=>3, // Number of related posts that will be shown.
					'caller_get_posts'=>1
				);
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) {
					echo '';
					while ($my_query->have_posts()) {
						$my_query->the_post();
			?>
					<li class="specialpost">
					<a href="<?php the_permalink(); ?>"><?php dp_attachment_image($post->ID, 'thumbnail', 'alt="' . $post->post_title . '"'); ?></a>
                    <div class="ss"><?php the_time('M j, y') ?> &bull; <?php the_category(', ') ?></div>	
					<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<?php echo pov_excerpt( get_the_excerpt(), '200'); ?>
					</li>
			<?php
					}
					echo '';
				}
			}
			$post = $backup;
			wp_reset_query(); 
			?>
			</ul><!-- end related posts -->

	<div class="clear"></div>