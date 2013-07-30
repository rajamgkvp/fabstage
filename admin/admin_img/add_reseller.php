<?

//ADD ADMIN USER
if(isset($_REQUEST['lt']) && $_REQUEST['lt'] != ''){
	$sql_duplicate = "SELECT * FROM tbl_el_pl_rate WHERE ltype = '".$_REQUEST['lt']."' AND lcat = '".$_REQUEST['ct']."' AND rate  = '".$_REQUEST['rate']."'";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){
		$sql_admin = "INSERT INTO tbl_el_pl_rate (ltype, lcat, rate, added_on) VALUES('".$_REQUEST['lt']."', '".$_REQUEST['ct']."', '".$_REQUEST['rate']."', '".date('Y-m-d h:m:s')."')";
		$res_admin = q($sql_admin);
		if($res_admin){
			$msg = '- Liability Rates Added Successfully.';
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
		

	if(document.upload_form.lt.value == ""){
		 errText += "- Please Select Liability Type \n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.lt.focus();
		 return false;
	}

	if(document.upload_form.ct.value == ""){

		 errText += "- Please Select Liability Category \n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.ct.focus();
		 return false;
	}

	
	if(document.upload_form.rate.value == ""){
		 errText += "- Please Enter Rate.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.rate.focus();
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
<form name="upload_form" action="" ENCTYPE = "multipart/form-data" method="POST" onsubmit="return validate();">
<p><h3>Browse Reseller Listing  - Reseller Listing <a href="main.php?page_id=reseller_listing">Click Here</a></h3></p>
<table width="600"  border="0" align="center" cellspacing="1" cellpadding="1">
<tr>
    <td colspan="2" width="100%" align="center" class="msg"><?=$msg?></td>
  </tr>
  <tr>
    <td colspan="2" width="100%" align="center"></td>
  </tr>
  <tr>
    <td colspan="2" width="100%" align="center" class="contentheading">Add Reseller</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Reseller Name</span></td>
    <td><input type="text" name="rname" id="rname" size="25" style="font-family: verdana; font-size: 12px;border: 1px solid #3C3C3C">	
	</td>
  </tr>
  <tr>
    <td colspan=2 height="6px"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Reseller Logo</span></td>
    <td>
		<input type="file" name="logo" id="logo" size="25" style="font-family: verdana; font-size: 12px;border: 1px solid #3C3C3C">
	</td>
  </tr>
  <tr>
    <td colspan=2 height="6px"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Contact Person</span></td>
    <td>
		<input type="text" name="cp" id="cp" size="25" style="font-family: verdana; font-size: 12px;border: 1px solid #3C3C3C">
	</td>
  </tr>
 <tr>
    <td colspan=2 height="6px"></td>
  </tr>
  <tr>
    <td>&nbsp;<span>Address</span></td>
    <td>
		<textarea rows="5" cols="30" style="font-family: verdana; font-size: 12px;border: 1px solid #3C3C3C"></textarea>
	</td>
  </tr>
  <tr>
    <td colspan=2 height="6px"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Email</span></td>
    <td>
		<input type="text" name="email" id="email" size="25" style="font-family: verdana; font-size: 12px;border: 1px solid #3C3C3C">
	</td>
  </tr>
  <tr>
    <td colspan=2 height="6px"></td>
  </tr>
  <tr>
    <td>&nbsp;<span>Phone</span></td>
    <td>
		<input type="text" name="phone" id="phone" size="25" style="font-family: verdana; font-size: 12px;border: 1px solid #3C3C3C">
	</td>
  </tr>
    <tr>
    <td colspan=2 height="6px"></td>
  </tr>
  <tr>
    <td>&nbsp;<span>Website</span></td>
    <td>
		<input type="text" name="website" id="website" size="25" style="font-family: verdana; font-size: 12px;border: 1px solid #3C3C3C">
	</td>
  </tr>
   <tr>
    <td colspan=2 height="6px"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Reseller Commission </span></td>
    <td>
		&pound;<input type="text" name="website" id="website" size="24" value="0.00" style="font-family: verdana; font-size: 12px;border: 1px solid #3C3C3C">
	</td>
  </tr>
   <tr>
    <td colspan=2 height="6px"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Username</span></td>
    <td>
		<input type="text" name="usname" id="usname" size="25" value="" style="font-family: verdana; font-size: 12px;border: 1px solid #3C3C3C">
	</td>
  </tr>
   <tr>
    <td colspan=2 height="6px"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Passowrd</span></td>
    <td>
		<input type="text" name="pwd" id="webpwdsite" size="25" value="" style="font-family: verdana; font-size: 12px;border: 1px solid #3C3C3C">
	</td>
  </tr>
   <tr>
    <td colspan=2 height="6px"></td>
  </tr>
  <tr>
    <td>&nbsp;<span>Your Reseller URL</span></td>
    <td>
		<input type="text" readonly name="rurl" size="80" id="rurl" value="http://tradesmaninsure.co.uk/onlinequote/index.php?rid=TR<?=rand(100,999).rand(10,99)?>" style="font-family: verdana; font-size: 12px;border: 0px solid #3C3C3C">
	</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="image" src="admin_img/add_reseller.jpg" name="Submit">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
</body>

