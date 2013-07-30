<?php include('constants.php');
	include('check_session.php');

   

//*********************************


$id = $_SESSION['fab_id'];


     
	if($_REQUEST['submit']!=""){

	
				for($j=0;$j<count($_REQUEST['cat']);$j++) {
					$check_val.=",";
					$check_val.= $_REQUEST['cat'][$j];
					$check_val.=",";
				}
      
          
		//////upload file///////
           
function upload_multiple_file($file,$file_dir="project_uploader_image/savefiles/") {
	
    $overwrite=0;
    $allowed_file_type= array("jpg", "jpeg", "png", "gif");
    $max_file_size = 2097152;
 
     foreach($_FILES['files']['name'] as $fkey=> $fname){
 
         $ext = pathinfo($fname, PATHINFO_EXTENSION);
           if (!in_array($ext, $allowed_file_type)) {
 
               return "unsupported file format";
                break;
           }
 
     }
 
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
 
        $file_name = $_FILES['files']['name'][$key];
 
        $file_size =$_FILES['files']['size'][$key];
 
        $file_tmp_name =$_FILES['files']['tmp_name'][$key];
 
        $file_type=$_FILES['files']['type'][$key];
 
        if($max_file_size_check >0) {
            if($file_size > $max_file_size){
 
                $fsize=$max_file_size/1048576;
                return    'File size must be less than '.$fsize.' MB';
                break;
 
            }
        }
 
        if(is_dir($file_dir)==false){
 
              $status =  mkdir("$file_dir", 0700);
 
               if($status < 1){
 
                     return "unable to create  diractory $file_dir ";
 
                }
 
        }
 
        if(is_dir($file_dir)){
 ////////////////////////////////////
            if($overwrite < 1){

			 $file_upload_query="INSERT into fs_project_portfolio 
				 (
				 talent_id,
				 project_id,
				 portfolio_data,
				 added_on
				 )
				 				  
				 VALUES(
					'".$_SESSION['fab_id']."',
					'".$_REQUEST['project_id']."',
				    '".$file_name."',
					'".date('Y-m-d h:i:s')."'
				 )";

          $sql=q($file_upload_query);
		  if($sql){
			  move_uploaded_file($file_tmp_name,"$file_dir/".$file_name);

			  $msg= '- Image uploaded successfully';
		  }
 
 
            }
			//////////////////////
 
        }
 
   }

}
 if(isset($_FILES['files'])){
    $res =  upload_multiple_file($_FILES['files'],"project_uploader_image/savefiles/");
    echo $res;
    }



		///////

		//////video upload
                  if($_REQUEST['video_link']!=''){

								 $video_link = str_replace(',,',',', $_REQUEST['video_link']);
								 $video_link = str_replace(' ','', $_REQUEST['video_link']);
								 $video = explode(",",$video_link);
									foreach ($video as &$link) {
									   $Insert = "insert into fs_talent_project_video_link(talent_id,project_id,video_link,added_on)values('".$_SESSION['fab_id']."','".$_REQUEST['project_id']."','".$link."','".date('Y-m-d h:i:s')."') ";

									   $run_ins = q($Insert);
									}

                     }

		//
	   
        
		
			

           
          

            
                 

            //project_details.php?id=43
                
				header('location:project_details.php?id='.$_REQUEST['project_id'].'');

			//



	  



									
 }













$sqlg = "Select * from fs_talent_project Where talent_id = '".$_SESSION['fab_id']."' AND fld_id = '".$_REQUEST['project_id']."' ";
	$resg = q($sqlg);
	$fatch11 = f($resg);









//*******************************

?>

<style type="text/css">
	.button { width:auto; padding:0 10px 4px; height:28px; background:#6BC0F7; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px 4px; height:28px; background:#999999; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	.style1 { font-size:13px;}
	span { font-size:12px;}
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




 <!-- <? require_once "uploader_edit_project_file/phpuploader/include_phpuploader.php" ?> -->





<!-----delete image---------->

<!--------------->


	 


		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>FabStage.Com</title>
		<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />

	
	</head>

	<body class="overlay-nav">

		 <?include('left_tab.php');?> 

		<div id="main_container">
			
			<?include('top.php');?> 

			
		<div>
			<div class="main_body_area">
				<div class="left_area">
				       <?include('talent_info.php');?>
				</div>




				<div style="width:990px; height:30px; float:left; background:#313131; margin:15px 0px;">
        <div style="float:left; font-size:13px; color:#ccc; font-weight:bold; font-family: Arial, Helvetica, sans-serif; line-height:30px; padding-left:10px;"><a style="font-decoration:none;color:#ccc;" href="project.php">Projects</a> > <a style="font-decoration:none;color:#ccc;" href="project_details.php?id=<?=$_REQUEST['project_id']?>"><?=ucfirst($fatch11['project_title'])?></a> > <a style="font-decoration:none;color:#ccc;" href="">Add Project Files</a> </div>



	</div>
				<div class="center_body" style="width:820px;">

					 <?include('include_skill.php');?>

					<div style="width:605px; background:#eaeae9; padding:15px; float:right; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;">	


					<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right; width:605px;">
						
					
						<tr>
                             <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
                        </tr>
						
						
						


 <tr>
    <td colspan="2" height="1">
						 

	<form enctype="multipart/form-data" onSubmit="return validate5();" name="upload_form" id="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
							  
					
									<table>
									  <tr><td colspan="4" style="font-size:22px; text-align:center; color:#4FBFE3; border-bottom:1px #ccc solid; line-height:35px; font-weight:bold;">Add projects</td></tr>
									  
									  <tr>
											<td colspan="3" height="8"></td>
									  </tr> 
									 
									  
									  <tr >				
										    <td class="text_heading" valign="top">Image/Audio:</td>
											<td colspan="2" style="color:#666;"><input type="file" name="files[]" id="files" multiple/>
											    <br/><span style="color:#666;font-size:12px;">Here You Can Upload Multiple Images / Audio by holding Ctrl Key</span>
											</td>
															 
									  				
									   </tr>

									  
									  
									   <tr>
											<td colspan="3" align="center">&nbsp;
												
											</td>
										</tr>

										  <tr >                      
												   
																	
												<td width="150px" class="text_heading"><span class="style1"></span>&nbsp;<span>Video Link<br />
(Youtube Video)</span></td>
												<td colspan="2"><textarea id="video_link" name="video_link" cols="47" rows="4" class="input_area" style="width:500px;"></textarea><br>
													 <span style="color:#666;font-size:12px;">( Separate Video Link By Comma Ex: Link1,Link1,Link3 )</span>
												</td>
														
													
												 
										 </tr> 

									   <tr>
											<td colspan="3" align="center">&nbsp;
												
											</td>
										</tr>
										<tr>
										   <td>&nbsp;</td>
											<td colspan="2" align="left">
												<input type="submit" id="submit"  name="submit" value="Add Files" class="register_create_ac" style="margin:0px; float:left;">
											</td>
										</tr>
								    </table>
								</form>








		</td>
		</tr>
		</table>

					</div>
			
			
			
			
			
			
			
			
			
			
			
			
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
