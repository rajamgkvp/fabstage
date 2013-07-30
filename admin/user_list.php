<script type="text/javascript">
	var GB_ROOT_DIR = "greybox/";
</script>

<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />

<script language="javascript">

//DELETE USER
function delete_user(id){
	if(confirm('Are you sure to delete this Admin User'))
	window.location.href='delete_user.php?id='+id;
}

//EDIT USER
function edit_user(id){
	winparam = 'width=500,height=500,scrollbars=1,left=100,top=100,screenX=100,screenY=100';
	window.open('edit_user.php?id='+id,'',winparam);
}
</script>

<link href="admin_img/css/template_css.css" rel="stylesheet" type="text/css">
<p><h3>Add Admin User <a href="add_user.php" title="Add Admin User" rel="gb_page_center[500, 500]" style="cursor: pointer;">Click Here</a></h3></p>

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

<tr><h2>Admin Users List</h2>
<table class="adminlist">
<tr align="right">
	<th>First Name</th>
	<th>Last Name</th>
	<th>User Name</th>
	<th>Password</th>
	<th>Email</th>
	<th>Active</th>	
	<th>Access Level</th>	
	<th>Added On</th>	
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM `fs_admin` ORDER BY `fld_id` DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM `fs_admin` ORDER BY `fld_id` DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		$fld_fname = $rec_mem['fld_fname'];
		$fld_lname = $rec_mem['fld_lname'];
		$fld_username = $rec_mem['fld_username'];
		$fld_password = $rec_mem['fld_password'];
		$fld_email = $rec_mem['fld_email'];
		$fld_active = $rec_mem['fld_active'];
		$fld_user_level = $rec_mem['fld_user_level'];
		$fld_addedon = $rec_mem['fld_addedon'];
		$active =getActive($fld_active);
		$level = getLevel($fld_user_level);
	?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$fld_fname?> </td>
		<td><?=$fld_lname?></td>
		<td><?=$fld_username?></td>
		<td><?=$fld_password?></td>
		<td><?=$fld_email?></td>
		<td><?=$active?></td>
		<td><?=$level?></td>
		<td><?=$fld_addedon?></td>
		<td><a href="edit_user.php?id=<?=$rec_mem['fld_id']?>" title="Edit Admin User" rel="gb_page_center[500, 500]" style="cursor: pointer;">
		<img src="admin_img/edit.png" border="0"></a></td>
		<td><a href="#" onClick="javascript:delete_user(<?=$rec_mem['fld_id']?>)"><img src="admin_img/delete.png" border="0"></a></td>
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
