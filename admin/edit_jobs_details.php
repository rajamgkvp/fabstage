<?php
	include('../constants.php');
	$id = $_REQUEST['id'];
	if(isset($_REQUEST['wages']) && $_REQUEST['wages'] != ''){

		//UPDATE THE USER TABLE
		$sql = "UPDATE fs_job_details SET 
		job_type = '".$_REQUEST['job_type']."',
		wages = '".$_REQUEST['wages']."',
		wages_type = '".$_REQUEST['wages_type']."',
		work_duration = '".$_REQUEST['work_duration']."', 
		work_duration_type = '".$_REQUEST['work_duration_type']."', 
		work_location = '".$_REQUEST['work_location']."',
		gender = '".$_REQUEST['gender']."', 
		experience = '".$_REQUEST['experience']."',
		language = '".$_REQUEST['language']."', 
		extra_skill = '".$_REQUEST['extra_skill']."',
		any_association = '".$_REQUEST['any_association']."',
		association_name = '".$_REQUEST['association_name']."',
		physical_preference = '".$_REQUEST['physical_preference']."', 
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
		updated_on = '".date('Y-m-d h:m:s')."'
		WHERE fld_id = '".$id."'";
		
		$res = q($sql);
		if($res){
			$msg = '-  Updated Successfully.';

		}else{
			$msg = '-  Not Updated.';
		}
	
}
?>
<?

