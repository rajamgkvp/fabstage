<?

include('../constants.php');

$id = $_REQUEST["id"];

if($_FILES['pic']['name'] != ""){	//UPLOAD LOGO
	
	//LARGE PIC
	$uploaddir = 'portfolio_project/';
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


						
			$sql1 = "INSERT INTO fs_portfolio_project (ex_id, from1,to1,des, doc,  added_on) VALUES ('".$_REQUEST['id']."', '".$_REQUEST['title']."','".$_REQUEST['title1']."','".$_REQUEST['des']."', '".$uploadfile."',  '".date('Y-m-d h:i:s')."')";


				$sql = q($sql1);
				if($sql){
					$msg1 = ' Project has been Added Successfully.';
				}
			}else{
				$msg1 = ' Project has not been Uploaded Successfully.';
			}
										}else{
			$msg1 = "file type must be jpg, gif or png";
		}
	}
}	
 

?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE?></title>

<script>
function edit_news(id){
	winparam = 'width=600,height=550,scrollbars=1,left=340,top=60,screenX=0,screenY=0';
	window.open('edit_project.php?id='+id,'',winparam);
}
</script>
</head>
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


//DELETE USER
function delete_pub(id){
	if(confirm('Are you sure to delete this Project?'))
	window.location.href='delete_project.php?id='+id+'&pro_id=<?=$_REQUEST['id']?>';
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
    <td colspan="2" align="left" class="contentheading">Add Portfolio Project :   </td>
  </tr>
  <tr>
    <td colspan="2" height="8">
		<form name="upload_form" action="" method="POST" onSubmit="return validate();" enctype="multipart/form-data" autocomplete="off">
		<table cellpadding="2" cellspacing="2">
		   <tr>
					<td colspan="2" height="8"></td>
			  </tr> 
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>From Month/Year</span> </td>
					<td><input name="title" type="text" value="" id="title" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			   <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>To Month/Year</span> </td>
					<td><input name="title1" type="text" value="" id="title1" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>



			   <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Browse  Project</span> </td>
					<td><input name="pic" type="file" value="" id="pic" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Description</span> </td>
					<td>
					   <textarea id="des" name="des" rows="4" cols="50"></textarea>
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>

			  


			
			   <tr>
				  <td>&nbsp;</td>
					<td>
					  <input type="submit" value="Add Project" name="Submit">
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
    <td colspan="2" align="left" class="contentheading">Project List</td>
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
				<td width="300px" style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">From Month/Year</td>
				<td width="300px" style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">To Month/Year</td>
				<td width="300px" style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Description</td>
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Project</td>
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Edit</td>
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Delete</td>

			  </tr> 
			  <?
				$sqlg = "Select * from fs_portfolio_project Where ex_id = '".$_REQUEST['id']."' order by fld_id DESC";
				$resg = q($sqlg);
				$countg = nr($resg);
				if($countg){
					while($rowg = f($resg)){
			  ?>
			  <tr>
					<td height="25px"><?=$rowg['from1']?></td>
					<td height="25px"><?=$rowg['to1']?></td>
					<td height="25px"><?=$rowg['des']?></td>
					<td height="25px"><?=$rowg['doc']?></td>
					<td><a href="#" onClick="javascript:edit_news(<?=$rowg['fld_id']?>)"><img src="admin_img/edit.png" border="0"></a>	  </td>
					<td><a href="#" onClick="javascript:delete_pub(<?=$rowg['fld_id']?>, <?=$_REQUEST['id']?>)"><img src="admin_img/delete.png" border="0"></a></td>
			  </tr>	
			<?		}
				}else{?>
				<tr>
					<td height="25px" colspan=4  style="font-family: arial; font-size: 15px; font-weight: bold; color: #ff0000">No  Project Available.</td>
			  </tr>	
			<?}?>
		</table>						
	</td>
  </tr>
 </table>
