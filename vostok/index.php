<?php get_header(); ?>
	<div id="content">
		<div id="main-content">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<span class="date"><?php the_time(__('l, F j, Y','vostok')) ?></span>
					<div class="entry">
					  <?php
					    the_excerpt();
              echo '<p><a href="'. get_permalink($post->ID) . '">' . 'Continue reading...' . '</a></p>';
					  ?>
					</div>
				</div><!-- close:post -->
			<?php endwhile; ?>
			<div class="pagination clearfix">
				<div class="prev"><?php next_posts_link('&laquo; '.__('Older posts','vostok')) ?></div>
				<div class="next"><?php previous_posts_link(__('More recent posts','vostok').' &raquo;') ?></div>
			</div>
		<?php else : ?>
			<p class="string"><?php _e('The page you are looking for doesn\'t exist. Sorry.','vostok'); ?></p>
		<?php endif; ?>
		</div><!-- close:main-content -->
		<?php get_sidebar(); ?>
	</div><!-- close:content -->
<?php get_footer(); ?>