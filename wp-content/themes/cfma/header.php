<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
              elseif ( is_front_page() && !is_home() ) {
                 echo get_the_title(get_option('page_on_front')) . " - ";} 
              elseif ( is_home() && !is_front_page() ) {
                 echo get_the_title(get_option('page_for_posts')) . " - ";}
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

	<?php wp_head(); ?>
    
    <!--[if lte IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <!-- Add jQuery library -->
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
      
    
    <!-- Begin jScrollPane -->
     <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.jscrollpane.css" />
     <script src="<?php bloginfo('template_url'); ?>/js/jscrollpane/jquery.mousewheel.js"></script>
     <script src="<?php bloginfo('template_url'); ?>/js/jscrollpane/jquery.jscrollpane.min.js"></script>
     <script src="<?php bloginfo('template_url'); ?>/js/jscrollpane/mwheelIntent.js"></script>
      <!-- End jScrollPane -->
     
    <!-- Begin Jcarousel -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/cfma_sliders_skin.css"/>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.jcarousel.min.js"></script>
    <!-- End Jcarousel -->

    <!-- Begin Main-jquery : menu -->
    <script src="<?php bloginfo('template_url'); ?>/js/main-jquery.js"></script>
    <!-- End Main-jquery -->
    <!--  hoverflow  for Menu amination -->
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.hoverflow.min.js"></script>
    <!--  End hoverflow -->
    
    <!--[if IE 8]>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css"/>
	<![endif]-->
    
    <!--[if (gte IE 6)&(lte IE 8)]>
        <script src="<?php bloginfo('template_url'); ?>/js/selectivizr.js"></script>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie-lte8.css"/>
    <![endif]--> 
</head>

<body <?php body_class(); ?> >