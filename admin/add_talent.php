<?php
	include('../constants.php');

	//ADD ADMIN USER
	if(isset($_REQUEST['userName']) && $_REQUEST['userName'] != '') {
		$sql_duplicate = "SELECT * FROM fs_talent WHERE userName = '".$_REQUEST['userName']."'";
		$res_duplicate = q($sql_duplicate);
		$count = nr($res_duplicate);
		if($count == 0) {
			for($j=0;$j<count($_REQUEST['cat']);$j++) {
				$check_val.=",";
				$check_val.= $_REQUEST['cat'][$j];
				$check_val.=",";
			}
		$sql2 =  "INSERT INTO fs_mamber(name, user_name, email,password,work_as,added_on)VALUES('".$_REQUEST['fname']."', '".$_REQUEST['userName']."','".$_REQUEST['email']."', '".$_REQUEST['Password']."',1,'".date('Y-m-d h:m:s')."')";

		$run2 = q($sql2);
			if($run2){
			//GET LAST INSERTED ID
				$query = "SELECT LAST_INSERT_ID()";
				$result = q($query);

				if ($result) {
					$row = mysql_fetch_row($result);
					$member_id = $row[0];
				}

				$sql_admin = "INSERT INTO fs_talent(member_id,main_skill, other1, other2, other3,other4,height,weight,
				bust_chest,waist,hips,ethenicity,eye, hair,body,skin,shoes,dress,look,about,current_comp,expertise,location,gender,marital,dob,nationality,language,work_area,expectation,amount,experience,extra_skill,association,association_name,phone_no,url,have_agent,agent_name,agent_phone_no,agent_email,summary,added_on)VALUES('".$member_id."','".$check_val."', '".$_REQUEST['other1']."', '".$_REQUEST['other2']."', '".$_REQUEST['other3']."','".$_REQUEST['other4']."','".$_REQUEST['height']."','".$_REQUEST['weight']."',
				'".$_REQUEST['bust_chest']."','".$_REQUEST['waist']."','".$_REQUEST['hips']."',
				'".$_REQUEST['ethenicity']."','".$_REQUEST['eye']."','".$_REQUEST['hair']."','".$_REQUEST['body']."','".$_REQUEST['skin']."','".$_REQUEST['shoes']."','".$_REQUEST['dress']."','".$_REQUEST['look']."','".$_REQUEST['about']."','".$_REQUEST['current_comp']."','".$_REQUEST['expertise']."','".$_REQUEST['location']."','".$_REQUEST['gender']."','".$_REQUEST['marital']."','".$_REQUEST['dob']."','".$_REQUEST['nationality']."','".$_REQUEST['language']."','".$_REQUEST['work_area']."', '".$_REQUEST['expectation']."','".$_REQUEST['amount']."','".$_REQUEST['experience']."','".$_REQUEST['extra_skill']."','".$_REQUEST['association']."','".$_REQUEST['association_name']."','".$_REQUEST['phone_no']."','".$_REQUEST['url']."','".$_REQUEST['have_agent']."','".$_REQUEST['agent_name']."','".$_REQUEST['agent_phone_no']."','".$_REQUEST['agent_email']."','".$_REQUEST['summary']."','".date('Y-m-d h:m:s')."')";

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
			document.upload_form.phone_no.disabled = true;
			document.upload_form.url.disabled = true;

		}else{
			document.upload_form.association_name.disabled = false;
			document.upload_form.phone_no.disabled = false;
			document.upload_form.url.disabled = false;
		}
	}

	function agent(){
		if(document.getElementById('have_agent').value=='no'){
			document.upload_form.agent_name.disabled = true;
			document.upload_form.agent_phone_no.disabled = true;
			document.upload_form.agent_email.disabled = true;
		}else{
			document.upload_form.agent_name.disabled = false;
			document.upload_form.agent_phone_no.disabled = false;
			document.upload_form.agent_email.disabled = false;
		}
	}

</script>
<script type="text/javascript">

    function in_array(array, id) {
		var flag=0;
    for(var i=0;i<array.length;i++) {
        if(array[i][0].id === id) {
            //return true;
			flag=1;
        }
    }
	if(flag==1)
		{
		  return true;
		}
		else
		{
			return false;
		}
}

//var result = in_array(ArrayofPeople, 235);

	function enable(name) {
        alert(name);
		var arr_skill=new Array("Actor","Model");
		alert(in_array(arr_skill,name));
		if(in_array(arr_skill,name)){
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
		} else {
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
		}
	}

	/*function disable() {
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
	}*/
</script>

<!-- CALENDAR INCLUDE-->
<script type="text/javascript" src="src/calendar.js"></script>
<script type="text/javascript" src="src/calendar-setup.js"></script>
<script type="text/javascript" src="lang/calendar-en.js"></script>
<style type="text/css"> @import url("css/calendar-win2k-cold-1.css"); </style>
<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />

