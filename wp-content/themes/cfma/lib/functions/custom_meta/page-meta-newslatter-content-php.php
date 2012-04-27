<div class="admin_media_meta_control">

<div class="div_media_meta_box_title">
    <img class="newsletter_img_ex" width="496" alt="image" src="<?php echo get_bloginfo('template_url'); ?>/images/custom_newsletter_meta/newsletter.jpg"/>
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
        echo '<input type="text" name="newslettermetatoptext" value="'.strip_tags(stripslashes($newslettermetatoptext)).'"  size="70%" />';
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
                        echo '<input class="itemsize" type="text" name="newslettermeta['.$num_tmp.'][title]" value="'.strip_tags(stripslashes($custom_media_code1["title"])).'"/>';
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
                        echo '<textarea class="itemsize" type="text" name="newslettermeta['.$num_tmp.'][blocktext]" class="" cols="40" rows="10">'.stripslashes($custom_media_code1["blocktext"]).'</textarea>';
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
                                echo '<textarea class="itemsize" type="text" name="newslettermeta['.$num_tmp.'][blocktext]" class="" cols="40" rows="10">'.stripslashes($custom_media_code1["blocktext"]).'</textarea>';
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
                                echo '<textarea class="itemsize" type="text" name="newslettermeta['.$num_tmp.'][blocktext]" class="" cols="40" rows="10">'.stripslashes($custom_media_code1["blocktext"]).'</textarea>';
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
	}
}
?>
     </tbody></table>
</div><!-- End div_media_meta_box_content-->

<div class="div_media_meta_box_content">
    <table id="media_meta_table_bottom" cellpadding="0" cellspacing="0"><tbody>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><label><h1>Notes : (some special tag)</h1></label></td></tr>
    <tr>
        <td><label>- Text align right:</label></td>
        <td><textarea readonly="readonly" cols="100" rows="1"><p style="text-align:right;margin:0px;">text text text text</p></textarea>
        </td>
    </tr>
    
    <tr>
        <td><label>- Link:</label></td>
        <td><textarea readonly="readonly" cols="100" rows="1"><a style="color:#c8b27b;text-decoration: none;" href="http://cfmart.fr/">http://cfmart.fr/</a></textarea>
        </td>
    </tr>
    
    <tr>
        <td><label>- Text align right with link inside:</label></td>
        <td><textarea readonly="readonly" cols="100" rows="1"><p style="text-align:right;margin:0px;">Pierre GREFFE Avocat à la Cour – <a style="color:#ffffff;text-decoration: none;" href="www.cabinet-greffe.com" >www.cabinet-greffe.com</a></p></textarea>
        </td>
    </tr>
    
    <tr>
        <td><label>- A small space:</label></td>
        <td><input type="text" readonly="readonly" value="&amp;nbsp;" style="background:#ffffff;"/>
        </td>
    </tr>
    
    <tr>
        <td><label>- A line break:</label></td>
        <td><textarea readonly="readonly" cols="100" rows="1"><br/></textarea>
        </td>
    </tr>

    </tbody></table>
</div>

</div> <!-- End admin_media_meta_control-->