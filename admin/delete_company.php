<?
error_reporting(0);
include('../constants.php');

$id=$_REQUEST['id'];

$qry="DELETE FROM fs_mamber WHERE fld_id =".$id."";
q($qry) or die("error");
$qry="DELETE FROM fs_company WHERE member_id =".$id."";
q($qry) or die("error");

?>
<script language="javascript">
	window.location.href="main.php?page_id=company_list&msg=del";
</script>
