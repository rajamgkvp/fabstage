<?php
	include('../constants.php');

	//ADD ADMIN USER
	if(isset($_REQUEST['requirement']) && $_REQUEST['requirement'] != '') {
		
	$sql_admin = "INSERT INTO fs_oudition_details(oudition_id, requirement,category,sub_category, job_role, description, wages,wages_type,work_duration,gender,experience,language,extra_skill,
		any_association,association_name,physical_preference,height,weight,
		breast_chest,waist,hips,ethenicity,eye,hair,body,skin,shoes,dress,look,added_on)
		VALUES('".$_REQUEST['id']."', '".$_REQUEST['requirement']."', '".$_REQUEST['category']."', '".$_REQUEST['sub_category']."', '".$_REQUEST['job_role']."', '".$_REQUEST['description']."', '".$_REQUEST['wages']."','".$_REQUEST['wages_type']."',
		'".$_REQUEST['work_duration']."','".$_REQUEST['gender']."',
		'".$_REQUEST['experience']."','".$_REQUEST['language']."', '".$_REQUEST['extra_skill']."','".$_REQUEST['any_association']."',
		'".$_REQUEST['association_name']."','".$_REQUEST['physical_preference']."',
		'".$_REQUEST['height']."','".$_REQUEST['weight']."',
		'".$_REQUEST['bust_chest']."','".$_REQUEST['waist']."',
		'".$_REQUEST['hips']."','".$_REQUEST['ethenicity']."',
		'".$_REQUEST['eye']."','".$_REQUEST['hair']."','".$_REQUEST['body']."',
		'".$_REQUEST['skin']."','".$_REQUEST['shoes']."','".$_REQUEST['dress']."',
		'".$_REQUEST['look']."','".date('Y-m-d h:m:s')."')";

		$res_admin = q($sql_admin);
		if($res_admin) {
			$msg = '-  Added Successfully.';
		} else {
			$msg = '- Not Added Successfully.';
		}
	}
?>

