<?php include_once('constants.php');

$id = $_REQUEST['id']; 
  if($_REQUEST['title']!="") {
		
if($_FILES['pic']['name'] != ""){	//UPLOAD LOGO
	
	//LARGE PIC
	$uploaddir = 'admin/portfolio_talent_project/';
	$input_name = 'pic';
	$uploadfile = time().'_pic_'.$_FILES[$input_name]['name'];

	

	$file = $_FILES['pic'];
	//CHECK EXT
	$allowedExtensions = array( "jpg", "jpeg", "gif","png", "JPG", "JPEG", "GIF", "PNG","docx");
	function isAllowedExtension($file){
		  global $allowedExtensions;
		  return in_array(end(explode(".", $file)), $allowedExtensions);
	}

	if($file['error'] == UPLOAD_ERR_OK){
		if(isAllowedExtension($file['name'])){
			if(move_uploaded_file($_FILES[$input_name]['tmp_name'], $uploaddir.$uploadfile)){


						
			$sql1 = "UPDATE fs_portfolio_talent_project SET from1 = '".$_REQUEST['title']."', to1 = '".$_REQUEST['title1']."', des = '".$_REQUEST['des']."', doc = '".$uploadfile."' WHERE fld_id = '".$id."'";


				$sql = q($sql1);
				if($sql){
					$msg1 = ' Project has been Edit Successfully.';
				}
			}else{
				$msg1 = ' Project has not been Uploaded Successfully.';
			}
										}else{
			$msg1 = "file type must be jpg, gif or png";
		}
	}
}else {
		
	  $sql1 = "UPDATE fs_portfolio_talent_project SET from1 = '".$_REQUEST['title']."', to1 = '".$_REQUEST['title1']."', des = '".$_REQUEST['des']."' WHERE fld_id = '".$id."'";



				$sql = q($sql1);
				if($sql){
					$msg1 = ' Project has been Edit Successfully.';
				}
}	

  }





//POPULATE 
$sql_pop = "SELECT * FROM fs_portfolio_talent_project WHERE fld_id = '".$id."'";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />

<script>
function validate(){

	var errText = "";
	var errorflag = false;
	
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

		


	
	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }
</script>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<style type="text/css">
	
	.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
	.text span{font-size:17px;}
	.button { width:auto; padding:0 10px; height:28px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px; height:28px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	 .text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:12px;color:#669966;font-weight:bold; padding-top:5px; text-transform:capitalize;}
												  
</style>

<form name="upload_form" action="" method="POST" onsubmit="return validate();">
   <p align="center"><span style="font-family: verdana; color: red; font-size: 12px"><?=$msg1?></p>

  <p>&nbsp;</p>
  
  
  
 <table cellpadding="2" cellspacing="2">
		   <tr>
					<td colspan="2" height="8"></td>
			  </tr> 
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>From Month/Year</span> </td>
					<td><input name="title" type="text" value="<?=$row['from1']?>" id="title" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			   <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>To Month/Year</span> </td>
					<td><input name="title1" type="text" value="<?=$row['to1']?>" id="title1" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>



			   <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Browse  Project</span> </td>
					<td><input name="pic" type="file" value="<?=$row['doc']?>" id="pic" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Description</span> </td>
					<td>
					   <textarea id="des" name="des" rows="4" cols="50"><?=$row['des']?></textarea>
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>

			  


			
			   <tr>
				  <td>&nbsp;</td>
					<td>
					  <input type="submit" value="Edit Project" class="button" name="Submit">
				   </td>
				</tr>
		</table>




</form> 
