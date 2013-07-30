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
					
			

					height = '".$_REQUEST['height']."', 
					weight = '".$_REQUEST['weight']."',
					bust_chest = '".$_REQUEST['bust_chest']."',
					waist = '".$_REQUEST['waist']."',
					hips = '".$_REQUEST['hips']."',
					ethenicity = '".$_REQUEST['ethenicity']."',
					eye = '".$_REQUEST['eye']."', 
					hair = '".$_REQUEST['hair']."', 
					body = '".$_REQUEST['body']."', 
					skin = '".$_REQUEST['skin']."',
					shoes = '".$_REQUEST['shoes']."', 
					dress = '".$_REQUEST['dress']."',
					look = '".$_REQUEST['look']."',
					about = '".$_REQUEST['about']."',

					location = '".$_REQUEST['location']."', 
					gender = '".$_REQUEST['gender']."',
					marital = '".$_REQUEST['marital']."', 
					dob = '".$_REQUEST['dob']."',
					nationality = '".$_REQUEST['nationality']."', 
					language = '".$_REQUEST['language']."'


					WHERE member_id = '".$id."'";
					$res = q($sql);
				}else{

					$sql = "INSERT INTO fs_talent(member_id,height,weight,bust_chest,waist,hips,ethenicity,eye, hair,body,skin,shoes,dress,look,about,location,
					gender,marital,dob,nationality,language,added_on)

					VALUES('".$id."','".$_REQUEST['height']."',
					'".$_REQUEST['weight']."','".$_REQUEST['bust_chest']."',
					'".$_REQUEST['waist']."','".$_REQUEST['hips']."',
					'".$_REQUEST['ethenicity']."','".$_REQUEST['eye']."',
					'".$_REQUEST['hair']."','".$_REQUEST['body']."','".$_REQUEST['skin']."',
					'".$_REQUEST['shoes']."','".$_REQUEST['dress']."','".$_REQUEST['look']."','".$_REQUEST['about']."','".$_REQUEST['location']."',
					'".$_REQUEST['gender']."','".$_REQUEST['marital']."',
					'".$_REQUEST['dob']."','".$_REQUEST['nationality']."',
					'".$_REQUEST['language']."','".date('Y-m-d h:m:s')."')";
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
				<td width="15%" valign="top"><span class="text_heading">About Yourself</span></td>
				<td valign="top" colspan="3"><textarea name="about" id="about" class="input_area" style="height:90px; width:575px;"><?=$row['about']?></textarea></td>
			  </tr>
			
			 
			 
			 <tr>
                <td valign="top"><span class="text_heading">Location</span></td>
				<td width="35%" valign="top"><input class="input_area" name="location" value="<?=$row['location']?>" type="text" id="location" size="30" ></td>
                <td width="15%"><span class="text_heading">Gender</span></td>
				<td width="35%"><select id="gender" name="gender" class="input_select">
							  <option value="male"<?if($row['gender']=="male"){?>selected<?}?>>Male</option>
							  <option value="female"<?if($row['gender']=="female"){?>selected<?}?>>Female</option>
							
				   </select></td>
			  </tr>
		
			  <tr>
				
                   <td><span class="text_heading">Marital Status</span></td>
				<td><select id="marital" name="marital" class="input_select">
							  <option value="married"<?if($row['marital']=="married"){?>selected<?}?>>Married</option>
							  <option value="unmarried"<?if($row['marital']=="unmarried"){?>selected<?}?>>Unmarried</option>
							
				   </select></td>
                   <td><span class="text_heading">DOB</span></td>
				<td><input class="input_aera" name="dob" value="<?=$row['dob']?>" type="text" id="dob" size="30" readonly>
				<img src="admin/admin_img/img.gif" id="button1" onMouseOver="this.style.cursor='pointer'" onMouseOut="this.style.cursor='default'" style="cursor: pointer; " border="0"/>
				</td>
			  </tr>
			  <tr>
				
                <td><span class="text_heading">Nationality</span></td>
				<td><input class="input_aera" name="nationality" value="<?=$row['nationality']?>" type="text" id="nationality" size="30" ></td>
                
                <td><span class="text_heading">Language Know</span></td>
				<td><input class="input_area" name="language" value="<?=$row['language']?>" type="text" id="language" size="30" ></td>
			  </tr>






			
           
		      <tr>
				<td><span class="text_heading">Height</span></td>
			  
			    <td><select id="height" name="height" class="input_select">
						     <option value="">-- Select Height --</option>
						     <? $height = "select * from fs_height order by fld_id ASC";
								 $height_run = q($height);
								 while($height_fatch = f($height_run)){
							  ?> 
						     <option value="<?=$height_fatch['type']?>" <?if($row['height']==$height_fatch['type']){?>selected<?}?> ><?=$height_fatch['type']?></option>
						     <?}?>
		         </select></td>
                 <td><span class="text_heading">Weight</span></td>
			   
				<td><select id="weight" name="weight" class="input_select">
							  <option value="">-- Select Weight --</option>
							  <? $weight = "select * from fs_weight order by fld_id ASC";
								 $weight_run = q($weight);
								 while($weight_fatch = f($weight_run)){
							  ?> 
							  <option value="<?=$weight_fatch['type']?>" <?if($row['weight']==$weight_fatch['type']){?>selected<?}?>><?=$weight_fatch['type']?></option>
							  <?}?>
			     </select></td>


			  </tr>
			
			  
			 
			  <tr>
				<td><span class="text_heading">Ethenicity</span></td>
			  
				<td><select id="ethenicity" name="ethenicity" class="input_select">
							  <option value="">-- Select Ethenicity --</option>
							  <? $ethenicity = "select * from fs_ethenicity order by fld_id ASC";
								 $ethenicity_run = q($ethenicity);
								 while($ethenicity_fatch = f($ethenicity_run)){
							  ?> 
							  <option value="<?=$ethenicity_fatch['type']?>" <?if($row['ethenicity']==$ethenicity_fatch['type']){?>selected<?}?>><?=$ethenicity_fatch['type']?></option>
							  <?}?>
				   </select></td>
                   <td><span class="text_heading">Eyes Color</span></td>
				<td><select id="eye" name="eye" class="input_select">
							  <option value="">-- Select Eyes Color --</option>
							  <? $eye = "select * from fs_eyes_color order by fld_id ASC";
								 $eye_run = q($eye);
								 while($eye_fatch = f($eye_run)){
							  ?> 
							  <option value="<?=$eye_fatch['type']?>" <?if($row['eye']==$eye_fatch['type']){?>selected<?}?>><?=$eye_fatch['type']?></option>
							  <?}?>
				   </select></td>
			  </tr>
			 
           
			 
			 
			 
			 
			 
			 
			 <tr>
             	
             
             
			 
			  
			  
			  <tr>
			    <td><span class="text_heading">BUST/CHEST</span></td>
			    <td><select id="bust_chest" name="bust_chest" class="input_select">

							
							  <option value="">- Select -</option>
							  <? $bust_chest = "select * from fs_bust_chest order by fld_id ASC";
								 $bust_chest_run = q($bust_chest);
								 while($bust_chest_fatch = f($bust_chest_run)){
							  ?> 
							  <option value="<?=$bust_chest_fatch['type']?>" <?if($row['bust_chest']==$bust_chest_fatch['type']){?>selected<?}?>><?=$bust_chest_fatch['type']?></option>
							  <?}?>
				   </select></td>
			    <td><span class="text_heading">WAIST</span></td>
			    <td><select id="waist" name="waist" class="input_select">
							  <option value="">- Select -</option>
							  <? $waist = "select * from fs_waist order by fld_id ASC";
								 $waist_run = q($waist);
								 while($waist_fatch = f($waist_run)){
							  ?> 
							  <option value="<?=$waist_fatch['type']?>" <?if($row['waist']==$waist_fatch['type']){?>selected<?}?>><?=$waist_fatch['type']?></option>
							  <?}?>
				   </select></td>
      </tr>
			  <tr>
			    <td><span class="text_heading">HIPS</span></td>
			    <td><select id="hips" name="hips" class="input_select">
							  <option value="">- Select -</option>
							  <? $hips = "select * from fs_hips order by fld_id ASC";
								 $hips_run = q($hips);
								 while($hips_fatch = f($hips_run)){
							  ?> 
							  <option value="<?=$hips_fatch['type']?>" <?if($row['hips']==$hips_fatch['type']){?>selected<?}?>><?=$hips_fatch['type']?></option>
							  <?}?>
				   </select></td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
      </tr>
			  <tr>
				<td><span class="text_heading">Hair Color</span></td>
			   <td><select id="hair" name="hair" class="input_select">
							  <option value="">-- Select Hair Color --</option>
							  <? $hair = "select * from fs_hair_color order by fld_id ASC";
								 $hair_run = q($hair);
								 while($hair_fatch = f($hair_run)){
							  ?> 
							  <option value="<?=$hair_fatch['type']?>" <?if($row['hair']==$hair_fatch['type']){?>selected<?}?>><?=$hair_fatch['type']?></option>
							  <?}?>
				   </select></td>
                   <td><span class="text_heading">Body Type</span></td>
				 <td><select id="body" name="body" class="input_select">
							  <option value="">-- Select Body Type --</option>
							  <? $body = "select * from fs_body_type order by fld_id ASC";
								 $body_run = q($body);
								 while($body_fatch = f($body_run)){
							  ?> 
							  <option value="<?=$body_fatch['type']?>" <?if($row['body']==$body_fatch['type']){?>selected<?}?>><?=$body_fatch['type']?></option>
							  <?}?>
				   </select></td>
			  </tr>
			 
			  
			  
			  <tr>
				<td><span class="text_heading">Skin Color</span></td>
				<td><select id="skin" name="skin" class="input_select">
							  <option value="">-- Select Skin Color --</option>
							  <? $skin = "select * from fs_skin_color order by fld_id ASC";
								 $skin_run = q($skin);
								 while($skin_fatch = f($skin_run)){
							  ?> 
							  <option value="<?=$skin_fatch['type']?>" <?if($row['skin']==$skin_fatch['type']){?>selected<?}?>><?=$skin_fatch['type']?></option>
							  <?}?>
				   </select></td>
                   <td><span class="text_heading">Shoes Size</span></td>
				<td><select id="shoes" name="shoes" class="input_select">
							  <option value="">-- Select Shoes Size --</option>
							  <? $shoes = "select * from fs_shoe_size order by fld_id ASC";
								 $shoes_run = q($shoes);
								 while($shoes_fatch = f($shoes_run)){
							  ?> 
							  <option value="<?=$shoes_fatch['type']?>" <?if($row['shoes']==$shoes_fatch['type']){?>selected<?}?> ><?=$shoes_fatch['type']?></option>
							  <?}?>
				   </select></td>
			  </tr>
			 
			  
			  
			  <tr>
				<td><span class="text_heading">Dress Size</span></td>
				<td><select id="dress" name="dress" class="input_select">
							  <option value="">-- Select Dress Size --</option>
							  <? $dress = "select * from fs_dress_size order by fld_id ASC";
								 $dress_run = q($dress);
								 while($dress_fatch = f($dress_run)){
							  ?> 
							  <option value="<?=$dress_fatch['type']?>" <?if($row['dress']==$dress_fatch['type']){?>selected<?}?>><?=$dress_fatch['type']?></option>
							  <?}?>
				   </select></td>
                   <td><span class="text_heading">Look Like</span></td>
				<td><input class="input_area" name="look" value="<?=$row['look']?>" type="text" id="look"  ></td>
			  </tr>


			  <tr>
			  	<td>&nbsp;</td>
				<td>
				  <input type="submit" id="submit" value="Edit Talent" class="register_create_ac"  name="submit">
			   </td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
				</tr>
</table></td>
  </tr>
</table>

		
    </form>
<script type="text/javascript">

	Calendar.setup({
		inputField     :    "dob",   // id of the input field
		ifFormat       :    "%d-%m-%Y",  // format of the input field
		button         :    "button1",
		singleClick    :    true,
		align          :    ""
	});
	</script>