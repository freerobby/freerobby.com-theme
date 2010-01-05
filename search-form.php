<div id="search_main" class="widget">

	<h3><?php _e('Search',woothemes); ?><span class="fold">&nbsp;</span></h3>

    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
        <div>
        <input type="text" class="field" name="s" id="s"  value="<?php _e('Search...',woothemes); ?>" onfocus="if (this.value == '<?php _e('Search...',woothemes); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search...',woothemes); ?>';}" />
        <input type="submit" class="submit" name="submit" value="<?php _e('Search...',woothemes); ?>" />
        </div>
    </form>
</div>
