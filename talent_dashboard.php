<?php
error_reporting(0);
	include('constants.php');	
	include('check_session.php');

	// for move right dashboard when user gave wrong dashboard
         
		    $work_as = $_SESSION['work_as'];   
   		      
					if($work_as==2){
		                  header('Location: company_dashboard.php');
		               }

      // end //

	    $_SESSION['fab_id'];
		$query1 = "select * from fs_talent where member_id='".$_SESSION['fab_id']."'";
		$run1 = q($query1);
		$count1 = nr($run1);
		$fatch1 = f($run1);
		//$address = "talent_step1.php";
        $address = "edit_talent_step1.php";
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


<script>
	function apply(job_id){
		
	window.location.href="apply_job_dashboard.php?tab=1&job_id="+job_id;
	return true;
	
	}
</script>
	</head>
<body style="background:#f0f0f0;" <?if($count1==0){?> onload='GB_showCenter("","<?=Site_url.$address?>",600,1000);'<?}?>>


<?include('left_tab.php');?> 


<div id="main_container">
<?include('top.php');?> 	
	
	
	
	
	








     <div>
			<div class="dashboard_area">
            	<div class="dashboard_profile">
                <a href="example13/index.php?link=<?=$row['profile_image']?>"><img src="<?=$row['profile_crop_image']?>" width="85" height="85" /></a>
                	<div class="dashboard_detail">
                    	<h1><?=ucfirst($row['name'])?><span><!-- Actor --></span></h1>
                        <h2>Mum, Maharastra, India</h2>
                        <div class="edit_profile"><a style="color:#66ccff;" rel="gb_page_center[1000, 600]"  href="edit_talent_step1.php">edit profile</a></div>
                    </div>
                    <div class="dashboard_search">
                    	<div class="subscribe_btn_area" style="float:right;">
                        	<div class="subscribe"><a href="#">Search</a></div>
                        </div>









<!-------profile complete box in %------------------->
                            <? 
							  $hasCompletedBooks =40;
							  $check_company = q("select member_id from fs_talent where member_id= '".$_SESSION['fab_id']."'");
							  $run_company = nr($check_company);
							  if($run_company!=0){
							    
								$hasCompletedBooks = $hasCompletedBooks+20;
								 
							  }
                              
							  $check_company_project = q("select talent_id from fs_talent_project where talent_id= '".$_SESSION['fab_id']."'");
							  $run_company_project = nr($check_company_project);
							  if($run_company_project!=0){
							    
								$hasCompletedBooks = $hasCompletedBooks+20;
								 
							  }

							


							  $check_company_project_summary = q("select talent_id from fs_talent_project_summary where talent_id= '".$_SESSION['fab_id']."'");
							  $run_company_project_summary = nr($check_company_project_summary);
							  if($run_company_project_summary!=0){
							    
								$hasCompletedBooks = $hasCompletedBooks+20;
								 
							  }
							
							 $check_company_portfolio = q("select talent_id from fs_talent_portfolio where talent_id= '".$_SESSION['fab_id']."'");
							  $run_company_portfolio = nr($check_company_portfolio);
							  if($run_company_portfolio!=0){
							    
								$hasCompletedBooks = $hasCompletedBooks+20;
								 
							  }
							
                          $maximumPoints  = 100;
                          $percentage = ($hasCompletedBooks)*$maximumPoints/100;

						  echo "
								<div class='rating_line' style='float:left;width:120px; background-color:white; height:20px; border:1px solid #000;'>
								<div style='width:".$percentage."px; background-color:#66ccff; height:20px;'></div>
								</div>";
                                
							?>
                           <div class="profile_comp"><?=$percentage-20?>% Profile complete<br />
							<a style="color:#66ccff;" rel="gb_page_center[1000, 600]"  href="edit_talent_step1.php">Complete it</a>
						   </div>
						   <!--------------------------->












                    </div>
                </div>
                
                <div class="body_update_main">
                	<div class="update_left">
                    
                    
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
                    
                    	<!--<div class="post_area">
                        	<ul>
							    <li><a href="applied_jobs.php">Applied Jobs</a></li>
                                <li><a href="applied_audation.php">Applied Audition</a></li> 
                                <li><a href="match_job_list.php">Match Job List</a></li>
                                <li><a href="match_audition_list.php">Match Audition List</a></li>
                                <li><a href="talent_message.php">Message</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>-->
                        
                        <div class="sponsor_area">
                        	<h1>Sponsored</h1>
                            
                        <div class="sponsor_update">
                            	<div class="sponsor_list">
                                	<div class="sponsor_list_image"><img src="images/profile_pic1.jpg" width="28" height="28" /></div>
                      <div class="sponsor_list_text">
                                        <h1>Cadbury Dairy Milk India</h1>
                                        <p>Lorem Ipsum is simply dummy text of the printing and type.</p>
                                		<img src="images/inside/sponsor_img.jpg" width="98" height="98" />
                                        <div class="like_thumb"><a href="#"><img src="images/inside/like_thumb.jpg" style="vertical-align:top;" /> Like This Page</a></div>
                                    </div>
                                </div>
                                
                                <div class="sponsor_list">
                                	<div class="sponsor_list_image"><img src="images/profile_pic1.jpg" width="28" height="28" /></div>
                      <div class="sponsor_list_text">
                                        <h1>Cadbury Dairy Milk India</h1>
                                        <p>Lorem Ipsum is simply dummy text of the printing and type.</p>
                                		<img src="images/inside/sponsor_img.jpg" width="98" height="98" />
                                        <div class="like_thumb"><a href="#"><img src="images/inside/like_thumb.jpg" style="vertical-align:top;" /> Like This Page</a></div>
                                    </div>
                                </div>
                                
                                <div class="sponsor_list">
                                	<div class="sponsor_list_image"><img src="images/profile_pic1.jpg" width="28" height="28" /></div>
                      <div class="sponsor_list_text">
                                        <h1>Cadbury Dairy Milk India</h1>
                                        <p>Lorem Ipsum is simply dummy text of the printing and type.</p>
                                		<img src="images/inside/sponsor_img.jpg" width="98" height="98" />
                                        <div class="like_thumb"><a href="#"><img src="images/inside/like_thumb.jpg" style="vertical-align:top;" /> Like This Page</a></div>
                                    </div>
                                </div>
                                
                                <div class="sponsor_list">
                                	<div class="sponsor_list_image"><img src="images/profile_pic1.jpg" width="28" height="28" /></div>
                      <div class="sponsor_list_text">
                                        <h1>Cadbury Dairy Milk India</h1>
                                        <p>Lorem Ipsum is simply dummy text of the printing and type.</p>
                                		<img src="images/inside/sponsor_img.jpg" width="98" height="98" />
                                        <div class="like_thumb"><a href="#"><img src="images/inside/like_thumb.jpg" style="vertical-align:top;" /> Like This Page</a></div>
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

