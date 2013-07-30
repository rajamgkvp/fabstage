<?
include('../constants.php');

$id = $_REQUEST['id'];

if(isset($_REQUEST['title']) && $_REQUEST['title'] !=''){
	
	$sql1 = "SELECT * FROM fs_company_sub_category WHERE title = '".$_REQUEST['title']."' AND fld_id != ".$id."";
	$res1 = q($sql1);
	$count = nr($res1);
	if($count == 0){

		//UPDATE THE USER TABLE
		$sql = "UPDATE fs_company_sub_category SET category_id = '".$_REQUEST['ntype']."', sub_category = '".$_REQUEST['title']."', description = '".$_REQUEST['desc1']."'  WHERE fld_id = ".$id."";
		$res = q($sql);

		if($res){
			$msg = '- Sub Category Updated Successfully.';
		}else{
			$msg = '- Sub Category Not Updated.';
		}
	}else{
		$msg = '- Duplicate Sub Category Not Allowed.';
	}
}

//POPULATE 
$sql_pop = "SELECT * FROM fs_company_sub_category WHERE fld_id = ".$id."";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />


<script>
function validate(){

	var errText = "";
	var errorflag = false;
	
		
	if(document.upload_form.ntype.value == ""){
		 errText += "- Please Select Category. \n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.ntype.focus();
		 return false;
	}


	if(document.upload_form.title.value == ""){
		 errText += "- Please Enter  Sub Category Name. \n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title.focus();
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
    <td><span class="style1">*</span>&nbsp;<span>Category</span></td>
    <td>

		<select name="ntype" id="ntype" style="font-family: verdana; font-size: 12px; color: #005EBB">

		    <option value="" selected>-- Select Category --</option>

			<?$sql = "SELECT * FROM fs_company_category order by category_name";
	           $res = q($sql);	 
			   while($fatch = f($res)){
			   ?>

		    <option value="<?=$fatch['fld_id']?>"<?if($row['category_id']==$fatch['fld_id']){?>selected<?}?>><?=$fatch['category_name']?></option>
			
			 <?}?>
		</select>


	 </td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  
  <tr>
    <td ><span class="style1">*</span>&nbsp;<span>Sub Category Name</span> </td>
    <td ><input name="title" type="text" value="<?=$row['sub_category']?>" id="title" size="25" ></td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Description</span></td>
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
      <input type="image" src="admin_img/update.jpg" name="Submit">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
