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
                            $limit2 = "ORDER BY fld_id DESC LIMIT 0,5";
                        }else if($_REQUEST['page'] > 1){
                            $off = ($_REQUEST['page']-1)*5;
                            $value = 5;
                            $limit2 = "ORDER BY fld_id DESC LIMIT ".$off.",".$value." ";
                        }
					
					
					$job_list = "Select * from fs_company_contact Where company_id = '".$_SESSION['fab_id']."' ".$limit2."";
					
			
					     
						 $job_run = q($job_list);
						
					?>
					<div class="center_body" style="width:835px;">
						<!-- INCLUDED FILE TO DISPLAY SIDE TAB ON CENTER TAB -->
					 <!-- <?include('left_work_room_company.php');?> -->
						<table width="100%"  border="0" align="center" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
							
					




							<?php
							$job_posted = nr($job_run);
							if($job_posted!=0){
							
							
							?>
							<tr>

								


							
				<td class="job_area">
                                
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
                        <td>
							 <div class="talent_result_area" style="border:none;">
							
                             <h1>Contact Details</h1>
										<table width="100%" border="0" cellspacing="6" cellpadding="0" style="clear:both;">
										 
										  <tr>
                                            <td valign="top" class="talent_result"><h1>Name</h1>    
                                            <td valign="top" class="talent_result"><h1>Address</h1> 
											<td valign="top" class="talent_result"><h1>Email</h1> 
										    <td valign="top" class="talent_result"><h1>Phone</h1> 
                                            <td valign="top" class="talent_result"><h1>URL</h1>
										  </tr>
										<?while($job_fatch = f($job_run)){?>
										      <tr>
											
												  <td valign="top" ><?=$job_fatch['name']?>    
                                                  <td valign="top" ><?=$job_fatch['address']?> 
											      <td valign="top" ><?=$job_fatch['email']?> 
										          <td valign="top" ><?=$job_fatch['phone']?>
                                                  <td valign="top"><?=$job_fatch['url']?>
												
											  </tr>

											  <?}?>
										   </table>
										   

                                     </div>
               </td>

							<!--------------->



			
	</tr>
							
			</table>

                                
                                </td>
							</tr>
							<?$x++;?>

                           <tr >
                                  <td colspan="3" align="center" height="10px" style="color: #B00000">
                                            <?
                                             $sqlag = "select * from fs_company_contact where company_id = '".$_SESSION['fab_id']."'";
                                       
                                                $rescs = q($sqlag);
                                                 $countcs = nr($rescs);
                                                if($countcs >5){
                                                    doPages(5, 'company_contact.php', '', $countcs); 
                                                }
                                            ?>
                                   </td>
                           </tr>

                       <?}else{?>
                                 <tr>
							          <td colspan="3"> <a> List not found...</a></td>
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
