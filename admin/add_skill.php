<?
include('../constants.php');

//ADD ADMIN USER
if(isset($_REQUEST['skill']) && $_REQUEST['skill'] != ''){
	$sql_duplicate = "SELECT * FROM fs_skill WHERE skill_name = '".$_REQUEST['skill']."'";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){
		$sql_admin = "INSERT INTO fs_skill (skill_name,  fld_addedon) VALUES('".$_REQUEST['skill']."', '".date('Y-m-d h:m:s')."')";
		$res_admin = q($sql_admin);
		if($res_admin){
			$msg = '- Added Successfully.';
		}
	}else{
		$msg = '- Duplicate Skill Not Allowed.';
	}

}
?>

<script>
function validate(){

	var errText = "";
	var errorflag = false;
		

	

	
	if(document.upload_form.skill.value == ""){
		 errText += "- Please Enter Skill name.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.skill.focus();
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
    <td colspan="2" width="100%" align="center" class="contentheading">Add Skill </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td width="42%"><span class="style1">*</span>&nbsp;<span>Skill Name</span> </td>
    <td width="58%"><input class="input" name="skill" type="text" value="" id="skill" size="40" maxlength="25"></td>
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