<?
  //CODE TO DISPLAY UNREAD MESSAGES
         $title_query12 = q("SELECT * FROM  fs_message WHERE receiver_id='".$_SESSION['fab_id']."' AND talent_status=1 ");
         $title_res12 = nr($title_query12);

	 //CODE TO DISPLAY UNREAD MESSAGES
         $count_query2 = q("SELECT * FROM fs_audition_msg WHERE
         receiver_id='".$_SESSION['fab_id']."' AND talent_status=1");
		 $count_record2 = nr($count_query2);
 
         $total_unread_message = $title_res12+$count_record2;

        //job offers 
            $job_query = q("SELECT * FROM fs_applied_job WHERE talent_id='".$_SESSION['fab_id']."' AND status=2");
		    $job_number1 = nr($job_query);

			$audation_query = q("SELECT * FROM fs_applied_audation WHERE talent_id='".$_SESSION['fab_id']."' AND status=2");
			$audation_number1 = nr($audation_query);

			$total_no_of_offer = $audation_number1+$job_number1;
		//end



// matched job list

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
								//echo $array ;


									  $dif_array = explode(",", $array);
									  $red_array = array_unique($dif_array);
									 
								//foreach ($red_array as &$value1) {
								$array1 = substr($array,0,-1);

                       

		                     $qls=  "SELECT * FROM fs_job WHERE fld_id IN (".$array1.") and fld_id!='' ";	
									
							
									//echo $value1;
								
										//$qls = "select * from fs_job where fld_id = '".$value1."'";
										$qls_run = q($qls);
										$nub_row1 = nr($qls_run);
									 

							}			

//end

