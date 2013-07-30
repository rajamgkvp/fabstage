<?php
include('../constants.php');


if(isset($_GET['countryCode'])){

	$fcid = $_GET['countryCode'];

	$sql_duplicate = "select * from  fs_sub_category where category_id='".$fcid."' ORDER by sub_category ASC";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){
		echo "obj.options[obj.options.length] = new Option('-- All Sub Category --','0');\n";
	}else{

		
		while($rows = f($res_duplicate)){
			echo "obj.options[obj.options.length] = new Option('".$rows['sub_category']."','".$rows['fld_id']."');\n";
		}
	}
}


?>