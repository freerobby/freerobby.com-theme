<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php woo_title(); ?></title>
	<?php woo_meta(); ?>

    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
       
    <!--[if IE 6]>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/pngfix.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/menu.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/ie6.css" />
    <![endif]-->	
	
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/ie7.css" />
	<![endif]-->
	
  <link rel="openid.server" href="http://www.myopenid.com/server" />
  <link rel="openid.delegate" href="http://robbygrossman.myopenid.com/" />
  <link rel="openid2.local_id" href="http://robbygrossman.myopenid.com" />
  <link rel="openid2.provider" href="http://www.myopenid.com/server" />
  <meta http-equiv="X-XRDS-Location" content="http://www.myopenid.com/xrds?username=robbygrossman.myopenid.com" />
       
    <?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>

</head>

<body>

<div id="container">
       
	<div id="header">
		
		<div id="logo">
			<h1><?php bloginfo('title'); ?></h1>
			<h2><?php bloginfo('description'); ?></h2>
		  <!--
      <a href="<?php bloginfo('home'); ?>" title="<?php bloginfo('title'); ?>">
       <img src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option('woo_logo'); } else { bloginfo('template_directory'); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('title'); ?> Logo" />
      </a>
      -->
		</div><!-- /#logo -->

        <div id="top-ad">
	        <?php 
	        if (get_option('woo_ad_top') == 'true') { include (TEMPLATEPATH . "/ads/top_ad.php");}
     	   ?>
        </div><!-- /#top-ad -->      		
		
		<div class="clear"></div>
		
		<div id="navigation">
	
			<ul id="nav">
				<?php 
                if ( get_option('woo_custom_nav_menu') == 'true' ) {
                   	if ( function_exists('woo_custom_navigation_output') )
                       	woo_custom_navigation_output('name=Woo Menu 1&depth=3');
    
                } else { ?>
				<?php if (is_page()) { $highlight = "page_item"; } else {$highlight = "page_item current_page_item"; } ?>
				
				<li class="<?php echo $highlight; ?>"><a href="<?php bloginfo('url'); ?>">Home</a></li>
			
				<?php 
					if (get_option('woo_cat_menu') == 'true') 
						wp_list_categories('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); 
					else
						wp_list_pages('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); 
				?>
				<?php } ?>
			</ul><!-- /#pagenav -->
	
		</div><!-- /#navigation -->
		
		<div class="clear"></div>

	</div><!-- /#header -->
	
	<div id="main">
	<div id="inside">