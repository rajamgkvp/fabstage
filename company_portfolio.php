<?php
include('constants.php');
include('check_session.php');
    
	
	
$id = $_SESSION['fab_id'];


     
	  if($_REQUEST['submit']!=""){
		
  

				for($j=0;$j<count($_REQUEST['cat']);$j++) {
					$check_val.=",";
					$check_val.= $_REQUEST['cat'][$j];
					$check_val.=",";
				}
      	

		$sql1 = "update fs_company_portfolio set skill='".$check_val."'  where skill = '' AND company_id='".$id."' ";


				$sql = q($sql1);
				if($sql){

                  $sql_vid = "INSERT INTO fs_company_portfolio(company_id,skill,video,added_on)VALUES('".$id."','".$check_val."','".$_REQUEST['video_link']."','".date('Y-m-d h:m:s')."')";

				  $run_ved = q($sql_vid);

                    if($run_ved){
					$msg1 = ' Project has been Added Successfully.';
					}
				}
								
 }


require_once "company_portfolio_uploader/phpuploader/include_phpuploader.php" ?>



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

	</head>

	<body >

		<?include('left_company_tab.php');?>

		<div id="main_container">
			
			<?include('top.php');?> 
		<div>
			<div class="main_body_area">
				<div class="left_area">
				</div>
				<div class="center_body" style="width:800px;">

					 <!-- <?include('left_work_room.php');?> -->
                     <?php include("left_options.php"); ?>

					<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
						
						
						<tr>
                             <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
                        </tr>
						
						
						<tr>
							<td colspan="2" align="left" style="color:#fff; font-size:16px; font-weight:normal; background:#6BC0F7; height:30px; text-indent:10px; border:2px solid #fff;"> 
								<img src="images/details.gif" style="vertical-align:text-top; padding-right:5px;" />Add Portfolio
							</td>
						</tr>




 <tr>
    <td colspan="2" height="1">
						 

	<form enctype="multipart/form-data" onSubmit="return validate();" name="upload_form" id="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
			
	

	<!-- <table width="80%"  border="0" align="center" cellspacing="1" cellpadding="1"> -->
		<?php

		   $sql = "select * from fs_company where member_id = '".$_SESSION['fab_id']."' ";
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
					<td width="150px"><span class="style1"></span>&nbsp;<span>Video Link</span> </td>
					<td>
					  	 <!-- <input name="video" type="text" value="" id="video" size="60" > -->

                       <textarea id="video_link" name="video_link" cols="47" rows="4"></textarea><br>
					   <a align="center">( Separate Video Link By Comma Ex: Link1,Link2,Link3 )</a>

					</td>
			  </tr>
              
            
			  </tr>
				   <tr>
					<td colspan="2" height="8"></td>
			  </tr>

			  
				
		
			     <tr>
					<td width="150px"><span class="style1"></span>&nbsp;<span>Select Image/Audio</span> </td>
					<td>
					  	 <?php
								$uploader=new PhpUploader();
								
								$uploader->MultipleFilesUpload=true;
								$uploader->InsertText=" Select Image/Audio ";
								
								$uploader->MaxSizeKB=10240000;
								$uploader->AllowedFileExtensions="*.jpg,*.png,*.gif,*.bmp,*.mp3,*.wav";
								
								$uploader->SaveDirectory="company_portfolio_uploader/savefiles";
								
								$uploader->FlashUploadMode="Partial";
								
								$uploader->Render();
		
	                    ?>
					   <script type='text/javascript'>
												function CuteWebUI_AjaxUploader_OnTaskComplete(task)
												{
													var div=document.createElement("DIV");
													var link=document.createElement("A");
													link.setAttribute("href","savefiles/"+task.FileName);




													//link.innerHTML="uploader/savefiles/"+task.FileName;
													

													link.target="_blank";
													div.appendChild(link);
													document.body.appendChild(div);
												}

	                   </script>
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
