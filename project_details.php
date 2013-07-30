<?php
include('constants.php');
include('check_session.php');
    
	
	
$id = $_SESSION['fab_id'];

$sqlg = "Select * from fs_talent_project Where talent_id = '".$id."' AND fld_id = '".$_REQUEST['id']."' ";
$resg = q($sqlg);
$fatch76 = f($resg);


 ?>



<style type="text/css">
	.button { width:auto; padding:0 10px 4px; height:28px; background:#6BC0F7; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px 4px; height:28px; background:#999999; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; border:2px solid #fff;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	.style1 { font-size:11px;}
	span { font-size:12px; line-height:20px; font-weight:bold; padding-left:5px;}
	td {font-size:12px; line-height:20px;}
	td a{font-size:12px; line-height:20px;}
	
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

<!-----delete image---------->
<script>
       function delete_image(id){
	      if(confirm('Are you sure to delete this Image'))
	       window.location.href='delete_project_image.php?project_id='+id+'$id=<?=$_REQUEST['id']?>';
          }

</script>
<!--------------->


	 
   <!-- sCRIPT TO DISPLAY GRAYBOX -->
		 <!-- <script type="text/javascript">
			var GB_ROOT_DIR = "greybox/";
		</script>
		<script type="text/javascript" src="greybox/AJS.js"></script>
		<script type="text/javascript" src="greybox/AJS_fx.js"></script>
		<script type="text/javascript" src="greybox/gb_scripts.js"></script>
		<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />  -->
		<!-- sCRIPT TO DISPLAY GRAYBOX -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>FabStage.Com</title>
		<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />

		 <script>
			function EvalSound(soundobj) {
			  var thissound=document.getElementById(soundobj);
			  thissound.play();
			}
       </script>

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
	
	if(document.upload_form.title.value == "" ){
		 errText = "- Please Enter from Month/Year.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title.focus();
		 return false;
	}	

	if(document.upload_form.title1.value == "" ){
		 errText = "- Please Enter To Month/Year.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title1.focus();
		 return false;
	}

		if(document.upload_form.pic.value == "" ){
		 errText = "- Please  Browse the  Project.";
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

<script type="text/javascript" src="gallery/js/jquery-1.9.0.min.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="gallery/js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="gallery/css/jquery.fancybox.css" media="screen" />


	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="gallery/css/jquery.fancybox-thumbs.css" />
	<script type="text/javascript" src="gallery/js/jquery.fancybox-thumbs.js"></script>

	

	<script type="text/javascript">
		$(document).ready(function() {
		$('.fancybox').fancybox();

		$('.fancybox-thumbs').fancybox({
				prevEffect : true,
				nextEffect : true,

				closeBtn  : true,
				arrows    : true,
				nextClick : true,

				helpers : {
					thumbs : {
						width  :50,
						height :50
					}
				}
			});
		});
	</script>



	</head>

	<body class="overlay-nav">


		 <?include('left_tab.php');?> 

		<div id="main_container">
			
			<?include('top.php');?>
		<div>
			<div class="main_body_area">





				<div class="left_area" style="width:600px;margin-top:10px;">
			            <?include('talent_info.php');?>
				</div>


<!---black strip------->
		<div style="width:990px; height:30px; float:left; background:#313131; margin:15px 0px;">
        <div style="float:left; font-size:13px; color:#ccc; font-weight:bold; font-family: Arial, Helvetica, sans-serif; line-height:30px; padding-left:10px;"><a style="font-decoration:none;color:#ccc;" href="project.php">Projects</a> > <?=$fatch76['project_title']?></div>
      
		<!-- <div class="upload_btn"><a href="upload_talent_project_files.php"  title="Upload Files" rel="gb_page_center[900, 520]">+ Add Projects</a></div> -->
		
		
	<!------------>	
		</div>

				<div class="center_body" style="width:820px; clear:both;">
				               

					<?include('include_skill.php');?>


					<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right; background:#F5F5F5; width:635px;">
						
						
						 
						
						
						<tr>
							<td colspan="4" align="left" style="color:#666; font-size:30px; font-weight:normal; height:50px; font-family:'robotothin',Arial,Helvetica,sans-serif; text-indent:10px; border-bottom:1px #ccc solid;"> 
								[<?=$fatch76['project_title']?>]
                            </td> 
						</tr>		
							
                       
							<tr>
                            	<td height="7"></td>
                            </tr>
						


			  
			  <tr>
					<td colspan="1" width="28%">&nbsp;</td>
					<td colspan="3" width="72%" align="right" style="padding-right:15px;"><a style="padding-right:10px;"href="edit_project_files.php?project_id=<?=$_REQUEST['id']?>" rel="gb_page_center[600, 500]"><img src="images/add_icon.png" width="15" height="15" style="vertical-align:middle;" /> Add Files</a>
                    <a href="edit_talent_project.php?id=<?=$_REQUEST['id']?>" rel="gb_page_center[600, 500]"> <img src="images/pencil_icon.png" width="15" height="15" style="vertical-align:middle;" /> edit</A></td>
					
			  </tr>
		    

                 <tr>
					<td colspan="1"><span class="style1"></span>&nbsp;<span>Project Skills</span> </td>
					<td colspan="3"><?=substr($fatch76['skill'],0,-1)?>	  </td>
					
			  </tr>


    


			  <tr>
					<td colspan="1"><span class="style1"></span>&nbsp;<span>Duration</span> </td>
					<td colspan="3"><?=$fatch76['month_year']?>	 </td>
					
			  </tr>
			
            	<tr>
                	<td>&nbsp;</td>
                </tr>

			
			  <tr>
					<td colspan="4"><span class="style1"></span>&nbsp;<span>Description</span> </td>				   
					
			  </tr>
              
              <tr><td colspan="4" style="padding-left:14px; padding-right:10px; color:#6e6e6e; text-align:justify;"><?=$fatch76['description']?>	 </td></tr>


			
             <tr>
             	<td colspan="4">&nbsp;</td>
             </tr>

              <?
			      $jpg = ".jpg";
				  $png = ".png";
				  $gif = ".gif";
			      $s = "select * from fs_project_portfolio where talent_id='".$id."' AND project_id = '".$_REQUEST['id']."' AND(portfolio_data LIKE '%".$jpg."%' OR portfolio_data LIKE '%".$png."%' OR portfolio_data LIKE '%".$gif."%') ";
			      $q = q($s);
				  $nu = nr($q);
				  if($nu!=0){
			  ?>
          

	<tr>
	  <td colspan="4"><a><input type="button" id="submit"  name="submit" value="Project Image" class="button"></a><td>
	
	</tr>
        <?}?>

			
         
		  
 <tr ><td colspan="4" align="center" style="padding-left:10px;">

  
<ul class="thumbnail-tabs">
			
			<?
			 
			
			  while($f = f($q)){
			 $link = "project_uploader_image/savefiles/".$f['portfolio_data']."";
			 $dest = "portfolio_uploader/savefiles/".$f['portfolio_data']."";
			?>
			

<!-- <li><span class="img-title">Image img-title here</span>
        <ul class="dropdown-thumb">
		                       

                 <li>
				     <a href="move_image.php?source=<?=$link?>&dest=<?=$dest?>&fld_id=<?=$f['fld_id']?>&id=<?=$_REQUEST['id']?>"><img src="http://vs.sitebysite.us/fabstage/Gallery/images/edit_icon.png" title="Move To Gallery" alt="Move To Gallery"></a> 
				     <a href="example13/index.php?link=<?=$link?>"><img src="http://vs.sitebysite.us/fabstage/Gallery/images/set_profile_icon.png" title="Set Profile Pic" alt="profile"></a> 



					 <!-- <a href="delete_project_image.php?id=<?=$_REQUEST['id']?>&project_id=<?=$f['fld_id']?>"> -->



					<!-- <a href="#" onClick="javascript:delete_image(<?=$f['fld_id']?>)">
					 
					 
					 <img src="http://vs.sitebysite.us/fabstage/Gallery/images/close_icon.png" title="Delete" alt="Delete"></a>
				 </li>
        </ul>
  <a class="fancybox-thumbs" data-fancybox-group="thumb" href="project_uploader_image/savefiles/<?=$f['portfolio_data']?>"><img src="project_uploader_image/savefiles/<?=$f['portfolio_data']?>" width="150" height="150" alt="" /></a>

</li> -->

   <li>
				
				
				
				<span class="img-title">
				<a href="move_image.php?source=<?=$link?>&dest=<?=$dest?>&fld_id=<?=$f['fld_id']?>&id=<?=$_REQUEST['id']?>" style="width:26px;"><img src="gallery/images/edit_icon.png" title="Move To Gallery" alt="Move To Gallery"></a>
				<a href="example13/index.php?link=<?=$link?>" style="width:28px"><img src="gallery/images/set_profile_icon.png" title="Set Profile Image" alt="Set As Profile "></a>
                <a href="#" onClick="javascript:delete_image(<?=$run_gallery['fld_id']?>)" style="width:24px;"><img src="gallery/images/close_icon.png" title="Delete Image" alt="Delete Image"></a>
				</span>
                <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?=$link?>"><img src="<?=$link?>" height="150" alt="" /></a>
				




       </li>

  
        <?}?>
		

		</ul>






 </td></tr>  


	<!--------audio-------->
   
	<?
	          $mp3 = ".mp3";
			  $wav = ".wav";
	          $s = "select * from fs_project_portfolio where talent_id='".$id."' AND project_id = '".$_REQUEST['id']."' AND (portfolio_data LIKE '%".$mp3."%' OR portfolio_data LIKE '%".$wav."%') ";
			  $q = q($s);
			  $num = f($q);
			  if($num!=0){
	?>
	
	<tr>
					<td colspan="4" height="8"></td>
			  </tr>
	<tr>
	  <td colspan="4"><a><input type="button" id="submit"  name="submit" value="Project Audio " class="button"></a><td>
	
	</tr>
	 <tr>
					<td colspan="4" height="8"></td>
			  </tr>

		<?}?>	  
			
          <tr >
            <?
			 
			  $i=0;
			  while($f = f($q)){
				  if($i%4==0){
			?>
			  </tr>
			  
			    <tr>
					<td colspan="4" height="8"></td>
			  </tr>
			  <tr>
               <?}?>

                        
		       <td> <a  href="project_uploader_image/savefiles/<?=$f['portfolio_data']?>"><img src="images/mp3.png" alt="<?=$f['portfolio_data']?>" width="120" height="120"></a></td>
		 

        <?$i=$i+1;}?>
	</tr>
<!------------------------->

<!---------video ---------->
    <tr>
		<td colspan="4" height="8"></td>
   </tr>
   <?
              $s = "select * from fs_talent_project_video_link where talent_id='".$id."' AND project_id = '".$_REQUEST['id']."'";
			  $q = q($s);
              $c = nr($q);
			  if($c!=0){
   ?>
	<tr>
	  <td colspan="4"><a><input type="button" id="submit"  name="submit" value="Project Video" class="button"></a><td>
	
	</tr>
	 <tr>
					<td colspan="4" height="8"></td>
	</tr>

	<?}?>		  
			
		
			 
     <tr >
            <?
			
			  $i=0;
			  while($f = f($q)){
				  if($i%4==0){
			?>
	</tr>
			  
	<tr>
					<td colspan="4" height="8"></td>
	</tr>
	<tr>
               <?}?>

       
		       <td> <iframe width="120" height="120" src="<?=$f['video_link']?>" frameborder="0" allowfullscreen></iframe></td>
		 

        <?$i=$i+1;}?>
   </tr>
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
