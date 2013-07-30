<?
include('constants.php');
if(isset($_REQUEST['email']) && $_REQUEST['email'] !=''){
	   
	   
	   
	   $sqlv1 = "Select * from fs_mamber  Where email = '".$_REQUEST['email']."'";
	   $resv1 = q($sqlv1);


     $count = nr($resv1);
	 if($count!=0){

	   $rowv1 = f($resv1);
                   $email4 = base64_encode($_REQUEST['email']);
	  
      $url = "http://fabstage.swtpl.co.in/change_password.php?email='".$email4."'";
		

	   
	

		// multiple recipients
			$to  = $_REQUEST['email'];
			// subject
			$subject = 'Change Your FabStage Password';
			// message
			$message = '
					<table width="696" border="1" bordercolor="#04626e" cellspacing="0" cellpadding="0" align="center">
					  <tr>
						<td bgcolor="#04626e" height="30" align="center" valign="top">
							
						   <table width="678" border="0" cellspacing="0" cellpadding="0">
								  <tr>
									<td style="font-family:Times New Roman, Times, serif; color:#FFF; font-size:18px; padding-top:3px;">Dear User</td>
									
								  </tr>
								</table>

						</td>
					  </tr>
					  <tr>
						<td style="background: url(https://www.mydominicantransfers.com/images/domnican_vroucher_bg.jpg) no-repeat top center; height:830px;" align="center" valign="top">
							<table width="678" border="0" cellspacing="0" cellpadding="0" >
							  <tr>
								<td valign="top">
									<table width="678" border="0" cellspacing="5" cellpadding="0">
									  <tr>
										<td width="365">	<p style="padding-top:0;" >Dear '.ucfirst($rowv1['name']).'</p>
										 </td>
										<td width="245" ><img src="http://fabstage.swtpl.co.in/newhome/images/logo.png" width="252" height="53" /></td>
									  </tr>
										</table>
									
									</td>
									 </tr>
								   <BR><BR>

								 <tr>
								 <td>


				 Please click bellow link.....<B>:</B><br/><br/>
			    '.$url.' <br/>
				<br/>
				
				<br><br>
				   </td></tr>
				<br><br>
				Regards<br>
				FabStage Team
				</div>';

			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			$headers .= 'From:  FabStage<info@fabstage.com>'. "\r\n";
			// Mail it
			mail($to, $subject, $message, $headers);
			$msg = 'Please Check Your Email...' ;
	}else{
		$msg = 'Wrong Email Address...';
	}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> </TITLE>
<link href="css/style23.css" rel="stylesheet" type="text/css" />
<script language="javascript">
 function validates(){
	var errText = "";
	var errorflag = false;								   

		if(document.forgot_password.email.value == ""){
			errText = "- Please Enter Your email address.\n";
			alert(errText);
			document.forgot_password.email.focus();
			errorflag = true;
			return false;
		}else if(document.forgot_password.email.value != ""){
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(document.forgot_password.email.value)){
					errorflag = false;
			}else{
				errText = "- Email Format is wrong.\n";
				alert(errText);
				document.forgot_password.email.focus();
				errorflag = true;
				return false;
			}
		}
	if(errorflag==true){
		alert(errText);
		return false;
	}else{
		return true;
	}
}
</script>
 </HEAD>

<body style="background-image:url('images/request_bg.jpg'); background-repeat:repeat-x">
 <form action="" method="POST"   name="forgot_password" onSubmit="return validates();">
  <table cellpadding="5" cellspacing="5">
	<tr>
		<td width="100px" colspan=2 height="10px"style="font-size:13px;">
		</td>
	</tr>
	<tr><td colspan=2 style=" font-family: calibri; font-size: 16px; color: #333333"><B>Forget Password?</B></td></tr>
	<?
		if($msg != ''){
		?>
		<tr><td colspan=2 style="font-size: 12px;color:red" ><?=$msg?></td></tr>
		<?
		}
	?>	
	<tr><td colspan=2 style=" font-family: calibri; font-size: 16px; color: #333333">We will send your password to your email address that is used with the account...</td></tr>
	
	<tr>
		<td width="80px" style=" font-family: calibri; font-size: 16px; color: #333333">Email</td>
		<td>
			<input type="text" id="email" class="input" value="" name="email" size="30" />
		</td>
	</tr>
	<tr>
		<td width="100px" style="font-size:13px;"></td>
		<td>
			<input type="submit" value="Submit" style=" font-family: calibri; font-size: 16px; color: #333333;Cursor:Pointer "  name="submit" />
		</td>
	</tr>
  </table>	
</form>
 </body>
</html>
