<?include('constants.php');
$id=$_REQUEST['talent_id'];
	    $query = "select * from fs_mamber where fld_id='".$id."'";
		$run =   q($query);
		$count = nr($run);
		$fatch = f($run);

	    $query1 = "select * from fs_talent where member_id='".$id."'";
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
<script type="text/javascript" src="ajax.js"></script>

<script type="text/JavaScript">

 //GET A QUOTE VALUE
 function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	

//CHECK DATE VALIDATION / OLD DATE
    function getlike(id1) {		
	
    	var strURL='get_like_talent.php?id1='+id1+'&tid=<?=$_REQUEST['talent_id']?>';
		var req = getXMLHTTP();
		//alert(strURL);
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "ok"
					if (req.status == 200) {		
						//alert(req.responseText);
						document.getElementById('like_box1').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
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
<? 
   if($_SESSION['work_as']==2){
   include('left_company_tab.php');
}else {

 include('left_tab.php');
}

?> 
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
                    <div class="subscribe_btn_area" style="width:220px;">
					  <?
					   if($_SESSION['work_as']==2){
					 ?>
                    	 <!-- <div class="subscribe"><a href="#">+Select</a></div> -->
                         	<div style="float:right;color:#6BC0F7;">
							<?
							  if($_REQUEST['status']==2){
							
							echo  "Selection Successfully Done ";
							}else  if($_REQUEST['status']==1){
							
							echo  "This Talent is already in a list for selected job role. ";	
							}?>
							</div>
							<ul class="loginBtn">
                                    <li class="first-tab select-box">
									<select class="selected" title="Select one" id="selectbox" name="selectbox" onchange="javascript:if(confirm('Select this option?'))location.href = this.value;">
                                       
									 
										<option value="" selected>Select </option>
										   <optgroup label=""></optgroup>
										  <optgroup label="JOB">
                                       <?
								
							            $job_list = q("select * from fs_job where company_id = ".$_SESSION['fab_id']."");
										while($ftc = f($job_list)){
							           ?>
										<option value="select_for_job.php?job_id=<?=$ftc['fld_id']?>&talent_id=<?=$_REQUEST['talent_id']?>&company_id=<?=$_SESSION['fab_id']?>"><?=$ftc['title']?></option>
                                        <?}?>
									   </optgroup>
									   <optgroup label=""></optgroup>
									   <optgroup label="AUDITION">
									  
                                       <?
                                       $j_list = q("select * from  fs_oudition where company_id = ".$_SESSION['fab_id']."");
										while($ftcc = f($j_list)){?>

                                         <option value="select_for_audition.php?audition_id=<?=$ftcc['fld_id']?>&talent_id=<?=$_REQUEST['talent_id']?>&company_id=<?=$_SESSION['fab_id']?>"><?=$ftcc['title']?>
										 </option>

									  <?}
                                      ?>
									   </optgroup>
                                     </select></li>
                            </ul>




						<?
			               }
					    ?>
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
                
                <div class="profile_headline"><h1>Physical Statistics</h1></div>
                <div class="actor_list">
                	<div class="height">Height</div> 
					<?if($fatch1['height']!=''){?>
					<div class="height_text"><?=$fatch1['height']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>
                  

                    <div class="height">Eye Color</div> 

					<?if($fatch1['eye']!=''){?>
					<div class="height_text"><?=$fatch1['eye']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>

					

                    <div class="height">Weight</div> 

					<?if($fatch1['weight']!=''){?>
					<div class="height_text"><?=$fatch1['weight']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>

					

                    <div class="height">Hair Color</div> 

					<?if($fatch1['hair']!=''){?>
					<div class="height_text"><?=$fatch1['hair']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>

					


                    <div class="height">Brest/Chest</div> 
					
				
                    <?if($fatch1['bust_chest']!=''){?>
					<div class="height_text"><?=$fatch1['bust_chest']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>







					<div class="height">Waist</div> 
					
					<?if($fatch1['waist']!=''){?>
					<div class="height_text"><?=$fatch1['waist']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>


					<div class="height">Hips</div> 
					
					<?if($fatch1['hips']!=''){?>
					<div class="height_text"><?=$fatch1['hips']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>


                    <div class="height">Skin Color</div> 
					
					<?if($fatch1['skin']!=''){?>
					<div class="height_text"><?=$fatch1['skin']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>


                    <div class="height">Ethenticity</div> 
					
					<?if($fatch1['ethenicity']!=''){?>
					<div class="height_text"><?=$fatch1['ethenicity']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>


                    <div class="height">Shoe Size</div> 
					
					<?if($fatch1['shoes']!=''){?>
					<div class="height_text"><?=$fatch1['shoes']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>


                    <div class="height">Body Type</div> 
					
					<?if($fatch1['body']!=''){?>
					<div class="height_text"><?=$fatch1['body']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>


                    <div class="height">Dress Size</div> 
					
					<?if($fatch1['dress']!=''){?>
					<div class="height_text"><?=$fatch1['dress']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>


                    <div class="height">Look Alike</div> 
					
					<?if($fatch1['look']!=''){?>
					<div class="height_text"><?=$fatch1['look']?></div>
                    <?}else{?>
					<div class="height_text">N/A</div>
                    <?}?>

                </div>


                
            <div class="white_detail">
                    <div class="white_area">
                    	<h1>About Me</h1>

                        <p>
						<?if($fatch1['about']!=''){?>
						<?=$fatch1['about']?>
						<?}else{?>
						No Any Information Available
						<?}?>
						</p>
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
                        <div class="height">Working With</div> 
						
						<?if($fatch1['current_comp']!=''){?>
								<div class="height_text"><?=$fatch1['current_comp']?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>
						
                        <div class="height">Experience</div> 
						
							<?if($fatch1['experience']!=''){?>
								<div class="height_text"><?=$fatch1['experience']?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>
						
                        <div class="height">Language Known</div> 


						
							<?if($fatch1['language']!=''){?>
								<div class="height_text"><?=$fatch1['language']?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>
						
                        <div class="height">Wages Expectation</div>
						
							<?if($fatch1['amount']!=''){?>
								<div class="height_text"><?=$fatch1['amount']?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>
						
                        <div class="height">Registered With</div> 
						
							<?if($fatch1['association_name']!=''){?>
								<div class="height_text"><?=$fatch1['association_name']?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>
						
                        <div class="height">Interested to work</div> 
						
							<?if($fatch1['work_area']!=''){?>
								<div class="height_text"><?=$fatch1['work_area']?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>
						
                    </div>
              </div>
                
                <div class="profile_headline"><h1>Personal Details</h1></div>
                <div class="actor_list">
                	<div class="gender">Gender</div> 
					    <?if($fatch1['gender']!=''){?>
								<div class="gender_text"><?=ucfirst($fatch1['gender'])?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>
					
					
                    <div class="gender">DOB</div> 
					
					<?if($fatch1['dob']!=''){?>
								<div class="gender_text"><?=$fatch1['dob']?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>
					

			
				<?php
					 //date in mm/dd/yyyy format; or it can be in other formats as well
					 $birthDate = $fatch1['dob'];
					 //explode the date to get month, day and year
					 $birthDate = explode("-", $birthDate);
					 //get age from date or birthdate
					 $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
					// echo "Age is:".$age;
				?>
                      <?if($fatch1['dob']!=''){?>

                    <div class="gender">Age</div> <div class="height_text"><?=$age?></div>
                    <?}else{?>
					  <div class="gender">Age</div> <div class="height_text">N/A</div>
					<?}?>
                    <div class="gender">Marital Status</div> 
					
					
                  
                     <?if($fatch1['marital']!=''){?>
								<div class="gender_text"><?=ucfirst($fatch1['marital'])?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>




					<div class="gender">Nationality</div> 
                    <?if($fatch1['nationality']!=''){?>
								<div class="gender_text"><?=$fatch1['nationality']?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>
                  

					
					
                    
					<div class="gender">Language Kmown</div> 
					 <?if($fatch1['language']!=''){?>
								<div class="gender_text"><?=$fatch1['language']?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>
					
					
					
                    
					<div class="gender">Extra Skills</div> 
					 <?if($fatch1['extra_skill']!=''){?>
								<div class="gender_text"><?=$fatch1['extra_skill']?></div>
								<?}else{?>
								<div class="height_text">N/A</div>
                        <?}?>
					
					
                </div>
                
                
            </div>
            
          <div class="profile_right_area">
           	  <div>
              	<div class="profile_rating_area">Rating: 6/10 <img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/yellow_star.png" /><img src="images/inside/grey_star1.png" /><img src="images/inside/grey_star1.png" /><img src="images/inside/grey_star1.png" /><img src="images/inside/grey_star1.png" /></div>
                <?
				$sqll="select * from fs_talent_likes where talent_id='".$id."'";
				$resl=q($sqll);
				$countl=nr($resl);
				$rowl=f($resl);
				if($countl>0){
				$value = $rowl['counter'];
				}else{
				$value = '0';
				}
				?>

				<div class="like_box" id="like_box1"><?=$value?></div>
                <input class="profile_like" name="like_count" id="like_count" type="button" style="background:url(images/like_button.png) left top no-repeat; width:32px; height:30px; cursor:pointer;" onclick="getlike('1');" />
				</form>
                <!--<div class="profile_like"><a href="#"><img src="images/like_button.png" /></a></div>-->
                
              </div>
              <div class="profile_img"><img width="320" src="<?=$fatch['profile_image']?>" /></div>
              
       
			 <div class="profile_right_headline"><h1>Similar Profiles</h1></div>
			
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


				                      $sql_match = "SELECT DISTINCT member_id FROM fs_talent WHERE main_skill LIKE '%".$value."%'  AND member_id != '".$id."' order by member_id DESC "; 
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
												 <a href="talent_profile.php?talent_id=<?=$fatch_q_u_q['fld_id']?>"> <img src="<?=$fatch_q_u_q['profile_image']?>" width="51" height="51" /> </a>
                                       <?}else{?>
                                              <a href="talent_profile.php?talent_id=<?=$fatch_q_u_q['fld_id']?>"> <img src="images/no_no_image.jpg" width="51" height="51" /> </a>
									   <?}?>
													<h1><a href="talent_profile.php?talent_id=<?=$fatch_q_u_q['fld_id']?>"><?=$fatch_q_u_q['name']?></h1>
													<h2><?=substr($fatch_q_u['main_skill'],1,30)?>...</h2>
													<h2><?=$fatch_q_u['location']?></h2></a>
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
    
    <?php include('right_feedback.php'); ?>
    
</div>



</body>
</html>
