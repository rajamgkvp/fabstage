<?php

	include('constants.php');
	include('check_session.php');	
	$sql = "select * from fs_job where fld_id='".$_REQUEST['id']."'";
	$sql_run = q($sql);
	$sql_fatch = f($sql_run);

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
			//alert("Thank You"+job_id+talent_id);
			window.location.href="change_status.php?jobid="+j_id+"&talentid="+t_id;
			return true;
		}else{
			alert("Thank You");
			return false;
		}
	}
</script> 

<script type="text/javascript">
			var GB_ROOT_DIR = "greybox/";
		</script>

		<script type="text/javascript" src="greybox/AJS.js"></script>
		<script type="text/javascript" src="greybox/AJS_fx.js"></script>
		<script type="text/javascript" src="greybox/gb_scripts.js"></script>
		<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
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
								<td colspan="3" align="center" style="color:#727272;font-size:14px;font-weight:bold;">
									 Jobs Message 
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr><td width="3%"></td>
								<td width="60%"><b></b></td>
								<td width="35%">&nbsp;</td>
							</tr>
							
								
								
								
								
								
								<?php
								
									$job_query = q("SELECT * FROM fs_applied_job WHERE talent_id='".$_SESSION['fab_id']."' AND status=3");
									while($job_result = f($job_query)) {
								?>
								
								<tr>
								
								
								
								   <td width="1%"></td>
								
								
								
								
								
								
								
								
								
								 
									<?php 
									$title_query = q("SELECT * FROM fs_job WHERE fld_id='".$job_result['job_id']."'");
									$title_res = f($title_query);
									
									
									$fld_id = $title_res['fld_id'];

                                   
									$qls_comp = "select * from fs_mamber where fld_id = '".$title_res['company_id']."'";
										$qls_run_comp = q($qls_comp);
										$qls_fatch_comp = f($qls_run_comp);





									//CODE TO DISPLAY READ MESSAGES 
                                    $title_query11 = q("SELECT * FROM  fs_message WHERE (sender_id='".$_SESSION['fab_id']."' OR sender_id='".$job_result['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$job_result['company_id']."') AND job_id = '".$job_result['job_id']."' ");
                                     $title_res11 = nr($title_query11);

									//CODE TO DISPLAY UNREAD MESSAGES
                                    $title_query12 = q("SELECT * FROM  fs_message WHERE (sender_id='".$_SESSION['fab_id']."' OR sender_id='".$job_result['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$job_result['company_id']."') AND (job_id = '".$job_result['job_id']."') AND talent_status=1 ");
                                     $title_res12 = nr($title_query12);
									?>


<!--<td width="65%">

                                  <a href="message_view.php?company_id=<?=$job_result['company_id']?>&job_id=<?=$fld_id?>"  title="Conversation Message" rel="gb_page_center[900, 500]"><?=$title_res['title']?> </a>&nbsp;[<a><?=$title_res11?></a>]
									
									<?if($title_res12 == 0) {?>
									&nbsp;[<?=$title_res12?>] 
									<?} else{?>
									&nbsp;[<a><?=$title_res12?></a>] 
									<?}?> 
								</td> -->







								 <!------------------------->
                        <td>
						   <div class="talent_result_area" style="border:none;">
						
                        <h1><a href="view_job_details.php?id=<?=$title_res['fld_id']?>"><?=$title_res['title']?></a></h1>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="clear:both;">
                          <tr>
                            	<?if($qls_fatch_comp['profile_crop_image']!=null){?>
							<td valign="top" width="70"><img src="<?=$qls_fatch_comp['profile_crop_image']?>" width="60" height="60" /></td>
                             <?}else{?>
                            <td valign="top" width="70"><img src="newhome/images/images.jpg" width="60" height="60" /></td>
                            <?}?>
                            <td valign="top" class="talent_result"><h1><a href="view_job_details.php?id=<?=$title_res['fld_id']?>"><?=$qls_fatch_comp['name']?></a></h1>
                           	  <p><strong>Location:</strong> <?=$title_res['interview_city']?>,<?=$title_res['interview_state']?>,<?=$title_res['interview_country']?></p>
                              <p><strong>Skills:</strong> <?=$title_res['main_skill']?></p>
                              
							  <p>
							  <strong><a href="message_view.php?company_id=<?=$job_result['company_id']?>&job_id=<?=$fld_id?>"  title="Conversation Message" rel="gb_page_center[900, 500]">Read Message:</a></strong> [<a><?=$title_res11?></a>]<strong> &nbsp;&nbsp;&nbsp;&nbsp; <a href="message_view.php?company_id=<?=$job_result['company_id']?>&job_id=<?=$fld_id?>"  title="Conversation Message" rel="gb_page_center[900, 500]">UnRead Message:</a></strong> [<a><?=$title_res12?></a>]</p></td>
							  
							  
							  


                            </tr>
                           </table>

                           </div>
                       </td>

							   <!------------------------->
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								 <td width="30%">
									<div class="button1" style="width:100px;">
										<a href="message_send.php?receiver_id=<?=$job_result['company_id']?>&job_id=<?=$fld_id?>"  title="Send Message" rel="gb_page_center[540, 300]" style="cursor: pointer; line-height:21px; color:#fff;" >Send Message</a>
									</div>
								</td> 




							</tr>
							<?}?>
						</table>















						<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="float:right;">
							<tr>
								<td colspan="3" align="center" style="color:#727272;font-size:14px;font-weight:bold;">
									 Auditions Message
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr><td width="1%"></td>
								<td width="65%"><b></b></td>
							</tr>
							<tr>
								<?php
									$count1=1;
									$job_query1 = q("SELECT * FROM fs_applied_audation WHERE talent_id='".$_SESSION['fab_id']."' AND status=3");
									while($job_result1 = f($job_query1)) {
								?>
								<td width="3%"></td>
								
									<?php 
									$title_query1 = q("SELECT * FROM fs_oudition WHERE fld_id='".$job_result1['audation_id']."'");
									$title_res1 = f($title_query1);

                                    $qls_comp = "select * from fs_mamber where fld_id = '".$title_res1['company_id']."'";
										$qls_run_comp = q($qls_comp);
										$qls_fatch_comp = f($qls_run_comp);
 

									?>
									<?php
									$count_query = q("SELECT * FROM fs_audition_msg WHERE
									(sender_id='".$_SESSION['fab_id']."' OR sender_id='".$job_result1['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$job_result1['company_id']."') AND audition_id='".$job_result1['audation_id']."'");
									$count_record = nr($count_query);
									?>
									<?php
									//CODE TO DISPLAY UNREAD MESSAGES
                                    $count_query2 = q("SELECT * FROM fs_audition_msg WHERE
									(sender_id='".$_SESSION['fab_id']."' OR sender_id='".$job_result1['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$job_result1['company_id']."') AND (audition_id='".$job_result1['audation_id']."') AND talent_status=1");
									$count_record2 = nr($count_query2);
									?>

									<?$fld_id = $title_res1['fld_id']?>
									
									
									
									
									<!-- 
									<td width="65%">
									
									<a href="view_talent_audition_msg.php?company_id=<?=$job_result1['company_id']?>&audition_id=<?=$job_result1['audation_id']?>"  title="Conversation Messages" rel="gb_page_center[900, 500]"><?=$title_res1['title']?></a>



									&nbsp;[<?=$count_record?>]
									<?if($count_record2 == 0) {?>
									&nbsp;[<?=$count_record2?>]
									<?} else {?>
									&nbsp;<a>[<?=$count_record2?>]</a>
									<?}?>
								</td> -->

							 
							 
                                <!------------------------->
                          <td >
							 <div class="talent_result_area" style="border:none;">
						
                        <h1><a href="view_audation_details.php?id=<?=$title_res1['fld_id']?>"><?=$title_res1['title']?></a></h1>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="clear:both;">
                          <tr>
                            	<?if($qls_fatch_comp['profile_crop_image']!=null){?>
							<td valign="top" width="70"><img src="<?=$qls_fatch_comp['profile_crop_image']?>" width="60" height="60" /></td>
                             <?}else{?>
                            <td valign="top" width="70"><img src="newhome/images/images.jpg" width="60" height="60" /></td>
                            <?}?>
                            <td valign="top" class="talent_result"><h1><a href="view_audation_details.php?id=<?=$title_res1['fld_id']?>"><?=$qls_fatch_comp['name']?></a></h1>
                           	  <p><strong>Location:</strong> <?=$title_res1['interview_city']?>,<?=$title_res1['interview_state']?>,<?=$title_res1['interview_country']?></p>
                              <p><strong>Skills:</strong> <?=$title_res1['main_skill']?></p>
							  
							  <p>
							  <strong><a href="view_talent_audition_msg.php?company_id=<?=$job_result1['company_id']?>&audition_id=<?=$job_result1['audation_id']?>"  title="Conversation Message" rel="gb_page_center[900, 500]">Read Message:</a></strong> [<a><?=$count_record?></a>]<strong> &nbsp;&nbsp;&nbsp;&nbsp; <a href="view_talent_audition_msg.php?company_id=<?=$job_result1['company_id']?>&audition_id=<?=$job_result1['audation_id']?>"  title="Conversation Message" rel="gb_page_center[900, 500]">UnRead Message:</a></strong> [<a><?=$count_record2?></a>]</p>
							  
							  
							  
							  
							  </td>
                          
                            </tr>
                           </table>

                           </div>
                         </td>

							   <!------------------------->
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 <td width="30%">
								<div class="button1" style="width:100px;">
									<a href="talent_audition_send_msg.php?receiver_id=<?=$job_result1['company_id']?>&audition_id=<?=$job_result1['audation_id']?>"  title="Send Message" rel="gb_page_center[540, 300]" style="cursor: pointer; line-height:21px; color:#fff;" >Send Message</a>
								</div>
							</td>







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