<script>
		function validate() {

			var errText = "";
			var errorflag = false;

			if(document.upload_form.requirement.value == ""){
				 errText += "- Please Enter Requirement\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.requirement.focus();
				 return false;
			}

			if(document.upload_form.category.value == ""){
				 errText += "- Please Select Category\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.category.focus();
				 return false;
			}

			if(document.upload_form.job_role.value == ""){
				 errText += "- Please Enter Job Role\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.job_role.focus();
				 return false;
			}

			if(document.upload_form.description.value == ""){
				 errText += "- Please Enter description\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.description.focus();
				 return false;
			}

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

			if(document.upload_form.work_duration.value == ""){
					 errText += "- Please Enter Work Duration\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.work_duration.focus();
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

				/*if(document.upload_form.measurement.value == ""){
					 errText += "- Please Enter Measurement\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.measurement.focus();
					 return false;
				}*/
				if(document.upload_form.bust_chest.value == ""){
					 errText += "- Please Enter Breast/Chest\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.bust_chest.focus();
					 return false;
				}
				if(document.upload_form.waist.value == ""){
					 errText += "- Please Enter Waist\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.waist.focus();
					 return false;
				}
				if(document.upload_form.hips.value == ""){
					 errText += "- Please Enter Hips\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.hips.focus();
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

<script type="text/javascript" src="ajax.js"></script>

<script>
	var ajax = new Array();

	function getCityList(sel){
		var countryCode = document.getElementById('category').value;
		//var countryCode = sel.options[sel.selectedIndex].value;
		//alert(countryCode);
		document.getElementById('sub_category').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'getState.php?countryCode='+countryCode;	// Specifying which file to get
			//alert(ajax[index].requestFile);
			ajax[index].onCompletion = function(){ createCities(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function createCities(index){
		var obj = document.getElementById('sub_category');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}
</script>

<script>
	function disable(){
	
		if(document.getElementById('physical_preference').value=='no'){

			document.upload_form.height.disabled = true;
			document.upload_form.weight.disabled = true;
			document.upload_form.bust_chest.disabled = true;
			document.upload_form.waist.disabled = true;
			document.upload_form.hips.disabled = true;
			document.upload_form.ethenicity.disabled = true;
			document.upload_form.eye.disabled = true;
			document.upload_form.hair.disabled = true;
			document.upload_form.body.disabled = true;
			document.upload_form.skin.disabled = true;
			document.upload_form.shoes.disabled = true;
			document.upload_form.dress.disabled = true;
			document.upload_form.look.disabled = true;

		}else{
			
			document.upload_form.height.disabled = false;
			document.upload_form.weight.disabled = false;
			document.upload_form.bust_chest.disabled = false;
			document.upload_form.waist.disabled = false;
			document.upload_form.hips.disabled = false;
			document.upload_form.ethenicity.disabled = false;
			document.upload_form.eye.disabled = false;
			document.upload_form.hair.disabled = false;
			document.upload_form.body.disabled = false;
			document.upload_form.skin.disabled = false;
			document.upload_form.shoes.disabled = false;
			document.upload_form.dress.disabled = false;
			document.upload_form.look.disabled = false;

		}
	}

	function endis(){
		if(document.getElementById('any_association').value=='no'){
			document.upload_form.association_name.disabled = true;
		}else{
			document.upload_form.association_name.disabled = false;
		}
	}
</script>

<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />

<style type="text/css">
	.style1 {color: #FF0000}
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
				<td><span class="style1">*</span>&nbsp;<span>Requirement</span></td>
				<td><input class="input" name="requirement" type="text" id="requirement" size="48" ></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Category</span></td>
				<td>
					<select id="category" name="category" onchange="getCityList(this)">
						  <option value="">-- Select Category --</option>
						   <?
						   $sql = "SELECT * FROM fs_category order by category_name ASC";
						   $res = q($sql);
						   while($fatch = f($res)){
						   ?>
						  <option value="<?=$fatch['fld_id']?>"><?=$fatch['category_name']?></option>
						  <?}?>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Sub Category</span></td>
				<td>
					<select id="sub_category" name="sub_category">
						<option value="">-- Select Category --</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Job Role</span></td>
				<td><input class="input" name="job_role" value="" type="text" id="job_role" size="48" ></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td width="42%"><span class="style1">*</span>&nbsp;<span>Description</span> </td>
				<td width="58%">
					 <textarea id="description" name="description" rows="4" cols="35"></textarea>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Wages</span></td>
				<td><input class="input" name="wages" type="text" id="wages" size="48" ></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Wages Type</span></td>
				<td><input class="input" name="wages_type" type="text" id="wages_type" size="48" ></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td width="42%"><span class="style1">*</span>&nbsp;<span>Work Duration</span> </td>
				<td><input class="input" name="work_duration" type="text" id="work_duration" size="48" ></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1"></span>&nbsp;<span>Gender</span></td>
				<td>
					<select id="gender" name="gender">
							  <option value="male">Male</option>
							  <option value="female">Female</option>
							
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Experience</span></td>
				<td><input class="input" name="experience" value="" type="text" id="experience" size="48" ></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Language</span></td>
				<td><input class="input" name="language" value="" type="text" id="language" size="48" ></td>
			</tr>
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Extra Skill</span></td>
				<td><input class="input" name="extra_skill" value="" type="text" id="extra_skill" size="48" ></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Any Association</span></td>
				<td>
					<select id="any_association" name="any_association" onchange="endis();">
						<option value="no">No</option>
						<option value="yes">Yes</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Association Name</span></td>
				<td><input class="input" disabled  name="association_name" value="" type="text" id="association_name" size="48" ></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1"></span>&nbsp;<span>Physical Preference</span></td>
				<td>
					<select id="physical_preference" name="physical_preference" onchange="disable();">
						<option value="no">No</option>
						<option value="yes">Yes</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Height</span></td>
				<td>
					<select id="height" name="height" style="width:190px;" disabled>
						<option value="">-- Select Height --</option>
						<?	$height = "select * from fs_height order by fld_id ASC";
							$height_run = q($height);
							while($height_fatch = f($height_run)){
						?>
						<option value="<?=$height_fatch['type']?>"><?=$height_fatch['type']?></option>
					<?}?>
					</select>
				<!-- <input class="input" name="height" value="" type="text" id="height" size="48" disabled></td> -->
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Weight</span></td>
				<td>
				<select id="weight" name="weight" style="width:190px;" disabled>
					<option value="">-- Select Weight --</option>
					<? $weight = "select * from fs_weight order by fld_id ASC";
						$weight_run = q($weight);
						while($weight_fatch = f($weight_run)){
					?> 
					<option value="<?=$weight_fatch['type']?>"><?=$weight_fatch['type']?></option>
					<?}?>
				</select>
					<!-- <input class="input" name="weight" value="" type="text" id="weight" size="48" disabled> -->
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			
			<tr>
				<td><span class="style1"></span>&nbsp;<span>Measurement</span></td>
				<td>
					BREAST/CHEST &nbsp;&nbsp;&nbsp;&nbsp;WAIST &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HIPS
				</td>
			</tr>
			<tr>
				<td><span class="style1"></span>&nbsp;</td>
				<td>
					<select id="bust_chest" name="bust_chest" style="width:85px;" disabled>
						<option value="">- Select -</option>
							<? $bust_chest = "select * from fs_bust_chest order by fld_id ASC";
								$bust_chest_run = q($bust_chest);
								while($bust_chest_fatch = f($bust_chest_run)){
							?>
						<option value="<?=$bust_chest_fatch['type']?>"><?=$bust_chest_fatch['type']?></option>
						<?}?>
					</select>
					<select id="waist" name="waist" style="width:85px;" disabled>
						<option value="">- Select -</option>
						<? $waist = "select * from fs_waist order by fld_id ASC";
							$waist_run = q($waist);
							while($waist_fatch = f($waist_run)){
						?>
						<option value="<?=$waist_fatch['type']?>"><?=$waist_fatch['type']?></option>
						<?}?>
					</select>
					<select id="hips" name="hips" style="width:85px;" disabled>
						<option value="">- Select -</option>
							<? $hips = "select * from fs_hips order by fld_id ASC";
								 $hips_run = q($hips);
								 while($hips_fatch = f($hips_run)){
							?> 
						<option value="<?=$hips_fatch['type']?>"><?=$hips_fatch['type']?></option>
						<?}?>
					</select>
				</td>
			</tr>
			<!-- <tr>
				<td><span class="style1">*</span>&nbsp;<span>Measurement</span></td>
				<td>
					
					<input class="input" name="measurement" value="" type="text" id="measurement" size="48" disabled>
				</td>
			</tr> -->
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Ethenicity</span></td>
				<td>
					<select id="ethenicity" name="ethenicity" style="width:190px;" disabled>
						<option value="">-- Select Ethenicity --</option>
						<? $ethenicity = "select * from fs_ethenicity order by fld_id ASC";
							$ethenicity_run = q($ethenicity);
							while($ethenicity_fatch = f($ethenicity_run)){
						?>
						<option value="<?=$ethenicity_fatch['type']?>"><?=$ethenicity_fatch['type']?></option>
							<?}?>
					</select>
				<!-- <input class="input" name="ethenicity" value="" type="text" id="ethenicity" size="48" disabled> -->
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Eyes Color</span></td>
				<td>
					<select id="eye" name="eye" style="width:190px;" disabled>
						<option value="">-- Select Eyes Color --</option>
						<? $eye = "select * from fs_eyes_color order by fld_id ASC";
							 $eye_run = q($eye);
							 while($eye_fatch = f($eye_run)){
						?> 
						<option value="<?=$eye_fatch['type']?>"><?=$eye_fatch['type']?></option>
							<?}?>
					</select>
					<!-- <input class="input" name="eye" value="" type="text" id="eye" size="48" disabled> -->
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Hair Color</span></td>
				<td>
					<select id="hair" name="hair" style="width:190px;" disabled>
						<option value="">-- Select Hair Color --</option>
						<? $hair = "select * from fs_hair_color order by fld_id ASC";
							 $hair_run = q($hair);
							 while($hair_fatch = f($hair_run)){
						?>
						<option value="<?=$hair_fatch['type']?>"><?=$hair_fatch['type']?></option>
						<?}?>
					</select>
				<!-- <input class="input" name="hair" value="" type="text" id="hair" size="48" disabled> -->
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Body Type</span></td>
				<td>
					<select id="body" name="body" style="width:190px;" disabled>
						<option value="">-- Select Body Type --</option>
						<? $body = "select * from fs_body_type order by fld_id ASC";
							 $body_run = q($body);
							 while($body_fatch = f($body_run)){
						?>
						<option value="<?=$body_fatch['type']?>"><?=$body_fatch['type']?></option>
						<?}?>
					</select>
					<!-- <input class="input" name="body" value="" type="text" id="body" size="48" disabled> -->
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Skin Color</span></td>
				<td>
					<select id="skin" name="skin" style="width:190px;" disabled>
						<option value="">-- Select Skin Color --</option>
						<? $skin = "select * from fs_skin_color order by fld_id ASC";
							 $skin_run = q($skin);
							 while($skin_fatch = f($skin_run)){
						?>
						<option value="<?=$skin_fatch['type']?>"><?=$skin_fatch['type']?></option>
						<?}?>
					</select>
					<!-- <input class="input" name="skin" value="" type="text" id="skin" size="48" disabled> -->
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Shoes Size</span></td>
				<td>
					<select id="shoes" name="shoes" style="width:190px;" disabled>
						<option value="">-- Select Shoes Size --</option>
						<? $shoes = "select * from fs_shoe_size order by fld_id ASC";
							 $shoes_run = q($shoes);
							 while($shoes_fatch = f($shoes_run)){
						?>
						<option value="<?=$shoes_fatch['type']?>"><?=$shoes_fatch['type']?></option>
						<?}?>
					</select>
					<!-- <input class="input" name="shoes" value="" type="text" id="shoes" size="48" disabled> -->
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Dress Size</span></td>
				<td>
					<select id="dress" name="dress" style="width:190px;" disabled>
						<option value="">-- Select Dress Size --</option>
						<? $dress = "select * from fs_dress_size order by fld_id ASC";
							$dress_run = q($dress);
							while($dress_fatch = f($dress_run)){
						?>
						<option value="<?=$dress_fatch['type']?>"><?=$dress_fatch['type']?></option>
						<?}?>
					</select>
				<!-- <input class="input" name="dress" value="" type="text" id="dress" size="48" disabled> -->
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1">*</span>&nbsp;<span>Look Like</span></td>
				<td>
					<input class="input" name="look" value="" type="text" id="look" size="48" disabled>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="submit" id="submit" value = "Add Oudition Details" name="Submit">
				</td>
			</tr>
			<tr>
				<td height="40px">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</form>
</body>