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
    

?>