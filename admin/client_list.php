<script language="javascript">

//DELETE USER
function delete_news(id){
	if(confirm('Are you sure to delete this Client'))
	window.location.href='delete_client.php?id='+id;
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
<p><h3>Add Client <a href="add_client.php" title="Add Client" rel="gb_page_center[900, 600]" style="cursor: pointer;">Click Here</a></h3></p>

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

<tr><h2>Client List</h2>
<table class="adminlist">
<tr align="right">
	<th>Client Name</th>
	<th>Email</th>
	<th>Password</th>
	<th>User Name</th>
	<!-- <th>Company Type</th> -->
	<th>Company Name</th>
	<th>Contact Details</th>
	
	<th>Added On</th>	

	<th>Edit</th>
	<th>Delete</th>
</tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM fs_mamber WHERE work_as = 3  ORDER BY `fld_id` DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM fs_mamber WHERE work_as = 3  ORDER BY `fld_id` DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		$ntype = $rec_mem['name'];
		$email = $rec_mem['email'];
		$userName = $rec_mem['user_name'];
		$Password = $rec_mem['password'];

		$qls = "SELECT * FROM fs_client WHERE member_id = '".$rec_mem['fld_id']."' ";
		$run_qls = q($qls);
		$fatch_qls = f($run_qls);
		//$company_type = $fatch_qls['company_type'];
		$company_name = $fatch_qls['company_name'];



		$added_on = $rec_mem['added_on'];
	?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$ntype?> </td>
		<td><?=$email?></td>
		<td><?=$Password?></td>
		<td><?=$userName?></td>
		<!-- <td><?=$company_type?></td> -->
		<td><?=$company_name?></td>

	   <td>
		
		<a href="add_client_contact.php?id=<?=$rec_mem['fld_id']?>" title="Contact Details" rel="gb_page_center[1300, 600]" style="cursor: pointer;"><U>Contect</U></a>

		</td>
	


		<td><?=$added_on?></td>
		
		<td><a href="edit_client.php?id=<?=$rec_mem['fld_id']?>" title="Edit Company" rel="gb_page_center[600, 500]" style="cursor: pointer;"><img src="admin_img/edit.png" border="0"></a></td>
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
