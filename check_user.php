<?php
include('constants.php');
$pno = $_REQUEST['pno'];

  $query = "select * from fs_mamber where user_name = '".$pno."'";
  $run = q($query);
  $nr = nr($run);

  if($pno!=''){
if($nr==0){
echo '<a style="color:green;"> User Name Available</a>';
}else{
echo '<a style="color:red;">User Name Not Available</a>';
}}
?>