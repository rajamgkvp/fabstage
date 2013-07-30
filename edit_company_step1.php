<?
include('constants.php');

$id = $_SESSION['fab_id'];

if(isset($_REQUEST['submit']) && $_REQUEST['submit'] != ''){
	



		
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









//POPULATE 
$sql_member = "SELECT * FROM fs_mamber WHERE fld_id = ".$id."";
$res_member = q($sql_member);
$row_member = f($res_member);

//POPULATE 
$sql_pop = "SELECT * FROM fs_company WHERE member_id = ".$id."";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>






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



<?include('profile_tab.php');?>

<form name="upload_form" action="" method="POST" onsubmit="return validate();">



<table width="90%"  border="0" align="center" cellspacing="1" cellpadding="1">
 
<tr>
    <td colspan="2" align="center" class="msg"><?=$msg?></td>
  </tr>
  
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="70%">&nbsp;</td>
  </tr>
 
  
  
  <!-- <tr>
    <td><span class="style1">*</span>&nbsp;<span class="text_heading">Profile Name</span></td>
    <td><input class="input" name="fname" value="<?=$row_member['name']?>" type="text" id="fname" size="50" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><span class="style1">*</span>&nbsp;<span class="text_heading">Email</span></td>
    <td><input class="input" name="email" value="<?=$row_member['email']?>" type="text" id="email" size="50"></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td><span class="style1">*</span>&nbsp;<span class="text_heading">Password</span></td>
    <td><input class="input" name="Password" value="<?=$row_member['password']?>" type="password" id="Password" size="50" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td ><span class="style1">*</span>&nbsp;<span class="text_heading">User Name</span> </td>
    <td ><input class="input" name="userName" type="text" value="<?=$row_member['user_name']?>" id="userName" size="50" ></td>
  </tr> -->
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
    <td><span class="text_heading">Main Skill</span></td>
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
			$sql = "SELECT * FROM fs_company_category order by category_name ASC";
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
											     $sql1 = "SELECT * FROM fs_company_sub_category where category_id ='".$fatch['fld_id']."'   order by sub_category ASC";
											     $res1 = q($sql1);	
											     while($fatch1 = f($res1)){ 
												   if($i%5==0){
											    ?>
													 </tr><tr>
												<?}?>
											     <td width="200" align="left" style="font-size:13px; padding-top:5px;"><input style="font-size:13px; padding-top:5px;" type="checkbox" name="cat[]" id="cat[]" value="<?=$fatch1['sub_category']?>"<?if(strpos($row['main_skill'],$fatch1['sub_category'])){?>checked<?}?>><?=$fatch1['sub_category']?> </td>

											  <?$i=$i+1; }?>

										 </tr>
										 <tr><td>&nbsp;</td></tr>




									  <tr><td colspan="5"><div class="border"></div></td></tr>
									 
							   </table>


						   
						   	 <?}?>
   </table>

   <table width="80%"  border="0" align="center" cellspacing="1" cellpadding="1">
  <tr>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td width="30%"><span class="style1"></span>&nbsp;<span class="text_heading">Other Skill 1</span>&nbsp;&nbsp;<input class="input" name="other1" value="<?=$row['other1']?>" type="text" id="other1"  ></td>
    <td width="30%"><span class="style1"></span>&nbsp;<span class="text_heading">Other Skill 2</span>&nbsp;&nbsp;<input class="input" name="other2" value="<?=$row['other2']?>" type="text" id="other2"  ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="30%"><span class="style1"></span>&nbsp;<span class="text_heading">Other Skill 3</span>&nbsp;&nbsp;<input class="input" name="other3" value="<?=$row['other3']?>" type="text" id="other3"  ></td>
    <td width="30%"><span class="style1"></span>&nbsp;<span class="text_heading">Other Skill 4</span>&nbsp;&nbsp;<input class="input" name="other4" value="<?=$row['other4']?>" type="text" id="other4"  ></td>
  </tr>
  
  </table>
  <table width="90%"  border="0" align="center" cellspacing="1" cellpadding="1">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 










  <tr>
    <td><span class="style1"></span>&nbsp;<span class="text_heading">Company Name</span></td>


     <?if($row['company_name']!=''){?>

    <td><input class="input" name="company_name" value="<?=$row['company_name']?>" type="text" id="company_name" size="50" ></td>
    <?}else{?>
       <td><input class="input" name="company_name" value="<?=$row_member['name']?>" type="text" id="company_name" size="50" ></td>
    <?}?> 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span class="text_heading">Your Name</span></td>
    <td><input class="input" name="your_name" value="<?=$row['your_name']?>" type="text" id="your_name" size="50" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span class="text_heading">Your Designation</span></td>
    <td><input class="input" name="designation" value="<?=$row['designation']?>" type="text" id="designation" size="50" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
 
  
  
  <tr>
    <td><span class="style1"></span>&nbsp;<span class="text_heading">Work Area</span></td>
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
    <td><span class="style1"></span>&nbsp;<span class="text_heading">Expertise</span></td>
    <td><input class="input" name="expectation" value="<?=$row['expectation']?>" type="text" id="expectation" size="50" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
   <tr>
    <td><span class="style1"></span>&nbsp;<span class="text_heading">Any Association</span></td>
    
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
    <td><span class="style1"></span>&nbsp;<span class="text_heading">Association Name</span></td>
    <td><input class="input" name="association_name" value="<?=$row['association_name']?>" type="text" id="association_name" size="50" <?if($row['association']=='no'){?>disabled<?}?>></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> 
  
  
  
  





  <tr>
    <td><span class="style1"></span>&nbsp;<span class="text_heading">Work Summary</span></td>
    <td><textarea id="summary" name="summary"  rows="4" cols="39"><?=$row['summary']?></textarea></td>
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
      <input type="submit"  name="submit" id="submit" value="Edit Company " class="button">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>




</form>
