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

<script type="text/javascript">
	function getConfirmation(j_id,t_id){
		var retVal = confirm("Are you intrested ?");
		if(retVal == true ){
			window.location.href="change_status.php?jobid="+j_id+"&talentid="+t_id;
			return true;
		}else{
			alert("Thank You");
			return false;
		}
	}
</script> 
<!-- sCRIPT TO DISPLAY GRAYBOX -->
<script type="text/javascript">
	var GB_ROOT_DIR = "greybox/";
</script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
<!-- sCRIPT TO DISPLAY GRAYBOX -->

</head>

<body>
	<!-- FILE TO DISPLAY SIDE TAB -->
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
                            	<td colspan="3" style="padding-bottom:5px;">
                                <div class="jobs_tabing">
                                	<ul>
                                    	<li><a href="selected_job_list.php?tab=7" class="active">Jobs</a></li>
                                        <li><a href="selected_audition_list.php?tab=7" >Auditions</a></li>
                                    </ul>
                                </div>
                                </td>
                        </tr>
						
								<?php


									$job_query = q("SELECT * FROM fs_applied_job WHERE talent_id='".$_SESSION['fab_id']."' AND status=3");
								
								
								
								$job_number1 = nr($job_query);
								if($job_number1!=0) {
									 $count=1;
									while($job_result = f($job_query)) {


								?>
                              <td class="job_area">
                                
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr>
                                



								 <td width="5%"></td>
								

                            <!------------------>
                             <td >
							 <div class="talent_result_area" style="border:none;">
							 <?php 
                                    
							        

									$title_query = q("SELECT * FROM fs_job WHERE fld_id='".$job_result['job_id']."'");
									$title_res = f($title_query);
                                    
									$fatch_company_info = f(q("SELECT * FROM fs_mamber WHERE fld_id='".$title_res['company_id']."'"));
									
 
							?>
                        <h1><a href="view_job_details.php?id=<?=$title_res['fld_id']?>"><?=$title_res['title']?></a></h1>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="clear:both;">
                          <tr>
                          	<?if($fatch_company_info['profile_crop_image']!=null){?>
							<td valign="top" width="70"><img src="<?=$fatch_company_info['profile_crop_image']?>" width="60" height="60" /></td>
                             <?}else{?>
                            <td valign="top" width="70"><img src="newhome/images/images.jpg" width="60" height="60" /></td>
                            <?}?>
                            <td valign="top" class="talent_result"><h1><a href="view_job_details.php?id=<?=$title_res['fld_id']?>"><?=$fatch_company_info['name']?></a></h1>
                           	  <p><strong>Location:</strong> <?=$title_res['interview_city']?>,<?=$title_res['interview_state']?>,<?=$title_res['interview_country']?></p>
                              <p><strong>Skills:</strong> <?=$title_res['main_skill']?></p></td>
                           
						





                            </tr>
                           </table>

                        </div>
                         </td>

							<!--------------->









								<td width="10%">
								<div class="button1" style="width:100px;">
									<a href="talent_applied_job_msg.php?company_id=<?=$job_result['company_id']?>&job_id=<?=$job_result['job_id']?>"  title="Send Message" rel="gb_page_center[540, 300]" style="cursor: pointer; line-height:21px; color:#fff;" >Send Message</a>

								</div>
								<br/>
								<?
									if($job_result['talent_request']=='1'){
									?>
								<div class="button1" style="width:100px;">
									<a href="talent_reviews.php?company_id=<?=$job_result['company_id']?>&job_id=<?=$job_result['job_id']?>&talent_id=<?=$job_result['talent_id']?>"  title="Send Your Reviews" rel="gb_page_center[540, 450]" style="cursor: pointer; line-height:21px; color:#fff;text-align:center !important;" >Finish</a>

								</div>
								<?}elseif($job_result['talent_request']=='2'){?>
								<div class="button1" style="width:100px;">
								<a href="talent_reviews.php?company_id=<?=$job_result['company_id']?>&job_id=<?=$job_result['job_id']?>&talent_id=<?=$job_result['talent_id']?>&st=accept"  title="Send Your Reviews" rel="gb_page_center[540, 450]" style="cursor: pointer; line-height:21px; color:#fff;text-align:center !important;" >Accept</a>
								</div>
								<div class="button1" style="width:100px;">
								<a href="reject_company_request.php?company_id=<?=$job_result['company_id']?>&job_id=<?=$_REQUEST['id']?><?=$job_result['job_id']?>&talent_id=<?=$job_result['talent_id']?>">Reject</a>
								</div>
								<?}?>

								</td>

								

							</tr>

	                       </table>

                                
                                </td>
							</tr>
							<?}
								}else {?>
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
			<?include('inner_footer.php');?>
		</div>
	</body>
</html>
