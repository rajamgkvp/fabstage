<?
error_reporting(0);
include('constants.php');

$id=$_REQUEST['id'];

$qry="DELETE FROM fs_company_project WHERE fld_id =".$id."";
$del = q($qry);
if($del){
   $qry1="DELETE FROM fs_company_project_portfolio WHERE project_id ='".$id."' AND company_id = '".$_SESSION['fab_id']."'";
   $del1 = q($qry1);
   $qry2="DELETE FROM fs_company_project_video_link WHERE project_id ='".$id."' AND company_id = '".$_SESSION['fab_id']."'";
   $del2 = q($qry2);
}


?>
<script type="text/javascript">
	setTimeout("window.close();", 2000);
	//window.location.href="product_list.php?msg=del&id=$id";

	

	window.location.href='edit_company_step8.php?id=<?=$_REQUEST['pro_id']?>&msg12=del';
</script>
