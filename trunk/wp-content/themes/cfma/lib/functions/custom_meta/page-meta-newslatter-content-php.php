<div class="admin_media_meta_control">

<div class="div_media_meta_box_title">
    <img class="newsletter_img_ex" width="496" height="640" alt="image" src="<?php echo CFMA_THEME_PATH ?>/images/custom_newsletter_meta/newsletter.jpg"/>
</div>
<div class="div_media_meta_box_content">
    <table id="media_meta_table_top" cellpadding="0" cellspacing="0"><tbody>
    <tr><td colspan="3"><h1>Top option: </h1></td></tr>
<?php
    echo '<tr>';
    
        echo '<td>';
        echo '<label>Top Right Text :</label>';
        echo '</td>';
        echo '<td colspan="2">';
        echo '<input type="text" name="newslettermetatoptext" value="'.stripslashes($newslettermetatoptext).'"  size="70%" />';
        echo '</td>';
    echo '</tr>';
          
    echo '<tr>';
        echo '<td>';
        echo '<label>Top Left Image :</label>';
        echo '</td>';
        echo '<td>';
        echo '<input type="text" name="newslettermetatopimglink" value="'.stripslashes($newslettermetatopimglink).'" id="newslettermetatopimglink" size="70%" />';
        echo '</td>';
        echo '<td>';
        echo '<input class="upload_img_button"  id="newslettermetatopimglink" type="button" value="Upload Image" />';
        echo '</td>';
      echo '</tr>';
?>
        
    </tbody></table>
</div>
<div class="div_media_meta_box_content">
    <h1>Content option: </h1>
    <h4>Add Elements</h4>
     <div class="div_media_meta_box_button">
         <!-- add_custom_content1 -->
         <?php
	       echo '<select class="dynamical_add_elements_select" id="dynamical_add_elements_select" style="min-width: 100px;">';
                echo '<option value="">Select Element</option>';
            foreach ($newsletter_elamenttype as $key => $value) {
                echo '<option value="'.$key.'">'.$value.'</option>';
            }
            echo '</select>';
?>
         <input type="button" class="button_dynamical_add_content" value="Add Element" id="button_dynamical_add_content"/>

         <div style="clear:both;"></div>
         <div class="add_message" id="add_message"> Add Element successful</div>
     </div>
     <p>Select an Element and hit the 'Add Element' Button.</p>
     <p>The Element will be added to the template</p>
     <p>&nbsp;</p>
     <h4>Elements list</h4>
    <table id="media_meta_table1" cellpadding="0" cellspacing="0"><tbody>
    <?php
