<?php include('constants.php');
			
			
			
	if($_REQUEST['type']==1){
			$sql_apply = "select * from fs_applied_job where talent_id = '".$_REQUEST['talent_id']."' AND job_id = '".$_REQUEST['job_id']."'";
			$run_apply = q($sql_apply);
			$num_apply = nr($run_apply);
			if($num_apply==0) {
				$job_insert = "insert into fs_applied_job(talent_id,job_id,company_id,status,added_on)values('".$_REQUEST['talent_id']."','".$_REQUEST['job_id']."','".$_REQUEST['company_id']."',2,'".date('Y-m-d h:m:s')."')";
				$job_run = q($job_insert);
				if($job_run) {
					$status = 2;
					$msg_job = "Submitted Successfully";

                 // Send message ........to talent regards for job selection by comapny
                       
						$message = "Your profile has been sortlisted for current opening. If you have any query please contect us by Message.";

                     	$query = "INSERT INTO fs_message(job_id, sender_id,receiver_id,message,time) values('".$_REQUEST['job_id']."','".$_SESSION['fab_id']."',
		                  '".$_REQUEST['talent_id']."','".$message."','".date('Y-m-d h:i:s')."')";
		                $insert = q($query);
				 //



				}
			} else {
				$status = 1;
				$msg_job = "You has been allready applied this job ";
			}
   }
  
   else if($_REQUEST['type']==2){
   
$sql_apply = "select * from fs_applied_audation where talent_id = '".$_REQUEST['talent_id']."' AND audation_id = '".$_REQUEST['audition_id']."'";
			$run_apply = q($sql_apply);
			$num_apply = nr($run_apply);
			
			
			if($num_apply==0) {
				$job_insert = "insert into fs_applied_audation(talent_id,audation_id,company_id,status,added_on)values('".$_REQUEST['talent_id']."','".$_REQUEST['audition_id']."','".$_REQUEST['company_id']."',2,'".date('Y-m-d h:m:s')."')";
				$job_run = q($job_insert);
				if($job_run) {
					$status = 2;
					

                 // Send message ........to talent regards for job selection by comapny
                       
						$message = "Your profile has been sortlisted for current opening. If you have any query please contect us by Message.";

                     	$query = "INSERT INTO  fs_audition_msg(audition_id, sender_id,receiver_id,message,send_time) values('".$_REQUEST['audition_id']."','".$_SESSION['fab_id']."',
		                 '".$_REQUEST['talent_id']."','".$message."','".date('Y-m-d h:i:s')."')";
		                $insert = q($query);
				 //



				}
			} else {
				$status = 1;
				
			}
   //
   
   
   
   
   }









?>

<script language="javascript">
	window.location.href="talent_profile.php?talent_id=<?=$_REQUEST['talent_id']?>&status=<?=$status?>";
</script>
