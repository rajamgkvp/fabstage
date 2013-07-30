<?

include('../constants.php');

$id = $_REQUEST["id"];

if($_REQUEST['name']!= ""){	//UPLOAD LOGO
	

				$sql = "INSERT INTO fs_company_contact (company_id, name,address,email,phone,url,  added_on) VALUES ('".$_REQUEST['id']."', '".$_REQUEST['name']."','".$_REQUEST['address']."','".$_REQUEST['email']."', '".$_REQUEST['phone']."','".$_REQUEST['url']."',  '".date('Y-m-d h:i:s')."')";


				$sql = q($sql);
				if($sql){
					$msg1 = ' Contact has been Added Successfully.';
				}
			else{
				$msg1 = ' Contact has not been Uploaded Successfully.';
			}
										

}	


?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE?></title>

<script>
function edit_news(id){
	winparam = 'width=600,height=550,scrollbars=1,left=340,top=60,screenX=0,screenY=0';
	window.open('edit_contact.php?id='+id,'',winparam);
}
</script>


</head>

<script>


function validate(){

	var errText = "";
	var errorflag = false;
	
	if(document.upload_form.name.value == "" ){
		 errText = "- Please Enter the Contact Name.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.name.focus();
		 return false;
	}	

		if(document.upload_form.address.value == "" ){
		 errText = "- Please Enter the Contact Address.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.address.focus();
		 return false;
	}
	
		if(document.upload_form.email.value == "" ){
		 errText = "- Please Enter the Contact Email.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.email.focus();
		 return false;
	}	

		if(document.upload_form.phone.value == "" ){
		 errText = "- Please Enter the Contact Phone No.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.phone.focus();
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
	if(confirm('Are you sure to delete this Contact?')){

	window.location.href='delete_contact.php?id='+id+'&pro_id=<?=$_REQUEST['id']?>';
	}
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
    <td colspan="2" align="left" class="contentheading">Add Portfolio Contact :   </td>
  </tr>
  <tr>
    <td colspan="2" height="8">
		<form name="upload_form" action="" method="POST" onSubmit="return validate();" enctype="multipart/form-data" autocomplete="off" >
		<table cellpadding="2" cellspacing="2">
		   <tr>
					<td colspan="2" height="8"></td>
			  </tr> 
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Name</span> </td>
					<td><input name="name" type="text" value="" id="name" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			   <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Address</span> </td>
					<td><input name="address" type="text" value="" id="address" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>



			    <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Email</span> </td>
					<td><input name="email" type="text" value="" id="email" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span>Phone</span> </td>
					<td>
					   <input name="phone" type="text" value="" id="phone" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			   <tr>
					<td width="150px"><span class="style1"></span>&nbsp;<span>URL</span> </td>
					<td>
					   <input name="url" type="text" value="" id="url" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			  


			
			   <tr>
				  <td>&nbsp;</td>
					<td>
					  <input type="submit" value="Add Contact" name="Submit">
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
    <td colspan="2" align="left" class="contentheading">Contact List</td>
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
				<td width="300px" style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Name</td>
				<td width="300px" style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Address</td>
				<td width="300px" style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Email</td>
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Contact</td>
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">URL</td>
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Edit</td>
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Delete</td>

			  </tr> 
			  <?
				$sqlg = "Select * from fs_company_contact Where company_id = '".$_REQUEST['id']."' order by fld_id DESC";
				$resg = q($sqlg);
				$countg = nr($resg);
				if($countg){
					while($rowg = f($resg)){
			  ?>
			  <tr>	  
					<td height="25px"><?=$rowg['name']?></td>
					<td height="25px"><?=$rowg['address']?></td>
					<td height="25px"><?=$rowg['email']?></td>
					<td height="25px"><?=$rowg['phone']?></td>
					<td height="25px"><?=$rowg['url']?></td>

					<td><a href="#" onClick="javascript:edit_news(<?=$rowg['fld_id']?>)"><img src="admin_img/edit.png" border="0"></a>	  </td>
					
					<td><a href="#" onClick="javascript:delete_pub(<?=$rowg['fld_id']?>, <?=$_REQUEST['id']?>)"><img src="admin_img/delete.png" border="0"></a></td>
			  </tr>	
			<?		}
				}else{?>
				<tr>
					<td height="25px" colspan=4  style="font-family: arial; font-size: 15px; font-weight: bold; color: #ff0000">No  Contact Available.</td>
			  </tr>	
			<?}?>
		</table>						
	</td>
  </tr>
 </table>
