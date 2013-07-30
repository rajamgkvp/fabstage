<script language="javascript">

//DELETE USER
function delete_news(id){
	if(confirm('Are you sure to delete this News'))
	window.location.href='delete_news.php?id='+id;
}

//EDIT USER
function edit_news(id){
	winparam = 'width=900,height=600,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
	window.open('edit_news.php?id='+id,'',winparam);
}

//EDIT USER
function view(id){
	winparam = 'width=700,height=600,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
	window.open('view.php?id='+id,'',winparam);
}
</script>

<link href="admin_img/css/template_css.css" rel="stylesheet" type="text/css">
<p><h3>Add News <a href="add_news.php" title="Add News" rel="gb_page_center[540, 520]" style="cursor: pointer;">Click Here</a></h3></p>

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

<tr><h2>News List</h2>
<table class="adminlist">
<tr align="right">
	<th>News Type</th>
	<th>News Title</th>
	<th>Priority</th>
	<th>Added On</th>	
	<th>Details</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM fs_news ORDER BY `fld_id` DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM fs_news ORDER BY `fld_id` DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		$ntype = $rec_mem['ntype'];
		$psd = $rec_mem['psd'];
		$title = $rec_mem['title'];
		$pro = $rec_mem['pro'];
		$added_on = $rec_mem['added_on'];
	?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$ntype?> </td>
		<td><?=$title?></td>
		<td><?=$pro?></td>
		<td><?=$added_on?></td>
		<td><a href="view.php?id=<?=$rec_mem['fld_id']?>" title="News Details" rel="gb_page_center[540, 520]" style="cursor: pointer;"><U>View Details</U></a></td>
		<td><a href="edit_news.php?id=<?=$rec_mem['fld_id']?>" title="Edit News" rel="gb_page_center[540, 520]" style="cursor: pointer;"><img src="admin_img/edit.png" border="0"></a></td>
		<td><a href="#" onClick="javascript:delete_news(<?=$rec_mem['fld_id']?>)"><img src="admin_img/delete.png" border="0"></a></td>
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
