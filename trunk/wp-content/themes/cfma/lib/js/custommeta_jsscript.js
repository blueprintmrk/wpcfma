jQuery(document).ready(function() {
jQuery('.upload_img_button').click(function() {
var ImgUploadID = jQuery(this).attr('id');	
formfield = jQuery('#'+ImgUploadID).attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
jQuery('.upload_img_button').click(function() {
var ImgUploadID = jQuery(this).attr('id');	
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#'+ImgUploadID).val(imgurl);
 tb_remove();
}
});
});
