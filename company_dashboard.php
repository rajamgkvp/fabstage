<?php
include('constants.php');
include('check_session.php');    

       // for move right dashboard when user gave wrong dashboard
         
		    $work_as = $_SESSION['work_as'];   
   		       if($work_as==1){
		             header('Location: talent_dashboard.php');
		            }
				 

      // end //




           $_SESSION['fab_id'];
		   $query1 = "select * from fs_company where member_id='".$_SESSION['fab_id']."'";
		   $run1 = q($query1);
		   $count1 = nr($run1);
		   $fa = f($run1);
		   $work_area = $fa['work_area'];
		   $work_area = str_replace('_',' ',$work_area);
		   //$address = "company_step1.php";
           $address = "edit_company_step1.php";		 
$sql="SELECT * FROM fs_mamber WHERE fld_id='".$_SESSION['fab_id']."'";
$res=q($sql);
$row=f($res);
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
	<body style="background:#f0f0f0;" <?if($count1==0){?> onload='GB_showCenter("","http://fs.sitebysite.us/<?=$address?>",600,1000);'<?}?>>
	<?include('left_company_tab.php');?> 
		<div id="main_container">
         <?include('top.php');?> 


	        <div>
				<div class="dashboard_area">
					<div class="dashboard_profile">
						<img src="<?=$row['profile_crop_image']?>" width="85" height="85" />
						<div class="dashboard_detail">
							<h1><?=ucfirst($row['name'])?><span></span></h1>
							<h2><?=ucwords($work_area)?></h2>
							<div class="edit_profile">
								<a style="color:#66ccff;" rel="gb_page_center[1000, 600]"  href="edit_company_step1.php">edit profile</a>
							</div>
						</div>
						<div class="dashboard_search">
							<div class="subscribe_btn_area" style="float:right;">
                            		<ul class="loginBtn">
                                    <li class="first-tab select-box"><select class="selected" title="Select one" id="selectbox" name="selectbox" onchange="javascript:location.href = this.value;">
                                            <option value="" selected>Post Opportunity</option>
										<option value="post_job.php">Post Job</option>
										<option value="audition.php">Post Audition</option>
                                        </select></li>
                                    </ul>
                            		
								<!--<div class="subscribe" style="margin-left:0;">
									<select id="selectbox" name="selectbox" onchange="javascript:location.href = this.value;">
										<option value="" selected>Post Opportunity</option>
										<option value="http://fs.sitebysite.us/post_job.php">Post Job</option>
										<option value="http://fs.sitebysite.us/audition.php">Post Audition</option>
									</select>
									</div>-->
							</div>
						
                           <!-------profile complete box in %------------------->
                            <? 
							  $hasCompletedBooks =20;
							  $check_company = q("select member_id from fs_company where member_id= '".$_SESSION['fab_id']."'");
							  $run_company = nr($check_company);
							  if($run_company!=0){
							    
								$hasCompletedBooks = $hasCompletedBooks+16;
								 
							  }
                              
							  $check_company_project = q("select company_id from fs_company_project where company_id= '".$_SESSION['fab_id']."'");
							  $run_company_project = nr($check_company_project);
							  if($run_company_project!=0){
							    
								$hasCompletedBooks = $hasCompletedBooks+16;
								 
							  }

							  $check_company_contact = q("select company_id from fs_company_contact where company_id= '".$_SESSION['fab_id']."'");
							  $run_company_contact = nr($check_company_contact);
							  if($run_company_contact!=0){
							    
								$hasCompletedBooks = $hasCompletedBooks+16;
								 
							  }


							  $check_company_project_summary = q("select company_id from fs_company_project_summary where company_id= '".$_SESSION['fab_id']."'");
							  $run_company_project_summary = nr($check_company_project_summary);
							  if($run_company_project_summary!=0){
							    
								$hasCompletedBooks = $hasCompletedBooks+16;
								 
							  }
							
							 $check_company_portfolio = q("select company_id from fs_company_portfolio where company_id= '".$_SESSION['fab_id']."'");
							  $run_company_portfolio = nr($check_company_portfolio);
							  if($run_company_portfolio!=0){
							    
								$hasCompletedBooks = $hasCompletedBooks+16;
								 
							  }
							
                          $maximumPoints  = 100;
                          $percentage = ($hasCompletedBooks)*$maximumPoints/100;

						  echo "
								<div class='rating_line' style='float:right;width:120px; background-color:white; height:20px; border:1px solid #000; margin-right:1px;'>
								<div style='width:".$percentage."px; background-color:#66ccff; height:20px;'></div>
								</div>";
                                
							?>
                           <div class="profile_comp"><?=$percentage?>% Profile complete<br />
							<a style="color:#66ccff;" rel="gb_page_center[1000, 600]"  href="edit_company_step1.php">Complete it</a>
						   </div>
						   <!--------------------------->






						</div>
					</div>
					<div class="body_update_main">
						<div class="update_left">
						<!-- OPTIONS LIST HERE-->
							
							<div class="sponsor_area">
                        	<h1>Improve your repotation</h1>
                            
                        <div class="sponsor_update">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="repo_text" style="font-size:10px; line-height:24px;">Your current repotation: <img src="images/blue_star.png" width="11" height="12" /><img src="images/blue_star.png" width="11" height="12" /><img src="images/blue_star.png" width="11" height="12" /><img src="images/grey_star.png" width="11" height="12" /><img src="images/grey_star.png" width="11" height="12" /></td>
  </tr>
  <tr>
    <td class="repo_text">Lorem Ipsum is simply dummy text of the printing and type.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size:11px; line-height:22px;"><a href="#"><img src="images/repo_arrow.png" width="13" height="14" style="vertical-align:middle;" /> Complete your about me (+)</a></td>
  </tr>
  <tr>
    <td style="font-size:11px; line-height:22px;"><a href="#"><img src="images/repo_arrow.png" width="13" height="14" style="vertical-align:middle;" /> Apply for a casting (+ +)</a></td>
  </tr>
