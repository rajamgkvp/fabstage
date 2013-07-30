<? include('constants.php');
   if(isset($_REQUEST['submit'])){
   
   	  $query="UPDATE fs_talent SET column1=value, column2=value2	WHERE some_column=some_value";
	  $run=q($query);
	  

   }


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
	   <a href="http://fs.sitebysite.us/talent_step-2.php" class="text">Second Step <span>&raquo;</span></a>  
	   <a href="http://fs.sitebysite.us/talent_step3.php" class="text">Third Step <span>&raquo;</span></a> 
	   <a href="http://fs.sitebysite.us/talent_step4.php" class="text">Fourth Step <span>&raquo;</span></a> 
	   <a href="" class="text">Fifth Step <span>&raquo;</span></a> 
	   <a href="" class="text">Sixth Step </a>
	   </div>
		<form name="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
         <?
			$sql = "SELECT * FROM fs_category order by category_name ASC";
				$res = q($sql);	
					while($fatch = f($res)){  ?>
							 <table width="100%"  border="0" align="center" cellspacing="0" cellpadding="0">
									  <tr>
											<td class="text_heading" align="left"><?=$fatch['category_name']?>  </td>
											
										 </tr>
										
							   </table>
							   
							   <table width="100%"  border="0" align="center" cellspacing="0" cellpadding="0">
									
									  <tr align="center">  
										  <?
											     $i=0;
											     $sql1 = "SELECT * FROM fs_sub_category where category_id ='".$fatch['fld_id']."'   order by sub_category ASC";
											     $res1 = q($sql1);	
											     while($fatch1 = f($res1)){ 
												   if($i%4==0){
											    ?>
													 </tr><tr>
												<?}?>
											     <td width="200" align="left" style="font-size:13px; padding-top:5px;"><input type="checkbox" name="cat<?=$i?>" id="cat<?=$i?>" value="<?=$fatch1['fld_id']?>"><?=$fatch1['sub_category']?> </td>

											  <?$i=$i+1; }?>

										 </tr>
										  <tr>
											<td >&nbsp;</td>
											<td >&nbsp;</td>
										  </tr>

									   <tr>
											<td class="text_heading" align="left">Other Skill 1</td>
											<td><input class="input" name="other1" value="" type="text" id="other1"  ></td>
									   </tr>
									   <tr>
											<td >&nbsp;</td>
											<td >&nbsp;</td>
									   </tr>
									   <tr>
											<td class="text_heading" align="left">Other Skill 2</td>
											<td><input class="input" name="other2" value="" type="text" id="other2"  ></td>
									   </tr>
									   <tr>
											<td >&nbsp;</td>
											<td >&nbsp;</td>
									   </tr>
									
									   <tr>
											<td class="text_heading" align="left">Other Skill 3</td>
											<td><input class="input" name="other3" value="" type="text" id="other3"  ></td>
									   </tr>
									<tr>
										<td >&nbsp;</td>
										<td >&nbsp;</td>
									 </tr>
									 <tr>
											<td class="text_heading" align="left">Other Skill 4</td>
											<td><input class="input" name="other4" value="" type="text" id="other4"  ></td>
									</tr>




									  <tr><td colspan="4"><div class="border"></div></td></tr>
							   </table>


						   
						   	 <?}?>

						






						  <table width="55%" border="0" align="left" cellspacing="0" cellpadding="0">
							  <tr>
							  <br><br>
						        <td width="12%"><input type="submit" id="submit" name="submit" value="Continue" class="button"></td>
								 <td width="88%"><input type="button" id="bt1" name="bt1" value="Skeep" class="button"></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
						  </table>

					   
		 </form>
	 </body>
	 </html>