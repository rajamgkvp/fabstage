
<?
    error_reporting(0);
    include('constants.php');
	$file = $_REQUEST['source']; 
	$newfile = $_REQUEST['dest'];
	if (!copy($file, $newfile)) { 

	//echo "failed to copy $file...\n"; 
	 
  
   $select = "select * from fs_company_project_portfolio where fld_id='".$_REQUEST['fld_id']."'";
   $select_q = q($select);
   $fatch = f($select_q);
    
	 $select_j = "select * from fs_company_project where fld_id = '".$fatch['project_id']."'" ;
	 $sel = q($select_j);
	 $fat = f($sel);


   $insert = "insert into fs_company_portfolio(company_id,skill,portfolio_data,added_on)values('".$_SESSION['fab_id']."','".$fat['skill']."','".$fatch['portfolio_data']."','".date('Y-m-d h:i:s')."')";

   $insert_data = q($insert);

}
?>

<script language="javascript">
	window.location.href="company_project_details.php?id=<?=$_REQUEST['id']?>";
</script>