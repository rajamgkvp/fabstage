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
	if(confirm('Are you sure to delete this User ?'))
	window.location.href='delete_candidate.php?id='+id;
}

//EDIT USER
function edit_user(id){
	winparam = 'width=500,height=500,scrollbars=1,left=100,top=100,screenX=100,screenY=100';
	window.open('edit_user.php?id='+id,'',winparam);
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

<tr><h2>Users List</h2>
<table class="adminlist">
<tr align="right">
	<th>First Name</th>
	<th>Last Name</th>
	<th>User Name</th>
	<th>Password</th>
	<th>Email</th>
	<th>Added On</th>	
	<th>Delete</th>
</tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM tbl_user ORDER BY `fld_id` DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM tbl_user ORDER BY `fld_id` DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		$fld_fname = $rec_mem['fname'];
		$fld_lname = $rec_mem['lname'];
		$fld_email = $rec_mem['email'];
		$fld_username = $rec_mem['username'];
		$fld_password = $rec_mem['password'];
		$fld_addedon = $rec_mem['added_on'];
		
	?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$fld_fname?> </td>
		<td><?=$fld_lname?></td>
		<td><?=$fld_username?></td>
		<td><?=$fld_password?></td>
		<td><?=$fld_email?></td>
		<td><?=$fld_addedon?></td>
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
