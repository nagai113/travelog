<?php
/*
Template Name: Archive
*/
?>

<?php get_header(); ?>
<div id="main" class="group">
	<section id="posts">
		<article class="post group">

			<?php 
				$arrParams = array(
					'paged' => $paged,
					'ignore_sticky_posts'=>1,
					'showposts' => ci_setting('archive_no'));
				query_posts($arrParams);
			?>

			<h2><?php _e('Latest posts', 'ci_theme'); ?></h2>
			<ul class="archive">
				<?php while (have_posts() ) : the_post(); ?>
					<li><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to: %s', 'ci_theme'), get_the_title())); ?>"><?php the_title(); ?></a> - <?php echo get_the_date(); ?></li>
				<?php endwhile; ?>
			</ul>
			
			
			<?php if (ci_setting('archive_week')=='enabled'): ?>
				<h2><?php _e('Weekly Archive', 'ci_theme'); ?></h2>
				<ul class="archive"><?php wp_get_archives('type=weekly&show_post_count=1') ?></ul>
			<?php endif; ?>
			
			<?php if (ci_setting('archive_month')=='enabled'): ?>
				<h2><?php _e('Monthly Archive', 'ci_theme'); ?></h2>
				<ul class="archive"><?php wp_get_archives('type=monthly&show_post_count=1') ?></ul>
			<?php endif; ?>
			
			<?php if (ci_setting('archive_year')=='enabled'): ?>
				<h2><?php _e('Yearly Archive', 'ci_theme'); ?></h2>
				<ul class="archive"><?php wp_get_archives('type=yearly&show_post_count=1') ?></ul>
			<?php endif; ?>
	
		</article><!-- .post -->
	</section><!-- #posts -->

	<?php get_sidebar(); ?>

</div><!-- #main -->

<?php get_footer(); ?>
