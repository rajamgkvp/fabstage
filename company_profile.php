<?include('constants.php');

	    $query = "select * from fs_mamber where fld_id='".$_SESSION['fab_id']."'";
		$run =   q($query);
		$count = nr($run);
		$fatch = f($run);

	    $query1 = "select * from fs_company where member_id='".$_SESSION['fab_id']."'";
		$run1 =   q($query1);
		$count1 = nr($run1);
		$fatch1 = f($run1);





//******upload banner image*************
if($_FILES['pic']['name'] != ""){	//UPLOAD LOGO
	
	//LARGE PIC
	$uploaddir = 'company_banner/';
	$input_name = 'pic';
	$uploadfile = time().'_pic_'.$_FILES[$input_name]['name'];

	

	$file = $_FILES['pic'];
	//CHECK EXT
	$allowedExtensions = array( "jpg", "jpeg", "gif","png", "JPG", "JPEG", "GIF", "PNG");
	function isAllowedExtension($file){
		  global $allowedExtensions;
		  return in_array(end(explode(".", $file)), $allowedExtensions);
	}

	if($file['error'] == UPLOAD_ERR_OK){
		if(isAllowedExtension($file['name'])){
			if(move_uploaded_file($_FILES[$input_name]['tmp_name'], $uploaddir.$uploadfile)){


				
				$sql_banner = "UPDATE fs_mamber SET banner_image='".$uploadfile."' where fld_id = '".$_SESSION['fab_id']."' ";


				$sql_banner_load = q($sql_banner);
				if($sql_banner_load){
					$msg1 = ' Logo has been Added Successfully.';

                    header('location:company_profile.php');


				}
			}else{
				$msg1 = ' Logo has not been Uploaded Successfully.';
			}
										}else{
			$msg = "file type must be jpg, gif or png";
		}
	}
}	



//******************







?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>




<script>
function EvalSound(soundobj) {
  var thissound=document.getElementById(soundobj);
  thissound.play();
}
</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FabStage.Com</title>
<link href="css/inside_css.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/slider.css" />

