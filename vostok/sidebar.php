<div id="sidebar" class="clearfix">
	<div id="sb-1">
		<ul id="categories">
			<?php wp_list_categories('show_count=1&title_li=&exclude=2'); ?>
		</ul>
	</div><!-- close:sb-1 -->
	<div id="sb-2">
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		<ul id="rss">
			<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('RSS Feed','vostok'); ?></a></li>
		</ul>
		<a href="mailto:<?php bloginfo('admin_email'); ?>" class="email">Email me</a>
		<?php
		  wp_list_pages("title_li=&sort_column=menu_order");
		?>
	</div><!-- close:sb-2 -->
</div><!-- close:sidebar -->