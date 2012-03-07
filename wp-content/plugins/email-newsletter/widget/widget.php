<script language="javascript" type="text/javascript" src="<?php echo emailnews_plugin_url('widget/widget.js'); ?>"></script>
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo emailnews_plugin_url('widget/widget.css'); ?>" />

<!--
  <div class="eemail_msg" style="">
    <div style="display: table-cell;
	           vertical-align: middle;
               width: 555px; 
               height: 60px;
               position:relative">
        <a id="eemailbox_close" style="display: inline;">&nbsp;</a>      
               
        <div id="eemail_msg" ></div> 
    
    </div>
  </div>
-->

    <div class="eemail_msg" style="width: 1px; 
               height: 1px; display: none;">     
        <div id="eemail_msg" ></div> 
    </div>
    
    
    
    <div class="clear"></div>
<form method="post" action="">
    <div class="whitecolumn58 intranet"><p><?php echo get_option('eemail_widget_cap'); ?></p></div>

    <div class="whitecolumn66">
        <input class="eemail_textbox_class intranet_voire_e_mail" 
        name="eemail_txt_email" 
        id="eemail_txt_email" 
        onkeypress="if(event.keyCode==13) eemail_submit_ajax('<?php echo emailnews_plugin_url('widget'); ?>')" 
        onblur="if(this.value=='') this.value='<?php echo get_option('eemail_widget_txt_cap'); ?>';" 
        onfocus="if(this.value=='<?php echo get_option('eemail_widget_txt_cap'); ?>') this.value='';" 
        value="<?php echo get_option('eemail_widget_txt_cap'); ?>" 
        type="text" 
        maxlength="40" />
            
    </div>
    
    <div class="whitecolumn16 div_intranet_submit">
        <input class="eemail_textbox_button intranet_submit" 
            name="eemail_txt_Button" 
            id="eemail_txt_Button" 
            onClick="return eemail_submit_ajax('<?php echo emailnews_plugin_url('widget'); ?>')" 
            value="<?php echo get_option('eemail_widget_but_cap'); ?>" 
            type="button"
            size="2" 
            maxlength="2" />  
    </div>
    <div class="clear"></div>
</form>
