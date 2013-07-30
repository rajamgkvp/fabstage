<?php
include('constants.php');

    if($_REQUEST['album']!=""){

	   $select = "select * from fs_album where folder_name='".$_REQUEST['album']."' AND talent_id = '".$_SESSION['fab_id']."'";
	   $run = q($select);
	   $count_run = nr($run);
	   if($count_run==0){
  
       $update = "UPDATE fs_album SET folder_name = '".$_REQUEST['album']."' WHERE folder_name = '".$_SESSION['fab_id']."' AND talent_id = '".$_SESSION['fab_id']."'";
	   $run_query = q($update);
	  
	  header('location:gallery.php?m=2'); 
	 }else{	 ?>
	 
	  
	  <script>
	 	  alert("Folder name is already exists");
	  </script>


	   
	<? }	
	 

  }


require_once "uploader/phpuploader/include_phpuploader.php" ?>

<?
include('check_session.php');	
$sql = "select * from fs_job where fld_id='".$_REQUEST['id']."'";
$sql_run = q($sql);
$sql_fatch = f($sql_run);

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
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	 


		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>FabStage.Com</title>
		<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />
	</head>

	<body>


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
							<td colspan="2" align="left" style="color:#fff; font-size:16px; font-weight:normal; background:#6BC0F7; height:30px; text-indent:10px; border:2px solid #fff;"> 
								<img src="images/details.gif" style="vertical-align:text-top; padding-right:5px;" />Create Album
							</td>
						</tr>




						

				<form enctype="multipart/form-data" name="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
			
			
			
				<tr> 
				    <td colspan="2">&nbsp;&nbsp;</td>
					
				</tr>
				<?$date =  date('Y-m-d h:m:s');?>
				<tr>
					<td class="text_heading" align="left">Enter Album Name </td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<input type="text" value="" name="album" id="album" size="30" >
					</td>
				</tr>
				<tr>
				    <td colspan="2">&nbsp;&nbsp;</td>
					
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" id="submit"  name="submit" value="Create" class="button">
					</td>
				</tr>
		
		
			
		</form>


	</table>

	<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="float:right;">
			<tr>
					<td class="text_heading" align="left">Browse Multiple Files </td>
					<td>&nbsp;&nbsp;</td>
					<td>


					  	<?php
								$uploader=new PhpUploader();
								
								$uploader->MultipleFilesUpload=true;
								$uploader->InsertText="Select Album Files";
								
								$uploader->MaxSizeKB=1024000;
								$uploader->AllowedFileExtensions="*.jpg,*.png,*.gif,*.bmp,*.txt,*.zip,*.rar";
								
								$uploader->SaveDirectory="uploader/savefiles";
								
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
				    <td colspan="2">&nbsp;&nbsp;</td>
					
				</tr>				




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
