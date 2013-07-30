<?php
	include('constants.php');

	 $status_query = "DELETE  FROM fs_applied_job WHERE job_id='".$_REQUEST['jobid']."' AND talent_id='".$_SESSION['fab_id']."'";
	$status_res = q($status_query);
?>

<script type="text/javascript">
		window.location.href="sort_list_job_list.php?tab=5&delete=4";
</script>