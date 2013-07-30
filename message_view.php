<?php
include('constants.php');
   $query = "update fs_message set talent_status=2 where  (sender_id='".$_SESSION['fab_id']."' OR sender_id='".$_REQUEST['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$_REQUEST['company_id']."') AND job_id = '".$_REQUEST['job_id']."' "; 
	$query_run = q($query);

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
	   </div>  
		<?php
		  $title_query11 = q("SELECT * FROM  fs_message WHERE (sender_id='".$_SESSION['fab_id']."' OR sender_id='".$_REQUEST['company_id']."') AND (receiver_id='".$_SESSION['fab_id']."' OR receiver_id='".$_REQUEST['company_id']."') AND job_id = '".$_REQUEST['job_id']."' order by fld_id DESC ");
		?>
		<table width="100%"  border="0" align="center" cellspacing="0" cellpadding="0">
			 <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			 <? while($quer_fatch = f($title_query11)){?>
			   <tr>
					<?if($quer_fatch['sender_id']==$_SESSION['fab_id']){?>
					<td class="text_heading">Company &raquo;</td>
					<?}else{?>
					 <td class="text_heading">You &raquo;</td>
					<?}?>
					<td ><?=$quer_fatch['message']?></td>
					<td class="text_heading"><?=$quer_fatch['time']?></td>
				  </tr>
			  <?}?>
		</table>
	 </body>
	</html>