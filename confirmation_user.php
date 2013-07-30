<?
include('constants.php');
	
// PASSKEY THAT GOT FROM LINK 
 $passkey=base64_decode($_REQUEST['passkey']);

// RETRIEVE DATA FROM TABLE WHERE ROW THAT MATCH THIS PASSKEY 
  $sql1 = "SELECT * FROM fs_mamber WHERE  user_name = '".$passkey."' ";
		 $res1 = q($sql1);
		 $count = nr($res1);
		 if($count == 1){
		
		 $sql2 = "UPDATE fs_mamber SET fld_status = 1  WHERE user_name = '".$passkey."' " ;
		 $res2 = q($sql2);
		 
					if($res2){
							 header('location: http://fs.sitebysite.us/login.php?canndidateconf=y');
					}
					else
					{
							header('location: http://fs.sitebysite.us/login.php?canndidateconf=n');
					}
					
		}else
		{
		header('location: http://fs.sitebysite.us/login.php?canndidateconf=w');
		
		}
	
?>

