<? include('constants.php');
    session_start();
   if(isset($_REQUEST['submit'])){
   		        
					$query="UPDATE fs_company SET height='".$_REQUEST['height']."', weight='".$_REQUEST['weight']."',measurement='".$_REQUEST['measurement']."',ethenicity='".$_REQUEST['ethenicity']."',eye='".$_REQUEST['eye']."',hair='".$_REQUEST['hair']."',body='".$_REQUEST['body']."',skin='".$_REQUEST['skin']."',shoes='".$_REQUEST['shoes']."',dress='".$_REQUEST['dress']."',look='".$_REQUEST['look']."' WHERE email='".$_SESSION['email']."'";
	                $run=q($query);
					if($run){
					   header('Location: http://fs.sitebysite.us/company_step2.php');
					}
	  
   	  

   }

   $query_fatch = "select * from fs_company WHERE email='".$_SESSION['email']."'";
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
	   <a href="http://fs.sitebysite.us/company_step1.php" class="text">First Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/company_step2.php" class="text">Second Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/company_step3.php" class="text">Third Step <span>&raquo;</span></a> 
	   <a href="http://fs.sitebysite.us/company_step4.php" class="text">Fourth Step <span>&raquo;</span></a> 
	   <a href="" class="text">Fifth Step <span>&raquo;</span></a> 
	   <a href="" class="text">Sixth Step </a>
	   </div>
		<form name="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
        
						<table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">
						   
						   
						   	
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td class="text_heading" align="left">Company Name</td>
								<td><input class="input" name="company_name" value="<?=$quer_fatch['company_name']?>" type="text" id="company_name" size="30" ></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td class="text_heading" align="left">Your Name</td>
								<td><input class="input" name="your_name" value="<?=$quer_fatch['your_name']?>" type="text" id="your_name" size="30" ></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td class="text_heading" align="left">Your Designation</td>
								<td><input class="input" name="designation" value="<?=$quer_fatch['designation']?>" type="text" id="designation" size="30" ></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							 
							  <tr>
								<td class="text_heading" align="left">Work Area</td>
								<td><!-- <input class="input" name="work_area" value="" type="text" id="work_area" size="30" > -->
									   <select id="work_area" name="work_area">
											  <option value="">-- Select --</option>
											  <option value="home_town" <?if($quer_fatch['work_area']=="home_town"){?>selected<?}?>>HOME TOWN</option>
											  <option value="home_country" <?if($quer_fatch['work_area']=="home_country"){?>selected<?}?>>HOME COUNTRY</option>
											  <option value="across_world" <?if($quer_fatch['work_area']=="across_world"){?>selected<?}?>>ACROSS WORLD</option>
									   </select>
								
								
								
								</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td class="text_heading" align="left">Expertise</td>
								<td><input class="input" name="expectation" value="<?=$quer_fatch['expectation']?>" type="text" id="expectation" size="30" ></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							  
							  <tr>
								<td class="text_heading">Any Association</td>
								<td><select id="any_association" name="any_association" onchange="endis();">
											 
									<option value="no" <?if($quer_fatch['association']=="no"){?>selected<?}?>>No</option>
									<option value="yes" <?if($quer_fatch['association']=="yes"){?>selected<?}?>>Yes</option>
											  
									   </select>
								</td>
							  </tr> 
							 
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>

							   <tr>
								<td class="text_heading">Association Name</td>
								<td><input class="input"   name="association_name" value="<?=$quer_fatch['association_name']?>" <?if($quer_fatch['any_association']=="no"){?>disabled<?}?> type="text" id="association_name" size="30" ></td>
						    </tr> 
							  
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr> 
							  
							  <tr>
								<td class="text_heading" align="left">Summary</td>
								<td><textarea id="summary" name="summary" class="input" rows="4" cols="25"><?=$quer_fatch['summary']?></textarea></td>
							  </tr>

							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td class="text_heading" align="left">Status</td>
								<td><textarea id="status" name="status" class="input" rows="4" cols="25"><?=$quer_fatch['status']?></textarea></td>
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