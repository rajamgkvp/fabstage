<?
include('../constants.php');

//ADD ADMIN USER
if(isset($_REQUEST['title']) && $_REQUEST['title'] != ''){
	$sql_duplicate = "SELECT * FROM fs_news WHERE title = '".$_REQUEST['title']."'";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){
		$sql_admin = "INSERT INTO fs_news (ntype, psd, title, desc1, pro, added_on) VALUES('".$_REQUEST['ntype']."', '".date('Y-m-d')."', '".$_REQUEST['title']."', '".$_REQUEST['desc1']."','".$_REQUEST['pro']."', '".date('Y-m-d h:m:s')."')";
		$res_admin = q($sql_admin);
		if($res_admin){
			$msg = '- News Added Successfully.';
		}
	}else{
		$msg = '- Duplicate News Title Not Allowed.';
	}
}
?>

<script>
function validate(){

	var errText = "";
	var errorflag = false;
		

	if(document.upload_form.title.value == ""){
		 errText += "- Please Enter News Title. \n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title.focus();
		 return false;
	}

	
	if(document.upload_form.desc1.value == ""){
		 errText += "- Please Enter News Description.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.desc1.focus();
		 return false;
	}


	if(document.upload_form.pro.value == ""){
		 errText += "- Please Enter Priority.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.pro.focus();
		 return false;
	}else{
		if(document.upload_form.pro.value != ""){
			phone1=document.upload_form.pro.value
			if(!(Res = phone1.match(/^[-0-9]*$/))){
				errText += "- Priority is not valid.\n";
				alert(errText);
				return false;
				 document.upload_form.pro.focus();
				errorflag = true;
			}
		}
	}

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

<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<body>
<form name="upload_form" action="" method="POST" onsubmit="return validate();">
<table  border="0" align="center" cellspacing="1" cellpadding="1">
<tr>
    <td colspan="2"  align="center" class="msg" style="font-size: 12px"><?=$msg?></td>
  </tr>
  <tr>
    <td colspan="2"  align="center"></td>
  </tr>
  <tr>
    <td colspan="2"  align="center" class="contentheading">Add News</td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>News Type</span></td>
    <td>
		<select name="ntype" id="ntype" style="font-family: verdana; font-size: 12px; color: #005EBB">
		    <option value="National News" selected>National News</option>
		    <option value="International News">International News</option>		   
		</select>
	 </td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  
  <tr>
    <td ><span class="style1">*</span>&nbsp;<span>News Title</span> </td>
    <td ><input name="title" type="text" value="" id="title" size="25" ></td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Description</span></td>
    <td>
		<textarea name="desc1" id="desc1" rows="10" cols="40"></textarea>
	</td>
  </tr>
   <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Priority</span></td>
    <td><input name="pro" value="1" type="text" id="pro" size="4"></td>
  </tr>
    <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="image" src="admin_img/add_news.jpg" name="Submit">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

 
</body>

