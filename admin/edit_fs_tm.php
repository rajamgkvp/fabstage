<script language="javascript">

//DELETE USER
function archive_order(id){
	if(confirm('Are you sure to Delete this Testimonial?'))
	window.location.href='delete_fs_tm.php?id='+id;
}

function block_vedio(id){
			if(confirm('Are you sure to make Block this Testimonial?')){
				window.location.href='block_tm.php?id='+id;
			}
		}
//BLOCK THE USER VEDIO
		function un_block_vedio(id){
				if(confirm('Are you sure to Un Block this Testimonial?')){
				window.location.href='un_block_tm.php?id='+id;
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
<tr><h2>Testimonial List</h2>
<table class="adminlist">
<tr align="right">
	<th>ID</th>
	<th>Name</th>
	<th>Email</th>
	<th>Mobile</th>
	<th>Testimonial</th>
	<th>Status</th>
	<th>Edit</th>
	<th>Delete</th>
   </tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM fs_testimonials  ORDER BY `fld_id` DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM fs_testimonials  ORDER BY `fld_id` DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		$fid = $rec_mem['fld_id'];
		$name = $rec_mem['name'];
		$email = $rec_mem['email'];
		$mobile = $rec_mem['mobile'];
	?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$fid?> </td>
		<td><?=$name?></td>
		<td><?=$email?></td>
		<td><?=$mobile?></td>
		<td width="450px"><?=$rec_mem['comment']?></td>
		
		 <td>
		 <?if($rec_mem['status1']=='2'){
					
					?>
          <a style="cursor:pointer;" onClick="javascript:block_vedio(<?=$rec_mem['fld_id']?>)"><img src="admin_img/unblock.gif" border="0"></a>
		  <?}else{?>
      
	   <a style="cursor:pointer;" onClick="javascript:un_block_vedio(<?=$rec_mem['fld_id']?>)"> <img src="admin_img/block.gif" border="0"></a>
				<?}	?>
         </td>
		<td><a href="edit_tm.php?id=<?=$rec_mem['fld_id']?>" title="Edit Testimonial" rel="gb_page_center[600, 350]" style="cursor: pointer;"><U>Edit</U></a></td>
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
