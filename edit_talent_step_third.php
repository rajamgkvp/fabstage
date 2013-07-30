<?php
	include('constants.php');
	$id = $_SESSION['fab_id'];
	if(isset($_REQUEST['submit']) && $_REQUEST['submit'] != '') {

				//UPDATE THE USER TABLE
				$sql11 = "SELECT * FROM fs_talent WHERE member_id = '".$id."' ";
				
				$query_run1 = q($sql11);

				$num_run = nr($query_run1);
				if($num_run!=0){




					$sql = "UPDATE fs_talent SET 
					
					current_comp = '".$_REQUEST['current_comp']."',
					expertise = '".$_REQUEST['expertise']."',
					
					work_area = '".$_REQUEST['work_area']."', 
					expectation = '".$_REQUEST['expectation']."', 
					amount = '".$_REQUEST['amount']."', 
					experience = '".$_REQUEST['experience']."',
					extra_skill = '".$_REQUEST['extra_skill']."',
					association = '".$_REQUEST['association']."', 
					association_name = '".$_REQUEST['association_name']."',
					phone_no = '".$_REQUEST['phone_no']."',
					url = '".$_REQUEST['url']."', 
					have_agent = '".$_REQUEST['have_agent']."',
					agent_name = '".$_REQUEST['agent_name']."',
					agent_phone_no = '".$_REQUEST['agent_phone_no']."',
					agent_email = '".$_REQUEST['agent_email']."'
					WHERE member_id = '".$id."'";
					$res = q($sql);
				}else{

					$sql = "INSERT INTO fs_talent(member_id,current_comp,expertise,work_area,expectation,amount,
					experience,extra_skill,association,association_name,phone_no,url,
					have_agent,agent_name,agent_phone_no,agent_email,added_on)
					VALUES('".$member_id."','".$_REQUEST['current_comp']."',
					'".$_REQUEST['expertise']."','".$_REQUEST['work_area']."', '".$_REQUEST['expectation']."','".$_REQUEST['amount']."',
					'".$_REQUEST['experience']."','".$_REQUEST['extra_skill']."',
					'".$_REQUEST['association']."','".$_REQUEST['association_name']."',
					'".$_REQUEST['phone_no']."','".$_REQUEST['url']."',
					'".$_REQUEST['have_agent']."','".$_REQUEST['agent_name']."',
					'".$_REQUEST['agent_phone_no']."','".$_REQUEST['agent_email']."',
					'".date('Y-m-d h:m:s')."')";
					$res = q($sql);
				}

				if($res){
					$msg = '- Successfully updated.';
				} else {
					$msg = '- Not updated.';
				}
			
		
}

//POPULATE 
$sql_member = "SELECT * FROM fs_mamber WHERE fld_id = ".$id."";
$res_member = q($sql_member);
$row_member = f($res_member);

//POPULATE 
$sql_pop = "SELECT * FROM fs_talent WHERE member_id = ".$id."";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>

<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<link rel="stylesheet" href="css/edit_talent_css.css" type="text/css" />



<script>
	function endis(){
		if(document.getElementById('association').value=='no'){

			document.upload_form.association_name.disabled = true;
			document.getElementById('association_name').value='';
			document.upload_form.phone_no.disabled = true;
			document.getElementById('phone_no').value='';
			document.upload_form.url.disabled = true;
			document.getElementById('url').value='';
		}else{
			document.upload_form.association_name.disabled = false;
			document.getElementById('association_name').value='<?=$row['association_name']?>';
			document.upload_form.phone_no.disabled = false;
			document.getElementById('phone_no').value='<?=$row['phone_no']?>';
			document.upload_form.url.disabled = false;
			document.getElementById('url').value='<?=$row['url']?>';
		}
	}

	function agent(){

		if(document.getElementById('have_agent').value=='no'){

			document.upload_form.agent_name.disabled = true;
			document.getElementById('agent_name').value='';
			document.upload_form.agent_phone_no.disabled = true;
			document.getElementById('agent_phone_no').value='';
			document.upload_form.agent_email.disabled = true;
			document.getElementById('agent_email').value='';

		}else{

			document.upload_form.agent_name.disabled = false;
			document.getElementById('agent_name').value='<?=$row['agent_name']?>';
			document.upload_form.agent_phone_no.disabled = false;
			document.getElementById('agent_phone_no').value='<?=$row['agent_phone_no']?>';
			document.upload_form.agent_email.disabled = false;
			document.getElementById('agent_email').value='<?=$row['agent_email']?>';
		}
	}