<style>
		.links{margin:10px;}
		.links a{display:inline-block; padding:3px 15px; margin:7px 10px; background:#444; text-decoration:none; -webkit-border-radius:15px; -moz-border-radius:15px; border-radius:15px;}
		.links a:hover{background:#eb3755; color:#fff;}
		.output{margin:20px 40px;}
		code{color:#5b70ff;}
		.content{ width:580px; height:185px; padding:10px; overflow:auto; background:#444; -webkit-border-radius:2px; -moz-border-radius:2px; border-radius:2px;}
		.content .images_container{overflow:hidden;}
		.content .images_container img{display:block; float:left; margin:0px; border:5px solid #777;}
		a[rel='toggle-buttons-scroll-type']{display:inline-block; text-decoration:none; padding:3px 15px; -webkit-border-radius:15px; -moz-border-radius:15px; border-radius:15px; background:#000; margin:5px 20px 5px 0;}
	</style>
    
    <link href="css/jquery.css" rel="stylesheet">

	<!-- sCRIPT TO DISPLAY GRAYBOX -->
		<script type="text/javascript">
			var GB_ROOT_DIR = "greybox/";
		</script>
		<script type="text/javascript" src="greybox/AJS.js"></script>
		<script type="text/javascript" src="greybox/AJS_fx.js"></script>
		<script type="text/javascript" src="greybox/gb_scripts.js"></script>
		<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />



		<!------ show hide div ------>
       


<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script> 
<script type="text/javascript">
$(function() {
$('.showhide').click(function() {
$(".slidediv").slideToggle();
});
});
</script>



<style type="text/css">
.slidediv{
width: 30%;
padding:30px;
background:#66ccff;
color:#fff;
margin-top:10px;
border-bottom:5px solid #FFF;
display:none;
}

</style>

 <!------------>


<script>
 function validate(){

	var errText = "";
	var errorflag = false;
	


		if(document.upload_form.pic.value == "" ){
		 errText = "- Please  Browse the Banner Image.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.pic.focus();
		 return false;
	}	



	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }
 </script>
</head>

<body style="background:#f0f0f0;">

<?include('left_company_tab.php');?> 
<div id="main_container">
	
	
	<?include('top.php');?> 
    
    <div>
    
    <div class="profile_body">
        	<div class="profile_left_area">
            	<div class="profile_headline" style="width:1000px;">
                <ul>
                <li><a href="#" class="active">Profile</a></li>
                   <li><a href="#">About Us</a></li> 
                    <li><a href="company_gallery.php">Portfolio</a></li>
                    <li><a href="company_project.php">Projects</a></li>
                    <li><a href="#">Jobs with Us</a></li>
					<li><a href="company_contact.php">Contact Us</a></li>
                </ul>
                </div>
                </div></div>







				
				
				
				
				      
				
  






    <div style="margin:0px auto;width:1000px;">
<table width="100%">
  <tr>
    <td valign="top" style="height:300px; width:1000px;background:url('company_banner/<?=$fatch['banner_image']?>') left top no-repeat; background-size:1000px auto;">
	  
	   
<!------edit banner------------>	   
	   <div class="upload_btn"><a href="#" class="showhide">Edit Banner</a></div>	
	      <div class="slidediv" style="float:right;clear:both;">
	   
	   
						  <form name="upload_form" action="" method="POST" onSubmit="return validate();" enctype="multipart/form-data" autocomplete="off">
												<table cellpadding="2" cellspacing="2">
												 
													   <tr>
															<td ><span class="style1">*</span>&nbsp;<span> Banner</span> </td>
															<td><input name="pic" type="file" value="" id="pic" size="60" >
															</td>
													  </tr>
													  <tr>
															<td colspan="2" height="8"></td>
													  </tr>
													
													   <tr>
														  <td>&nbsp;</td>
															<td>
															  <input type="submit" value="Upload Banner" name="Submit">
														   </td>
														</tr>
												</table>
							<form>
	   
	   
	   
	   
	   </div>
 <!-------------------> 




	 </td>
  </tr>

</table>
</div>
    
     
  <div class="profile_body">
        	<div class="profile_left_area">
                 
              <div class="profile_name" style="margin-top:0px;">
              <div style="float:left; width:auto;"><img src="example13/files/games/<?=$_SESSION['fab_id']?>_tb.jpg" width="70" height="70" /></div>
                	
					
					
				



				<h1 style="line-height:75px; padding-left:15px;"><?=$fatch['name']?></h1>
                   <? $job_list = f(q("Select * from fs_company_contact Where company_id = '".$_SESSION['fab_id']."' order by fld_id asc limit 1"));?>
                    <h2><?=$job_list['address']?></h2>
                </div>
                
                
                
                
                <div class="profile_headline"><h1>Services As</h1></div>
                <div class="actor_list">

				<?
					$dif_array = explode(",", $fatch1['main_skill']);
				  	foreach ($dif_array as &$value1) {
						if($value1!=''){
				  ?>
                	<ul>
					     	<!-- <li><a href="#" style="border:none;"><?=$value1?></a></li> -->
							<li><a href="#"><?=$value1?></a></li>
						 <?}}
						
						?>
						
                       	
                    </ul>
                </div>
                
                <div class="profile_slide">
                
                <link rel="stylesheet" type="text/css" href="css/tabcontent1.css" />
				<script type="text/javascript" src="js/tabcontent.js"></script>
                	<div class="seller-prod-box">
       
        <div class="toptabbg">
        <div id="flowertabs" class="modernbricksmenu2">
        <ul>
            <li><a href="#" rel="tcontent1" class="selected"><span>Photo</span>  </a></li>
            <li><a href="#" rel="tcontent2"><span>Audio</span></a></li>
             <li><a href="#" rel="tcontent3"><span>Video</span></a></li>
        </ul>
        </div>
        </div>
            
     <div style="clear: left"></div>
     
     
     <div class="main-prod-mid">
        <div style="clear: left"></div>
        <div id="tcontent1" class="tabcontent">
        
        <link href="css/amazon_scroller.css" rel="stylesheet" type="text/css"></link>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/amazon_scroller.js"></script>
        
        <script language="javascript" type="text/javascript">
            $(function() {
				$("#amazon_scroller3").amazon_scroller({
                    scroller_title_show: 'enable',
                    scroller_time_interval: '3000',
                    scroller_window_background_color: "none",
                    scroller_images_width: '124',
                    scroller_images_height: '160',
                    scroller_title_size: '11',
                    scroller_title_color: 'black',
                    scroller_show_count: '5',
                    directory: 'images'
                });
            });
        </script>
        
        	<div id="amazon_scroller3" class="amazon_scroller">
                   <div class="amazon_scroller_mask">
                       <ul>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                           <li><img src="http://fs.sitebysite.us/company_portfolio_uploader/savefiles/newprofileimage.jpg" width="124" height="160"/></li>
                       </ul>
                   </div>
                   <ul class="amazon_scroller_nav">
                       <li></li>
                       <li></li>
                   </ul>
                   <div style="clear: both"></div>
               </div>
               
               
               
               
        </div>

   <div id="tcontent2" class="tabcontent">
	
	    bbbbbbbbbbbbbbbbb
		
		
		</div>


        <div id="tcontent3" class="tabcontent">
		
		

			  cccccccccccccccccccc

		</div>

		</div>
     
     
	    </div>
        <script type="text/javascript">

		var countries=new ddtabcontent("countrytabs")
		countries.setpersist(true)
		countries.setselectedClassTarget("link") //"link" or "linkparent"
		countries.init()
		
		</script>
		<script type="text/javascript">
		
		var myflowers=new ddtabcontent("flowertabs")
		myflowers.setpersist(true)
		myflowers.setselectedClassTarget("link") //"link" or "linkparent"
		myflowers.init()
		
		</script>
                </div>
                
                <!-- <div class="profile_headline"><h1>Physical Statistics</h1></div>
                <div class="actor_list">
                	<div class="height">Height</div> <div class="height_text"><?=$fatch1['height']?></div>
                    <div class="height">Eye Color</div> <div class="height_text"><?=$fatch1['eye']?></div>
                    <div class="height">Weight</div> <div class="height_text"><?=$fatch1['weight']?></div>
                    <div class="height">Hair Color</div> <div class="height_text"><?=$fatch1['hair']?></div>


                    <div class="height">Brest/Chest</div> <div class="height_text"><?=$fatch1['bust_chest']?></div>
					<div class="height">Waist</div> <div class="height_text"><?=$fatch1['waist']?></div>
					<div class="height">Hips</div> <div class="height_text"><?=$fatch1['hips']?></div>

                    <div class="height">Skin Color</div> <div class="height_text"><?=$fatch1['skin']?></div>
                    <div class="height">Ethenticity</div> <div class="height_text"><?=$fatch1['ethenicity']?></div>
                    <div class="height">Shoe Size</div> <div class="height_text"><?=$fatch1['shoes']?></div>
                    <div class="height">Body Type</div> <div class="height_text"><?=$fatch1['body']?></div>
                    <div class="height">Dress Size</div> <div class="height_text"><?=$fatch1['dress']?></div>
                    <div class="height">Look Alike</div> <div class="height_text"><?=$fatch1['look']?></div>
                </div> -->
                
            <div class="white_detail">
                	<div class="white_area">
                    	<h1>About Us</h1>
                        <p><?=$fatch1['summary']?></p>
                    </div>
              </div>
              
              <div class="profile_headline"><h1>Expertise</h1></div>
                <div class="actor_list">
					<? $dif_array1 = explode(",", $fatch1['expectation']); 
					   foreach ($dif_array1 as &$value11) {
						if($value11!=''){
					
					?>

                	<div class="runway"><?=ucwords($value11)?></div>

					<?}}?>

                 
                </div>
                
                <div class="white_detail">
                    <div class="white_area">
                    	<h1>Professional Details</h1>
						
                         <?
						     $work_area = str_replace('_',' ',$fatch1['work_area']);
						 ?>
                        <div class="height">Work Area</div> <div class="height_text"><?=ucwords($work_area)?></div>
                        <div class="height">Association Name</div> <div class="height_text"><?=ucwords($fatch1['association_name'])?></div>



                        <!-- <div class="height">Language Known</div> <div class="height_text"><?=$fatch1['language']?></div>
                        <div class="height">Wages Expectation</div> <div class="height_text"><?=$fatch1['amount']?></div>
                        <div class="height">Registered With</div> <div class="height_text"><?=$fatch1['association_name']?></div>
                        <div class="height">Interested to work</div> <div class="height_text"><?=$fatch1['work_area']?></div> -->
                    </div>
              </div>
                




                <!-- <div class="profile_headline"><h1>Personal Details</h1></div>
                <div class="actor_list">
                	<div class="gender">Gender</div> <div class="gender_text"><?=ucfirst($fatch1['gender'])?></div>
                    <div class="gender">DOB</div> <div class="gender_text"><?=$fatch1['dob']?></div> -->

				<!-----Calculate birthday how year old now ------->
				<!-- <?php
					 //date in mm/dd/yyyy format; or it can be in other formats as well
					 $birthDate = $fatch1['dob'];
					 //explode the date to get month, day and year
					 $birthDate = explode("-", $birthDate);
					 //get age from date or birthdate
					 $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
					// echo "Age is:".$age;
				?> -->


                    <!-- <div class="gender">Age</div> <div class="gender_text"><?=$age?></div>

                    <div class="gender">Marital Status</div> <div class="gender_text"><?=ucfirst($fatch1['marital'])?></div>
                    <div class="gender">Nationality</div> <div class="gender_text"><?=$fatch1['nationality']?></div>
                    <div class="gender">Language Kmown</div> <div class="gender_text"><?=$fatch1['language']?></div>
                    <div class="gender">Extra Skills</div> <div class="gender_text"><?=$fatch1['extra_skill']?></div>
                </div> -->
                
                
            </div>
            
          <div class="profile_right_area" style="margin-top:55px;">
           	  <div>
              	<div class="profile_rating_area">Rating: 6/10 <img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/grey_star1.png" /><img src="images/inside/grey_star1.png" /><img src="images/inside/grey_star1.png" /><img src="images/inside/grey_star1.png" /></div>
                <div class="like_box">3</div>
                <input class="profile_like" name="" type="button" style="background:url(images/like_button.png) left top no-repeat; width:32px; height:30px; cursor:pointer;" />
                <!--<div class="profile_like"><a href="#"><img src="images/like_button.png" /></a></div>-->
              </div>
              
            <!-- <div class="profile_right_headline"><h1>Sponsored Profile</h1></div> -->
			 <div class="profile_right_headline" style="margin-top:24px;"><h1>Similar Profiles</h1></div>
              
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  <div class="actor_profile">
              	<ul>
                		  <!----------Fatch matched skill talent -------------------->

					<?
					    $main_skill = $fatch1['main_skill'];
						$main_skill = str_replace(',,',',', $main_skill);
						if($main_skill!=''){ 
		                $skill = explode(",",$main_skill);
						  foreach ($skill as &$value) {
										 //echo "<br/>";
										//echo $value;
									   if($value!=""){


				                      $sql_match = "SELECT * FROM fs_company WHERE main_skill LIKE '%".$value."%'  AND member_id != '".$_SESSION['fab_id']."' ORDER BY RAND()"; 
									  $run_match = q($sql_match);
									  while($fatch_match = f($run_match)) {
									  
									  $array1 .=	$fatch_match['member_id'];
									  $array1.=",";
									  }

									   }

									 }
								     //echo $array1;
                                    // echo "kjhg"; 




									$i =1;
									$dif_array1 = explode(",", $array1);
									$red_array1 = array_unique($dif_array1);
									foreach ($red_array1 as &$value11) { 
										   if($i<=12 ){

									  if($value11!="")	{

										//echo $value11;
									  $sql_match_q = "SELECT * FROM fs_company WHERE member_id = '".$value11."'"; 
									  $sql_run_q = q($sql_match_q);
									  $fatch_q_u = f($sql_run_q);
									    
										    $sql_match_q_q = "SELECT * FROM fs_mamber WHERE fld_id = '".$value11."'"; 
									        $sql_run_q_q = q($sql_match_q_q);
									        $fatch_q_u_q = f($sql_run_q_q);
												  
										$job_con = f(q("Select * from fs_company_contact Where company_id = '".$_SESSION['fab_id']."' order by fld_id asc LIMIT 1"));		
											      
									  ?>

										<li>
										        
												  <img src="<?=$fatch_q_u_q['profile_crop_image']?>" width="51" height="51" /> 
													<h1><a href="#"><?=$fatch_q_u_q['name']?></a></h1>
													<h2><?=substr($fatch_q_u['main_skill'],1,30)?></h2>
													<h2><?=$job_con['address']?></h2>
                                       </li>

								 <?
									  }	  
								 }



									$i = $i+1;}
						}
					?>

                </ul>
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
