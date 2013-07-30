<?
	if(isset($_REQUEST['submit_x']) && $_REQUEST['submit_x'] !=''){
		print_r($_REQUEST);
	}
?>
<script language="javascript">

//DELETE USER
function delete_pre(id){
	if(confirm('Are you sure to delete this Insure Policy'))
	window.location.href='delete_cust.php?id='+id;
}

//EDIT USER
function view_details(id){
	winparam = 'width=600,height=500,scrollbars=1,left=100,top=100,screenX=100,screenY=100';
	window.open('view_details.php?id='+id,'',winparam);
}

//EDIT USER
function crm(id){
	winparam = 'width=650,height=500,scrollbars=1,left=100,top=100,screenX=100,screenY=100';
	window.open('crm.php?id='+id,'',winparam);
}
</script>

<link href="admin_img/css/template_css.css" rel="stylesheet" type="text/css">
<p><h3>Go to Home <a href="admin_home.php">Click Here</a></h3></p>

<table class="adminform">
<tr>
	<td colspan="2" width="100%">
		<form name="searchForm" id="searchForm" action="" method="POST">
		<table cellpadding="2" cellspacing="2">
			<tr>
				<td><B>Search </B></td>
				<td><input type="text" size="20" name="qstr" id="qstr" value="<?=$_REQUEST['qstr']?>" style="font-family: verdana; border: 1px solid #333333"></td>
				<td>
					<select name="criteria" id="criteria" style="font-family: verdana; border: 1px solid #333333">
						<option value="tifname" <?=$_REQUEST['criteria'] == "tifname"?'Selected':''?>>Customer Name</option>
						<option value="tibname" <?=$_REQUEST['criteria'] == "tibname"?'Selected':''?>>Business Name</option>
					</select>	
				</td>
				<td>
					<input type="image" name="submit" id="submit" src="admin_img/Search.png">
				</td>
			</tr>
		</table>
		</form>
	</td>
</tr>
<?
	if(isset($_REQUEST['msg']) && $_REQUEST['msg'] =='1'){
		$msg = ' - Record Deleted Successfully.';
	?>
	<tr><td colspan="2" width="100%" align="center" class="msg"><?=$msg?></td></tr>
  <?
  }
?>

<tr><h2>Tradesman Insurance List</h2>
<table class="adminlist">
<tr align="right">
	<th>Policy Number</th>
	<th>Business Name</th>
	<th>Contact Name</th>
	<th>Posting Date</th>
	<th>Policy Start Date</th>
	<th>Username</th>
	<th>CRM</th>
	<th>Payment</th>
	<th>Status</th>
	<th>Added On</th>	
	<th>View Details</th>
	<th>Delete</th>
</tr>
<?
include_once('paging_class.php'); 
$comm = q("SELECT * FROM `tbl_policy_order` WHERE order_status = 2  ORDER BY fld_id DESC");
if(nr($comm) > 0)
{
$paging=new paging(25,5);
$paging->query("SELECT * FROM `tbl_policy_order` WHERE order_status = 2  ORDER BY fld_id DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()){	
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		$fld_fname = $rec_mem['turnover'];
		$fld_addedon = explode(' ', $rec_mem['added_on']);
		$added_on = explode('-', $fld_addedon[0]);
?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$rec_mem['order_id']?> </td>
		<td><?=$rec_mem['tibname']==''?'Unspecified':$rec_mem['tibname']?> </td>
		<td><?=$rec_mem['tifname']==''?'Unspecified':$rec_mem['tifname']?> <?=$rec_mem['tisname']==''?'Unspecified':$rec_mem['tisname']?></td>
		<td><?=$added_on[2].'-'.$added_on[1].'-'.$added_on[0]?></td>
		<td><?=$rec_mem['psd']?> </td>
		<td><?=$rec_mem['tiuser']==''?'Unspecified':$rec_mem['tiuser']?></td>
		<td><a style="cursor:pointer" onClick="javascript:crm(<?=$rec_mem['fld_id']?>)"><img src="admin_img/crm.jpg" border="0" title="Go to CRM Section"></a></td>
		<td><?=$rec_mem['payment_status']==1?'<span style="color:red">Not Completed</span>':'<span style="color:green">Completed</span>'?></td>
		<td><?=$rec_mem['order_status']=='1'?'<span style="color:red">Inactive</span>':'<span style="color:green">Active</span>'?></td>
		<td><?=$rec_mem['added_on']?></td>
		<td><a href="sub_section.php?poid=<?=$rec_mem['fld_id']?>&pno=<?=$rec_mem['order_id']?>" style="cursor:pointer" ><img src="admin_img/details.jpg" title="Go to Customer Sub Section" border="0"></td>
		
		<td><a href="#" onClick="javascript:delete_pre(<?=$rec_mem['fld_id']?>)"><img src="admin_img/delete.png" border="0"></a></td>
	</tr>
	<?
 		$x++;
	}
	?>
	</tr><? if($page){?>
		<tr>
			<td colspan="7" style="border-top:#cccccc 1px solid; ">&nbsp;<? echo $paging->print_link();?></td>
			
		</tr>
<?}?>
	<?
}else{
	?>
	<tr align="right">
		<td colspan="4">No Record Found.</td>
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
