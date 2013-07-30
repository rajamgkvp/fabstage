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
						<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
							<tr>
								<td colspan="2" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Match Jobs List
								</td>
							</tr>
						 <?php
						  $query1 = "select * from fs_talent where member_id='".$_SESSION['fab_id']."'";
		                  $run1 = q($query1);
		                  $count1 = nr($run1);
		                  $fatch1 = f($run1);
						 
						 $main_skill = $fatch1['main_skill'];
								    // echo "<br/>";
									 $main_skill = str_replace(',,',',', $main_skill);

									if($main_skill!='') {
		                             $skill = explode(",",$main_skill);
									 

		                             foreach ($skill as &$value) {
										// echo "<br/>";
										 $value;
									   if($value!=""){


				                      $sql_match = "SELECT DISTINCT fld_id	FROM fs_job WHERE main_skill LIKE '%".$value."%'"; 
									  $run_match = q($sql_match);
									  while($fatch_match = f($run_match)) {
									  
									  $array .=	$fatch_match['fld_id'];
									  $array.=",";
									  }

									   }

									 } 
								// echo $array ;


									  $dif_array = explode(",", $array);
									  $red_array = array_unique($dif_array);
									  $i =1;
								foreach ($red_array as &$value1) {
									//echo $value1;
									if($value1!="")	{
										$qls = "select * from fs_job where fld_id = '".$value1."'";
										$qls_run = q($qls);
										$qls_fatch = f($qls_run);
										
										$qls_comp = "select * from fs_mamber where fld_id = '".$qls_fatch['company_id']."'";
										$qls_run_comp = q($qls_comp);
										$qls_fatch_comp = f($qls_run_comp);

										$qls_comp_logo = "select * from fs_portfolio_logo where ex_id = '".$qls_fatch['company_id']."'";
										$qls_run_comp_logo = q($qls_comp_logo);
										$qls_fatch_comp_logo = f($qls_run_comp_logo);
									?>
							
							<tr>
								<td width="3%"><?=$i?>)</td><td width="60%" ><a style="text-decoration:none;color:#603F3F;" href="view_job_details.php?id=<?=$qls_fatch['fld_id']?>"><?=$qls_fatch['title']?> </a></td>

								<td width="30%"><?=$qls_fatch_comp['name']?></td>
							</tr>
							<?}
							$i = $i+1;}
							}?>
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
