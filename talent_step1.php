<? 
include('constants.php');

if(isset($_REQUEST['submit'])){
   		        
				
				   for($j=0;$j<count($_REQUEST['cat']);$j++)
                       {
					   $check_val.=",";
                       $check_val.= $_REQUEST['cat'][$j];
                      // $check_val.=",";
                       }
					if($check_val!="") {
					    
						   $query1 = "select * from fs_talent where member_id='".$_SESSION['fab_id']."'";
						   $run1 = q($query1);
						   $count1 = nr($run1);
						   if($count1!=0){
						   	   $query = "update fs_talent SET 
							   main_skill='".$check_val."',
							   other1 = '".$_REQUEST['other1']."',
							   other2 =	'".$_REQUEST['other2']."',
							   other3 =	'".$_REQUEST['other3']."', 
							   other4 =	'".$_REQUEST['other4']."'
							   where  member_id =  '".$_SESSION['fab_id']."'";
							   $run=q($query);
						   }else{

					$query = "insert into fs_talent(member_id, 	main_skill,other1,other2,other3,other4,added_on)values('".$_SESSION['fab_id']."','".$check_val."','".$_REQUEST['other1']."','".$_REQUEST['other2']."','".$_REQUEST['other3']."','".$_REQUEST['other4']."','".date('Y-m-d h:i:s')."')";

	                $run=q($query);
					}

					

					if($run){
					   header('Location: http://fs.sitebysite.us/talent_step2.php');
					}


			}
			
			
			
			
			
			else{
			   $msg = "Please select at least one skill.";
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
         							   <table>
		 	                             <tr>
											<td >&nbsp;</td>
											<td >&nbsp;</td>
										  </tr>
		 								</table>
		 
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
											     <td width="200" align="left" style="font-size:13px; padding-top:5px;"><input type="checkbox" name="cat[]" id="cat[]" value="<?=$fatch1['sub_category']?>"<?if(strpos($quer_fatch['main_skill'],$fatch1['sub_category'])){?>checked<?}?>><?=$fatch1['sub_category']?> </td>

											  <?$i=$i+1; }?>

										 </tr>
										 




									  <tr><td colspan="4"><div class="border"></div></td></tr>
							   </table>


						   
						   	 <?}?>

						
									<table width="100%"  border="0" align="center" cellspacing="0" cellpadding="0">
							           <tr>
											<td >&nbsp;</td>
											<td >&nbsp;</td>
										  </tr>

									   <tr>
											<td class="text_heading" align="left">Other Skill 1</td>
											<td><input class="input" name="other1" value="<?=$quer_fatch['other1']?>" type="text" id="other1"  ></td>
									   </tr>
									   <tr>
											<td >&nbsp;</td>
											<td >&nbsp;</td>
									   </tr>
									   <tr>
											<td class="text_heading" align="left">Other Skill 2</td>
											<td><input class="input" name="other2" value="<?=$quer_fatch['other2']?>" type="text" id="other2"  ></td>
									   </tr>
									   <tr>
											<td >&nbsp;</td>
											<td >&nbsp;</td>
									   </tr>
									
									   <tr>
											<td class="text_heading" align="left">Other Skill 3</td>
											<td><input class="input" name="other3" value="<?=$quer_fatch['other3']?>" type="text" id="other3"  ></td>
									   </tr>
									<tr>
										<td >&nbsp;</td>
										<td >&nbsp;</td>
									 </tr>
									 <tr>
											<td class="text_heading" align="left">Other Skill 4</td>
											<td><input class="input" name="other4" value="<?=$quer_fatch['other4']?>" type="text" id="other4"  ></td>
									</tr>
								</table>



						  <table width="55%" border="0" align="left" cellspacing="0" cellpadding="0">
							  <tr>
							  <br><br>
						        <td width="12%"><input type="submit" id="submit" name="submit" value="Continue" class="button"></td>
								 <!-- <td width="88%"><input type="button" id="bt1" name="bt1" value="Skip" class="button"></td> -->
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
						  </table>

					   
		 </form>
	 </body>
	 </html>