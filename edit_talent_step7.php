<?

include('constants.php');

$id = $_SESSION['fab_id'];

if($_FILES['pic']['name'] != ""){	//UPLOAD LOGO
	
	//LARGE PIC
	$uploaddir = 'admin/portfolio_talent_logo/';
	$input_name = 'pic';
	$uploadfile = time().'_pic_'.$_FILES[$input_name]['name'];

	

	$file = $_FILES['pic'];
	//CHECK EXT
	$allowedExtensions = array( "jpg", "jpeg", "gif","png", "JPG", "JPEG", "GIF", "PNG" , "docx" , "doc");
	function isAllowedExtension($file){
		  global $allowedExtensions;
		  return in_array(end(explode(".", $file)), $allowedExtensions);
	}

	if($file['error'] == UPLOAD_ERR_OK){
		if(isAllowedExtension($file['name'])){
			if(move_uploaded_file($_FILES[$input_name]['tmp_name'], $uploaddir.$uploadfile)){


				
				$sql = "INSERT INTO fs_portfolio_talent_logo (ex_id, title, large_pic,  added_on) VALUES ('".$id."', '".$_REQUEST['title']."', '".$uploadfile."',  '".date('Y-m-d h:i:s')."')";


				$sql = q($sql);
				if($sql){
					$msg1 = ' Resume has been Added Successfully.';
				}
			}else{
				$msg1 = ' Resume has not been Uploaded Successfully.';
			}
										}else{
			$msg = "file type must be Document Type";
		}
	}
}	


?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE?></title>
</head>
<script>


function validate(){

	var errText = "";
	var errorflag = false;
	
	if(document.upload_form.title.value == "" ){
		 errText = "- Please Enter the Resume Title.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title.focus();
		 return false;
	}	

		if(document.upload_form.pic.value == "" ){
		 errText = "- Please  Browse the Portfolio Resume.";
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


//DELETE USER
function delete_pub(id,id1){
	if(confirm('Are you sure to delete this Resume?'))
	window.location.href='delete_talent_resume_front.php?id='+id+'&id1='+id1;
}
</script>

<style type="text/css">
	
	.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
	.text span{font-size:17px;}
	.button { width:auto; padding:0 10px; height:28px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px; height:28px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	 .text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:12px;color:#669966;font-weight:bold; padding-top:5px; text-transform:capitalize;}
												  
</style>


   <div style="background:#669966; padding:5px;"> 
	  <a href="edit_talent_step1.php" class="text">Profile Information <span>&raquo;</span></a>  
	    
	   <a href="edit_talent_step3.php" class="text">Project Summary<span>&raquo;</span></a> 
	   <a href="edit_talent_step8.php" class="text">Add project <span>&raquo;</span></a>
	   <a href="edit_talent_step4.php" class="text">Add Portfolio <span></span></a> 
	   <!-- <a href="edit_talent_step5.php" class="text">Audio <span>&raquo;</span></a> 
	   <a href="edit_talent_step6.php" class="text">Video <span>&raquo;</span></a>  -->
	   
	   <!-- <a href="edit_talent_step7.php" class="text">Resume <span></span></a>  -->
	   
  </div> 
<table width="96%" border="0" align="center" cellspacing="1" cellpadding="1">
<tr>
    <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"></td>
  </tr>
  <tr>
    <td colspan="2" align="left" class="text_heading">Add Portfolio Resume :   </td>
  </tr>
  <tr>
    <td colspan="2" height="8">
		<form name="upload_form" action="" method="POST" onSubmit="return validate();" enctype="multipart/form-data" autocomplete="off">
		<table cellpadding="2" cellspacing="2">
		   <tr>
					<td colspan="2" height="8"></td>
			  </tr> <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span class="text_heading">Title</span> </td>
					<td><input name="title" type="text" value="" id="title" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			   <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span class="text_heading">Browse  Resume</span> </td>
					<td><input name="pic" type="file" value="" id="pic" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			
			   <tr>
				  <td>&nbsp;</td>
					<td>
					  <input type="submit" value="Add Resume" class="button" name="Submit">
				   </td>
				</tr>
		</table>
		<form>
	</td>
  </tr>
  <tr>
    <td colspan="2" height="10" align="center"></td>
  </tr>
   <tr>
    <td colspan="2" align="left" class="text_heading">Portfolio Resume List</td>
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
				<td width="300px" style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Title</td>
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Resume</td>
				
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Delete</td>

			  </tr> 
			  <?
				$sqlg = "Select * from fs_portfolio_talent_logo Where ex_id = '".$id."' order by fld_id DESC";
				$resg = q($sqlg);
				$countg = nr($resg);
				if($countg){
					while($rowg = f($resg)){
			  ?>
			  <tr>
					<td height="25px"><?=$rowg['title']?></td>
					<td height="25px"><?=$rowg['large_pic']?></td>
				
					<td><a href="#" onClick="javascript:delete_pub(<?=$rowg['fld_id']?>, <?=$id?>)"><img src="admin/admin_img/delete.png" border="0"></a></td>
			  </tr>	
			<?		}
				}else{?>
				<tr>
					<td height="25px" colspan="4"  style="font-family: arial; font-size: 15px; font-weight: bold; color: #ff0000">No  Resume Available.</td>
			  </tr>	
			<?}?>
		</table>						
	</td>
  </tr>
 </table>
