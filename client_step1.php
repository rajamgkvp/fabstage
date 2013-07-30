<? 
include('constants.php');

if(isset($_REQUEST['submit'])){
   		        
		$query = "insert into fs_client(member_id,company_type,company_name,added_on)values('".$_SESSION['fab_id']."','".$_REQUEST['company_type']."','".$_REQUEST['company_name']."','".date('Y-m-d h:i:s')."')";

	    $run=q($query);
		if($run)
			{
			   header('Location: http://fs.sitebysite.us/client_step2.php');
			}
}

$query_fatch = "select * from fs_client WHERE member_id='".$_SESSION['fab_id']."'";
$query_run = q($query_fatch);
$quer_fatch = f($query_run);
?>
<style type="text/css">
	
	.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
	.text span{font-size:17px;}
	.button { width:auto; padding:0 10px; height:28px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px; height:28px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	 .text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:15px;color:#669966; text-transform:capitalize;}

</style>
	<html>
	<body >
	  <div style="background:#669966; padding:5px;"> 
	   <a href="http://fs.sitebysite.us/client_step1.php" class="text">First Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/client_step2.php" class="text">Second Step <!-- <span>&raquo;</span> --></a>  
	   <!-- <a href="http://fs.sitebysite.us/client_step3.php" class="text">Third Step <span>&raquo;</span></a> 
	   <a href="http://fs.sitebysite.us/client_step4.php" class="text">Fourth Step <span>&raquo;</span></a> 
	   <a href="" class="text">Fifth Step </a>  -->
	  
	   </div>
		<form name="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
        
						<table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">
						   
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							 <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>						
							  <tr>
								<td class="text_heading" align="left">Company Type</td>
								<td ><input class="input" name="company_type" type="text" value="<?=$quer_fatch['company_type']?>" id="company_type" size="30" ></td>
							  </tr>
							   <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td class="text_heading" align="left">Company Name </td>
								<td><input class="input" name="company_name" type="text" value="<?=$quer_fatch['company_name']?>" id="company_name" size="30" ></td>
							  </tr>
  							   <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>

						</table>
						  <table width="55%" border="0" align="left" cellspacing="0" cellpadding="0">
							  <tr>
							  <br><br>
						        <td width="12%"><input type="submit" id="submit" name="submit" value="Continue" class="button"></td>
								 <td width="88%"><input type="button" id="bt1" name="bt1" value="Skip" class="button"></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
						  </table>

					   
		 </form>
	 </body>
	 </html>