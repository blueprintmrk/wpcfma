$(document).ready(function(){  
    
    $(".page-mid-content .ul_annee li.theyear").mouseover(function(){  
		$(".page-mid-content .ul_annee li.theyear_active").addClass("tmp_theyear");
		$(".page-mid-content .ul_annee li.tmp_theyear").removeClass("theyear_active");
	}); 
    
    $(".page-mid-content .ul_annee li.theyear").mouseout(function(){  
		 $(".page-mid-content .ul_annee li.tmp_theyear").addClass("theyear_active");
		 $(".page-mid-content .ul_annee li.theyear_active").removeClass("tmp_theyear");
	});
    
    
    $(".page-mid-content .ul_mois li.themonth").mouseover(function(){  
		$(".page-mid-content .ul_mois li.themonth_active").addClass("tmp_themonth");
		$(".page-mid-content .ul_mois li.tmp_themonth").removeClass("themonth_active");
	}); 
    
    $(".page-mid-content .ul_mois li.themonth").mouseout(function(){  
		 $(".page-mid-content .ul_mois li.tmp_themonth").addClass("themonth_active");
		 $(".page-mid-content .ul_mois li.themonth_active").removeClass("tmp_themonth");
	});
    
    
    
	$('.theyear').click(function () {
	   $(".page-mid-content .ul_annee li.theyear").removeClass("tmp_theyear");
	   $(".page-mid-content .ul_annee li.theyear").removeClass("theyear_active");
       $(this).addClass("theyear_active");
        
        cm = $(".page-mid-content .ul_mois li.themonth_active").attr('month');
        if(cm == undefined) {
            cm = 0;
        }
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action',
			current_year: $(this).text(),
            current_month:cm 
		}, function(data) {
             $(".ul_articles").html(data);
		});
	});
    
    
    $('.themonth').click(function () {
        $(".page-mid-content .ul_mois li.themonth").removeClass("tmp_themonth");
	   $(".page-mid-content .ul_mois li.themonth").removeClass("themonth_active");
       $(this).addClass("themonth_active");
        cy = $('.page-mid-content .ul_annee li.theyear_active').text();
        if(cy == undefined) {
            cy = new Date().getYear();
        }
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action',
			current_year: cy,
            current_month: $(this).attr('month')
		}, function(data) {
             $(".ul_articles").html(data);
		});
	});
    
    
});