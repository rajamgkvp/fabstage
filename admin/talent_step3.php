<? include('constants.php');
  
   if(isset($_REQUEST['submit'])){
   		        
					$query="UPDATE fs_talent SET height='".$_REQUEST['height']."', weight='".$_REQUEST['weight']."',measurement='".$_REQUEST['measurement']."',ethenicity='".$_REQUEST['ethenicity']."',eye='".$_REQUEST['eye']."',hair='".$_REQUEST['hair']."',body='".$_REQUEST['body']."',skin='".$_REQUEST['skin']."',shoes='".$_REQUEST['shoes']."',dress='".$_REQUEST['dress']."',look='".$_REQUEST['look']."' WHERE email='".$_SESSION['email']."'";
	                $run=q($query);
					if($run){
					   header('Location: http://fs.sitebysite.us/talent_step-2.php');
					}
	  
   	  

   }

   $query_fatch = "select * from fs_talent WHERE email='".$_SESSION['email']."'";
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
	   <a href="http://fs.sitebysite.us/talent_step1.php" class="text">First Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/talent_step2.php" class="text">Second Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/talent_step3.php" class="text">Third Step <span>&raquo;</span></a> 
	   <a href="http://fs.sitebysite.us/talent_step4.php" class="text">Fourth Step <span>&raquo;</span></a> 
	   <a href="http://fs.sitebysite.us/talent_step5.php" class="text">Fifth Step <span></span></a> 
	   </div>
		<form name="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
        
						<table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">
						   
						   
						   	


						  <tr>
							<td class="text_heading" align="left">Height</td>
							
						<td>
							<select id="height" name="height" style="width:190px;">
							  <option value="">-- Select Height --</option>
							  <? $height = "select * from fs_height order by fld_id ASC";
								 $height_run = q($height);
								 while($height_fatch = f($height_run)){
							  ?> 
							  <option value="<?=$height_fatch['type']?>" <?if($quer_fatch['height']==$height_fatch['type']){?>selected<?}?> ><?=$height_fatch['type']?></option>
							  <?}?>
                           </select>
	                   </td>

						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Weight</td>
							<td><select id="weight" name="weight" style="width:190px;">
								  <option value="">-- Select Weight --</option>
								  <? $weight = "select * from fs_weight order by fld_id ASC";
									 $weight_run = q($weight);
									 while($weight_fatch = f($weight_run)){
								  ?> 
								  <option value="<?=$weight_fatch['type']?>" <?if($quer_fatch['weight']==$weight_fatch['type']){?>selected<?}?>><?=$weight_fatch['type']?></option>
								  <?}?>
                               </select>
	                      </td>

						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td style="font-size:17px;color:#669966; text-transform:capitalize; " align="left">Measurement</td>
							<td>BREST/CHEST &nbsp;&nbsp;&nbsp;&nbsp;WAIST &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HIPS</td>
						  </tr>
						  <tr>
                              <td><span class="style1"></span>&nbsp;</td>
							<td><select id="bust_chest" name="bust_chest" style="width:85px;">

										
										  <option value="">- Select -</option>
										  <? $bust_chest = "select * from fs_bust_chest order by fld_id ASC";
											 $bust_chest_run = q($bust_chest);
											 while($bust_chest_fatch = f($bust_chest_run)){
										  ?> 
										  <option value="<?=$bust_chest_fatch['type']?>" <?if($quer_fatch['bust_chest']==$bust_chest_fatch['type']){?>selected<?}?>><?=$bust_chest_fatch['type']?></option>
										  <?}?>
							   </select>
							   <select id="waist" name="waist" style="width:85px;">
										  <option value="">- Select -</option>
										  <? $waist = "select * from fs_waist order by fld_id ASC";
											 $waist_run = q($waist);
											 while($waist_fatch = f($waist_run)){
										  ?> 
										  <option value="<?=$waist_fatch['type']?>" <?if($quer_fatch['waist']==$waist_fatch['type']){?>selected<?}?>><?=$waist_fatch['type']?></option>
										  <?}?>
							   </select> 

							   <select id="hips" name="hips" style="width:85px;">
										  <option value="">- Select -</option>
										  <? $hips = "select * from fs_hips order by fld_id ASC";
											 $hips_run = q($hips);
											 while($hips_fatch = f($hips_run)){
										  ?> 
										  <option value="<?=$hips_fatch['type']?>" <?if($quer_fatch['hips']==$hips_fatch['type']){?>selected<?}?>><?=$hips_fatch['type']?></option>
										  <?}?>
							   </select>
							   
							   
							   
							   
							   
							   </td>
                         </tr>

						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Ethenicity</td>
								<td>
									<select id="ethenicity" name="ethenicity" style="width:190px;">
									  <option value="">-- Select Ethenicity --</option>
									  <? $ethenicity = "select * from fs_ethenicity order by fld_id ASC";
										 $ethenicity_run = q($ethenicity);
										 while($ethenicity_fatch = f($ethenicity_run)){
									  ?> 
									  <option value="<?=$ethenicity_fatch['type']?>" <?if($quer_fatch['ethenicity']==$ethenicity_fatch['type']){?>selected<?}?>><?=$ethenicity_fatch['type']?></option>
									  <?}?>
								   </select>
							   </td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Eyes Color</td>
							 <td><select id="eye" name="eye" style="width:190px;">
									  <option value="">-- Select Eyes Color --</option>
									  <? $eye = "select * from fs_eyes_color order by fld_id ASC";
										 $eye_run = q($eye);
										 while($eye_fatch = f($eye_run)){
									  ?> 
									  <option value="<?=$eye_fatch['type']?>" <?if($quer_fatch['eye']==$eye_fatch['type']){?>selected<?}?>><?=$eye_fatch['type']?></option>
									  <?}?>
                             </select></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Hair Color</td>
							<td><select id="hair" name="hair" style="width:190px;">
								  <option value="">-- Select Hair Color --</option>
								  <? $hair = "select * from fs_hair_color order by fld_id ASC";
									 $hair_run = q($hair);
									 while($hair_fatch = f($hair_run)){
								  ?> 
								  <option value="<?=$hair_fatch['type']?>" <?if($quer_fatch['hair']==$hair_fatch['type']){?>selected<?}?>><?=$hair_fatch['type']?></option>
								  <?}?>
                                </select></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Body Type</td>
							  <td><select id="body" name="body" style="width:190px;">
									  <option value="">-- Select Body Type --</option>
									  <? $body = "select * from fs_body_type order by fld_id ASC";
										 $body_run = q($body);
										 while($body_fatch = f($body_run)){
									  ?> 
									  <option value="<?=$body_fatch['type']?>" <?if($quer_fatch['body']==$body_fatch['type']){?>selected<?}?>><?=$body_fatch['type']?></option>
									  <?}?>
                               </select></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Skin Color</td>
							 <td><select id="skin" name="skin" style="width:190px;">
										  <option value="">-- Select Skin Color --</option>
										  <? $skin = "select * from fs_skin_color order by fld_id ASC";
											 $skin_run = q($skin);
											 while($skin_fatch = f($skin_run)){
										  ?> 
										  <option value="<?=$skin_fatch['type']?>" <?if($quer_fatch['skin']==$skin_fatch['type']){?>selected<?}?>><?=$skin_fatch['type']?></option>
										  <?}?>
							   </select></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Shoes Size</td>
							   <td><select id="shoes" name="shoes" style="width:190px;">
												  <option value="">-- Select Shoes Size --</option>
												  <? $shoes = "select * from fs_shoe_size order by fld_id ASC";
													 $shoes_run = q($shoes);
													 while($shoes_fatch = f($shoes_run)){
												  ?> 
												  <option value="<?=$shoes_fatch['type']?>" <?if($quer_fatch['shoes']==$shoes_fatch['type']){?>selected<?}?> ><?=$shoes_fatch['type']?></option>
												  <?}?>
									   </select></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Dress Size</td>
							   <td><select id="dress" name="dress" style="width:190px;">
								  <option value="">-- Select Dress Size --</option>
								  <? $dress = "select * from fs_dress_size order by fld_id ASC";
									 $dress_run = q($dress);
									 while($dress_fatch = f($dress_run)){
								  ?> 
								  <option value="<?=$dress_fatch['type']?>" <?if($quer_fatch['dress']==$dress_fatch['type']){?>selected<?}?>><?=$dress_fatch['type']?></option>
								  <?}?>
					   </select></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td class="text_heading" align="left">Look Like</td>
							<td><input class="input" name="look" value="<?=$quer_fatch['look']?>" type="text" id="look" size="30" ></td>
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