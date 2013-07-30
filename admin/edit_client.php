<?
include('../constants.php');

$id = $_REQUEST['id'];

if(isset($_REQUEST['userName']) && $_REQUEST['userName'] != ''){
	
	$sql1 = "SELECT * FROM fs_mamber WHERE user_name = '".$_REQUEST['userName']."' AND fld_id != ".$id."";
	$res1 = q($sql1);
	$count = nr($res1);
	if($count == 0){

		$sql_member = "UPDATE fs_mamber SET 
		
		name = '".$_REQUEST['fname']."',
		
		email = '".$_REQUEST['email']."',
		
		password = '".$_REQUEST['Password']."',

		user_name = '".$_REQUEST['userName']."' 
		
		WHERE fld_id = '".$id."'";
		
		
		$res_member = q($sql_member);
		if($res_member){
		
		
		//UPDATE THE USER TABLE
		$sql11 = "SELECT * FROM fs_client WHERE member_id = '".$id."' ";
		$query_run1 = q($sql11);
		$num_run = nr($query_run1);
		if($num_run!=0){
		
		$sql = "UPDATE fs_client SET 
		
		
		company_name = '".$_REQUEST['company_name']."', 

		company_type = '".$_REQUEST['company_type']."',

		updated_on = '".date('Y-m-d h:m:s')."'
		
		WHERE member_id = '".$id."'";
		
		
		$res = q($sql);
		}else{

			 $sql = "INSERT INTO fs_client(member_id,company_type,company_name,added_on)VALUES('".$id."','".$_REQUEST['company_type']."', '".$_REQUEST['company_name']."','".date('Y-m-d h:m:s')."')";

		     $res = q($sql);
		
		}

		
		if($res){

			$msg = '-  Updated Successfully.';

		
		}else{
			$msg = '-  Not Updated.';
		}

	}


	}else{
		$msg = '- Duplicate User Name Not Allowed.';
	}
}

//POPULATE 
$sql_member = "SELECT * FROM fs_mamber WHERE fld_id = ".$id."";
$res_member = q($sql_member);
$row_member = f($res_member);

//POPULATE 
$sql_pop = "SELECT * FROM fs_client WHERE member_id = ".$id."";
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


		if(document.upload_form.Password.value == ""){
		 errText += "- Please Enter Password.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.Password.focus();
		 return false;
	}



	
	if(document.upload_form.userName.value == ""){
		 errText += "- Please Enter Username.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.userName.focus();
		 return false;
	}


	/*	if(document.upload_form.company_type.value == ""){
		 errText += "- Please Enter Company Type.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.company_type.focus();
		 return false;
	}

		if(document.upload_form.company_name.value == ""){
		 errText += "- Please Enter Company Name.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.company_name.focus();
		 return false;
	}	*/


	
	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }
</script>

<!-- CALENDAR INCLUDE-->
<script type="text/javascript" src="src/calendar.js"></script>
<script type="text/javascript" src="src/calendar-setup.js"></script>
<script type="text/javascript" src="lang/calendar-en.js"></script>
<style type="text/css"> @import url("css/calendar-win2k-cold-1.css"); </style>


<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>

<form name="upload_form" action="" method="POST" onsubmit="return validate();">



<table width="90%"  border="0" align="center" cellspacing="1" cellpadding="1">
 
<tr>
    <td colspan="2" align="center" class="msg"><?=$msg?></td>
  </tr>
   

  <tr>
    <td width="30%">&nbsp;</td>
    <td width="70%">&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Profile Name</span></td>
    <td><input class="input" name="fname" value="<?=$row_member['name']?>" type="text" id="fname" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><span class="style1">*</span>&nbsp;<span>Email</span></td>
    <td><input class="input" name="email" value="<?=$row_member['email']?>" type="text" id="email" size="30"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td><span class="style1">*</span>&nbsp;<span>Password</span></td>
    <td><input class="input" name="Password" value="<?=$row_member['password']?>" type="password" id="Password" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42%"><span class="style1">*</span>&nbsp;<span>User Name</span> </td>
    <td width="58%"><input class="input" name="userName" type="text" value="<?=$row_member['user_name']?>" id="userName" size="30" ></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42%"><span class="style1"></span>&nbsp;<span>Company Type</span> </td>
    <td width="58%"><input class="input" name="company_type" type="text" value="<?=$row['company_type']?>" id="company_type" size="30" ></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42%"><span class="style1"></span>&nbsp;<span>Company Name</span> </td>
    <td width="58%"><input class="input" name="company_name" type="text" value="<?=$row['company_name']?>" id="company_name" size="30" ></td>
  </tr>
  
  
  
  
  
  
  
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="submit"  name="Submit" id="Submit" value="Submit">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>




</form>
