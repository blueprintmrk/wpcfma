// JavaScript Document


$(document).ready(function(){  
	 
	// menu hoverFlow
    $(".nav_menu ul li").addClass("menu-no-active");
    $(".nav_menu ul li ul li").removeClass("menu-no-active");
    $(".nav_menu ul li.current-menu-ancestor").removeClass("menu-no-active");
    $(".nav_menu ul li.current-menu-item").removeClass("menu-no-active");
    
    
 	$(".nav_menu ul li.current-menu-ancestor").addClass("menu_active");
    $(".nav_menu ul li.current-menu-item").addClass("menu_active");
    $(".nav_menu ul li ul li.current-menu-item").removeClass("menu_active");
    
 	$(".nav_menu ul li ul li.current-menu-item").addClass("sub_menu_active");

	$(".nav_menu ul li ul li").mouseover(function(){  
		$(".nav_menu ul li.sub_menu_active").addClass("menu-sub");
		$(".nav_menu ul li.menu-sub").removeClass("sub_menu_active");
	});  
  
	$(".nav_menu ul li ul li").mouseout(function(){  
		 $(".nav_menu ul li.menu-sub").addClass("sub_menu_active");
		 $(".nav_menu ul li.sub_menu_active").removeClass("menu-sub");
	}); 



	$(".nav_menu ul li").mouseover(function(){  
		$(".nav_menu ul li.menu_active").addClass("menu-at");
		$(".nav_menu ul li.menu-at").removeClass("menu_active");
	});  
  
	$(".nav_menu ul li").mouseout(function(){  
		 $(".nav_menu ul li.menu-at").addClass("menu_active");
		 $(".nav_menu ul li.menu_active").removeClass("menu-at");
	});  
		$(".nav_menu ul li.menu-no-active").hover(function(e) {
				$(this)
					.find('ul')
					.css('left', '132px')
					.hoverFlow(e.type, { left: 140 }, 400)
		}, function(e) {
		}); 
	// End menu hoverFlow   
    
    
    // <!-- Begin jScrollPane -->
    $(function()
		{
			$('.content_scroll_pane').jScrollPane(
				{
					autoReinitialise: true,
					verticalDragMinHeight: 41,
					verticalDragMaxHeight: 66,
					verticalGutter : 18,
					arrowScrollOnHover : true,
				}
			);
		});
    //<!-- End jScrollPane -->
    
    // <!-- Begin Jcarousel -->
     $('#cfma_sliders_carousel').jcarousel();   
   
    //<!-- End Jcarousel -->
    
    // Using Ajax
    /*
    jQuery('#myForm1').ajaxForm({
        data: {
            // additional data to be included along with the form fields
        },
        dataType: 'json',
        beforeSubmit: function(formData, jqForm, options) {
            // optionally process data before submitting the form via AJAX
        },
        success : function(responseText, statusText, xhr, $form) {
            // code that's executed when the request is processed successfully
        }
    });
    
    */
    //End Using Ajax
    
    
    
    
    
    
         
});