// select number of audation 


						  $query1 = "select * from fs_talent where member_id='".$_SESSION['fab_id']."'";
		                  $run1 = q($query1);
		                  $count1 = nr($run1);
		                  $fatch1 = f($run1);
						 
						 $main_skill = $fatch1['main_skill'];
									if($main_skill!='') {


		                             $skill = explode(",",$main_skill);
									// echo $main_skill;
		                             foreach ($skill as &$value) {
										 // echo $value;

										 if($value!=""){


				                      $sql_match = "SELECT DISTINCT fld_id	FROM fs_oudition WHERE main_skill LIKE '%".$value."%'"; 
									  $run_match = q($sql_match);
									  while($fatch_match = f($run_match)) {



									  $array .=	$fatch_match['fld_id'];
									  $array.=",";
									  }
									 } 
									 
									 }




                         $array1 = substr($array,0,-1);


                        $qls=  "SELECT * FROM fs_oudition WHERE fld_id IN (".$array1.") and fld_id!='' ";
                                       	$qls_run = q($qls);
										$nub_row2 = nr($qls_run);
									}

                       $total_job_matched = $nub_row1+$nub_row2;

?>

 
                                
 <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="padding-top:10px;">
  <tr>
    <td class="dashboard_count" width="70"><a href="#"><?=$total_unread_message?></a><br />
	<span><a href="talent_message.php">Unread Message</a></span></td>
    <td class="dashboard_count"><a href="match_job_list.php"><?=$total_job_matched?></a><br />
	<span><a href="match_job_list.php">Matching Oppurtunity</a></span></td>
    <td class="dashboard_count"><a href="applied_jobs.php"><?=$total_no_of_offer?></a><br />
	<span><a href="applied_jobs.php">Job Offers</a></span></td>
    <td class="dashboard_count"><a href="#"><?=$row['total_view']?></a><br />
	<span><a href="#">Total Views</a></span></td>
    <td class="dashboard_count" style="background:none;"><a href="#">410</a><br />
	<span><a href="#">Total Likes</a></span></td>
  </tr>
