<?php
	include('../constants.php');
	/*include('chk_session_admin.php');*/

	$get_query = q("SELECT * FROM fs_help WHERE fld_id = '".$_REQUEST['id']."'");
	$get_res = f($get_query);

	

?>
<html>
	<head>
			<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
		<style type="text/css">
			.style1 {color: #FF0000}
		</style>
	</head>

	<body>
			<table width="100%"  border="0" align="center" cellspacing="2" cellpadding="2">
				<tr>
					<td valign="top" colspan="2" ><center><b>Question/Answer Details</b></center></td>
				</tr>
				<tr>
					<td valign="top" colspan="2" >&nbsp;</td>
				</tr>
				<tr>
					<td valign="top" ><b>Question</b></td>
					<td>
						<?=$get_res['question']?>
					</td>
				</tr>
				<tr>
					<td valign="top" colspan="2" >&nbsp;</td>
				</tr>
				</tr>
				<tr>
					<td valign="top" colspan="2" >&nbsp;</td>
				</tr>
				<tr>
					<td valign="top"><b>Answer</b></td>
					<td>
						<?=$get_res['answer']?>
					</td>
				</tr>
				
				<tr>
					<td valign="top" colspan="2" >&nbsp;</td>
				</tr>
				<tr>
					<td valign="top"><b>Added On</b></td>
					<td>
						<?=$get_res['added_on']?>
					</td>
				</tr>
				<tr>
					<td valign="top" colspan="2" >&nbsp;</td>
				</tr>
				<!-- <tr>
					<td valign="top"><b>Updated On</b></td>
					<td>
						<?=$get_res['updated_on']?>
					</td>
				</tr> -->
				<tr>
					<td valign="top" colspan="2" >&nbsp;</td>
				</tr>
			</table>
	</body>