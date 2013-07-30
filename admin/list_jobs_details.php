<?include_once('../constants.php');?>
<script language="javascript">

//DELETE USER
function delete_news(id){
	if(confirm('Are you sure to delete this Jobs details'))
	window.location.href='delete_job_details.php?id='+id+'&pro_id=<?=$_REQUEST['id']?>';
}

//EDIT USER
function edit_news(id){
	winparam = 'width=900,height=500,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
	window.open('edit_jobs_details.php?id='+id,'',winparam);
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
	<th>Job Type</th>
	<th>Wages</th>
	<th>Wages Type</th>
	<th>Work Location</th>
	<th>Experience</th>

	<th>Added On</th>	
	<!-- <th>Details</th> -->
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM fs_job_details where job_id = '".$_REQUEST['id']."'   ORDER BY `fld_id` DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM fs_job_details where job_id = '".$_REQUEST['id']."'  ORDER BY `fld_id` DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		$jobs_type = $rec_mem['job_type'];
		$wages = $rec_mem['wages'];
			

		$wages_type = $rec_mem['wages_type'];
		

		$work_location = $rec_mem['work_location'];
		$experience = $rec_mem['experience'];
		$added_on = $rec_mem['added_on'];
	?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$jobs_type?> </td>
		<td><?=$wages?></td>
		<td><?=$wages_type?></td>
		<td><?=$work_location?></td>
		<td><?=$experience?></td>

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
