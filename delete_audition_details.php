<?php
	include('constants.php');

	echo $status_query = "DELETE * FROM fs_applied_audation WHERE audation_id='".$_REQUEST['jobid']."' AND talent_id='".$_REQUEST['talentid']."'";
	$status_res = q($status_query);
?>

<script type="text/javascript">
		window.location.href="sort_list_job_list.php?tab=5&delete=4";
</script>