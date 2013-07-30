<?php
include('constants.php');
include('paging1.php'); 
if($_REQUEST['email']!='')										 

{
	$msg1='<span style="font-size:12px;font-family:arial;color:red"><b>Wrong Security Code.</b></span>';
	
   if ( $_SESSION['security_code'] == $_REQUEST['captcha']) 
	
	{
		         
					$sqls = "INSERT INTO fs_testimonials (name,email,mobile,comment,added_on)VALUES ('".$_REQUEST['nam']."','".$_REQUEST['email']."','".$_REQUEST['cont']."','".$_REQUEST['msg']."','".date('Y-m-d h:m:s')."') ";
					$ress = q($sqls);
					
															
			
     	
	
	    $msg1 = '<span style="font-size:12px;font-family:arial;color:#006633"><b>Testimonial Successully Send.</b></span>';

																				
	}

		
	

}


 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FabStage.Com</title>
	<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/slider.css" />

	<script type="text/javascript">
		var GB_ROOT_DIR = "greybox/";
	</script>

	<script type="text/javascript" src="greybox/AJS.js"></script>
	<script type="text/javascript" src="greybox/AJS_fx.js"></script>
	<script type="text/javascript" src="greybox/gb_scripts.js"></script>
	<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
    <link href="paging.css" rel="stylesheet" type="text/css" />



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



</head>

<body >
<?

if($_SESSION['fab_id']!=''){
     if($_SESSION['work_as']==1){
           include('left_tab.php');
     }else if($_SESSION['work_as']==2){
	       include('left_company_tab.php');
           }
     }
?>
<div id="main_container">	
<?include('top.php');?>

<div class="portfolio_left_area" style="margin:0px auto; width:1000px; float:none; padding-top:10px; clear:both;" >
            <div class="portfolio_headline">
                <ul>
                <li><a href="#" class="active">Profile</a></li>
                    <!-- <li><a href="#">Biography</a></li> -->
                    <li><a href="company_gallery.php">Gallery</a></li>
                    <li><a href="company_project.php">Work History</a></li>
                    <li><a href="company_contact.php">Contacts</a></li>
                </ul>
			</div>
			<div class="portfolio_name" style="clear:both;">
                <h1>Abbery Nettles</h1>
                <h2>Mum, Maharastra, India</h2>
			</div>
		</div>

		   <div class="clear"></div>

			<div>
				<div class="main_body_area">
					<div class="left_area">
					</div>

					<div class="center_body" style="width:1000px; background:#ededed; margin-left:0px; padding:0px;">
		
			<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center">

  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
    <table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%" valign="top" style="border-right:1px #fff solid;"><table width="94%" border="0" cellspacing="6" cellpadding="0" style="border-bottom:1px #c0c0c2 solid;">
      <tr>
                                    	<td colspan="2" bgcolor="#555555" style="font-size:17px; color:#fff; line-height:30px; padding-left:10px;">Contact Details</td>
                                   	</tr>
      <tr>
        <td class="register_headtext" style="padding-top:0px; text-transform:none;">&nbsp;</td>
        <td class="register_headtext" style="padding-top:0px; text-transform:none;">&nbsp;</td>
      </tr>
      <tr>
        <td width="40%" class="register_headtext" style="padding-top:0px; text-transform:none;"><strong>Address</strong></td>
        <td class="register_headtext" style="padding-top:0px; text-transform:none;">Noida, U.P. India</td>
      </tr>
      <tr>
        <td valign="top" class="register_headtext" style="padding-top:0px; text-transform:none;"><strong>Contact No.</strong></td>
        <td class="register_headtext" style="padding-top:0px; text-transform:none;">+91-9999999999,<br />
          +91-8888888888</td>
      </tr>
      <tr>
        <td class="register_headtext" style="padding-top:0px; text-transform:none;"><strong>Email</strong></td> 
        <td class="register_headtext" style="padding-top:0px; text-transform:none;">shkhatri@fabstage.com</td>
      </tr>
      <tr>
        <td class="register_headtext" style="padding-top:0px; text-transform:none;">&nbsp;</td>
        <td class="register_headtext" style="padding-top:0px; text-transform:none;">&nbsp;</td>
      </tr>
      </table>
      <table width="94%" border="0" cellspacing="6" cellpadding="0" style="border-top:1px #fff solid;">
        <tr>
          <td class="register_headtext" style="padding-top:0px; text-transform:none;">&nbsp;</td>
          <td class="register_headtext" style="padding-top:0px; text-transform:none;">&nbsp;</td>
        </tr>
        <tr>
          <td width="40%" class="register_headtext" style="padding-top:0px; text-transform:none;"><strong>Address</strong></td>
          <td class="register_headtext" style="padding-top:0px; text-transform:none;">Noida, U.P. India</td>
        </tr>
        <tr>
          <td valign="top" class="register_headtext" style="padding-top:0px; text-transform:none;"><strong>Contact No.</strong></td>
          <td class="register_headtext" style="padding-top:0px; text-transform:none;">+91-9999999999,<br />
            +91-8888888888</td>
        </tr>
        <tr>
          <td class="register_headtext" style="padding-top:0px; text-transform:none;"><strong>Email</strong></td>
          <td class="register_headtext" style="padding-top:0px; text-transform:none;">shkhatri@fabstage.com</td>
        </tr>
      </table></td>
    <td style="border-left:1px #c0c0c2 solid; padding-left:20px;">
    <form id="regform" name="regform" autocomplete="off" method="post" action="" onsubmit="return validateform();"> 
		<table width="100%" border="0" cellspacing="6" cellpadding="0">
        <?
			if($msg!='')
			{
		?>
        <tr>
		<td colspan="2"><?=$msg?></td>
		</tr>
        <?
		}	  
		?>
        
        <tr>
                                    	<td colspan="2" bgcolor="#4FBFE3" style="font-size:17px; color:#fff; line-height:30px; padding-left:10px;">SPECIFIC ENQUIRIES</td>
                                    </tr>
  <tr>
  <td class="register_headtext">Name</td>
    <td class="register_headtext"><input class="register_input" type="text" onblur="if(this.value=='') this.value='Name';" value="Name" onfocus="if(this.value=='Name') this.value='';" name="name" id="name" style="height:36px;"></td>

  </tr>
  <tr>
  <td class="register_headtext">Email</td>
    <td><input class="register_input" type="text" onblur="if(this.value=='') this.value='Email';" value="Email" onfocus="if(this.value=='Email') this.value='';" name="Email" id="Email" style="height:36px;"></td>

  </tr>
  <tr>
  <td class="register_headtext">Subject</td>
    <td valign="top"><input class="register_input" type="text" onblur="if(this.value=='') this.value='Subject';" value="Subject" onfocus="if(this.value=='Subject') this.value='';" name="Subject" id="Subject" style="height:36px; width:320px;"></td>
  </tr>
  <tr>
  <td class="register_headtext">Comments</td>
    <td valign="top"><textarea id="Comments" class="register_input" name="Comments" rows="2" cols="12" onblur="if(this.value=='') this.value='Comments';" onfocus="if(this.value=='Comments') this.value='';" style="height:75px; font-family:Arial, Helvetica, sans-serif; font-size:12px; padding-top:8px; width:320px;">Comments</textarea></td>

  </tr>
  
  <tr>
  	<td>&nbsp;</td>
    <td><input name="" type="button" value="Submit" class="register_create_ac" style="float:left; margin:0px;" /></td>
  </tr>

