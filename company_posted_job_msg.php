<?php
	include('constants.php');
   if(isset($_REQUEST['submit'])){
		$query = "INSERT INTO fs_message(job_id, sender_id,receiver_id,message,time)
		values('".$_REQUEST['job_id']."','".$_SESSION['fab_id']."',
		'".$_REQUEST['talent_id']."','".$_REQUEST['message']."',
		'".date('Y-m-d h:i:s')."')";
		$insert = q($query);
		if($insert){
			 $message= "Your message submitted successfully";
		}else{
		   $message= "Not submitted successfully";
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

				if(document.upload_form.message.value == "") {
					 errText += "- Please Enter Your Message\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.message.focus();
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
					<td>&nbsp;</td>
					<td><?=$message?></td>
				 </tr>
				 <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				 <tr>
					<td class="text_heading" align="left">Your Message</td>
					<td><textarea name="message" id="message" class="input" rows="10" cols="40"></textarea></td>
				</tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr> 
					<td>&nbsp;</td>
					<td>
						<input type="submit" id="submit" name="submit" value="Send" class="button">
					</td>
				</tr>
			</table>
		</form>
	 </body>
	 </html>