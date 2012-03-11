<?php
    function gold_get_post_categotyies() {
        $categotyies_array = array();
         
        $terms_categories = get_terms('category', array('term_id','name','slug'));    
        if ( !empty( $terms_categories ) ) {
            foreach ( $terms_categories as $term_category ) {
                
                $keyterm_slug = $term_category->slug;
                $keyterm_name = $term_category->name;
                $keyterm_id = $term_category->term_id;
        
                $term_num_posts = sizeof( query_posts(array( 'post_type'=>'post','taxonomy'=>'category','term'=>$keyterm_slug)) );
                    if ( !empty( $term_num_posts ) ) {
                            $keyterm_name = $keyterm_name.' ('.$term_num_posts.')';
                        }
                $categotyies_array[$keyterm_slug] = $keyterm_name;
                wp_reset_query();
            }   
        }
        return $categotyies_array;
    }
 
    function gold_posts_categories() {
    	register_widget('gold_show_posts_categories');
    }
    
class  gold_show_posts_categories extends WP_Widget {
    function gold_show_posts_categories() {
    global $themename;
        $widget_ops = array('description' => __('Show featured images of posts from this category', '') );
    	parent::WP_Widget(false, $name=$themename.' - Show posts from category', $widget_ops);
    }
    
    /**
     * Displays  post widget on blog.
     */
    function widget($args, $instance) {
    	extract( $args );
    	// If not title, use the name of the category.
        
        /*
    	if( $instance["title"] ) {
    		
    		$title =$instance["title"];
    	}
        */
        if( $instance["num_posts"]&&$instance["postcategories"]&&is_numeric($instance["num_posts"])) {
            $postcategories = $instance["postcategories"];
    		$num_posts = $instance["num_posts"];
           
            echo $before_widget;
            if ($postcategories!="") {
                 query_posts(array('posts_per_page'=>$num_posts, 'orderby'=>'date','order'=>'DSC','post_type'=>'post','taxonomy'=>'category','term'=>$postcategories));
                if (have_posts()) : while (have_posts()): the_post();
                   	
                    echo '<li>';
                    echo '<a class="fade-image" href="'.get_permalink().'" >';
                    
                    

            if ( function_exists('has_post_thumbnail') && has_post_thumbnail()){
                         $thumb_id = get_post_thumbnail_id( $post->ID );
                         $image_thumbnail = wp_get_attachment_image_src( $thumb_id,'full' ); 
                        echo '<img class="fade-image-a" width="140px" height="140px" alt="" src="';
                        echo   get_bloginfo('template_url').'/lib/functions/timthumb/timthumb.php?src='.$image_thumbnail[0].'&w=140&h=140"/>';
                        
                        echo '<img alt="" class="fade-image-b" width="140px" height="140px" src="';
                        echo   get_bloginfo('template_url').'/lib/functions/timthumb/timthumb.php?src='.$image_thumbnail[0].'&w=140&h=140&f=2"/>';
                        }
                        
                    echo '<div class="div_opacity"><table><tbody><tr><td><p>';
                               echo  get_the_title();
                    echo '</p></td></tr></tbody></table></div>';
                    
                    echo '</a>'; 
                    echo '</li>';
                    endwhile; 
                else: 
                    echo __('');
                endif;
                wp_reset_query();     
            }
          echo $after_widget;    
    	}		
    }
    /**
     * Form processing....
     */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['postcategories'] =  $new_instance['postcategories'] ; 
        $instance['num_posts'] = strip_tags( $new_instance['num_posts'] );
       	return $instance;
    }
    /**
     *  form.
     */
    function form($instance) {
    ?>
    <p>
        <label>Show featured images of posts from this category.</label>
    </p>
    <?php $all_categories = gold_get_post_categotyies(); ?>
    <p>
        <label for="<?php echo $this->get_field_id("postcategories"); ?>">
        <?php _e( 'Choose Category : ','cfma'); ?>
        <select name="<?php echo $this->get_field_name("postcategories"); ?>" id="<?php echo $this->get_field_id("postcategories"); ?>"  style="width: 95%;" >
        echo '<option value="">Select Categories</option>';             
        <?php
        	foreach ($all_categories as $key => $value){
                  echo '<option value="'.$key.'"',$instance["postcategories"] == $key ?' selected="selected"' : '' ,'>'.$value.'</option>';             
        	}
        ?>
        </select>
        </label>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id("num_posts"); ?>">
        <?php _e( 'Number of posts to show : ','cfma'); ?>
        <input class="widefat" id="<?php echo $this->get_field_id("num_posts"); ?>" name="<?php echo $this->get_field_name("num_posts"); ?>" type="text" value="<?php if($instance["num_posts"]) { echo esc_attr($instance["num_posts"]); } else { echo '100';} ?>" style="width: 30%;"/>
        </label>
    </p>
    <?php
    }
}
add_action( 'widgets_init', 'gold_posts_categories' );
?>