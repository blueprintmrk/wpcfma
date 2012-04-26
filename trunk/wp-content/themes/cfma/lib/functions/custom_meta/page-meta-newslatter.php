<?php
     /// newsletter
    $newsletter_meta_box = array(
        'elamenttype' => array('rulerspace','ruleryellow','titleonleft','textarea','textimgleft','textimgright','imgcenter'),
        'elamentvalue' => array('imglink','title','blocktext','textalign'),
    );
    $newsletter_elamenttype = array(
        'titleonleft'=> 'Title',
        'textarea'=> 'Text area',
        'textimgleft'=> 'Text & image left',
        'textimgright'=> 'Text & image right',
        'rulerspace' => 'Ruler space',
        'ruleryellow'=> 'Ruler yellow',
        'imgcenter'=> 'Image center'
    );
    $textalign = array(
        'right' => 'Right',
        'left' => 'Left',
        'center' => 'Center',
        'justify' => 'Justify'
    );
    add_action('admin_init','newsletter_meta_init');

    function newsletter_meta_init()
    {
        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    	wp_enqueue_style('page-meta-newslatter-content-css', CFMA_THEME_PATH_FUNCTIONS . '/custom_meta/page-meta-newslatter-content-css.css');
        $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
         // check for a template type
    	if ($template_file == 'page-newsletter.php')
    	{
    	   remove_post_type_support('page', 'editor');
          // remove_post_type_support('page', 'thumbnail');
           remove_post_type_support('page', 'excerpt');
           remove_post_type_support('page', 'trackbacks');
           remove_post_type_support('page', 'comments');
           
   		   add_meta_box('newsletter_meta_option', 'Newsletter Option', 'newsletter_meta_setup', 'page', 'normal', 'high');
        }
    	// add a callback function to save any data a user enters in
    	add_action('save_post','newsletter_meta_save');
    }

    function newsletter_meta_setup()
    {
    	global $post, $newsletter_meta_box,$newsletter_metatype,$newsletter_elamenttype,$textalign;

    //	$meta = get_post_meta($post->ID,'newslettermeta',TRUE);
        $newslettermetatoptext = get_post_meta($post->ID,'newslettermetatoptext',TRUE);
        $newslettermetatopimglink = get_post_meta($post->ID,'newslettermetatopimglink',TRUE);

        $custom_field_keys = get_post_custom_keys($post->ID);
        foreach ( $custom_field_keys as $key => $value ) {
            $valuet = trim($value);
            if ( '_' == $valuet{0} )continue;
            $meta_key = $value;
            $meta_value = get_post_custom_values($meta_key,$post->ID);
            $meta_key02 = explode('_',$meta_key);
            if($meta_key02[0]&&$meta_key02[2]){
                    $meta[$meta_key02[1]][$meta_key02[2]]= $meta_value[0];;
                }
          }
           
    	// instead of writing HTML here, lets do an include
    	include(CFMA_FUNCTIONS . '/custom_meta/page-meta-newslatter-content-php.php');
    	// create a custom nonce for submit verification later
    	echo '<input type="hidden" name="newslettermeta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
    }

    add_action('admin_init','newsletter_custompagemeta_jsscript');
    function newsletter_custompagemeta_jsscript(){
        wp_enqueue_script('newsletter_custompagemeta_script', get_template_directory_uri() .'/lib/js/newsletter_custommeta_jsscript.js',array('jquery'));
    }
    function newsletter_meta_save($post_id) 
    {
    	// authentication checks
     
    	// make sure data came from our meta box
    	if (!wp_verify_nonce($_POST['newslettermeta_noncename'],__FILE__)) return $post_id;
     
    	// check user permissions
    	if ($_POST['post_type'] == 'page') 
    	{
    		if (!current_user_can('edit_page', $post_id)) return $post_id;
    	}
    	else 
    	{
    		if (!current_user_can('edit_post', $post_id)) return $post_id;
    	}
    	// authentication passed, save data
    	// var types
    	// single: newslettermeta[var]
    	// array: newslettermeta[var][]
    	// grouped array: newslettermeta[var_group][0][var_1], newslettermeta[var_group][0][var_2]
    //	$current_data = get_post_meta($post_id, 'newslettermeta', TRUE);

        $currentdataarray = array('newslettermetatoptext','newslettermetatopimglink');
        foreach ($currentdataarray as $field) {
            $old = get_post_meta($post_id,$field, true);
            $new = $_POST[$field];
            if ($new && $new != $old) {
                update_post_meta($post_id, $field, $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field, $old);
            }
        }
        
    	$new_data = $_POST['newslettermeta'];
    	newsletter_meta_clean($new_data);
       
       
       ////
       $custom_field_keys = get_post_custom_keys($post_id);
       foreach ( $custom_field_keys as $key => $value ) {
            $valuet = trim($value);
            if ( '_' == $valuet{0} )continue;
            $meta_key = $value;
            $meta_key02 = explode('_',$meta_key);
            if( ($meta_key02[0] == 'newslettermeta') && $meta_key02[2]){
                delete_post_meta($post_id,$meta_key);
            }
          }
       //
        $key_number = 0;
        foreach ($new_data as $key1 =>$values1){
            switch ($values1["elamenttype"]){
    	       case 'titleonleft':
                    if($values1["title"]!=''){
                        newsletter_meta_save_ifgot($post_id,$values1,$key_number);
                        $key_number++;
                    }
                    break;
                case 'textarea':
                    if($values1["blocktext"]!=''){
                        newsletter_meta_save_ifgot($post_id,$values1,$key_number);
                        $key_number++;
                    }
                    break;
                case 'textimgleft':
                    if($values1["imglink"]!='' || $values1["blocktext"]!=''){
                        newsletter_meta_save_ifgot($post_id,$values1,$key_number);
                        $key_number++;
                    }
                    break;
                case 'textimgright':
                    if($values1["imglink"]!='' || $values1["blocktext"]!=''){
                        newsletter_meta_save_ifgot($post_id,$values1,$key_number);
                        $key_number++;
                    }
                    break;
                case 'rulerspace':
                    newsletter_meta_save_ifgot($post_id,$values1,$key_number);
                    $key_number++;
                    break;
                case 'ruleryellow':
                    newsletter_meta_save_ifgot($post_id,$values1,$key_number);
                    $key_number++;
                    break;
                case 'imgcenter':
                    if($values1["imglink"]!=''){
                        newsletter_meta_save_ifgot($post_id,$values1,$key_number);
                        $key_number++;
                    }
                    break;
            }
        }
    	return $post_id;
    }
    
    function newsletter_meta_save_ifgot($post_id,$values1,$key_number){
        foreach ($values1 as $key2 =>$values2){
            $new_data_meta_id = 'newslettermeta_'.$key_number.'_'.$key2;
            $new_data_meta_value = $values2;
            $current_data = get_post_meta($post_id,$new_data_meta_id, TRUE);
            if ($current_data)
        	{
        		if (is_null($new_data_meta_value)) delete_post_meta($post_id,$new_data_meta_id);
        		else update_post_meta($post_id,$new_data_meta_id,$new_data_meta_value);
        	}
        	elseif (!is_null($new_data_meta_value))
        	{
        		add_post_meta($post_id,$new_data_meta_id,$new_data_meta_value,TRUE);
        	}
        }
    }
    
?>