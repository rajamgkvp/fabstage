<?php
	include('constants.php');
	session_start();
	
	
if(isset($_REQUEST['wages']) && $_REQUEST['wages'] != ''){
	
		$sql_admin = "INSERT INTO fs_job_details(company_id,job_id, job_type, wages, wages_type, work_duration, work_duration_type, work_location,gender,experience,language,extra_skill,any_association,association_name,physical_preference,height,weight,measurement,ethenicity,eye,hair,body,skin,shoes,dress,look,added_on,updated_on)VALUES('".$_SESSION['fld_id']."','".$_REQUEST['id']."', '".$_REQUEST['job_type']."', '".$_REQUEST['wages']."', '".$_REQUEST['wages_type']."', '".$_REQUEST['work_duration']."', '".$_REQUEST['work_duration_type']."', '".$_REQUEST['work_location']."','".$_REQUEST['gender']."','".$_REQUEST['experience']."','".$_REQUEST['language']."','".$_REQUEST['extra_skill']."','".$_REQUEST['any_association']."', '".$_REQUEST['association_name']."','".$_REQUEST['physical_preference']."','".$_REQUEST['height']."','".$_REQUEST['weight']."','".$_REQUEST['measurement']."','".$_REQUEST['ethenicity']."','".$_REQUEST['eye']."','".$_REQUEST['hair']."','".$_REQUEST['body']."','".$_REQUEST['skin']."','".$_REQUEST['shoes']."','".$_REQUEST['dress']."','".$_REQUEST['look']."','".date('Y-m-d h:m:s')."','".date('Y-m-d h:m:s')."')";

		$res_admin = q($sql_admin);
		if($res_admin){
			$msg = '-  Added Successfully.';
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

	<!-- SCRIPT TO VALIDATE CONTROLS -->
	<script>
function validate(){

	var errText = "";
	var errorflag = false;
	
	if(document.upload_form.wages.value == ""){
		 errText += "- Please Enter wages\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.wages.focus();
		 return false;
	}
	if(document.upload_form.wages_type.value == ""){
		 errText += "- Please Enter Wages type\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.wages_type.focus();
		 return false;
	}

	if(document.upload_form.job_type.value == "contractual"){
		if(document.upload_form.work_duration.value == ""){
			 errText += "- Please Enter Work Duration\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.work_duration.focus();
			 return false;
		}
		if(document.upload_form.work_duration_type.value == ""){
			 errText += "- Please Enter Work Duration Type\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.work_duration_type.focus();
			 return false;
		}

	}

	if(document.upload_form.work_location.value == ""){
		 errText += "- Please Enter Work Location\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.work_location.focus();
		 return false;
	}
	if(document.upload_form.experience.value == ""){
		 errText += "- Please Enter Experience\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.experience.focus();
		 return false;
	}
	if(document.upload_form.language.value == ""){
		 errText += "- Please Enter Language\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.language.focus();
		 return false;
	}

	if(document.upload_form.extra_skill.value == ""){
		 errText += "- Please Enter Extra Skill\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.extra_skill.focus();
		 return false;
	}

	if(document.upload_form.any_association.value == "yes"){
				 if(document.upload_form.association_name.value == ""){
				 errText += "- Please Enter Association Name\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.association_name.focus();
				 return false;
			 }
	}

	if(document.upload_form.physical_preference.value == "yes"){
		
			  	 if(document.upload_form.height.value == ""){
				 errText += "- Please Enter Height\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.height.focus();
				 return false;
			     }

				 	 if(document.upload_form.weight.value == ""){
				 errText += "- Please Enter Weight\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.weight.focus();
				 return false;
			 }

			 	 if(document.upload_form.measurement.value == ""){
				 errText += "- Please Enter Measurement\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.measurement.focus();
				 return false;
			 }

			 	 if(document.upload_form.ethenicity.value == ""){
				 errText += "- Please Enter Ethenicity\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.ethenicity.focus();
				 return false;
			 }

			 	 if(document.upload_form.eye.value == ""){
				 errText += "- Please Enter Eye Color\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.eye.focus();
				 return false;
			 }

			 	 if(document.upload_form.hair.value == ""){
				 errText += "- Please Enter Hair Color\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.hair.focus();
				 return false;
			 }

			 	 if(document.upload_form.body.value == ""){
				 errText += "- Please Enter Body Type\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.body.focus();
				 return false;
			 }

			 	 if(document.upload_form.skin.value == ""){
				 errText += "- Please Enter Skin Color\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.skin.focus();
				 return false;
			 }

			 	 if(document.upload_form.shoes.value == ""){
				 errText += "- Please Enter Shoes Size\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.shoes.focus();
				 return false;
			 }

			 	 if(document.upload_form.dress.value == ""){
				 errText += "- Please Enter Dress Size\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.dress.focus();
				 return false;
			 }

			 	 if(document.upload_form.look.value == ""){
				 errText += "- Please Enter Look Like\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.look.focus();
				 return false;
			 }

	}

	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }
</script>
<script>

function job(){
			if(document.getElementById('job_type').value=='regular'){
					document.upload_form.work_duration.disabled = true;
					document.upload_form.work_duration_type.disabled = true;

	}else{
        document.upload_form.work_duration.disabled = false;
		document.upload_form.work_duration_type.disabled = false;

	}
}

  function endis(){
				

	if(document.getElementById('any_association').value=='no'){

		document.upload_form.association_name.disabled = true;

	}else{

		document.upload_form.association_name.disabled = false;

	}
}


function disable(){
	
	if(document.getElementById('physical_preference').value=='no'){
	
		document.upload_form.height.disabled = true;
		document.upload_form.weight.disabled = true;
		document.upload_form.measurement.disabled = true;
		document.upload_form.ethenicity.disabled = true;
		document.upload_form.eye.disabled = true;
		document.upload_form.hair.disabled = true;
		document.upload_form.body.disabled = true;
		document.upload_form.skin.disabled = true;
		document.upload_form.shoes.disabled = true;
		document.upload_form.dress.disabled = true;
		document.upload_form.look.disabled = true;

	}else{

		document.upload_form.height.disabled = false;
		document.upload_form.weight.disabled = false;
		document.upload_form.measurement.disabled = false;
		document.upload_form.ethenicity.disabled = false;
		document.upload_form.eye.disabled = false;
		document.upload_form.hair.disabled = false;
		document.upload_form.body.disabled = false;
		document.upload_form.skin.disabled = false;
		document.upload_form.shoes.disabled = false;
		document.upload_form.dress.disabled = false;
		document.upload_form.look.disabled = false;

	}
}



</script>
</head>

<body>
<div id="main_container">
	<div class="header_nav">
    	<div class="header_main">
        	<div class="header_logo"><img src="images/inside/fab_logo.png" /></div>
            <div class="head_nav">
            	<ul>
                	<li><a href="#">Home</a></li>          
                    <li><a href="#">Find Talent</a></li>
                    <li><a href="#">Companies & Agencies</a></li>
                    <li><a href="#">Jobs & Auditions</a></li>
                    <li><a href="#">Ask & Articles</a></li>
                    <li><a href="#">Market Place</a></li>
                    <li><a href="#">Gallery</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="search_area">
    	<div class="search_main">
        	<div class="talent_area">
                <link rel="stylesheet" href="css/index_002.css" media="screen and (min-width: 1200px)">
                <link type="text/css" rel="stylesheet" href="css/index_004.css">

				<script type="text/javascript" src="js/index.js"></script>
            	<div id="careersDropNav" style="padding-top:12px;">
                    <div class="rowElem">
                        <div style="z-index: 10; width: 251px;" class="jqTransformSelectWrapper">
                            <div>
                                <span style="width: 210px;">Talent</span><a href="#" class="jqTransformSelectOpen"></a>
                            </div>
                            <ul style="height: 155px; width: 249px; display: none;">
                                <li class="first"><a href="#">Talent</a></li>
                                <li><a href="#">Companies</a></li>
                                <li><a href="#">Agencies</a></li>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Auditions</a></li>
                            </ul>
                        </div>
                    </div>
                   </div>
            </div>
            <select name="" class="category_input">
            	<option>Category</option>
            </select>
            <select name="" class="category_input">
            	<option>Location</option>
            </select>
            <select name="" class="category_input">
            	<option>Experience</option>
            </select>
            <div class="gender">Gender:</div>
            <input name="" type="radio" value="" class="gender_radio" />
            <div class="gender">Male</div>
            <input name="" type="radio" value="" class="gender_radio" />
            <div class="gender">Female</div>
            <input name="" type="button" value="Search" class="search_btn" />
        </div>
    </div>
    
    <div>
    	<div class="main_body_area">
                        <div class="left_area">
                     
                        </div>
<div class="center_body" style="width:800px;">
		<form name="upload_form" action="" method="POST" onsubmit="return validate();" autocomplete="off">
			<table width="90%"  border="0" align="center" cellspacing="1" cellpadding="1">
				<tr>
					<td colspan="2" align="center" class="msg">
						<?=$msg?>
					</td>
				</tr>
				<tr>
					<td width="30%">&nbsp;</td>
					<td width="70%">&nbsp;</td>
			   </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Job Type</span></td>
						<td>
								<select id="job_type" name="job_type" onchange="job();">
											  <option value="regular">Regular</option>
											  <option value="contractual">Contractual</option>
											
								   </select>
						   </td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				   <tr>
					<td><span class="style1">*</span>&nbsp;<span>Wages</span></td>
					 <td><input class="input" name="wages" type="text" id="wages" size="48" ></td>
				  </tr>
				   <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				 <tr>
					<td><span class="style1">*</span>&nbsp;<span>Wages Type</span></td>
				   <td><input class="input" name="wages_type" type="text" id="wages_type" size="48" ></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td width="42%"><span class="style1">*</span>&nbsp;<span>Work Duration</span> </td>
					<td><input class="input" name="work_duration" type="text" id="work_duration" size="48" disabled></td>
				  </tr>
				 
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				 
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Work Duration Type</span></td>
					<td><input class="input" name="work_duration_type" value="" type="text" id="work_duration_type" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Work Location</span></td>
					<td><input class="input" name="work_location" value="" type="text" id="work_location" size="48" ></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				 <tr>
					<td><span class="style1"></span>&nbsp;<span>Gender</span></td>
					<td><select id="gender" name="gender">
								  <option value="male">Male</option>
								  <option value="female">Female</option>
								
					   </select>
					 </td>
				  </tr>
				 
					<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Experience</span></td>
					<td><input class="input" name="experience" value="" type="text" id="experience" size="48" ></td>
				  </tr>
				  
					 <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Language</span></td>
					<td><input class="input" name="language" value="" type="text" id="language" size="48" ></td>
				  </tr>
					<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Extra Skill</span></td>
					<td><input class="input" name="extra_skill" value="" type="text" id="extra_skill" size="48" ></td>
				  </tr>
				   <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Any Association</span></td>
					<td><select id="any_association" name="any_association" onchange="endis();">
								 
								  <option value="no">No</option>
								  <option value="yes">Yes</option>
								  
						   </select></td>
				  </tr> 
				 
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>

				   <tr>
					<td><span class="style1">*</span>&nbsp;<span>Association Name</span></td>
					<td><input class="input" disabled  name="association_name" value="" type="text" id="association_name" size="48" ></td>
				  </tr> 
				 
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				 
				  
				  <tr>
					<td><span class="style1"></span>&nbsp;<span>Physical Preference</span></td>
					<td>
						   <select id="physical_preference" name="physical_preference" onchange="disable();">
								 
								  <option value="no">No</option>
								  <option value="yes">Yes</option>
								  
						   </select>
					
					</td>
				  </tr>
				  
				   <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>


					<tr>
					<td><span class="style1">*</span>&nbsp;<span>Height</span></td>
					<td><input class="input" name="height" value="" type="text" id="height" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Weight</span></td>
					<td><input class="input" name="weight" value="" type="text" id="weight" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Measurement</span></td>
					<td><input class="input" name="measurement" value="" type="text" id="measurement" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Ethenicity</span></td>
					<td><input class="input" name="ethenicity" value="" type="text" id="ethenicity" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Eyes Color</span></td>
					<td><input class="input" name="eye" value="" type="text" id="eye" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Hair Color</span></td>
					<td><input class="input" name="hair" value="" type="text" id="hair" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Body Type</span></td>
					<td><input class="input" name="body" value="" type="text" id="body" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Skin Color</span></td>
					<td><input class="input" name="skin" value="" type="text" id="skin" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Shoes Size</span></td>
					<td><input class="input" name="shoes" value="" type="text" id="shoes" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Dress Size</span></td>
					<td><input class="input" name="dress" value="" type="text" id="dress" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Look Like</span></td>
					<td><input class="input" name="look" value="" type="text" id="look" size="48" disabled></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>




				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="submit" id="submit" value = "Next Step" name="Submit">
					</td>
				</tr>
				<tr>
					<td height="40px">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
		</form>
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
                
            <div class="footer_ads_right"><a href="#"><img src="images/ads_banner_girl.png" width="277" height="226" /></a></div>
          </div>
        </div>
    </div>
    
    <div class="footer_area">
    	<div class="footer_content">
        	<div class="footer_links">
            <h1>Home Links</h1>
            	<ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Find Talent</a></li>
                <li><a href="#">Companies & Agencies</a></li>
                <li><a href="#">Jobs & Auditions</a></li>
                <li><a href="#">Ask & Articles</a></li>
                <li><a href="#">Market Place</a></li>
                <li><a href="#">Gallery</a></li>
                </ul>
            </div>
            <div class="footer_links">
            <h1>Footer Links</h1>
            	<ul>
                <li><a href="#">Models</a></li>
				<li><a href="#">Agencies</a></li>
				<li><a href="#">Photographers</a></li>
				<li><a href="#">Castings</a></li>
				<li><a href="#">Membership</a></li>
				<li><a href="#">Blogs</a></li>
				<li><a href="#">Community</a></li>
                </ul>
            </div>
            <div class="footer_links">
            <h1>Important Links</h1>
            	<ul>
                <li><a href="#">About Us</a></li>
				<li><a href="#">Company Details</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">Privacy Policy</a></li>
				<li><a href="#">Trems of Use</a></li>
                </ul>
            </div>
            <div class="footer_links">
            <h1>Important Links</h1>
            	<ul>
                <li><a href="#">About Us</a></li>
				<li><a href="#">Company Details</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">Privacy Policy</a></li>
				<li><a href="#">Trems of Use</a></li>
                </ul>
            </div>
            
          <div class="follow_us">
            <h1>Follow Us</h1>
           	<a href="#"><img src="images/social_icon1.png" width="22" height="22" /></a>
            <a href="#"><img src="images/social_icon2.png" width="22" height="22" /></a>
            <a href="#"><img src="images/social_icon3.png" width="22" height="22" /></a>
            <a href="#"><img src="images/social_icon4.png" width="22" height="22" /></a>
            <a href="#"><img src="images/social_icon5.png" width="22" height="22" /></a>
            <a href="#"><img src="images/social_icon6.png" width="22" height="22" /></a>
            <a href="#"><img src="images/social_icon7.png" width="22" height="22" /></a>
            </div>
          <div class="follow_us" style="margin-top:25px;">
            <h2>In Cooperation with</h2>
           	<a href="#"><img src="images/footer_logo.png" /></a>
            <h3>@ 2013 - fabstage.com, All Rights reserved</h3>
          </div>
          <div class="contact_id">
          To Advertise with us contact: <a href="#">info@fabstage.com</a>
          </div>
        </div>
    </div>
    
    <div class="network_bg">
    	<div class="network_area">
        	<div class="network_text">TBSL Network</div>
            <ul>
            <li><A href="#">MagicBricks<br />
				<span>Real Estate in India</span></A></li>
                <li><A href="#">TimesJobs<br />
				<span>Job in India</span></A></li>
                <li><A href="#">MagicBricks<br />
				<span>Matrimonial India</span></A></li>
                <li><A href="#">Ads2Book<br />
				<span>Classified Print Ads</span></A></li>
                <li><A href="#">TCNext<br />
				<span>Internet Classifieds</span></A></li>
                <li style="background:none;"><A href="#">TechGig<br />
				<span>Jobs in IT Software & Hardware</span></A></li>
            </ul>
        </div>
    </div>
    
</div>
</body>
</html>
