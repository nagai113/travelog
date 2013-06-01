<?php get_header(); ?>
<div id="main" class="group">
	<section id="posts">

		<?php while (have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('post group'); ?>>
				<?php $isTutorial = get_post_meta($post->ID, 'ci_post_tutorial', true) == 'selected' ? true : false; ?>

				<?php get_template_part('inc_tutorial'); ?>
				
				<section class="post-footer">
					<p><?php comments_popup_link(); ?></p>
					<p class="more"><a href="<?php the_permalink(); ?>">
						<?php 
							if ($isTutorial)
								_e('Read the tutorial', 'ci_theme'); 
							else
								_e('Read the post', 'ci_theme');
						?>
					</a></p>
				</section><!-- .post-footer -->
			</article><!-- .post -->

			<?php if (is_singular()) comments_template(); ?>
		<?php endwhile; ?>

		<?php ci_pagination(); ?>

	</section><!-- #posts -->

	<?php get_sidebar(); ?>

</div><!-- #main -->

<?php get_footer(); ?>
