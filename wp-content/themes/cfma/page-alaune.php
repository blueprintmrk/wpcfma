<?php
/**
 * Template Name: A La Une  Template
 * Description: show 1 post from ALaUne category .
 *
 */
 ?>
<?php get_header(); 
    the_post();
    $page_title = get_the_title();
    $cfma_page_bg_upload_2 = stripslashes(get_post_meta($post->ID, 'cfma_page_bg_upload', true));
    
    query_posts(array( 'posts_per_page'=>1 , 'orderby'=>'date','order'=>'DSC','post_type'=>'post','taxonomy'=>'category','term'=>'alaune'));
        if (have_posts()) : while (have_posts()): the_post();  
                $cfma_post_bg_upload_1 = stripslashes(get_post_meta($post->ID, 'cfma_page_bg_upload', true));    
             endwhile; 
         else: 
            echo __('');
         endif;
     wp_reset_query();

    if ($cfma_post_bg_upload_1){
        $cfma_page_bg_upload = $cfma_post_bg_upload_1;
        }else {
            $cfma_page_bg_upload = $cfma_page_bg_upload_2;
        }
    
    
      
?>

<div class="page_wrap_background" <?php if($cfma_page_bg_upload) { ?> style="background: url(<?php echo $cfma_page_bg_upload;?>) no-repeat top left" <?php } ?>> 
<div class="page_wrap">
	<div class="page_content">
        <!-- cfma_header_aside -->
        <?php include(TEMPLATEPATH . '/lib/includes/cfma_header_aside.php');?>
        <!-- End cfma-header-aside -->
        
        <div class="main_content">
        
            <!-- Begin intranet_form-->
            <?php include(TEMPLATEPATH . '/lib/includes/intranet_form.php');?>
            <!-- End intranet_form-->
            
            <div class="content_body">
                <!-- Begin page_content -->
        	   <?php // include(TEMPLATEPATH . '/lib/includes/page_content_alaune.php');?>
                    <!-- Begin content_scroll_pane -->
                        <div class="content_scroll_pane"> 
                        	<div class="page-mid-content"> <!-- Begin page-mid-content-->
                                <h1><?php echo $page_title; ?></h1>
                                <?php
                                query_posts(array( 'posts_per_page'=>1 , 'orderby'=>'date','order'=>'DSC','post_type'=>'post','taxonomy'=>'category','term'=>'alaune'));
                                if (have_posts()) : while (have_posts()): the_post();  
                                        the_content();      
                                     endwhile; 
                                 else: 
                                    echo __('');
                                 endif;
                                 wp_reset_query();
                                ?>
                        	</div> <!-- End page-mid-content-->
                        </div> 
                        <!-- End content_scroll_pane-->
                <!-- End page_content-->
            </div> <!-- End content_body-->
        </div>  <!-- End main_content-->
    </div>  <!-- End page_content-->
    
    <div class="clear"></div>
    
    <!-- Begin cfma_sliders-->
        <?php include(TEMPLATEPATH . '/lib/includes/cfma_sliders.php');?>
    <!-- End cfma_sliders-->
    
    <!-- Begin cfma_footer-->
        <?php include(TEMPLATEPATH . '/lib/includes/cfma_footer.php');?>
    <!-- End cfma_footer-->  
</div>  <!-- End page-wrap -->
</div> <!-- End page_wrap_background -->
<?php get_footer(); ?>