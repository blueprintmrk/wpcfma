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
					.css('left', '165px')
					.hoverFlow(e.type, { left: 175 }, 400)
		}, function(e) {
		}); 
	// End menu hoverFlow   
    
    
    // <!-- Begin jScrollPane -->
    $(function()
		{
			$('.content_scroll_pane').jScrollPane(
				{
					autoReinitialise: true,
					verticalDragMinHeight: 51,
					verticalDragMaxHeight: 82,
					verticalGutter : 22,
					arrowScrollOnHover : true,
				}
			);
		});
    //<!-- End jScrollPane -->
    
    // <!-- Begin Jcarousel -->
     $('#cfma_sliders_carousel').jcarousel();   
   
    //<!-- End Jcarousel -->
    
    
    
    // Using Ajax
   
    //End Using Ajax
    
    
    
    
    
    
         
});