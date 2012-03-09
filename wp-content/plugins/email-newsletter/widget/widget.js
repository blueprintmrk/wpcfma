// JScript File
//################################################################################
//###### Project   : Email newsletter										######
//###### Author    : Gopi                        							######
//################################################################################

var xmlHttp
function GetXmlHttpObject(handler)
{ 
	var objXmlHttp=null
	if (navigator.userAgent.indexOf("Opera")>=0)
	{
	//	alert("This page doesn't work in Opera") 
        document.getElementById("eemail_msg").innerHTML=" « This page doesn't work in Opera  » ";
		return 
	}
	if (navigator.userAgent.indexOf("MSIE")>=0)
	{ 
		var strName="Msxml2.XMLHTTP"
		if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
		{
			strName="Microsoft.XMLHTTP"
		} 
		try
		{ 
			objXmlHttp=new ActiveXObject(strName)
			objXmlHttp.onreadystatechange=handler 
			return objXmlHttp
		} 
		catch(e)
		{ 
		//	alert("Error. Scripting for ActiveX might be disabled") 
            document.getElementById("eemail_msg").innerHTML=" « Error. Scripting for ActiveX might be disabled » ";
			return 
		} 
	} 
	if (navigator.userAgent.indexOf("Mozilla")>=0)
	{
		objXmlHttp=new XMLHttpRequest()
		objXmlHttp.onload=handler
		objXmlHttp.onerror=handler 
		return objXmlHttp
	}
} 
function eemail_submit_ajax(siteurl)
{    
	//txt_email_newsletter=document.getElementById("eemail_txt_email");
	email = $("#eemail_txt_email");
    if(email.val()=="")
    {
        //alert("Please enter the email address");
        //alert("S'il vous plaît entrez l'adresse e-mail");
       // document.getElementById("eemail_msg").innerHTML=" « S'il vous plaît entrez l'adresse e-mail » ";
        
        $('.eemail_msg').html(" « S'il vous plaît entrez l'adresse e-mail » ");
        email.focus();
        return false;    
    }
	if(email.val()!="" && (email.val().indexOf("@",0)==-1 || email.val().indexOf(".",0)==-1))
    {
        // alert("Please enter valid email");
       // document.getElementById("eemail_msg").innerHTML=" « S'il vous plaît entrer une adresse valide » ";
        $('.eemail_msg').html(" « S'il vous plaît entrer une adresse valide » ");
        //alert($('.eemail_msg').text());
        email.select();
        return false;
    }
    
//	document.getElementById("eemail_msg").innerHTML="loading...";
    $('.eemail_msg').html("loading...");
   // document.getElementById("eemail_msg").innerHTML= txt_email_newsletter.value;
	var date_now=new Date();
    var mynumber=Math.random();
//	var url=siteurl+"/eemail_subscribe.php?txt_email_newsletter="+ txt_email_newsletter.value + "&timestamp=" + date_now + "&action=" + mynumber;
   // alert(siteurl);
    $.post(ajax_object_newsletter.ajaxurl_newsletter, {
			action: 'ajax_newsletter',
			Email: email.val()
		}, function(data2) {
		  
                    if(data2 == null) {
                        
                        //Please try after some time.
            		//	document.getElementById("eemail_msg").innerHTML="« S'il vous plaît essayer après un certain temps. »";
                        $('.eemail_msg').html("« S'il vous plaît essayer après un certain temps. »");
                      //  $('.eemail_msg').html((xmlHttp.responseText).trim());
            			email.val("");
                    }
            		if(data2=="succ")
            		{
            		//	document.getElementById("eemail_msg").innerHTML='Subscribed successfully.';
                    //	document.getElementById("eemail_msg").innerHTML='« Votre inscription a bien été enregistrée Nous vous remercions de l’intérêt que vous portez à la CFMA. Vous recevrez bientôt notre newsletter »';
                        $('.eemail_msg').html("« Votre inscription a bien été enregistrée Nous vous remercions de l’intérêt que vous portez à la CFMA. Vous recevrez bientôt notre newsletter »");
            			email.val("");
            		}
            		else if(data2=="exs")
            		{
            		   // document.getElementById("eemail_msg").innerHTML="« Email deja existant. »";
                        $('.eemail_msg').html("« Email deja existant. »");
            		}
            /*	jQuery(".form_content a[rel^='prettyPhoto']").prettyPhoto({
                    theme:'light_square'
                });*/
            	
		});
  //  xmlHttp=GetXmlHttpObject(newchanged_ncc);
 //   xmlHttp.open("GET", url , true);
                
   
	
}

function newchanged_ncc() 
{ 
	//alert(xmlHttp.readyState);
	//alert(xmlHttp.responseText);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		if((xmlHttp.responseText).trim()=="succ")
		{
		//	document.getElementById("eemail_msg").innerHTML='Subscribed successfully.';
        //	document.getElementById("eemail_msg").innerHTML='« Votre inscription a bien été enregistrée Nous vous remercions de l’intérêt que vous portez à la CFMA. Vous recevrez bientôt notre newsletter »';
            $('.eemail_msg').html("« Votre inscription a bien été enregistrée Nous vous remercions de l’intérêt que vous portez à la CFMA. Vous recevrez bientôt notre newsletter »");
			document.getElementById("eemail_txt_email").value="";
		}
		else if((xmlHttp.responseText).trim()=="exs")
		{
		   // document.getElementById("eemail_msg").innerHTML="« Email deja existant. »";
            $('.eemail_msg').html("« Email deja existant. »");
		}
		else
		{
		      //Please try after some time.
		//	document.getElementById("eemail_msg").innerHTML="« S'il vous plaît essayer après un certain temps. »";
            $('.eemail_msg').html("« S'il vous plaît essayer après un certain temps. »");
          //  $('.eemail_msg').html((xmlHttp.responseText).trim());
			document.getElementById("eemail_txt_email").value="";
		}
	}
} 
$(document).ready(function(){
    $('#eemail_txt_email').keypress(function(event){
        if(event.which == 13) {
            $('#eemail_txt_Button').trigger('click');
        }
    });
 //   $('#eemail_txt_Button').click(function(){
 //       eemail_submit_ajax($('#testurl').val());
 //   });
    $('.pp_close').click(function(){
        $('.eemail_msg').html("");
    });

});
String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g,"");
}
String.prototype.ltrim = function() {
	return this.replace(/^\s+/,"");
}
String.prototype.rtrim = function() {
	return this.replace(/\s+$/,"");
}
