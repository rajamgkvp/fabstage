<? 
include('constants.php');
include('check_session.php');    
  
           	 
		   $query1 = "select * from fs_company where member_id='".$_SESSION['fab_id']."'";
		   $run1 = q($query1);
		   $count1 = nr($run1);
		   $address = "company_step1.php";
		   
		   if($count1!=0){
			  $fatch1 =  f($run1);
		   	  $_SESSION['fld_id'] = $fatch1['fld_id'];
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


<body style="background:#f0f0f0;" <?if($count1==0){?> onload='GB_showCenter("","http://fs.sitebysite.us/<?=$address?>",600,600);'<?}?>>
<div id="main_container">
	<div class="header_nav">
    	<div class="header_main">
        	<div class="header_logo"><img src="images/inside/fab_logo.png" /></div>
            <div class="head_nav">
            	<ul>
                	<li><a href="#" >Home</a></li>          
                    <li><a href="#">Find Talent</a></li>
                    <li><a href="#">Companies & Agencies</a></li>
                    <li><a href="#">Jobs & Auditions</a></li>
                    <li><a href="#">Ask & Articles</a></li>
                    <li><a href="#">Market Place</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="search_area">
    	<div class="search_main">
        	<div class="talent_area">
                <link rel="stylesheet" href="css/index_002.css" media="screen and (min-width: 1200px)">
                <link type="text/css" rel="stylesheet" href="css/index_004.css">

				<script type="text/javascript" src="js/index.js"></script>
            	<div id="careersDropNav" style="padding-top:12px;">
                    <div class="rowElem">
                        <div style="z-index: 10; width: 251px;" class="jqTransformSelectWrapper">
                            <div>
                                <span style="width: 210px;">Talent</span><a href="#" class="jqTransformSelectOpen"></a>
                            </div>
                            <ul style="height: 155px; width: 249px; display: none;">
                                <li class="first"><a href="#">Talent</a></li>
                                <li><a href="#">Companies</a></li>
                                <li><a href="#">Agencies</a></li>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Auditions</a></li>
                            </ul>
                        </div>
                    </div>
                   </div>
            </div>
            <select name="" class="category_input">
            	<option>Category</option>
            </select>
            <select name="" class="category_input">
            	<option>Location</option>
            </select>
            <select name="" class="category_input">
            	<option>Experience</option>
            </select>
            <div class="gender">Gender:</div>
            <input name="" type="radio" value="" class="gender_radio" />
            <div class="gender">Male</div>
            <input name="" type="radio" value="" class="gender_radio" />
            <div class="gender">Female</div>
            <input name="" type="button" value="Search" class="search_btn" />
        </div>
    </div>
    
    
    
    
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
							    <li><a href="post_job.php">Post Jobs</a></li>
								<li><a href="audition.php">Add Audition</a></li>
                                <li><a href="#">Current Post</a></li>
                                <li><a href="#">Current Post</a></li>
								<li><a href="#">Current Post</a></li>
                                <li><a href="logout.php">Logout</a></li>
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
