<?php 
	include_once('constants.php');





///
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
					0,
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
									   $Insert = "insert into fs_talent_project_video_link(talent_id,project_id,video_link,added_on)values('".$_SESSION['fab_id']."',0,'".$link."','".date('Y-m-d h:i:s')."') ";

									   $run_ins = q($Insert);
									}

                     }

		//
	   
        
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
           
                 

            //project_details.php?id=43
                
				header('location:project_details.php?id='.$userid.'');

			//



	  }else{
	         $msg1 = ' Project title is already exists please enter another project title.';
	  }



									
 }









?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
		<!-- sCRIPT TO DISPLAY GRAYBOX -->
		<script type="text/javascript">
			var GB_ROOT_DIR = "greybox/";
		</script>
		<script type="text/javascript" src="greybox/AJS.js"></script>
		<script type="text/javascript" src="greybox/AJS_fx.js"></script>
		<script type="text/javascript" src="greybox/gb_scripts.js"></script>
		<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
		<!-- sCRIPT TO DISPLAY GRAYBOX -->
		<script>
			function create(){
				winparam = 'width=900,height=600,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
				window.open('create_albums.php','',winparam);
			}
		</script>
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

		<script type="text/javascript">
			function MM_preloadImages() { //v3.0
			  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
				var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
				if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
			}
			function MM_swapImgRestore() { //v3.0
			  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
			}

			function MM_findObj(n, d) { //v4.01
				var p,i,x;  
				if(!d) d=document; 
				if((p=n.indexOf("?"))>0&&parent.frames.length) {
					d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);
				}
				if(!(x=d[n])&&d.all) 
					x=d.all[n]; 
				for (i=0;!x&&i<d.forms.length;i++) 
					x=d.forms[i][n];
				for(i=0;!x&&d.layers&&i<d.layers.length;i++)
					x=MM_findObj(n,d.layers[i].document);
				if(!x && d.getElementById) x=d.getElementById(n); return x;
			}

			function MM_swapImage() { //v3.0
				var i,j=0,x,a=MM_swapImage.arguments; 
				document.MM_sr=new Array; 
				for(i=0;i<(a.length-2);i+=3)
					if ((x=MM_findObj(a[i]))!=null){
					document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];
				}
			}
		</script>




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


<script language="javascript">
  function go(){
	window.location.href="project_details.php?id=<?=$userid?>";
  }
</script>




	</head>

	<body style="background:url(images/bg.jpeg) center top no-repeat fixed;" onload="MM_preloadImages('images/gallery/profile_hover.png','images/gallery/home_hover.png')">
        <div style="width:100%; float:left; background:url(images/gallery/white_bg.png) left top;">
			<?include('top.php');?> 
<?include('left_tab.php');?> 
	<div class="clear"></div>
	
	<div id="content_wrap" style="z-index:100;">	
		<div class="portfolio_left_area">
            
			
			<?include('talent_info.php');?>





		</div>
		

		  <!------------project list----------------->
		<div style="width:990px; height:30px; float:left; background:#313131; margin:15px 0px;">
        <div style="float:left; font-size:13px; color:#ccc; font-weight:bold; font-family: Arial, Helvetica, sans-serif; line-height:30px; padding-left:10px;">Projects</div>
        Select Image/Audio</a>
		<!-- <div class="upload_btn"><a href="upload_talent_project_files.php"  title="Upload Files" rel="gb_page_center[900, 520]">+ Add Projects</a></div> -->
		
		<div class="upload_btn"><a href="#" class="showhide">+ Add Projects</a></div>
		
		</div>
	  
			  
		
		<div style="float:left; clear:both;">
			<div style="float:left; width:170px; clear:both;">
				<?include('include_skill.php');?>
			</div>
			
			
			
			
			<div style="width:820px; float:left; margin-bottom:25px;">
				<?
				if($_REQUEST['skill']==''){
					$query_pro = "SELECT * FROM fs_talent_project where talent_id='".$_SESSION['fab_id']."' order by project_title asc";
				}else{
					$query_pro = "SELECT * FROM fs_talent_project where talent_id='".$_SESSION['fab_id']."' and skill LIKE '%".$_REQUEST['skill']."%' order by project_title asc";
				}
				$run_pro = q($query_pro);
				$num_of_row = nr($run_pro);
				$counter = 1;?>
        <div class="work_page_area">

