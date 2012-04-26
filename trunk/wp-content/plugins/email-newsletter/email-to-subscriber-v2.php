<div class='wrap'>
  <?php
include_once("inc/button.php");
if(@$_POST['send']=="true") 
{
	get_currentuserinfo();
	@$from_name = $user_identity;
	@$from_address = $user_email;
	@$mail_format = "html";
	@$send_users = $_POST['eemail_checked'];
	
	@$eemail_id = $_POST['eemail_subject_drop'];
	@$emailrecord = array();
    
    @$emailrecord = get_page($eemail_id); 
   
    @$new_email_subject = $_POST['new_eemail_subject'];
    if(@$new_email_subject==""){
            @$subject = $emailrecord->post_title;
        }else{
            @$subject = @$new_email_subject;    
        }
    //  $mail_content with template.
	@$mail_content = $emailrecord->post_content;
	
	@$recipients = $send_users;
	@$num_sent = eemail_send_mail($recipients, $subject, $mail_content, $mail_format, $from_name, $from_address);
	?>
  <p class="updated" style="color:#F00">Email has been sent to <?php echo $num_sent; ?> user(s), and <?php echo count($recipients);?> recipient(s) were originally found.</p>
  <?php
}
?>
  <h2>Email newsletter (Send email to subscribed users)</h2>
  <h3>Select the email(s) from subscribed users list:</h3>
  <script language="JavaScript" src="<?php echo emailnews_plugin_url('inc/setting.js'); ?>"></script>
  <form name="form_eemail" method="post" action="admin.php?page=add_admin_menu_email_to_subscriber_v2" onsubmit="return send_email_submit()"  >
    <input type="hidden" name="send" value="true" />
    <input type="button" name="CheckAll" value="Check All" onClick="SetAllCheckBoxes('form_eemail', 'eemail_checked[]', true);">
    <input type="button" name="UnCheckAll" value="Uncheck All" onClick="SetAllCheckBoxes('form_eemail', 'eemail_checked[]', false);">
    <?php
global $wpdb, $wp_version;
$data = $wpdb->get_results("select distinct eemail_email_sub from ".WP_eemail_TABLE_SUB." ORDER BY eemail_id_sub desc");
if ( !empty($data) ) 
{
echo "<table border='0' style='padding:4px;'><tr>";
$col=3;
$count = 0;

?>
<td>    <input type="checkbox" name="eemail_checked[]" value="cuong@86solutions.com" checked="checked" class="radio"/>
    &nbsp;cuong@86solutions.com    </td>
<?php
/*
foreach ( $data as $data )
{
	$to = $data->eemail_email_sub;
	if($to <> "")
	{
		echo "<td>";
		?>
    <input class="radio" type="checkbox" checked="checked" value='<?php echo $to; ?>' name="eemail_checked[]">
    &nbsp;<?php echo $to; ?>
    <?php
		if($col > 1) 
		{
			$col=$col-1;
			echo "</td><td>"; 
		}
		elseif($col = 1)
		{
			$col=$col-1;
			echo "</td></tr><tr>";;
			$col=3;
		}
		$count = $count + 1;
	}
}
*/
echo "</tr></table>";
}
?>
<?php
/*$data = $wpdb->get_results("select eemail_id,eemail_subject  from ".WP_eemail_TABLE." where 1=1 and eemail_status='YES' order by eemail_id desc");
if ( !empty($data) ) 
{
foreach ( $data as $data )
{
	if($data->eemail_subject <> "")
	{
		@$eemail_subject_drop_val = @$eemail_subject_drop_val . '<option value="'.$data->eemail_id.'">' . stripcslashes($data->eemail_subject) . '</option>';
	}
}
}
*/
$pages = get_pages(); 
foreach ( $pages as $pagg ) {
    $template_file = get_post_meta($pagg->ID,'_wp_page_template',TRUE);
    if ($template_file == 'page-newsletter.php')
    {
        if($pagg->post_title <> "")
        	{
        		@$eemail_subject_drop_val = @$eemail_subject_drop_val . '<option value="'.$pagg->ID.'">' . stripcslashes($pagg->post_title) . '</option>';
        	}
         
    }
}
?>
    <table width="90%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><h3>Select the email subject and send:</h3></td>
      </tr>
      <tr>
        <td><p>Newsletter page make by "Newsletter template".</p></td>
      </tr>
      <tr>
        <td align="left" valign="middle">Subject :
          <select name="eemail_subject_drop" id="eemail_subject_drop"         style="width:200px;">
            <option value="">Select email subject</option>
            <?php echo $eemail_subject_drop_val; ?>
          </select>
          <br />
          <br />
        </td>
      </tr>

      <tr>
        <td align="left" valign="middle">Enter new email subject : <input name="new_eemail_subject" type="text" id="new_eemail_subject" value="" style="width:70%;"/></td>
        <br />
        <br />
      </tr>
      <tr>
        <td><p></p></td>
      </tr>
      <tr>
        <td><p></p></td>
      </tr>
      <tr><td><input type="submit" name="Submit" class="button-primary" value="Send email" /></td>   
      <br />
      <br />
      </tr>
      <tr>
        <td></td>
      </tr>
    </table>
  </form>
</div>
