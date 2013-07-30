<?php
include('constants.php');
if(isset($_GET['countryCode'])){
	$fcid = $_GET['countryCode'];

	$sql_duplicate = "SELECT * FROM  fs_state WHERE cid='".$fcid."' ORDER BY state";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){
		echo "obj.options[obj.options.length] = new Option('-- All State --','0');\n";
	}else{
		echo "obj.options[obj.options.length] = new Option('-- Select State --','');\n";
		while($rows = f($res_duplicate)){
			echo "obj.options[obj.options.length] = new Option('".$rows['state']."','".$rows['fld_id']."');\n";
		}
	}
}
?>