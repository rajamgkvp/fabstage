<?php
include('constants.php');
$pno = $_REQUEST['pno'];

  $query = "select * from fs_mamber where email = '".$pno."'";
  $run = q($query);
  $nr = nr($run);

  if($pno!=''){
if($nr==0){
echo '<a style="color:green;"> Email is Available</a>';
}else{
echo '<a style="color:red;">Email is Not Available</a>';
}}
?>