<?
include('../constants.php');

//ADD ADMIN USER
if(isset($_REQUEST['userName']) && $_REQUEST['userName'] != ''){
	$sql_duplicate = "SELECT * FROM fs_admin WHERE fld_username = '".$_REQUEST['userName']."'";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){
		$sql_admin = "INSERT INTO fs_admin (fld_fname, fld_lname, fld_username, fld_password, fld_email, fld_ip, fld_active, fld_user_level, fld_addedon) VALUES('".$_REQUEST['fname']."', '".$_REQUEST['lname']."', '".$_REQUEST['userName']."', '".$_REQUEST['Password']."','".$_REQUEST['email']."', '".$_SERVER['REMOTE_ADDR']."', 0, '".$_REQUEST['level']."', '".date('Y-m-d h:m:s')."')";
		$res_admin = q($sql_admin);
		if($res_admin){
			$msg = '- Admin User Added Successfully.';
		}
	}else{
		$msg = '- Duplicate Not Allowed.';
	}

}
?>

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


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<body>
<form name="upload_form" action="" method="POST" onsubmit="return validate();" autocomplete="off">
<table width="300"  border="0" align="center" cellspacing="1" cellpadding="1">
 <tr>
    <td colspan="2" width="100%" align="center" height="20px"></td>
  </tr>
   <tr>
    <td colspan="2" width="100%" align="center"></td>
  </tr>
<tr>
    <td colspan="2" width="100%" align="center" class="msg"><?=$msg?></td>
  </tr>
   <tr>
    <td colspan="2" width="100%" align="center"></td>
  </tr>
  <tr>
    <td colspan="2" width="100%" align="center" height="20px"></td>
  </tr>
  <tr>
    <td colspan="2" width="100%" align="center" class="contentheading">Add Admin User </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>First Name</span></td>
    <td><input class="input" name="fname" type="text" id="fname" size="25" maxlength="50"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Last Name</span></td>
    <td><input class="input" name="lname" type="text" id="lname" size="25" maxlength="50"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42%"><span class="style1">*</span>&nbsp;<span>User Name</span> </td>
    <td width="58%"><input class="input" name="userName" type="text" value="" id="userName" size="25" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Password</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="25" maxlength="25"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Email</span></td>
    <td><input class="input" name="email" value="" type="text" id="email" size="25"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><span class="style1">*</span>&nbsp;<span>User Level</span></td>
    <td>
    	<select name="level" id="level">
    		<option value="1">Super Admin</option>
    		<option value="2" selected>Admin</option>
    		<option value="3">Limited Access</option>
    	</select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="image" src="admin_img/create_user.jpg" name="Submit">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

 
</body>

