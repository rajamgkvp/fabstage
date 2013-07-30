<?php include_once('constants.php');

$id = $_REQUEST['id']; 
  if($_REQUEST['name']!="") {
		

		
	  $sql1 = "UPDATE fs_company_contact SET name = '".$_REQUEST['name']."', address = '".$_REQUEST['address']."', email = '".$_REQUEST['email']."', phone ='".$_REQUEST['phone']."',url ='".$_REQUEST['url']."',updated_on='".date('Y-m-d h:i:s')."'  WHERE fld_id = '".$id."'";



				$sql = q($sql1);
				if($sql){
					$msg1 = ' Contact has been Edit Successfully.';
				}
	

  }





//POPULATE 
$sql_pop = "SELECT * FROM fs_company_contact WHERE fld_id = '".$id."'";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />

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
</script>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<form name="upload_form" action="" method="POST" onsubmit="return validate();">
   <p align="center"><span style="font-family: verdana; color: red; font-size: 12px"><?=$msg?></p>

  <p>&nbsp;</p>
  
  
  
 <table cellpadding="2" cellspacing="2">
		   <tr>
					<td colspan="2" height="8"></td>
			  </tr> 
			 <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span class="text_heading">Name</span> </td>
					<td><input name="name" type="text" value="<?=$row['name']?>" id="name" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			   <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span class="text_heading">Address</span> </td>
					<td><input name="address" type="text" value="<?=$row['address']?>" id="address" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>



			    <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span class="text_heading">Email</span> </td>
					<td><input name="email" type="text" value="<?=$row['email']?>" id="email" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			  <tr>
					<td width="150px"><span class="style1">*</span>&nbsp;<span class="text_heading">Phone</span> </td>
					<td>
					   <input name="phone" type="text" value="<?=$row['phone']?>" id="phone" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>
			   <tr>
					<td width="150px"><span class="style1"></span>&nbsp;<span class="text_heading">URL</span> </td>
					<td>
					   <input name="url" type="text" value="<?=$row['url']?>" id="url" size="60" >
					</td>
			  </tr>
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr>

			  


			
			   <tr>
				  <td>&nbsp;</td>
					<td>
					  <input type="submit" value="Edit Contact" class="button" name="Submit">
				   </td>
				</tr>
		</table>




</form> 
