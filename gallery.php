<?php 
	include_once('constants.php');
	include('check_session.php');





$id = $_SESSION['fab_id'];


     
	if($_REQUEST['submit']!=""){

	
				for($j=0;$j<count($_REQUEST['cat']);$j++) {
					$check_val.=",";
					$check_val.= $_REQUEST['cat'][$j];
					$check_val.=",";
				}
      $_SESSION['check_val']=$check_val;
          
		//////upload file///////
     
		   




if(isset($_FILES['files'])){

function upload_multiple_file($file,$file_dir="portfolio_uploader/savefiles/") {
	
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

			 $file_upload_query="INSERT into fs_talent_portfolio 
				 (
				 talent_id,
				 skill,
				 portfolio_data,
				 added_on
				 )
				 				  
				 VALUES(
					'".$_SESSION['fab_id']."',
				    '".$_SESSION['check_val']."',
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
    $res =  upload_multiple_file($_FILES['files'],"portfolio_uploader/savefiles/");
   $res;
    }






	}

		///////

		//////video upload
        

		//
	   if($_REQUEST['video_link']!=''){

         $video_link = str_replace(',,',',', $_REQUEST['video_link']);
         $video_link = str_replace(' ','', $_REQUEST['video_link']);
	     $video = explode(",",$video_link);
			foreach ($video as &$link) {
               $Insert = "insert into fs_talent_portfolio(talent_id,skill,video,added_on)values('".$_SESSION['fab_id']."','".$check_val."','".$link."','".date('Y-m-d h:m:s')."') ";

			   $run_ins = q($Insert);
			}

}

        
		
			

           
          

            
                 

            //project_details.php?id=43
                
				header('location:gallery.php');

			//



	  



									
 }






















?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
	<!------------>
        <link rel="stylesheet" type="text/css" href="fab_gallery/css/demo.css" />
         <link rel="stylesheet" type="text/css" href="fab_gallery/css/style3.css" /> 
    <!------------>


    <!-----delete------------->
<script>
       function delete_image(id){
	      if(confirm('Are you sure to delete this Image'))
	       window.location.href='delete_gallery_image.php?image_id='+id;
          }

</script>
	<!----------------->
	  <script>
			function open11(){
				winparam = 'width=900,height=400,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
				window.open('edit_talent_step4.php','',winparam);
			}
		</script>
 

		

		<!----audio file player script-->
		<script>
			function create(){
				winparam = 'width=900,height=600,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
				window.open('create_albums.php','',winparam);
			}
		</script>

        <!-- end -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>FabStage.Com</title>
		
		<script type="text/javascript" src="js/jquery.js"></script>	
		<!-- CSS STYLE -->
		<link rel="stylesheet" type="text/css" href="css/style-full.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/settings-full.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/lightbox-full.css" media="screen">
		<!-- jQuery PORTFOLIO   -->
		<script type="text/javascript" src="js/jquery_003.js"></script>		
		<script type="text/javascript" src="js/jquery_002.js"></script>		
		<script type="text/javascript" src="js/flowplayer-3.js"></script>		
		<!-- FONT IMPORT -->
		<link href="css/css.css" rel="stylesheet" type="text/css">
		<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />

		

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






	<script>
function validate5(){

	var errText = "";
	var errorflag = false;

	var chks = document.getElementsByName('cat[]');
	var hasChecked = false;
	for (var i = 0; i < chks.length; i++) {
		if (chks[i].checked) {
			hasChecked = true;
		break;
		}
	}
               if (hasChecked == false) {
					alert("Please select at least one Skill.");
					return false;
				}

	

   if(document.getElementById("files").files.length < 1)
     {
		
		 if(document.upload_form.video_link.value == ""){
		 errText += "- Please Enter Your Video Link. \n";
		 //alert(errText);
		 errorflag = true;
		// document.upload_form.video_link.focus();
		// return false;

           alert("You Forgot to select Portfolio files");
		   return false;


	}  
		   
		   
		   
		   
		   
		   
     }

 
	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }


</script>


 <!------ show hide div ------>
       


<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script> -->
<script type="text/javascript">
$(function() {
$('.showhide').click(function() {
$(".slidediv").slideToggle();
});
});
</script>



<style type="text/css">
.slidediv{
width: 90%;
padding:30px;
background:#DEDEDE;
color:#fff;
margin-top:10px;
border-bottom:5px solid #FFF;
display:none;
}

.text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:12px;color:#666;font-weight:bold; padding-top:5px; text-transform:capitalize;}

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

 <!------------>




	</head>

	<body style="background:url(images/bg.jpeg) center top no-repeat fixed;" onload="MM_preloadImages('images/gallery/profile_hover.png','images/gallery/home_hover.png')">
	<?include('left_tab.php');?> 
        <div style="width:100%; float:left; background:url(images/gallery/white_bg.png) left top;">
<?include('top.php');?> 
	<div class="clear"></div>
	
	<div id="content_wrap" style="z-index:100;">	
		<div class="portfolio_left_area">
            
			
			
			
			
			<?include('talent_info.php');?>







		</div>
		<!-- THE SELECTED FILTER -->











        <div style="width:990px; height:30px; float:left; background:#313131; margin:15px 0px;clear:both;">
        <div style="float:left; font-size:13px; color:#ccc; font-weight:bold; font-family: Arial, Helvetica, sans-serif; line-height:30px; padding-left:10px; "> Portfolio</div>
        
		<!---   <div class="upload_btn"><a href="talent_portfolio.php">+ Upload File</a></div>        -->

			<!-- <div class="upload_btn"><a href="#" onClick="javascript:open11()">+ Upload File</a></div> -->

			<div class="upload_btn"><a href="#" class="showhide">+ Upload File</a></div>
		</div>
		
      
	   
	   

	   
	   
	   
	   
	   <div style="clear:both;"></div>
	   
	<table>
	 <tr>
	  <td valign="top">
	       <div style="float:left; width:170px; clear:both;">
				<?include('include_gallery_skill.php');?>
			</div>
	  </td>
	   
	     
	   
	   <td style="width:800px;">


<!------upload Portfolio-------->
        <div class="slidediv">
                 
				  
				  
				  
	<form enctype="multipart/form-data" onSubmit="return validate5();" name="upload_form" id="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
							  
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
                        <td style="font-size:22px; text-align:center; color:#4FBFE3; border-bottom:1px #ccc solid; line-height:35px; font-weight:bold;" colspan="3">Add Files</td>
                        </tr>

											 <tr>
													<td colspan="3" class="text_heading"><span class="style1">*</span>&nbsp;<span>Select Skills</span> </td>
											 </tr>
											
											
											
											<tr align="center">
														<?foreach ($skill as &$value) {
															if($value!=""){	  
																
																if($i%4==0){
																 echo "</tr><tr>";
																
																}
																?>
														
															<td width="25%"  align="left" style="font-size: 12px; color: #999; padding-top: 5px; line-height:13px; font-family: Arial, Helvetica, sans-serif;"><input style="float: left; margin-right: 5px; width:auto;" type="checkbox" name="cat[]" id="cat[]" value="<?=$value?>"> <?=$value?> </td>





														
											
														<?$i=$i+1;}
														
														}?>

											  
											 </tr>
											
											<tr><td colspan="3"><div class="border" style="margin:5px 0 0;"></div></td></tr>
								</table>

											<?} ?>
												
										
						

									
									<table>
									  
									  
									 

									  <tr >				
										    <td class="text_heading" valign="top">Image/Audio:</td>
											<td colspan="2"><input style="border:0px; color:#666666;" type="file" name="files[]" id="files" multiple/>
											    <br/><span style="color: #666666; font-size: 12px;">Here You Can Upload Multiple Images / Audio by holding Ctrl Key</span>
											</td>
															 
									  				
									   </tr>

									  
									  
									   <tr>
											<td colspan="3" align="center">
												&nbsp;
											</td>
										</tr>

										  <tr >                      
												   
																	
												<td width="150px" class="text_heading"><span class="style1"></span>&nbsp;<span>Video Link<br />
