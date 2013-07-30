<?php
include('constants.php');
include('check_session.php');	

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








</head>

<body onload="getCityList(<?=$_REQUEST['cat']?>);">
<?include('left_tab.php');?>
<div id="main_container">	
<?include('top.php');?>
		   

			<div>
				<div class="main_body_area">
					<div class="left_area">
					</div>

					<div class="center_body" style="width:800px;">
					<!-- INCLUDED FILE TO DISPLAY SIDE TAB ON CENTER TAB -->
					 <?include('left_work_room.php');?>
						
						<!----------talent search------------------------->
						<?if($_REQUEST['cat']==1){?>
						<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
							
							
							
							
							<tr>
								<td colspan="3" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Search Talent List
								</td>
							</tr>

							<tr>
								
								<td >&nbsp;</td>
								<td width="60%" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Name
								</td>
								<td  style="color:#cc0000;font-size:14px;font-weight:bold;">
									Email
								</td>
							</tr>

							<?
							 $location = explode(",",$_REQUEST['location']);
							 $quer = "select * from fs_talent where main_skill LIKE '%".$_REQUEST['category']."%' AND location!='' AND member_id != '".$_SESSION['fab_id']."' order by fld_id desc" ;
   	                         $quer_run = q($quer);
							 $f_count = nr($quer_run);
							 if($f_count!=0){
							 while($fatch = f($quer_run)){
							 	   $location1 = explode(",",$fatch['location']);
							 	  
									foreach ($location as &$value) {
									
										if (in_array($value,$location1)){
										
										   $search_result .= $fatch['member_id'];
										   $search_result .= ",";
										}


									}

							 } } else{
							 
							 	 echo " No Result Found";
							 }
							 //echo $search_result;
							 $i = 1;
							 $search_result_array = explode(",",$search_result);
							 $search_result_array_unique = array_unique($search_result_array);
							 foreach ($search_result_array_unique as &$final) {	
								// echo $final;
								  //$i =$i+1 ;
								   if($final!=""){
								$final_query = "select * from fs_mamber where fld_id = '".$final."'"; 
								$final_run = q($final_query); 
								$final_fatch = f($final_run);
								 
								 
								 ?>

								

						    <tr>
								<td width="3%"><?=$i?>)</td>
								<td width="60%" ><a style="text-decoration:none;color:#603F3F;" href="view_talent_information.php?talent_id=<?=$final_fatch['fld_id']?>"  title="Talent Information" rel="gb_page_center[650, 600]"><?=$final_fatch['name']?> </a></td>

								<td width="30%"><?=$final_fatch['email']?></td>
							</tr>




							<?}$i =$i+1; 
						   } ?>
						  
						</table>
						
						<?}?>
						
						<!-------------talent search end--------------------->
						<!----------------company search--------------------->
							
							
							<?if($_REQUEST['cat']==2){?>
							<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
							
							
							
							
							<tr>
								<td colspan="3" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Search Company List
								</td>
							</tr>

							<tr>
								
								<td >&nbsp;</td>
								<td width="60%" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Name
								</td>
								<td  style="color:#cc0000;font-size:14px;font-weight:bold;">
									Email
								</td>
							</tr>
							
							<?
							 $location = explode(",",$_REQUEST['location']);
							 $quer = "select * from fs_company where main_skill LIKE '%".$_REQUEST['category']."%' AND work_area!=''  order by fld_id desc" ;
   	                         $quer_run = q($quer);
							 while($fatch = f($quer_run)){
							 	   $location1 = explode(",",$fatch['work_area']);
							 	  	 
									foreach ($location as &$value) {
										 // echo $value;
										if (in_array($value,$location1)){
										
										   $search_result .= $fatch['member_id'];
										   $search_result .= ",";
										}


									}

							 }
							 //echo $search_result;
							 $i = 1;
							 $search_result_array = explode(",",$search_result);
							 $search_result_array_unique = array_unique($search_result_array);
							 foreach ($search_result_array_unique as &$final) {	
								// echo $final;
								   if($final!=""){
								$final_query = "select * from fs_mamber where fld_id = '".$final."'"; 
								$final_run = q($final_query); 
								$final_fatch = f($final_run);
								 
								 
								 ?>



						    <tr>
								<td width="3%"><?=$i?>)</td>
								<td width="60%" ><a style="text-decoration:none;color:#603F3F;" href=""><?=$final_fatch['name']?> </a></td>

								<td width="30%"><?=$final_fatch['email']?></td>
							</tr>




							<?}$i =$i+1; }
						    ?>
						  
						</table>
						<?}?>


					   <!----------------company search end------------------>
					   <!----------------search jobs------------------------->
					   <?if($_REQUEST['cat']==3){?>
					   <table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
							<tr>
								<td colspan="2" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Match Jobs List
								</td>
							</tr>
								<tr>
								
								<td >&nbsp;</td>
								<td width="60%" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Jobs
								</td>
								<td  style="color:#cc0000;font-size:14px;font-weight:bold;">
									Interview Date
								</td>
							</tr>
						
							 <?
						    $query_job = "select * from fs_job where main_skill LIKE '%".$_REQUEST['category']."%' AND (interview_country LIKE '%".$_REQUEST['location']."%' OR interview_state LIKE '%".$_REQUEST['location']."%' OR interview_city LIKE '%".$_REQUEST['location']."%') order by interview_city";	 
						 	$job_run = q($query_job);
							$i = 1;
							while($fatch_job = f($job_run)){
							 $member_fiend = "select name from fs_mamber where fld_id = '".$fatch_job['company_id']."' ";
							 $runnn = q($member_fiend);
							 $fatchhh = f($runnn);
							 ?>
							  

							<tr>
								<td width="3%"><?=$i?>)</td>
		<td width="60%" ><a style="text-decoration:none;color:#603F3F;"  target="_new"
								
			href="view_job_details.php?id=<?=$fatch_job['fld_id']?>"><?=$fatch_job['title']?> &nbsp;&nbsp;<?if($fatchhh['name']!=""){?>[<a style="color:#cc3366;"><?=$fatchhh['name']?></a>]<?}?> </a></td>

								<td width="30%"><?=$fatch_job['interview_date']?></td>
							</tr>





							
							<? $i = $i+1;} ?>
						 	
							 
						 





						
						</table>
						<?}?>
					   <!-----------------search job end---------------------->

					   <!----------------search audition------------------------->
					   <?if($_REQUEST['cat']==4){?>
					   <table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
							<tr>
								<td colspan="2" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Match Audition List
								</td>
							</tr>
								<tr>
								
								<td >&nbsp;</td>
								<td width="60%" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Auditions
								</td>
								<td  style="color:#cc0000;font-size:14px;font-weight:bold;">
									Posted Date
								</td>
							</tr>
						
							 <?
						    $query_job = "select * from fs_oudition where main_skill LIKE '%".$_REQUEST['category']."%' AND (interview_country LIKE '%".$_REQUEST['location']."%' OR interview_state LIKE '%".$_REQUEST['location']."%' OR interview_city LIKE '%".$_REQUEST['location']."%') order by interview_city";	 
						 	$job_run = q($query_job);
							$i = 1;
							while($fatch_job = f($job_run)){
							 $member_fiend = "select name from fs_mamber where fld_id = '".$fatch_job['company_id']."' ";
							 $runnn = q($member_fiend);
							 $fatchhh = f($runnn);
							 ?>
							  
									
							<tr>
								<td width="3%"><?=$i?>)</td>
		                        <td width="60%" ><a style="text-decoration:none;color:#603F3F;" target="_new"
								href="view_audation_details.php?id=<?=$fatch_job['fld_id']?>"><?=$fatch_job['title']?> &nbsp;&nbsp;<?if($fatchhh['name']!=""){?>[<a style="color:#cc3366;"><?=$fatchhh['name']?></a>]<?}?> </a></td>

								<td width="30%"><?=$fatch_job['added_on']?></td>
							</tr>





							
							<? $i = $i+1;} ?>
						 	
							 
						 





						
						</table>
						<?}?>
					   <!-----------------search audition end---------------------->







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
