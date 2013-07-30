<? include('constants.php');

   if(isset($_REQUEST['submit'])){
   		        
					$query="UPDATE fs_talent SET have_agent='".$_REQUEST['have_agent']."', agent_name='".$_REQUEST['agent_name']."',agent_phone_no='".$_REQUEST['agent_phone_no']."',agent_email='".$_REQUEST['agent_email']."',summary='".$_REQUEST['summary']."',project_duration='".$_REQUEST['project_duration']."' WHERE member_id='".$_SESSION['fab_id']."'";
	                $run=q($query);
					if($run){
					   header('Location: http://fs.sitebysite.us/talent_step4.php');
					}
	  
   	  

   }

   $query_fatch = "select * from fs_talent WHERE member_id='".$_SESSION['fab_id']."'";
   $query_run = q($query_fatch);
   $quer_fatch = f($query_run);


?>

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
      function endis(){
				

	if(document.getElementById('have_agent').value=='no'){

		document.upload_form.agent_name.disabled = true;
		document.getElementById('agent_name').value='';

		document.upload_form.agent_phone_no.disabled = true;
		document.getElementById('agent_phone_no').value='';

		document.upload_form.agent_email.disabled = true;
		document.getElementById('agent_email').value='';
	}else{

		document.upload_form.agent_name.disabled = false;
		document.getElementById('agent_name').value='<?=$quer_fatch['agent_name']?>';

		document.upload_form.agent_phone_no.disabled = false;
		document.getElementById('agent_phone_no').value='<?=$quer_fatch['agent_phone_no']?>';

		document.upload_form.agent_email.disabled = false;
		document.getElementById('agent_email').value='<?=$quer_fatch['agent_email']?>';
	}
}
</script>

	<html>
	<body onload="endis();">
	  <div style="background:#669966; padding:5px;"> 
	   <a href="http://fs.sitebysite.us/talent_step1.php" class="text">First Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/talent_step2.php" class="text">Second Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/talent_step3.php" class="text">Third Step <span>&raquo;</span></a> 
	   <a href="http://fs.sitebysite.us/talent_step4.php" class="text">Fourth Step <span>&raquo;</span></a> 
	   <a href="http://fs.sitebysite.us/talent_step5.php" class="text">Fifth Step <span></span></a> 
	   </div>
		<form name="upload_form" action="" method="POST" onSubmit="return validate();" autocomplete="off" style="font:normal 13px arial;">
         

						 <table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">

						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  
						  <tr>
							<td  class="text_heading" align="left">Have Agent</td>
							<td><select id="have_agent" name="have_agent" onchange="endis();">
										  <option value="no" <?if($quer_fatch['have_agent']=="no"){?>selected<?}?>>No</option>
										  <option value="yes" <?if($quer_fatch['have_agent']=="yes"){?>selected<?}?>>Yes</option>
										
							   </select></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td  class="text_heading" align="left">Agent Name</td>
							<td><input class="input" name="agent_name" value="<?=$quer_fatch['agent_name']?>" type="text" id="agent_name" size="30" ></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td  class="text_heading" align="left">Agent Phone No</td>
							<td><input class="input" name="agent_phone_no" value="<?=$quer_fatch['agent_phone_no']?>" type="text" id="agent_phone_no" size="30" ></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td  class="text_heading" align="left">Agent Email</td>
							<td><input class="input" name="agent_email" value="<?=$quer_fatch['agent_email']?>" type="text" id="agent_email" size="30" ></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td  class="text_heading" align="left">Summary</td>
							<td><textarea id="summary" name="summary" class="input" rows="4" cols="25"><?=$quer_fatch['summary']?></textarea></td>
						  </tr>

						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td  class="text_heading" align="left">Project Duration</td>
							<td><input class="input" name="project_duration" value="<?=$quer_fatch['project_duration']?>" type="text" id="project_duration" size="30" ></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <!-- <tr>
							<td  class="text_heading" align="left">Status</td>
							<td><textarea id="status" name="status" class="input" rows="4" cols="25"><?=$quer_fatch['status']?></textarea></td>
						  </tr> -->

						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>

						</table>






						  <table width="55%" border="0" align="left" cellspacing="0" cellpadding="0">
							  <tr>
							  <br><br>
						        <td width="12%"><input type="submit" id="submit" name="submit" value="Continue" class="button"></td>
								 <td width="88%"><input type="button" id="bt1" name="bt1" value="Skip" class="button"></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
						  </table>

					   
		 </form>
	 </body>
	 </html>