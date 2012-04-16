jQuery(document).ready(function() {

	/*jQuery('#upload_image_button').click(function() { 
	 formfield = jQuery('#upload_image').attr('name');
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 return false;
	});

	window.send_to_editor = function(html) {
	 imgurl = jQuery('img',html).attr('src');
	 jQuery('#upload_image').val(imgurl);
	 tb_remove();
	}
	*/
	
	jQuery("#upload_image_button").click(function(){
		  formfield = jQuery('#upload_image').attr('name');
		  tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		  window.send_to_editor = function(html) {
				var imgurl = jQuery('img',html).attr('src');
				if(imgurl){
					jQuery('#upload_image').val(imgurl);
				}else{
					var fileurl = jQuery(html);
					var fName = jQuery(fileurl).attr('href');
					jQuery('#upload_image').val(fName);
				}
				tb_remove();
		  }
	});
	

});