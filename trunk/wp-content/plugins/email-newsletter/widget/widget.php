
<!--
 <script language="javascript" type="text/javascript" src="<?php echo emailnews_plugin_url('widget/widget.js'); ?>"></script>
-->
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo emailnews_plugin_url('widget/widget.css'); ?>" />


    <div id="pre_eemail_msg">     
        <div id="eemail_msg" class="eemail_msg" ></div> 
    </div>

    <div class="clear"></div>
    <div class="whitecolumn75 intranet"><p><?php echo get_option('eemail_widget_cap'); ?></p></div>

    <div class="whitecolumn103">
        <input class="eemail_textbox_class intranet_voire_e_mail" 
        name="eemail_txt_email" 
        id="eemail_txt_email"  
        value="<?php echo get_option('eemail_widget_txt_cap'); ?>" 
     
        type="text" 
        maxlength="40" />
            
    </div>
    <input type="hidden" id="testurl" value="<?php echo emailnews_plugin_url('widget'); ?>" />
    <div class="whitecolumn30 div_intranet_submit">
        <a href="#pre_eemail_msg" rel="prettyPhoto[inline]" 
        class="eemail_textbox_button intranet_submit"
        name="eemail_txt_Button" 
            id="eemail_txt_Button" 
         onClick="return eemail_submit_ajax('<?php echo emailnews_plugin_url('widget'); ?>')"      
        ><?php echo get_option('eemail_widget_but_cap'); ?></a>

    </div>
    <div class="clear"></div>