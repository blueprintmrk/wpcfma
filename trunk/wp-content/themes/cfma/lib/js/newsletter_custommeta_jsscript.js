jQuery(document).ready(function() { 
    jQuery(".upload_img_button").live("click", function(event){
      event.preventDefault();
          var ImgUploadID = jQuery(this).attr('id');
          tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
          window.send_to_editor = function(html) {
                var imgurl = jQuery('img',html).attr('src');
                if(imgurl){
                    jQuery('#'+ImgUploadID).val(imgurl);
                }else{
                    var fileurl = jQuery(html);
                    var fName = jQuery(fileurl).attr('href');
                    jQuery('#'+ImgUploadID).val(fName);
                }
                tb_remove();
          }
    });
    jQuery("#dynamical_add_elements_select").change( function (){
        jQuery("#add_message").hide();
    });
    
    jQuery('#button_dynamical_add_content').click(function(){
	    var num_count = 0;
        num_count = jQuery('#media_meta_table1 tbody tr').length;
        elamenttype_selected = jQuery('#dynamical_add_elements_select').val();
        var textalign = [ ['right','Right'],['left' , 'Left'],['center' , 'Center'],['justify' , 'Justify'] ];
        //alert(elamenttype_selected);
        var content___ = '';
        switch (elamenttype_selected){
            case 'titleonleft':
               // content___ += 'titleonleft';
                content___ += '<tr>';
                    content___ += '<td class="elementtitle">';
                    content___ += '<label>Title</label>';
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom">';
                    content___ += '<label class="elestyle">Title input:</label>';
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom">';
                    content___ += '<input class="itemsize" type="text" name="newslettermeta['+(num_count)+'][title]" value="" width="25%" />';
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom">';
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom borderright itemverticalbottom">';
                    content___ += '<input type="hidden" name="newslettermeta['+(num_count)+'][elamenttype]" value="titleonleft"/>';
                    content___ += '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    content___ += '</td>';
                  content___ += '</tr>';
                break;
            case 'textarea':
                content___ += '<tr>';
                    content___ += '<td class="elementtitle">';
                    content___ += '<label>Text area</label>';
                    content___ += '</td>';
                    content___ += '<td  class="bordertopbottom">';
                    content___ += '<label class="elestyle">Text input:</label>';
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom">';
                    content___ += '<textarea class="itemsize" type="text" name="newslettermeta['+(num_count)+'][blocktext]" class="" cols="40" rows="10" width="25%"></textarea>';
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom">';
                        content___ += '<label>Text align</label><br />';
                             for (var i=0;i<textalign.length; i++){
                                content___ += '<label><input type="radio" style="margin-right:10px;" ';
                                if ( textalign[i][0] == 'justify'){
                                    content___ += ' checked ';
                                }
                                content___ += ' value="'+(textalign[i][0])+'" name="newslettermeta['+(num_count)+'][textalign]"/>'+(textalign[i][1])+'</label><br />';
                            }
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom borderright itemverticalbottom">';
                    content___ += '<input type="hidden" name="newslettermeta['+(num_count)+'][elamenttype]" value="textarea"/>';
                    content___ += '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    content___ += '</td>';
                  content___ += '</tr>';
                break;
            case 'textimgleft':
                content___ += '<tr>';
                    content___ += '<td class="elementtitle">';
                        content___ += '<label>Text & image left</label>';
                    content___ += '</td>';
                    content___ += '<td  class="bordertopbottom" colspan="3">';
                         content___ += '<table><tbody>';
                         content___ += '<tr>';
                            content___ += '<td><label class="elestyle">Text input:</label></td>';
                            content___ += '<td>';
                                content___ += '<textarea class="itemsize" type="text" name="newslettermeta['+(num_count)+'][blocktext]" class="" cols="40" rows="10"></textarea>';
                            content___ += '</td>';
                            content___ += '<td>';
                                content___ += '<label>Text align</label><br />';
                                 for (var i=0;i<textalign.length; i++){
                                    content___ += '<label><input type="radio" style="margin-right:10px;" ';
                                    if ( textalign[i][0] == 'justify'){
                                        content___ += ' checked ';
                                    }
                                    content___ += ' value="'+(textalign[i][0])+'" name="newslettermeta['+(num_count)+'][textalign]"/>'+(textalign[i][1])+'</label><br />';
                                }
                            content___ +='</td>';
                         content___ += '</tr>';
                         content___ += '<tr>';
                            content___ += '<td><label class="elestyle">Image url input:</label></td>';
                            content___ += '<td>';
                                content___ += '<input class="itemsize" type="text" name="newslettermeta['+(num_count)+'][imglink]" value="" id="newslettermeta_'+(num_count)+'_id"/>';
                            content___ += '</td>';
                            content___ += '<td>';
                                content___ += '<input class="upload_img_button"  id="newslettermeta_'+(num_count)+'_id" type="button" value="Upload Image" />';
                            content___ += '</td>';
                         content___ += '</tr>';
                         content___ += '</tbody></table>';
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom borderright itemverticalbottom">';
                        content___ += '<input type="hidden" name="newslettermeta['+(num_count)+'][elamenttype]" value="textimgleft"/>';
                        content___ += '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    content___ += '</td>';
                content___ += '</tr>';
                break;
            case 'textimgright':
                content___ += '<tr>';
                    content___ += '<td class="elementtitle">';
                        content___ += '<label>Text & image right</label>';
                    content___ += '</td>';
                    content___ += '<td  class="bordertopbottom" colspan="3">';
                         content___ += '<table><tbody>';
                         content___ += '<tr>';
                            content___ += '<td><label class="elestyle">Text input:</label></td>';
                            content___ += '<td>';
                                content___ += '<textarea class="itemsize" type="text" name="newslettermeta['+(num_count)+'][blocktext]" class="" cols="40" rows="10"></textarea>';
                            content___ += '</td>';
                            content___ += '<td>';
                                content___ += '<label>Text align</label><br />';
                                 for (var i=0;i<textalign.length; i++){
                                    content___ += '<label><input type="radio" style="margin-right:10px;" ';
                                    if ( textalign[i][0] == 'justify'){
                                        content___ += ' checked ';
                                    }
                                    content___ += ' value="'+(textalign[i][0])+'" name="newslettermeta['+(num_count)+'][textalign]"/>'+(textalign[i][1])+'</label><br />';
                                }
                            content___ +='</td>';
                         content___ += '</tr>';
                         content___ += '<tr>';
                            content___ += '<td><label class="elestyle">Image url input:</label></td>';
                            content___ += '<td>';
                                content___ += '<input class="itemsize" type="text" name="newslettermeta['+(num_count)+'][imglink]" value="" id="newslettermeta_'+(num_count)+'_id"/>';
                            content___ += '</td>';
                            content___ += '<td>';
                                content___ += '<input class="upload_img_button"  id="newslettermeta_'+(num_count)+'_id" type="button" value="Upload Image" />';
                            content___ += '</td>';
                         content___ += '</tr>';
                         content___ += '</tbody></table>';
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom borderright itemverticalbottom">';
                        content___ += '<input type="hidden" name="newslettermeta['+(num_count)+'][elamenttype]" value="textimgright"/>';
                        content___ += '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    content___ += '</td>';
                content___ += '</tr>';
                break;
            case 'rulerspace':
                content___ += '<tr>';
                content___ += '<td class="elementtitle">';
                    content___ += '<label>Ruler space</label>';
                content___ += '</td>';
                content___ += '<td  class="bordertopbottom" colspan="3">';
                    content___ += '<label class="elestyle">Horizontal Ruler (space)</label>';
                content___ += '</td>';
                
                content___ += '<td class="bordertopbottom borderright itemverticalbottom">';
                    content___ += '<input type="hidden" name="newslettermeta['+(num_count)+'][elamenttype]" value="rulerspace"/>';
                    content___ += '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                content___ += '</td>';
                content___ += '</tr>';
                break;
            case 'ruleryellow':
                content___ += '<tr>';
                    content___ += '<td class="elementtitle">';
                        content___ += '<label>Ruler yellow</label>';
                    content___ += '</td>';
                    content___ += '<td  class="bordertopbottom" colspan="3">';
                        content___ += '<label class="elestyle">Horizontal Ruler (yellow)</label>';
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom borderright itemverticalbottom">';
                        content___ += '<input type="hidden" name="newslettermeta['+(num_count)+'][elamenttype]" value="ruleryellow"/>';
                        content___ += '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    content___ += '</td>';
                    content___ += '</tr>';
                break;
            case 'imgcenter':
                content___ += '<tr>';
                    content___ += '<td class="elementtitle">';
                        content___ += '<label>Image center</label>';
                    content___ += '</td>';  
                    content___ += '<td class="bordertopbottom" ><label class="elestyle">Image url input:</label></td>';
                    content___ += '<td class="bordertopbottom" >';
                        content___ += '<input class="itemsize" type="text" name="newslettermeta['+(num_count)+'][imglink]" value="" id="newslettermeta_'+(num_count)+'_id"/>';
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom" >';
                        content___ += '<input class="upload_img_button"  id="newslettermeta_'+(num_count)+'_id" type="button" value="Upload Image" />';
                    content___ += '</td>';
                    content___ += '<td class="bordertopbottom borderright itemverticalbottom">';
                        content___ += '<input type="hidden" name="newslettermeta['+(num_count)+'][elamenttype]" value="imgcenter"/>';
                        content___ += '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    content___ += '</td>';
                content___ += '</tr>';
                break;
        }
        jQuery('#media_meta_table1').append(content___);
        jQuery("#add_message").show();
    });
        
});