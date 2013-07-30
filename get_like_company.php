<?
include('constants.php');

$company_id=$_REQUEST['tid'];

if($_REQUEST['id1']==1){

$sql="select * from fs_company_likes where company_id='".$company_id."' ";
$res=q($sql);
$row=f($res);
$count=nr($res);
$value2=$row['counter'];
if($count==0){

$sql1 ="INSERT INTO fs_company_likes (
						company_id,
						counter,
						added_on
						) VALUES (
						'".$company_id."',
						'1',
						'".date('Y-m-d h:m:s')."'
						)";

						$res1=q($sql1);

						$counter='1';
						
	
}else{

	
$value1= $value2+1;
$sqlu="update fs_company_likes set counter='".$value1."' where company_id='".$company_id."' ";
$resu=q($sqlu);

$sql_f="select * from fs_company_likes where company_id='".$company_id."' ";
$res_f=q($sql_f);
$count_f=nr($res_f);
$row_f=f($res_f);
$counter=$row_f['counter'];

}

}
echo $counter;
?>