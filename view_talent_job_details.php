<?php
include('constants.php');
include('check_session.php');	
$sql = "select * from fs_job where fld_id='".$_REQUEST['id']."'";
$sql_run = q($sql);
$sql_fatch = f($sql_run);

?>

<style type="text/css">
	.button { width:auto; padding:0 10px 4px; height:28px; background:#6BC0F7; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px 4px; height:28px; background:#999999; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	.style1 { font-size:13px;}
	span { font-size:13px; line-height:25px;}
	td {font-size:13px; line-height:25px;}
	td a{font-size:13px; line-height:25px;}
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


		<?include('left_tab.php');?>

		<div id="main_container">
			
           <?include('top.php');?> 	
		<div>
			<div class="main_body_area">
				<div class="left_area">
				</div>
				<div class="center_body" style="width:800px;">

					 <?include('left_work_room.php');?>


					<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
						<tr>
							<td colspan="2" align="left" style="color:#fff; font-size:16px; font-weight:normal; background:#6BC0F7; height:30px; text-indent:10px; border:2px solid #fff;"> 
								<img src="images/details.gif" style="vertical-align:text-top; padding-right:5px;" />Job Details
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
								<?
									$sql1 = "select * from fs_mamber where fld_id='".$sql_fatch['company_id']."'";
									$sql_run1 = q($sql1);
									$sql_fatch1 = f($sql_run1);
								?>
									<a style="text-decoration:none;color:#603F3F;" href="<?=$sql_fatch['web_link']?>"><?=$sql_fatch1['name']?></a>
							</td>
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
