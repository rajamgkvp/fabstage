<?
error_reporting(0);
include('constants.php');

$id=$_REQUEST['id'];

$qry="DELETE FROM fs_portfolio_talent_audio WHERE fld_id =".$id."";
q($qry) or die("error");

?>
<script language="javascript">
	window.location.href="edit_talent_step5.php?msg11=del&id=<?=$_REQUEST['id1']?>";
</script>