</table>
			    
	</form>
    </td>
  </tr>
   
</table>

<tr>
<td>&nbsp;</td>
</tr>


<tr>
<td>&nbsp;</td>
</tr>
    </td>
  </tr>
</table>

		
</div>
					
                    
				</div>
			</div>
			<div>
				<div class="footer_ads">
					<div class="footer_ads_area">
						<div class="footer_ads_left">
							<div class="slider">
								<div id="ei-slider" class="ei-slider">
									<ul class="ei-slider-large">
										<li><img src="images/footer_banner.png" /></li>
										<li><img src="images/footer_banner2.png" /></li>
										<li><img src="images/footer_banner3.png" /></li>
										<li><img src="images/footer_banner2.png" /></li>
										<li><img src="images/footer_banner4.png" /></li>
									</ul><!-- ei-slider-large -->
									<ul class="ei-slider-thumbs">
										<li class="ei-slider-element"></li>
										<li><a href="#">Deal of the day</a></li>
										<li><a href="#">Stationery</a></li>
										<li><a href="#">Perfumes</a></li>
										<li><a href="#">Appliances</a></li>
										<li><a href="#">IPL Kicks off</a></li>
									</ul><!-- ei-slider-thumbs -->
								</div><!-- ei-slider -->
							</div><!-- wrapper -->

							<script type="text/javascript" src="js/jquery.min.js"></script>
							<script type="text/javascript" src="js/jquery.eislideshow.js"></script>
							<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

							<script type="text/javascript">
								$.noConflict();
								jQuery(document).ready(function($) {
									$(function() {
										$('#ei-slider').eislideshow({
											animation			: 'center',
											autoplay			: true,
											slideshow_interval	: 3000,
											titlesFactor		: 0
										});
									});
								});
							</script>
						</div>
						<div class="footer_ads_right"><a href="#">
							<img src="images/ads_banner_girl.png" width="277" height="226" /></a>
						</div>
					</div>
				</div>
			</div>
			<?include('inner_footer.php');?>
        </div>
	</body>
</html>
