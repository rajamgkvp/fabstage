<?php
	include('constants.php');
$sql = "select * from fs_job where fld_id='".$_REQUEST['job_id']."'";
$sql_run = q($sql);
$sql_fatch = f($sql_run);



$job_insert = "insert into fs_applied_job(talent_id,job_id,company_id,added_on)values('".$_SESSION['fab_id']."','".$_REQUEST['job_id']."','".$sql_fatch['company_id']."','".date('Y-m-d h:m:s')."')";
$job_run = q($job_insert);

?>

<script type="text/javascript">
		window.location.href="match_job_list.php?tab=1&ms=2";
</script>