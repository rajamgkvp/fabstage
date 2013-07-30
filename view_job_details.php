<?php
include('constants.php');
include('check_session.php');	
$sql = "select * from fs_job where fld_id='".$_REQUEST['id']."'";
$sql_run = q($sql);
$sql_fatch = f($sql_run);
?>

<!-- <script>
	function Inc111() {
		<?php
			$sql_apply = "select * from fs_applied_job where talent_id = '".$_SESSION['fab_id']."' AND job_id = '".$_REQUEST['id']."'";
			$run_apply = q($sql_apply);
			$num_apply = nr($run_apply);
			if($num_apply==0) {
				$job_insert = "insert into fs_applied_job(talent_id,job_id,company_id,added_on)values('".$_SESSION['fab_id']."','".$_REQUEST['id']."','".$sql_fatch['company_id']."','".date('Y-m-d h:m:s')."')";
				$job_run = q($job_insert);
				if($job_run) {
					$msg_job = "Submitted Successfully";
				}
			} else {
				$msg_job = "You has been allready applied this job ";
			}
		?>
		alert("<?=$msg_job?>");
	}
</script> -->



<script>
	function apply(job_id){
		
	window.location.href="apply_job.php?tab=1&job_id="+job_id;
	return true;
	
	}
</script>


<style type="text/css">
	.button { width:auto; padding:0 10px 4px; height:28px; background:#6BC0F7; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px 4px; height:28px; background:#999999; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	.style1 { font-size:11px;}
	span { font-size:12px; line-height:20px; font-weight:bold; padding-left:5px;}
	td {font-size:12px; line-height:20px;}
	td a{font-size:12px; line-height:20px;}
	.head{width:auto; float:left; background:#858585; padding:3px 10px; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#fff;}
</style>

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
	<!-- FILE TO DISPLAY SIDE TAB -->
	
	<?
	if($_SESSION['work_as']==1){
	  include('left_tab.php');
	}else if($_SESSION['work_as']==2){
	  include('left_company_tab.php');
	}
	?>



		<div id="main_container">
			
          <?include('top.php');?> 	
		<div>
			<div class="main_body_area">
				<div class="left_area">
				</div>
				<div class="center_body" style="width:800px;">
				<!-- INCLUDED FILE TO DISPLAY SIDE TAB ON CENTER TAB -->
				

                  <?
						if($_SESSION['work_as']==1){
						  include('left_work_room.php');
						}else if($_SESSION['work_as']==2){
						  include('left_work_room_company.php');
						}
	               ?>



					<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right; background:#F5F5F5;">
						<tr>
							<td  align="left" style="color:#666; font-size:30px; font-weight:normal; height:50px; font-family:'robotothin',Arial,Helvetica,sans-serif; text-indent:10px; border-bottom:1px #ccc solid;"> 
								Job Details
							</td>
							<td  align="left" style="color:#666; font-size:30px; font-weight:normal; height:50px; font-family:'robotothin',Arial,Helvetica,sans-serif; text-indent:10px; border-bottom:1px #ccc solid;"> 
							       <?
                                       if($_SESSION['work_as']==1){

									   $sql_apply = q("select * from fs_applied_job where talent_id = '".$_SESSION['fab_id']."' AND job_id = '".$_REQUEST['id']."'");
									   $sql_f = nr($sql_apply);
									   if($sql_f!=0){
								   ?>
                                        <div class="reject_btn"><i>[Applied]</i></div>
								   <?}}?>
							</td>
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
							<td >
								<span class="style1"></span>&nbsp;<span>Company Name</span> 
							</td>
							<td>
								 <?php
									 $sql1 = "select * from fs_mamber where fld_id='".$sql_fatch['company_id']."'";
									 $sql_run1 = q($sql1);
									 $sql_fatch1 = f($sql_run1);
								 ?>  
									 <a style="text-decoration:none;color:#603F3F;" href="<?=$sql_fatch['web_link']?>"><?=$sql_fatch1['name']?></a>
							</td>
						</tr>
                        
                        <tr>
                        	<td colspan="2">&nbsp;</td>
                        </tr>
                        
						<tr>
							<td colspan="2">
								<span class="head">Description</span> 
							</td>
						</tr>
                        <tr>
                        	<td colspan="2" style="color: #6E6E6E; padding-left: 14px; padding-right: 10px; text-align: justify;"><?=$sql_fatch['description']?></td>
                        </tr>
                        <tr>
                        	<td colspan="2">&nbsp;</td>
                        </tr>
						<tr>
							<td><span class="style1"></span>&nbsp;<span>Interview Venue</span></td>
							<td><?=$sql_fatch['interview_venue']?></td>
						</tr>
						<tr>
							<td><span class="style1"></span>&nbsp;<span>Interview Date</span></td>
							<td><?=$sql_fatch['interview_date']?></td>
						</tr>
						<tr>
							<td><span class="style1"></span>&nbsp;<span>Interview Time</span></td>
							<td><?=$sql_fatch['interview_time']?></td>
						</tr>
                        
                        <tr>
                        	<td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
							<td colspan="2">
								<span class="head">Contact</span> 
							</td>
						</tr>
                        
                        
						<tr>
							<td><span class="style1"></span>&nbsp;<span>Contact Person</span></td>
							<td> <?=$sql_fatch['contact_person']?>	</td>
						</tr>
						<tr>
							<td><span class="style1"></span>&nbsp;<span>Contact Number</span></td>
							<td>
								<?=$sql_fatch['contact_number']?>
								
							</td>
						</tr>
						<tr>
							<td>
								<span class="style1"></span>&nbsp;<span>Contact Email</span>
							</td>
							<td> <a href="mailto:<?=$sql_fatch['contact_email']?>"><?=$sql_fatch['contact_email']?></a>
								
							</td>
						</tr>
						<tr>
							<td>
								<span class="style1"></span>&nbsp;<span>Web Link</span>
							</td>
							<td>
								<a href="<?=$sql_fatch['web_link']?>"><?=$sql_fatch['web_link']?></a>
							</td>
						</tr>
						<tr>
							<td height="40px">&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</table>

					<!------jobs details---------->
					<?
						$sql_details = "select * from fs_job_details where job_id='".$sql_fatch['fld_id']."'";
						$sql_run_details = q($sql_details);
						$number = nr($sql_run_details);
						$i = 1;
						while($sql_fatch_details = f($sql_run_details)){
					?>
					<!-- Number Of jobs details <?=$number?> -->
					<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="float:right; background:#F5F5F5; margin-top:0px;">
					<tr>
						<td colspan="2" align="left" style="color:#fff; font-size:16px; font-weight:normal; background:#858585; height:30px; text-indent:10px;">
						<img src="images/details.gif" style="vertical-align:text-top; padding-right:5px;" /> Job Roles  <?if($number>1){?> [<?=$i?>]<?}?></td>
					</tr>
					<tr>
						<td width="30%">
							<span class="style1"></span>&nbsp;<span>Job Type</span>								</td>
						<td width="70%"> <?=$sql_fatch_details['job_type']?>								</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Wages</span>
						</td>
						<td> <?=$sql_fatch_details['wages']?>
							
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Wages Type</span>
						</td>
						<td> <?=$sql_fatch_details['wages_type']?>
							
						</td>
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
						<td>
							<span class="style1"></span>&nbsp;<span>Work Duration Type</span>
						</td>
						<td> <?=$sql_fatch_details['work_duration_type']?>
							
						</td>
					</tr>
					<?}?>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Work Location</span>
						</td>
						<td>
							<?=$sql_fatch_details['work_location']?>
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Work Location</span>
						</td>
						<td> <?=$sql_fatch_details['work_location']?>
							
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Gender</span>
						</td>
						<td> <?=$sql_fatch_details['gender']?>
							
						</td>
					</tr>
						<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Experience</span>
						</td>
						<td> <?=$sql_fatch_details['experience']?>
							
						</td>
					</tr>
						<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Language</span>
						</td>
						<td>
							<?=$sql_fatch_details['language']?>
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Extra Skill</span>
						</td>
						<td> <?=$sql_fatch_details['extra_skill']?>
							
						</td>
					</tr> 
					<?if($sql_fatch_details['any_association']!="no") {?>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Association Name</span>
						</td>
						<td>
							<?=$sql_fatch_details['association_name']?>
						</td>
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
						<td>
							<span class="style1"></span>&nbsp;<span>Weight</span>
						</td>
						<td> <?=$sql_fatch_details['weight']?>
							
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Measurement</span>
						</td>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="29%">BREAST/CHEST</td>
									<td width="14%">WAIST </td>
									<td width="65%">HIPS</td>
								</tr>
								<tr>
									<td width="29%"><?=$sql_fatch_details['bust_chest']?></td>
									<td width="14%"><?=$sql_fatch_details['waist']?></td>
									<td width="65%"><?=$sql_fatch_details['hips']?></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Ethenicity</span>
						</td>
						<td>
							<?=$sql_fatch_details['ethenicity']?>
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Eyes Color</span>
						</td>
						<td>
							<?=$sql_fatch_details['eye']?>
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Hair Color</span>
						</td>
						<td> <?=$sql_fatch_details['hair']?>
							
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Body Type</span>
						</td>
						<td> <?=$sql_fatch_details['body']?>
							
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Skin Color</span>
						</td>
						<td> <?=$sql_fatch_details['skin']?>
							
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Shoes Size</span>
						</td>
						<td> <?=$sql_fatch_details['shoes']?>
							
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Dress Size</span>
						</td>
						<td> <?=$sql_fatch_details['dress']?>
							
						</td>
					</tr>
					<tr>
						<td>
							<span class="style1"></span>&nbsp;<span>Look Like</span>
						</td>
						<td>
							<?=$sql_fatch_details['look']?>
						</td>
					</tr>
					<?} 
						if($_SESSION['work_as']==1){
                          
						   
						   $sql_apply = q("select * from fs_applied_job where talent_id = '".$_SESSION['fab_id']."' AND job_id = '".$_REQUEST['id']."'");
                           $sql_f = nr($sql_apply);
						   if($sql_f==0){
					
						?>
					<tr>
						<td colspan="2" align="right">
							<input class="reject_btn" type="button" name="apply" id="apply" onclick="apply(<?=$_REQUEST['id']?>)" value="Apply" style="width:100px;">
						</td>
					</tr>
					<?}else{?>
						
					<tr>
						<td colspan="2" align="left">
							<!-- <div class="reject_btn"><i><b>Applied</b></i></div> -->
						</td>
					</tr>
						
					<?	}
							
						}?>
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
			<div class="footer_ads_right">
				<a href="#"><img src="images/ads_banner_girl.png" width="277" height="226" /></a>
			</div>
		</div>
	</div>
</div>
<?include('inner_footer.php');?>
</div>
</body>
</html>
