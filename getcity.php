<script>
  alert('roiht');
</script>
<?php
//include("constants.php");

echo "obj.options[obj.options.length] = new Option('-- Select State --','');\n"; 
	 
 /*
if(isset($_GET['stateCode'])){

	 $fcid = $_GET['stateCode'];
	
	
	
	
	
	$sql_duplicate = "SELECT * FROM fs_ind_city WHERE city_id=".$fcid." ORDER BY city_name";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	if($count == 0){
		echo "obj.options[obj.options.length] = new Option('-- No City Available Select Other --','');\n";
		echo "obj.options[obj.options.length] = new Option('Other','other');\n";
	}else{

		echo "obj.options[obj.options.length] = new Option('-- Select City --','');\n";
		while($rows = f($res_duplicate)){
			
			echo "obj.options[obj.options.length] = new Option('".$rows['city_name']."','".$rows['fld_id']."');\n";
		}
		echo "obj.options[obj.options.length] = new Option('Other','other');\n";

	}
}  */

?>