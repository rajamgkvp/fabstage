<?php
include('constants.php');

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
                
				//header('location:project_details.php?id="'.$id.'"');

			//



	  }else{
	         $msg1 = ' Project title is already exists please enter another project title.';
	  }



									
 }

///



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
		   alert("You Forgot to select an image");
		   return false;
     }

  if(document.upload_form.video_link.value == ""){
		 errText += "- Please Enter Your Video Link. \n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.video_link.focus();
		 return false;
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


<body <?if($_REQUEST['pro_title']!=''){?>onload="go();parent.parent.GB_hide();"<?}?>>
  <div id="main_container">
	
	<div>

			<!-- <div class="top_ads"></div> -->
			<div class="body_area">
				<div class="left_area_body">
					
					<div class="how_it_work_area">
						
						<div class="clear"></div>






<table width="85%" border="0" cellspacing="5" cellpadding="5" style="margin-top:30px; margin-left:90px;">
					  
	<?if($msg1!=''){?>
		<tr>
           <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
        </tr>
     <?}?>
							<!-------------------->
         <tr>
			<td>
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
					<td colspan="3" height="8"></td>
			  </tr> 
			 
			  
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Project Title</span> </td>
					<td colspan="2"><input name="pro_title" type="text" value="" id="pro_title" size="60" ></td>
					
			  </tr>


		      <tr>
					<td colspan="3" height="8"></td>
			  </tr> 
			  <tr>
					<td><span class="style1">*</span>&nbsp;<span>Month/Year</span> </td>
					<td colspan="2"><input name="month" type="text" value="" id="month" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="3" height="8"></td>
			  </tr>
			
			  <tr>
					<td ><span class="style1">*</span>&nbsp;<span>Description</span> </td>
					<td colspan="2">
					   <textarea id="des" name="des" rows="4" cols="47"></textarea>
					</td>

             <tr >				
						 <td class="email_text" >Image:</td>
						 <td colspan="2"><input type="file" name="files[]" id="files" multiple/>
							<br/><span style="color:#ff3333;font-size:12px;font-family:calibri;width:360px;">Here You Can Upload Multiple Images by holding Ctrl Key</span>
						 </td>
									 
							
			</tr>

              
			  
			   <tr>
					<td colspan="3" align="center">
						&nbsp;
					</td>
				</tr>

                  <tr >                      
						   
											
								<td width="150px"><span class="style1"></span>&nbsp;<span>Video Link</span></td>
								<td colspan="2"><textarea id="video_link" name="video_link" cols="47" rows="4"></textarea><br>
									<span style="color:#ff3333;font-size:12px;font-family:calibri;width:360px;">( Separate Video Link By Comma Ex: Link1,Link,Link3 )</span>
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
						<input type="submit" id="submit"  name="submit" value="Create" >
					</td>
				</tr>
		
		
		
		
		
		
		
		</form>
		
			
		
		</td>
	</tr>
</table>
							
								






			







				



						
						</div>
					</div>
					
					
				</div>
			
			</div>
		</div>
	</div>
</body>
</html>
