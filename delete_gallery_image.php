<?
error_reporting(0);
include('constants.php');

$id=$_REQUEST['image_id'];

$qry="DELETE FROM fs_talent_portfolio WHERE fld_id =".$id."";
q($qry) or die("error");

?>
<script language="javascript">
	window.location.href="gallery.php?$msg=del";
</script>