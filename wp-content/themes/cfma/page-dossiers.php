<?php
/**
 * Template Name: Dossiers  Template
 * Description: show list posts from Dossiers category by year and month .
 *
 */
 ?>
<?php get_header(); 
    the_post();
    $cfma_page_bg_upload = stripslashes(get_post_meta($post->ID, 'cfma_page_bg_upload', true));  
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
        	   <?php include(TEMPLATEPATH . '/lib/includes/page_content_dossiers.php');?>
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