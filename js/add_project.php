<?php
include('constants.php');
include('check_session.php');
    
	
	
$id = $_SESSION['fab_id'];


     
	  if($_REQUEST['pro_title']!=""){
		
			

    $sql_check = "select * from fs_talent_project where project_title='".$_REQUEST['pro_title']."'";
	$check_run = q($sql_check);
	$check_num = nr($check_run);


       if($check_num==0){
				
				for($j=0;$j<count($_REQUEST['cat']);$j++) {
					//$check_val.=",";
					$check_val.= $_REQUEST['cat'][$j];
					$check_val.=",";
				}
      
          
		
	   
        
	

						
			$sql1 = "INSERT INTO fs_talent_project (talent_id,skill,project_title,month_year,description, added_on) VALUES ('".$id."','".$check_val."', '".$_REQUEST['pro_title']."','".$_REQUEST['month']."', '".$_REQUEST['des']."',  '".date('Y-m-d h:i:s')."')";


				$sql = q($sql1);
				if($sql){
					$msg1 = ' Project has been Added Successfully.';
				}
			
           
           //GET LAST INSERTED ID
				$query = "SELECT LAST_INSERT_ID()";
				$result = q($query);
				if ($result) {
					$nrows = nr($result);
					$row = mysql_fetch_row($result);
					$mid = $row[0];
					$userid = $mid;
				}

            $update_query = "UPDATE fs_project_portfolio SET project_id = '".$userid."' WHERE talent_id = '".$id."' AND project_id = 0 ";
            $run_quer = q($update_query);              

           


	  }else{
	         $msg1 = ' Project title is already exists please enter another project title.';
	  }



									
 }


require_once "project_uploader_image/phpuploader/include_phpuploader.php" ?>



