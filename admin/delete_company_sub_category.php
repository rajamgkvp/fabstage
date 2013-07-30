<?
error_reporting(0);
include('../constants.php');

$id=$_REQUEST['id'];

$qry="DELETE FROM fs_company_sub_category WHERE fld_id =".$id."";
q($qry) or die("error");

?>
<script language="javascript">
	window.location.href="main.php?page_id=company_sub_category_list&msg=del";
</script>
