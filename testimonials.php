<?include_once('constants.php'); ?>

												 
<? 
if($_REQUEST['email']!='')										 

{
	$msg1='<span style="font-size:12px;font-family:arial;color:red"><b>Wrong Security Code.</b></span>';
	
   if ( $_SESSION['security_code'] == $_REQUEST['captcha']) 
	
	{
		         
					$sqls = "INSERT INTO fs_testimonials (name,email,mobile,comment,added_on)VALUES ('".$_REQUEST['nam']."','".$_REQUEST['email']."','".$_REQUEST['cont']."','".$_REQUEST['msg']."','".date()."') ";
					$ress = q($sqls);
					
															
			
     	
	
	    $msg1 = '<span style="font-size:12px;font-family:arial;color:#006633"><b>Testimonial Successully Send.</b></span>';

																				
	}

		
	

}


?>


<script type="text/javascript" src="js/calendar-1.js"></script>

<script type="text/javascript"> 
	function new_captcha(){
		var c_currentTime = new Date();
		var c_miliseconds = c_currentTime.getTime();
		document.getElementById('captcha12').src = 'CaptchaSecurityImages.php?width=120&height=30&characters=5"?x='+ c_miliseconds;
	}
</script>

<script language="javascript" type="text/javascript">
 function validatequiry(){
	var errText = "";
	var errorflag = false;


	if(document.enquiryform.nam.value == ""){
		 errText = "Please Enter Name.";
		 alert(errText);
		 document.enquiryform.nam.focus();
		 errorflag = true;
		 return false;
	}
	
	
	if(document.enquiryform.email.value == ""){
		 errText = "Please Enter Email ID.";
		 alert(errText);
		 document.enquiryform.email.focus();
		 errorflag = true;
		 return false;
	}else if(document.enquiryform.email.value != ""){
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(document.enquiryform.email.value)){
			    errorflag = false;
		}else{
			errText = "Email ID Not Valid.";
			alert(errText);
			document.enquiryform.email.focus();
			errorflag = true;
			return false;
		}
	}

	if(document.enquiryform.cont.value == ""){
		 errText = "Please Enter Contact Number.";
		 alert(errText);
		 document.enquiryform.cont.focus();
		 errorflag = true;
		 return false;
	}

	if(document.enquiryform.msg.value == ""){
		 errText = "Please Enter Massage.";
		 alert(errText);
		 document.enquiryform.msg.focus();
		 errorflag = true;
		 return false;
	}


		if(document.getElementById("captcha").value == ""){
		 errText += "- Verification Code are required.\n";
		 errorflag = true;
	}

	
	
	if(errorflag==true){
		alert(errText);
		return false;
	}else{
		return true;
	}
	}

</script>
													

<table width="500" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td class="enquiry_bg" valign="top">
									<form name="enquiryform" action="" onsubmit="return validatequiry();" method="POST" enctype="">

                                    	<table width="500" border="0" cellspacing="6" cellpadding="0">
                                          <tr><td class="heading" colspan="2" style="font-size:16px;font-weight:bold;font-family:arial;color:#006633">Submit Your Testimonials</td></tr>
										  <tr>
										   <td colspan="2"><? echo $msg1; ?></td> 
										  </tr>
                                          <tr>	
                                          	<td class="form_text" style="font-size:14px;font-family:arial">Name:</td>
                                            <td><input size="40" type="text" name="nam" id="nam" class="form_input" /></td>
                                          </tr>
                                          <tr>	
                                          	<td class="form_text" style="font-size:14px;font-family:arial">Email:</td>
                                            <td><input size="40" type="text" name="email" id="email" class="form_input" /></td>
                                          </tr>
                                          <tr>	
                                          	<td class="form_text" style="font-size:14px;font-family:arial">Contact:</td>
                                            <td><input size="40" type="text" name="cont" id="cont" class="form_input" /></td>
                                          </tr>
                                          <tr>	
                                          	<td class="form_text" style="font-size:14px;font-family:arial">Message:</td>
                                            <td><textarea cols="32" rows="10" name="msg" id="msg" class="form_textarea"></textarea></td>
                                          </tr>
                                          <tr>
                                          	<td></td>
                                            <td>
                                            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td width="130"><img align="left" id="captcha12" src="CaptchaSecurityImages.php?width=120&height=30&characters=5" alt="captcha security code"/></td>
                                                    <td><a  href="JavaScript: new_captcha();"><img  width="16" height="16" alt="Change verification code " src="images/refresh_icon.png" /></td>
													
                                                  </tr>
                                                </table>
                                            </td>
                                          </tr>
                                          <tr>	
                                          	<td class="form_text" style="font-size:14px;font-family:arial">Verification Code:</td>
                                            <td><input type="text" name="captcha" id="captcha" /></td>
                                          </tr>
										
										<tr>
                                          	<td></td>
                                            <td><input type="image" src="images/submit.png" name="" style="border:none;"  /></td>
                                          </tr>
                                        </table>

                                    </form>
                                </td>
                              </tr>
					</table>