<?

include('../constants.php');

$id = $_REQUEST["id"];

if($_FILES['pic']['name'] != ""){	//UPLOAD LOGO
	
	//LARGE PIC
	$uploaddir = 'portfolio_talent_video/';
	$input_name = 'pic';
	$uploadfile = time().'_pic_'.$_FILES[$input_name]['name'];

	

	$file = $_FILES['pic'];
	//CHECK EXT
	$allowedExtensions = array( "jpg", "jpeg", "gif","png", "JPG", "JPEG", "GIF", "PNG");
	function isAllowedExtension($file){
		  global $allowedExtensions;
		  return in_array(end(explode(".", $file)), $allowedExtensions);
	}

	if($file['error'] == UPLOAD_ERR_OK){
		if(isAllowedExtension($file['name'])){
			if(move_uploaded_file($_FILES[$input_name]['tmp_name'], $uploaddir.$uploadfile)){


				
				$sql = "INSERT INTO fs_portfolio_talent_video (ex_id, title, large_pic,  added_on) VALUES ('".$_REQUEST['id']."', '".$_REQUEST['title']."', '".$uploadfile."',  '".date('Y-m-d h:i:s')."')";


				$sql = q($sql);
				if($sql){
					$msg1 = ' Video has been Added Successfully.';
				}
			}else{
				$msg1 = ' Video has not been Uploaded Successfully.';
			}
										}else{
			$msg = "file type must be jpg, gif or png";
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
		 errText = "- Please Enter the Video Title.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title.focus();
		 return false;
	}	

		if(document.upload_form.pic.value == "" ){
		 errText = "- Please  Browse the Portfolio Video.";
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
	if(confirm('Are you sure to delete this Video?'))
	window.location.href='delete_talent_video.php?id='+id+'&id1='+id1;
}
</script>

<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<table width="96%" border="0" align="center" cellspacing="1" cellpadding="1">
<tr>
    <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"></td>
  </tr>
  <tr>
    <td colspan="2" align="left" class="contentheading">Add Portfolio Video :   </td>
  </tr>
  <tr>
    <td colspan="2" height="8">
		<form name="upload_form" action="" method="POST" onSubmit="return validate();" enctype="multipart/form-data" autocomplete="off">
		<table cellpadding="2" cellspacing="2">
		   <tr>
					<td colspan="2" height="8"></td>
			  </tr> <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Title</span> </td>
					<td><input name="title" type="text" value="" id="title" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			   <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Browse  Video</span> </td>
					<td><input name="pic" type="file" value="" id="pic" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			
			   <tr>
				  <td>&nbsp;</td>
					<td>
					  <input type="submit" value="Add Video" name="Submit">
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
    <td colspan="2" align="left" class="contentheading">Portfolio Video List</td>
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
		   <tr style="background-color: #003162">
				<td width="300px" style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Title</td>
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Video</td>
				
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Delete</td>

			  </tr> 
			  <?
				$sqlg = "Select * from fs_portfolio_talent_video Where ex_id = '".$_REQUEST['id']."' order by fld_id DESC";
				$resg = q($sqlg);
				$countg = nr($resg);
				if($countg){
					while($rowg = f($resg)){
			  ?>
			  <tr>
					<td height="25px"><?=$rowg['title']?></td>
					<td height="25px"><img src="portfolio_talent_video/<?=$rowg['large_pic']?>" width="100px"></td>
				
					<td><a href="#" onClick="javascript:delete_pub(<?=$rowg['fld_id']?>, <?=$_REQUEST['id']?>)"><img src="admin_img/delete.png" border="0"></a></td>
			  </tr>	
			<?		}
				}else{?>
				<tr>
					<td height="25px" colspan=4  style="font-family: arial; font-size: 15px; font-weight: bold; color: #ff0000">No  Video Available.</td>
			  </tr>	
			<?}?>
		</table>						
	</td>
  </tr>
 </table>