(Youtube Video)</span></td>
												<td colspan="2"><textarea id="video_link" name="video_link" cols="47" rows="4" class="input_area" style="width:500px;"></textarea><br>
													 <span style="color: #666666; font-size: 12px;">( Separate Video Link By Comma Ex: Link1,Link1,Link3 )</span>
												</td>
														
													
												 
										 </tr> 

									   <tr>
											<td colspan="3" align="center">
												&nbsp;
											</td>
										</tr>
										<tr>
										   <td>&nbsp;</td>
											<td colspan="2" align="left">
												<input type="submit" id="submit"   name="submit" value="Add Portfolio" class="register_create_ac" style="margin:0px; float:left;" >
											</td>
										</tr>
								    </table>
								</form>

		
		 
		 
		 
		 
		 
		 
		 
		 </div>


<!------End upload Portfolio--------->


	  
	   
	   
  
	   
	   <h3>
			<div style="transition-duration: 0.5s, 0.5s; transition-property: opacity, opacity; transition-timing-function: ease, ease; opacity: 1;" id="selected-filter-title" class="fullwidth">
				<div class="listitem" style="left:0px; color:#fff; clear:both;">
						<?
						   if($_REQUEST['type']=='' OR $_REQUEST['type']==2){
						?>	
				Portfolio Image
			<?}?>	

			
				</div>
				</div>
		</h3>








	
        <div style="float:right;margin-right:20px;">
        	<div class="all_text_btn"><a href="gallery.php?skill=<?=$_REQUEST['skill']?>"  <?if($_REQUEST['type']==''){?>style="color:#3366ff;"<?}?>  >All</a> | <a href="gallery.php?skill=<?=$_REQUEST['skill']?>&type=2" <?if($_REQUEST['type']==2){?>style="color:#3366ff;"<?}?>>Images</a> | <a href="gallery.php?skill=<?=$_REQUEST['skill']?>&type=4" <?if($_REQUEST['type']==4){?>style="color:#3366ff;"<?}?>>Videos</a> | <a href="gallery.php?skill=<?=$_REQUEST['skill']?>&type=3" <?if($_REQUEST['type']==3){?>style="color:#3366ff;"<?}?>>Audios</a></div>
        </div>








