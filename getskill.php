<?php
include('constants.php');
/*if(isset($_GET['countryCode'])){
  
  switch($_GET['countryCode']){
    
    case "no":
      echo "obj.options[obj.options.length] = new Option('Bergen','1');\n";
      echo "obj.options[obj.options.length] = new Option('Haugesund','2');\n";
      echo "obj.options[obj.options.length] = new Option('Oslo','3');\n";
      echo "obj.options[obj.options.length] = new Option('Stavanger','4');\n";
      
      break;
    case "dk":
      
      echo "obj.options[obj.options.length] = new Option('Aalborg','11');\n";
      echo "obj.options[obj.options.length] = new Option('Copenhagen','12');\n";
      echo "obj.options[obj.options.length] = new Option('Odense','13');\n";
      
      break;
    case "us":
      
      echo "obj.options[obj.options.length] = new Option('Atlanta','21');\n";
      echo "obj.options[obj.options.length] = new Option('Chicago','22');\n";
      echo "obj.options[obj.options.length] = new Option('Denver','23');\n";
      echo "obj.options[obj.options.length] = new Option('Los Angeles','24');\n";
      echo "obj.options[obj.options.length] = new Option('New York','25');\n";
      echo "obj.options[obj.options.length] = new Option('San Fransisco','26');\n";
      echo "obj.options[obj.options.length] = new Option('Seattle','27');\n";
      
      break;
  }  
}*/









if(isset($_GET['countryCode'])){






	$fcid = $_GET['countryCode'];

	 if($fcid==2){

	 $sql_duplicate = "select * from fs_company_category order by category_name asc";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	
		while($rows = f($res_duplicate)){
		
		//echo "obj.options[obj.options.length] = new Option('------------------------------','');\n";
			
			
		//	echo "obj.options[obj.options.length] = new Option('".$rows['category_name']."','".$rows['category_name']."');\n";
				
			
				
			//	echo "obj.options[obj.options.length] = new Option('------------------------------','');\n";
				  
				  
				  $sql_a = "select * from fs_company_sub_category where category_id = '".$rows['fld_id']."' order by sub_category asc";

				   $sql_run_a = q($sql_a);
				            while($fatch_a =  f($sql_run_a)){

			echo "obj.options[obj.options.length] = new Option('".$fatch_a['sub_category']."','".$fatch_a['sub_category']."');\n";



							}
				  	

		}


} else{



	$sql_duplicate = "select * from fs_category order by category_name asc";
	$res_duplicate = q($sql_duplicate);
	$count = nr($res_duplicate);
	
		while($rows = f($res_duplicate)){
		
		//echo "obj.options[obj.options.length] = new Option('------------------------------','');\n";
			
			
			//echo "obj.options[obj.options.length] = new Option('".$rows['category_name']."','".$rows['category_name']."');\n";
				
			
				
				//echo "obj.options[obj.options.length] = new Option('------------------------------','');\n";
				  
				  
				  $sql_a = "select * from fs_sub_category where category_id = '".$rows['fld_id']."' order by sub_category asc";

				   $sql_run_a = q($sql_a);
				            while($fatch_a =  f($sql_run_a)){

			echo "obj.options[obj.options.length] = new Option('".$fatch_a['sub_category']."','".$fatch_a['sub_category']."');\n";



							}
				  	

		}
	






}







}


?>