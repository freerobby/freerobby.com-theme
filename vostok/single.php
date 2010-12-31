<?php get_header(); ?>
	<div id="content">
		<div id="main-content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
				<span class="date"><?php the_time(__('l, F j, Y','vostok')) ?></span>
				<div class="entry">
					<?php the_content(__('Read the rest of this article','vostok').' &raquo;'); ?>
				</div>
			</div>
		<?php comments_template(); ?>
		<?php endwhile; else: ?>
			<p class="string"><?php _e('Sorry, there are no articles under this criterion.','vostok'); ?></p>
	<?php endif; ?>
		</div><!-- close:main-content -->
		<?php get_sidebar(); ?>
	</div><!-- close:content -->
<?php get_footer(); ?>