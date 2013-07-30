<?
error_reporting(0);
include('../constants.php');

$id=$_REQUEST['id'];

$qry="DELETE FROM fs_job_details WHERE fld_id =".$id."";
q($qry) or die("error");

?>
<script type="text/javascript">

	

	window.location.href='list_jobs_details.php?id=<?=$_REQUEST['pro_id']?>&msg=del';
</script>