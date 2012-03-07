<?php
    	// Declare cfma_sliders widget zone
    
	 if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'CFMA Sliders Widget',
    		'id'   => 'cfma_sliders_widget',
    		'description'   => '',
    		'before_widget' => '',
    		'after_widget'  => '',
    		'before_title'  => '',
    		'after_title'   => ''
    	));
    }
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'CFMA Newsletter Widget',
    		'id'   => 'cfma_newsletter_widget',
    		'description'   => '',
    		'before_widget' => '',
    		'after_widget'  => '',
    		'before_title'  => '<div class="whiteline21 newsletter"><p>',
    		'after_title'   => '</p></div>'
    	));
    }
    

?>