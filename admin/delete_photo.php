<?
error_reporting(0);
include('../constants.php');

$id=$_REQUEST['id'];

$qry="DELETE FROM fs_portfolio_photo WHERE fld_id =".$id."";
q($qry) or die("error");

?>
<script language="javascript">
	window.location.href="portfolio_photo.php?msg=del&id=<?=$_REQUEST['id1']?>";
</script>
