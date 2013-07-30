<?php
include('constants.php');
include('check_session.php');
    
	
	
$id = $_SESSION['fab_id'];


     
	  if($_REQUEST['pro_title']!=""){
		
			

    $sql_check = "select * from fs_talent_project where project_title='".$_REQUEST['pro_title']."'";
	$check_run = q($sql_check);
	$check_num = nr($check_run);


       if($check_num==0){
				
				for($j=0;$j<count($_REQUEST['cat']);$j++) {
					$check_val.=",";
					$check_val.= $_REQUEST['cat'][$j];
					$check_val.=",";
				}
      
          
		
	   
        
	

						
			$sql1 = "INSERT INTO fs_talent_project (talent_id,skill,project_title,month_year,description, added_on) VALUES ('".$id."','".$check_val."', '".$_REQUEST['pro_title']."','".$_REQUEST['month']."', '".$_REQUEST['des']."',  '".date('Y-m-d h:i:s')."')";


				$sql = q($sql1);
				if($sql){
					$msg1 = ' Project has been Added Successfully.';
				}
			
           
           //GET LAST INSERTED ID
				$query = "SELECT LAST_INSERT_ID()";
				$result = q($query);
				if ($result) {
					$nrows = nr($result);
					$row = mysql_fetch_row($result);
					$mid = $row[0];
					$userid = $mid;
				}

            $update_query = "UPDATE fs_project_portfolio SET project_id = '".$userid."' WHERE talent_id = '".$id."' AND project_id = 0 ";
            $run_quer = q($update_query);              

             $update_query232 = "UPDATE fs_talent_project_video_link SET project_id = '".$userid."' WHERE talent_id = '".$id."' AND project_id = 0 ";
            $run_quer12 = q($update_query232); 
           
                 





	  }else{
	         $msg1 = ' Project title is already exists please enter another project title.';
	  }



									
 }


//require_once "project_uploader_image/phpuploader/include_phpuploader.php" ?>



<style type="text/css">
	.button { width:auto; padding:0 10px 4px; height:28px; background:#6BC0F7; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px 4px; height:28px; background:#999999; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	.style1 { font-size:13px;}
	span { font-size:13px; line-height:25px;}
	td {font-size:13px; line-height:25px;}
	td a{font-size:13px; line-height:25px;}
	input [type="checkbox"]{ vertical-align:sub;}
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	 


		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>FabStage.Com</title>
		<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />
   
<script>
function validate(){

	var errText = "";
	var errorflag = false;


	if(document.upload_form.pro_title.value == "" ){
		 errText = "- Please Enter Project title.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.pro_title.focus();
		 return false;
	}
	
	if(document.upload_form.month.value == "" ){
		 errText = "- Please Enter Project month Duration.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.month.focus();
		 return false;
	}	

	if(document.upload_form.des.value == "" ){
		 errText = "- Please Enter Project Description.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.des.focus();
		 return false;
	}





	if(errorflag==true){
		return false;
	}else{
		return true;
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

	<body >


		<?include('left_tab.php');?>

		<div id="main_container">
			
			
			<?include('top.php');?> 
		<div>
			<div class="main_body_area">
				<div class="left_area">
				</div>
				<div class="center_body" style="width:800px;">

					 <?include('left_work_room.php');?>


					<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
						
						
						<tr>
                             <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
                        </tr>
						
						
						<tr>
							<td colspan="2" align="left" style="color:#fff; font-size:16px; font-weight:normal; background:#6BC0F7; height:30px; text-indent:10px; border:2px solid #fff;"> 
								<img src="images/details.gif" style="vertical-align:text-top; padding-right:5px;" />Add Project
							</td>
						</tr>




 <tr>
    <td colspan="2" height="1">
						 

	<form enctype="multipart/form-data" onSubmit="return validate();" name="upload_form" id="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
			
	

	<!-- <table width="80%"  border="0" align="center" cellspacing="1" cellpadding="1"> -->
		<?php

		   $sql = "select * from fs_talent where member_id = '".$_SESSION['fab_id']."' ";
		   $res = q($sql);	
			while($fatch = f($res)){ 
			   $skill = $fatch['main_skill'];
			   $main_skill = str_replace(',,',',', $skill);
			    $skill = explode(",",$main_skill);
				$i=0; ?>
				<table width="100%"  border="0" align="center" cellspacing="0" cellpadding="0">
					
					
					 <tr>
	                        <td colspan="3"><span class="style1">*</span>&nbsp;<span>Select Skills</span> </td>
	                 </tr>
					<tr align="center">
					<?foreach ($skill as &$value) {
						if($value!=""){	  
							
							if($i%3==0){
							 echo "</tr><tr>";
							
							}
							?>
					
						<td  align="left" style="font-size:12px;padding-left:50px;"><input type="checkbox" name="cat[]" id="cat[]" value="<?=$value?>"> <?=$value?> </td>





					
		
					<?$i=$i+1;}
					
					}?>

					  
					 </tr>
					
					<tr><td colspan="3"><div class="border" style="margin:5px 0 0;"></div></td></tr>
				</table>

					<?} ?>
           				
				
           </td>
		 </tr>

			
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr> 
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Project Title</span> </td>
					<td><input name="pro_title" type="text" value="" id="pro_title" size="60" >
					</td>
			  </tr>
		      <tr>
					<td colspan="2" height="8"></td>
			  </tr> 
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Month/Year</span> </td>
					<td><input name="month" type="text" value="" id="month" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Description</span> </td>
					<td>
					   <textarea id="des" name="des" rows="4" cols="47"></textarea>
					</td>


 <tr>
					<td colspan="2" align="center">&nbsp;
						
					</td>
				</tr>

                
              
		
               



			  </tr>
				   <tr>
					<td colspan="2" height="8"></td>
			  </tr>

			  
				
		
			   

                <tr>

				<td width="150px">
				     <span class="style1"></span>&nbsp;<span>Upload Files</span> </td>
				  <td>
				      <a href="upload_talent_project_files.php"  title="Upload Files" rel="gb_page_center[900, 600]">Select Image/Audio</a> 
				  </td>
				</tr>





			  
			   <tr>
					<td colspan="2" align="center">&nbsp;
						
					</td>
				</tr>

			 <tr>
					<td colspan="2" align="center">
						<input type="submit" id="submit"  name="submit" value="Create" class="button">
					</td>
				</tr>
		
			
		</form>


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
