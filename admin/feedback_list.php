<script language="javascript">

//DELETE USER
function archive_order(id){
	if(confirm('Are you sure to Delete this Feedback?'))
	window.location.href='del_feedback.php?id='+id;
}

function block_vedio(id){
			if(confirm('Are you sure to make Block this Feedback?')){
				window.location.href='block_feedback.php?id='+id;
			}
		}
//BLOCK THE USER VEDIO
		function un_block_vedio(id){
				if(confirm('Are you sure to Un Block this Feedback?')){
				window.location.href='un_block_feedback.php?id='+id;
			}
		} 
</script>


<link href="admin_img/css/template_css.css" rel="stylesheet" type="text/css">

<table class="adminform">
<?
	if(isset($_REQUEST['msg']) && $_REQUEST['msg'] =='del'){
		$msg = ' - Record Deleted Successfully.';
?>
<tr>
    <td colspan="2" width="100%" align="center" class="msg"><?=$msg?></td>
  </tr>
  <?
  }
?>
<?
	if(isset($_REQUEST['msg']) && $_REQUEST['msg'] =='3'){
		$msg = ' - Testimonial Un Published Successfully.';
?>
<tr>
    <td colspan="2" width="100%" align="center" class="msg" style="color: #007900"><?=$msg?></td>
  </tr>
  <?
  }else if(isset($_REQUEST['msg']) && $_REQUEST['msg'] =='2'){
	$msg = ' - Testimonial Published Successfully.';
?>
<tr>
    <td colspan="2" width="100%" align="center" class="msg" style="color: #007900"><?=$msg?></td>
  </tr>
  <?
}
?>
<tr><h2>Feedback List</h2>
<table class="adminlist">
<tr align="right">
	
	<th >Name</th>
	<th >Email</th>
	<th >Contact</th>
	<th >Feedback</th>
	<th >Status</th>
	<th >Edit</th>
	<th >Delete</th>
   </tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM fs_feedback  ORDER BY `fld_id` DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM fs_feedback  ORDER BY `fld_id` DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
	
		$name = $rec_mem['name'];
		$email = $rec_mem['email'];
		$contact = $rec_mem['contact'];
		$feedback = $rec_mem['feedback'];
	?>
	<tr align="right" bgcolor="<?=$color?>">
		
		<td><?=$name?></td>
		<td><?=$email?></td>
		<td><?=$contact?></td>
		<td width="450px"><?=substr($rec_mem['feedback'],5,100)?>...</td> 
		
		  <td>
		 <?if($rec_mem['status1']=='2'){
					
					?>
          <a style="cursor:pointer;" onClick="javascript:block_vedio(<?=$rec_mem['fld_id']?>)"><img src="admin_img/unblock.gif" border="0"></a>
		  <?}else{?>
      
	   <a style="cursor:pointer;" onClick="javascript:un_block_vedio(<?=$rec_mem['fld_id']?>)"> <img src="admin_img/block.gif" border="0"></a>
				<?}	?>
         </td> 
		<td><a href="edit_feedback.php?id=<?=$rec_mem['fld_id']?>" title="Edit Feedback" rel="gb_page_center[600, 350]" style="cursor: pointer;"><U>Edit</U></a></td>
		<td><a style="cursor:pointer; color: #FF0000" onClick="javascript:archive_order(<?=$rec_mem['fld_id']?>)"><U>Delete</U></a></td>
	</tr>
	<?
 		$x++;
	}
	?>
	<? if($page){?>
	<tr>
		<td colspan="7" style="border-top:#cccccc 1px solid; ">&nbsp;<? echo $paging->print_link();?></td>
	</tr>
<?}?>
	<?
}else{
	?>
	<tr align="right">
		<td colspan="6">No Record Found. 
		  </td>
	</tr>
	<?
}
?>	
</table>
<tr><th colspan="3"></th></tr>
</table>
</td>
</tr>
</table>	
