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
<table width="80%"  border="0" align="center" cellspacing="1" cellpadding="1">
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
  <!-- <tr>
    <td colspan="2" width="100%" align="center" class="contentheading">Add Talent </td>
  </tr> -->
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Profile Name</span></td>
    <td><input class="input" name="fname" type="text" id="fname" size="50" maxlength="50"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><span class="style1">*</span>&nbsp;<span>Email</span></td>
    <td><input class="input" name="email" value="" type="text" id="email" size="50"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td><span class="style1">*</span>&nbsp;<span>Password</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42%"><span class="style1">*</span>&nbsp;<span>User Name</span> </td>
    <td width="58%"><input class="input" name="userName" type="text" value="" id="userName" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Workers</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
   <tr>
    <td><span class="style1"></span>&nbsp;<b>Main Skill</b></td>
    <td>
    	<!-- Main Skill -->
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Skill 1</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Skill 2</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Skill 3</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Skill 4</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Height</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Weight</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Measurement</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Ethenicity</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Eyes Color</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Hair Color</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Body Type</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Skin Color</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Shoes Size</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Dress Size</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Look Like</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>About Yourself</span></td>
    <td><textarea rows="4" cols="35"></textarea></td>
  </tr>

  
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Current Company</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Expertise In</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Location</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Gender</span></td>
    <td><select>
				  <option value="male">Male</option>
				  <option value="female">Female</option>
				
       </select></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Marital Status</span></td>
    <td><select>
				  <option value="married">Married</option>
				  <option value="unmarried">Unmarried</option>
				
       </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>DOB</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Nationality</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Language Know</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Work Area</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Wages Expectation</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Wages Amount</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Experience</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>

 <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Extra Skill</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Any Association</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Association Name</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Phone No</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Url</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Have Agent</span></td>
    <td><select>
				  <option value="no">No</option>
				  <option value="yes">Yes</option>
				
       </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Agent Name</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Agent Phone No</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Agent Email</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Summary</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Project Duration</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Status</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="50" maxlength="25"></td>
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

