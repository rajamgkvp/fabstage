<?
error_reporting(0);
include('../constants.php');

$id=$_REQUEST['id'];

$qry="DELETE FROM fs_oudition_details WHERE fld_id =".$id."";
q($qry) or die("error");

?>
<script type="text/javascript">

	

	window.location.href='oudition_details_list.php?id=<?=$_REQUEST['pro_id']?>&msg=del';
</script>