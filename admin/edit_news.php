<?
include('../constants.php');

$id = $_REQUEST['id'];

if(isset($_REQUEST['title']) && $_REQUEST['title'] !=''){
	
	$sql1 = "SELECT * FROM fs_news WHERE title = '".$_REQUEST['title']."' AND fld_id != ".$id."";
	$res1 = q($sql1);
	$count = nr($res1);
	if($count == 0){

		//UPDATE THE USER TABLE
		$sql = "UPDATE fs_news SET ntype = '".$_REQUEST['ntype']."', title = '".$_REQUEST['title']."', desc1 = '".$_REQUEST['desc1']."', pro = '".$_REQUEST['pro']."' WHERE fld_id = ".$id."";
		$res = q($sql);

		if($res){
			$msg = '- News Updated Successfully.';
		}else{
			$msg = '- News Not Updated.';
		}
	}else{
		$msg = '- Duplicate Title Not Allowed.';
	}
}

//POPULATE 
$sql_pop = "SELECT * FROM fs_news WHERE fld_id = ".$id."";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />


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


<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>

<form name="upload_form" action="" method="POST" onsubmit="return validate();">

 <table   border="0" align="center" cellspacing="1" cellpadding="1">
<tr>
    <td colspan="2" width="100%" align="center" class="msg" style="font-size: 12px"><?=$msg?></td>
  </tr>
  <tr>
    <td colspan="2" width="100%" align="center"></td>
  </tr>
  <tr>
    <td colspan="2" width="100%" align="center" class="contentheading">Update News</td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>News Type</span></td>
    <td>
		<select name="ntype" id="ntype" style="font-family: verdana; font-size: 12px; color: #005EBB">
		    <option value="National News" <?=$row['ntype']=="International News"?'selected':''?>>National News</option>
		    <option value="International News" <?=$row['ntype']=="International News"?'selected':''?>>International News</option>
		</select>
	 </td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
 
  <tr>
    <td width="30%"><span class="style1">*</span>&nbsp;<span>News Title</span> </td>
    <td width="58%"><input name="title" type="text" value="<?=$row['title']?>" id="title" size="25" ></td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Description</span></td>
    <td>
		<textarea name="desc1" id="desc1" rows="10" cols="40"><?=$row['desc1']?></textarea>
	</td>
  </tr>
   <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Priority</span></td>
    <td><input name="pro" value="<?=$row['pro']?>" type="text" id="pro" size="4"></td>
  </tr>
    <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="image" src="admin_img/update.jpg" name="Submit">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
