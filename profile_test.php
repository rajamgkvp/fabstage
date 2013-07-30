<?include('constants.php');

	    $query = "select * from fs_mamber where fld_id='".$_SESSION['fab_id']."'";
		$run =   q($query);
		$count = nr($run);
		$fatch = f($run);

	    $query1 = "select * from fs_talent where member_id='".$_SESSION['fab_id']."'";
		$run1 =   q($query1);
		$count1 = nr($run1);
		$fatch1 = f($run1);

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
</head>

<body style="background:#f0f0f0;">
<div id="main_container">
	
<?include('top.php');?> 	
    
    <div>
    	<div class="profile_body">
        	<div class="profile_left_area">
            	<div class="profile_headline">
                <ul>
                	<li><a href="#" class="active">Profile</a></li>
                    <li><a href="#">Biography</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="#">Work History</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
                </div>
                
              <div class="profile_name">
                	<h1><?=$fatch['name']?></h1>
                    <div class="subscribe_btn_area">
                    	<div class="subscribe"><a href="#">+Select</a></div>
                        <!--<div class="subscribe"><a href="#">Subscribe</a></div>-->
                    </div>
                    <h2><?=$fatch1['location']?></h2>
                    
                    
                </div>
                
                
                
                
                <div class="profile_headline"><h1>Available As</h1></div>
                <div class="actor_list">

				<?
					$dif_array = explode(",", $fatch1['main_skill']);
				  	foreach ($dif_array as &$value1) {
						if($value1!=''){
				  ?>
                	<ul>
					     	
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
        	<!-- Scroll Slider Start -->
            <div id="content_1" class="content mCustomScrollbar _mCS_1"><div class="mCustomScrollBox mCS-light mCSB_horizontal" id="mCSB_1" style="position:relative; height:100%; overflow:hidden; max-width:100%;"><div class="mCSB_container" style="position: relative; left: 0px; width: 1856px;">
		<div class="images_container">

			  <?
			  $qu = "select * from fs_portfolio_talent_photo where ex_id = '".$_SESSION['fab_id']."'";
			  $ru = q($qu);
			  while($f = f($ru)){
			  ?>

			<img src="admin/portfolio_talent_pic/<?=$f['large_pic']?>" width="113" height="151" />
			<?}?>
    

        </div>

	</div>
	
	
	<div class="mCSB_scrollTools" style="position: absolute; display: block;"><a class="mCSB_buttonLeft" oncontextmenu="return false;"></a><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; width: 169px; left: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position:relative;"></div></div><div class="mCSB_draggerRail"></div></div><a class="mCSB_buttonRight" oncontextmenu="return false;"></a></div></div></div>
	
	<!-- Google CDN jQuery with fallback to local -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/minified/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
	<!-- custom scrollbars plugin -->
	<script type="text/javascript" src="js/jquery_002.js"></script>
	<script>
		(function($){
			$(window).load(function(){
				$("#content_1").mCustomScrollbar({
					scrollInertia:550,
					horizontalScroll:true,
					mouseWheelPixels:116,
					scrollButtons:{
						enable:true,
						scrollType:"pixels",
						scrollAmount:116
					},
					callbacks:{
						onScroll:function(){ snapScrollbar(); }
					}
				});
				/* toggle buttons scroll type */
				var content=$("#content_1");
				$("a[rel='toggle-buttons-scroll-type']").html("<code>scrollType: \""+content.data("scrollButtons_scrollType")+"\"</code>");
				$("a[rel='toggle-buttons-scroll-type']").click(function(e){
					e.preventDefault();
					var scrollType;
					if(content.data("scrollButtons_scrollType")==="pixels"){
						scrollType="continuous";
					}else{
						scrollType="pixels";
					}
					content.data({"scrollButtons_scrollType":scrollType}).mCustomScrollbar("update");
					$(this).html("<code>scrollType: \""+content.data("scrollButtons_scrollType")+"\"</code>");
				});
				/* snap scrollbar fn */
				var snapTo=[];
				$("#content_1 .images_container img").each(function(){
					var $this=$(this),thisX=$this.position().left;
					snapTo.push(thisX);
				});
				function snapScrollbar(){
					var posX=$("#content_1 .mCSB_container").position().left,closestX=findClosest(Math.abs(posX),snapTo);
					$("#content_1").mCustomScrollbar("scrollTo",closestX,{scrollInertia:350,callbacks:false});
				}
				function findClosest(num,arr){
	                var curr=arr[0];
    	            var diff=Math.abs(num-curr);
        	        for(var val=0; val<arr.length; val++){
            	        var newdiff=Math.abs(num-arr[val]);
                	    if(newdiff<diff){
                    	    diff=newdiff;
                        	curr=arr[val];
                    	}
                	}
                	return curr;
            	}
			});
		})(jQuery);
	</script>
    
    <!-- Scroll slider close -->
        </div>

   <div id="tcontent2" class="tabcontent">
	
	    <div id="content_1" class="content mCustomScrollbar _mCS_1"><div class="mCustomScrollBox mCS-light mCSB_horizontal" id="mCSB_1" style="position:relative; height:100%; overflow:hidden; max-width:100%;"><div class="mCSB_container" style="position: relative; left: 0px; width: 1856px;">
		<div class="images_container">

			  <?
			  $qu2 = "select * from fs_portfolio_talent_audio where ex_id = '".$_SESSION['fab_id']."'";
			  $ru2 = q($qu2);
			  while($f2 = f($ru2)){
			  ?>

			<a  href="admin/portfolio_talent_audio/<?=$f2['large_pic']?>"><img src="images/mp3.png" alt="<?=$f2['title']?>" width="106" height="151"></a>
			
			
			<?}?>
    

        </div>

	</div>

	<div class="mCSB_scrollTools" style="position: absolute; display: block;"><a class="mCSB_buttonLeft" oncontextmenu="return false;"></a><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; width: 169px; left: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position:relative;"></div></div><div class="mCSB_draggerRail"></div></div><a class="mCSB_buttonRight" oncontextmenu="return false;"></a></div></div></div>


<script src="http://mediaplayer.yahoo.com/js"></script>
		
		
		</div>


        <div id="tcontent3" class="tabcontent">
		
		

			  <div id="content_1" class="content mCustomScrollbar _mCS_1"><div class="mCustomScrollBox mCS-light mCSB_horizontal" id="mCSB_1" style="position:relative; height:100%; overflow:hidden; max-width:100%;"><div class="mCSB_container" style="position: relative; left: 0px; width: 1856px;">
		<div class="images_container">

			  <?
			  $qu1 = "select * from fs_portfolio_talent_video where ex_id = '".$_SESSION['fab_id']."'";
			  $ru1 = q($qu1);
			  while($f1 = f($ru1)){
			  ?>

			<iframe width="113" height="151" src="<?=$f1['large_pic']?>" frameborder="0" allowfullscreen></iframe>
			<?}?>
    

        </div>

	</div>
	
	
	<div class="mCSB_scrollTools" style="position: absolute; display: block;"><a class="mCSB_buttonLeft" oncontextmenu="return false;"></a><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; width: 169px; left: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position:relative;"></div></div><div class="mCSB_draggerRail"></div></div><a class="mCSB_buttonRight" oncontextmenu="return false;"></a></div></div></div>

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
                
                <div class="profile_headline"><h1>Physical Statistics</h1></div>
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
                </div>
                
            <div class="white_detail">
                    <div class="white_area">
                    	<h1>About Me</h1>
                        <p><?=$fatch1['about']?></p>
                    </div>
                    
              </div>
              
              <div class="profile_headline"><h1>Feature Disciplines</h1></div>
                <div class="actor_list">
					<? $dif_array1 = explode(",", $fatch1['extra_skill']); 
					   foreach ($dif_array1 as &$value11) {
						if($value11!=''){
					
					?>

                	<div class="runway"><?=$value11?></div>

					<?}}?>

                 
                </div>
                
                <div class="white_detail">
                    <div class="white_area">
                    	<h1>Professional Details</h1>		 
                        <div class="height">Working With</div> <div class="height_text"><?=$fatch1['current_comp']?></div>
                        <div class="height">Experience</div> <div class="height_text"><?=$fatch1['experience']?></div>
                        <div class="height">Language Known</div> <div class="height_text"><?=$fatch1['language']?></div>
                        <div class="height">Wages Expectation</div> <div class="height_text"><?=$fatch1['amount']?></div>
                        <div class="height">Registered With</div> <div class="height_text"><?=$fatch1['association_name']?></div>
                        <div class="height">Interested to work</div> <div class="height_text"><?=$fatch1['work_area']?></div>
                    </div>
              </div>
                
                <div class="profile_headline"><h1>Personal Details</h1></div>
                <div class="actor_list">
                	<div class="gender">Gender</div> <div class="gender_text"><?=ucfirst($fatch1['gender'])?></div>
                    <div class="gender">DOB</div> <div class="gender_text"><?=$fatch1['dob']?></div>

			
				<?php
					 //date in mm/dd/yyyy format; or it can be in other formats as well
					 $birthDate = $fatch1['dob'];
					 //explode the date to get month, day and year
					 $birthDate = explode("-", $birthDate);
					 //get age from date or birthdate
					 $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
					// echo "Age is:".$age;
				?>


                    <div class="gender">Age</div> <div class="gender_text"><?=$age?></div>

                    <div class="gender">Marital Status</div> <div class="gender_text"><?=ucfirst($fatch1['marital'])?></div>
                    <div class="gender">Nationality</div> <div class="gender_text"><?=$fatch1['nationality']?></div>
                    <div class="gender">Language Kmown</div> <div class="gender_text"><?=$fatch1['language']?></div>
                    <div class="gender">Extra Skills</div> <div class="gender_text"><?=$fatch1['extra_skill']?></div>
                </div>
                
                
            </div>
            
          <div class="profile_right_area">
           	  <div>
              	<div class="profile_rating_area">Rating: 6/10 <img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/grey_star.png" /><img src="images/inside/grey_star.png" /><img src="images/inside/grey_star.png" /><img src="images/inside/grey_star.png" /></div>
                
                <div class="profile_like"><a href="#"><img src="images/inside/like_tab.png" /></a></div>
              </div>
              <div class="profile_img"><img width="320" src="<?=$fatch['profile_image']?>" /></div>
              
       
			 <div class="profile_right_headline"><h1>Other Talent Profile</h1></div>
			
              <div class="actor_profile">
              	<ul>
                		 

					<?
					    $main_skill = $fatch1['main_skill'];
						$main_skill = str_replace(',,',',', $main_skill);
						if($main_skill!=''){ 
		                $skill = explode(",",$main_skill);
						  foreach ($skill as &$value) {
										// echo "<br/>";
										//echo $value;
									   if($value!=""){


				                      $sql_match = "SELECT DISTINCT member_id FROM fs_talent WHERE main_skill LIKE '%".$value."%'  AND member_id != '".$_SESSION['fab_id']."' order by member_id DESC "; 
									  $run_match = q($sql_match);
									  while($fatch_match = f($run_match)) {
									  
									  $array1 .=	$fatch_match['member_id'];
									  $array1.=",";
									  }

									   }

									 }
								 //echo $array1;
									$i =1;
									$dif_array1 = explode(",", $array1);
									$red_array1 = array_unique($dif_array1);
									foreach ($red_array1 as &$value11) { 
										   if($i<=12 ){

									  if($value11!="")	{

										//echo $value11;
									  $sql_match_q = "SELECT * FROM fs_talent WHERE member_id = '".$value11."'"; 
									  $sql_run_q = q($sql_match_q);
									  $fatch_q_u = f($sql_run_q);
									    
										    $sql_match_q_q = "SELECT * FROM fs_mamber WHERE fld_id = '".$value11."'"; 
									        $sql_run_q_q = q($sql_match_q_q);
									        $fatch_q_u_q = f($sql_run_q_q);
												  
												  $sql_match_q_q1 = "SELECT * FROM fs_portfolio_talent_photo WHERE ex_id = '".$value11."'"; 
												  $sql_run_q_q1 = q($sql_match_q_q1);
												  $fatch_q_u_q1 = f($sql_run_q_q1);
											      
									  ?>

										<li>
										<?
										   if($fatch_q_u_q['profile_image']!=""){		   
										
										?>
												  <img src="<?=$fatch_q_u_q['profile_image']?>" width="51" height="51" /> 
                                       <?}else{?>
                                               <img src="images/no_no_image.jpg" width="51" height="51" /> 
									   <?}?>
													<h1><a href="#"><?=$fatch_q_u_q['name']?></a></h1>
													<h2>Actor</h2>
													<h2><?=$fatch_q_u['location']?></h2>
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
