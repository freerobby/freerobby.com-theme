<?php
/*-----------------------------------------------------------------------------------*/
/* SEO - woothemes_seo_page */
/*-----------------------------------------------------------------------------------*/

function woothemes_seo_page(){

    $themename =  get_option('woo_themename');      
    $manualurl =  get_option('woo_manual'); 
	$shortname =  'seo_woo'; 
	
    //Framework Version in Backend Head
    $woo_framework_version = get_option('woo_framework_version');
    
    //Version in Backend Head
    $theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
    $local_version = $theme_data['Version'];
    
    //GET themes update RSS feed and do magic
	include_once(ABSPATH . WPINC . '/feed.php');

	$pos = strpos($manualurl, 'documentation');
	$theme_slug = str_replace("/", "", substr($manualurl, ($pos + 13))); //13 for the word documentation
	
    //add filter to make the rss read cache clear every 4 hours
    add_filter( 'wp_feed_cache_transient_lifetime', create_function( '$a', 'return 14400;' ) );
	
	$inner_pages = array(	'a' => 'Page title; Blog title',
							'b' => 'Page title;',
							'c' => 'Blog title; Page title;',
							'd' => 'Page title; Blog description',
							'e' => 'Blog title; Page title; Blog description'
						);
	
	$seo_options = array();
	
	$seo_options[] = array( "name" => "Page Title",
					"type" => "heading");
					
	$seo_options[] = array( "name" => "Separator",
					"desc" => "Define a new seperator character for your page titles.",
					"id" => $shortname."_seperator",
					"std" => "|",
					"type" => "text");
					
	$seo_options[] = array( "name" => "Blog Title",
					"desc" => "NOTE: This is the same setting as per the SETTINGS > GENERAL tab in the WordPress backend.",
					"id" => "blogname",
					"std" => "",
					"type" => "text");
					
	$seo_options[] = array( "name" => "Blog Description",
					"desc" => "NOTE: This is the same setting as per the SETTINGS > GENERAL tab in the WordPress backend.",
					"id" => "blogdescription",
					"std" => "",
					"type" => "text");
    
	$seo_options[] = array( "name" => "Use woo_title()",
					"desc" => "Use wp_title() instead of the Woo default for more control. Make sure you <code>&lt;title&gt;woo_title();&lt;/title&gt;</code> is placed in your themes header.php",
					"id" => $shortname."_wp_title",
					"std" => "false",
					"class" => "collapsed",
					"type" => "checkbox"); 
											
	$seo_options[] = array( "name" => "Homepage Title Layout",
					"desc" => "Define the order the title, description and meta data appears in.",
					"id" => $shortname."_home_layout",
					"std" => "",
					"class" => "hidden",
					"options" => array(	'a' => 'Blog title; blog description',
										'b' => 'Blog title',
										'c' => 'Blog description'),
					"type" => "select2");
					
	$seo_options[] = array( "name" => "Single Title Layout",
					"desc" => "Define the order the title, description and meta data appears in.",
					"id" => $shortname."_single_layout",
					"std" => "",
					"class" => "hidden",
					"options" => $inner_pages,
					"type" => "select2");
					
	$seo_options[] = array( "name" => "Page Title Layout",
					"desc" => "Define the order the title, description and meta data appears in.",
					"id" => $shortname."_page_layout",
					"std" => "",
					"class" => "hidden",
					"options" => $inner_pages,
					"type" => "select2");
					
	$seo_options[] = array( "name" => "Archive Title Layout",
					"desc" => "Define the order the title, description and meta data appears in.",
					"id" => $shortname."_archive_layout",
					"std" => "",
					"class" => "hidden",
					"options" => $inner_pages,
					"type" => "select2");
					
	$seo_options[] = array( "name" => "Indexing Meta",
					"type" => "heading");
					
	/*$seo_options[] = array( "name" => "Add Indexing Meta",
					"desc" => "Add links to the header telling the search engine what the start, next, previous and home urls are.",
					"id" => $shortname."_meta_basics",
					"std" => "false",
					"type" => "checkbox"); */
	
	$seo_options[] = array( "name" => "Archive Indexing",
					"desc" => "Select which archives to index on your site. Aids in removing duplicate content from being indexed, preventing content dilution.",
					"id" => $shortname."_meta_indexing",
					"std" => "category",
					"type" => "multicheck",
					"options" => array(	'category' => 'Category Archives',
										'tag' => 'Tag Archives',
										'author' => 'Author Pages',
										'search' => 'Search Results',
										'date' => 'Date Archives')); 
										
	$seo_options[] = array( "name" => "Make Post/Pages robots 'follow' by default",
					"desc" => "By default the woo_meta(); adds a 'nofollow' to post/pages. This settings will overide that.",
					"id" => $shortname."_meta_single_follow",
					"std" => "",
					"type" => "checkbox");					
	

	$seo_options[] = array( "name" => "Description Meta",
					"type" => "heading");
					
	$seo_options[] = array( "name" => "Homepage Description",
					"desc" => "Choose where to populate your Homepage meta description from.",
					"id" => $shortname."_meta_home_desc",
					"std" => "a",
					"options" => array("a" => "Off","b" => "From WP Site Description","c" => "From Custom Homepage Description"),
					"type" => "radio");
										
	$seo_options[] = array( "name" => "Custom Homepage Description",
					"desc" => "Add a custom meta description to your homepage (overwrites above).",
					"id" => $shortname."_meta_home_desc_custom",
					"std" => "",
					"type" => "textarea");
	
	$seo_options[] = array( "name" => "Single Page/Post Description",
					"desc" => "Add your post/page description from custom field.",
					"id" => $shortname."_meta_single_desc",
					"std" => "a",
					"options" => array("a" => "Off","b" => "From Custom Field","c" => "Automatically from Post/Page Content"),
					"type" => "radio");
										
	$seo_options[] = array( "name" => "Keyword Meta",
					"type" => "heading");
					
	$seo_options[] = array( "name" => "Homepage Keywords",
					"desc" => "Choose where to populate your Homepage meta description from.",
					"id" => $shortname."_meta_home_key",
					"std" => "a",
					"options" => array("a" => "Off","c" => "From Custom Homepage Keywords"),
					"type" => "radio");
										
	$seo_options[] = array( "name" => "Custom Homepage Keywords",
					"desc" => "Add a (comma separated) list of keywords to your homepage.",
					"id" => $shortname."_meta_home_key_custom",
					"std" => "",
					"type" => "textarea");
	
	$seo_options[] = array( "name" => "Single Page/Post Keywords",
					"desc" => "Add your post/page keywords from custom field.",
					"id" => $shortname."_meta_single_key",
					"std" => "a",
					"options" => array("a" => "Off","b" => "From Custom Field","c" => "Automatically from Post Tags &amp; Categories"),
					"type" => "radio");
					
	update_option('woo_seo_template',$seo_options);
					
    
	?>

    <div class="wrap" id="woo_container">
    <?php
    
    	if(		class_exists('All_in_One_SEO_Pack')
    		|| 	class_exists('Headspace_Plugin')) { 
				
			echo "<div id='woo-seo-notice' class='woo-notice'><p><strong>3rd Party SEO Plugin(s) Detected</strong> - Some WooTheme SEO functionality has been disabled.</p></div>";
						
		}
    
    ?>  
    <div id="woo-popup-save" class="woo-save-popup"><div class="woo-save-save">Options Updated</div></div>
    <div id="woo-popup-reset" class="woo-save-popup"><div class="woo-save-reset">Options Reset</div></div>
        <form action="" enctype="multipart/form-data" id="wooform">
            <div id="header">
               <div class="logo">
                <?php if(get_option('framework_woo_backend_header_image')) { ?>
                <img alt="" src="<?php echo get_option('framework_woo_backend_header_image'); ?>"/>
                <?php } else { ?>
                <img alt="WooThemes" src="<?php echo bloginfo('template_url'); ?>/functions/images/logo.png"/>
                <?php } ?>
                </div>
                <div class="theme-info">
                    <span class="theme"><?php echo $themename; ?> <?php echo $local_version; ?></span>
                    <span class="framework">Framework <?php echo $woo_framework_version; ?></span>
                </div>
                <div class="clear"></div>
            </div>
            <div id="support-links">
        
                <ul>
                    <li class="changelog"><a title="Theme Changelog" href="<?php echo $manualurl; ?>#Changelog">View Changelog</a></li>
                    <li class="docs"><a title="Theme Documentation" href="<?php echo $manualurl; ?>">View Themedocs</a></li>
                    <li class="forum"><a href="http://forum.woothemes.com" target="_blank">Visit Forum</a></li>
                    <li class="right"><img style="display:none" src="<?php echo bloginfo('template_url'); ?>/functions/images/loading-top.gif" class="ajax-loading-img ajax-loading-img-top" alt="Working..." /><a href="#" id="expand_options">[+]</a> <input type="submit" value="Save All Changes" class="button submit-button" /></li>
                </ul>
        
            </div>
            <?php $return = woothemes_machine($seo_options); ?>
            <div id="main">
                <div id="woo-nav">
                    <ul>
                        <?php echo $return[1]; ?>
                    </ul>		
                </div>
                <div id="content">
                <?php echo $return[0]; ?>
                </div>
                <div class="clear"></div>
                
            </div>
            <div class="save_bar_top">
            <img style="display:none" src="<?php echo bloginfo('template_url'); ?>/functions/images/loading-bottom.gif" class="ajax-loading-img ajax-loading-img-bottom" alt="Working..." />
            <input type="submit" value="Save All Changes" class="button submit-button" />        
            </form>
            
             <form action="<?php echo wp_specialchars( $_SERVER['REQUEST_URI'] ) ?>" method="post" style="display:inline" id="wooform-reset">
            <span class="submit-footer-reset">
            <input name="reset" type="submit" value="Reset Options" class="button submit-button reset-button" onclick="return confirm('Click OK to reset. Any settings will be lost!');" />
            <input type="hidden" name="woo_save" value="reset" /> 
            </span>
        	</form>

            
            </div>

    
    
    <div style="clear:both;"></div>    
    </div><!--wrap-->

<?php } ?>