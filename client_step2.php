<?php
	include('constants.php');
	
	if(isset($_REQUEST['submit'])){
		$query = "insert into fs_client(member_id,company_name,added_on)
		values('".$_SESSION['fab_id']."',
		'".$_REQUEST['company_name']."','".date('Y-m-d h:i:s')."')";
		$run=q($query);
		if($run) {
			$last_id = mysql_insert_id();
			$query1 = "INSERT INTO fs_client_contact (client_id,name,address,email,
			phone,url,added_on) VALUES ('".$last_id."', '".$_REQUEST['name']."',
			'".$_REQUEST['address']."','".$_REQUEST['email']."', '".$_REQUEST['phone']."','".$_REQUEST['url']."',
			'".date('Y-m-d h:i:s')."')";
			$run1=q($query1);
			if($run1){
				header('Location: client_step2.php');
			}
		} else {
			echo "Invalid Query";
		}
	}
	/*$query_fatch = "select * from fs_client_contact WHERE client_id='".$_SESSION['fld_id']."' order by DESC limit 1";
	$query_run = q($query_fatch);
	$quer_fatch = f($query_run);*/
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
		<!-- <div style="background:#669966; padding:5px;">
			<a href="http://fs.sitebysite.us/client_step1.php" class="text">First Step <span>&raquo;</span></a> 
			<a href="http://fs.sitebysite.us/client_step2.php" class="text">Second Step </a>
		</div> -->
		<form name="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
			<table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Company Name </td>
					<td><input  name="company_name" type="text" value="<?=$quer_fatch['company_name']?>" id="company_name" size="30" ></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Name </td>
					<td><input name="name" type="text" value="<?=$quer_fatch['name']?>" id="name" size="30" ></td>
					
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Address </td>
					<td><input name="address" type="text" value="<?=$quer_fatch['address']?>" id="address" size="30" ></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Email</td>
					<td><input name="email" type="text" value="<?=$quer_fatch['email']?>" id="email" size="30" >	</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Phone </td>
					<td> <input name="phone" type="text" value="<?=$quer_fatch['phone']?>" id="phone" size="30" ></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">URL </td>
					<td><input name="url" type="text" value="<?=$quer_fatch['url']?>" id="url" size="30" ></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<table width="55%" border="0" align="left" cellspacing="0" cellpadding="0">
				<tr>
					<br><br>
					<td width="12%"><input type="submit" id="submit" name="submit" value="Finish" class="button"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
		</form>
	</body>
</html>