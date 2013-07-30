<?
include('../constants.php');

$id = $_REQUEST['id'];

if(isset($_REQUEST['userName']) && $_REQUEST['userName'] !=''){
	
	$sql1 = "SELECT * FROM fs_admin WHERE fld_username = '".$_REQUEST['userName']."' AND fld_id != ".$id."";
	$res1 = q($sql1);
	$count = nr($res1);
	if($count == 0){

		//UPDATE THE USER TABLE
		$sql = "UPDATE fs_admin SET fld_fname = '".$_REQUEST['fname']."', fld_lname = '".$_REQUEST['lname']."', fld_username = '".$_REQUEST['userName']."', fld_password = '".$_REQUEST['Password']."', fld_email = '".$_REQUEST['email']."', fld_ip = '".$_SERVER['REMOTE_ADDR']."', fld_user_level = '".$_REQUEST['level']."' WHERE fld_id = ".$id."";
		$res = q($sql);

		if($res){
			$msg = '- Record Updated Successfully.';
		}else{
			$msg = '- Record Not Updated.';
		}
	}else{
		$msg = '- Duplicate Not Allowed.';
	}
}

//POPULATE 
$sql_pop = "SELECT * FROM fs_admin WHERE fld_id = ".$id."";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />

<script>
function validate(){

	var errText = "";
	var errorflag = false;
		

	if(document.upload_form.fname.value == ""){
		 errText += "- Please Enter First Name\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.fname.focus();
		 return false;
	}

	if(document.upload_form.lname.value == ""){
		 errText += "- Please Enter Last Name\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.lname.focus();
		 return false;
	}

	
	if(document.upload_form.userName.value == ""){
		 errText += "- Please Enter Username.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.userName.focus();
		 return false;
	}


	if(document.upload_form.Password.value == ""){
		 errText += "- Please Enter Password.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.Password.focus();
		 return false;
	}
	

    if(document.upload_form.email.value == ""){
		errText = "- Email is left blank.\n";
		alert(errText);
		errorflag = true;
		document.upload_form.email.focus();
		return false;
	}else if(document.upload_form.email.value != ""){
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(document.upload_form.email.value)){
			    errorflag = false;

		}else{
		errText += "- Email is not valid.\n";
		alert(errText);
		errorflag = true;
		document.upload_form.email.focus();
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
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<form name="upload_form" action="" method="POST" onsubmit="return validate();">
   <p align="center"><span style="font-family: verdana; color: red; font-size: 12px"><?=$msg?></p>

  <p>&nbsp;</p>
  <table width="60%" border="0" align="center">

    <tr>
      <td colspan="4"><div align="left" class="contentheading">Update User</div></td>
    </tr>
	
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>First Name</span></td>
    <td><input class="input" name="fname" type="text" id="fname" size="25" value="<?=$row['fld_fname']?>" maxlength="50"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Last Name</span></td>
    <td><input class="input" name="lname" type="text" id="lname" size="25" value="<?=$row['fld_lname']?>" maxlength="50"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42%"><span class="style1">*</span>&nbsp;<span>User Name</span> </td>
    <td width="58%"><input class="input" name="userName" type="text" value="<?=$row['fld_username']?>" id="userName" size="25" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Password</span></td>
    <td><input class="input" name="Password" value="<?=$row['fld_password']?>" type="password" id="Password" size="25" maxlength="25"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Email</span></td>
    <td><input class="input" name="email" value="<?=$row['fld_email']?>" type="text" id="email" size="25"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><span class="style1">*</span>&nbsp;<span>User Level</span></td>
    <td>
    	<select name="level" id="level">
    		<option value="1" <?=$row['fld_user_level']=='1'?'selected':''?>>Super Admin</option>
    		<option value="2" <?=$row['fld_user_level']=='2'?'selected':''?>>Admin</option>
    		<option value="3" <?=$row['fld_user_level']=='3'?'selected':''?>>Limited Access</option>
    	</select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="image" name="update" id="update" value="" src="admin_img/update.jpg">
    </div></td>
    </tr>
</table>
</form> 
