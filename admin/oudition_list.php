<script language="javascript">

//DELETE USER
function delete_news(id){
	if(confirm('Are you sure to delete this Oudition'))
	window.location.href='delete_oudition.php?id='+id;
}

//EDIT USER
function edit_news(id){
	winparam = 'width=900,height=600,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
	window.open('edit_news.php?id='+id,'',winparam);
}

//EDIT USER
function view(id){
	winparam = 'width=700,height=600,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
	window.open('oudition_details.php?id='+id,'',winparam);
}
</script>

<link href="admin_img/css/template_css.css" rel="stylesheet" type="text/css">
<p><h3>Add Audition <a href="add_oudition.php" title="Add Oudition" rel="gb_page_center[540, 520]" style="cursor: pointer;">Click Here</a></h3></p>

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

<tr><h2>Audition List</h2>
<table class="adminlist">
<tr align="right">
	
	<th>Audition Title</th>
	<th>Company Name</th>
	<th>Description</th>
	<th>Added On</th>	
	<th>Details</th>
	<th>Audition Details</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM fs_oudition ORDER BY `fld_id` DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM fs_oudition ORDER BY `fld_id` DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		
		$title = $rec_mem['title'];
		$company = $rec_mem['company_id'];
			$query3 = "SELECT * FROM fs_mamber where fld_id ='".$company."' ";
			$run3 = q($query3);
			$fatch3 = f($run3);
		$company_name = $fatch3['name'];


		$description = $rec_mem['description'];
		$added_on = $rec_mem['added_on'];
	?>
	<tr align="right" bgcolor="<?=$color?>">
		
		<td><?=$title?></td>
		<td><?=$company_name?></td>
		<td><?=substr($description,0,100)?>...</td>
		<td><?=$added_on?></td>
		<td><a href="oudition_details.php?id=<?=$rec_mem['fld_id']?>" title="Audition Details" rel="gb_page_center[540, 520]" style="cursor: pointer;"><U>View Details</U></a></td>

		 <td>
		
		<a href="add_oudition_details.php?id=<?=$rec_mem['fld_id']?>" title="Add Audition Details" rel="gb_page_center[900, 600]" style="cursor: pointer;"><U>Add Audition Details</U></a>	<br>
		<a href="oudition_details_list.php?id=<?=$rec_mem['fld_id']?>" title="Audition Details List" rel="gb_page_center[1300, 600]" style="cursor: pointer;"><U>Audition Details List</U></a>

		</td>

		<td><a href="edit_oudition.php?id=<?=$rec_mem['fld_id']?>" title="Edit Audition" rel="gb_page_center[600, 400]" style="cursor: pointer;"><img src="admin_img/edit.png" border="0"></a></td>
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
