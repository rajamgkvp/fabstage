<?
error_reporting(0);
include('../constants.php');

$id = $_REQUEST['id'];

$sql = "UPDATE   fs_testimonials  SET status1 ='2' WHERE fld_id = ".$id."";
q($sql) or die("error");

?>
<script language="javascript">
	window.location.href="main.php?page_id=fs_testimonials&msg=2";
</script>