<?
   if($_REQUEST['type']=='' OR $_REQUEST['type']==2){
?>

 <div style="width:100%; float:left; margin-bottom:25px;">
		
	   <ul class="thumbnail-tabs">
		
		   <?
				if($_REQUEST['skill']==''){
                        $jpg = ".jpg";
				        $png = ".png";
				        $gif = ".gif";
					  
					   $query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND (portfolio_data LIKE '%".$jpg."%' OR portfolio_data LIKE '%".$png."%' OR portfolio_data LIKE '%".$gif."%')";
					   $run = q($query_gallery);
					   while($run_gallery = f($run)){

                       $link = "portfolio_uploader/savefiles/".$run_gallery['portfolio_data']."";

							?>
					
        <li>
				
				
				
				<span class="img-title"><!-- Image img-title here --></span><a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?=$link?>"><img src="<?=$link?>" height="200"  alt="" /></a>
				<div style="float:right;">
				
				<!-- <a href="#"><img src="http://vs.sitebysite.us/fabstage/Gallery/images/edit_icon.png" title="Edit"></a> -->

				<a href="#" onClick="javascript:delete_image(<?=$run_gallery['fld_id']?>)">
							<img src="http://vs.sitebysite.us/fabstage/Gallery/images/close_icon.png" title="Delete Image" alt="Delete Image"></a>

				<a href="example13/index.php?link=<?=$link?>"><img src="http://vs.sitebysite.us/fabstage/Gallery/images/set_profile_icon.png" title="Set Profile Image" alt="Set As Profile "></a>
				
				
				</div>




       </li>
	<?}?>
							  <!-- Close here -->
	<?}else{
					

						$jpg = ".jpg";
				        $png = ".png";
				        $gif = ".gif";
					  
					   $query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND (portfolio_data LIKE '%".$jpg."%' OR portfolio_data LIKE '%".$png."%' OR portfolio_data LIKE '%".$gif."%') AND skill LIKE '%".$_REQUEST['skill']."%'";
					   $run = q($query_gallery);
					   while($run_gallery = f($run)){

                       $link = "portfolio_uploader/savefiles/".$run_gallery['portfolio_data']."";

		?>
					
                       
		<li>
				
				

				<span class="img-title"><!-- Image img-title here --></span><a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?=$link?>"><img src="<?=$link?>" width="150" alt="" /></a>
				<div style="float:right;">

				<!-- <a href="#"><img src="http://vs.sitebysite.us/fabstage/Gallery/images/edit_icon.png" title="Edit"></a> -->
			    <a href="#" onClick="javascript:delete_image(<?=$run_gallery['fld_id']?>)">
							<img src="http://vs.sitebysite.us/fabstage/Gallery/images/close_icon.png" title="Delete Image" alt="Delete Image"></a>

				<a href="example13/index.php?link=<?=$link?>"><img src="http://vs.sitebysite.us/fabstage/Gallery/images/set_profile_icon.png" title="Set Profile Image" alt="Set As Profile "></a>
				
				</div>



       </li>
						  
						  
						  
	 <?}?>
							  <!-- Close here -->
 <?}?>

		</ul>
                    
				 </div> 



				 <?}?>
				<!-- Image Finished -->



			<!-- </div> -->
	
	 
	 
	 
	 
	 
	 
	 
	 
	 

	 














