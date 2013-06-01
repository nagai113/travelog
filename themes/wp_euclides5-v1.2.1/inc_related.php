<?php if( function_exists("cptr_populate") ): ?>
	<?php
		global $post;
		$related = cptr_populate($post->ID);
	?>
	<?php if( count($related) > 0 ): ?>
		<div id="related">
			<h3><?php _e('Related Posts', 'ci_theme'); ?></h3>
			<ul class="group">
				<?php $thispost = $post; $i = 0; ?>
				<?php foreach($related as $post): ?>
					<?php setup_postdata($post); ?>
					<li class="<?php echo (++$i % 3 == 0 ? 'last' : ''); ?>">
						<?php the_post_thumbnail('ci_euclides_cptr'); ?>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</li>
				<?php endforeach; ?>
				<?php $post = $thispost; setup_postdata($post); ?>
			</ul>
		</div>
	<?php endif; ?>
<?php endif; ?>
