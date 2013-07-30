<?
error_reporting(0);
include('../constants.php');

$id = $_REQUEST['id'];

$sql1 = "UPDATE   fs_feedback  SET status1 ='2' WHERE fld_id = ".$id."";
q($sql1) or die("error");

?>
<script language="javascript">
	window.location.href="main.php?page_id=feedback_list&msg=2";
</script>
