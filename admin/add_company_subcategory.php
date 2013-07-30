<?
include('../constants.php');

//ADD ADMIN USER
if(isset($_REQUEST['title']) && $_REQUEST['title'] != ''){
	$sql_duplicate = "SELECT * FROM fs_company_sub_category WHERE title = '".$_REQUEST['title']."'";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){
		$sql_admin = "INSERT INTO fs_company_sub_category (category_id, sub_category, description, added_on) VALUES('".$_REQUEST['ntype']."','".$_REQUEST['title']."', '".$_REQUEST['desc1']."','".date('Y-m-d h:m:s')."')";
		$res_admin = q($sql_admin);
		if($res_admin){
			$msg = '- Company Sub Category Added Successfully.';
		}
	}else{
		$msg = '- Duplicate Company Sub Category Title Not Allowed.';
	}
}
?>

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
		 errText += "- Please Enter Sub Category Title. \n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title.focus();
		 return false;
	}

	
	/*if(document.upload_form.desc1.value == ""){
		 errText += "- Please Enter Sub Category Description.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.desc1.focus();
		 return false;
	} */




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
    <!-- <td colspan="2"  align="center" class="contentheading">Add News</td> -->
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Company Category</span></td>
    <td>

		<select name="ntype" id="ntype" style="font-family: verdana; font-size: 12px; color: #005EBB">

		    <option value="" selected>-- Select Category --</option>

			<?$sql = "SELECT * FROM fs_company_category order by category_name";
	           $res = q($sql);	 
			   while($fatch = f($res)){
			   ?>

		    <option value="<?=$fatch['fld_id']?>"><?=$fatch['category_name']?></option>
			
			 <?}?>
		</select>


	 </td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  
  <tr>
    <td ><span class="style1">*</span>&nbsp;<span>Sub Category Name</span> </td>
    <td ><input name="title" type="text" value="" id="title" size="25" ></td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Description</span></td>
    <td>
		<textarea name="desc1" id="desc1" rows="10" cols="40"></textarea>
	</td>
  </tr>
   <tr>
    <td colspan="2" height="8"></td>
  </tr>
  
  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="submit"  name="submit" id="submit" value="Submit">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

 
</body>

