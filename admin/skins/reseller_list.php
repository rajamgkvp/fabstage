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
	if(confirm('Are you sure to delete this Reseller?'))
	window.location.href='delete_reseller.php?id='+id;
}

//EDIT USER
function edit_user(id){
	winparam = 'width=500,height=500,scrollbars=1,left=100,top=100,screenX=100,screenY=100';
	window.open('edit_user.php?id='+id,'',winparam);
}
</script>

<link href="admin_img/css/template_css.css" rel="stylesheet" type="text/css">
<p><h3>Add Reseller <a href="add_reseller.php" title="Add Reseller" rel="gb_page_center[500, 500]" style="cursor: pointer;">Click Here</a></h3></p>

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

<tr><h2>Reseller List</h2>
<table class="adminlist">
<tr align="right">
<th>Reseller Name</th>
	<th>Login</th>
	<th>Reseller Link</th>
	<th>Website</th>
	<th>Sales</th>	
	<th>Added On</th>	
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?
include_once('paging_class.php'); 
$comm=q("SELECT * FROM tbl_reseller ORDER BY fld_reseller_id DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM tbl_reseller ORDER BY fld_reseller_id DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		$fld_reseller_id  = $rec_mem['fld_reseller_id'];
		$fld_reseller_name  = $rec_mem['fld_reseller_name'];
		$fld_reseller_username  = $rec_mem['fld_reseller_username'];
		$fld_reseller_pass  = $rec_mem['fld_reseller_pass'];
		$fld_password = $rec_mem['fld_password'];
		$fld_photo  = $rec_mem['fld_photo'];
		$fld_reseller_email  = $rec_mem['fld_reseller_email'];
		$fld_reseller_website  = $rec_mem['fld_reseller_website'];
		$fld_reseller_phone  = $rec_mem['fld_reseller_phone'];
		$fld_reseller_address   = $rec_mem['fld_reseller_address'];
		$fld_reseller_comm    = $rec_mem['fld_reseller_comm'];
		$fld_reseller_regdate     = $rec_mem['fld_reseller_regdate'];
	?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$fld_reseller_name?> </td>
		<td><?=$fld_reseller_username?><br><?=$fld_reseller_pass?></td>

		<td><B>Link: </B><a target=_blank href="http://www.ecombined.co.uk/your_quote.php?type=1&rid=<?=$fld_reseller_id?>">
		http://www.ecombined.co.uk/your_quote.php?type=1&rid=<?=$fld_reseller_id?></a><br><br><img src="images/resellerPhoto/<?=$fld_photo?>" width="100px" height="60px"></td>
		<td><?=$fld_reseller_website?><br><B>Email: </B><?=$fld_reseller_email?><br><B>Phone: </B><?=$fld_reseller_phone?></td>
		<td>0</td>
		<td><?=$fld_reseller_regdate?></td>
		<td><a href="edit_reseller.php?id=<?=$rec_mem['fld_reseller_id']?>" title="Edit Reseller" rel="gb_page_center[500, 500]" style="cursor: pointer;">
		<img src="admin_img/edit.png" border="0"></a></td>
		<td><a href="#" onClick="javascript:delete_user(<?=$rec_mem['fld_reseller_id']?>)"><img src="admin_img/delete.png" border="0"></a></td>
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
