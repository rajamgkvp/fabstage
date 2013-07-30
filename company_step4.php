<? include('constants.php');
   	
	  
   if(isset($_REQUEST['submit'])){
   		        
					
					 
						  // NOTE ---->  company_id = mamber_id(in table)

					$sql = "INSERT INTO fs_company_contact (company_id, name,address,email,phone,url,  added_on) VALUES ('".$_SESSION['fab_id']."', '".$_REQUEST['name']."','".$_REQUEST['address']."','".$_REQUEST['email']."', '".$_REQUEST['phone']."','".$_REQUEST['url']."',  '".date('Y-m-d h:i:s')."')";


				     $sql = q($sql);





					if($run){
					   header('Location: http://fs.sitebysite.us/company_step5.php');
					}
	  
   	  

   }

   $query_fatch = "select * from fs_company WHERE member_id='".$_SESSION['fab_id']."'";
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
<script>
      function endis(){
				

	if(document.getElementById('any_association').value=='no'){

		document.upload_form.association_name.disabled = true;
		document.getElementById('association_name').value='';
	}else{

		document.upload_form.association_name.disabled = false;
		document.getElementById('association_name').value='<?=$quer_fatch['association_name']?>';
	}
}
</script>

	<html>
	<body >
	  <div style="background:#669966; padding:5px;"> 
	   <a href="http://fs.sitebysite.us/company_step1.php" class="text">First Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/company_step2.php" class="text">Second Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/company_step3.php" class="text">Third Step <span>&raquo;</span></a> 
	   <a href="http://fs.sitebysite.us/company_step4.php" class="text">Fourth Step <span></span></a> 
	
	   
	   </div>
		<form name="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
        
						<table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">
						 
						   <tr>
									<td colspan="2" height="8"></td>
							  </tr> 
							  <tr>
									<td class="text_heading" align="left">Name</td>
									<td><input class="input" name="name" type="text" value="" id="name" size="60" >
									</td>
							  </tr>
							  <tr>
									<td colspan="2" height="8"></td>
							  </tr>
							   <tr>
									<td class="text_heading" align="left">Address </td>
									<td><input class="input" name="address" type="text" value="" id="address" size="60" >
									</td>
							  </tr>
							  <tr>
									<td colspan="2" height="8"></td>
							  </tr>



								<tr>
									<td class="text_heading" align="left">Email</td>
									<td><input class="input" name="email" type="text" value="" id="email" size="60" >
									</td>
							  </tr>
							  <tr>
									<td colspan="2" height="8"></td>
							  </tr>
							  <tr>
									<td class="text_heading" align="left">Phone </td>
									<td>
									   <input class="input" name="phone" type="text" value="" id="phone" size="60" >
									</td>
							  </tr>
							  <tr>
									<td colspan="2" height="8"></td>
							  </tr>
							   <tr>
									<td class="text_heading" align="left">URL </td>
									<td>
									   <input class="input" name="url" type="text" value="" id="url" size="60" >
									</td>
							  </tr>
							  <tr>
									<td colspan="2" height="8"></td>
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