<style type="text/css">
	.button { width:auto; padding:0 10px 4px; height:28px; background:#6BC0F7; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px 4px; height:28px; background:#999999; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	.style1 { font-size:13px;}
	span { font-size:13px; line-height:25px;}
	td {font-size:13px; line-height:25px;}
	td a{font-size:13px; line-height:25px;}
	input [type="checkbox"]{ vertical-align:sub;}
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	 


		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>FabStage.Com</title>
		<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />
   
<script>
function validate(){

	var errText = "";
	var errorflag = false;


	if(document.upload_form.pro_title.value == "" ){
		 errText = "- Please Enter Project title.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.pro_title.focus();
		 return false;
	}
	
	if(document.upload_form.month.value == "" ){
		 errText = "- Please Enter Project month Duration.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.month.focus();
		 return false;
	}	

	if(document.upload_form.des.value == "" ){
		 errText = "- Please Enter Project Description.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.des.focus();
		 return false;
	}


/*	if(document.upload_form.video1.value == "" ){
		 errText = "- Please Enter Video."+i;
		 alert(errText);
		 errorflag = true;
		 document.upload_form.video1.focus();
		 return false;
		}


if(document.upload_form.video.value != "" ){

  var v = document.upload_form.video.value ;
  var i;
      for(i=1;i<=v;i++){

		if(document.upload_form.video1.value == "" ){
		 errText = "- Please Enter Video."+i;
		 alert(errText);
		 errorflag = true;
		 document.upload_form.video1.focus();
		 return false;
		}


	  }


	}*/


	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }


</script>

<script>


 //GET A QUOTE VALUE
/* function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    } 





//DISPLAY FORM TO FETCH PASSENGER INFO
/*	function getform() {	
									
			var strURL='getform1.php?pno='+encodeURI(document.getElementById('video').value);
			//alert(strURL);
			var req = getXMLHTTP();
			if (req) {
			document.getElementById('statuscat1').innerHTML='<img src="../images/ld.gif">';	
			req.onreadystatechange = function() {
			if (req.readyState == 4) {
			// only if "ok"
		    if (req.status == 200) {
														
			document.getElementById('statuscat1').innerHTML=req.responseText;						
			} else {
			alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}
</script>


<!---------------------->
 <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script> 
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>  -->
<style type="text/css">
	div{
		padding:8px;
	}
</style>



<script type="text/javascript">
 
$(document).ready(function(){
 
    var counter = 2;
 
    $("#addButton").click(function () {
 
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
 
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
 
	newTextBoxDiv.after().html('<label>Textbox #'+ counter + ' : </label>' +
	      '<input type="text" name="textbox' + counter + 
	      '" id="textbox' + counter + '" value="" >');
 
	newTextBoxDiv.appendTo("#TextBoxesGroup");
 
 
	counter++;
     });
 
     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
 
	counter--;
 
        $("#TextBoxDiv" + counter).remove();
 
     });
 
     $("#getButtonValue").click(function () {
 
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
  });
</script>

<!------------------>

	</head>

	<body >


		<?include('left_tab.php');?>

		<div id="main_container">
			<div class="header_nav">
				<div class="header_main">
					<div class="header_logo">
						<img src="images/inside/fab_logo.png" />
					</div>
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
										<span style="width: 210px;">Talent</span>
										<a href="#" class="jqTransformSelectOpen"></a>
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

					 <?include('inner_tab.php');?>


					<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
						
						
						<tr>
                             <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
                        </tr>
						
						
						<tr>
							<td colspan="2" align="left" style="color:#fff; font-size:16px; font-weight:normal; background:#6BC0F7; height:30px; text-indent:10px; border:2px solid #fff;"> 
								<img src="images/details.gif" style="vertical-align:text-top; padding-right:5px;" />Add Project
							</td>
						</tr>




 <tr>
    <td colspan="2" height="1">
						 

	<form enctype="multipart/form-data" onSubmit="return validate();" name="upload_form" id="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
			
	

	<!-- <table width="80%"  border="0" align="center" cellspacing="1" cellpadding="1"> -->
		<?php

		   $sql = "select * from fs_talent where member_id = '".$_SESSION['fab_id']."' ";
		   $res = q($sql);	
			while($fatch = f($res)){ 
			   $skill = $fatch['main_skill'];
			   $main_skill = str_replace(',,',',', $skill);
			    $skill = explode(",",$main_skill);
				$i=0; ?>
				<table width="100%"  border="0" align="center" cellspacing="0" cellpadding="0">
					
					
					 <tr>
	                        <td colspan="3"><span class="style1">*</span>&nbsp;<span>Select Skills</span> </td>
	                 </tr>
					<tr align="center">
					<?foreach ($skill as &$value) {
						if($value!=""){	  
							
							if($i%3==0){
							 echo "</tr><tr>";
							
							}
							?>
					
						<td  align="left" style="font-size:12px;padding-left:50px;"><input type="checkbox" name="cat[]" id="cat[]" value="<?=$value?>"> <?=$value?> </td>





					
		
					<?$i=$i+1;}
					
					}?>

					  
					 </tr>
					
					<tr><td colspan="3"><div class="border" style="margin:5px 0 0;"></div></td></tr>
				</table>

					<?} ?>
           				
				
           </td>
		 </tr>

			
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr> 
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Project Title</span> </td>
					<td><input name="pro_title" type="text" value="" id="pro_title" size="60" >
					</td>
			  </tr>
		      <tr>
					<td colspan="2" height="8"></td>
			  </tr> 
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Month/Year</span> </td>
					<td><input name="month" type="text" value="" id="month" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Description</span> </td>
					<td>
					   <textarea id="des" name="des" rows="4" cols="47"></textarea>
					</td>


 <tr>
					<td colspan="2" align="center">
						&nbsp;
					</td>
				</tr>

                

<tr><td colspan="2" align="center">
 <div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">
		<label>Textbox #1 : </label><input type='textbox' id='textbox1' >
	</div>
</div>
<input type='button' value='Add Button' id='addButton'>
<input type='button' value='Remove Button' id='removeButton'>
<input type='button' value='Get TextBox Value' id='getButtonValue'>

</td></tr>


			   
			    <!-- <tr>
					<td width="150px"><span class="style1"></span>&nbsp;<span>Video Link</span> </td>
					<td>
					  	 <!-- <input name="video" type="text" value="" id="video" size="60" > -->

                     <!--   <select id="video" name="video" onChange="getform();">
						      <option value="">-- Select Number Of Videos --</option>
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
                              <option value="4">4</option>
							  <option value="5">5</option>
							  <option value="6">6</option>
							  <option value="7">7</option>
							  <option value="8">8</option>
                              <option value="9">9</option>
							  <option value="10">10</option>
						</select>

					</td>
			  </tr>
              <tr>
			           <td colspan="2">  <span id='statuscat1'></span></td>
              </tr>  -->




			  </tr>
				   <tr>
					<td colspan="2" height="8"></td>
			  </tr>

			  
				
		
			     <tr>
					<td width="150px"><span class="style1"></span>&nbsp;<span>Select Image/Audio</span> </td>
					<td>
					  	 <?php
								$uploader=new PhpUploader();
								
								$uploader->MultipleFilesUpload=true;
								$uploader->InsertText=" Select Image/Audio ";
								
								$uploader->MaxSizeKB=1024000;
								$uploader->AllowedFileExtensions="*.jpg,*.png,*.gif,*.bmp,*.txt,*.mp3,*.wav";
								
								$uploader->SaveDirectory="project_uploader_image/savefiles";
								
								$uploader->FlashUploadMode="Partial";
								
								$uploader->Render();
		
	                    ?>
					   <script type='text/javascript'>
												function CuteWebUI_AjaxUploader_OnTaskComplete(task)
												{
													var div=document.createElement("DIV");
													var link=document.createElement("A");
													link.setAttribute("href","savefiles/"+task.FileName);




													//link.innerHTML="uploader/savefiles/"+task.FileName;
													

													link.target="_blank";
													div.appendChild(link);
													document.body.appendChild(div);
												}

	                   </script>
					</td>
			  </tr>



			  
			   <tr>
					<td colspan="2" align="center">
						&nbsp;
					</td>
				</tr>

			 <tr>
					<td colspan="2" align="center">
						<input type="submit" id="submit"  name="submit" value="Create" class="button">
					</td>
				</tr>
		
			
		</form>


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
			<div class="footer_ads_right">
				<a href="#"><img src="images/ads_banner_girl.png" width="277" height="226" /></a>
			</div>
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
