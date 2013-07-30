<? 
include('constants.php');
include('check_session.php');    
  
           $work_as = $_SESSION['work_as'];   
   		   if($work_as==1){
		   $query1 = "select * from fs_talent where member_id='".$_SESSION['fab_id']."'";
           $run1 = q($query1);
		   $count = nr($run1);
		   $address = "talent_step1.php";
		   }else if($work_as==2){
		   $query1 = "select * from fs_company where member_id='".$_SESSION['fab_id']."'";
		   $run1 = q($query1);
		   $count1 = nr($run1);
		   $address = "company_step1.php";
		   } else if($work_as==3){
		   $query1 = "select * from fs_client where member_id='".$_SESSION['fab_id']."'";
		   $run1 = q($query1);
		   $count1 = nr($run1);
		   $address = "client_step1.php";
		   }

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


<body style="background:#f0f0f0;" <?if($count1==0){?> onload='GB_showCenter("","<?=URL?>/<?=$address?>");'<?}?>>
<div id="main_container">
	<?include('top.php');?>
    
    
    
        <div>
			<div class="dashboard_area">
            	<div class="dashboard_profile">
                <img src="images/inside/dashboard_profile_img.jpg" width="85" height="85" />
                	<div class="dashboard_detail">
                    	<h1><?=ucfirst($row['name'])?><span>Actor</span></h1>
                        <h2>Mum, Maharastra, India</h2>
                        <div class="edit_profile">edit profile</div>
                    </div>
                    <div class="dashboard_search">
                    	<div class="subscribe_btn_area" style="float:right;">
                        	<div class="subscribe"><a href="#">Search</a></div>
                        </div>
                        <div class="rating_line">
                        	<div class="rating_line_hover" style="width:30%;"></div>
                        </div>
                        <div class="profile_comp">30% Profile complete<br />
						<a href="#">Complete it</a>
                        </div>
                    </div>
                </div>
                
                <div class="body_update_main">
                	<div class="update_left">
                    	<div class="post_area">
                        	<ul>
							    <?if($work_as==2){?>
                            	<li><a href="post_job.php">Post Jobs</a></li>
								<li><a href="audition.php">Add Audition</a></li>
								 <?}else{?>
								<li><a href="#">Current Post</a></li>
								<li><a href="#">Current Post</a></li>
								 <?}?>
                                
                                <li><a href="#">Current Post</a></li>
                                <li><a href="#">Current Post</a></li>
                            </ul>
                        </div>
                        
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
                        	<div class="dashboard_update_topbg"><img src="images/inside/top_corn_center.png" width="434" height="6" /></div>
                            <div class="dash_update">
                            	<h1>Test</h1>
                                <p><br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</p>
                            </div>
                            <div class="dashboard_update_topbg"><img src="images/inside/bottom_corn_center.png" width="434" height="6" /></div>
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
                                <p><img src="images/inside/post_img.png" width="398" height="298" /><br />
<br />
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
                                <p>Lots of great new entries into our VIP Model Club this month. Some great guys as well as girls.<br />
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
                                <p><img src="images/inside/post_img.png" width="398" height="298" /><br />
<br />
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
                                <p>Lots of great new entries into our VIP Model Club this month. Some great guys as well as girls.<br />
...<br />
<a href="#">See More</a></p>
                          </div>
                            <div class="dashboard_update_topbg"><img src="images/inside/bottom_corn_center.png" width="434" height="6" /></div>
                        </div>
                        
                        
                    </div>
                    
                    
                    
                    <div class="matching_job_right">
                    	<div class="matching_job_area">
                        	<div class="matching_job_topbg"><img src="images/inside/matching_topbg.png" width="314" height="7" /></div>
                            
                            <div class="matching_area">
                            	<h1>Matching <span><a href="#">View All</a></span></h1>
                                
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
                            </div>
                            
                            <div class="matching_job_topbg"><img src="images/inside/matching_bottombg.png" width="314" height="7" /></div>
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
    
   <?include('inner_footer.php');?>
    
</div>
</body>
</html>
