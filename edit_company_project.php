<?php 
	include_once('constants.php');
	include('check_session.php');
	$id = $_SESSION['fab_id'];

    if($_REQUEST['submit']!="")
	{

                   for($j=0;$j<count($_REQUEST['cat']);$j++) {
					$check_val.=",";
					$check_val.= $_REQUEST['cat'][$j];
					$check_val.=",";
				}


	     $update_r = "UPDATE fs_company_project SET skill = '".$check_val."',project_title = '".$_REQUEST['pro_title']."',month_year = '".$_REQUEST['month']."',description = '".$_REQUEST['des']."' Where company_id = '".$id."' AND fld_id = '".$_REQUEST['id']."' ";
         $update_run = q($update_r);

	              header('location:company_project_details.php?id='.$_REQUEST['id'].'');

	}


	$sqlg = "Select * from fs_company_project Where company_id = '".$id."' AND fld_id = '".$_REQUEST['id']."' ";
	$resg = q($sqlg);
	$fatch11 = f($resg);
    ?>










<style type="text/css">
	.button { width:auto; padding:0 10px 4px; height:28px; background:#6BC0F7; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px 4px; height:28px; background:#999999; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	.style1 { font-size:13px;}
	span { font-size:13px; line-height:25px;}
	td {font-size:13px; line-height:25px;}
	td a{font-size:13px; line-height:25px;}
	
	.text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:12px;color:#666;font-weight:bold; padding-top:5px; line-height:20px; text-transform:capitalize;}

.select_aera{width: 200px;
height: 30px;
float: left;
background: #fff;
border: none;
color: #7e7e7e;
padding: 6px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;}
	 .input_area{width: 190px;
height: 30px;
float: left;
background: #fff;
border: none;
color: #7e7e7e;
padding-left: 10px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;}
	 .input_select{width:180px; height:22px; padding:1px; float:left; border:1px #ccc solid; color:#999; -webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px;}
	 .head_text{width:790px; float:left; line-height:34px;}
	 .head_text a{width:790px; color:#666666; font-weight:bold; float:left; line-height:34px; border-top:1px #ccc solid; border-bottom:1px #ccc solid; background:url(images/down_arrow.png) right 10px no-repeat #e7e7e7; padding-left:10px;}
	 .head_text a:hover{width:790px; color:#666666; font-weight:bold; float:left; line-height:34px; border-top:1px #ccc solid; border-bottom:1px #ccc solid; background:url(images/down_arrow.png) right 10px no-repeat #d5d5d5;}
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

<!-----delete image---------->

<!--------------->


	 


		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>FabStage.Com</title>
		<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />

	
	</head>

	<body class="overlay-nav">


		 <?include('left_company_tab.php');?> 

		<div id="main_container">
			
			<?include('top.php');?> 
		<div>
			<div class="main_body_area">
				<div class="left_area">
                     <?include('company_info.php');?> 
				</div>

<div style="width:990px; height:30px; float:left; background:#313131; margin:15px 0px;">
        <div style="float:left; font-size:13px; color:#ccc; font-weight:bold; font-family: Arial, Helvetica, sans-serif; line-height:30px; padding-left:10px;"><a style="font-decoration:none;color:#ccc;" href="company_project.php">Projects</a> > <a style="font-decoration:none;color:#ccc;" href="company_project_details.php?id=<?=$_REQUEST['id']?>"><?=ucfirst($fatch11['project_title'])?></a> > <a style="font-decoration:none;color:#ccc;" href="">Edit Project</a> </div>
      
		<!-- <div class="upload_btn"><a href="upload_talent_project_files.php"  title="Upload Files" rel="gb_page_center[900, 520]">+ Add Projects</a></div> -->
		
		
	<!------------>	
		</div>
				<div class="center_body" style="width:820px;">

					 <?include('include_company_skill.php');?>

					<div style="width:605px; background:#eaeae9; padding:15px; float:right; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;">
				
					<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right; width:605px;">
						
					
						<tr>
                             <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
                        </tr>
						
			

						 

			<tr>
                             <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
                        </tr>
						
						
						




  
						 

	<form enctype="multipart/form-data" onSubmit="return validate();" name="upload_form" id="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
			<tr>
    <td colspan="2" height="1">
	

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
                        <td style="font-size:22px; text-align:center; color:#4FBFE3; border-bottom:1px #ccc solid; line-height:35px; font-weight:bold;" colspan="4">Edit Project </td>
                        </tr>
					
					
					 <tr>
	                        <td colspan="3" class="text_heading"><span class="style1">*</span>&nbsp;<span>Select Skills</span> </td>
	                 </tr>
					<tr align="center">
					<?foreach ($skill as &$value) {
						if($value!=""){	  
							
							if($i%3==0){
							 echo "</tr><tr>";
							
							}


						
							?>
					
						<td  align="left" style="font-size: 12px; color: #999; padding-top: 5px; line-height:13px; font-family: Arial, Helvetica, sans-serif;"><input style="float: left; margin-right: 5px;" type="checkbox" name="cat[]" id="cat[]" value="<?=$value?>" <?if(strpos($fatch11['skill'],$value)){?>checked<?}?>> <?=$value?> </td>

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
					<td width="150px" class="text_heading"><span class="style1">*</span>&nbsp;<span>Project Title</span> </td>
					<td><input name="pro_title" type="text" value="<?=$fatch11['project_title']?>" id="pro_title" size="60" class="input_area" style="width:500px;" >
					</td>
			  </tr>
		      <tr>
					<td colspan="2" height="8"></td>
			  </tr> 
			  <tr>
					<td width="150px" class="text_heading"><span class="style1">*</span>&nbsp;<span>Month/Year</span> </td>
					<td><input name="month" type="text" value="<?=$fatch11['month_year']?>" id="month" size="60" class="input_area" style="width:500px;" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			
			  <tr>
					<td width="150px" class="text_heading"><span class="style1">*</span>&nbsp;<span>Description</span> </td>
					<td>
					   <textarea id="des" name="des" rows="4" cols="47" class="input_area" style="width:500px; height:110px;"><?=$fatch11['description']?></textarea>
					</td>


 <tr>
					<td colspan="2" align="center">&nbsp;
						
					</td>
				</tr>

                <?
				  $sqlg3 = "Select * from fs_company_project_video_link Where company_id = '".$id."' AND project_id = '".$_REQUEST['id']."' ";
	              $resg3 = q($sqlg3);
	              while($fatch3 = f($resg3)){

                        $video_link .=$fatch3['video_link'];  
						$video_link .=','; 
				  }

				  $video_link = substr($video_link,0,-1);
				?>
                     
			  
			    

			 

			 <tr>
			     <td>&nbsp;
						
					</td>
					<td  >
						<input type="submit" id="submit"  name="submit" value="Edit Project" class="register_create_ac" style="margin:0px; float:left;">
					</td>
				</tr>
		
			
		</form>


	</table>
			
			</div>
			
			
			
			
			
	</td></tr>		
			
			
<!----------------------->




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
				</script> -
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
