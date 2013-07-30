<?
error_reporting(0);
include('constants.php');

$id=$_REQUEST['id'];

$qry="DELETE FROM fs_portfolio_talent_photo WHERE fld_id =".$id."";
q($qry) or die("error");

?>
<script language="javascript">
	window.location.href="edit_talent_step4.php?msg12=del&id=<?=$_REQUEST['id1']?>";
</script>
