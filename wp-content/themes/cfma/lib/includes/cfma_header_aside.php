<div class="cfma_header_aside"> 
    <div class="logo">
        <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/cfma_logo.png" alt="CFMA logo"/></a>
    </div> <!-- End logo-->
    <div class="nav_menu"><!-- Begin nav_menu-->
       <?php wp_nav_menu(array(
				'theme_location' =>  'menu_header',
				'container' => '',
				'menu_id' => '',
				'menu_class' => ''
		)); ?>
    </div> <!-- End nav_menu-->
</div><!-- End .cfma-header-aside -->