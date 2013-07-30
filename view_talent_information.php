<?php
	include('constants.php');

	//GET TALENT ID
	$talent_id = $_REQUEST['talent_id'];
?>

<html>
	<body>
		<br>
		<table width="100%" border="0" align="center" cellspacing="2" cellpadding="2">

			<!-- QUERY TO GET TALENT NAME AND EMAIL ID  -->
			<?php
				$first_query = q("SELECT * FROM fs_mamber WHERE fld_id = $talent_id && work_as = 1");
				$first_res = f($first_query);
			?>
			<tr>
				<td colspan="2">
				</td>
			</tr>
			<tr>
				<td colspan="4" class="contentheading">
					<b style="font-size:20px;"> 
						<?=$first_res['name']?>
					</b>
				</td>
			</tr>

			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Email Id</b>
				</td>
				<td colspan="2" height="8">
					<?=$first_res['email']?>
				</td>
			</tr>

			<!-- QUERY TO GET TALENT REST OF THE DETAILS  -->
			<?php
				$talent_query = q("SELECT * FROM fs_talent WHERE member_id='".$talent_id."'");
				$query_res = f($talent_query);
			?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Main Skills</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['main_skill']?>
				</td>
			</tr>

			<?php
				if($query_res['other1'] != "") { 
			?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2"  class="contentheading">
					<b>Other 1</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['other1']?>
				</td>
			</tr>

			<? if($query_res['other2'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Other 2</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['other2']?>
				</td>
			</tr>
			<? }?>

			<? if($query_res['other3'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Other 3</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['other3']?>
				</td>
			</tr>
			<? }?>

		<? if($query_res['other4'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Other 4</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['other4']?>
				</td>
			</tr>
			<? } }?>

			<?php
				if($query_res['height'] != "") { 
			?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Height</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['height']?>
				</td>
			</tr>

			<? if($query_res['weight'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Weight</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['weight']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['bust_chest'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Breast/Chest</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['bust_chest']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['waist'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Waist</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['waist']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['hips'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Hips</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['hips']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['ethenicity'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Ethenicityt</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['ethenicity']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['eye'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Eye</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['eye']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['hair'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Hair</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['hair']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['body'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Body</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['body']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['skin'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Skin</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['skin']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['shoes'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Shoes</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['shoes']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['dress'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Dress</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['dress']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['look'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Look</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['look']?>
				</td>
			</tr>
			<?}?>
			<?}?>

			<? if($query_res['about'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>About</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['about']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['current_comp'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Current Company</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['current_comp']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['expertise'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Expertise</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['expertise']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['location'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Location</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['location']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['gender'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Gender</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['gender']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['marital'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Marital Status</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['marital']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['dob'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Date Of Birth</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['dob']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['nationality'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Nationality</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['nationality']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['language'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Language</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['language']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['work_area'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Work Area</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['work_area']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['expectation'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Expectation</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['expectation']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['expectation'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Amount</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['amount']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['expectation'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Experience</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['experience']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['extra_skill'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Extra Skill</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['extra_skill']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['association'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Association</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['association']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['association_name'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Association Name</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['association_name']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['phone_no'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Phone Number</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['phone_no']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['url'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>URL</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['url']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['have_agent'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Have Agent</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['have_agent']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['agent_name'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Agent Name</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['agent_name']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['agent_phone_no']!="") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Agent Phone Number</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['agent_phone_no']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['agent_email'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Agent Email</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['agent_email']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['summary'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Summary</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['summary']?>
				</td>
			</tr>
			<?}?>

			<? if($query_res['project_duration'] != "") {?>
			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Project Duration</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['project_duration']?>
				</td>
			</tr>
			<?}?>

			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Profile Created On</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['added_on']?>
				</td>
			</tr>

			<tr>
				<td colspan="2" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="contentheading">
					<b>Profile Updated On</b>
				</td>
				<td colspan="2" height="8">
					<?=$query_res['updated_on']?>
				</td>
			</tr>

			<tr>
				<td colspan="2"  align="center">
				</td>
			</tr>

		</table>
	</body>
</html>