</table>

                        </div>
                        
                        </div>
                            
						<!-- OPTIONS LIST HERE-->
							<div class="sponsor_area">
								<h1>Sponsored</h1>
								<div class="sponsor_update">
									<div class="sponsor_list">
										<div class="sponsor_list_image">
											<img src="images/profile_pic1.jpg" width="28" height="28" />
										</div>
										<div class="sponsor_list_text">
											<h1>Cadbury Dairy Milk India</h1>
											<p>Lorem Ipsum is simply dummy text of the printing and type.</p>
											<img src="images/inside/sponsor_img.jpg" width="98" height="98" />
											<div class="like_thumb">
												<a href="#"><img src="images/inside/like_thumb.jpg" style="vertical-align:top;" /> Like This Page</a>
											</div>
										</div>
									</div>
									<div class="sponsor_list">
                                		<div class="sponsor_list_image">
											<img src="images/profile_pic1.jpg" width="28" height="28" />
										</div>
										<div class="sponsor_list_text">
											<h1>Cadbury Dairy Milk India</h1>
											<p>Lorem Ipsum is simply dummy text of the printing and type.</p>
											<img src="images/inside/sponsor_img.jpg" width="98" height="98" />
											<div class="like_thumb">
												<a href="#"><img src="images/inside/like_thumb.jpg" style="vertical-align:top;" /> Like This Page</a>
											</div>
										</div>
									</div>
									<div class="sponsor_list">
                                		<div class="sponsor_list_image">
											<img src="images/profile_pic1.jpg" width="28" height="28" />
										</div>
										<div class="sponsor_list_text">
                                        <h1>Cadbury Dairy Milk India</h1>
											<p>Lorem Ipsum is simply dummy text of the printing and type.</p>
											<img src="images/inside/sponsor_img.jpg" width="98" height="98" />
											<div class="like_thumb"><a href="#"><img src="images/inside/like_thumb.jpg" style="vertical-align:top;" /> Like This Page</a>
										</div>
                                    </div>
                                </div>
                                <div class="sponsor_list">
                                	<div class="sponsor_list_image">
										<img src="images/profile_pic1.jpg" width="28" height="28" />
									</div>
									<div class="sponsor_list_text">
                                        <h1>Cadbury Dairy Milk India</h1>
                                        <p>Lorem Ipsum is simply dummy text of the printing and type.</p>
                                		<img src="images/inside/sponsor_img.jpg" width="98" height="98" />
                                        <div class="like_thumb"><a href="#">
											<img src="images/inside/like_thumb.jpg" style="vertical-align:top;" /> Like This Page</a>
										</div>
									</div>
                                </div>
							</div>
                        </div>
                    </div>
                    <div class="dashboard_center">
                    
                        	
                            
                            
                            
                            <div class="dashboard_update">
                            <div class="dash_update">
                            	<div class="dashboard_network">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="text-align:center; font-size:15px; line-height:32px;">Active your network to get job, get found or collaborate</td>
  </tr>
  <tr>
    <td align="center" style="padding:5px 0px 10px 0px;">
    <table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="#"><img src="images/google_i.png" width="21" height="20" /></a></td>
    <td class="dashboard_icon"><a href="#">Google</a></td>
    <td><a href="#"><img src="images/facebook_i.png" width="21" height="20" /></a></td>
    <td class="dashboard_icon"><a href="#">Facebook</a></td>
    <td><a href="#"><img src="images/main_i.png" width="21" height="20" /></a></td>
    <td class="dashboard_icon"><a href="#">Hotmail</a></td>
    <td><a href="#"><img src="images/yahoo_i.png" width="21" height="20" /></a></td>
    <td class="dashboard_icon"><a href="#">Yahoo!</a></td>
    <td><a href="#"><img src="images/other_i.png" width="24" height="20" /></a></td>
    <td class="dashboard_icon"><a href="#">Other Email</a></td>
  </tr>
    </table>

    </td>
  </tr>
