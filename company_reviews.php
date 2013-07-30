<?php
	include('constants.php');

$company_id=$_REQUEST['company_id']; 
$job_id=$_REQUEST['job_id'];
$talent_id=$_REQUEST['talent_id'];

   if(isset($_REQUEST['submit'])){

	$sql_duplicate = "SELECT * FROM fs_talent_reviews WHERE company_id = '".$company_id."' AND job_id = '".$job_id."' AND talent_id = '".$talent_id."' ";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){
		
		$query = "INSERT INTO fs_talent_reviews(company_id, job_id,talent_id,terms1,terms2,terms3,terms4,terms5,added_on)
		values('".$company_id."','".$job_id."','".$talent_id."','".$_REQUEST['term1']."','".$_REQUEST['term2']."','".$_REQUEST['term3']."','".$_REQUEST['term4']."','".$_REQUEST['term5']."','".date('Y-m-d h:i:s')."')";
		$insert = q($query);
		if($insert){
			 $message= "You Are Release Talent & Submit Reviews Successfully";
		}else{
		   $message= "You Are Not Release Talent & Submit Reviews Successfully";
		}
   }else{
		$message= "You Are Already Release & Submit Reviews For This Talent";
   }

   if($_REQUEST['st']=='accept'){
	 $sql_up="update fs_applied_job set talent_request=3,status=4 WHERE company_id = '".$company_id."' AND job_id = '".$job_id."' AND talent_id = '".$talent_id."' ";
	 $res_up=q($sql_up);
}else{

    $sql_up="update fs_applied_job set talent_request=2 WHERE company_id = '".$company_id."' AND job_id = '".$job_id."' AND talent_id = '".$talent_id."' ";
   $res_up=q($sql_up);
}
   }


?>
 <html>
	 <head>

		<style type="text/css">
			.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
			.text span{font-size:17px;}
			.button { width:auto; padding:0 10px; height:28px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
			.button a { color:#fff; text-decoration:none;}
			.button:hover { width:auto; padding:0 10px; height:28px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
			.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
			.text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:15px;color:#669966; text-transform:capitalize;}
		</style>

		<script>
			function validate() {
				var errText = "";
				var errorflag = false;

				if(document.upload_form.term1.value == "") {
					 errText += "- Please Select Numbers For Terms1 in Out Of 5 \n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.term1.focus();
					 return false;
				}

				if(document.upload_form.term2.value == "") {
					 errText += "- Please Select Numbers For Terms2 in Out Of 5 \n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.term2.focus();
					 return false;
				}
				if(document.upload_form.term3.value == "") {
					 errText += "- Please Select Numbers For Terms3 in Out Of 5 \n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.term3.focus();
					 return false;
				}
				if(document.upload_form.term4.value == "") {
					 errText += "- Please Select Numbers For Terms4 in Out Of 5 \n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.term4.focus();
					 return false;
				}
				if(document.upload_form.term5.value == "") {
					 errText += "- Please Select Numbers For Terms5 in Out Of 5 \n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.term5.focus();
					 return false;
				}


				if(errorflag==true) {
					return false;
				} else {
					return true;
				}
			}
		</script>

	</head>
	<body>
		<form name="upload_form" action="" method="POST" onSubmit="return validate();" autocomplete="off" style="font:normal 13px arial;">
			<table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">
			<tr>
					<td colspan="2" class="text_heading" align="center"><b>Send Your Reviews</b></td>
					
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="text_heading" align="center" style="font-size:12px;"><?=$message?></td>
				 </tr>
				 <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				 <tr>
					<td class="text_heading" align="left">Term1</td>
					<td>
						<select name="term1" id="term1">
						<option value="">--Select--</option>
						<?
						for($i=1;$i<6;$i++){
						?>
						<option value="<?=$i?>"><?=$i?></option>
						<?}?>
						</select>&nbsp;Out of 5
					</td>
				</tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Term2</td>
					<td>
						<select name="term2" id="term2">
						<option value="">--Select--</option>
						<?
						for($i=1;$i<6;$i++){
						?>
						<option value="<?=$i?>"><?=$i?></option>
						<?}?>
						</select>&nbsp;Out of 5
					</td>
				</tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Term3</td>
					<td>
						<select name="term3" id="term3">
						<option value="">--Select--</option>
						<?
						for($i=1;$i<6;$i++){
						?>
						<option value="<?=$i?>"><?=$i?></option>
						<?}?>
						</select>&nbsp;Out of 5
					</td>
				</tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Term4</td>
					<td>
						<select name="term4" id="term4">
						<option value="">--Select--</option>
						<?
						for($i=1;$i<6;$i++){
						?>
						<option value="<?=$i?>"><?=$i?></option>
						<?}?>
						</select>&nbsp;Out of 5
					</td>
				</tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Term5</td>
					<td>
						<select name="term5" id="term5">
						<option value="">--Select--</option>
						<?
						for($i=1;$i<6;$i++){
						?>
						<option value="<?=$i?>"><?=$i?></option>
						<?}?>
						</select>&nbsp;Out of 5
					</td>
				</tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr> 
					<td>&nbsp;</td>
					<td>
						<input type="submit" id="submit" name="submit" value="Finish" class="button">
					</td>
				</tr>
			</table>
		</form>
	 </body>
	 </html>