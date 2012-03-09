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
    <?php	the_content(); ?>
</div> <!-- End page_wrap_newsletter -->
<?php get_footer(); ?>