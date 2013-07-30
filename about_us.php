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
		   

			<div>
				<div class="main_body_area">
					<div class="left_area">
					</div>

					<div class="center_body" style="width:800px;">
				
					 
						
						<!----------talent search------------------------->
					
						<table class="center_body" style="width:760px"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
							
							
						<?
						  $select_aboutus = f(q("select * from fs_about_us where fld_id = 1"));
						?>	
							
							<tr>
								<td  style="font-size:16px;font-weight:bold;font-family:arial;color:#3B8EBA">
									<?=$select_aboutus['title']?>
								</td>
							</tr>
                            <tr>
								<td style="color:#cc0000;font-size:14px;font-weight:bold;">&nbsp;
									
								</td>
							</tr>
                             <tr>
								<td style="color:#cc0000;font-size:14px;font-weight:bold;">
									<?=$select_aboutus['description']?>
								</td>
							</tr>

							
             




</table>








						
						
						
						
					



					</div>
					<div class="right_ads">
						<img src="images/ads.jpg" />
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
