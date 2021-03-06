<?php get_header(); ?>
<div id="main" class="group">
	<section id="posts">

		<?php while (have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('post group'); ?>>
				<h1><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to: %s', 'ci_theme'), get_the_title())); ?>"><?php the_title(); ?></a></h1>
				<p class="date"><?php echo get_the_date(); ?></p>

				<?php ci_the_post_thumbnail(); ?>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</article>

			<?php comments_template(); ?>
		<?php endwhile; ?>

		<?php ci_pagination(); ?>

	</section><!-- #posts -->

	<?php get_sidebar(); ?>

</div><!-- #main -->

<?php get_footer(); ?>
