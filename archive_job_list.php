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
</head>

<body>
	<!-- FILE TO DISPLAY SIDE TAB -->
	<?include('left_company_tab.php');?> 
	<div id="main_container">

		<?include('top.php');?> 
			<div>
				<div class="main_body_area">
					<div class="left_area">
					</div>
					<?php $job_list = "select * from fs_job where company_id = '".$_SESSION['fab_id']."' AND status = 3" ;
					     $job_run = q($job_list);
						 $i=1;
					?>
					<div class="center_body" style="width:800px;">
						<!-- INCLUDED FILE TO DISPLAY SIDE TAB ON CENTER TAB -->
					 <?include('left_work_room_company.php');?>
						<table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
							<tr>
								<td colspan="2" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Archive Jobs List
								</td>
							</tr>
							<?php 
							$fatchr = nr($job_run );
							if($fatchr!=0){
							while($job_fatch = f($job_run)){	  
							 $job_list1 = "select * from fs_applied_job where job_id = '".$job_fatch['fld_id']."'" ;
							 $job_run1 = q($job_list1);
							 $job_number1 = nr($job_run1);
							?>
							<tr>
								<td width="3%"><?=$i?>)</td><td width="60%" ><a style="text-decoration:none;color:#603F3F;" href="view_profile.php?id=<?=$job_fatch['fld_id']?>"><?=$job_fatch['title']?> </a></td>

								<td width="30%"><a href="view_profile.php?id=<?=$job_fatch['fld_id']?>">[<?=$job_number1?>]</a></td>
							</tr>
							<?$i = $i+1;}}else{?>
                                <tr>
								  <td>Result not found ...</td>
								</tr>

							<?}?>
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
