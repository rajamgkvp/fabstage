<?
include('../constants.php');

//ADD ADMIN USER
if(isset($_REQUEST['userName']) && $_REQUEST['userName'] != ''){
	$sql_duplicate = "SELECT * FROM fs_company WHERE userName = '".$_REQUEST['userName']."'";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){

		    for($j=0;$j<count($_REQUEST['cat']);$j++)
                       {
					   $check_val.=",";
                       $check_val.= $_REQUEST['cat'][$j];
                       $check_val.=",";
                       }


			$sql2 =  "INSERT INTO fs_mamber(name, user_name, email,password,work_as,added_on)VALUES('".$_REQUEST['fname']."', '".$_REQUEST['userName']."','".$_REQUEST['email']."', '".$_REQUEST['Password']."',2,'".date('Y-m-d h:m:s')."')";
		    $run2 = q($sql2);
		  	if($run2){
				 //GET LAST INSERTED ID
			    $query = "SELECT LAST_INSERT_ID()";
			    $result = q($query);
			    if ($result) {
				
				$row = mysql_fetch_row($result);
				$member_id = $row[0];
			
			}

		$sql_admin = "INSERT INTO fs_company(member_id,main_skill,other1, other2, other3,other4,company_name,your_name,designation,work_area,expectation,association,association_name,summary,added_on)VALUES('".$member_id."','".$check_val."','".$_REQUEST['other1']."', '".$_REQUEST['other2']."', '".$_REQUEST['other3']."','".$_REQUEST['other4']."','".$_REQUEST['company_name']."','".$_REQUEST['your_name']."','".$_REQUEST['designation']."','".$_REQUEST['work_area']."', '".$_REQUEST['expectation']."','".$_REQUEST['association']."','".$_REQUEST['association_name']."','".$_REQUEST['summary']."','".date('Y-m-d h:m:s')."')";







		$res_admin = q($sql_admin);
		if($res_admin){
			$msg = '-  Added Successfully.';
		
	}else{
		$msg = '- Some error occure.';
	}
	
	
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



	

    

	
	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }
</script>

<script>
    function endis(){
				

	if(document.getElementById('association').value=='no'){

		document.upload_form.association_name.disabled = true;
		

	}else{

		document.upload_form.association_name.disabled = false;
	
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
    <td width="58%"><input class="input" name="userName" type="text" value="" id="userName" size="30"></td>
  </tr>
  
  
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
   <tr>
    <td><span class="style1"></span>&nbsp;<b>Main Skill</b></td>
    <td>
    	<!-- Main Skill -->
    </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  <table width="80%"  border="0" align="center" cellspacing="1" cellpadding="1">
  <?
			$sql = "SELECT * FROM fs_category order by category_name ASC";
				$res = q($sql);	
					while($fatch = f($res)){  ?>
							 <table width="85%"  border="0" align="center" cellspacing="0" cellpadding="0">
									  <tr>
											<td class="text_heading" style="font-size:12px;font-weight:bold; padding-top:5px;" align="left"><?=$fatch['category_name']?>  </td>
											
										 </tr>
										 <tr><td>&nbsp;</td></tr>
										
							   </table>
							   
							   <table width="80%"  border="0" align="center" cellspacing="0" cellpadding="0">
									
									  <tr align="center">  
										  <?
											     $i=0;
											     $sql1 = "SELECT * FROM fs_sub_category where category_id ='".$fatch['fld_id']."'   order by sub_category ASC";
											     $res1 = q($sql1);	
											     while($fatch1 = f($res1)){ 
												   if($i%5==0){
											    ?>
													 </tr><tr>
												<?}?>
											     <td width="200" align="left" style="font-size:13px; padding-top:5px;"><input type="checkbox" name="cat[]" id="cat[]" value="<?=$fatch1['sub_category']?>"><?=$fatch1['sub_category']?> </td>

											  <?$i=$i+1; }?>

										 </tr>
										 <tr><td>&nbsp;</td></tr>




									  <tr><td colspan="4"><div class="border"></div></td></tr>
							   </table>


						   
						   	 <?}?>
   </table>

   <table width="80%"  border="0" align="center" cellspacing="1" cellpadding="1">
  <tr>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td width="30%"><span class="style1"></span>&nbsp;<span>Other Skill 1</span>&nbsp;&nbsp;<input class="input" name="other1" value="" type="text" id="other1"  ></td>
    <td width="30%"><span class="style1"></span>&nbsp;<span>Other Skill 2</span>&nbsp;&nbsp;<input class="input" name="other2" value="" type="text" id="other2"  ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="30%"><span class="style1"></span>&nbsp;<span>Other Skill 3</span>&nbsp;&nbsp;<input class="input" name="other3" value="" type="text" id="other3"  ></td>
    <td width="30%"><span class="style1"></span>&nbsp;<span>Other Skill 4</span>&nbsp;&nbsp;<input class="input" name="other4" value="" type="text" id="other4"  ></td>
  </tr>
  
  </table>
  <table width="80%"  border="0" align="center" cellspacing="1" cellpadding="1">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Company Name</span></td>
    <td><input class="input" name="company_name" value="" type="text" id="company_name" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Your Name</span></td>
    <td><input class="input" name="your_name" value="" type="text" id="your_name" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Your Designation</span></td>
    <td><input class="input" name="designation" value="" type="text" id="designation" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Work Area</span></td>
    <td><!-- <input class="input" name="work_area" value="" type="text" id="work_area" size="30" > -->
		   <select id="work_area" name="work_area">
		          <option value="">-- Select --</option>
				  <option value="home_town">Home Town</option>
				  <option value="home_country">Home Country</option>
				  <option value="across_world">Across World</option>
           </select>
	
	
	
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Expertise</span></td>
    <td><input class="input" name="expectation" value="" type="text" id="expectation" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
   <tr>
    <td><span class="style1"></span>&nbsp;<span>Any Association</span></td>
   
	   <td><select id="association" name="association" onchange="endis();">
		         
				  <option value="no">No</option>
				  <option value="yes">Yes</option>
				  
           </select></td>



  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Association Name</span></td>
    <td><input class="input" name="association_name" value="" type="text" id="association_name" size="30" disabled></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> 
  
  
  
  





  <tr>
    <td><span class="style1"></span>&nbsp;<span>Summary</span></td>
    <td><textarea id="summary" name="summary"  rows="4" cols="25"></textarea></td>
  </tr>

  <!-- <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Status</span></td>
    <td><textarea id="status" name="status" class="input" rows="4" cols="25"></textarea></td>
  </tr> -->

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

