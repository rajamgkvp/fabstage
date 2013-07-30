<?
error_reporting(0);
include('constants.php');

$id=$_REQUEST['project_id'];

$qry="DELETE FROM fs_company_project_portfolio WHERE fld_id =".$id."";
q($qry) or die("error");

?>
<script language="javascript">
	window.location.href="company_project_details.php?msg=del&id=<?=$_REQUEST['id']?>";
</script>