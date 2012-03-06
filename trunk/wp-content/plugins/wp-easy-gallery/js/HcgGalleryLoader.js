jQuery(document).ready(function(){			
    jQuery(".gallery a[rel^='prettyPhoto']").prettyPhoto({
        counter_separator_label:' of ',
        theme:'dark_square',
        overlay_gallery:true,
        ///////////////////
		show_title: true, /* true/false */
       /////////////////////// 
    });
});