if(!empty($meta)) {
   // echo '<pre>';
  //  print_r($meta);
  //  echo '</pre>';
    $num_tmp = 0;
	foreach($meta as $custom_media_code1) {
	   switch ($custom_media_code1["elamenttype"]){
	       case 'titleonleft':
                if($custom_media_code1["title"]!=''){
                    echo '<tr>';
                    echo '<td class="elementtitle">';
                        echo '<label>Title</label>';
                    echo '</td>';
                    echo '<td  class="bordertopbottom">';
                        echo '<label class="elestyle">Title input:</label>';
                    echo '</td>';
                    echo '<td class="bordertopbottom">';
                        echo '<input class="itemsize" type="text" name="newslettermeta['.$num_tmp.'][title]" value="'.stripslashes($custom_media_code1["title"]).'"/>';
                    echo '</td>';
                    echo '<td class="bordertopbottom">';
                    echo '</td>';
                    echo '<td class="bordertopbottom borderright itemverticalbottom">';
                        echo '<input type="hidden" name="newslettermeta['.$num_tmp.'][elamenttype]" value="titleonleft"/>';
                        echo '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    echo '</td>';
                    echo '</tr>';
                    $num_tmp++;
                }
                break;
            case 'textarea':
                if($custom_media_code1["blocktext"]!=''){
                echo '<tr>';
                    echo '<td class="elementtitle">';
                        echo '<label>Text area</label>';
                    echo '</td>';
                    echo '<td  class="bordertopbottom">';
                        echo '<label class="elestyle">Text input:</label>';
                    echo '</td>';
                    echo '<td class="bordertopbottom">';
                        echo '<textarea class="itemsize" type="text" name="newslettermeta['.$num_tmp.'][blocktext]" class="" cols="40" rows="5">'.stripslashes($custom_media_code1["blocktext"]).'</textarea>';
                    echo '</td>';
                    echo '<td class="bordertopbottom">';
                            echo '<label>Text align</label><br />';
                            foreach( $textalign as $alignkey => $alignvalue){
                                echo '<label><input type="radio" style="margin-right:10px;" ';
                                if ($custom_media_code1["textalign"] && $custom_media_code1["textalign"] == $alignkey){
                                    echo ' checked ';
                                }
                                echo ' value="'.$alignkey.'" name="newslettermeta['.$num_tmp.'][textalign]"/>'.$alignvalue.'</label><br />';
                            }
                    echo '</td>';
                    echo '<td class="bordertopbottom borderright itemverticalbottom">';
                        echo '<input type="hidden" name="newslettermeta['.$num_tmp.'][elamenttype]" value="textarea"/>';
                        echo '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    echo '</td>';
                echo '</tr>';
                $num_tmp++;
                }
                break;
            case 'textimgleft':
                if($custom_media_code1["imglink"]!='' || $custom_media_code1["blocktext"]!=''){
                    echo '<tr>';
                    echo '<td class="elementtitle">';
                        echo '<label>Text & image left</label>';
                    echo '</td>';
                    echo '<td  class="bordertopbottom" colspan="3">';
                         echo '<table><tbody>';
                         echo '<tr>';
                            echo '<td><label class="elestyle">Text input:</label></td>';
                            echo '<td>';
                                echo '<textarea class="itemsize" type="text" name="newslettermeta['.$num_tmp.'][blocktext]" class="" cols="40" rows="5">'.stripslashes($custom_media_code1["blocktext"]).'</textarea>';
                            echo '</td>';
                            echo '<td>';
                                echo '<label>Text align</label><br />';
                                foreach( $textalign as $alignkey => $alignvalue){
                                    echo '<label><input type="radio" style="margin-right:10px;" ';
                                    if ($custom_media_code1["textalign"] && $custom_media_code1["textalign"] == $alignkey){
                                        echo ' checked ';
                                    }
                                    echo ' value="'.$alignkey.'" name="newslettermeta['.$num_tmp.'][textalign]"/>'.$alignvalue.'</label><br />';
                                }
                            echo '</td>';
                         echo '</tr>';
                         echo '<tr>';
                            echo '<td><label class="elestyle">Image url input:</label></td>';
                            echo '<td>';
                                echo '<input class="itemsize" type="text" name="newslettermeta['.$num_tmp.'][imglink]" value="'.stripslashes($custom_media_code1["imglink"]).'" id="newslettermeta_'.$num_tmp.'_id"/>';
                            echo '</td>';
                            echo '<td>';
                                echo '<input class="upload_img_button"  id="newslettermeta_'.$num_tmp.'_id" type="button" value="Upload Image" />';
                            echo '</td>';
                         echo '</tr>';
                         echo '</tbody></table>';
                    echo '</td>';
                    echo '<td class="bordertopbottom borderright itemverticalbottom">';
                        echo '<input type="hidden" name="newslettermeta['.$num_tmp.'][elamenttype]" value="textimgleft"/>';
                        echo '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    echo '</td>';
                echo '</tr>';
                $num_tmp++;
                }
                break;
            case 'textimgright':
                if($custom_media_code1["imglink"]!='' || $custom_media_code1["blocktext"]!=''){
                    echo '<tr>';
                    echo '<td class="elementtitle">';
                        echo '<label>Text & image right</label>';
                    echo '</td>';
                    echo '<td  class="bordertopbottom" colspan="3">';
                         echo '<table><tbody>';
                         echo '<tr>';
                            echo '<td><label class="elestyle">Text input:</label></td>';
                            echo '<td>';
                                echo '<textarea class="itemsize" type="text" name="newslettermeta['.$num_tmp.'][blocktext]" class="" cols="40" rows="5">'.stripslashes($custom_media_code1["blocktext"]).'</textarea>';
                            echo '</td>';
                            echo '<td>';
                                echo '<label>Text align</label><br />';
                                foreach( $textalign as $alignkey => $alignvalue){
                                    echo '<label><input type="radio" style="margin-right:10px;" ';
                                    if ($custom_media_code1["textalign"] && $custom_media_code1["textalign"] == $alignkey){
                                        echo ' checked ';
                                    }
                                    echo ' value="'.$alignkey.'" name="newslettermeta['.$num_tmp.'][textalign]"/>'.$alignvalue.'</label><br />';
                                }
                            echo '</td>';
                         echo '</tr>';
                         echo '<tr>';
                            echo '<td><label class="elestyle">Image url input:</label></td>';
                            echo '<td>';
                                echo '<input class="itemsize" type="text" name="newslettermeta['.$num_tmp.'][imglink]" value="'.stripslashes($custom_media_code1["imglink"]).'" id="newslettermeta_'.$num_tmp.'_id"/>';
                            echo '</td>';
                            echo '<td>';
                                echo '<input class="upload_img_button"  id="newslettermeta_'.$num_tmp.'_id" type="button" value="Upload Image" />';
                            echo '</td>';
                         echo '</tr>';
                         echo '</tbody></table>';
                    echo '</td>';
                    echo '<td class="bordertopbottom borderright itemverticalbottom">';
                        echo '<input type="hidden" name="newslettermeta['.$num_tmp.'][elamenttype]" value="textimgright"/>';
                        echo '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    echo '</td>';
                echo '</tr>';
                $num_tmp++;
                }
                break;
            case 'rulerspace':
                    echo '<tr>';
                    echo '<td class="elementtitle">';
                        echo '<label>Ruler space</label>';
                    echo '</td>';
                    echo '<td  class="bordertopbottom" colspan="3">';
                        echo '<label class="elestyle">Horizontal Ruler (space)</label>';
                    echo '</td>';
                    
                    echo '<td class="bordertopbottom borderright itemverticalbottom">';
                        echo '<input type="hidden" name="newslettermeta['.$num_tmp.'][elamenttype]" value="rulerspace"/>';
                        echo '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    echo '</td>';
                    echo '</tr>';
                    $num_tmp++;
                break;
            case 'ruleryellow':
                    echo '<tr>';
                    echo '<td class="elementtitle">';
                        echo '<label>Ruler yellow</label>';
                    echo '</td>';
                    echo '<td  class="bordertopbottom" colspan="3">';
                        echo '<label class="elestyle">Horizontal Ruler (yellow)</label>';
                    echo '</td>';
                    echo '<td class="bordertopbottom borderright itemverticalbottom">';
                        echo '<input type="hidden" name="newslettermeta['.$num_tmp.'][elamenttype]" value="ruleryellow"/>';
                        echo '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    echo '</td>';
                    echo '</tr>';
                    $num_tmp++;
                break;
            case 'imgcenter':
                if($custom_media_code1["imglink"]!=''){
                    echo '<tr>';
                    echo '<td class="elementtitle">';
                        echo '<label>Image center</label>';
                    echo '</td>';  
                    echo '<td class="bordertopbottom" ><label class="elestyle">Image url input:</label></td>';
                    echo '<td class="bordertopbottom" >';
                        echo '<input class="itemsize" type="text" name="newslettermeta['.$num_tmp.'][imglink]" value="'.stripslashes($custom_media_code1["imglink"]).'" id="newslettermeta_'.$num_tmp.'_id"/>';
                    echo '</td>';
                    echo '<td class="bordertopbottom" >';
                        echo '<input class="upload_img_button"  id="newslettermeta_'.$num_tmp.'_id" type="button" value="Upload Image" />';
                    echo '</td>';
                    echo '<td class="bordertopbottom borderright itemverticalbottom">';
                        echo '<input type="hidden" name="newslettermeta['.$num_tmp.'][elamenttype]" value="imgcenter"/>';
                        echo '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
                    echo '</td>';
                echo '</tr>';
                $num_tmp++;
                }
                break;
        }

       /*
	   if($custom_media_code1["mediatype"]=='image'&&$custom_media_code1["link"]!=''){
	       echo '<tr>';
            echo '<td>';
            echo '<label>Image :</label>';
            echo '</td>';
            echo '<td>';
            echo '<input type="text" name="newslettermeta['.$num_tmp.'][link]" value="'.stripslashes($custom_media_code1["link"]).'" id="_media_meta_'.$num_tmp.'" size="50%" />';
            echo '<input type="hidden" name="newslettermeta['.$num_tmp.'][mediatype]" value="image"/>';
            echo '</td>';
            echo '<td>';
            echo '<input class="upload_img_button"  id="_media_meta_'.$num_tmp.'" type="button" value="Upload Image" />';
            echo '</td>';
            echo '<td>';
            echo '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
            echo '</td>';
          echo '</tr>';
        $num_tmp++;
      }else if($custom_media_code1["mediatype"]=='video'&&$custom_media_code1["link"]!=''){
        echo '<tr>';
            echo '<td>';
            echo '<label>Video :</label>';
            echo '</td>';
            echo '<td>';
            echo '<input type="text" name="newslettermeta['.$num_tmp.'][link]" value="'.stripslashes($custom_media_code1["link"]).'" id="_media_meta_'.$num_tmp.'" size="50%" />';
            echo '<input type="hidden" name="newslettermeta['.$num_tmp.'][mediatype]" value="video"/>';
            echo '</td>';
            echo '<td>';
            echo '<input class="upload_img_button"  id="_media_meta_'.$num_tmp.'" type="button" value="Upload Video" />';
            echo '</td>';
            echo '<td>';
            echo '<input class="delete_img_button" type="button" value="Delete" onClick="jQuery(this).parent().parent().remove();"/>';
            echo '</td>';
          echo '</tr>';
          $num_tmp++;
      }
      */
	}
}
?>
     </tbody></table>
     <table><tbody>
        <tr> <td></td> <td></td> <td></td>  </tr>
        <tr> <td></td> <td></td> </tr>
     </tbody></table>
</div><!-- End div_media_meta_box_content-->

</div> <!-- End admin_media_meta_control-->  
    
    
