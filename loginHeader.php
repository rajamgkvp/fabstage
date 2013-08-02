<?php
if($_REQUEST['tab11']!=''){

	 header('location:talent_search_result_front.php?category='.$_REQUEST['talent_category'].'&location='.$_REQUEST['talent_location'].'&to_experience='.$_REQUEST['talent_exp1'].'&from_experience='.$_REQUEST['talent_exp2'].'&wag_to='.$_REQUEST['talent_wag_to'].'&wag_from='.$_REQUEST['talent_wag_from'].'&nationality='.$_REQUEST['talent_nationality'].'');

}

if($_REQUEST['tab21']!=''){


 header('location:company_search_result.php?category='.$_REQUEST['company_category'].'&location='.$_REQUEST['company_location'].'');
 
}

if($_REQUEST['tab31']!=''){

     header('location:job_search_result.php?category='.$_REQUEST['job_category'].'&location='.$_REQUEST['job_location'].'&to_experience='.$_REQUEST['job_exp1'].'&from_experience='.$_REQUEST['job_exp2'].'&wag_to='.$_REQUEST['job_wag_to'].'&wag_from='.$_REQUEST['job_wag_from'].'&job_type='.$_REQUEST['job_type'].'');


}

if($_REQUEST['tab41']!=''){

header('location:audition_search_result.php?&category='.$_REQUEST['audition_category'].'&location='.$_REQUEST['audition_location'].'&to_experience='.$_REQUEST['audition_exp1'].'&from_experience='.$_REQUEST['audition_exp2'].'&wag_to='.$_REQUEST['audition_wag_to'].'&wag_from='.$_REQUEST['audition_wag_from'].'');


}








if($_REQUEST['name']!=""){
		
			$query = "select * from fs_mamber where email = '".$_REQUEST['email']."'";
			$run = q($query);
			$num = nr($run);
			if($num == 0){
					    $query1 = "select * from fs_mamber where user_name = '".$_REQUEST['user_name']."'";
						$run1 = q($query1);
						$num1 = nr($run1);
						if($num1 == 0) {

				$insert = "insert into fs_mamber(name,email,user_name,password,work_as,added_on)VALUES('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['user_name']."','".$_REQUEST['password']."','".$_REQUEST['type']."','".date('Y-m-d h:i:s')."')";
				$ins_run = q($insert);

				if($ins_run){

							

							$query = "SELECT LAST_INSERT_ID()";
					        $result = q($query);
					        if ($result) {
					           $nrows = nr($result);
					           $row = mysql_fetch_row($result);
					           $user_id = $row[0];
				            }				

					   $_SESSION['fab_id'] = $user_id;
                       $_SESSION['fab_username'] = $_REQUEST['user_name'];
                       $_SESSION['fab_email'] = $_REQUEST['email'];
		               $_SESSION['work_as'] = $_REQUEST['type'];

					   $msg='<span style="font-size:12px;font-family:arial;color:#336699;"><b> - Registration Successful</b></span>';

		// SEND E-MAIL TO 
		   $to = $_REQUEST['email'];

		// YOUR SUBJECT
		   $subject = 'FabStage - Thank you for register with us.';
		
		// MESSAGE
           $message = '
			<div style="width:620px;margin:auto;color:#FFFFFF;background:#0099ff;font-size:14px;font-weight:bold;padding:7px 0px 7px 15px;">FabStage</div>
			<div style="width:608px;margin:auto;height:auto;font-size:11px;padding:7px 10px 7px 15px;border:solid #0099ff 1px ;">
			Dear '.ucfirst($_POST['user_name']).',<br /><br />Welcome to FabStage Portal.<BR><BR>
			<B>Your Login Details are as follows:</B><br/><br/>
			<B>Username :</B> '.$_POST['user_name'].' <br/>
			<B>Password :</B> '.$_POST['password'].' 
			<br><br>
			Kindly click on the link below to Activate your Account<B>:</B><br/><br/>
			<a href='.URL.'confirmation_user.php?passkey='.base64_encode($_POST['user_name']).'> '.URL.'confirmation_user.php?passkey='.base64_encode($_POST['user_name']).'</a><br><br>
			Regards,<br>
			FabStage
			</div>
		';

		// TO SEND HTML MAIL, THE CONTENT-TYPE HEADER MUST BE SET
		   $headers  = 'MIME-Version: 1.0' . "\r\n";
		   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// ADDITIONAL HEADERS
		   $headers .= 'From:  FabStage<admin@fs.sitebysite.us>'. "\r\n";
		
		// MAIL IT
		   mail($to, $subject, $message, $headers);

					  // header('Location: dashboard.php');
					   $work_as = $_SESSION['work_as'];   
   		               if($work_as==1){
		                  header('Location: talent_dashboard.php');
		               }
					   else
						   if($work_as==2){
		                       header('Location: company_dashboard.php');
		                   }
						   else 
							   if($work_as==3){
		                            header('Location: client_dashboard.php');
		                        }
				}
				}
			
			else{
				$msg='<span style="font-size:12px;font-family:arial;color:#cc3366;"><b> - User Name is already registered. </b></span>';
			}
		}
			
			else{
				$msg='<span style="font-size:12px;font-family:arial;color:#cc3366;"><b> - Email is already registered. </b></span>';
			}
		
	}

if($_REQUEST['username']!=""){
		             
   $query = "select * from fs_mamber where user_name = '".$_REQUEST['username']."' and password = '".$_REQUEST['login_password']."' AND fld_status=1";
   $run = q($query);
   $num = nr($run);
   if($num==0)
   {
	   header('Location: login.php?ms=fail');
   }
   else
   {
	    $row_login = f($run);
   
	    //SET SESSION
        $_SESSION['fab_id'] = $row_login['fld_id'];
        $_SESSION['fab_username'] = $row_login['fld_username'];
        $_SESSION['fab_email'] = $row_login['fld_email'];
		$_SESSION['work_as'] = $row_login['work_as'];

	    // header('Location: dashboard.php');
					   $work_as = $_SESSION['work_as'];   
   		               if($work_as==1){
		                  header('Location: talent_dashboard.php');
		               }
					   else
						   if($work_as==2){
		                       header('Location: company_dashboard.php');
		                   }
						   else 
							   if($work_as==3){
		                            header('Location: client_dashboard.php');
		                        }
   }
}
?>