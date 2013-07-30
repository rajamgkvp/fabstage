<?php require_once "uploader/phpuploader/include_phpuploader.php" ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>fs</title>
  <style type="text/css">
	.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
	.text span{font-size:17px;}
	.button { width:auto; padding:0 10px; height:28px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px; height:28px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	.text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:15px;color:#669966; text-transform:capitalize;}
</style>
	


</head>
<body>
    <div style="float:left;">
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
						<input type="submit" id="submit"  name="submit" value="Create" class="button">
					</td>
				</tr>
			</table>
			</div>
			
		</form>

	 </div>



	<div style="float:left;">
	

	
	<?php
		$uploader=new PhpUploader();
		
		$uploader->MultipleFilesUpload=true;
		$uploader->InsertText="Select multiple files";
		
		$uploader->MaxSizeKB=1024000;
		$uploader->AllowedFileExtensions="*.jpg,*.png,*.gif,*.bmp,*.txt,*.zip,*.rar";
		
		$uploader->SaveDirectory="uploader/savefiles";
		
		$uploader->FlashUploadMode="Partial";
		
		$uploader->Render();
		
	?>
	
	</div>
		
	<script type='text/javascript'>
	function CuteWebUI_AjaxUploader_OnTaskComplete(task)
	{
		var div=document.createElement("DIV");
		var link=document.createElement("A");
		link.setAttribute("href","savefiles/"+task.FileName);




		link.innerHTML="You have uploaded file : uploader/savefiles/"+task.FileName;

		
		   
		

		




		link.target="_blank";
		div.appendChild(link);
		document.body.appendChild(div);
	}

	



	</script>

 
	    
		


   






	
</body>
</html>