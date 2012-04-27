<?php
/**
 * Template Name: Newsletter  Template
 * Description: show Newsletter form.
 *
 */
 ?>
<?php get_header();
    the_post();
?>
<div class="page_wrap_newsletter">   
    <?php  include(TEMPLATEPATH . '/lib/includes/page_content_newsletter.php');?>
   <?php // include(TEMPLATEPATH . '/lib/includes/page_content_newsletter_tmp.php');?>
</div> <!-- End page_wrap_newsletter -->
<?php get_footer(); ?>