<?
error_reporting(0);
include('../constants.php');

$id=$_REQUEST['id'];

$qry="DELETE FROM fs_news WHERE fld_id =".$id."";
q($qry) or die("error");

?>
<script language="javascript">
	window.location.href="main.php?page_id=news_list&msg=del";
</script>
