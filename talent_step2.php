<? include('constants.php');

   if(isset($_REQUEST['submit'])){
   		        
					$query="UPDATE fs_talent SET about='".$_REQUEST['about']."', current_comp='".$_REQUEST['current_comp']."',expertise='".$_REQUEST['expertise']."',location='".$_REQUEST['location']."',gender='".$_REQUEST['gender']."',marital='".$_REQUEST['marital']."',dob='".$_REQUEST['dob']."',nationality='".$_REQUEST['nationality']."',language='".$_REQUEST['language']."',work_area='".$_REQUEST['work_area']."',expectation='".$_REQUEST['expectation']."',amount='".$_REQUEST['amount']."',experience='".$_REQUEST['experience']."',extra_skill='".$_REQUEST['extra_skill']."',association='".$_REQUEST['any_association']."',association_name='".$_REQUEST['association_name']."',phone_no='".$_REQUEST['phone_no']."',url='".$_REQUEST['url']."' WHERE member_id='".$_SESSION['fab_id']."'";
	                $run=q($query);
					if($run){
					   header('Location: http://fs.sitebysite.us/talent_step4.php');
					}
	  
   	  

   }

   $query_fatch = "select * from fs_talent WHERE member_id='".$_SESSION['fab_id']."'";
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
		document.getElementById('association_name').value='<?=$row['association_name']?>';
	}
}
</script>

	<html>
	<body >
	  <div style="background:#669966; padding:5px;"> 
	   <a href="http://fs.sitebysite.us/talent_step1.php" class="text">First Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/talent_step2.php" class="text">Second Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/talent_step3.php" class="text">Third Step <span>&raquo;</span></a> 
	   <a href="http://fs.sitebysite.us/talent_step4.php" class="text">Fourth Step <span>&raquo;</span></a> 
	   <a href="http://fs.sitebysite.us/talent_step5.php" class="text">Fifth Step <span></span></a> 
	   </div>
		<form name="upload_form" action="" method="POST" onSubmit="return validate();" autocomplete="off" style="font:normal 13px arial;">
         

                    <table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">

						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">About Yourself</td>
							<td><textarea name="about" id="about" class="input" rows="4" cols="25"><?=$quer_fatch['about']?></textarea></td>
						  </tr>

						  
						   <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Current Company</td>
							<td><input class="input" name="current_comp" value="<?=$quer_fatch['current_comp']?>" type="text" id="current_comp" size="30" ></td>
						  </tr>
						  
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Expertise In</td>
							<td><input class="input" name="expertise" value="<?=$quer_fatch['expertise']?>" type="text" id="expertise" size="30" ></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Location</td>
							<td><input class="input" name="location" value="<?=$quer_fatch['location']?>" type="text" id="location" size="30" ></td>
						  </tr>
						  
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Gender</td>
							<td><select id="gender" name="gender">
									  <option value="male" <?if($quer_fatch['gender']=="male"){?>selected<?}?>>Male</option>
									  <option value="female" <?if($quer_fatch['gender']=="female"){?>selected<?}?>>Female</option>
				
                                </select></td>
						  </tr>
						  
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Marital Status</td>
							<td><select id="marital" name="marital">
								  <option value="married" <?if($quer_fatch['marital']=="married"){?>selected<?}?>>Married</option>
								  <option value="unmarried" <?if($quer_fatch['marital']=="unmarried"){?>selected<?}?>>Unmarried</option>
										
							   </select></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">DOB</td>
							<td><input class="input" name="dob" value="<?=$quer_fatch['dob']?>" type="text" id="dob" size="30" ></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Nationality</td>
							<td><input class="input" name="nationality" value="<?=$quer_fatch['nationality']?>" type="text" id="nationality" size="30" ></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Language Know</td>
							<td><input class="input" name="language" value="<?=$quer_fatch['language']?>" type="text" id="language" size="30" ></td>
						  </tr>
						  
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Work Area</td>
							<td><input class="input" name="work_area" value="<?=$quer_fatch['work_area']?>" type="text" id="work_area" size="30" ></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Wages Expectation</td>
							<td><input class="input" name="expectation" value="<?=$quer_fatch['expectation']?>" type="text" id="expectation" size="30" ></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Wages Amount</td>
							<td><input class="input" name="amount" value="<?=$quer_fatch['amount']?>" type="text" id="amount" size="30" ></td>
						  </tr>

						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Experience</td>
							<td><input class="input" name="experience" value="<?=$quer_fatch['experience']?>" type="text" id="experience" size="30" ></td>
						  </tr>

						 <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Extra Skill</td>
							<td><input class="input" name="extra_skill" value="<?=$quer_fatch['extra_skill']?>" type="text" id="extra_skill" size="30" ></td>
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
							<td class="text_heading" align="left">Phone No</td>
							<td><input class="input" name="phone_no" value="<?=$quer_fatch['phone_no']?>" type="text" id="phone_no" size="30" ></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Url</td>
							<td><input class="input" name="url" value="<?=$quer_fatch['url']?>" type="text" id="url" size="30" ></td>
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