<?
   if($_REQUEST['type']=='' OR $_REQUEST['type']==3){
?>
	 
<!------portpolio audio start------------>	 

    <?
                        $mp3 = ".mp3";
				        $wav = ".wav";
				      
					   $i = 1;

					   if($_REQUEST['skill']==''){
					   $query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND (portfolio_data LIKE '%".$mp3."%' OR portfolio_data LIKE '%".$wav."%')";
                       }else{
					    $query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND (portfolio_data LIKE '%".$mp3."%' OR portfolio_data LIKE '%".$wav."%')AND skill LIKE '%".$_REQUEST['skill']."%'";
					   
					   }

					   $run = q($query_gallery);

					   $fatch_num_of_audio = nr($run);
					   if( $fatch_num_of_audio!=0){
	?> 
	 
	 <h3>
			<div style="transition-duration: 0.5s, 0.5s; transition-property: opacity, opacity; transition-timing-function: ease, ease; opacity: 1;" id="selected-filter-title" class="fullwidth">
				<div class="listitem" style="position:relative;left:0px; color:#fff; clear:both;">Portfolio Audio</div>
				
			</div>
	</h3>
	<?}?>

     <div style="width:100%; float:left; margin-bottom:25px;">

        <div class="container" style="margin:0px;">
			<section>
				<ul class="lb-album"> 
					
					<?

					   while($run_gallery = f($run)){
					?>
					
					<li>
						<a  href="portfolio_uploader/savefiles/<?=$run_gallery['portfolio_data']?>"> <!-- <a href="#image-<?=$i?>"> -->
							<img src="images/mp3.png" width="150"  alt="image01"><!-- </a> -->
							<span><?=$run_gallery['title']?></span>
						 </a> 
						<div class="lb-overlay" id="image-<?=$i?>">
							<a href="portfolio_uploader/savefiles/<?=$run_gallery['portfolio_data']?>"><img src="images/mp3.png" alt="image01" /></a>
                            <a href="#page" class="lb-close">x Close</a>
							<div>
                            	<h2><?=$run_gallery['title']?></h2>
								<p><?=$run_gallery['description']?><br></p>
								
								<a href="#image-<?=$i-1?>" class="lb-prev">Prev</a>
								<a href="#image-<?=$i+1?>" class="lb-next">Next</a>
							</div>
							
						</div>
					</li>

              <?$i = $i+1;}?>

				</ul>
			</section>
        </div>

     </div>


<script src="http://mediaplayer.yahoo.com/js"></script>

<!----------- portpolio audio end here ------------>

<?}?>














<!--------------portfolio video section-------------------->

       
	<?
   if($_REQUEST['type']=='' OR $_REQUEST['type']==4){
?>	
		
		<?
		                $jpg = ".jpg";
						$png = ".png";
						$gif = ".gif";
						$i = 1;
						 if($_REQUEST['skill']==''){
						$query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND video != ''";
						 }else{
						 
						 $query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND skill LIKE '%".$_REQUEST['skill']."%'  AND video != ''";
						 
						 }
						$run = q($query_gallery);
						$num_of_item = nr($run);
						if($num_of_item!=0){
		
		?>
		
		
		
		<h3>
			<div style="transition-duration: 0.5s, 0.5s; transition-property: opacity, opacity; transition-timing-function: ease, ease; opacity: 1;" id="selected-filter-title" class="fullwidth">
				<div class="listitem" style="position:relative;left:0px; color:#fff; clear:both;">Portfolio Video</div>
				
			</div>
		</h3>
<?}?>
   
	
	<div style="width:100%; float:left; margin-bottom:25px;">
         <div >
			
				<ul> 
					
					
					  <?

						
						while($run_gallery = f($run)){

                         $videog = $run_gallery['video'];
					   
					?>
					
					 <li>
						
							<iframe width="300" height="300" src="<?=$videog?>" frameborder="0" allowfullscreen></iframe>
							
						
						
					</li>
					<li>&nbsp;<li>

              <?}?>

			</ul>
			
        </div>

     </div>

<?}?>











		 

</div>
			
		
			<div style="" class="pagination" id="pagination"></div>
</div>
		<!-- EXAMPLE WRAP END -->
</td></tr>
</table>



	</div>


	<div class="clear"></div>
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	<?include('iner_footer.php');?>








</body>
</html>>>