<?php
include('constants.php');
include('check_session.php');	
$sql = "select * from fs_job where fld_id='".$_REQUEST['id']."'";
$sql_run = q($sql);
$sql_fatch = f($sql_run);


  function apply($id){
		   echo "rohit";
	 
	  
	/*  $sql_apply = "select * from fs_applied_job where talent_id = '".$_SESSION['fab_id']."' AND job_id = '".id."'";
	  $run_apply = q($sql_apply);
	  $num_apply = nr($run_apply);
	  if($num_apply==0){
	  
	   $job_insert = "insert into fs_applied_job(talent_id,job_id,added_on)values('".$_SESSION['fab_id']."','".id."','".date('Y-m-d h:m:s')."')";
	   $job_run = q($job_insert);
	   if($job_run){
	   	   $msg_job = "Submitted Successfully";
	   
	   }
	  }	*/


}

?>	
<script>
function echoHello(id)
{
 alert("<?php apply(id); ?>");
 }
</script>
		
	 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FabStage.Com</title>
	<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/slider.css" />

	
	
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
	
			
			
			
			
			
			
			
			
			
			
			<table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
				  <tr>
				        <td colspan="2" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">Job Details</td>
				  </tr>
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
					<td>
						<span class="style1"></span>&nbsp;<span>Job Title</span>
					</td>
					<td>
						<?=$sql_fatch['title']?>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			   <tr>
					<td >
						<span class="style1"></span>&nbsp;<span>Company Name</span> 
					</td>
					<td>
					     <?
						     $sql1 = "select * from fs_mamber where fld_id='".$sql_fatch['company_id']."'";
                             $sql_run1 = q($sql1);
                             $sql_fatch1 = f($sql_run1);

							 
						 ?>  
						 	 <a style="text-decoration:none;color:#603F3F;" href="<?=$sql_fatch['web_link']?>"><?=$sql_fatch1['name']?></a>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>


				<tr>
					<td >
						<span class="style1"></span>&nbsp;<span>Description</span> 
					</td>
					<td >
						 <?=$sql_fatch['description']?>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				 
				<tr>
					<td><span class="style1"></span>&nbsp;<span>Interview Venue</span></td>
					<td><?=$sql_fatch['interview_venue']?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><span class="style1"></span>&nbsp;<span>Interview Date</span></td>
					<td><?=$sql_fatch['interview_date']?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><span class="style1"></span>&nbsp;<span>Interview Time</span></td>
					<td><?=$sql_fatch['interview_time']?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><span class="style1"></span>&nbsp;<span>Contact Person</span></td>
					<td> <?=$sql_fatch['contact_person']?>	</td>
						
					
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><span class="style1"></span>&nbsp;<span>Contact Number</span></td>
					<td>
					    <?=$sql_fatch['contact_number']?>
						
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<span class="style1"></span>&nbsp;<span>Contact Email</span>
					</td>
					<td> <a href="mailto:<?=$sql_fatch['contact_email']?>"><?=$sql_fatch['contact_email']?></a>
						
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<span class="style1"></span>&nbsp;<span>Web Link</span>
					</td>
					<td> <a href="<?=$sql_fatch['web_link']?>"><?=$sql_fatch['web_link']?></a>
						
					</td>
				</tr> 
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td height="40px">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>

			<!------jobs details---------->
				         <?
						     $sql_details = "select * from fs_job_details where fld_id='".$sql_fatch['company_id']."'";
                             $sql_run_details = q($sql_details);
							 $number = nr($sql_run_details);
							
							 $i = 1;
							
                            while($sql_fatch_details = f($sql_run_details)){

							 
						 ?>  
						 <!-- Number Of jobs details <?=$number?> -->
		<table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
		    <tr>
				<td colspan="2" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">Job Roles  <?if($number>1){?> [<?=$i?>]<?}?></td>
			 </tr>
							
							<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Job Type</span>
								</td>
								<td> <?=$sql_fatch_details['job_type']?>
									
								</td>
							</tr> 
							<tr>
									<td width="30%">&nbsp;</td>
									<td width="70%">&nbsp;</td>
				            </tr>
							<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Wages</span>
								</td>
								<td> <?=$sql_fatch_details['wages']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Wages Type</span>
								</td>
								<td> <?=$sql_fatch_details['wages_type']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							  <?
							      if($sql_fatch_details['job_type']!="regular"){
							  ?>

							<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Work Duration</span>
								</td>
								<td> <?=$sql_fatch_details['work_duration']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
								<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Work Duration Type</span>
								</td>
								<td> <?=$sql_fatch_details['work_duration_type']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<?}?>


				          			<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Work Location</span>
								</td>
								<td> <?=$sql_fatch_details['work_location']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

								<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Work Location</span>
								</td>
								<td> <?=$sql_fatch_details['work_location']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

								<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Gender</span>
								</td>
								<td> <?=$sql_fatch_details['gender']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
								<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Experience</span>
								</td>
								<td> <?=$sql_fatch_details['experience']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
								<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Language</span>
								</td>
								<td> <?=$sql_fatch_details['language']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Extra Skill</span>
								</td>
								<td> <?=$sql_fatch_details['extra_skill']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							   <?
							      if($sql_fatch_details['any_association']!="no"){
							  ?>

							<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Association Name</span>
								</td>
								<td> <?=$sql_fatch_details['association_name']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<?}
							   
							      if($sql_fatch_details['physical_preference']!="no"){
							  ?>
								

							<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Height</span>
								</td>
								<td> <?=$sql_fatch_details['height']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

								<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Weight</span>
								</td>
								<td> <?=$sql_fatch_details['weight']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

								<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Measurement</span>
								</td>
								<td> 
									 BREAST/CHEST &nbsp;&nbsp; WAIST &nbsp;&nbsp; HIPS
								</td>
							</tr> 
							<tr>
								<td>
									<span class="style1"></span>&nbsp;<span></span>
								</td>
								<td> <?=$sql_fatch_details['bust_chest']?>&nbsp;&nbsp;<?=$sql_fatch_details['waist']?>&nbsp;&nbsp;<?=$sql_fatch_details['hips']?>
									
								</td>
							</tr> 

							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

								<tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Ethenicity</span>
								</td>
								<td> <?=$sql_fatch_details['ethenicity']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							 <tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Eyes Color</span>
								</td>
								<td> <?=$sql_fatch_details['eye']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
								 <tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Hair Color</span>
								</td>
								<td> <?=$sql_fatch_details['hair']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
								 <tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Body Type</span>
								</td>
								<td> <?=$sql_fatch_details['body']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

								 <tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Skin Color</span>
								</td>
								<td> <?=$sql_fatch_details['skin']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

								 <tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Shoes Size</span>
								</td>
								<td> <?=$sql_fatch_details['shoes']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

								 <tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Dress Size</span>
								</td>
								<td> <?=$sql_fatch_details['dress']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

								 <tr>
								<td>
									<span class="style1"></span>&nbsp;<span>Look Like</span>
								</td>
								<td> <?=$sql_fatch_details['look']?>
									
								</td>
							</tr> 
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							
							



						 <?}?>
						 <tr>
								
								<td><input type="button" name="apply" id="apply" onclick="echoHello(<?=$sql_fatch_details['fld_id']?>)"    value="Apply For This Role"></td> <td>&nbsp;</td>
								 
							</tr>

					</table>

					<?$i=$i+1;}?>
			<!------Jobs details end------>
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
