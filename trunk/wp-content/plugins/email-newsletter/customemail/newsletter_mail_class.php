<?php /* newsletter email class */
    function clean_style($style)
	{
		$style = trim($style);
		$style = str_replace("\t",'',$style);
		$style = str_replace("\n",'',$style);
		$style = str_replace("\r",'',$style);
		if (strlen($style)) if ($style[strlen($style) -1] != ';') $style .=';';
		return $style;
	}
    function newslclasses($classes,$_classesemail, $echo = true)
	{
		$count = 1;
		while ($count) $classes = str_replace('  ', ' ', $classes, $count);
		$a_classes = explode(' ', trim($classes));
		$style = '';
		foreach($a_classes as $class){
		      if (isset($_classesemail[$class])) $style .= clean_style($_classesemail[$class]);
          }
		if ($style != ''){
			if ($echo) 	{	echo   'style="' . $style . '"';
            }else return 'style="' . $style . '"';
        }

	}  
    function newswpautop($pee, $br = 1) {
        if ( trim($pee) === '' )
                return '';
        //$pee = $pee . "\n"; // just to make things a little easier, pad the end
        $pee = preg_replace('|<br />\s*<br />|', "\n\n", $pee);
        // Space things out a little
        $allblocks = '(?:table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|option|form|map|area|blockquote|address|math|style|input|p|h[1-6]|hr|fieldset|legend|section|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary)';
        $pee = preg_replace('!(<' . $allblocks . '[^>]*>)!', "\n$1", $pee);
        $pee = preg_replace('!(</' . $allblocks . '>)!', "$1\n\n", $pee);
        $pee = str_replace(array("\r\n", "\r"), "\n", $pee); // cross-platform newlines
        if ( strpos($pee, '<object') !== false ) {
                $pee = preg_replace('|\s*<param([^>]*)>\s*|', "<param$1>", $pee); // no pee inside object/embed
                $pee = preg_replace('|\s*</embed>\s*|', '</embed>', $pee);
        }
        $pee = preg_replace("/\n\n+/", "\n\n", $pee); // take care of duplicates
        // make paragraphs, including one at the end
        $pees = preg_split('/\n\s*\n/', $pee, -1, PREG_SPLIT_NO_EMPTY);
        $pee = '';
        
       // foreach ( $pees as $tinkle ) $pee .= '<p>' . trim($tinkle, "\n") . "</p>\n";
        
        foreach ( $pees as $tinkle ) $pee .= trim($tinkle, "\n") . "<br />\n";
                
        $pee = preg_replace('|<p>\s*</p>|', '', $pee); // under certain strange conditions it could create a P of entirely whitespace
        $pee = preg_replace('!<p>([^<]+)</(div|address|form)>!', "<p>$1</p></$2>", $pee);
        $pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee); // don't pee all over a tag
        $pee = preg_replace("|<p>(<li.+?)</p>|", "$1", $pee); // problem with nested lists
        $pee = preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $pee);
        $pee = str_replace('</blockquote></p>', '</p></blockquote>', $pee);
        $pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)!', "$1", $pee);
        $pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee);
        if ($br) {
                $pee = preg_replace_callback('/<(script|style).*?<\/\\1>/s', '_autop_newline_preservation_helper', $pee);
                $pee = preg_replace('|(?<!<br />)\s*\n|', "<br />\n", $pee); // optionally make line breaks
                $pee = str_replace('<WPPreserveNewline />', "\n", $pee);
        }
        $pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*<br />!', "$1", $pee);
        $pee = preg_replace('!<br />(\s*</?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)[^>]*>)!', '$1', $pee);
        if (strpos($pee, '<pre') !== false)
                $pee = preg_replace_callback('!(<pre[^>]*>)(.*?)</pre>!is', 'clean_pre', $pee );
        $pee = preg_replace( "|\n</p>$|", '</p>', $pee );
        return $pee;
    }
    
    
    function newsletter_template01($post_ID,$_classes){
        $newslettermetatoptext = get_post_meta($post_ID,'newslettermetatoptext',TRUE);
        $newslettermetatoptext = strip_tags(stripslashes($newslettermetatoptext));
        $newslettermetatopimglink = get_post_meta($post_ID,'newslettermetatopimglink',TRUE);
        
        $custom_field_keys = get_post_custom_keys($post_ID);
        foreach ( $custom_field_keys as $key => $value ) {
            $valuet = trim($value);
            if ( '_' == $valuet{0} )continue;
            $meta_key = $value;
            $meta_value = get_post_custom_values($meta_key,$post_ID);
            $meta_key02 = explode('_',$meta_key);
            if($meta_key02[0]&&$meta_key02[2]){
                    $meta[$meta_key02[1]][$meta_key02[2]]= $meta_value[0];;
            }
        }
        $newsl_content = '';
        
            $newsl_content .= '<table ' . newslclasses('newl_body',$_classes, false) . ' width="100%" cellspacing="0" cellpadding="0" ><tbody><tr><td align="center" valign="top">';
            $newsl_content .= '<table ' . newslclasses('newl_wrapper',$_classes,false) . ' width="600" cellspacing="0" cellpadding="0" ><tbody><tr>';
            $newsl_content .= '<td ' . newslclasses('newl_wrapper_td',$_classes,false) . '>';
            $newsl_content .= '<div ' . newslclasses('rulerspace',$_classes,false) . '></div>';
            $newsl_content .= '<div ' . newslclasses('content_line',$_classes,false) . '>';
            $newsl_content .= '<div ' . newslclasses('topleftimg_div',$_classes,false) . '>';
            $newsl_content .= '<img ' . newslclasses('topleftimg_img',$_classes,false) . ' alt="" src="' . $newslettermetatopimglink . '"/>';
            $newsl_content .= '</div>';
            $newsl_content .= '<div ' . newslclasses('toprighttext_div',$_classes,false) . '> ';
            $newsl_content .= '<p ' . newslclasses('p_margin0',$_classes,false) . '>' . $newslettermetatoptext . '</p>';
            $newsl_content .= '</div>';
            $newsl_content .= '<div ' . newslclasses('clear',$_classes,false) . '></div>';
            $newsl_content .= '</div>';
           // $newsl_content .= '<div ' . newslclasses('rulerspace',$_classes,false) . '></div>';
        
        if(!empty($meta)) {
        $num_tmp = 0;
        foreach($meta as $custom_media_code1) {
            switch ($custom_media_code1["elamenttype"]){
            case 'titleonleft':
                if($custom_media_code1["title"]!=''){
                    $newsl_content .= '<div ' . newslclasses('content_line',$_classes,false) . '>';
                    $newsl_content .= '<p ' . newslclasses('csstitleleft',$_classes,false) . '>' . strip_tags(stripslashes($custom_media_code1["title"])) . '</p>';
                    $newsl_content .= '</div>';
                    $num_tmp++;
                }
                break;
            case 'textarea':
                if($custom_media_code1["blocktext"]!=''){
                    $newsl_content .= '<div ' . newslclasses('content_line '.$custom_media_code1["textalign"],$_classes,false) . '>';
                    $newsl_content .= stripslashes(newswpautop($custom_media_code1["blocktext"]));
                    $newsl_content .= '</div>';
                $num_tmp++;
                }
                break;
            case 'textimgleft':
                if($custom_media_code1["imglink"]!='' || $custom_media_code1["blocktext"]!=''){
                    $newsl_content .= '<div ' . newslclasses('content_line',$_classes,false) . '>';
                    $newsl_content .= '<div ' . newslclasses('textimgleft_divimg',$_classes,false) . '>';
                    $newsl_content .= '<img ' . newslclasses('textimgleft_divimg_img',$_classes,false) . ' alt="" src="' . $custom_media_code1["imglink"] . '"/>';
                    $newsl_content .= '</div>';
                    $newsl_content .= '<div ' . newslclasses('textimgleft_divtext '. $custom_media_code1["textalign"],$_classes,false) . '>';
                    $newsl_content .= stripslashes(newswpautop($custom_media_code1["blocktext"]));
                    $newsl_content .= '</div>';
                    $newsl_content .= '<div ' . newslclasses('clear',$_classes,false) . '></div>';
                    $newsl_content .= '</div>';
                $num_tmp++;
                }
                break;
            case 'textimgright':
                if($custom_media_code1["imglink"]!='' || $custom_media_code1["blocktext"]!=''){
                    $newsl_content .= '<div ' . newslclasses('content_line',$_classes,false) . '>';
                    $newsl_content .= '<div ' . newslclasses('textimgright_divtext '.$custom_media_code1["textalign"],$_classes,false) . '>';
                    $newsl_content .= stripslashes(newswpautop($custom_media_code1["blocktext"]));
                    $newsl_content .= '</div>';
                    $newsl_content .= '<div ' . newslclasses('textimgright_divimg',$_classes,false) . '>';
                    $newsl_content .= '<img ' . newslclasses('textimgright_divimg_img',$_classes,false) . '  alt="" src="' . $custom_media_code1["imglink"] . '"/> ';
                    $newsl_content .= '</div>';
                    $newsl_content .= '<div ' . newslclasses('clear',$_classes,false) . '></div>';
                $newsl_content .= '</div>';
                $num_tmp++;
                }
                break;
            case 'rulerspace':
                    $newsl_content .= '<div ' . newslclasses('rulerspace',$_classes,false) . '></div>';
                    $num_tmp++;
                break;
            case 'ruleryellow':
                    $newsl_content .= '<div ' . newslclasses('cssruleryellow',$_classes,false) . '></div>';
                    $num_tmp++;
                break;
            case 'imgcenter':
                if($custom_media_code1["imglink"]!=''){
                    $newsl_content .= '<div ' . newslclasses('content_line cssimgcenter_div',$_classes,false) . '>';
                    $newsl_content .= '<img width="560"' . newslclasses('cssimgcenter',$_classes,false) . '  alt="" src="' . $custom_media_code1["imglink"] . '"/> ';
                    
                    $newsl_content .= '</div>';
                $num_tmp++;
                }
                break;
            }
        }
        }
        $newsl_content .= '<div ' . newslclasses('rulerspace',$_classes,false) . '></div>';
        $newsl_content .= '<div ' . newslclasses('rulerspace',$_classes,false) . '></div>';
        $newsl_content .= '</td></tr></tbody></table></td></tr></tbody></table>';
        return $newsl_content;
    }
    

?>