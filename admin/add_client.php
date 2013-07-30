<?
include('../constants.php');

//ADD ADMIN USER
if(isset($_REQUEST['userName']) && $_REQUEST['userName'] != ''){
	$sql_duplicate = "SELECT * FROM fs_client WHERE userName = '".$_REQUEST['userName']."'";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){

		$sql2 =  "INSERT INTO fs_mamber(name, user_name, email,password,work_as,added_on)VALUES('".$_REQUEST['fname']."', '".$_REQUEST['userName']."','".$_REQUEST['email']."', '".$_REQUEST['Password']."',3,'".date('Y-m-d h:m:s')."')";
		$run2 = q($sql2);
		if($run2){
				 //GET LAST INSERTED ID
			    $query = "SELECT LAST_INSERT_ID()";
			    $result = q($query);
			    if ($result) {
				
				$row = mysql_fetch_row($result);
				$member_id = $row[0];
			
			}

		$sql_admin = "INSERT INTO fs_client(member_id,company_type,company_name,added_on)VALUES('".$member_id."','".$_REQUEST['company_type']."', '".$_REQUEST['company_name']."','".date('Y-m-d h:m:s')."')";

		$res_admin = q($sql_admin);
		if($res_admin){
				$msg = '-  Added Successfully.';
		
	}else{
		$msg = '- Some error occure.';
	}

}else{
		$msg = '- Some error occure.';
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


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<body>
<form name="upload_form" action="" method="POST" onsubmit="return validate();" autocomplete="off">
<table width="90%"  border="0" align="center" cellspacing="1" cellpadding="1">
 
<tr>
    <td colspan="2" align="center" class="msg"><?=$msg?></td>
  </tr>
   
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="70%">&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Name</span></td>
    <td><input class="input" name="fname" type="text" id="fname" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><span class="style1">*</span>&nbsp;<span>Email</span></td>
    <td><input class="input" name="email" value="" type="text" id="email" size="30"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td><span class="style1">*</span>&nbsp;<span>Password</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42%"><span class="style1">*</span>&nbsp;<span>User Name</span> </td>
    <td width="58%"><input class="input" name="userName" type="text" value="" id="userName" size="30" ></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42%"><span class="style1"></span>&nbsp;<span>Company Type</span> </td>
    <td width="58%"><input class="input" name="company_type" type="text" value="" id="company_type" size="30" ></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42%"><span class="style1"></span>&nbsp;<span>Company Name</span> </td>
    <td width="58%"><input class="input" name="company_name" type="text" value="" id="company_name" size="30" ></td>
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