//POPULATE 
$sql_pop = "SELECT * FROM fs_job_details WHERE fld_id = ".$id."";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>
<script>
function validate(){

	var errText = "";
	var errorflag = false;
	
	if(document.upload_form.wages.value == ""){
		 errText += "- Please Enter wages\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.wages.focus();
		 return false;
	}
	if(document.upload_form.wages_type.value == ""){
		 errText += "- Please Enter Wages type\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.wages_type.focus();
		 return false;
	}

	if(document.upload_form.job_type.value == "contractual"){
		if(document.upload_form.work_duration.value == ""){
			 errText += "- Please Enter Work Duration\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.work_duration.focus();
			 return false;
		}
		if(document.upload_form.work_duration_type.value == ""){
			 errText += "- Please Enter Work Duration Type\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.work_duration_type.focus();
			 return false;
		}

	}

	if(document.upload_form.work_location.value == ""){
		 errText += "- Please Enter Work Location\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.work_location.focus();
		 return false;
	}
	if(document.upload_form.experience.value == ""){
		 errText += "- Please Enter Experience\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.experience.focus();
		 return false;
	}
	if(document.upload_form.language.value == ""){
		 errText += "- Please Enter Language\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.language.focus();
		 return false;
	}

	if(document.upload_form.extra_skill.value == ""){
		 errText += "- Please Enter Extra Skill\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.extra_skill.focus();
		 return false;
	}

	if(document.upload_form.any_association.value == "yes"){
				 if(document.upload_form.association_name.value == ""){
				 errText += "- Please Enter Association Name\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.association_name.focus();
				 return false;
			 }
	}

	if(document.upload_form.physical_preference.value == "yes"){
		
			  	 if(document.upload_form.height.value == ""){
				 errText += "- Please Enter Height\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.height.focus();
				 return false;
			     }

				 	 if(document.upload_form.weight.value == ""){
				 errText += "- Please Enter Weight\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.weight.focus();
				 return false;
			 }

			 	 if(document.upload_form.measurement.value == ""){
				 errText += "- Please Enter Measurement\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.measurement.focus();
				 return false;
			 }

			 	 if(document.upload_form.ethenicity.value == ""){
				 errText += "- Please Enter Ethenicity\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.ethenicity.focus();
				 return false;
			 }

			 	 if(document.upload_form.eye.value == ""){
				 errText += "- Please Enter Eye Color\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.eye.focus();
				 return false;
			 }

			 	 if(document.upload_form.hair.value == ""){
				 errText += "- Please Enter Hair Color\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.hair.focus();
				 return false;
			 }

			 	 if(document.upload_form.body.value == ""){
				 errText += "- Please Enter Body Type\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.body.focus();
				 return false;
			 }

			 	 if(document.upload_form.skin.value == ""){
				 errText += "- Please Enter Skin Color\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.skin.focus();
				 return false;
			 }

			 	 if(document.upload_form.shoes.value == ""){
				 errText += "- Please Enter Shoes Size\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.shoes.focus();
				 return false;
			 }

			 	 if(document.upload_form.dress.value == ""){
				 errText += "- Please Enter Dress Size\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.dress.focus();
				 return false;
			 }

			 	 if(document.upload_form.look.value == ""){
				 errText += "- Please Enter Look Like\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.look.focus();
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

function job(){
			if(document.getElementById('job_type').value=='regular'){
					document.upload_form.work_duration.disabled = true;
					document.getElementById('work_duration').value='';
					document.upload_form.work_duration_type.disabled = true;
					document.getElementById('work_duration_type').value='';
			}else{
				document.upload_form.work_duration.disabled = false;
				document.getElementById('work_duration').value='<?=$row['work_duration']?>';
				document.upload_form.work_duration_type.disabled = false;
				document.getElementById('work_duration_type').value='<?=$row['work_duration_type']?>';
			}
     }

  function endis(){
				

	if(document.getElementById('any_association').value=='no'){
		document.upload_form.association_name.disabled = true;
		document.getElementById('association_name').value='';
	}else{

		document.upload_form.association_name.disabled = false;
		document.getElementById('association_name').value='<?=$row['association_name']?>';
	}
}


function disable(){
	
	if(document.getElementById('physical_preference').value=='no'){
	
		document.upload_form.height.disabled = true;
		document.getElementById('height').value='';
		document.upload_form.weight.disabled = true;
		document.getElementById('weight').value='';
		document.upload_form.bust_chest.disabled = true;
		document.getElementById('bust_chest').value='';
		document.upload_form.waist.disabled = true;
		document.getElementById('waist').value='';
		document.upload_form.hips.disabled = true;
		document.getElementById('hips').value='';
		document.upload_form.ethenicity.disabled = true;
		document.getElementById('ethenicity').value='';
		document.upload_form.eye.disabled = true;
		document.getElementById('eye').value='';
		document.upload_form.hair.disabled = true;
		document.getElementById('hair').value='';
		document.upload_form.body.disabled = true;
		document.getElementById('body').value='';
		document.upload_form.skin.disabled = true;
		document.getElementById('skin').value='';
		document.upload_form.shoes.disabled = true;
		document.getElementById('shoes').value='';
		document.upload_form.dress.disabled = true;
		document.getElementById('dress').value='';
		document.upload_form.look.disabled = true;
		document.getElementById('look').value='';

	}else{

		document.upload_form.height.disabled = false;
		document.getElementById('height').value='<?=$row['height']?>';
		document.upload_form.weight.disabled = false;
		document.getElementById('weight').value='<?=$row['weight']?>';
		document.upload_form.bust_chest.disabled = false;
		document.getElementById('bust_chest').value='<?=$row['bust_chest']?>';
		document.upload_form.waist.disabled = false;
		document.getElementById('waist').value='<?=$row['waist']?>';
		document.upload_form.hips.disabled = false;
		document.getElementById('hips').value='<?=$row['hips']?>';
		document.upload_form.ethenicity.disabled = false;
		document.getElementById('ethenicity').value='<?=$row['ethenicity']?>';
		document.upload_form.eye.disabled = false;
		document.getElementById('eye').value='<?=$row['eye']?>';
		document.upload_form.hair.disabled = false;
		document.getElementById('hair').value='<?=$row['hair']?>';
		document.upload_form.body.disabled = false;
		document.getElementById('body').value='<?=$row['body']?>';
		document.upload_form.skin.disabled = false;
		document.getElementById('skin').value='<?=$row['skin']?>';
		document.upload_form.shoes.disabled = false;
		document.getElementById('shoes').value='<?=$row['shoes']?>';
		document.upload_form.dress.disabled = false;
		document.getElementById('dress').value='<?=$row['dress']?>';
		document.upload_form.look.disabled = false;
		document.getElementById('look').value='<?=$row['look']?>';
	}
}



</script>

<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>


<body onLoad="endis();disable();">
<form name="upload_form" id="upload_form" action="" method="POST" onsubmit="return validate();" autocomplete="off">
<table width="90%"  border="0" align="center" cellspacing="1" cellpadding="1">
 
<tr>
    <td colspan="2" align="center" class="msg"><?=$msg?></td>
  </tr>
   
  
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="70%">&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Job Type</span></td>
		<td>
				<select id="job_type" name="job_type" onchange="job();">
							  <option value="regular" <?if($row['job_type']=="regular"){?>selected<?}?>>Regular</option>
							  <option value="contractual" <?if($row['job_type']=="contractual"){?>selected<?}?>>Contractual</option>
							
				   </select>
		   </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><span class="style1">*</span>&nbsp;<span>Wages</span></td>
     <td><input class="input" name="wages" value="<?=$row['wages']?>" type="text" id="wages" size="48" ></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td><span class="style1">*</span>&nbsp;<span>Wages Type</span></td>
   <td><input class="input" name="wages_type" value="<?=$row['wages_type']?>" type="text" id="wages_type" size="48" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42%"><span class="style1">*</span>&nbsp;<span>Work Duration</span> </td>
    <td><input class="input" value="<?=$row['work_duration']?> "<?if($row['job_type']=="regular"){?>disabled<?}?> name="work_duration" type="text" id="work_duration" size="48" ></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Work Duration Type</span></td>
    <td><input class="input" name="work_duration_type" value="<?=$row['work_duration_type']?>" <?if($row['job_type']=="regular"){?>disabled<?}?> type="text" id="work_duration_type" size="48" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Work Location</span></td>
    <td><input class="input" name="work_location" value="<?=$row['work_location']?>" type="text" id="work_location" size="48" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td><span class="style1"></span>&nbsp;<span>Gender</span></td>
    <td><select id="gender" name="gender">
				  <option value="male" <?if($row['gender']=="male"){?>selected<?}?>>Male</option>
				  <option value="female" <?if($row['gender']=="female"){?>selected<?}?>>Female</option>
				
       </select>
	 </td>
  </tr>
 
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Experience</span></td>
    <td><input class="input" name="experience" value="<?=$row['experience']?>" type="text" id="experience" size="48" ></td>
  </tr>
  
     <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Language</span></td>
    <td><input class="input" name="language" value="<?=$row['language']?>" type="text" id="language" size="48" ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Extra Skill</span></td>
    <td><input class="input" name="extra_skill" value="<?=$row['extra_skill']?>" type="text" id="extra_skill" size="48" ></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Any Association</span></td>
    <td><select id="any_association" name="any_association" onchange="endis();">
		         
				  <option value="no" <?if($row['any_association']=="no"){?>selected<?}?>>No</option>
				  <option value="yes" <?if($row['any_association']=="yes"){?>selected<?}?>>Yes</option>
				  
           </select></td>
  </tr> 
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

   <tr>
    <td><span class="style1">*</span>&nbsp;<span>Association Name</span></td>
    <td><input class="input"   name="association_name" value="<?=$row['association_name']?>" <?if($row['any_association']=="no"){?>disabled<?}?> type="text" id="association_name" size="48" ></td>
  </tr> 
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Physical Preference</span></td>
    <td>
		   <select id="physical_preference" name="physical_preference" onchange="disable();">
		         
				  <option value="no"  <?if($row['physical_preference']=="no"){?>selected<?}?>>No</option>
				  <option value="yes" <?if($row['physical_preference']=="yes"){?>selected<?}?>>Yes</option>
				  
           </select>
	
	
	
	</td>
  </tr>
  
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>


	<tr>
    <td><span class="style1"></span>&nbsp;<span>Height</span></td>
  
	 <td><select id="height" name="height" style="width:190px;">
				  <option value="">-- Select Height --</option>
				  <? $height = "select * from fs_height order by fld_id ASC";
				  	 $height_run = q($height);
					 while($height_fatch = f($height_run)){
				  ?> 
				  <option value="<?=$height_fatch['type']?>" <?if($row['height']==$height_fatch['type']){?>selected<?}?> ><?=$height_fatch['type']?></option>
				  <?}?>
       </select></td>


  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Weight</span></td>
   
	<td><select id="weight" name="weight" style="width:190px;">
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Measurement</span></td>
    <!-- <td><input class="input" name="measurement" value="" type="text" id="measurement" size="30" ></td> -->
	<td>BUST/CHEST &nbsp;&nbsp;&nbsp;&nbsp;WAIST &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HIPS</td>
  </tr>
   <tr>
    <td><span class="style1"></span>&nbsp;</td>
    <td><select id="bust_chest" name="bust_chest" style="width:85px;">

	            
				  <option value="">- Select -</option>
				  <? $bust_chest = "select * from fs_bust_chest order by fld_id ASC";
				  	 $bust_chest_run = q($bust_chest);
					 while($bust_chest_fatch = f($bust_chest_run)){
				  ?> 
				  <option value="<?=$bust_chest_fatch['type']?>" <?if($row['bust_chest']==$bust_chest_fatch['type']){?>selected<?}?>><?=$bust_chest_fatch['type']?></option>
				  <?}?>
       </select>
	   <select id="waist" name="waist" style="width:85px;">
				  <option value="">- Select -</option>
				  <? $waist = "select * from fs_waist order by fld_id ASC";
				  	 $waist_run = q($waist);
					 while($waist_fatch = f($waist_run)){
				  ?> 
				  <option value="<?=$waist_fatch['type']?>" <?if($row['waist']==$waist_fatch['type']){?>selected<?}?>><?=$waist_fatch['type']?></option>
				  <?}?>
       </select> 

	   <select id="hips" name="hips" style="width:85px;">
				  <option value="">- Select -</option>
				  <? $hips = "select * from fs_hips order by fld_id ASC";
				  	 $hips_run = q($hips);
					 while($hips_fatch = f($hips_run)){
				  ?> 
				  <option value="<?=$hips_fatch['type']?>" <?if($row['hips']==$hips_fatch['type']){?>selected<?}?>><?=$hips_fatch['type']?></option>
				  <?}?>
       </select>
	   
	   
	   
	   
	   
	   </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Ethenicity</span></td>
  
	<td><select id="ethenicity" name="ethenicity" style="width:190px;">
				  <option value="">-- Select Ethenicity --</option>
				  <? $ethenicity = "select * from fs_ethenicity order by fld_id ASC";
				  	 $ethenicity_run = q($ethenicity);
					 while($ethenicity_fatch = f($ethenicity_run)){
				  ?> 
				  <option value="<?=$ethenicity_fatch['type']?>" <?if($row['ethenicity']==$ethenicity_fatch['type']){?>selected<?}?>><?=$ethenicity_fatch['type']?></option>
				  <?}?>
       </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Eyes Color</span></td>
    <td><select id="eye" name="eye" style="width:190px;">
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Hair Color</span></td>
   <td><select id="hair" name="hair" style="width:190px;">
				  <option value="">-- Select Hair Color --</option>
				  <? $hair = "select * from fs_hair_color order by fld_id ASC";
				  	 $hair_run = q($hair);
					 while($hair_fatch = f($hair_run)){
				  ?> 
				  <option value="<?=$hair_fatch['type']?>" <?if($row['hair']==$hair_fatch['type']){?>selected<?}?>><?=$hair_fatch['type']?></option>
				  <?}?>
       </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Body Type</span></td>
     <td><select id="body" name="body" style="width:190px;">
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Skin Color</span></td>
    <td><select id="skin" name="skin" style="width:190px;">
				  <option value="">-- Select Skin Color --</option>
				  <? $skin = "select * from fs_skin_color order by fld_id ASC";
				  	 $skin_run = q($skin);
					 while($skin_fatch = f($skin_run)){
				  ?> 
				  <option value="<?=$skin_fatch['type']?>" <?if($row['skin']==$skin_fatch['type']){?>selected<?}?>><?=$skin_fatch['type']?></option>
				  <?}?>
       </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Shoes Size</span></td>
    <td><select id="shoes" name="shoes" style="width:190px;">
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Dress Size</span></td>
    <td><select id="dress" name="dress" style="width:190px;">
				  <option value="">-- Select Dress Size --</option>
				  <? $dress = "select * from fs_dress_size order by fld_id ASC";
				  	 $dress_run = q($dress);
					 while($dress_fatch = f($dress_run)){
				  ?> 
				  <option value="<?=$dress_fatch['type']?>" <?if($row['dress']==$dress_fatch['type']){?>selected<?}?>><?=$dress_fatch['type']?></option>
				  <?}?>
       </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Look Like</span></td>
    <td><input class="input" name="look" value="<?=$row['look']?>" <?if($row['physical_preference']=="no"){?>disabled<?}?> type="text" id="look" size="48" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>


  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="submit" id="submit" value = "Edit Job Details" name="Submit">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>