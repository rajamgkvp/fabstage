<?php
include('constants.php');
include('check_session.php');	
$sql = "select * from fs_job where fld_id='".$_REQUEST['id']."'";
$sql_run = q($sql);
$sql_fatch = f($sql_run);




if($_REQUEST['select_all']!=""){

	                for($j=0;$j<count($_REQUEST['cat']);$j++)
                       {
					   $check_val.=",";
                       $check_val.= $_REQUEST['cat'][$j];
                      // $check_val.=",";
                       }
			 //echo $check_val;

			 $value2 = explode(",", $check_val);
			 foreach ($value2 as &$select)
	{
			 //echo $select;
			$sql_update =  "UPDATE fs_applied_job SET status = 2 where job_id = '".$_REQUEST['id']."' AND talent_id = '".$select."'";
			$sql_update_run = q($sql_update);
	}
             
}



// unselect talent 
 if($_REQUEST['unselect_all']!=""){

	                for($j=0;$j<count($_REQUEST['cat1']);$j++)
                       {
					   $check_val.=",";
                       $check_val.= $_REQUEST['cat1'][$j];
                      // $check_val.=",";
                       }
			 //echo $check_val;

			 $value2 = explode(",", $check_val);
			 foreach ($value2 as &$select)
	{
			 //echo $select;
			$sql_update =  "UPDATE fs_applied_job SET status = 1 where job_id = '".$_REQUEST['id']."' AND talent_id = '".$select."'";
			$sql_update_run = q($sql_update);
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

  <style type="text/css">
	
	.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
	.text span{font-size:17px;}
	.button { width:auto; padding:0 10px; height:28px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px; height:28px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	 .text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:15px;color:#669966; text-transform:capitalize;}

</style>

<script type="text/javascript">
			var GB_ROOT_DIR = "greybox/";
		</script>

		<script type="text/javascript" src="greybox/AJS.js"></script>
		<script type="text/javascript" src="greybox/AJS_fx.js"></script>
		<script type="text/javascript" src="greybox/gb_scripts.js"></script>
		<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />



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
						
					   <!---finally selected condidates---->

						  <table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
							<tr>
								<td colspan="4" align="left" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Confirmed Talents
								</td>
							</tr>
							<tr>
								<td colspan="4">&nbsp;</td>
								
							</tr>

								  <? 
								 $job_list1 = "select * from fs_applied_job where job_id = '".$_REQUEST['id']."' AND company_id='".$_SESSION['fab_id']."' AND status=3" ;
								 $job_run1 = q($job_list1);
								 $job_number1 = nr($job_run1);
								 if($job_number1!=0){
									 $i=1;
								 while($job_fatch = f($job_run1)){

								 $select_talent = "select * from fs_mamber where fld_id = '".$job_fatch['talent_id']."'" ;
								 $run_talent = q($select_talent);
								 $fatch_talent = f($run_talent);
						 ?>

							<tr>
							  
							    <td width="3%"><?=$i?>)</td>
								<td ><?=$fatch_talent['name']?></td>
								<td ><a href="mailto:<?=$fatch_talent['email']?>"><?=$fatch_talent['email']?></a></td>
								<td><a href="view.php?id=<?=$rec_mem['fld_id']?>" title="Send Message" rel="gb_page_center[540, 520]" style="cursor: pointer;">Send Message</a></td>

								
							</tr>

							<?$i = $i+1;}  ?>
							
							
							
							
							<?}
							
							
							else{?>
								 <tr>
							          <td> <a>Talent List not found...</a></td>
								 </tr>
							<?}?>
							

						</table>









						<!--------selected talent---------->
						<form name="upload_form1" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
						<table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
							<tr>
								<td colspan="4" align="left" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Selected Talent
								</td>
							</tr>
							<tr>
								<td colspan="4">&nbsp;</td>
								
							</tr>

								  <? 
								 $job_list1 = "select * from fs_applied_job where job_id = '".$_REQUEST['id']."' AND company_id='".$_SESSION['fab_id']."' AND status=2" ;
								 $job_run1 = q($job_list1);
								 $job_number1 = nr($job_run1);
								 if($job_number1!=0){
									 $i=1;
								 while($job_fatch = f($job_run1)){

								 $select_talent = "select * from fs_mamber where fld_id = '".$job_fatch['talent_id']."'" ;
								 $run_talent = q($select_talent);
								 $fatch_talent = f($run_talent);
						 ?>

							   <tr>
							   <td width="3%"><input type="checkbox" name="cat1[]" id="cat1[]" value="<?=$fatch_talent['fld_id']?>"></td>
							    <td width="3%"><?=$i?>)</td>
								<td ><?=$fatch_talent['name']?></td>
								<td ><a href="mailto:<?=$fatch_talent['email']?>"><?=$fatch_talent['email']?></a></td>
								
							</tr>

							<?$i = $i+1;}  ?>
							
								 <tr>
							    <td colspan="4"> &nbsp;</td>
							</tr>
							<tr>
							    <td colspan="4"><input class="button" type="submit" name="unselect_all" id="unselect_all" value="Cancel Short Listed Talent"></td>
							</tr>
							
							
							<?}
							
							
							else{?>
								 <tr>
							          <td> <a>Talent List not found...</a></td>
								 </tr>
							<?}?>
							

						</table>
						</form>

						<form name="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
						<table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
							<tr>
							   
								<td colspan="4" align="left" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Applied Talent
								</td>
							</tr>
						 
							<tr>
							   <td colspan="4">&nbsp;</td>
							 
							</tr>
							
						 <? 
								 $job_list1 = "select * from fs_applied_job where job_id = '".$_REQUEST['id']."' AND company_id='".$_SESSION['fab_id']."' AND status=1" ;
								 $job_run1 = q($job_list1);
								 $job_number1 = nr($job_run1);
								 if($job_number1!=0){
									 $i=1;
								 while($job_fatch = f($job_run1)){

								 $select_talent = "select * from fs_mamber where fld_id = '".$job_fatch['talent_id']."'" ;
								 $run_talent = q($select_talent);
								 $fatch_talent = f($run_talent);
						 ?>

								


							<tr> 
							    <td width="3%"><input type="checkbox" name="cat[]" id="cat[]" value="<?=$fatch_talent['fld_id']?>"></td>
							    <td width="3%"><?=$i?>)</td>
								<td ><?=$fatch_talent['name']?></td>
								<td ><a href="mailto:<?=$fatch_talent['email']?>"><?=$fatch_talent['email']?></a></td>
								
							</tr>
							

							<?$i = $i+1;}	?>
							
							 <tr>
							    <td colspan="4"> &nbsp;</td>
							</tr>
							<tr>
							    <td colspan="4"><input class="button" type="submit" name="select_all" id="select_all" value="Shortlist Talent"></td>
							</tr>
							
							
							
							<?}else{?>
								 <tr>
							          <td> <a>Talent List not found...</a></td>
								 </tr>
							<?}?>
						</table>
					    </form>
						<table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
							<tr>
								<td colspan="2" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Favourite Talent
								</td>
							</tr>
							<tr>
								<td width="30%">&nbsp;</td>
								<td width="70%">&nbsp;</td>
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
