<?php
include('constants.php');




if($_FILES['files']!=''){
function upload_multiple_file($file,$file_dir="project_uploader_image/savefiles") {
	
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
}

?>













<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


</head>
<script>
function validate(){

	var errText = "";
	var errorflag = false;
	


	if(document.upload_form.uploadedfile.value == ""){
		 errText += "- Please Browser Picture. \n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.uploadedfile.focus();
		 return false;
	}
	
	


	
	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }
</script>

<body>
<div id="main_container">
	
	<div>

			<div class="top_ads"></div>
			<div class="body_area">
				<div class="left_area_body">
					<form enctype="multipart/form-data" name="upload_form" action="" method="POST" onsubmit="return validate();">
					<div class="how_it_work_area">
						
						<div class="clear"></div>
							<table width="85%" border="0" cellspacing="5" cellpadding="5" style="margin-top:30px; margin-left:90px;">
							
								
								<!-----------image upload----------->
								<tr>
									<td class="email_text">Image:</td>
									<td><input type="file" name="files[]" multiple/>
									<br/><span style="color:#ff3333;font-size:12px;font-family:calibri;width:360px;">Here You Can Upload Multiple Images by holding Ctrl Key</span>
									</td>
									<td><input type="submit" value="Submit Image" id="image" name="image" class="post_button" /></td>
								</tr>
                              <!----------Audio Upload------------------>
                                <tr>
									<td class="email_text">Audio:</td>
									<td><input type="file" name="files1[]" multiple/>
									<br/><span style="color:#ff3333;font-size:12px;font-family:calibri;width:360px;">Here You Can Upload Multiple Audio Files by holding Ctrl Key</span>
									</td>
									<td><input type="submit" value="Submit Audio" id="audio"  name="audio" class="post_button" /></td>
								</tr>


								<!---------video upload----->
                                <tr>
										<td width="150px"><span class="style1"></span>&nbsp;<span>Video Link</span> </td>
								<td>
					  	 

                                 <textarea id="video_link" name="video_link" cols="47" rows="4"></textarea><br>
					                <span style="color:#ff3333;font-size:12px;font-family:calibri;width:360px;">( Separate Video Link By Comma Ex: Link1,Link,Link3 )</span>

					              </td>
								  <td><input type="submit" value="Submit Video" id="video" name="video" class="post_button" /></td>
			  </tr>


							</table>




						
						</div>
					</div>
					</form>
					
				</div>
			
			</div>
		</div>
	</div>
</body>
</html>
