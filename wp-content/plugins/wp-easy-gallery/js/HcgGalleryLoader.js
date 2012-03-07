jQuery(document).ready(function(){			
    jQuery(".gallery a[rel^='prettyPhoto']").prettyPhoto({
        counter_separator_label:' of ',
        theme:'dark_square',
        overlay_gallery:true,
        ///////////////////
		show_title: true, /* true/false */
       /////////////////////// 
    });
    
    jQuery(".form_content a[rel^='prettyPhoto']").prettyPhoto({
        theme:'light_square'
    });
    
    
  //  $.prettyPhoto({
//	custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>'
  //  });
    
    
});