<?include_once('../constants.php');?>
<script language="javascript">

//DELETE USER
function delete_news(id){
	if(confirm('Are you sure to delete this Oudition details'))
	window.location.href='delete_oudition_details.php?id='+id+'&pro_id=<?=$_REQUEST['id']?>';
}

//EDIT USER
function edit_news(id){
	winparam = 'width=900,height=500,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
	window.open('edit_oudition_details.php?id='+id,'',winparam);
}

//EDIT USER
function view(id){
	winparam = 'width=700,height=600,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
	window.open('view.php?id='+id,'',winparam);
}
</script>

<link href="admin_img/css/template_css.css" rel="stylesheet" type="text/css">
<!-- <p><h3>Add Jobs <a href="add_jobs.php" title="Add Jobs" rel="gb_page_center[900, 600]" style="cursor: pointer;">Click Here</a></h3></p> -->

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

<tr>
<!-- <h2>Jobs Details List</h2> -->
<table class="adminlist">
<tr align="right">
	<th>Requirement</th>
	<th>Category</th>
	<th>Subcategory</th>
	<th>Job Role</th>
	
	<th>Experience</th>
	<th>Gender</th>
	<th>Added On</th>	
	<!-- <th>Details</th> -->
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM fs_oudition_details where oudition_id = '".$_REQUEST['id']."'   ORDER BY `fld_id` DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM fs_oudition_details where oudition_id = '".$_REQUEST['id']."'  ORDER BY `fld_id` DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		$Requirement = $rec_mem['requirement'];
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

		$job_role = $rec_mem['job_role'];
		$experience = $rec_mem['experience'];
		$gender = $rec_mem['gender'];
		$added_on = $rec_mem['added_on'];
	?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$Requirement?> </td>
		<td><?=$category?></td>


		<td><?=$sub_category?></td>


		<td><?=$job_role?></td>
		<td><?=$experience?></td>
		<td><?=$gender?></td>
		<td><?=$added_on?></td>
	
		<td>
		<a href="#" onClick="javascript:edit_news(<?=$rec_mem['fld_id']?>)"><img src="admin_img/edit.png" border="0"></a>
		</td>

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
