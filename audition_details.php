<?php
	include('constants.php');
	session_start();
	//ADD ADMIN USER
	if(isset($_REQUEST['requirement']) && $_REQUEST['requirement'] != '') {
		 $sql_admin = "INSERT INTO fs_oudition_details(oudition_id, requirement,job_role, description, wages,wages_type,work_duration,gender,experience,language,extra_skill,any_association, association_name,physical_preference,height,weight,breast_chest,waist,hips,ethenicity,eye,hair,body,skin, shoes,dress,look,added_on)VALUES 
		('".$_SESSION['audition_id']."', '".$_REQUEST['requirement']."', '".$_REQUEST['job_role']."', '".$_REQUEST['description']."', '".$_REQUEST['wages']."','".$_REQUEST['wages_type']."','".$_REQUEST['work_duration']."', '".$_REQUEST['gender']."','".$_REQUEST['experience']."','".$_REQUEST['language']."', '".$_REQUEST['extra_skill']."','".$_REQUEST['any_association']."','".$_REQUEST['association_name']."', '".$_REQUEST['physical_preference']."','".$_REQUEST['height']."','".$_REQUEST['weight']."', '".$_REQUEST['bust_chest']."','".$_REQUEST['waist']."','".$_REQUEST['hips']."','".$_REQUEST['ethenicity']."','".$_REQUEST['eye']."', '".$_REQUEST['hair']."','".$_REQUEST['body']."','".$_REQUEST['skin']."','".$_REQUEST['shoes']."', '".$_REQUEST['dress']."','".$_REQUEST['look']."','".date('Y-m-d h:m:s')."')";

		$res_admin = q($sql_admin);
			if($res_admin) {
			$msg = '-  Added Successfully.';

		   $_SESSION['number']=$_SESSION['number']-1;
		  
	if($_SESSION['number']>0){
	
		header('Location: audition_details.php');
	}else{
			 $_SESSION['number'] = null;
	   header('Location: company_dashboard.php');
	}


	}else{
	  $msg = '-  Not Successfully.';
	}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>FabStage.Com</title>
		<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />

		<!-- SCRIPT TO VALIDATE CONTROLS -->
		<script>
			function validate(){
				var errText = "";
				var errorflag = false;

				if(document.upload_form.requirement.value == "") {
					errText += "- Please Enter Requirement\n";
					alert(errText);
					errorflag = true;
					document.upload_form.requirement.focus();
					return false;
				}
				if(document.upload_form.category.value == "") {
					 errText += "- Please Select Category\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.category.focus();
					 return false;
				}
				if(document.upload_form.job_role.value == "") {
					errText += "- Please Enter Job Role\n";
					alert(errText);
					errorflag = true;
					document.upload_form.job_role.focus();
					return false;
				}
				if(document.upload_form.description.value == "") {
					errText += "- Please Enter description\n";
					alert(errText);
					errorflag = true;
					document.upload_form.description.focus();
					return false;
				}
				if(document.upload_form.wages.value == "") {
					errText += "- Please Enter wages\n";
					alert(errText);
					errorflag = true;
					document.upload_form.wages.focus();
					return false;
				}
				if(document.upload_form.wages_type.value == "") {
					errText += "- Please Enter Wages type\n";
					alert(errText);
					errorflag = true;
					document.upload_form.wages_type.focus();
					return false;
				}
				if(document.upload_form.work_duration.value == "") {
					errText += "- Please Enter Work Duration\n";
					alert(errText);
					errorflag = true;
					document.upload_form.work_duration.focus();
					return false;
				}
				if(document.upload_form.experience.value == "") {
					errText += "- Please Enter Experience\n";
					alert(errText);
					errorflag = true;
					document.upload_form.experience.focus();
					return false;
				}
				if(document.upload_form.language.value == "") {
					errText += "- Please Enter Language\n";
					alert(errText);
					errorflag = true;
					document.upload_form.language.focus();
					return false;
				}

				if(document.upload_form.extra_skill.value == "") {
					errText += "- Please Enter Extra Skill\n";
					alert(errText);
					errorflag = true;
					document.upload_form.extra_skill.focus();
					return false;
				}
				if(document.upload_form.any_association.value == "yes") {
					 if(document.upload_form.association_name.value == "") {
						errText += "- Please Enter Association Name\n";
						alert(errText);
						errorflag = true;
						document.upload_form.association_name.focus();
						return false;
					}
				}
				if(document.upload_form.physical_preference.value == "yes") {
					
					if(document.upload_form.height.value == "") {
						errText += "- Please Enter Height\n";
						alert(errText);
						errorflag = true;
						document.upload_form.height.focus();
						return false;
					}
					if(document.upload_form.weight.value == "") {
						errText += "- Please Enter Weight\n";
						alert(errText);
						errorflag = true;
						document.upload_form.weight.focus();
						return false;
					}
					if(document.upload_form.measurement.value == "") {
						errText += "- Please Enter Measurement\n";
						alert(errText);
						errorflag = true;
						document.upload_form.measurement.focus();
						return false;
					}
					if(document.upload_form.ethenicity.value == "") {
						errText += "- Please Enter Ethenicity\n";
						alert(errText);
						errorflag = true;
						document.upload_form.ethenicity.focus();
						return false;
					}
					if(document.upload_form.eye.value == "") {
						errText += "- Please Enter Eye Color\n";
						alert(errText);
						errorflag = true;
						document.upload_form.eye.focus();
						return false;
					}
					if(document.upload_form.hair.value == "") {
						errText += "- Please Enter Hair Color\n";
						alert(errText);
						errorflag = true;
						document.upload_form.hair.focus();
						return false;
					}
					if(document.upload_form.body.value == "") {
						errText += "- Please Enter Body Type\n";
						alert(errText);
						errorflag = true;
						document.upload_form.body.focus();
						return false;
					}
					if(document.upload_form.skin.value == "") {
						errText += "- Please Enter Skin Color\n";
						alert(errText);
						errorflag = true;
						document.upload_form.skin.focus();
						return false;
					}

					if(document.upload_form.shoes.value == "") {
						errText += "- Please Enter Shoes Size\n";
						alert(errText);
						errorflag = true;
						document.upload_form.shoes.focus();
						return false;
					}

					if(document.upload_form.dress.value == "") {
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

				if(errorflag==true) {
					return false;
				} else {
					return true;
				}
			}
		</script>

		<script type="text/javascript" src="admin/ajax.js"></script>
		<script>
			var ajax = new Array();

			function getCityList(sel) {
				var countryCode = document.getElementById('category').value;

				// Empty city select box
				document.getElementById('sub_category').options.length = 0;

				if(countryCode.length>0) {
					// Specifying which file to get
					var index = ajax.length;
					ajax[index] = new sack();

					//alert(ajax[index].requestFile);
					ajax[index].requestFile = 'admin/getState.php?countryCode='+countryCode;

					// Specify function that will be executed after file has been found
					ajax[index].onCompletion = function(){ createCities(index) };

					// Execute AJAX function
					ajax[index].runAJAX();
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
			function endis() {
				if(document.getElementById('any_association').value=='no') {
					document.upload_form.association_name.disabled = true;
				} else {
					document.upload_form.association_name.disabled = false;
				}
			}
	</script>

	</head>
	<body>
		<div id="main_container">
			
			<?include('top.php');?>
				<div>
					<div class="main_body_area">
						<div class="left_area">
						</div>
						<div class="center_body" style="width:800px;">
							<form name="upload_form" action="" method="POST" onsubmit="return validate();" autocomplete="off">
								<table width="90%"  border="0" align="center" cellspacing="1" cellpadding="1">
									<tr>
										<td colspan="2" align="center" class="msg"><?=$msg?></td>
									</tr>

										<tr>
											<td width="30%">&nbsp;</td>
											<td width="70%">Fill details for Audition <?=$i?></td>
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
									
									
									
									
									<!-- <tr>
										<td><span class="style1">*</span>&nbsp;<span>Category</span></td>
										<td>
											<select id="category" name="category" onchange="getCityList(this)">
												<option value="">-- Select Category --</option>
													<?php
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
									</tr> -->



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
										<td width="42%">
											<span class="style1">*</span>&nbsp;<span>Description</span> </td>
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
										<td>
											<input class="input" name="wages" type="text" id="wages" size="48" >
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td><span class="style1">*</span>&nbsp;<span>Wages Type</span></td>
										<td>
											<input class="input" name="wages_type" type="text" id="wages_type" size="48" >
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td width="42%">
											<span class="style1">*</span>&nbsp;<span>Work Duration</span> 
										</td>
										<td>
											<input class="input" name="work_duration" type="text" id="work_duration" size="48" >
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td><span class="style1"></span>&nbsp;<span>Gender</span></td>
										<td><select id="gender" name="gender">
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
										<td>
											<input class="input" name="experience" value="" type="text" id="experience" size="48" >
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td><span class="style1">*</span>&nbsp;<span>Language</span></td>
										<td>
											<input class="input" name="language" value="" type="text" id="language" size="48" >
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td><span class="style1">*</span>&nbsp;<span>Extra Skill</span></td>
										<td>
											<input class="input" name="extra_skill" value="" type="text" id="extra_skill" size="48" >
										</td>
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
									
									
									
									<!---------------------------->
			<?
			     $select_skill_for_show_and_hide = q("select * from fs_oudition where fld_id = '".$_SESSION['audition_id']."'");
                 $run_selection = f($select_skill_for_show_and_hide);
                    
			      $audition_skill = explode(',',$run_selection['main_skill']);

				  $in_search = explode(',',SKILL);
                     $i = 1;
                   foreach($audition_skill as &$b){
				  if(in_array($b,$in_search)){
				  
				       $i = 2;
				  }
				   }


				   if($i==1){
			  ?>
									
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
												  <? $height = "select * from fs_height order by fld_id ASC";
													 $height_run = q($height);
													 while($height_fatch = f($height_run)){
												  ?> 
												  <option value="<?=$height_fatch['type']?>" ><?=$height_fatch['type']?></option>
												  <?}?>
											   </select>
	                                        </td>



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
										  <option value="<?=$weight_fatch['type']?>" ><?=$weight_fatch['type']?></option>
										  <?}?>
									   </select>
	                               </td>



									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									
									
									
									
									
						 <tr>
							<td class="style1" align="left">Measurement</td>
							<td class="style1">Brest/Chest &nbsp;&nbsp;&nbsp;&nbsp;Waist &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hips</td>
						  </tr>
						  
						  <tr>
                              <td><span class="style1"></span>&nbsp;</td>
							<td><select id="bust_chest" name="bust_chest" style="width:85px;" disabled>

										
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
										  <option value="<?=$ethenicity_fatch['type']?>" ><?=$ethenicity_fatch['type']?></option>
										  <?}?>
									   </select>
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
												  <option value="<?=$eye_fatch['type']?>" ><?=$eye_fatch['type']?></option>
												  <?}?>
											</select>
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
											  <option value="<?=$hair_fatch['type']?>" ><?=$hair_fatch['type']?></option>
											  <?}?>
											</select>
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
												  <option value="<?=$body_fatch['type']?>" ><?=$body_fatch['type']?></option>
												  <?}?>
										   </select>
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
							           </td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td><span class="style1">*</span>&nbsp;<span>Shoes Size</span></td>
										

										 <td><select id="shoes" name="shoes" style="width:190px;" disabled>
												  <option value="">-- Select Shoes Size --</option>
												  <? $shoes = "select * from fs_shoe_size order by fld_id ASC";
													 $shoes_run = q($shoes);
													 while($shoes_fatch = f($shoes_run)){
												  ?> 
												  <option value="<?=$shoes_fatch['type']?>" ><?=$shoes_fatch['type']?></option>
												  <?}?>
									   </select></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td><span class="style1">*</span>&nbsp;<span>Dress Size</span></td>
									
										<td><select id="dress" name="dress" style="width:190px;" disabled>
												  <option value="">-- Select Dress Size --</option>
												  <? $dress = "select * from fs_dress_size order by fld_id ASC";
													 $dress_run = q($dress);
													 while($dress_fatch = f($dress_run)){
												  ?> 
												  <option value="<?=$dress_fatch['type']?>"><?=$dress_fatch['type']?></option>
												  <?}?>
					                  </select></td>

									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td><span class="style1">*</span>&nbsp;<span>Look Like</span></td>
										<td><input class="input" name="look" value="" type="text" id="look" size="48" disabled></td>
									</tr>

               <!------------------------------>
                   <?}?>




									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
					                     <td>&nbsp;</td>


					                        <?if($_SESSION['number']==1){  ?>
										 <td>
											 <input type="submit" id="submit1" value = "Complete" name="Submit1">
										</td>
										<?}else{?>
										   <td>	
											   <input type="submit" id="submit" value = "Next Step" name="Submit">
										</td>
					                     <?}?>
				                    </tr>
									<tr>
										<td height="40px">&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</form>

						</div>
						<div class="right_ads">
							<img src="images/ads.jpg" />
						</div>
					</div>
				</div>
				<div>
					<div class="footer_ads">
						<div class="footer_ads_area">
							<div class="footer_ads_left">
								<div class="slider">
									<div id="ei-slider" class="ei-slider">
										<ul class="ei-slider-large">
											<li><img src="images/footer_banner.png" /></li>
											<li><img src="images/footer_banner2.png" /></li>
											<li><img src="images/footer_banner3.png" /></li>
											<li><img src="images/footer_banner2.png" /></li>
											<li><img src="images/footer_banner4.png" /></li>
										</ul>
										<!-- ei-slider-large -->
										<ul class="ei-slider-thumbs">
											<li class="ei-slider-element"></li>
											<li><a href="#">Deal of the day</a></li>
											<li><a href="#">Stationery</a></li>
											<li><a href="#">Perfumes</a></li>
											<li><a href="#">Appliances</a></li>
											<li><a href="#">IPL Kicks off</a></li>
										</ul>
										<!-- ei-slider-thumbs -->
									</div>
									<!-- ei-slider -->
								</div>
								<!-- wrapper -->
								<script type="text/javascript" src="js/jquery.min.js"></script>
								<script type="text/javascript" src="js/jquery.eislideshow.js"></script>
								<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

								<script type="text/javascript">
									$.noConflict();
									jQuery(document).ready(function($) {
										$(function() {
											$('#ei-slider').eislideshow({
											animation			: 'center',
											autoplay			: true,
											slideshow_interval	: 3000,
											titlesFactor		: 0
											});
										});
									});
								</script>
							</div>
							<div class="footer_ads_right">
								<a href="#"><img src="images/ads_banner_girl.png" width="277" height="226" /></a>
							</div>
						</div>
					</div>
				</div>

				<?include('inner_footer.php');?>
			</div>
	</body>
</html>
