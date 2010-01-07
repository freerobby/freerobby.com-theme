<?php get_header(); ?>
		
		<div id="content">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
				<div class="post">
			
					<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
					<div class="entry">
						
						<?php the_content(); ?>
						
					</div><!-- /.entry -->
			
				</div><!-- /.post -->
			
			<?php endwhile; else: ?>
					
				<div class="post">
					
					<h2 class="title"><?php _e('Error 404',woothemes); ?></h2>
						
					<div class="entry">
						
						<p><?php _e('The page you are looking for does not exist. Please check the URL for typing errors, or',woothemes); ?> <a href="<?php bloginfo('home'); ?>" title="Go Home"><?php _e('head back home',woothemes); ?></a> <?php _e('and start over',woothemes); ?></p>
						
					</div><!-- /.entry -->
						
				</div><!-- /.post -->
				
			<?php endif; ?>
			
			<?php comments_template(); ?>
		
		</div><!-- /#content -->
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>