<?
	//GET ACTIVE STATUS
	function getActive($val){
		if($val == 0){
			$msg = "<span style='color:red'><img src='admin_img/off.gif'></span>";
		}else if($val == 1){
			$msg = "<span style='color:#339933'><img src='admin_img/on.gif'></span>";
		}
		return $msg;
	}

		
	//GET ACCESS LEVEL
	function getLevel($val){
		switch ($val) {
			case '1':
				$msg = "Super Admin";	
			break;
			
			case '2':
				$msg = "Admin";	
			break;
				
			case '3':
				$msg = "Limited Access";	
			break;
		}
		return $msg;
	}

	//GET LOCATION
	function getLocation($id){
		$sql = "SELECT * FROM tbl_air_locations Where fld_id = ".$id."";
		$res = q($sql);
		$row = f($res);
		$airloctn = $row['air_locations'];
		return $airloctn;		
	}

	//GET RATING
	function getRating($val){
		switch ($val) {
			case '1':
				$msg = "All";	
			break;
			
			case '2':
				$msg = "Good";	
			break;
				
			case '3':
				$msg = "Very Good";	
			break;
			case '4':
				$msg = "Average";	
			break;
			case '5':
				$msg = "Poor";	
			break;
		}
		return $msg;
	}

	//GET COMPANY
	function getCompany($id){
		$sql = "SELECT company_name FROM company Where fld_id = ".$id." ORDER BY company_name";
		$res = q($sql);
		$row = f($res);
		$cname = $row['company_name'];
		return $cname;
	}

	//GET COUNT
	function getCount($id){
		$sql = "SELECT * FROM tbl_count Where fld_id = ".$id."";
		$res = q($sql);
		$row = f($res);
		$count = $row['count'];
		$cdesc = $row['count_desc'];
		return $count;
	}

	//GET CATEGORY
	function getCategory($id){
		$sql = "SELECT * FROM categories_description Where categories_id = ".$id."";
		$res = q($sql);
		$row = f($res);
		$categories_name = $row['categories_name'];
		return $categories_name;
	}
	
	//GET CATEGORY
	function getComposition($id){
		$sql = "SELECT * FROM tbl_composition Where fld_id = ".$id."";
		$res = q($sql);
		$row = f($res);
		$comp_name = $row['composition_name'];
		return $comp_name;
	}	
	
	//GET LOGISTICS NAME
	function getLogistics($id){
		$sql = "SELECT * FROM logistics Where fld_id = ".$id."";
		$res = q($sql);
		$row = f($res);
		$logistics = $row['logistics_name'];
		return $logistics;
	}
		
	//GET SOURCE NANE
		function getPlace($id){
		$sql = "SELECT * FROM tbl_destination Where fld_id = ".$id."";
		$res = q($sql);
		$row = f($res);
		$destination = $row['destination'];
		return $destination;
	}

	//GET SOURCE NANE
		function getNarration($id){
		$sql = "SELECT * FROM narration Where fld_id = ".$id."";
		$res = q($sql);
		$row = f($res);
		$narration = $row['narration'];
		return $narration;
	}	
	
	//GET SOURCE NANE
	function getCalculation($id){
		$sql = "SELECT * FROM tbl_calculation Where fld_id = ".$id."";
		$res = q($sql);
		$row = f($res);
		$calc = $row['calc'];
		return $calc;		
	}


	
	//DATE ADD //input format: d/m/yyyy
	function dateadd($day,$toadd) {
		$tmp = explode('-',$day);
		$dadate = mktime(0,0,0,$tmp[1],$tmp[0]+($toadd),$tmp[2]);
		return date('d-m-Y',$dadate);
	}

	
	function datediff($interval, $datefrom, $dateto, $using_timestamps = false) {
	/*
	 $interval can be:
	 yyyy - Number of full years
	 q - Number of full quarters
	 m - Number of full months
	 y - Difference between day numbers
	 (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
	 d - Number of full days
	 w - Number of full weekdays
	 ww - Number of full weeks
	 h - Number of full hours
	 n - Number of full minutes
	 s - Number of full seconds (default)
	 */

	 if (!$using_timestamps) {
	 $datefrom = strtotime($datefrom, 0);
	 $dateto = strtotime($dateto, 0);
	 }
	 $difference = $dateto - $datefrom; // Difference in seconds

	 switch($interval) {

	 case 'yyyy': // Number of full years
	  
	 $years_difference = floor($difference / 31536000);
	 if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
	 $years_difference--;
	 }
	 if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
	 $years_difference++;
	 }
	 $datediff = $years_difference;
	 break;
	  
	 case "q": // Number of full quarters
	  
	 $quarters_difference = floor($difference / 8035200);
	 while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
	 $months_difference++;
	 }
	 $quarters_difference--;
	 $datediff = $quarters_difference;
	 break;
	  
	 case "m": // Number of full months
	  
	 $months_difference = floor($difference / 2678400);
	 while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
	 $months_difference++;
	 }
	 $months_difference--;
	 $datediff = $months_difference;
	 break;
	  
	 case 'y': // Difference between day numbers
	  
	 $datediff = date("z", $dateto) - date("z", $datefrom);
	 break;
	  
	 case "d": // Number of full days
	  
	 $datediff = floor($difference / 86400);
	 break;
	  
	 case "w": // Number of full weekdays
	  
	 $days_difference = floor($difference / 86400);
	 $weeks_difference = floor($days_difference / 7); // Complete weeks
	 $first_day = date("w", $datefrom);
	 $days_remainder = floor($days_difference % 7);
	 $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
	 if ($odd_days > 7) { // Sunday
	 $days_remainder--;
	 }
	 if ($odd_days > 6) { // Saturday
	 $days_remainder--;
	 }
	 $datediff = ($weeks_difference * 5) + $days_remainder;
	 break;
	  
	 case "ww": // Number of full weeks
	  
	 $datediff = floor($difference / 604800);
	 break;
	  
	 case "h": // Number of full hours
	  
	 $datediff = floor($difference / 3600);
	 break;
	  
	 case "n": // Number of full minutes
	  
	 $datediff = floor($difference / 60);
	 break;
	  
	 default: // Number of full seconds (default)
	  
	 $datediff = $difference;
	 break;
	 }
	  
	 return $datediff;
 }

 function getCounty($id){
	$sql = "select * from tbl_county where fld_id = '".$id."'";
	$res = q($sql);
	$row = f($res);
	$to = $row['county'];
	return $to;
 }

//GET SOURCE NANE
	function getBType($id){
		$idArr = explode(',',$id);
		foreach($idArr as $ids){
			$sql = "SELECT * FROM tbl_category Where fld_id = ".$ids."";
			$res = q($sql);
			$row = f($res);
			$btStr .= $row['category'].', ';
		}
		$btStr = substr($btStr, 0, -2);
		return $btStr;		
	}
//GET SOURCE NANE
	function getKeyFeature($id){
		
		$idArr = explode(',', $id);
		foreach($idArr as $ids){
			$sql = "SELECT * FROM tbl_keyfeature Where fld_id = ".$ids."";
			$res = q($sql);
			$row = f($res);
			$btStr .= $row['key_feature'].', ';
		}
		$btStr = substr($btStr, 0, -2);
		return $btStr;		
	}

  ?>