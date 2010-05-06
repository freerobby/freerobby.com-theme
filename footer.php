			<div class="clear"></div>
		
	</div><!-- /#inside -->
	</div><!-- /#main -->
	
	<div id="footer">
	
		<ul>
			<?php 
            if ( get_option('woo_custom_nav_menu') == 'true' ) {
            	if ( function_exists('woo_custom_navigation_output') )
                	woo_custom_navigation_output('name=Woo Menu 2');
    
            } else { ?>
			<?php if (is_page()) { $highlight = "page_item"; } else {$highlight = "page_item current_page_item"; } ?>
				
			<li class="<?php echo $highlight; ?>"><a href="<?php bloginfo('url'); ?>">Home</a></li>
			
			<?php 
				if (get_option('woo_foot_cat_menu') == 'true') 
					wp_list_categories('sort_column=menu_order&depth=1&title_li=&exclude='.get_option('woo_foot_nav_exclude')); 
				else
					wp_list_pages('sort_column=menu_order&depth=1&title_li=&exclude='.get_option('woo_foot_nav_exclude')); 
			?>
			<?php } ?>
		</ul>
		
		<p>&copy; <?php bloginfo('title'); ?>. <?php _e('You may download my public RSA key <a href="/wp-content/uploads/id_rsa.pub">here</a>.',woothemes); ?></p>
		
	
	</div><!-- /#footer -->

</div><!-- /#container -->


<?php wp_footer(); ?>

</body>
</html>