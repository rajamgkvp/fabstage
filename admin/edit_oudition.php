<?
include('../constants.php');

$id = $_REQUEST['id'];

if(isset($_REQUEST['title']) && $_REQUEST['title'] !=''){
	
	$sql1 = "SELECT * FROM fs_oudition WHERE title = '".$_REQUEST['title']."' AND fld_id != ".$id."";
	$res1 = q($sql1);
	$count = nr($res1);
	if($count == 0){

		//UPDATE THE USER TABLE
		$sql = "UPDATE fs_oudition SET  title = '".$_REQUEST['title']."',company_id = '".$_REQUEST['company']."', description = '".$_REQUEST['desc1']."',updated_on = '".date('Y-m-d h:m:s')."' WHERE fld_id = ".$id."";
		$res = q($sql);

		if($res){
			$msg = '- Audition Updated Successfully.';
		}else{
			$msg = '- Audition Not Updated.';
		}
	}else{
		$msg = '- Duplicate Title Not Allowed.';
	}
}

//POPULATE 
$sql_pop = "SELECT * FROM fs_oudition WHERE fld_id = ".$id."";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />


<script>
function validate(){

	var errText = "";
	var errorflag = false;
		
   if(document.upload_form.company.value == ""){
		 errText += "- Please Select Company\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.company.focus();
		 return false;
	}
	if(document.upload_form.title.value == ""){
		 errText += "- Please Enter Oudition Title. \n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title.focus();
		 return false;
	}

	
	if(document.upload_form.desc1.value == ""){
		 errText += "- Please Enter Oudition Description.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.desc1.focus();
		 return false;
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
    <td colspan="2" width="100%" align="center" class="contentheading">Update Audition</td>
  </tr>
 
  
  
  
  
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><span class="style1">*</span>&nbsp;<span>Company Name</span></td>
    <td>
	     <select id="company" name="company" >
		          <option value="">-- Select Company --</option>
				   <?
				   $sql = "SELECT * FROM fs_mamber where work_as = 2 order by name ASC";
	               $res = q($sql);
				   while($fatch = f($res)){
	               ?>
				  <option value="<?=$fatch['fld_id']?>"<?if($fatch['fld_id']==$row['company_id']){?>selected<?}?>><?=$fatch['name']?></option>
				  <?}?>
				  
           </select>
	
	</td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  
 
  <tr>
    <td width="30%"><span class="style1">*</span>&nbsp;<span>Audition Title</span> </td>
    <td width="58%"><input name="title" type="text" value="<?=$row['title']?>" id="title" size="25" ></td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Description</span></td>
    <td>
		<textarea name="desc1" id="desc1" rows="10" cols="40"><?=$row['description']?></textarea>
	</td>
  </tr>
   <tr>
    <td colspan="2" height="8"></td>
  </tr>
  
  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="submit" id="submit"  value="Update Audition" name="submit">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
