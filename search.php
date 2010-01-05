<?php get_header(); ?>
		
		<div id="content">
			
			<h2 class="result_heading"><?php _e('Search results for',woothemes); ?> "<?php printf(__('\'%s\''), $s) ?>"</h2>
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
				<div class="post">
				
					<p class="meta"><span class="date"><?php the_time('d F Y'); ?></span> ~ <span class="comments"><?php comments_popup_link(__('0 Comments',woothemes), __('1 Comment',woothemes), __('% Comments',woothemes) ); ?></span></p>
			
					<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
					<div class="categories">
						<?php the_category(' '); ?>
					</div><!-- /.categories -->
					
					<div class="entry">
						
						<?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),'thumb alignleft'); ?>
						
							<?php
							if ( get_option('woo_content_archives') == "true" ) 
								the_content('[...]'); 
							else 
								the_excerpt(); 
							?>
						
						<p><a class="more-link" href="<?php the_permalink(); ?>" title="Read the full entry"><?php _e('Continue Reading',woothemes); ?></a></p>
						
					</div><!-- /.entry -->
					
					<div class="tags">
						
						<?php the_tags('Tags: ', ', ', ''); ?> 
					
					</div><!-- /.tags -->
			
				</div><!-- /.post -->
			
			<?php endwhile; else: ?>
					
				<div class="post">
					
					<h2 class="title"><?php _e('Error 404',woothemes); ?></h2>
						
					<div class="entry">
						
						<p><?php _e('The page you are looking for does not exist. Please check the URL for typing errors, or',woothemes); ?> <a href="<?php bloginfo('home'); ?>" title="Go Home"><?php _e('head back home',woothemes); ?></a> <?php _e('and start over',woothemes); ?></p>
						
					</div><!-- /.entry -->
						
				</div><!-- /.post -->
				
			<?php endif; ?>
			
			<div class="pagenavi">
				<?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
			</div>
		
		</div><!-- /#content -->
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>