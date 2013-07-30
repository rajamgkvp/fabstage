<?php
include('constants.php');
include('check_session.php');	



$query = "update fs_message set talent_status=2 where  (sender_id='".$_SESSION['fab_id']."' OR sender_id='".$_REQUEST['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$_REQUEST['company_id']."') AND job_id = '".$_REQUEST['job_id']."' "; 
	$query_run = q($query);

   
   if(isset($_REQUEST['submit'])){
		$query = "insert into fs_message(job_id, sender_id,receiver_id,message,time)values('".$_REQUEST['job_id']."','".$_SESSION['fab_id']."','".$_REQUEST['company_id']."','".$_REQUEST['message']."','".date('Y-m-d h:i:s')."')";
		$insert = q($query);
		if($insert){
			 $message= "Your message submitted successfully";
		}else{
		
		   $message= "Not submitted successfully";
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
</head>

<body>
<?include('left_tab.php');?>
	<div id="main_container">
		
<?include('top.php');?> 	
			<div>
				<div class="main_body_area">
					

					<div class="center_body" style="width:825px;">
					
                    <table class="center_body" cellspacing="1" cellpadding="1" border="0" align="left" style="margin-top:0px;float:left; width:262px; padding:0px; margin-left:0px; background:#fff;">
                    	<tr>
                        	<td class="message_listing">
                            	<ul>
                                	<?php
								
									$job_query = q("SELECT * FROM fs_applied_job WHERE talent_id='".$_SESSION['fab_id']."' AND status=3");
									while($job_result = f($job_query)) {

                                    $title_query = q("SELECT * FROM fs_job WHERE fld_id='".$job_result['job_id']."'");
									$title_res = f($title_query);
									
									
									$fld_id = $title_res['fld_id'];

                                   
									$qls_comp = "select * from fs_mamber where fld_id = '".$title_res['company_id']."'";
										$qls_run_comp = q($qls_comp);
										$qls_fatch_comp = f($qls_run_comp);




										   $title_query11 = q("SELECT * FROM  fs_message WHERE (sender_id='".$_SESSION['fab_id']."' OR sender_id='".$job_result['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$job_result['company_id']."') AND job_id = '".$job_result['job_id']."' ORDER BY fld_id desc limit 1 ");
                                       $title_res11 = nr($title_query11);
									   $fatch_first_message= f($title_query11);



									//CODE TO DISPLAY UNREAD MESSAGES
                                    $title_query12 = q("SELECT * FROM  fs_message WHERE (sender_id='".$_SESSION['fab_id']."' OR sender_id='".$job_result['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$job_result['company_id']."') AND (job_id = '".$job_result['job_id']."') AND talent_status=1 ");
                                     $title_res12 = nr($title_query12);

                                    ?>	

									<li>
                                    <a href="message_page.php?job_id=<?=$job_result['job_id']?>&company_id=<?=$job_result['company_id']?>" <?if($job_result['job_id']==$_REQUEST['job_id'] AND $job_result['company_id']==$_REQUEST['company_id']){?>class="active"<?}?>>
									<?if($qls_fatch_comp['profile_crop_image']!=''){?>
									<img src="<?=$qls_fatch_comp['profile_crop_image']?>" width="50" height="50" />
									<?}else{?>

                                     <img src="newhome/images/images.jpg" width="50" height="50" />
									<?}
									   $date_time = substr($fatch_first_message['time'],-8);
									?>
                                    	<div class="message_text">
										
                                        <h1><?=ucfirst(substr($title_res['title'],0,30))?>... <span><?=$date_time?></span></h1>
                                        <h2><?=ucfirst($qls_fatch_comp['name'])?> <span><?=$title_res12?> New</span></h2>
                                        <p><?=substr($fatch_first_message['message'],0,15)?>...</p>
                                        </div>
                                    </a>
                                    </li>

                               <?}?>
									
									
								<!------audation message---------->	
								
                               <?php
								
									$count1=1;
									$job_query1 = q("SELECT * FROM fs_applied_audation WHERE talent_id='".$_SESSION['fab_id']."' AND status=3");
									while($job_result1 = f($job_query1)) {
								

                                    $title_query1 = q("SELECT * FROM fs_oudition WHERE fld_id='".$job_result1['audation_id']."'");
									$title_res1 = f($title_query1);
									
									$qls_comp = "select * from fs_mamber where fld_id = '".$title_res1['company_id']."'";
										$qls_run_comp = q($qls_comp);
										$qls_fatch_comp = f($qls_run_comp);




									$count_query = q("SELECT * FROM fs_audition_msg WHERE
									(sender_id='".$_SESSION['fab_id']."' OR sender_id='".$job_result1['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$job_result1['company_id']."') AND audition_id='".$job_result1['audation_id']."' ORDER BY fld_id desc limit 1 ");
									$count_record = nr($count_query);
									$fatch_first_message= f($count_query);



									//CODE TO DISPLAY UNREAD MESSAGES
                                     $count_query2 = q("SELECT * FROM fs_audition_msg WHERE
									(sender_id='".$_SESSION['fab_id']."' OR sender_id='".$job_result1['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$job_result1['company_id']."') AND (audition_id='".$job_result1['audation_id']."') AND talent_status=1");
									$count_record2 = nr($count_query2);


                                    ?>	

									<li>
                                    <a href="message_audition_page.php?audition_id=<?=$job_result1['audation_id']?>&company_id=<?=$job_result1['company_id']?>">
									<?if($qls_fatch_comp['profile_crop_image']!=''){?>
									<img src="<?=$qls_fatch_comp['profile_crop_image']?>" width="50" height="50" />
									<?}else{?>

                                     <img src="newhome/images/images.jpg" width="50" height="50" />
									<?}?>
                                    	<div class="message_text">
                                        <h1><?=ucfirst(substr($title_res1['title'],0,30))?>... 
										
										<?
										   $date_time = substr($fatch_first_message['time'],-8);
										
										?>
										<span><?=$date_time?></span></h1>
                                        <h2><?=ucfirst($qls_fatch_comp['name'])?> <span><?=$count_record2?> New</span></h2>
                                        <p><?=substr($fatch_first_message['message'],0,15)?>...</p>
                                        </div>
                                    </a>
                                    </li>

                               <?}?>





                                <!--------------------------------->
                                </ul>
                            </td>
                        </tr>
                    </table>
                    
                    <table class="center_body" width="100%" cellspacing="1" cellpadding="1" border="0" align="right" style="margin-top:0px;float:right; background:#fff;">
                    	<tr>
                        	<td>
                           	  <div style="width:560px; height:30px; float:left; background:#313131; margin:0px;">

							  <?
							  $co_name = "select * from fs_mamber where fld_id = '".$_REQUEST['company_id']."'";
							  $co_comp = q($co_name);
							  $coc_comp = f($co_comp);
							  
							  ?>
                                <div style="float:left; font-size:13px; color:#ccc; font-weight:bold; font-family: Arial, Helvetica, sans-serif; line-height:30px; padding-left:10px;"><?=ucfirst($coc_comp['name'])?></div>
                                <div class="upload_btn">
                                <a href="#" style="margin-left:3px;">Action</a>
                                <a href="#" >+ New Message</a>
                                </div>
                                </div>
                                
                                <div class="message_pro">
                                	<ul>


								<? 
									
									$message_list_view = q("SELECT * FROM  fs_message WHERE (sender_id='".$_SESSION['fab_id']."' OR sender_id='".$_REQUEST['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$_REQUEST['company_id']."') AND job_id = '".$_REQUEST['job_id']."' order by fld_id DESC ");
                                    
									while($quer_fatch = f($message_list_view)){

                                    $fs_member_image = f(q("select * from fs_mamber where fld_id = ".$quer_fatch['sender_id'].""));

								 ?>
                                  

                                 <li>
                                   	 <img src="<?=$fs_member_image['profile_crop_image']?>" width="32" height="32" />
                                       <div class="message_name">


                                        <h1><a href="#"><?=$fs_member_image['name']?></a> 
										
										
										<span><!-- 5 jun, 11:36 pm --><?=$quer_fatch['time']?></span></h1>
                                        <p><?=$quer_fatch['message']?></p>
                                        </div>
                                        </li>

                                    <?}?>



                                        




                                        
                            <li>


				<?
				  if($message!=''){?>
				   <span><?=$message?></span>
				  
				 <? }
				?>		
				<form id="upload_form" name="upload_form" autocomplete="off" action="" onSubmit="return validate();" method="POST">
                                  
								   
					<textarea name="message" id="message" cols="" rows="" style="height:100px; width:540px; margin-left:10px; border:1px #c8c8c8 solid; font-size:12px; color:#999; font-family:Arial, Helvetica, sans-serif; background:#efefef; -webkit-border-radius: 2px;-moz-border-radius: 2px;border-radius: 2px;"></textarea>
                   <input type="hidden" id="job_id" value="<?=$_REQUEST['job_id']?>">
                   <input type="hidden" id="company_id" name="company_id" value="<?=$_REQUEST['company_id']?>">
                   <input type="submit" id="submit" name="submit" value="Reply" class="reply_btn">

                                  
               </form>
        </li>










                                    </ul>
                                </div>
                          </td>
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
			<?include('inner_footer.php');?>
		</div>
	</body>
</html>
