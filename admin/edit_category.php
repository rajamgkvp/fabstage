<?
include('../constants.php');

$id = $_REQUEST['id'];

if(isset($_REQUEST['skill']) && $_REQUEST['skill'] !=''){
	
	$sql1 = "SELECT * FROM fs_category WHERE category_name = '".$_REQUEST['skill']."' AND fld_id != ".$id."";
	$res1 = q($sql1);
	$count = nr($res1);
	if($count == 0){

		//UPDATE THE USER TABLE
		$sql = "UPDATE fs_category SET category_name = '".$_REQUEST['skill']."' WHERE fld_id = ".$id."";
		$res = q($sql);

		if($res){
			$msg = '- Record Updated Successfully.';
		}else{
			$msg = '- Record Not Updated.';
		}
	}else{
		$msg = '- Duplicate Not Allowed.';
	}
}

//POPULATE 
$sql_pop = "SELECT * FROM fs_category WHERE fld_id = ".$id."";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />

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
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<form name="upload_form" action="" method="POST" onsubmit="return validate();">
   <p align="center"><span style="font-family: verdana; color: red; font-size: 12px"><?=$msg?></p>

  <p>&nbsp;</p>
  <table width="60%" border="0" align="center">

    <tr>
      <td colspan="4"><div align="left" class="contentheading">Update Category</div></td>
    </tr>
	
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td width="42%"><span class="style1">*</span>&nbsp;<span>Category Name</span> </td>
    <td width="58%"><input class="input" name="skill" type="text" value="<?=$row['category_name']?>" id="skill" size="40" maxlength="25"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="image" name="update" id="update" value="" src="admin_img/update.jpg">
    </div></td>
    </tr>
</table>
</form> 
