<?php
	include('constants.php');

	$status_query = q("UPDATE fs_applied_audation SET status=3
					WHERE audation_id='".$_REQUEST['jobid']."' AND talent_id='".$_REQUEST['talentid']."'");
	$status_res = f($status_query);

	//QUERY TO GET TALENT EMAIL ADDRESS
	$sql="SELECT * FROM fs_mamber WHERE fld_id = '".$_REQUEST['talentid']."' AND work_as = 1";
	$result=q($sql); // TO EXECUTE QUERY
	$talent_email = f($result); // TO FETCH ROW
	$count=nr($result);

		if($count==1) {
			$to = $talent_email['email'] ;
			$subject = "Confirmation mail for Audition";
			$message = '<table frame="box" cellpadding="5" style="border-collapse:collapse; border-color:#c0c0c0; 
							border-style:solid;	border-width:5pt">
							<tr>
								<img src="http://fs.sitebysite.us/admin/admin_img/fabstage_logo.jpg" width="309" height="60" >
							</tr>
							<tr>
								<font size="3" color="#cc0033">Audation Disclosure Notification</font>
							</tr>
							<tr>
									<td>Dear Sir/Mam</td>
							</tr>
							<tr>
							Your Details are mentioned below. 
							</tr>
							<table frame="box" cellpadding="2" bgcolor="#c0c0c0" >
								<tr>
									<td>Congratulation</td>
								</tr>
								<tr>
									<td>We are happy to inform you that you have <br>shortlisted for this Audition. </td>
								</tr>
								<tr>
									So Please <a href="http://fs.sitebysite.us/">Click Here</a> to contact us.
								</tr>
							</table>
							<tr>
									<td>Thanks<br/>'.TEAM.'</td>
							</tr>
						</table>';
						
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:sitebysite<admin@sitebysite.com>' . "\r\n";

			mail($to, $subject, $message, $headers);
		}
	//QUERY TO GET TALENT EMAIL ADDRESS
	$company = "SELECT * FROM fs_applied_audation WHERE audation_id = '".$_REQUEST['jobid']."' AND talent_id = '".$_REQUEST['talentid']."'";
	$company_email = q($company); // TO EXECUTE QUERY
	$company_id = f($company_email); // TO FETCH ROW
	$companyid = $company_id['company_id'];//FETCH COMPANY ID

	//QUERY TO FETCH COMPANY EMAILID
	$com_emailid = "SELECT * FROM fs_mamber WHERE fld_id = '".$companyid."' AND work_as = 2";
	$com_email_id = q($com_emailid); // TO FETCH ROW
	$res_username = f($com_email_id);
	
	$count_res1 = nr($com_email_id);
	if($count_res1==1) {
			$to = $talent_email['email'] ;
			$subject = "Confirmation mail for interview";
			$message = '<table frame="box" cellpadding="5" style="border-collapse:collapse; border-color:#c0c0c0; 
							border-style:solid;	border-width:5pt">
							<tr>
								<img src="http://fs.sitebysite.us/admin/admin_img/fabstage_logo.jpg" width="309" height="60" >
							</tr>
							<tr>
								<font size="3" color="#cc0033">Interview Disclosure Notification</font>
							</tr>
							<tr>
									<td>Dear Sir/Mam</td>
							</tr>
							<tr>
							Your Details are mentioned below. 
							</tr>
							<table frame="box" cellpadding="2" bgcolor="#c0c0c0" >
								<tr>
									<td>Congratulation</td>
								</tr>
								<tr>
									<td>We are happy to inform you that you have <br>shortlisted for this profile. </td>
								</tr>
								<tr>
									So Please <a href="http://fs.sitebysite.us/">Click Here</a> to contact us.
								</tr>
							</table>
							<tr>
									<td>Thanks<br/>'.TEAM.'</td>
							</tr>
						</table>';
						
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:sitebysite<admin@sitebysite.com>' . "\r\n";

			mail($to, $subject, $message, $headers);
		}
?>

<script type="text/javascript">
		window.location.href="applied_audation.php";
</script>