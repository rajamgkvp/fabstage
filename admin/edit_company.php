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
		
		  for($j=0;$j<count($_REQUEST['cat']);$j++)
                       {
					   $check_val.=",";
                       $check_val.= $_REQUEST['cat'][$j];
                       $check_val.=",";
                       }
		
		$sql11 = "SELECT * FROM fs_company WHERE member_id = '".$id."' ";
		$query_run1 = q($sql11);
		$num_run = nr($query_run1);
		if($num_run!=0)	{
		//UPDATE THE USER TABLE
		$sql = "UPDATE fs_company SET 
		
		main_skill =  '".$check_val."',

		other1 = '".$_REQUEST['other1']."', 

		other2 = '".$_REQUEST['other2']."',

		other3 = '".$_REQUEST['other3']."', 

		other4 = '".$_REQUEST['other4']."',


		company_name = '".$_REQUEST['company_name']."', 

		your_name = '".$_REQUEST['your_name']."',
		
		designation = '".$_REQUEST['designation']."',
		
		work_area = '".$_REQUEST['work_area']."',

		expectation = '".$_REQUEST['expectation']."', 

		
		association = '".$_REQUEST['association']."', 

		association_name = '".$_REQUEST['association_name']."',
		
		
		summary = '".$_REQUEST['summary']."',

		update_on = '".date('Y-m-d h:m:s')."'
		
		
		WHERE member_id = '".$id."'";
		
		
		$res = q($sql);
		}else{
		
		   $sql = "INSERT INTO fs_company(member_id,main_skill,other1, other2, other3,other4,company_name,your_name,designation,work_area,expectation,association,association_name,summary,added_on)VALUES('".$id."','".$check_val."','".$_REQUEST['other1']."', '".$_REQUEST['other2']."', '".$_REQUEST['other3']."','".$_REQUEST['other4']."','".$_REQUEST['company_name']."','".$_REQUEST['your_name']."','".$_REQUEST['designation']."','".$_REQUEST['work_area']."', '".$_REQUEST['expectation']."','".$_REQUEST['association']."','".$_REQUEST['association_name']."','".$_REQUEST['summary']."','".date('Y-m-d h:m:s')."')";

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
$sql_pop = "SELECT * FROM fs_company WHERE member_id = ".$id."";
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

	if(document.upload_form.lname.value == ""){
		 errText += "- Please Enter Last Name\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.lname.focus();
		 return false;
	}

	
	if(document.upload_form.userName.value == ""){
		 errText += "- Please Enter Username.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.userName.focus();
		 return false;
	}


	if(document.upload_form.Password.value == ""){
		 errText += "- Please Enter Password.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.Password.focus();
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
		document.getElementById('association_name').value='';
		

	}else{

		document.upload_form.association_name.disabled = false;
		document.getElementById('association_name').value='<?=$row['association_name']?>';
		


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
  <!-- <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Works</span></td>
    <td><input class="input" name="Password" value="" type="password" id="Password" size="30" ></td>
  </tr> -->
  
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
											     <td width="200" align="left" style="font-size:13px; padding-top:5px;"><input type="checkbox" name="cat[]" id="cat[]" value="<?=$fatch1['sub_category']?>"<?if(strpos($row['main_skill'],$fatch1['sub_category'])){?>checked<?}?>><?=$fatch1['sub_category']?> </td>

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
    <td width="30%"><span class="style1"></span>&nbsp;<span>Other Skill 1</span>&nbsp;&nbsp;<input class="input" name="other1" value="<?=$row['other1']?>" type="text" id="other1"  ></td>
    <td width="30%"><span class="style1"></span>&nbsp;<span>Other Skill 2</span>&nbsp;&nbsp;<input class="input" name="other2" value="<?=$row['other2']?>" type="text" id="other2"  ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="30%"><span class="style1"></span>&nbsp;<span>Other Skill 3</span>&nbsp;&nbsp;<input class="input" name="other3" value="<?=$row['other3']?>" type="text" id="other3"  ></td>
    <td width="30%"><span class="style1"></span>&nbsp;<span>Other Skill 4</span>&nbsp;&nbsp;<input class="input" name="other4" value="<?=$row['other4']?>" type="text" id="other4"  ></td>
  </tr>
  
  </table>
  <table width="80%"  border="0" align="center" cellspacing="1" cellpadding="1">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 










  <tr>
    <td><span class="style1"></span>&nbsp;<span>Company Name</span></td>
    <td><input class="input" name="company_name" value="<?=$row['company_name']?>" type="text" id="company_name" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Your Name</span></td>
    <td><input class="input" name="your_name" value="<?=$row['your_name']?>" type="text" id="your_name" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Your Designation</span></td>
    <td><input class="input" name="designation" value="<?=$row['designation']?>" type="text" id="designation" size="30" ></td>
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
				  <option value="home_town" <?if($row['work_area']=='home_town'){?>selected<?}?>>Home Town</option>
				  <option value="home_country" <?if($row['work_area']=='home_country'){?>selected<?}?>>Home Country</option>
				  <option value="across_world" <?if($row['work_area']=='across_world'){?>selected<?}?>>Across World</option>
           </select>
	
	
	
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Expertise</span></td>
    <td><input class="input" name="expectation" value="<?=$row['expectation']?>" type="text" id="expectation" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
   <tr>
    <td><span class="style1"></span>&nbsp;<span>Any Association</span></td>
    
  	   <td><select id="association" name="association" onchange="endis();">
		         
				  <option value="no" <?if($row['association']=='no'){?>selected<?}?>>No</option>
				  <option value="yes" <?if($row['association']=='yes'){?>selected<?}?>>Yes</option>
				  
           </select></td>
  
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Association Name</span></td>
    <td><input class="input" name="association_name" value="<?=$row['association_name']?>" type="text" id="association_name" size="30" ></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> 
  
  
  
  





  <tr>
    <td><span class="style1"></span>&nbsp;<span>Summary</span></td>
    <td><textarea id="summary" name="summary"  rows="4" cols="25"><?=$row['summary']?></textarea></td>
  </tr>

  <!-- <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Status</span></td>
    <td><textarea id="status" name="status" class="input" rows="4" cols="25"><?=$row['status']?></textarea></td>
  </tr> -->
  
  
  
  
  
  
  
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="submit"  name="submit" id="submit" value="Edit Company ">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>




</form>
