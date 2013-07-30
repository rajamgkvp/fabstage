<?
include('../constants.php');

//ADD ADMIN USER
if(isset($_REQUEST['userName']) && $_REQUEST['userName'] != ''){
	$sql_duplicate = "SELECT * FROM fs_talent_company WHERE user_name = '".$_REQUEST['userName']."'";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){
		$sql_admin = "INSERT INTO fs_talent_company (user_name, password, email, profile_name, work_as, added_on) VALUES( '".$_REQUEST['userName']."', '".$_REQUEST['Password']."','".$_REQUEST['email']."', '".$_REQUEST['pname']."', '".$_REQUEST['level']."', '".date('Y-m-d h:m:s')."')";
		$res_admin = q($sql_admin);
		if($res_admin){

			  $last_id = "SELECT * FROM fs_talent_company WHERE user_name = '".$_REQUEST['userName']."'";
	           $last = q($last_id);
			   $fatch_last = f($last);
				 $id = $fatch_last['fld_id'];
			  if($_REQUEST['level']=="talent") {

				 header("Location: talent.php?id='".$id."'");

			  }
			 else  if($_REQUEST['level']=="company") {

				 header("Location: company.php?id='".$id."'");

			  }



			$msg = '-  Added Successfully.';
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

	if(document.upload_form.pname.value == ""){
		 errText += "- Please Enter Profile Name.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.pname.focus();
		 return false;
	}

	if(document.upload_form.level.value == ""){
		 errText += "- Please Select Work as option.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.level.focus();
		 return false;
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
  <tr>
    <td colspan="2" width="100%" align="center" class="contentheading">Add Talent or Company User </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <!-- <td width="42%"><span class="style1">*</span>&nbsp;<span>User Name</span> </td> -->
	<?
	$sql = "SELECT * FROM fs_skill";
	$res = q($sql);	
	while($fatch = f($res)){
	
	
	?>
    <td width="58%"><input type="checkbox" name="vehicle" id="vehicle" value="Bike"><?=$fatch['skill_name']?></td>
	<?}?>
  </tr>



 </table>







  <table width="80%"  border="0" align="center" cellspacing="1" cellpadding="1">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Other Skill 1</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="40" maxlength="25"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Other Skill 2</span></td>
    <td><input class="input" name="email" value="" type="text" id="email" size="40"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Other Skill 3</span></td>
    <td><input class="input" name="pname" value="" type="text" id="pname" size="40"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Other Skill 4</span></td>
    <td><input class="input" name="pname" value="" type="text" id="pname" size="40"></td>
  </tr>
   
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="submit"  name="Submit" id="submit" value="Submit">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

 
</body>

