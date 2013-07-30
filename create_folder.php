<?php
	include('constants.php');
	if (isset($_POST['submit'])) {
		$name = $_POST['album'];
		//$description = $_POST['gdescription'];
		$msg = mkdir ("gallery/$name", 0700);
		if($msg==true)
			$msg = "Created successfully";
		else
			$msg = "Created successfully";
		}
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

<html>
	<body>
		<div style="background:#669966; padding:5px;"> 
		<?if($msg)echo $msg;?>
	  	</div>
		<form enctype="multipart/form-data" name="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
			<div align="center" style="vertical-align:middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Enter Album Name </td>
					<td>
						<input type="text" name="album" id="album" size="30" >
					</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" id="submit" name="submit" value="Create" class="button">
					</td>
				</tr>
			</table>
			</div>
			
		</form>
	</body>
</html>