</table>

                                </div>
                                
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding-top:10px;">


                           <?
						   //message section
						   // unread job messages
						   $title_query2 = q("SELECT * FROM  fs_message WHERE receiver_id='".$_SESSION['fab_id']."'  AND company_status=1 ");
                                     
						  $count_record21 = nr($title_query2);

						   // unread audation message
                                $count_query2 = q("SELECT * FROM fs_audition_msg WHERE
									 receiver_id='".$_SESSION['fab_id']."' AND company_status=1 ");
								$count_record2 = nr($count_query2);

								$total_unread_message = $count_record21+$count_record2;
							// end message section

						// total views section
                             

                        // end total views 



            //Posted jobs list number
			$job_list_number = "select * from fs_job where company_id = '".$_SESSION['fab_id']."' AND status = 1 " ;
			$job_run_number = q($job_list_number);
            $count_num_of_jobs_apply_person  = nr($job_run_number);
            
			$audation_list_number = "select * from fs_oudition where company_id = '".$_SESSION['fab_id']."' AND status = 1 " ;
			
			$job_run_audition_number = q($audation_list_number); 
                         
			$count_num_of_audation_apply_person  = nr($job_run_audition_number);

             $total_num_of_apply_talent = $count_num_of_audation_apply_person+$count_num_of_jobs_apply_person;

             ?>




  <tr>
    <td class="dashboard_count" width="70"><a href="company_message.php"><?=$total_unread_message?></a><br />
	<span><a href="company_message.php">Unread Message</a></span></td>
    
	<td class="dashboard_count">10,45<br />
	<span><a href="#">Panding Jobs</a></span></td>
    
	<td class="dashboard_count"><a href="posted_job.php"><?=$total_num_of_apply_talent?></a><br />
	<span><a href="posted_job.php">New Application</a></span></td>
    
	<td class="dashboard_count">510<br />
	<span><a href="#">Total Views</a></span></td>
    
	<td class="dashboard_count" style="background:none;">410<br />
	<span><a href="#">Total Likes</a></span></td>
  </tr>
</table>

                                
                            </div>
                        </div>
                            
                            
                            
                          
                       
						
						
						
						
						
						<div class="update_head">Updates</div>








                        <div class="dashboard_update">
                        	
							<div class="dashboard_update_topbg">
								<img src="images/inside/top_corn_center.png" width="434" height="6" />
							</div>

                            <div class="dash_update">

                            	<div class="update_headline">
									<img src="images/inside/update_img.png" />
									<h2><A href="#">Umesh Sharma</A> Posted a <a href="#">job</a></h2>
									<h3>March 24, 2013 <span>3:05 pm</span></h3>
								</div>

								<p><img src="images/inside/post_img.png" width="398" height="298" /><br /><br />
                                  
								   <img src="images/inside/post_img.png" width="100" height="100" />
								  <img src="images/inside/post_img.png" width="100" height="100" />
								   <img src="images/inside/post_img.png" width="100" height="100" />
								 
						
							 </div>


                            <div class="dashboard_update_topbg">
								<img src="images/inside/bottom_corn_center.png" width="434" height="6" />
							</div>
                        </div>















				</div>




				<div class="matching_job_right">
					<div class="matching_job_area">
						



                        <!-----------Sort listed talent list-------------------->
						<div class="matching_area">
							<h1>Short Listed Talent For Job</h1>
							
							
							
                          <?
						

                            $find_talent_info = q("select * from fs_mamber where work_as = 1 order by RAND() limit 8");

							$num_of_t = nr($find_talent_info);
							if($num_of_t!=0){
							while($fatch_talent = f($find_talent_info)){
                             
							 // fild job details
							 
							$select_talent = f(q("select * from fs_talent where member_id = ".$fatch_talent['fld_id'].""));


						  ?>

							
							
							<div class="matching">
								<!-- <h1>Need 8 Female for fashion fiesat 2013 in banglore </h1> -->
								<div class="matching_profile">

                                     <table>
									 <tr>
										<td valign="top" >
								        <a target = "_BLANK" href="talent_profile.php?talent_id=<?=$fatch_talent['fld_id']?>">
										<?if($fatch_talent['profile_crop_image']!=''){?>
										<img src="<?=$fatch_talent['profile_crop_image']?>" width="60" height="60" />
										<?}else{?>
										<img src="newhome/images/images.jpg" width="60" height="60" />
										<?}?>
										</a></td>

										<td valign="top" class="talent_result" style="padding-left:5px;"><h1><a target = "_BLANK" href="talent_profile.php?talent_id=<?=$fatch_talent['fld_id']?>"><?=ucfirst($fatch_talent['name'])?></a></h1>
									    <?if($select_talent['location']!=''){?>
									   <p><strong>Location:</strong> <?=$select_talent['location']?></p>
                                       <?}else{?>
									    <p><strong>Location:</strong> N/A</p>
                                        <?}if($select_talent['main_skill']!=''){?>
									   <p><strong>Skills:</strong> <?=substr(str_replace(',,',',',$select_talent['main_skill']),1,25)?></p>
                                       <?}else{?>
                                      <p><strong>Skills:</strong> N/A</p>

                                      <?}?>

									<!-- <div class="matching_apply"><A target="_BLANK" href="talent_profile.php?talent_id=<?=$fatch_talent['talent_id']?>"><img src="images/plus_icon.png" width="12" height="11" /> Apply Now</A>
									</div> -->
									</h4>
                                 </tr>
								 </table>
 


								</div>
							</div>


                         <?}
						 
							}else{?>
                             

                             Sort Listed Talent Not Found...


						 <?}?>
						  <div>
                                &nbsp;
						  </div>







                      


						    
<!--
							<div class="matching">
								<h1>Need 8 Female for fashion fiesat 2013 in banglore </h1><div class="close_img"><a href="#"><img src="images/inside/close.png" /></a></div>
								<div class="matching_profile">
								<img src="images/profile_pic3.jpg" width="28" height="28" />
								<h3>Shashwat Modeling Agency Pvt. Ltd.</h3>
								<h4>Needs : <span>Models</span> <div class="matching_apply"><A href="#">Apply</A></div></h4>
								</div>
							</div>



							<div class="matching">
								<h1>Need 8 Female for fashion fiesat 2013 in banglore </h1><div class="close_img"><a href="#"><img src="images/inside/close.png" /></a></div>
								<div class="matching_profile">
								<img src="images/profile_pic3.jpg" width="28" height="28" />
								<h3>Shashwat Modeling Agency Pvt. Ltd.</h3>
								<h4>Needs : <span>Models</span> <div class="matching_apply"><A href="#">Apply</A></div></h4>
								</div>
							</div>



							<div class="matching">
								<h1>Need 8 Female for fashion fiesat 2013 in banglore </h1><div class="close_img"><a href="#"><img src="images/inside/close.png" /></a></div>
								<div class="matching_profile">
								<img src="images/profile_pic3.jpg" width="28" height="28" />
								<h3>Shashwat Modeling Agency Pvt. Ltd.</h3>
								<h4>Needs : <span>Models</span> <div class="matching_apply"><A href="#">Apply</A></div></h4>
								</div>
							</div>



							<div class="matching">
								<h1>Need 8 Female for fashion fiesat 2013 in banglore </h1><div class="close_img"><a href="#"><img src="images/inside/close.png" /></a></div>
								<div class="matching_profile">
								<img src="images/profile_pic3.jpg" width="28" height="28" />
								<h3>Shashwat Modeling Agency Pvt. Ltd.</h3>
								<h4>Needs : <span>Models</span> <div class="matching_apply"><A href="#">Apply</A></div></h4>
								</div>
							</div>



							<div class="matching">
								<h1>Need 8 Female for fashion fiesat 2013 in banglore </h1><div class="close_img"><a href="#"><img src="images/inside/close.png" /></a></div>
								<div class="matching_profile">
									<img src="images/profile_pic3.jpg" width="28" height="28" />
									<h3>Shashwat Modeling Agency Pvt. Ltd.</h3>
									<h4>Needs : <span>Models</span> <div class="matching_apply"><A href="#">Apply</A></div></h4>
								</div>
							</div>
						</div> -->







						<div class="matching_area" style="margin-top:10px;">
                            	<h1>Companies you may want to follow</h1>
                                <a href="#"><img src="images/company_logo.png" width="286" height="244" style="margin-top:10px;" /></a>
                          	</div>
					</div>
				</div>
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
									titlesFactor		: 0});
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
