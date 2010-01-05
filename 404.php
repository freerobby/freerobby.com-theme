<?php get_header(); ?>
		
		<div id="content">

				<div class="post">
					
					<h2 class="title"><?php _e('Error 404',woothemes); ?></h2>
						
					<div class="entry">
						
						<p><?php _e('The page you are looking for does not exist. Please check the URL for typing errors, or',woothemes); ?> <a href="<?php bloginfo('home'); ?>" title="Go Home"><?php _e('head back home',woothemes); ?></a> <?php _e('and start over',woothemes); ?></p>
						
					</div><!-- /.entry -->
						
				</div><!-- /.post -->
			
		</div><!-- /#content -->
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>