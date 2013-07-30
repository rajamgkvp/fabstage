<?php
	include('constants.php');
	

	
	if(isset($_POST['submit'])) {
		
	//CODE TO UPLOAD PICTURE OR IMAGE FILE
		if($_FILES['upload_pic']['name']!="") {
			$target = "admin/portfolio_pic/"; 
			$name=date('H:ia').basename( $_FILES['upload_pic']['name']); 

			$allowedExts = array("jpg","jpeg","png","gif","JPG","JPEG","PNG","GIF");
			$extension = end(explode(".",$_FILES["upload_pic"]["name"]));
			if((($_FILES["upload_pic"]["type"] == "image/gif")
				|| ($_FILES["upload_pic"]["type"] == "image/GIF")
				|| ($_FILES["upload_pic"]["type"] == "image/jpeg")
				|| ($_FILES["upload_pic"]["type"] == "image/JPEG")
				|| ($_FILES["upload_pic"]["type"] == "image/jpg")
				|| ($_FILES["upload_pic"]["type"] == "image/JPG")
				|| ($_FILES["upload_pic"]["type"] == "image/png")
				|| ($_FILES["upload_pic"]["type"] == "image/PNG")
				|| ($_FILES["upload_pic"]["type"] == "image/pjpeg"))
				&& in_array($extension, $allowedExts)) {
					if ($_FILES["upload_pic"]["error"] > 0) {
						$msg_image = "Error: " . $_FILES["upload_pic"]["error"] . "<br>";
					} else {
						move_uploaded_file($_FILES['upload_pic']['tmp_name'],$target.$name);
						$sql1 = q("INSERT INTO fs_portfolio_photo (ex_id,title,large_pic,added_on)values('".$_SESSION['fab_id']."','".$_REQUEST['ptitle']."','".$name."','".date('Y-m-d h:i:s')."')");
						if(!$sql1) {
							$msg_image = "Image File Not Uploaded Successfully <br>";
						} else {
							$msg_image = "Image File Uploaded Successfully<br>";
						}
					}
			} else {
				$msg_image = "Please upload correct Image File<br>";
			}
		}

	//CODE TO UPLOAD AUDIO FILE
	if($_FILES['upload_audio']['name']!="") {
		$target = "admin/portfolio_audio/"; 
		$name=date('H:ia').basename( $_FILES['upload_audio']['name']); 
		if ((($_FILES["upload_audio"]["type"] == "audio/mp3")
			|| ($_FILES["upload_audio"]["type"] == "audio/mp4")
			|| ($_FILES["upload_audio"]["type"] == "audio/wav"))) {

				if ($_FILES["upload_audio"]["error"] > 0) {
					$msg_audio = "Return Code: " . $_FILES["upload_audio"]["error"] . "<br />";
				} else {
					if (file_exists("images/" . $_FILES["upload_audio"]["name"])) {
						$msg_audio = $_FILES["upload_audio"]["name"] . " already exists.<br> ";
					} else {
						move_uploaded_file($_FILES["upload_audio"]["tmp_name"],$target.$name);
						$sql1 = q("INSERT INTO fs_portfolio_audio (ex_id,title,large_pic,added_on)values('".$_SESSION['fab_id']."','".$_REQUEST['atitle']."','".$name."','".date('Y-m-d h:i:s')."')");
						if(!$sql1) {
							$msg_audio = "Audio File Not Uploaded Successfully<br>";
						} else {
							$msg_audio = "Audio File Uploaded Successfully<br>";
						}
					}
				}
		} else {
			$msg_audio = "Please Upload Correct Audio file<br>";
		}
	}

	//CODE TO UPLOAD logo FILE
		if($_FILES['upload_resume']['name']!="") {
			$target = "admin/portfolio_logo/"; 
			$resume=date('H:ia').basename( $_FILES['upload_resume']['name']); 
			$allowedExts = array("jpg","jpeg","png","gif","JPG","JPEG","PNG","GIF");
			$extension = end(explode(".",$_FILES["upload_resume"]["name"]));
			if(in_array($extension, $allowedExts)) {
					if ($_FILES["upload_resume"]["error"] > 0) {
						$msg_resume = "Error: " . $_FILES["upload_resume"]["error"] . "<br>";
					} else {
						move_uploaded_file($_FILES['upload_resume']['tmp_name'],$target.$resume);
						$sql1 = q("INSERT INTO fs_portfolio_logo (ex_id,title,large_pic,added_on)values('".$_SESSION['fab_id']."','".$_REQUEST['rtitle']."','".$resume."','".date('Y-m-d h:i:s')."')");
						if(!$sql1) {
							$msg_resume = "Resume File Not Uploaded Successfully<br>";
						} else {
							$msg_resume = "Resume File Uploaded Successfully<br>";
						}
					}
			} else {
				$msg_resume = "Please Upload Correct Resume File<br>";
			}
		}
	//CODE TO INSERT VIDEO LINK
	if($_REQUEST['video']!="") {
		$sql_video = q("INSERT INTO fs_portfolio_video (ex_id,title,large_pic,added_on)values('".$_SESSION['fab_id']."','".$_REQUEST['vtitle']."','".$_REQUEST['video']."','".date('Y-m-d h:i:s')."')");
		if(!$sql_video) {
			$msg_video = "Video Link Not Inserted Successfully";
		} else {
			$msg_video = "Video Link Inserted Successfully";
		}
	}

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
			<a href="http://fs.sitebysite.us/company_step1.php" class="text">First Step <span>&raquo;</span></a>
			<a href="http://fs.sitebysite.us/company_step2.php" class="text">Second Step <span>&raquo;</span></a>
			<a href="http://fs.sitebysite.us/company_step3.php" class="text">Third Step <span>&raquo;</span></a>
			<a href="http://fs.sitebysite.us/company_step4.php" class="text">Fourth Step <span></span></a>
			
		</div>
		<form enctype="multipart/form-data" name="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">

			<table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						&nbsp;&nbsp;
					</td>
				</tr>
				<tr>
					<td>
						&nbsp;&nbsp;
					</td>
				</tr>
				<tr>
					<td colspan="2" align="left" class="msg" style="font-size: 14px;color:#cc3333;">
						<?
							
							
							if($msg_image != "" OR $msg_audio != "" OR $msg_resume != "" OR $msg_video != ""){	
							 header('Location: http://fs.sitebysite.us/company_step4.php');
							echo "Successfully file uploded";
					
						}?>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
					</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Photo Title </td>
					<td><input name="ptitle" type="text" value="" id="ptitle" size="30" ></td>
				</tr>
				<tr>
					<td colspan="2" align="center">&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Upload Photo</td>
					<td><input class="input" type="file" name="upload_pic" id="upload_pic"></td>	
				<tr>	
				
				<tr>
					<td colspan="2" align="center">&nbsp;</td>
				</tr>
			
				<tr>
					<td class="text_heading" align="left">Audio Title </td>
					<td><input name="atitle" type="text" value="" id="atitle" size="30" ></td>
				</tr>
				<tr>
					<td colspan="2" align="center">&nbsp;</td>
				</tr>

				<tr>
					<td class="text_heading" align="left">Upload Audio</td>
					<td><input class="input" type="file" name="upload_audio" id="upload_audio"></td>	
				</tr>	
				<tr>
					<td colspan="2" align="center">&nbsp;</td>
					
				</tr>
			
				<tr>
					<td class="text_heading" align="left">Logo Title </td>
					<td><input name="rtitle" type="text" value="" id="rtitle" size="30" ></td>
				</tr>
				<tr>
					<td colspan="2" align="center">&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Upload Logo</td>
					<td><input class="input" type="file" name="upload_resume" id="upload_resume"></td>	
				</tr>	
				<tr>
					<td colspan="2" align="center">&nbsp;</td>
				</tr>
			
				<tr>
					<td class="text_heading" align="left">Video Title </td>
					<td><input name="vtitle" type="text" value="" id="vtitle" size="30" ></td>
				</tr>
				<tr>
					<td colspan="2" align="center">&nbsp;</td>
				</tr>
				<tr>
					<td class="text_heading" align="left">Video Link</td>
					<td><input class="input" type="text" name="video" id="video" size="55"></td>	
				</tr>	
				<tr>
					  <td colspan="2" align="center">&nbsp;</td>
				</tr>	
				
					
					
				
			</table>

			<table width="55%" border="0" align="left" cellspacing="0" cellpadding="0">
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td width="12%">
						<input type="submit" id="submit" name="submit" value="Continue" class="button">
					</td>
					<td width="88%">
						<input type="button" id="bt1" name="bt1" value="Skip" class="button">
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>

		</form>
	</body>
</html>