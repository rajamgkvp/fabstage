<?php
include('constants.php');
include('check_session.php');
include('paging1.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FabStage.Com</title>
	<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/slider.css" />
    <link href="paging.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
		.text span{font-size:17px;}
		.button { width:auto; padding:0 10px 4px; height:24px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; margin-bottom:5px;}
		.button a { color:#fff; text-decoration:none;}
		.button:hover { width:auto; padding:0 10px 4px; height:24px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
		.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
		.text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:15px;color:#669966; text-transform:capitalize;}

		.button1 { width:auto; padding:0 10px; height:23px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; margin-bottom:5px;}
		.button1 a { color:#fff; text-decoration:none;}
		.button1:hover { width:auto; padding:0 10px; height:23px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
		.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
		.text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:15px;color:#669966; text-transform:capitalize;}
	</style>
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
					  <?php 
					    if($_REQUEST['page'] == '' || $_REQUEST['page'] == 1){
                            $limit2 = "ORDER BY fld_id DESC LIMIT 0,10";
                        }else if($_REQUEST['page'] > 1){
                            $off = ($_REQUEST['page']-1)*10;
                            $value = 10;
                            $limit2 = "ORDER BY fld_id DESC LIMIT ".$off.",".$value." ";
                        }
					   
					  $job_list = "select * from fs_oudition where company_id = '".$_SESSION['fab_id']."' AND status = 1 ". $limit2."" ;
					     $job_run = q($job_list);
						 $i=1;
					  ?>
					<div class="center_body" style="width:800px;">
					<!-- INCLUDED FILE TO DISPLAY SIDE TAB ON CENTER TAB -->
					 <?include('left_work_room_company.php');?>
						<table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
								<tr>
                            	<td colspan="3" style="padding-bottom:5px;">
                                <div class="jobs_tabing">
                                	<ul>
                                    	<li><a href="posted_job.php?tab=1" >Jobs</a></li>
                                        <li><a href="posted_audition.php?tab=1" class="active">Auditions</a></li>
                                    </ul>
                                </div>
                                </td>
                            </tr>
							<? 
							$job_posted = nr($job_run);
							if($job_posted!=0){
							while($job_fatch = f($job_run)){	  
						 $job_list1 = "select * from fs_applied_audation where audation_id = '".$job_fatch['fld_id']."'" ;
					     $job_run1 = q($job_list1);
						 $job_number1 = nr($job_run1);
							?>
							<tr>




								<!-- <td width="3%"><?=$i?>)</td><td width="60%" ><a style="text-decoration:none;color:#603F3F;" href="view_audation_profile.php?id=<?=$job_fatch['fld_id']?>"><?=$job_fatch['title']?> </a></td> -->

								
								 <!------------------>
								 			
				<td class="job_area">
                                
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
                        <td>
							 <div class="talent_result_area" style="border:none;">
							 <?php 
									/*$title_query = q("SELECT * FROM fs_job WHERE fld_id='".$job_result['job_id']."'");
									$job_fatch = f($title_query);*/
                                    
									$fatch_company_info = f(q("SELECT * FROM fs_mamber WHERE fld_id='".$job_fatch['company_id']."'"));
									
 
							?>
                             <h1><a href="view_audation_profile.php?id=<?=$job_fatch['fld_id']?>"><?=$job_fatch['title']?></a></h1>
										<table width="100%" border="0" cellspacing="0" cellpadding="0" style="clear:both;">
										  <tr>
											
											<?if($fatch_company_info['profile_crop_image']!=null){?>
											<td valign="top" width="70"><img src="<?=$fatch_company_info['profile_crop_image']?>" width="60" height="60" /></td>
											 <?}else{?>
											<td valign="top" width="70"><img src="newhome/images/images.jpg" width="60" height="60" /></td>
											<?}?>
											<td valign="top" class="talent_result"><h1><a href="view_audation_profile.php?id=<?=$job_fatch['fld_id']?>"><?=$fatch_company_info['name']?></a></h1>
											  <p><strong>Location:</strong> <?=$job_fatch['interview_city']?>,<?=$job_fatch['interview_state']?>,<?=$job_fatch['interview_country']?></p>
											  <p><strong>Skills:</strong> <?=$job_fatch['main_skill']?></p>
											  
											  <p>
											   
											    <!-- <strong>Applied Talent :</strong> <a href="view_profile.php?id=<?=$job_fatch['fld_id']?>">[<?=$job_number1?>]</a>  -->
											  
											  </p>
											  
											  
											  
											  
											  </td>
										   






											</tr>
										   </table>

                                     </div>
               </td>

							<!--------------->
								
								
								
								
								
								
								
								
								
								
								
								<td width="30%"><a href="view_audation_profile.php?id=<?=$job_fatch['fld_id']?>">[<?=$job_number1?>]</a></td>






							</tr>
							</table>

                                
                                </td>
							</tr>
							<?}$x++;?>

                               <tr >
                                  <td colspan="3" align="center" height="10px" style="color: #B00000">
                                            <?
                                             $sqlag = "select * from fs_oudition where company_id = '".$_SESSION['fab_id']."' AND status = 1";
                                       
                                                $rescs = q($sqlag);
                                                 $countcs = nr($rescs);
                                                if($countcs >10){
                                                    doPages(10, 'posted_audition.php', '', $countcs); 
                                                }
                                            ?>
                                   </td>
                           </tr>
						     <?}else{?>
                                 <tr>
							          <td colspan="3"> <a>Talent List not found...</a></td>
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
