<?php
	error_reporting(0);
	include('../constants.php');
	/*include('chk_session_admin.php');*/

	$id=$_REQUEST['id'];

	$qry="DELETE FROM fs_feedback WHERE fld_id =".$id."";
	q($qry) or die("error");

?>
	<script language="javascript">
		window.location.href="main.php?page_id=feedback_list&msg=del";
	</script>