</script>

<!-- CALENDAR INCLUDE-->
<script type="text/javascript" src="admin/src/calendar.js"></script>
<script type="text/javascript" src="admin/src/calendar-setup.js"></script>
<script type="text/javascript" src="admin/lang/calendar-en.js"></script>
<style type="text/css"> @import url("admin/css/calendar-win2k-cold-1.css"); </style>

<style type="text/css">
	.style1 {color: #FF0000}
</style>

<style type="text/css">
	
	.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
	.text span{font-size:17px;}
	.button { width:auto; padding:0 10px; height:28px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px; height:28px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	
	.text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:12px;color:#666;font-weight:bold; padding-top:5px; text-transform:capitalize;}

.select_aera{width: 200px;
height: 30px;
float: left;
background: #fff;
border: none;
color: #7e7e7e;
padding: 6px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;}
	 .input_area{width: 190px;
height: 30px;
float: left;
background: #fff;
border: 1px #E7E7E7 solid;
color: #7e7e7e;
padding-left: 10px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;}
	 .input_select{width:190px; height:30px; padding:6px; float:left; border:1px #E7E7E7 solid; background:#fff; color:#7e7e7e; -webkit-border-radius:3px; -moz-border-radius:3px; border-radius:3px;}
	 .head_text{width:760px; float:left; line-height:34px;}
	 .head_text a{width:760px; color:#666666; font-weight:bold; float:left; line-height:34px; border-top:1px #ccc solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; border-bottom:1px #ccc solid; background:url(images/down_arrow.png) right 10px no-repeat #e7e7e7; padding-left:10px; text-decoration:none;}
	 .head_text a:hover{width:760px; color:#666666; font-weight:bold; float:left; line-height:34px; border-top:1px #ccc solid; border-bottom:1px #ccc solid; background:url(images/down_arrow.png) right 10px no-repeat #d5d5d5;}
	 
	 
	.register_create_ac{background:#42B3E5;
    border: 0 none;
    border-radius: 3px 3px 3px 3px;
    color: #FFFFFF;
    cursor: pointer;
    float: left;
    margin: 0px;
    padding: 10px 15px;
    text-align: center;
    width: auto;}										  
</style>


      <div class="edit_profile_page">
       	<ul>
        <?include('edit_talent_profile.php');?>
        </ul>
       </div>

	<form name="upload_form" action="" method="POST" onsubmit="return validate();">
    <table width="80%" border="0" cellspacing="0" cellpadding="6" align="right">

			  <tr>
				<td width="20%"><span class="text_heading">Expertise In</span></td>
				<td width="30%"><input class="input_area" name="expertise" value="<?=$row['expertise']?>" type="text" id="expertise" size="30" ></td>
                <td width="20%"><span class="text_heading">Current Company</span></td>
				<td width="30%"><input class="input_area" name="current_comp" value="<?=$row['current_comp']?>" type="text" id="current_comp" size="30" ></td>
			  </tr>

		
			  <tr>
			    <td><span class="text_heading">Interested To Work In </span></td>
			    <td><input class="input_area" name="work_area" value="<?=$row['work_area']?>" type="text" id="work_area" size="30" />
			      <span style="color:#666; font-size:12px; font-family:Arial, Helvetica, sans-serif;">(City,State,Country)</span></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td><span class="text_heading">Wages Expectation</span></td>
				<!-- <td><input class="input" name="expectation" value="<?=$row['expectation']?>" type="text" id="expectation" size="30" ></td> -->
				 
				 <td><select id="expectation" name="expectation" class="input_select">
							  <option value="">-- Select Expectation --</option>
							  <option value="hour" <?if($row['expectation']=="hour"){?>selected<?}?>>Per Hour</option>
							  <option value="day" <?if($row['expectation']=="day"){?>selected<?}?>>Per Day</option>
							  <option value="month" <?if($row['expectation']=="month"){?>selected<?}?>>Per Month</option>
							  <option value="year" <?if($row['expectation']=="year"){?>selected<?}?>>Per Year</option>
							
				   </select></td>
                   <td><span class="text_heading">Wages Amount</span></td>
				<td><input class="input_area" name="amount" value="<?=$row['amount']?>" type="text" id="amount" size="30" ></td>
			</tr>
    		<tr>
				<td><span class="text_heading">Experience</span></td>
				<td><input class="input_area" name="experience" value="<?=$row['experience']?>" type="text" id="experience" size="30" ></td>
                <td><span class="text_heading">Extra Skill</span></td>
				<td><input class="input_area" name="extra_skill" value="<?=$row['extra_skill']?>" type="text" id="extra_skill" size="30" ></td>
			  </tr>
			  <tr>
				<td><span class="text_heading">Any Association</span></td>
				<td><select id="association" name="association" onchange="endis();" class="input_select">
							 
							  <option value="no" <?if($row['association']=="no"){?>selected<?}?>>No</option>
							  <option value="yes" <?if($row['association']=="yes"){?>selected<?}?>>Yes</option>
							  
					   </select></td>
                <td><span class="text_heading">Association Name</span></td>
				<td><input class="input_area" name="association_name" value="<?=$row['association_name']?>" <?if($row['association']=="no"){?>disabled<?}?> type="text" id="association_name" size="30" ></td>
			  </tr> 
			  <tr>
			    <td colspan="4">&nbsp;</td>
      </tr>
			  <tr>
			    <td colspan="4">
                <table width="96%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" style="color: #4FBFE3; font-size: 17px; border-bottom:1px solid #CCCCCC; font-family:Arial, Helvetica, sans-serif;">Contacts</td>
  </tr>
</table>

                </td>
      </tr>
			  <tr>
				<td><span class="text_heading">Phone No</span></td>
				<td><input class="input_area" name="phone_no" value="<?=$row['phone_no']?>" type="text" id="phone_no" size="30" <?if($row['association']=="no"){?>disabled<?}?> ></td>
			  	<td><span class="text_heading">Url</span></td>
				<td><input class="input_area" name="url" value="<?=$row['url']?>" type="text" id="url" size="30" <?if($row['association']=="no"){?>disabled<?}?>></td>
			  </tr>
			  <tr>
				<td><span class="text_heading">Have Agent</span></td>
				<td><select id="have_agent" name="have_agent" onchange="agent();" class="input_select">
							  <option value="no"<?if($row['have_agent']=="no"){?>selected<?}?>>No</option>
							  <option value="yes"<?if($row['have_agent']=="yes"){?>selected<?}?>>Yes</option>
							
				   </select></td>
			  	<td><span class="text_heading">Agent Name</span></td>
				<td><input class="input_area" name="agent_name" value="<?=$row['agent_name']?>" <?if($row['have_agent']=="no"){?>disabled<?}?> type="text" id="agent_name" size="30" ></td>
			  </tr>
			  <tr>
				<td><span class="text_heading">Agent Phone No</span></td>
				<td><input class="input_area" name="agent_phone_no" value="<?=$row['agent_phone_no']?>" <?if($row['have_agent']=="no"){?>disabled<?}?> type="text" id="agent_phone_no" size="30" ></td>
				<td><span class="text_heading">Agent Email</span></td>
				<td><input class="input_area" name="agent_email" value="<?=$row['agent_email']?>" <?if($row['have_agent']=="no"){?>disabled<?}?> type="text" id="agent_email" size="30" ></td>
			  </tr>
			  
		



			  <tr>
			  	<td>&nbsp;</td>
				<td>
				  <input type="submit" id="submit" value="Edit Talent" class="register_create_ac"   name="submit">
			   </td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
				</tr>
</table></td>
  </tr>
</table>

		
    </form>
