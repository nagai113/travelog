<?php get_header(); ?>
<div id="main" class="group">
	<section id="posts">
		<?php while (have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('post group'); ?>>
				<?php $isTutorial = get_post_meta($post->ID, 'ci_post_tutorial', true) == 'selected' ? true : false; ?>

				<?php get_template_part('inc_tutorial'); ?>

				<?php wp_link_pages(); ?>

				<?php get_template_part('inc_related'); ?>

				<?php comments_template(); ?>
			</article>
		<?php endwhile; ?>

		<?php ci_pagination(); ?>
	</section><!-- #posts -->

	<?php get_sidebar(); ?>

</div><!-- #main -->

<?php get_footer(); ?>
