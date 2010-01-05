			<div class="clear"></div>
		
	</div><!-- /#inside -->
	</div><!-- /#main -->
	
	<div id="footer">
	
		<ul>
			<?php if (is_page()) { $highlight = "page_item"; } else {$highlight = "page_item current_page_item"; } ?>
				
			<li class="<?php echo $highlight; ?>"><a href="<?php bloginfo('url'); ?>">Home</a></li>
			
			<?php 
				if (get_option('woo_foot_cat_menu') == 'true') 
					wp_list_categories('sort_column=menu_order&depth=1&title_li=&exclude='.get_option('woo_foot_nav_exclude')); 
				else
					wp_list_pages('sort_column=menu_order&depth=1&title_li=&exclude='.get_option('woo_foot_nav_exclude')); 
			?>
		</ul>
		
		<p>&copy; <?php bloginfo('title'); ?>. <?php _e('You may download my public RSA key <a href="/wp-content/uploads/id_rsa.pub">here</a>.',woothemes); ?></p>
		
		<p><a href="http://woothemes.com" title="<?php _e('WooThemes',woothemes); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/woothemes.png" alt="<?php _e('WooThemes Logo',woothemes); ?>" /></a></p>
	
	</div><!-- /#footer -->

</div><!-- /#container -->


<?php wp_footer(); ?>
<?php if ( get_option('woo_google_analytics') <> "" ) { echo stripslashes(get_option('woo_google_analytics')); } ?>
</body>
</html>