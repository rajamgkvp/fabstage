<script language="javascript">

//DELETE USER
function delete_count(id){
	if(confirm('Are you sure to delete this Count'))
	window.location.href='delete_count.php?id='+id;
}

//EDIT USER
function edit_count(id){
	winparam = 'width=500,height=500,scrollbars=1,left=100,top=100,screenX=100,screenY=100';
	window.open('edit_count.php?id='+id,'',winparam);
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

<tr><h2>Admin Logs</h2>
<table class="adminlist">
<tr align="right">
	<th>ID</th>
	<th>AP Address</th>
	<th>Login Time</th>
	<th>Logged By</th>	
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM `fs_admin_logs` ORDER BY `fld_id` DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM `fs_admin_logs` ORDER BY `fld_id` DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		$fld_id = $rec_mem['fld_id'];
		$valid_ip = $rec_mem['valid_ip'];
		$login_time = $rec_mem['login_time'];
		$username = $rec_mem['username'];
	?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$fld_id?> </td>
		<td><?=$valid_ip?> </td>
		<td><?=$login_time?></td>
		<td><?=$username?></td>
		<!--<td><a href=# onClick="javascript:edit_count(<?=$rec_mem['fld_id']?>)"><img src="admin_img/edit.ico" border="0"></a></td>
		<td><a href="#" onClick="javascript:delete_count(<?=$rec_mem['fld_id']?>)"><img src="admin_img/delete.png" border="0"></a></td>--><td><a href=# onClick="javascript:alert('Not Allowed...');"><img src="admin_img/edit.png" border="0"></a></td>
		<td><a href="#" onClick="javascript:alert('Not Allowed...');"><img src="admin_img/delete.png" border="0"></a></td>
	</tr>
	<?
 		$x++;
	}
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
