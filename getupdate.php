 <?
include('constants.php');

$company_id=$_REQUEST['cid'];
$job_id=$_REQUEST['jid'];
$talent_id=$_REQUEST['tid'];

$sql_up="update fs_applied_job set company_request=2 WHERE company_id = '".$company_id."' AND job_id = '".$job_id."' AND talent_id = '".$talent_id."' ";
$res_up=q($sql_up);

echo '<a href="talent_reviews.php?company_id='.$company_id.'&job_id='.$job_id.'&talent_id='.$talent_id.'"  title="Send Your Reviews" rel="gb_page_center[540, 450]" style="cursor: pointer; line-height:21px; color:#fff;text-align:center !important;" >Accept</a>
</div>
<div class="button1" style="width:100px;">
<a href="" >Reject</a>';

?>