<?php
/*include('chk_session_admin.php');*/
?>

<script language="javascript">

	//DELETE USER
	function delete_user(id){
		if(confirm('Are you sure to delete this Detail'))
		window.location.href='del_help_list.php?id='+id;
	}

	//EDIT USER
	function edit_user(id){
		winparam = 'width=850,height=650,scrollbars=1,left=300,top=100,screenX=100,screenY=100';
		window.open('edit_help_list.php?id='+id,'',winparam);
	}
	//EDIT USER
	function view_details(id){
		winparam = 'width=850,height=650,scrollbars=1,left=300,top=100,screenX=100,screenY=100';
		window.open('view_help.php?id='+id,'',winparam);
	}

</script>

<link href="admin_img/css/template_css.css" rel="stylesheet" type="text/css">
<p><h3>Add Question/Answer  <a href="main.php?page_id=fs_help">Click Here</a></h3></p>

<table class="adminform" width="100%">
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
 <tr><h2>Question/Answer Listing</h2>
	<table class="adminlist">
		<tr align="right">
			<th width="35%">Questions</th>
			<!-- <th width="20%">Topic</th> -->
			<th width="30%">Answers</th>
			<th width="5%">Details</th>
			<th width="12%">Added on</th>
			<th width="5%">Edit</th>
			<th width="5%">Delete</th>
		</tr>
<?php
include_once('paging_class.php'); 
$comm=q("SELECT * FROM fs_help ORDER BY `fld_id` DESC");
if(nr($comm) > 0) {
$paging=new paging(25,5);
$paging->query("SELECT * FROM fs_help ORDER BY `fld_id` DESC");
$page=$paging->print_info();
	$x=1;
	while($rec_mem=$paging->result_assoc()) {
	 	$color = $x%2==0?'#E9F3F3':'#FFFFEA';
		$title = $rec_mem['question'];
		$title1=$rec_mem['answer'];
		
		$added_on = $rec_mem['added_on'];

		

	?>
	<tr align="right" bgcolor="<?=$color?>">
		<td><?=$title?> </td>
		<td><?=$title1?></td>
		
		<td> 
			<a style="cursor:pointer" onClick="javascript:view_details(<?=$rec_mem['fld_id']?>)">
				<b>Details</b>
			</a>
		</td>
		<td><?=$added_on?></td>
		<td><a style="cursor:pointer" onClick="javascript:edit_user(<?=$rec_mem['fld_id']?>)"><img src="admin_img/edit.png" border="0"></a></td>
		<td><a style="cursor:pointer" onClick="javascript:delete_user(<?=$rec_mem['fld_id']?>)"><img src="admin_img/delete.png" border="0"></a></td>
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
	<?}?>
</table>
<tr><th colspan="3"></th></tr>
</table>
</td>
</tr>
</table>