<?php

function woo_options(){
// VARIABLES
$themename = "Mainstream";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/mainstream';
$shortname = "woo";

$GLOBALS['template_path'] = get_bloginfo('template_directory');

//Access the WordPress Categories via an Array
$woo_categories = array();  
$woo_categories_obj = get_categories('hide_empty=0');
foreach ($woo_categories_obj as $woo_cat) {
    $woo_categories[$woo_cat->cat_ID] = $woo_cat->cat_name;}
$categories_tmp = array_unshift($woo_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$woo_pages = array();
$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name; }
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");       

//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$all_uploads_path = get_bloginfo('home') . '/wp-content/uploads/';
$all_uploads = get_option('woo_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");

// THIS IS THE DIFFERENT FIELDS
$options = array();   

$options[] = array( "name" => "General Settings",
                    "type" => "heading");
                        
$options[] = array( "name" => "Theme Stylesheet",
					"desc" => "Select your themes alternative color scheme.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "default.css",
					"type" => "select",
					"options" => $alt_stylesheets);

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");    
                                                                                     
$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
                                               
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");        

$options[] = array( "name" => "RSS URL",
					"desc" => "Enter your preferred RSS URL. (Feedburner or other)",
					"id" => $shortname."_feedburner_url",
					"std" => "",
					"type" => "text");
                    
$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");
    
$options[] = array( "name" => "Navigation Options",
					"type" => "heading");    

$options[] = array( "name" => "Header - Category Navigation",
					"desc" => "Swap the Page navigation for a Category navigation. ",
					"id" => $shortname."_cat_menu",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Header - Exclude Pages or Categories from Navigation",
					"desc" => "Enter a comma-separated list of <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 12,23,27,44)",
					"id" => $shortname."_nav_exclude",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Footer - Category Navigation",
					"desc" => "Swap the Page navigation for a Category navigation. ",
					"id" => $shortname."_foot_cat_menu",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Footer - Exclude Pages or Categories from Navigation",
					"desc" => "Enter a comma-separated list of <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 12,23,27,44)",
					"id" => $shortname."_foot_nav_exclude",
					"std" => "",
					"type" => "text");           

$options[] = array(	"name" => "Display Content or The Excerpt",
					"type" => "heading");

$options[] = array(	"name" => "Homepage Posts",
					"desc" => "If checked, this section will display the full post content. If unchecked it will display the excerpt only.",
					"id" => $shortname."_content_home",
					"std" => "false",
					"type" => "checkbox");											

$options[] = array(	"name" => "Archive Posts",
					"desc" => "If checked, this section will display the full post content. If unchecked it will display the excerpt only.",
					"id" => $shortname."_content_archives",
					"std" => "false",
					"type" => "checkbox");							         
 
$options[] = array( "name" => "Dynamic Images",
				    "type" => "heading");    

$options[] = array( "name" => "Enable Dynamic Image Resizer",
					"desc" => "This will enable the thumb.php script. It dynamicaly resizes images on your site.",
					"id" => $shortname."_resize",
					"std" => "true",
					"type" => "checkbox");    
                    
$options[] = array( "name" => "Automatic Image Thumbs",
					"desc" => "If no image is specified in the 'image' custom field then the first uploaded post image is used.",
					"id" => $shortname."_auto_img",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Post Thumbnails",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_thumb_width',
											'type' => 'text',
											'std' => 100,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_thumb_height',
											'type' => 'text',
											'std' => 100,
											'meta' => 'Height')
								  ));
                                                                                                
$options[] = array( "name" => "About You",
                    "type" => "heading");

$options[] = array( "name" => "Your Bio",
					"desc" => "This is the text that will display in the About section on the homepage, just below the logo.'",
					"id" => $shortname."_about",
					"type" => "textarea");                     

$options[] = array( "name" => "Profile Image",
					"desc" => "This is the image that will display in the About section on the homepage, just below the logo.",
					"id" => $shortname."_profile",
					"std" => "",
					"type" => "upload");  					

$options[] = array( "name" => "Twitter Username",
					"desc" => "If completed, this will show a link to your Twitter profile, next to the About section on the homepage.",
					"id" => $shortname."_twitter",
					"std" => "",
					"type" => "text");  										                                   

$options[] = array( "name" => "Facebook Username",
					"desc" => "If completed, this will show a link to your Facebook profile, next to the About section on the homepage.",
					"id" => $shortname."_facebook",
					"std" => "",
					"type" => "text");  				

//Advertising
$options[] = array(    "name" => "Ads - Top Ad (468x60px)",
                                    "type" => "heading");

$options[] = array(    "name" => "Enable Ad",
                                    "desc" => "Enable this ad space.",
                                    "id" => $shortname."_ad_top",
                                    "std" => "false",
                                    "type" => "checkbox");    

$options[] = array(    "name" => "Adsense code",
                                    "desc" => "Enter your adsense code (or other ad network code) here.",
                                    "id" => $shortname."_ad_top_adsense",
                                    "std" => "",
                                    "type" => "textarea");

$options[] = array(    "name" => "Image Location",
                                    "desc" => "Enter the URL to the banner ad image location.",
                                    "id" => $shortname."_ad_top_image",
                                    "std" => "http://www.woothemes.com/ads/woothemes-468x60-2.gif",
                                    "type" => "upload");

$options[] = array(    "name" => "Destination URL",
                                    "desc" => "Enter the URL where this banner ad points to.",
                                    "id" => $shortname."_ad_top_url",
                                    "std" => "http://www.woothemes.com",
                                    "type" => "text");       
					

$options[] = array(	"name" => "Ads - Sidebar Widget (125x125)",
					"type" => "heading");

$options[] = array(	"name" => "Rotate banners?",
					"desc" => "Check this to randomly rotate the banner ads.",
					"id" => $shortname."_ads_rotate",
					"std" => "true",
					"type" => "checkbox");	

$options[] = array(	"name" => "Banner Ad #1 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_1",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-1.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #1 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_1",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$options[] = array(	"name" => "Banner Ad #2 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_2",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-2.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #2 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_2",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad #3 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_3",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-3.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #3 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_3",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad #4 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_4",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #4 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_4",
					"std" => "http://www.woothemes.com",
					"type" => "text");																                                   					

update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname);
update_option('woo_manual',$manualurl);

                                     
// Woo Metabox Options
                    

$woo_metaboxes = array(

		"image" => array (
			"name"		=> "image",
			"default" 	=> "",
			"label" 	=> "Image",
			"type" 		=> "upload",
			"desc"      => "Enter the URL for image to be used by the Dynamic Image resizer."
		)
		
    );
    
update_option('woo_custom_template',$woo_metaboxes);      

/*
function woo_update_options(){
        $options = get_option('woo_template',$options);  
        foreach ($options as $option){
            update_option($option['id'],$option['std']);
        }   
}

function woo_add_options(){
        $options = get_option('woo_template',$options);  
        foreach ($options as $option){
            update_option($option['id'],$option['std']);
        }   
}


//add_action('switch_theme', 'woo_update_options'); 
if(get_option('template') == 'wooframework'){       
    woo_add_options();
} // end function 
*/


}

add_action('init','woo_options');  

?>