</table>

                                
                            </div>
                        </div>
                        
                        <div class="update_head">Updates</div>
                        
                        <div class="dashboard_update">
                        	<div class="dashboard_update_topbg"><img src="images/inside/top_corn_center.png" width="434" height="6" /></div>
                            <div class="dash_update">
                            	<div class="update_headline">
                                <img src="images/inside/update_img.png" />
                                <h2><A href="#">Umesh Sharma</A> Posted a <a href="#">job</a></h2>
                                <h3>March 24, 2013 <span>3:05 pm</span></h3>
                                </div>
                                <p><img src="images/inside/post_img.png" width="398" height="298" />
								<br /><br />
								KHUDA ne "AANKHEIN"<br />
								kitni Ajeeb banayi Hai...<br />
								Jab yeh Uthti hai toh DUA ban jati<br />
								hai,O:)<br />
								Jab yeh Jhukti hai toh HAYAA ban<br />
								...<br />
								<a href="#">See More</a></p>
                          </div>
                            <div class="dashboard_update_topbg"><img src="images/inside/bottom_corn_center.png" width="434" height="6" /></div>
                        </div>
                        
                        
                        <div class="dashboard_update">
                        	<div class="dashboard_update_topbg"><img src="images/inside/top_corn_center.png" width="434" height="6" /></div>
                            <div class="dash_update">
                            	<div class="update_headline">
                                <img src="images/inside/update_img.png" />
                                <h2><A href="#">Umesh Sharma</A> Posted a <a href="#">job</a></h2>
                                <h3>March 24, 2013 <span>3:05 pm</span></h3>
                                </div>
                    <p>Need 8 Female for fashion fiesat 2013 in banglore</p>
                    <div class="white_area" style="width:auto;">
                        <div class="location">Needs </div> <div class="location_text">Actor, Model, Dancer</div>
                        <div class="location">Work Location</div> <div class="location_text">Mum, Maharstra, India</div>
                        <div class="location">Job Type</div> <div class="location_text">Regular</div>
                        <div class="location">Work Duration</div> <div class="location_text">2 Days</div>
                        <div class="location">Gender</div> <div class="location_text">Male</div>
                    </div>
                    <p>Lots of great new entries into our VIP Model Club this month. Some great guys as well as girls.
					<br />...<br />
					<a href="#">See More</a></p>
                          </div>
                            <div class="dashboard_update_topbg"><img src="images/inside/bottom_corn_center.png" width="434" height="6" /></div>
                        </div>
                        
                          <div class="dashboard_update">
                        	<div class="dashboard_update_topbg"><img src="images/inside/top_corn_center.png" width="434" height="6" /></div>
                            <div class="dash_update">
                            	<div class="update_headline">
                                <img src="images/inside/update_img.png" />
                                <h2><A href="#">Umesh Sharma</A> Posted a <a href="#">job</a></h2>
                                <h3>March 24, 2013 <span>3:05 pm</span></h3>
                                </div>
                                <p><img src="images/inside/post_img.png" width="398" height="298" />
								<br /><br />
								KHUDA ne "AANKHEIN"<br />
								kitni Ajeeb banayi Hai...<br />
								Jab yeh Uthti hai toh DUA ban jati<br />
								hai,O:)<br />
								Jab yeh Jhukti hai toh HAYAA ban<br />
								...<br />
								<a href="#">See More</a></p>
                          </div>
                            <div class="dashboard_update_topbg"><img src="images/inside/bottom_corn_center.png" width="434" height="6" /></div>
                        </div>
                        
                        
                        <div class="dashboard_update">
                        	<div class="dashboard_update_topbg"><img src="images/inside/top_corn_center.png" width="434" height="6" /></div>
                            <div class="dash_update">
                            	<div class="update_headline">
                                <img src="images/inside/update_img.png" />
                                <h2><A href="#">Umesh Sharma</A> Posted a <a href="#">job</a></h2>
                                <h3>March 24, 2013 <span>3:05 pm</span></h3>
                                </div>
                                <p>Need 8 Female for fashion fiesat 2013 in banglore</p>
                                <div class="white_area" style="width:auto;">
                        <div class="location">Needs </div> <div class="location_text">Actor, Model, Dancer</div>
                        <div class="location">Work Location</div> <div class="location_text">Mum, Maharstra, India</div>
                        <div class="location">Job Type</div> <div class="location_text">Regular</div>
                        <div class="location">Work Duration</div> <div class="location_text">2 Days</div>
                        <div class="location">Gender</div> <div class="location_text">Male</div>
                    </div>
                                <p>Lots of great new entries into our VIP Model Club this month. Some great guys as well as girls.
								<br />...<br />
						<a href="#">See More</a></p>
                          </div>
                            <div class="dashboard_update_topbg"><img src="images/inside/bottom_corn_center.png" width="434" height="6" /></div>
                        </div>
                    </div>
                    <div class="matching_job_right">
                    	<div class="matching_job_area">
                        	

							<!-- ALL JOBS  -->
                            <div class="matching_area">

                            	<h1>Matching</h1>
								   
								   <?
								      if($_REQUEST['ms']==2){?>
									 <div style="color:#669933;">Successfully Apply</div> 
									  
									  
									  
								  <?	 
								  
								       }
								   
								   ?>
								   
								   <? 
								   $main_skill = $fatch1['main_skill'];
								    // echo "<br/>";
									 $main_skill = str_replace(',,',',', $main_skill);

									if($main_skill!='') {
		                             $skill = explode(",",$main_skill);
									 

		                             foreach ($skill as &$value) {
										// echo "<br/>";
										 $value;
									   if($value!=""){


				                      $sql_match = "SELECT DISTINCT fld_id	FROM fs_job WHERE main_skill LIKE '%".$value."%' "; 
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
									  $h = 0;
								foreach ($red_array as &$value1) {
									$h++;
									//echo $value1;
									if($value1!="" AND $h<=6)	{
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






								<div class="matching">
                                	<h1><?=$qls_fatch['title']?> </h1>
									
                                    <div class="matching_profile">
										<A href="view_job_details.php?id=<?=$qls_fatch['fld_id']?>"><img src="admin/portfolio_logo/<?=$qls_fatch_comp_logo['large_pic']?>" width="50" height="50" style="border:2px #e3e4df solid;" />
										<h3><?=$qls_fatch_comp['name']?></h3>
                                        <h4>Location: <span><?=$qls_fatch['interview_city']?>, <?=$qls_fatch['interview_state']?>,<?=$qls_fatch['interview_country']?></span></h4>
										<h4>Needs: <span><?=substr($qls_fatch['main_skill'],1,30)?>...</span></a> <div class="matching_apply"><a href="#" onclick="apply(<?=$qls_fatch['fld_id']?>)"><img src="images/plus_icon.png" width="12" height="11" /> Apply Now</A></div></h4>
                                    </div>
                                </div>
                                <?}
								}
							}?>
						</div>
						<!-- ALL JOBS  -->
						
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
					titlesFactor		: 0
                });
            });
			});
        </script>
                </div>
                
            <div class="footer_ads_right"><a href="#"><img src="images/ads_banner_girl.png" width="277" height="226" /></a></div>
          </div>
        </div>
    </div>
    
   
	
	
	 <script type="text/javascript" src="scripts/jquery-1.8.2.min.js"></script> 
     <!-- <script type="text/javascript" src="gallery/js/jquery-1.9.0.min.js"></script> --> 
	
	<?include('iner_footer.php');?>











</body>
</html>
