<script language="javascript">

//DELETE USER
function delete_news(id){
	if(confirm('Are you sure to delete this Jobs'))
	window.location.href='delete_jobs.php?id='+id;
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
<p><h3>Add Jobs <a href="add_jobs.php" title="Add Jobs" rel="gb_page_center[900, 600]" style="cursor: pointer;">Click Here</a></h3></p>

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

<tr><h2>Jobs List</h2>
<table class="adminlist">
<tr align="right">
	<th>Title</th>
	<th>Company</th>
	<th>Category</th>
	<th>Sub Category</th>
	<th>Web Link</th>
	<th>Expiry Date</th>


	<th>Add Jobs Details</th>
	
	<th>Added On</th>	
	<!-- <th>Details</th> -->
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM fs_job ORDER BY `fld_id` DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM fs_job ORDER BY `fld_id` DESC");
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
		$category = $rec_mem['category'];
			$query = "SELECT * FROM fs_category WHERE fld_id ='".$category."' ";
			$run = q($query);
			$fatch = f($run);
		  $category = $fatch['category_name'];

		$sub_category = $rec_mem['sub_category'];
		$query1 = "SELECT * FROM fs_sub_category WHERE fld_id ='".$sub_category."' ";
			$run1 = q($query1);
			$fatch1 = f($run1);
			$sub_category = $fatch1['sub_category'];


		$web_link = $rec_mem['web_link'];
		$expire_date = $rec_mem['expire_date'];
		$added_on = $rec_mem['added_on'];
	?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$title?> </td>
		<td><?=$company_name?> </td>
		<td><?=$category?></td>
		<td><?=$sub_category?></td>
		<td><?=$web_link?></td>
		<td><?=$expire_date?></td>

	   <td>
		
		<a href="add_jobs_details.php?id=<?=$rec_mem['fld_id']?>" title="Add Job Details" rel="gb_page_center[900, 600]" style="cursor: pointer;"><U>Add Job Details</U></a>	<br>
		<a href="list_jobs_details.php?id=<?=$rec_mem['fld_id']?>" title="Job Details List" rel="gb_page_center[1300, 600]" style="cursor: pointer;"><U>Job Details List</U></a>

		</td>
	


		<td><?=$added_on?></td>
		<!-- <td><a href="view.php?id=<?=$rec_mem['fld_id']?>" title="Company Details" rel="gb_page_center[540, 520]" style="cursor: pointer;"><U>View Details</U></a></td> -->
		<td><a href="edit_jobs.php?id=<?=$rec_mem['fld_id']?>" title="Edit Jobs" rel="gb_page_center[900, 600]" style="cursor: pointer;"><img src="admin_img/edit.png" border="0"></a></td>
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
