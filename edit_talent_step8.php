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
                
				//header('location:edit_talent_step8.php');

			//



	  }else{
	         $msg1 = ' Project title is already exists please enter another project title.';
	  }



									
 }












//require_once "project_uploader_image/phpuploader/include_phpuploader.php" ?>



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE?></title>

<script>
function edit_news(id){
	winparam = 'width=600,height=400,scrollbars=1,left=340,top=60,screenX=300,screenY=180';
	window.open('edit_talent_project.php?id='+id,'',winparam);
}
</script>
</head>
<script>





//DELETE USER
function delete_pub(id){
	if(confirm('Are you sure to delete this Project?'))
	window.location.href='delete_talent_project_front.php?id='+id+'&pro_id=<?=$id?>';
}



</script>

<script>
function validate(){

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
<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<link rel="stylesheet" href="css/edit_talent_css.css" type="text/css" />

<style type="text/css">
	
	.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
	.text span{font-size:17px;}
	.button { width:auto; padding:0 10px; height:28px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px; height:28px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	 .text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:12px;color:#669966;font-weight:bold; padding-top:5px; text-transform:capitalize;}
												  
</style>

    <div class="edit_profile_page">
       	<ul>
        <?include('edit_talent_profile.php');?>
        </ul>
       </div>



<table width="96%" border="0" align="center" cellspacing="1" cellpadding="1">
<tr>
    <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"></td>
  </tr>
  <tr>
    <td colspan="2" align="left" class="text_heading">Add Portfolio Project :   </td>
  </tr>
  <tr>
    <td colspan="2" height="8">
		
            <table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
						
						
					



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
	                        <td colspan="3"><span class="style1">*</span>&nbsp;<span class="text_heading">Select Skills</span> </td>
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
					<td width="150px"><span class="style1">*</span>&nbsp;<span class="text_heading">Project Title</span> </td>
					<td><input name="pro_title" type="text" value="" id="pro_title" size="60" >
					</td>
			  </tr>
		      <tr>
					<td colspan="2" height="8"></td>
			  </tr> 
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span class="text_heading">Month/Year</span> </td>
					<td><input name="month" type="text" value="" id="month" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span class="text_heading">Description</span> </td>
					<td>
					   <textarea id="des" name="des" rows="4" cols="47"></textarea>
					</td>
			<tr>
					<td colspan="2" align="center">
						&nbsp;
					</td>
				</tr>
	        
			 
			 <tr >				
										    <td class="email_text" >Image:</td>
											<td colspan="2"><input type="file" name="files[]" id="files" multiple/>
											    <br/><span style="color:#ff3333;font-size:12px;font-family:calibri;width:360px;">Here You Can Upload Multiple Images by holding Ctrl Key</span>
											</td>
															 
									  				
									   </tr>

                <tr>
					<td colspan="2" align="center">
						&nbsp;
					</td>
				</tr>

                
              
			   
			    <tr>
					<td width="150px"><span class="style1"></span>&nbsp;<span class="text_heading">Video Link</span> </td>
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
					<td colspan="2" align="center">
						&nbsp;
					</td>
				</tr>

			 <tr>
					<td colspan="2" style="padding-left:160px;">
						<input type="submit" id="submit"  name="submit" value="Create" class="button">
					</td>
				</tr>
		
			
		</form>


	</table>





	</td>
  </tr>
  <tr>
    <td colspan="2" height="10" align="center"></td>
  </tr>
   <tr>
    <td colspan="2" align="left" class="text_heading">Project List</td>
  </tr>
   <tr>
    <td colspan="2" height="10" align="center"></td>
  </tr>
  <?
	if($_REQUEST['msg']=='del'){
  ?>
   <tr>
    <td colspan="2" height="10" align="left"  style="font-family: arial; font-size: 12px; font-weight: bold; color: #ff0000">Record Deleted Successfully. </td>
  </tr>
   <tr>
    <td colspan="2" height="10" align="center"></td>
  </tr>
  <?}?>
   <tr>
    <td colspan="2" height="8" width="100%">
		<table cellpadding="1" cellspacing="1" width="100%">
		   <tr style="background-color: #669966">
				<td  style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Title</td>
			
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Delete</td>

			  </tr> 
			  <?
				$sqlg = "Select * from fs_talent_project Where talent_id = '".$id."' order by fld_id DESC";
				$resg = q($sqlg);
				$countg = nr($resg);
				if($countg){
					while($rowg = f($resg)){
                    $skill = str_replace(',,',',',$rowg['skill']);
					$skill = substr($skill,1,-1);
			  ?>
			  <tr>
					<td height="25px"><?=$rowg['project_title']?></td>
					
					<td><a href="#" onClick="javascript:delete_pub(<?=$rowg['fld_id']?>, <?=$id?>)"><img src="admin/admin_img/delete.png" border="0"></a></td>
			  </tr>	
			<?		}
				}else{?>
				<tr>
					<td height="25px" colspan="4"  style="font-family: arial; font-size: 15px; font-weight: bold; color: #ff0000">No  Project Available.</td>
			  </tr>	
			<?}?>
		</table>						
	</td>
  </tr>
 </table>
