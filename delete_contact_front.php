<?
error_reporting(0);
include('constants.php');

$id=$_REQUEST['id'];

$qry="DELETE FROM fs_company_contact WHERE fld_id =".$id."";
q($qry) or die("error");

?>
<script type="text/javascript">
	setTimeout("window.close();", 2000);
	//window.location.href="product_list.php?msg=del&id=$id";

	

	window.location.href='edit_company_step2.php?id=<?=$_REQUEST['pro_id']?>&msg12=del';
</script>