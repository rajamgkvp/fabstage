<?
include('constants.php');

$company_id=$_REQUEST['company_id'];
$job_id=$_REQUEST['job_id'];
$talent_id=$_REQUEST['talent_id'];

$sql_up="update fs_applied_job set talent_request=1 WHERE company_id = '".$company_id."' AND job_id = '".$job_id."' AND talent_id = '".$talent_id."' ";
$res_up=q($sql_up);

echo $sql_delete = "DELETE FROM fs_talent_reviews WHERE company_id = '".$company_id."' AND job_id = '".$job_id."' AND talent_id = '".$talent_id."' ";
$res_delete=q($sql_delete);

$select_talent = "select * from fs_mamber where fld_id = '".$talent_id."'" ;
$run_talent = q($select_talent);
$fatch_talent = f($run_talent);

$subject = 'FabSatge';

			$message = '<html><head> <title>FabSatge Email</title><link rel="SHORTCUT ICON" href="images/fav.gif" /></head><body style="font-family:Trebuchet MS; font-size:12px;">
			<table width="80%">
				<tbody>
					<tr>
						<td><h1>FabSatge</h1></td>
						<td><span align="right"> <img alt="" /></span> </td>
					</tr>
				</tbody>
			</table>
			<p> Dear '.$fatch_talent['name'].',<br /></p>

			Your Job finish request has been rejected by Talent..Kindly Communicate and try later..<br />
			<br />
			
			Kind regards,<br />
			<br />
			
			President <strong>Fabstage</strong>
			</body>
			</html>';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			$headers .= 'From:FabSatge <admin@fabSatge.com>';
					
			$to = $fatch_talent['email'];
			$mail = mail($to, $subject, $message, $headers);
			if($mail){
				header('location:selected_job_list.php');
				//$msg = 'Congratulation !! Your Classified Details Added Succesfully';
			}else{$msg = 'Sorry !! Your Classified Details Not Added Succesfully';}
			

			


?>