<style type="text/css">
	.style1 {color: #FF0000}
</style>

<!---CODING FOR CALENDER--->
<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />

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
					<td><span class="style1">*</span>&nbsp;<span>Profile Name</span></td>
					<td>
						<input class="input" name="fname" type="text" id="fname" size="30">
					</td>
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
					<td width="58%"><input class="input" name="userName" type="text" value="" id="userName" size="30" ></td>
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
	<?php
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
		<?php
		 $i=0;
		 $sql1 = "SELECT * FROM fs_sub_category where category_id ='".$fatch['fld_id']."' order by sub_category ASC";
		 $res1 = q($sql1);
		 while($fatch1 = f($res1)){ 
			if($i%5==0){
		?>
	</tr><tr>
		<?}?>
	<td width="200" align="left" style="font-size:13px; padding-top:5px;">
		<input onclick="enable('<?=$fatch1['sub_category']?>')" type="checkbox" name="cat[]" id="cat[]" value="<?=$fatch1['sub_category']?>"><?=$fatch1['sub_category']?>
	</td>

	<?$i=$i+1; }?>

	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td colspan="4"><div class="border"></div></td></tr>
	</table>
	<?}?>

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
    <td><span class="style1"></span>&nbsp;<span>Height</span></td>
    <!-- <td><input class="input" name="height" value="" type="text" id="height" size="30" ></td> -->
	 <td><select id="height" name="height" style="width:190px;" disabled>
				  <option value="">-- Select Height --</option>
				  <? $height = "select * from fs_height order by fld_id ASC";
				  	 $height_run = q($height);
					 while($height_fatch = f($height_run)){
				  ?> 
				  <option value="<?=$height_fatch['type']?>"><?=$height_fatch['type']?></option>
				  <?}?>
       </select></td>


  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Weight</span></td>
    <!-- <td><input class="input" name="weight" value="" type="text" id="weight" size="30" ></td> -->
	 <td><select id="weight" name="weight" style="width:190px;" disabled>
				  <option value="">-- Select Weight --</option>
				  <? $weight = "select * from fs_weight order by fld_id ASC";
				  	 $weight_run = q($weight);
					 while($weight_fatch = f($weight_run)){
				  ?> 
				  <option value="<?=$weight_fatch['type']?>"><?=$weight_fatch['type']?></option>
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
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Ethenicity</span></td>
    <!-- <td><input class="input" name="ethenicity" value="" type="text" id="ethenicity" size="30" ></td> -->
	<td><select id="ethenicity" name="ethenicity" style="width:190px;" disabled>
				  <option value="">-- Select Ethenicity --</option>
				  <? $ethenicity = "select * from fs_ethenicity order by fld_id ASC";
				  	 $ethenicity_run = q($ethenicity);
					 while($ethenicity_fatch = f($ethenicity_run)){
				  ?> 
				  <option value="<?=$ethenicity_fatch['type']?>"><?=$ethenicity_fatch['type']?></option>
				  <?}?>
       </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Eyes Color</span></td>
    <!-- <td><input class="input" name="eye" value="" type="text" id="eye" size="30" ></td> -->
		 <td><select id="eye" name="eye" style="width:190px;" disabled>
				  <option value="">-- Select Eyes Color --</option>
				  <? $eye = "select * from fs_eyes_color order by fld_id ASC";
				  	 $eye_run = q($eye);
					 while($eye_fatch = f($eye_run)){
				  ?> 
				  <option value="<?=$eye_fatch['type']?>"><?=$eye_fatch['type']?></option>
				  <?}?>
       </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Hair Color</span></td>
    <!-- <td><input class="input" name="hair" value="" type="text" id="hair" size="30" ></td> -->
		<td><select id="hair" name="hair" style="width:190px;" disabled>
				  <option value="">-- Select Hair Color --</option>
				  <? $hair = "select * from fs_hair_color order by fld_id ASC";
				  	 $hair_run = q($hair);
					 while($hair_fatch = f($hair_run)){
				  ?> 
				  <option value="<?=$hair_fatch['type']?>"><?=$hair_fatch['type']?></option>
				  <?}?>
       </select></td>

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Body Type</span></td>
    <!-- <td><input class="input" name="body" value="" type="text" id="body" size="30" ></td> -->
	   <td><select id="body" name="body" style="width:190px;" disabled>
				  <option value="">-- Select Body Type --</option>
				  <? $body = "select * from fs_body_type order by fld_id ASC";
				  	 $body_run = q($body);
					 while($body_fatch = f($body_run)){
				  ?> 
				  <option value="<?=$body_fatch['type']?>"><?=$body_fatch['type']?></option>
				  <?}?>
       </select></td>


  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Skin Color</span></td>
    <!-- <td><input class="input" name="skin" value="" type="text" id="skin" size="30" ></td> -->
	     <td><select id="skin" name="skin" style="width:190px;" disabled>
				  <option value="">-- Select Skin Color --</option>
				  <? $skin = "select * from fs_skin_color order by fld_id ASC";
				  	 $skin_run = q($skin);
					 while($skin_fatch = f($skin_run)){
				  ?> 
				  <option value="<?=$skin_fatch['type']?>"><?=$skin_fatch['type']?></option>
				  <?}?>
       </select></td>

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Shoes Size</span></td>
    <!-- <td><input class="input" name="shoes" value="" type="text" id="shoes" size="30" ></td> -->
	<td><select id="shoes" name="shoes" style="width:190px;" disabled>
				  <option value="">-- Select Shoes Size --</option>
				  <? $shoes = "select * from fs_shoe_size order by fld_id ASC";
				  	 $shoes_run = q($shoes);
					 while($shoes_fatch = f($shoes_run)){
				  ?> 
				  <option value="<?=$shoes_fatch['type']?>"><?=$shoes_fatch['type']?></option>
				  <?}?>
       </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Dress Size</span></td>
    <!-- <td><input class="input" name="dress" value="" type="text" id="dress" size="30" ></td> -->
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
    <td><span class="style1"></span>&nbsp;<span>Look Like</span></td>
    <td><input class="input" name="look" value="" type="text" id="look" size="30" disabled></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>About Yourself</span></td>
    <td><textarea name="about" id="about"  rows="4" cols="25"></textarea></td>
  </tr>

  
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Current Company</span></td>
    <td><input class="input" name="current_comp" value="" type="text" id="current_comp" size="30" ></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Expertise In</span></td>
    <td><input class="input" name="expertise" value="" type="text" id="expertise" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Location</span></td>
    <td><input class="input" name="location" value="" type="text" id="location" size="30" ></td>
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
				
       </select></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Marital Status</span></td>
    <td><select id="marital" name="marital">
				  <option value="married">Married</option>
				  <option value="unmarried" selected>Unmarried</option>
				
       </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>DOB</span></td>
    <td><input class="input" name="dob" value="" type="text" id="dob" size="30" readonly>
		 <img src="admin_img/img.gif" id="button1" onMouseOver="this.style.cursor='pointer'" onMouseOut="this.style.cursor='default'" style="cursor: pointer; " border="0"/>
	</td>


	


  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Nationality</span></td>
    <td><input class="input" name="nationality" value="" type="text" id="nationality" size="30" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Language Know</span></td>
    <td><input class="input" name="language" value="" type="text" id="language" size="30" ></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Work Area</span></td>
    <td><input class="input" name="work_area" value="" type="text" id="work_area" size="30" ><span style="color:#cc3333;">(City,State,Country)</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Wages Expectation</span></td>
    <!-- <td><input class="input" name="expectation" value="" type="text" id="expectation" size="30" ></td> -->
	 <td><select id="expectation" name="expectation">
				  <option value="">-- Select Expectation --</option>
				  <option value="hour">Per Hour</option>
				  <option value="day">Per Day</option>
				  <option value="month">Per Month</option>
				  <option value="year">Per Year</option>
				
       </select></td>

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Wages Amount</span></td>
    <td><input class="input" name="amount" value="" type="text" id="amount" size="30" ></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Experience</span></td>
    <td><input class="input" name="experience" value="" type="text" id="experience" size="30" ></td>
  </tr>

 <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Extra Skill</span></td>
    <td><input class="input" name="extra_skill" value="" type="text" id="extra_skill" size="30" ></td>
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
    <td><input class="input"  name="association_name" value="" type="text" id="association_name" size="30" disabled></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Phone No</span></td>
    <td><input class="input" name="phone_no" value="" type="text" id="phone_no" size="30" disabled></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Url</span></td>
    <td><input class="input" name="url" value="" type="text" id="url" size="30" disabled></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Have Agent</span></td>
    <td><select id="have_agent" name="have_agent" onchange="agent();">
				  <option value="no">No</option>
				  <option value="yes">Yes</option>
				
       </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Agent Name</span></td>
    <td><input class="input" name="agent_name" value="" type="text" id="agent_name" size="30" disabled></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Agent Phone No</span></td>
    <td><input class="input" name="agent_phone_no" value="" type="text" id="agent_phone_no" size="30" disabled></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Agent Email</span></td>
    <td><input class="input" name="agent_email" value="" type="text" id="agent_email" size="30" disabled></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Summary</span></td>
    <td><textarea id="summary" name="summary"  rows="4" cols="25"></textarea></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<!--  <tr>
    <td><span class="style1"></span>&nbsp;<span>Project Duration</span></td>
    <td><input class="input" name="project_duration" value="" type="text" id="project_duration" size="30" ></td>
  </tr>
  <tr>
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
<script type="text/javascript">

	Calendar.setup({
		inputField     :    "dob",   // id of the input field
		ifFormat       :    "%d-%m-%Y",  // format of the input field
		button         :    "button1",
		singleClick    :    true,
		align          :    ""
	});
	</script>