<!-----add project here------------>
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
											
												<tr><td colspan="4" style="font-size:22px; text-align:center; color:#4FBFE3; border-bottom:1px #ccc solid; line-height:35px; font-weight:bold;">Add projects</td></tr>
                                            
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
														
															<td  align="left" style="font-size: 12px; color: #999; padding-top: 5px; font-family: Arial, Helvetica, sans-serif;"><input style="float: left; margin-right: 5px;" type="checkbox" name="cat[]" id="cat[]" value="<?=$value?>"> <?=$value?> </td>





														
											
														<?$i=$i+1;}
														
														}?>

											  
											 </tr>
											
											<tr><td colspan="3"><div class="border" style="margin:5px 0 0;"></div></td></tr>
								</table>

											<?} ?>
												
										
						

									
									<table>
									  
									  
									  <tr>
											<td colspan="3" height="8"></td>
									  </tr> 
									 
									  
									  <tr>
											<td width="150px" class="text_heading"><span class="style1">*</span>&nbsp;<span>Project Title</span> </td>
											<td colspan="2"><input name="pro_title" type="text" value="" id="pro_title" size="60" class="input_area" style="width:500px;"></td>
											
									  </tr>


									  <tr>
											<td colspan="3" height="8"></td>
									  </tr> 
									  <tr>
										<td width="150px" class="text_heading"><span class="style1">*</span>&nbsp;<span>Month/Year</span> </td>
										<td colspan="2"><input name="month" type="text" value="" id="month" size="60" class="input_area" style="width:500px;"></td>
											
									  </tr>
									  <tr>
											<td colspan="3" height="8"></td>
									  </tr>
									
									  <tr>
											<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Description</span> </td>
											<td colspan="2">
											   <textarea id="des" name="des" rows="4" cols="47" class="input_area" style="width:500px; height:110px;"></textarea>
											</td>

										<tr >				
										    <td>&nbsp;</td>
											<td colspan="2" style="color:#666;">&nbsp;
											</td>
															 
									  				
									   </tr>

									  <tr >				
										    <td class="text_heading" valign="top">Image:</td>
											<td colspan="2" style="color:#666;"><input type="file" name="files[]" id="files" multiple/>
											    <br/><span style="color:#666;font-size:12px;">Here You Can Upload Multiple Images by holding Ctrl Key</span>
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
													 <span style="color:#666;font-size:12px;">( Separate Video Link By Comma Ex: Link1,Link,Link3 )</span>
												</td>
														
													
												 
										 </tr> 

									   <tr>
											<td colspan="3" align="center">&nbsp;
												
											</td>
										</tr>
										<tr>
										   <td>&nbsp;</td>
											<td colspan="2" align="left">
												<input type="submit" id="submit"  name="submit" value="Create" class="register_create_ac" style="margin:0px; float:left;">
											</td>
										</tr>
								    </table>
								</form>
		</div>	

<!-----end add project here------------>



            <ul>
				<?while($fatch_pro = f($run_pro)){ 
				  if($counter==4){
				  
				  $counter = 1;
				  
				  }
                  $jpg = ".jpg";
				  $png = ".png";
				  $gif = ".gif";
				  $select_image = "select * from fs_project_portfolio where talent_id='".$_SESSION['fab_id']."' AND project_id='".$fatch_pro['fld_id']."' AND (portfolio_data LIKE '%".$jpg."%' OR portfolio_data LIKE '%".$png."%' OR portfolio_data LIKE '%".$gif."%') limit 1";
				  $image_run = q($select_image);
				  $image_num = nr($image_run);
				  $fatch_image = f($image_run);
				 if($image_num!=0){
				  ?>
			  	
				


            <?
			if($counter==1){
            ?>
			<li><a href="project_details.php?id=<?=$fatch_pro['fld_id']?>">
            	<h2><b><?=substr($fatch_pro['project_title'],0,40)?></b></h2>
            	<div class="mod_img" style="background:url('project_uploader_image/savefiles/<?=$fatch_image['portfolio_data']?>') no-repeat center; background-size:auto 240px;"></div>
                <p><?=substr($fatch_pro['description'],0,50)?>...</p>
                </a> 
            </li>
            <?}else if($counter==2){?>
            <li><a href="project_details.php?id=<?=$fatch_pro['fld_id']?>">
            	<h2><b><?=substr($fatch_pro['project_title'],0,40)?></b></h2>
            	<div class="mod_img" style="background:url('project_uploader_image/savefiles/<?=$fatch_image['portfolio_data']?>') no-repeat center; background-size:auto 240px;"></div>
                <p><?=substr($fatch_pro['description'],0,50)?>...</p> 
                </a>
            </li>
            <?}else {?>
            <li><a href="project_details.php?id=<?=$fatch_pro['fld_id']?>">
            	<h2><b><?=substr($fatch_pro['project_title'],0,40)?></b></h2>
            	<div class="mod_img" style="background:url('project_uploader_image/savefiles/<?=$fatch_image['portfolio_data']?>') no-repeat center; background-size:auto 240px;"></div>
                <p><?=substr($fatch_pro['description'],0,50)?>...</p> 
                </a>
            </li>
           <?}?>
			
    



          <!----------------->
				 <?}else{?>    	
				 
			 
				   <?
			if($counter==1){
            ?>
			<li><a href="project_details.php?id=<?=$fatch_pro['fld_id']?>">
            	<h2><b><?=substr($fatch_pro['project_title'],0,40)?></b></h2>
            	<div class="mod_img" style="background:url('../images/mod_girl.jpg') no-repeat center;"></div>
                <p><?=substr($fatch_pro['description'],0,50)?>...</p>
                </a> 
            </li>
            <?}else if($counter==2){?>
            <li><a href="project_details.php?id=<?=$fatch_pro['fld_id']?>">
            	<h2><b><?=substr($fatch_pro['project_title'],0,40)?></b></h2>
            	<div class="mod_img" style="background:url('../images/mod_girl.jpg') no-repeat center;"></div>
                <p><?=substr($fatch_pro['description'],0,50)?>...</p> 
                </a>
            </li>
            <?}else {?>
            <li><a href="project_details.php?id=<?=$fatch_pro['fld_id']?>">
            	<h2><b><?=substr($fatch_pro['project_title'],0,40)?></b></h2>
            	<div class="mod_img" style="background:url('../images/mod_girl.jpg') no-repeat center;"></div>
                <p><?=substr($fatch_pro['description'],0,50)?>...</p> 
                </a>
            </li>
           <?}?>

			<?}
			
			$num_of_row = $num_of_row-1;
		
			$counter = $counter+1;}?>
            
            </ul>
    </div>

	


	 </div>
     
     
     
		  </div>

			<!------------project end----------------------->

		
			</div>
			
		
			<div style="" class="pagination" id="pagination"></div>
		</div>
		<!-- EXAMPLE WRAP END -->
	</div>
	<div class="clear"></div>
	<?include('inner_footer.php');?>
</div>
</body>
</html>