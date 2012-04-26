<?php
$themename="cfma";   

define('CFMA_LIB', str_replace("\\",'/',TEMPLATEPATH) . '/lib');
define('CFMA_FUNCTIONS', CFMA_LIB . '/functions');
define('CFMA_WIDGETS', CFMA_LIB . '/functions/widgets');

define('CFMA_THEME_FOLDER',str_replace("\\",'/',TEMPLATEPATH));
define('CFMA_THEME_PATH','/' . substr(CFMA_THEME_FOLDER,stripos(CFMA_THEME_FOLDER,'wp-content')));
define('CFMA_THEME_PATH_LIB', CFMA_THEME_PATH . '/lib');
define('CFMA_THEME_PATH_FUNCTIONS', CFMA_THEME_PATH_LIB . '/functions');
define('CFMA_THEME_PATH_WIDGETS', CFMA_THEME_PATH_LIB . '/functions/widgets');

    // turn off update wordpress
    add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
    remove_action( 'load-update-core.php', 'wp_update_themes' );
    add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );

    // Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', get_bloginfo('template_directory')."/js/jquery.min.js");
	   wp_enqueue_script('jquery');
	}
    
    // Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    //  menu 
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support('menus');
    }
	if (function_exists('register_nav_menus')) {
		register_nav_menus(
			array(
				'menu_header' => 'Main menu header',
                'menu_footer' => 'Menu footer'
			)
		);
	}
    
    
    // for custom meta
    function newsletter_meta_clean(&$arr)
    {
    	if (is_array($arr))
    	{
    		foreach ($arr as $i => $v)
    		{
    			if (is_array($arr[$i])) 
    			{
    				newsletter_meta_clean($arr[$i]);
     
    				if (!count($arr[$i])) 
    				{
    					unset($arr[$i]);
    				}
    			}
    			else 
    			{
    				if (trim($arr[$i]) == '') 
    				{
    					unset($arr[$i]);
    				}
    			}
    		}
     
    		if (!count($arr)) 
    		{
    			$arr = NULL;
    		}
    	}
    }
    
    require_once(CFMA_FUNCTIONS . '/custom_meta/cfma-meta-page-bg.php');
    require_once(CFMA_FUNCTIONS . '/custom_meta/cfma-meta-post-bg.php');
    require_once(CFMA_FUNCTIONS . '/custom_meta/page-meta-newslatter.php');
    require_once(CFMA_WIDGETS . '/cfma_show_posts_categories.php');
    require_once(CFMA_WIDGETS . '/widgets.php');
    
    // support thumbnails 
	if ( function_exists( 'add_theme_support' ) ) { 
	   add_theme_support( 'post-thumbnails' );
    }
    
    // support excerpt 
   	if ( function_exists( 'add_post_type_support' ) ) { 
	   add_post_type_support('page', 'excerpt');
    }

    // Limit Excerpt
    function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'';
      } else {
        $excerpt = implode(" ",$excerpt);
      }	
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }
    // Limit Content  
    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'';
      } else {
        $content = implode(" ",$content);
      }	
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }
    // Limit text
	 function textlimit( $textcontent , $limit) {
	  $content = explode(' ', $textcontent, $limit);
	  if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'';
	  } else {
		$content = implode(" ",$content);
	  }	
	  return $content;
	}
    
    //	Remove Items from the Post and Page Columns
    function custom_post_columns($defaults) {
      unset($defaults['comments']);
      unset($defaults['tags']);
      return $defaults;
    }
    add_filter('manage_posts_columns', 'custom_post_columns');  
    function custom_pages_columns($defaults) {
      unset($defaults['comments']);
      return $defaults;
    }
    add_filter('manage_pages_columns', 'custom_pages_columns');
    function custom_media_columns($defaults) {
      unset($defaults['comments']);
      return $defaults;
    }
    add_filter('manage_media_columns', 'custom_media_columns');

    // remove submenu items under the top-level navigation
    function remove_submenus() {
      global $submenu;
      unset($submenu['index.php'][10]); // Removes 'Updates'.
      unset($submenu['edit.php'][16]); // Removes 'Tags'.  
    }
    add_action('admin_menu', 'remove_submenus');
        
    //Removing Menu Items
    function remove_menu_items() {
      global $menu;
      $restricted = array( __('Links'), __('Comments'));
      end ($menu);
      while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
          unset($menu[key($menu)]);}
        }
      }
    add_action('admin_menu', 'remove_menu_items');   
      
    //	Disable Dashboard Widgets
    function remove_dashboard_widgets(){
      global$wp_meta_boxes;
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
     // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
      unset($wp_meta_boxes['dashboard']['normal']['high']['dashboard_browser_nag']);
      unset($wp_meta_boxes['dashboard']['normal']['core']['wp_welcome_panel']);
    }
    add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
    
    
    //Remove WordPress Version Number
    function wpbeginner_remove_version() {
	   return '';
	}
	add_filter('the_generator', 'wpbeginner_remove_version');
    remove_action('wp_head', 'wp_generator');
        
    function remove_footer_admin () {
    	echo '';
	} 
	add_filter('admin_footer_text', 'remove_footer_admin');
        
    // remove wp widgets
    function remove_some_wp_widgets(){
      unregister_widget('WP_Widget_Calendar');
      unregister_widget('WP_Widget_Search');
      unregister_widget('WP_Widget_Recent_Comments');
      unregister_widget('WP_Widget_Archives');
      unregister_widget('WP_Widget_Links');
      unregister_widget('WP_Widget_Meta');
      unregister_widget('WP_Widget_Categories');
      unregister_widget('WP_Widget_Tag_Cloud');
      unregister_widget('WP_Widget_Pages');
      unregister_widget('WP_Widget_RSS');
      unregister_widget('WP_Nav_Menu_Widget');
      unregister_widget('WP_Widget_Recent_Posts');
    }
    add_action('widgets_init','remove_some_wp_widgets', 1);
    
    //remove editor menu
    function remove_editor_menu() {
      remove_action('admin_menu', '_add_themes_utility_last', 101);
    }
    add_action('_admin_menu', 'remove_editor_menu', 1);        
    
    // turn off wp_welcome_panel
    add_action( 'load-index.php', 'hide_welcome_panel' );
    function hide_welcome_panel() {
        $user_id = get_current_user_id();
    
        if ( 1 == get_user_meta( $user_id, 'show_welcome_panel', true ) )
            update_user_meta( $user_id, 'show_welcome_panel', 0 );
    }
    
    function is_telnum($telnum)
    {
        // $regexp = '/^[0-9\+\-]{7,}$/';
        $regexp = '/^[0-9\+\ \-\(\)]{1,}$/';
        if(preg_match($regexp, $telnum))
            return true;
        else
            return false;
    }
    
    //Removing Meta Boxes from Editor Screen
    function remove_extra_meta_boxes() {
        remove_meta_box( 'postcustom' , 'post' , 'normal' ); // custom fields for posts
        remove_meta_box( 'postcustom' , 'page' , 'normal' ); // custom fields for pages
     //   remove_meta_box( 'postexcerpt' , 'post' , 'normal' ); // post excerpts
      //  remove_meta_box( 'postexcerpt' , 'page' , 'normal' ); // page excerpts
        remove_meta_box( 'commentsdiv' , 'post' , 'normal' ); // recent comments for posts
        remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); // recent comments for pages
        remove_meta_box( 'tagsdiv-post_tag' , 'post' , 'side' ); // post tags
        remove_meta_box( 'tagsdiv-post_tag' , 'page' , 'side' ); // page tags
        remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' ); // post trackbacks
        remove_meta_box( 'trackbacksdiv' , 'page' , 'normal' ); // page trackbacks
        remove_meta_box( 'commentstatusdiv' , 'post' , 'normal' ); // allow comments for posts
        remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); // allow comments for pages
        remove_meta_box('slugdiv','post','normal'); // post slug
        remove_meta_box('slugdiv','page','normal'); // page slug
     //   remove_meta_box('pageparentdiv','page','side'); // Page Parent
        }
    add_action( 'admin_menu' , 'remove_extra_meta_boxes' );   
        
        
        // Newsletter Ajax
    // echo emailnews_plugin_url('widget/widget.js');
     
     wp_enqueue_script( 'ajax-newsletter', emailnews_plugin_url('widget/widget.js'), array('jquery')); // jQuery will be included automatically
    //echo get_bloginfo('template_directory').'/lib/js/ajax.js';
    wp_localize_script( 'ajax-newsletter', 'ajax_object_newsletter', array( 'ajaxurl_newsletter' => admin_url( 'admin-ajax.php' ) ) ); // setting ajaxurl
    
    add_action( 'wp_ajax_ajax_newsletter', 'ajax_action_newsletter' ); // ajax for logged in users
    add_action( 'wp_ajax_nopriv_ajax_newsletter', 'ajax_action_newsletter' ); // ajax for not logged in users
    function ajax_action_newsletter() {

        $Email = $_POST['Email'];
        
        global $wpdb, $wp_version;
        define("WP_eemail_TABLE_SUB", $wpdb->prefix . "eemail_newsletter_sub");
        $cSql = "select * from ".WP_eemail_TABLE_SUB." where eemail_email_sub='" . mysql_real_escape_string(trim($Email)). "'";
        $data = $wpdb->get_results($cSql);
        if ( empty($data) ) 
        {
        	$sql = "insert into ".WP_eemail_TABLE_SUB.""
        		. " set `eemail_name_sub` = 'NONAME"
        		. "', `eemail_email_sub` = '" . mysql_real_escape_string(trim($Email))
        		. "', `eemail_status_sub` = 'YES"
        		. "', `eemail_date_sub` = CURDATE()";
        	
        	$wpdb->get_results($sql);
            $result['result'] = "succ"; 
        	echo "succ";//json_encode($result);
        }
        else
        {
        	$result['result'] = "exs"; 
        	echo "exs";//json_encode($result);
        }
    	exit;
    }
    
    
    // End  Newsletter Ajax
        
     // Using AJAX  
 
    wp_enqueue_script( 'ajax-script', get_bloginfo('template_directory').'/lib/js/ajax.js', array('jquery')); // jQuery will be included automatically
    
    //echo get_bloginfo('template_directory').'/lib/js/ajax.js';
    wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); // setting ajaxurl
     
    add_action( 'wp_ajax_ajax_action', 'ajax_action_stuff' ); // ajax for logged in users
    add_action( 'wp_ajax_nopriv_ajax_action', 'ajax_action_stuff' ); // ajax for not logged in users
    function ajax_action_stuff() {
    //	$post_id = $_POST['post_id']; // getting variables from ajax post
    	// doing ajax stuff

        $current_year = $_POST['current_year'];
        $current_month = $_POST['current_month'];
        
        if (empty($current_month)){
            $args = array(
                'post_type'=>'post',
                'taxonomy'=>'category',
                'term'=>'dossiers',
            	'year'     => $current_year,  //$current_year,
                'orderby'=>'date',
                'order'=>'DSC'
            );
        }else{
            $args = array(
                'post_type'=>'post',
                'taxonomy'=>'category',
                'term'=>'dossiers',
            	'year'     => $current_year,  //$current_year,
                'monthnum' => $current_month,    //$current_month,
                'orderby'=>'date',
                'order'=>'DSC'
            );
        }
        
        query_posts( $args );
        
        echo '<li class="text_title">Articles</li>';
        
        if (have_posts()) : while (have_posts()): the_post();  
                echo '<li>';
                echo '<a href="'.get_permalink().'" >';
                echo '- ';
                echo get_the_title();
                echo '</a></li>';   
             endwhile; 
         else: 
            echo __('');
         endif;
         wp_reset_query();
    	exit;
    }
 
    // End Using AJAX  

 
    
    

?>