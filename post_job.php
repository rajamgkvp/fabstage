<?php
	include('constants.php');
	include('check_session.php');
	//ADD ADMIN USER
	if(isset($_REQUEST['title']) && $_REQUEST['title'] != '') {
		for($j=0;$j<count($_REQUEST['cat']);$j++) {
		   $check_val.=",";
		   $check_val.= $_REQUEST['cat'][$j];
		  // $check_val.=",";
		}
		//====================
			// YOUR CODE TO HANDLE A SUCCESSFUL VERIFICATION
			if($_REQUEST['othercity']!="other") { 
					$sql_admin = "INSERT INTO fs_job(company_id,title,main_skill, description, interview_venue, interview_date, interview_time,contact_person,contact_number,contact_email,web_link, agencies_applies,expire_date,sponser,interview_country,interview_state,interview_city,added_on)VALUES
					('".$_SESSION['fab_id']."','".$_REQUEST['title']."', '".$check_val."', '".$_REQUEST['description']."', '".$_REQUEST['interview_venue']."', '".$_REQUEST['interview_date']."', '".$_REQUEST['interview_time']."','".$_REQUEST['contact_person']."','".$_REQUEST['contact_number']."', '".$_REQUEST['contact_email']."','".$_REQUEST['web_link']."','".$_REQUEST['agencies_applies']."', '".$_REQUEST['expire_date']."','".$_REQUEST['sponser']."','".$_REQUEST['othercountry']."','".$_REQUEST['otherstate']."','".$_REQUEST['othercity']."',
					'".date('Y-m-d h:m:s')."')";
           $res_admin = q($sql_admin);


		if($res_admin){
			//GET LAST INSERTED ID
			$query = "SELECT LAST_INSERT_ID()";
			$result = q($query);
			if ($result) {
				$row = mysql_fetch_row($result);
				$job_id = $row[0];
				//$_SESSION['job_id'] = $job_id;
				$msg = '-  Submitted Successfully.';
				
			}

			
			//header('Location: job_details.php');	
		}else{
			$msg = '-  Some problem occure please try again.';
		}

          //********************
                     $sql_admin1 = "INSERT INTO fs_job_details(job_id, job_type, wages, wages_type, work_duration, work_duration_type, work_location,gender,experience,language,extra_skill,any_association,association_name,physical_preference,height,weight,bust_chest,waist,hips,ethenicity,eye,hair,body,skin,shoes,dress,look,added_on,updated_on)VALUES('".$job_id."', '".$_REQUEST['job_type']."', '".$_REQUEST['wages']."', '".$_REQUEST['wages_type']."', '".$_REQUEST['work_duration']."', '".$_REQUEST['work_duration_type']."', '".$_REQUEST['work_location']."','".$_REQUEST['gender']."','".$_REQUEST['experience']."','".$_REQUEST['language']."','".$_REQUEST['extra_skill']."','".$_REQUEST['any_association']."', '".$_REQUEST['association_name']."','".$_REQUEST['physical_preference']."','".$_REQUEST['height']."','".$_REQUEST['weight']."','".$_REQUEST['bust_chest']."','".$_REQUEST['waist']."','".$_REQUEST['hips']."','".$_REQUEST['ethenicity']."','".$_REQUEST['eye']."','".$_REQUEST['hair']."','".$_REQUEST['body']."','".$_REQUEST['skin']."','".$_REQUEST['shoes']."','".$_REQUEST['dress']."','".$_REQUEST['look']."','".date('Y-m-d h:m:s')."','".date('Y-m-d h:m:s')."')";

		             $res_admin1 = q($sql_admin1);

		  //********************

			} else {
				$sqli="INSERT INTO fs_ind_city (city_name,city_id)VALUES
					('".$_REQUEST['othercity1']."','".$_REQUEST['otherstate']."')";
					q($sqli);

					//FOR GETTING ALST INSERTED ID
					$lid=mysql_insert_id();

					$sql_admin = "INSERT INTO fs_job(company_id,title,main_skill, description, interview_venue, interview_date, interview_time,contact_person,contact_number,contact_email,web_link, agencies_applies,expire_date,sponser,interview_country,interview_state,interview_city,added_on)VALUES
					('".$_SESSION['fab_id']."','".$_REQUEST['title']."', '".$check_val."', '".$_REQUEST['description']."', '".$_REQUEST['interview_venue']."', '".$_REQUEST['interview_date']."', '".$_REQUEST['interview_time']."','".$_REQUEST['contact_person']."','".$_REQUEST['contact_number']."', '".$_REQUEST['contact_email']."','".$_REQUEST['web_link']."','".$_REQUEST['agencies_applies']."', '".$_REQUEST['expire_date']."','".$_REQUEST['sponser']."','".$_REQUEST['othercountry']."','".$_REQUEST['otherstate']."','".$lid."',
					'".date('Y-m-d h:m:s')."')";
                  $res_admin = q($sql_admin);

				  	if($res_admin){
			//GET LAST INSERTED ID
			$query = "SELECT LAST_INSERT_ID()";
			$result = q($query);
			if ($result) {
				$row = mysql_fetch_row($result);
				$job_id = $row[0];
				//$_SESSION['job_id'] = $job_id;
				$msg = '-  Submitted Successfully.';
				
			    }
			   // header('Location: job_details.php');	
		    }else{
			    $msg = '-  Some problem occure please try again.';
		    }

                   //**********************

                    $sql_admin1 = "INSERT INTO fs_job_details(job_id, job_type, wages, wages_type, work_duration, work_duration_type, work_location,gender,experience,language,extra_skill,any_association,association_name,physical_preference,height,weight,bust_chest,waist,hips,ethenicity,eye,hair,body,skin,shoes,dress,look,added_on,updated_on)VALUES('".$job_id."', '".$_REQUEST['job_type']."', '".$_REQUEST['wages']."', '".$_REQUEST['wages_type']."', '".$_REQUEST['work_duration']."', '".$_REQUEST['work_duration_type']."', '".$_REQUEST['work_location']."','".$_REQUEST['gender']."','".$_REQUEST['experience']."','".$_REQUEST['language']."','".$_REQUEST['extra_skill']."','".$_REQUEST['any_association']."', '".$_REQUEST['association_name']."','".$_REQUEST['physical_preference']."','".$_REQUEST['height']."','".$_REQUEST['weight']."','".$_REQUEST['bust_chest']."','".$_REQUEST['waist']."','".$_REQUEST['hips']."','".$_REQUEST['ethenicity']."','".$_REQUEST['eye']."','".$_REQUEST['hair']."','".$_REQUEST['body']."','".$_REQUEST['skin']."','".$_REQUEST['shoes']."','".$_REQUEST['dress']."','".$_REQUEST['look']."','".date('Y-m-d h:m:s')."','".date('Y-m-d h:m:s')."')";

		         $res_admin1 = q($sql_admin1);
		
				   //*********************


		}
		//====================




		
		
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>FabStage.Com</title>
		<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />
		<script type="text/javascript" src="ajax.js"></script>

<!-- AJAX CODE[COUNTRY,STATE,CITY] -->
	<script type="text/javascript">

	function getXMLHTTP() { 
				//fuction to return the xml http object
				var xmlhttp=false;	
				try{
					xmlhttp=new XMLHttpRequest();
				}
				catch(e) {	
					try{	
						xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
					}
					catch(e){
						try{
							xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
						}
						catch(e1){
							xmlhttp=false;
						}
					}
				}
				return xmlhttp;
				}

 /////////////////////////////////////////////////////////////////////


		var ajax = new Array();
			function getStateList(){
				var countryCode = document.getElementById('othercountry').value;
				//alert(countryCode);
				// Empty city select box
				document.getElementById('otherstate').options.length = 0;
				
				if(countryCode.length>0){
					var index = ajax.length;
					ajax[index] = new sack();

					// Specifying which file to get
					ajax[index].requestFile = 'getstate.php?countryCode='+countryCode;
					
					// Specify function that will be executed after file has been found
					ajax[index].onCompletion = function(){ createstates(index); };

					// Execute AJAX function
					ajax[index].runAJAX();
				}
			}

			function createstates(index){
				var obj = document.getElementById('otherstate');

				// Executing the response from Ajax as Javascript code
				eval(ajax[index].response);
			}
	

   ///////////////////////////////////////////////////////////////

		

			var ajax = new Array();
			function gettest(){
				var countryCode = document.getElementById('otherstate').value;
				//alert(countryCode);
				// Empty city select box
				document.getElementById('othercity').options.length = 0;
				
				if(countryCode.length>0){
					var index = ajax.length;
					ajax[index] = new sack();

					// Specifying which file to get
					ajax[index].requestFile = 'gettest.php?stateCode='+countryCode;
					
					// Specify function that will be executed after file has been found
					ajax[index].onCompletion = function(){ createstates1(index); };

					// Execute AJAX function
					ajax[index].runAJAX();
				}
			}

			function createstates1(index){
				var obj = document.getElementById('othercity');

				// Executing the response from Ajax as Javascript code
				eval(ajax[index].response);
			}
	
  /////////////////////////////////////////////////////////////////////////

			function getform(){
				var strURL='getothercity.php?pno='+encodeURI(document.getElementById('othercity').value);
					//alert(strURL);
					var req = getXMLHTTP();
					if (req) {
						document.getElementById('statuscat1').innerHTML='<img src="../images/ld.gif">';	
						req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "ok"
							if (req.status == 200) {
							//alert(req.responseText);											
							document.getElementById('statuscat1').innerHTML=req.responseText;
							
							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
								}
						}				
						}			
						req.open("GET", strURL, true);
						req.send(null);
					}
			}

 ///////////////////////////////////////////////////////////////////////////////////
		</script>
<!-- AJAX CODE[COUNTRY,STATE,CITY] -->


		<!-- SCRIPT TO VALIDATE CONTROLS -->
		<script>
			function validate() {

				var errText = "";
				var errorflag = false;

				if(document.upload_form.title.value == "") {
					 errText += "- Please Enter Title\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.title.focus();
					 return false;
				}
				var chks = document.getElementsByName('cat[]');
				var hasChecked = false;
				for (var i = 0; i < chks.length; i++) {
					if (chks[i].checked) {
						hasChecked = true;
						break;
					}
				}
				if (hasChecked == false) {
					alert("Please select at least one.");
					return false;
				}
				if(document.upload_form.description.value == "") {
					 errText += "- Please Enter Description\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.description.focus();
					 return false;
				}

				if(document.upload_form.otherstate.value == "")
				{
					alert("Please Select Your State ");
					document.upload_form.otherstate.focus();
					return false;
				}
				
				if(document.upload_form.othercity.value=="")
				{
					alert("Please Select Your City ");
					document.upload_form.othercity.focus();
					return false;
				}
				
				if(document.upload_form.othercity.value=="other")
				{
					if(document.upload_form.othercity.value=="")
				{
					alert("Please Enter Your City In TextBox ");
					document.upload_form.othercity.focus();
					return false;
				}
				}
				if(document.upload_form.interview_venue.value == "") {
					 errText += "- Please Enter Interview Venue\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.interview_venue.focus();
					 return false;
				}
				if(document.upload_form.interview_date.value == "") {
					 errText += "- Please Enter Interview Date\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.interview_date.focus();
					 return false;
				}
				if(document.upload_form.interview_time.value == "") {
					 errText += "- Please Enter Interview Time\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.interview_time.focus();
					 return false;
				}
				if(document.upload_form.contact_person.value == "") {
					 errText += "- Please Enter Contact Person\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.contact_person.focus();
					 return false;
				}
				if(document.upload_form.contact_number.value == "") {
					 errText += "- Please Enter Contact Number\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.contact_number.focus();
					 return false;
				}
				if(document.upload_form.contact_email.value == "") {
					errText = "- Email is left blank\n";
					alert(errText);
					errorflag = true;
					document.upload_form.contact_email.focus();
					return false;
				} else if(document.upload_form.contact_email.value != "") {
					if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(document.upload_form.contact_email.value)) {
						errorflag = false;

					}else{
					errText += "- Email is not valid\n";
					alert(errText);
					errorflag = true;
					document.upload_form.contact_email.focus();
					return false;
					}
				}
				if(document.upload_form.web_link.value == "") {
					 errText += "- Please Enter Web Link\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.web_link.focus();
					 return false;
				}
				if(document.upload_form.expire_date.value == "") {
					 errText += "- Please Enter Expire Date\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.expire_date.focus();
					 return false;
				}
				if(document.upload_form.sponser.value == "") {
					 errText += "- Please Enter Sponser\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.sponser.focus();
					 return false;
				}
				if(document.upload_form.num.value == "") {
					errText = "- Please Enter No Of Position\n";
					alert(errText);
					errorflag = true;
					document.upload_form.num.focus();
					return false;
				} else if(document.upload_form.num.value != "") {
					if (/^\d+$/.test(document.upload_form.num.value)) {
						errorflag = false;

					}else{
					errText += "- No Of Position is only number\n";
					alert(errText);
					errorflag = true;
					document.upload_form.num.focus();
					return false;
					}
				}   
				if(errorflag==true) {
					return false;
				} else {
					return true;
				}
			}
		</script>

		
		
		
		
		
		
		
		
		
		<script>
				 function disable1(){
					 
						 if(document.getElementById('physical_preference').value=='no'){
                              
                               document.getElementById('sss').style.display='none'; 
							   

						 }else{
						 
						       document.getElementById('sss').style.display='block';
						 }
				 
				 
				 }

		</script>


         <script>
				     function job(){
							if(document.getElementById('job_type').value=='regular'){
								  document.getElementById('jjj').style.display='none'; 

							}else{
								 document.getElementById('jjj').style.display='block';
							}
						}

					  function endis(){
									

						if(document.getElementById('any_association').value=='no'){

							document.upload_form.association_name.disabled = true;

						}else{

							document.upload_form.association_name.disabled = false;

						}
					}
      </script>



<style>
.text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:12px;color:#666;font-weight:bold; padding-top:5px; text-transform:capitalize;}

.select_aera{width: 200px;
height: 30px;
float: left;
background: #fff;
border: none;
color: #7e7e7e;
padding: 6px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;}
	 .input_area{width: 190px;
height: 30px;
float: left;
background: #fff;
border: none;
color: #7e7e7e;
padding-left: 10px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;}
	 .input_select{width:180px; height:22px; padding:1px; float:left; border:1px #ccc solid; color:#999; -webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px;}
	 .head_text{width:790px; float:left; line-height:34px;}
	 .head_text a{width:790px; color:#666666; font-weight:bold; float:left; line-height:34px; border-top:1px #ccc solid; border-bottom:1px #ccc solid; background:url(images/down_arrow.png) right 10px no-repeat #e7e7e7; padding-left:10px;}
	 .head_text a:hover{width:790px; color:#666666; font-weight:bold; float:left; line-height:34px; border-top:1px #ccc solid; border-bottom:1px #ccc solid; background:url(images/down_arrow.png) right 10px no-repeat #d5d5d5;}
</style>








</head>

	<body onLoad="getStateList();">
	<?include('left_company_tab.php');?> 
	 
		<div id="main_container">
			<?include('top.php');?> 
			<div>
				<div class="main_body_area">
					<div class="left_area">
					</div>
					<div class="center_body" style="width:800px; background:#e7e7e7; padding:15px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;">
						<form name="upload_form" action="" method="POST" onsubmit="return validate();" autocomplete="off">
							<table width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
                            	<tr>
                                	<td colspan="2" style="font-size:22px; text-align:center; color:#4FBFE3; border-bottom:1px #ccc solid; line-height:35px; font-weight:bold;">Post Job</td>
                                </tr>
                            	
								<tr>
									<td colspan="2" align="center" class="msg">
										<?=$msg?>
									</td>
								</tr>
								<tr>
									<td width="25%">&nbsp;</td>
									<td width="75%">&nbsp;</td>
								</tr>
								
								
								<!-------first form------------>
								<tr>
									<td width="25%" class="text_heading">
										<span class="style1">*</span>&nbsp;<span>Title</span>
									</td>
									<td width="75%">
										<input class="input_area" name="title" type="text" id="title" size="48" style="width:500px;" >
									</td>
								</tr>
								
                                <tr>
                                	<td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>	
                                                                    
                                <tr>
                                    	<td colspan="2" style="font-size:17px; color:#4FBFE3;">Select Required Talent Tyle</td>
                                    </tr>
								
              </table>
							
							
	
						
							
							
							<?php
								$sql = "SELECT * FROM fs_category order by category_name ASC";
								$res = q($sql);
								$k = 0;
								while($fatch = f($res)){ 
									$k = $k+1;
									?>
									<table width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
                                    
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
										
										
										<tr>
											 <td class="head_text" align="left"><a href="#" onclick="javascript:if(document.getElementById('<?="r".$k;?>').style.display=='none'){ document.getElementById('<?="r".$k;?>').style.display='block';
											 
											 while(<?=$y?>){document.getElementById('<?="r".$k+1;?>').style.display='none';
											 <?$y++;?>
											 }
											 
											 
											 }else if(document.getElementById('<?="r".$k;?>').style.display=='block') document.getElementById('<?="r".$k;?>').style.display='none';"><?=$fatch['category_name']?></a>  
											 </td>
										</tr>


									</table>
									
									
								<span id="<?="r".$k;?>" style="display:none;"> 
									<table width="90%"  border="0" align="right" cellspacing="0" cellpadding="0">
									
								
										<tr align="center">  
										<?php
										 $i=0;
										$sql1 = "SELECT * FROM fs_sub_category where category_id ='".$fatch['fld_id']."'   order by sub_category ASC";
										$res1 = q($sql1);
										while($fatch1 = f($res1)){ 
										if($i%4==0){
										?>
										</tr>
                                    

										<tr>
										<?}?>


                                       
											<td width="25%" align="left" style="font-size: 12px; color: #999; padding-top: 5px; font-family: Arial, Helvetica, sans-serif;">
											<input type="checkbox" style="margin-right:5px; float:left;" name="cat[]" id="cat[]" value="<?=$fatch1['sub_category']?>"<?if(strpos($quer_fatch['main_skill'],$fatch1['sub_category'])){?>checked<?}?>><?=$fatch1['sub_category']?> </td>
                                         


											<?$i=$i+1; }?>
										</tr>


										<tr>
											<td colspan="4">
												<div class="border"></div>
											</td>
										</tr>
									</table>
                                  </span>

									<?}?>









									<table width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
										<tr>
											<td width="25%">&nbsp;</td>
											<td width="30%">&nbsp;</td>
											<td width="20%">&nbsp;</td>
											<td width="25%">&nbsp;</td>
											</tr>
										<tr>
										  <td colspan="4" style="font-size:17px; color:#4FBFE3;">Job Details</td>
										  </tr>
                                          
                                          <tr>
					<td width="25%">&nbsp;</td>
					<td width="30%">&nbsp;</td>
                    <td width="20%">&nbsp;</td>
					<td width="30%">&nbsp;</td>
				  </tr>
                  
                  <tr>
					    <td class="text_heading"><span class="style1">*</span>&nbsp;<span>Job Type</span></td>
						<td>
								<select id="job_type" name="job_type" onchange="job();" class="select_aera">
											  <option value="regular">Regular</option>
											  <option value="contractual">Contractual</option>
											
								   </select>
						   </td>
						<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Job Location</span></td>
										<td><input class="input_area" name="work_location" value="" type="text" id="work_location" size="48" ></td>
						</tr>
                  
                  <tr>
										  <td>&nbsp;</td>
										  <td colspan="3" >&nbsp;</td>
										  </tr>


									<tr>
										
                                        <td class="text_heading"><span class="style1">*</span>&nbsp;<span>Experience</span></td>
					<td><input class="input_area" name="experience" value="" type="text" id="experience" size="48" ></td>
                    <td class="text_heading"><span class="style1">*</span>&nbsp;<span>Language Preferance</span></td>
					<td><input class="input_area" name="language" value="" type="text" id="language" size="48" ></td>
									  </tr>
				  
                                          
                                          
										<tr>
										  <td>&nbsp;</td>
										  <td colspan="3" >&nbsp;</td>
										  </tr>
										<tr>
											<td class="text_heading">
												<span class="style1">*</span>&nbsp;<span>Description</span> 
											</td>
											<td colspan="3" >
												 <textarea class="input_area" id="description" name="description" rows="4" cols="38" style="height:110px; width:500px;"></textarea>
											</td>
											</tr>
                                        
                                        


										<!-- Country Database -->
										<tr>
										  <td>&nbsp;</td>
										  <td>&nbsp;</td>
										  <td>&nbsp;</td>
										  <td>&nbsp;</td>
										  </tr>
										<tr>
										  <tr>
										  <td colspan="4" style="font-size:17px; color:#4FBFE3;">Contact & Meeting Details</td>
										  </tr>
										  </tr>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											</tr>
                                        <tr>
										  <td class="text_heading"><span class="style1">*</span>&nbsp;<span>Interview Venue</span></td>
											<td colspan="3"><input class="input_area" name="interview_venue" value="" type="text" id="interview_venue" size="48" style="width:500px;" ></td>
											</tr>
                                        
                                        
                                        <tr>
                                        	<td>&nbsp;</td>
                                          <td colspan="3">
                                            	
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td class="text_heading"><span class="style1">*</span>&nbsp;<span style="line-height:26px;">Interview Country</span></td>
                                                    <td class="text_heading"><span class="style1">*</span>&nbsp;<span style="line-height:26px;">Interview State</span></td>
                                                    <td class="text_heading"><span class="style1">*</span>&nbsp;<span style="line-height:26px;">Interview City</span></td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                    <select name="othercountry" id="othercountry" onchange="getStateList();" style="width:170px;" class="select_aera">
                                                          <option>-- Select Country -- </option>
                                                        <?php
                                                            $data = q('select * from fs_country ORDER BY country_name ASC;');
                                                            while ($row = f($data)){
                                                                $ID = $row['fld_id'];
                                                                if($ID == '81'){
                                                                    $con_name = $row['country_name'];
                                                                    echo'<option value='.$ID.' selected >'.$con_name;
                                                                }else{
                                                                    $con_name = $row['country_name'];
                                                                    echo '<option value='.$ID.'>'.$con_name;
                                                                }
                                                            }
                                                        ?>
                                                        </select>
                                                    </td>
                                                    <td><select name="otherstate" id="otherstate" onchange="gettest();" style="width:170px;" class="select_aera">
											  <option value="">--- Select State ---</option>
											</select></td>
                                                    <td><select name="othercity" id="othercity" onchange="getform();" style="width:170px;" class="select_aera">
											  <option>--- Select City ---</option>
											</select></td>
                                                  </tr>
                                                </table>

                                            	
                                          </td>
                                          </tr>
										
										<tr>
											<td>&nbsp;</td>
											<td><span name="statuscat1" id="statuscat1"></span></td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											</tr>
										

										<!-- Country Database -->

										
										
										<tr>
											<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Interview Date</span></td>
											<td><input class="input_area" name="interview_date" value="" type="text" id="interview_date" size="48" ></td>
											<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Interview Time</span></td>
											<td><input class="input_area" name="interview_time" value="" type="text" id="interview_time" size="48" ></td>
									  </tr>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
									  </tr>
										
										<tr>
											<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Contact Person</span></td>
											<td>
												<input class="input_area" name="contact_person" value="" type="text" id="contact_person" size="48" >
											</td>
											<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Contact Number</span></td>
											<td>
												<input class="input_area" name="contact_number" value="" type="text" id="contact_number" size="48" >
											</td>
									  </tr>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
									  </tr>
										
										<tr>
											<td class="text_heading">
												<span class="style1">*</span>&nbsp;<span>Contact Email</span>
											</td>
											<td>
												<input class="input_area" name="contact_email" value="" type="text" id="contact_email" size="48" >
											</td>
											<td class="text_heading">
												<span class="style1">*</span>&nbsp;<span>Web Link</span>
									    </td>
											<td>
												<input class="input_area" name="web_link" value="" type="text" id="web_link" size="48" >
										  </td>
											</tr>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											</tr>
										
							<!--------first form end------------------->			
										
										
										
										
										
										
										
										
										
										
										
										<!-- 
										<tr>
											<td>
												<span class="style1"></span>&nbsp;<span>Agencies Applies</span>
											</td>
											<td>
												<select id="agencies_applies" name="agencies_applies">
													<option value="no">No</option>
													<option value="yes">Yes</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td>
												<span class="style1">*</span>&nbsp;<span>Expire Date</span>
											</td>
											<td>
												<input class="input" name="expire_date" value="" type="text" id="expire_date" size="48" >
											</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td>
												<span class="style1">*</span>&nbsp;<span>Sponser</span>
											</td>
											<td>
												<input class="input" name="sponser" value="" type="text" id="sponser" size="48" >
											</td>
										</tr> 
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td>
												<span class="style1">*</span>&nbsp;<span>No Of Position</span>
											</td>
											<td>
												<input class="input" name="num" value="" type="text" id="num" size="48" >
											</td>
										</tr> 
 -->

<!---------second form start--------------->





                  <!--<tr>
					    <td class="text_heading"><span class="style1">*</span>&nbsp;<span>Job Type</span></td>
						<td>
								<select id="job_type" name="job_type" onchange="job();" class="select_aera">
											  <option value="regular">Regular</option>
											  <option value="contractual">Contractual</option>
											
								   </select>
						   </td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						</tr>-->
            </table>

          <!--<table id="jjj" style="display:block;" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
               
				  <tr>
					<td width="25%">&nbsp;</td>
					<td width="30%">&nbsp;</td>
                    <td width="20%">&nbsp;</td>
					<td width="30%">&nbsp;</td>
				  </tr>


									<tr>
										<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Job Location</span></td>
										<td><input class="input_area" name="work_location" value="" type="text" id="work_location" size="48" ></td>
                                        <td class="text_heading"><span class="style1">*</span>&nbsp;<span>Experience</span></td>
					<td><input class="input_area" name="experience" value="" type="text" id="experience" size="48" ></td>
									  </tr>
				  
               </table>





			<table  width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">  
				  <tr>
					<td width="25%">&nbsp;</td>
					<td width="75%">&nbsp;</td>
				  </tr>


				  <tr>
					<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Language Preferance</span></td>
					<td><input class="input_area" name="language" value="" type="text" id="language" size="48" ></td>
				  </tr>
					
           </table>-->

				   <?
			     $select_skill_for_show_and_hide = q("select * from fs_job where fld_id = '".$_SESSION['job_id']."'");
                 $run_selection = f($select_skill_for_show_and_hide);
                    
			      $job_skill = explode(',',$run_selection['main_skill']);

				  $in_search = explode(',',SKILL);
                     $i = 1;
                   foreach($job_skill as &$b){
				  if(in_array($b,$in_search)){
				  
				       $i = 2;
				  }
				   }


				   if($i==1){
			  ?>
        
				 
				  
				  
			 <table width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">	  
				  
                <tr>
				    <td width="25%">&nbsp;</td>
				    <td width="75%">&nbsp;</td>
				</tr>
                
                
                <tr>
										  <td colspan="2" style="font-size:17px; color:#4FBFE3;">Physical Preference</td>
										  </tr>

				  <tr>
					<td class="text_heading"><span class="style1"></span>&nbsp;<span>Physical Preference</span></td>
					<td>
						   <select id="physical_preference" name="physical_preference" onchange="disable1();" class="select_aera" style="width:80px;">
								 
								  <option value="no">No</option>
								  <option value="yes">Yes</option>
								  
						   </select>
					
					</td>
				  </tr>
				  
				   <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
</table>

					
					
					
					
					
					
		 <table id="sss" style="display:none;" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">			
					
				<tr>
				  <td width="25%">&nbsp;</td>
					<td width="30%">&nbsp;</td>
			    <td width="20%">&nbsp;</td>
					<td width="25%">&nbsp;</td>
				</tr>
			
				<tr>
					<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Height</span></td>
					<td>
							<select id="height" name="height" class="select_aera">
							  <option value="">-- Select Height --</option>
							  <? $height = "select * from fs_height order by fld_id ASC";
								 $height_run = q($height);
								 while($height_fatch = f($height_run)){
							  ?> 
							  <option value="<?=$height_fatch['type']?>" ><?=$height_fatch['type']?></option>
							  <?}?>
                           </select>
	                   </td>
					<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Weight</span></td>
			             <td>
					          <select id="weight" name="weight" class="select_aera">
								  <option value="">-- Select Weight --</option>
								  <? $weight = "select * from fs_weight order by fld_id ASC";
									 $weight_run = q($weight);
									 while($weight_fatch = f($weight_run)){
								  ?> 
								  <option value="<?=$weight_fatch['type']?>" ><?=$weight_fatch['type']?></option>
								  <?}?>
                               </select>
	                      </td>
                 </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  
				 
				  <tr>
							<td class="text_heading">Breast/Chest</td>
							<td><select id="bust_chest" name="bust_chest" class="select_aera">

										
										  <option value="">- Select -</option>
										  <? $bust_chest = "select * from fs_bust_chest order by fld_id ASC";
											 $bust_chest_run = q($bust_chest);
											 while($bust_chest_fatch = f($bust_chest_run)){
										  ?> 
										  <option value="<?=$bust_chest_fatch['type']?>"><?=$bust_chest_fatch['type']?></option>
										  <?}?>
							   </select></td>
							<td class="text_heading">Waist</td>
				    <td><select id="waist" name="waist" class="select_aera">
										  <option value="">- Select -</option>
										  <? $waist = "select * from fs_waist order by fld_id ASC";
											 $waist_run = q($waist);
											 while($waist_fatch = f($waist_run)){
										  ?> 
										  <option value="<?=$waist_fatch['type']?>"><?=$waist_fatch['type']?></option>
										  <?}?>
							   </select> </td>
			    </tr>
				 <tr>
                              <td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
                         </tr>

				  
				  <tr>
				    <td class="text_heading">Hips</td>
				    <td><select id="hips" name="hips" class="select_aera">
										  <option value="">- Select -</option>
										  <? $hips = "select * from fs_hips order by fld_id ASC";
											 $hips_run = q($hips);
											 while($hips_fatch = f($hips_run)){
										  ?> 
										  <option value="<?=$hips_fatch['type']?>"><?=$hips_fatch['type']?></option>
										  <?}?>
							   </select></td>
				    <td class="text_heading"><span class="style1">*</span>&nbsp;<span>Ethenicity</span></td>
					
					<td>
									<select id="ethenicity" name="ethenicity"  class="select_aera">
									  <option value="">-- Select Ethenicity --</option>
									  <? $ethenicity = "select * from fs_ethenicity order by fld_id ASC";
										 $ethenicity_run = q($ethenicity);
										 while($ethenicity_fatch = f($ethenicity_run)){
									  ?> 
									  <option value="<?=$ethenicity_fatch['type']?>" ><?=$ethenicity_fatch['type']?></option>
									  <?}?>
								   </select>
							   </td>
            </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				
				
				  <tr>
					<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Eyes Color</span></td>
					
					 <td><select id="eye" name="eye" class="select_aera">
									  <option value="">-- Select Eyes Color --</option>
									  <? $eye = "select * from fs_eyes_color order by fld_id ASC";
										 $eye_run = q($eye);
										 while($eye_fatch = f($eye_run)){
									  ?> 
									  <option value="<?=$eye_fatch['type']?>" ><?=$eye_fatch['type']?></option>
									  <?}?>
                             </select></td>
					 <td class="text_heading"><span class="style1">*</span>&nbsp;<span>Hair Color</span></td>
				
					<td><select id="hair" name="hair" class="select_aera" >
								  <option value="">-- Select Hair Color --</option>
								  <? $hair = "select * from fs_hair_color order by fld_id ASC";
									 $hair_run = q($hair);
									 while($hair_fatch = f($hair_run)){
								  ?> 
								  <option value="<?=$hair_fatch['type']?>" ><?=$hair_fatch['type']?></option>
								  <?}?>
                                </select></td>



				  </tr>
				
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				 
				 
				  
				  
				  <tr>
					<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Body Type</span></td>
					
					 <td><select id="body" name="body" class="select_aera" >
									  <option value="">-- Select Body Type --</option>
									  <? $body = "select * from fs_body_type order by fld_id ASC";
										 $body_run = q($body);
										 while($body_fatch = f($body_run)){
									  ?> 
									  <option value="<?=$body_fatch['type']?>" ><?=$body_fatch['type']?></option>
									  <?}?>
                               </select></td>
					 <td class="text_heading"><span class="style1">*</span>&nbsp;<span>Skin Color</span></td>
					

					<td><select id="skin" name="skin" class="select_aera" >
										  <option value="">-- Select Skin Color --</option>
										  <? $skin = "select * from fs_skin_color order by fld_id ASC";
											 $skin_run = q($skin);
											 while($skin_fatch = f($skin_run)){
										  ?> 
										  <option value="<?=$skin_fatch['type']?>"><?=$skin_fatch['type']?></option>
										  <?}?>
							   </select></td>


				  </tr>
				 
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				 
				 
				 
				  <tr>
					<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Shoes Size</span></td>
				
					 <td><select id="shoes" name="shoes" class="select_aera" >
												  <option value="">-- Select Shoes Size --</option>
												  <? $shoes = "select * from fs_shoe_size order by fld_id ASC";
													 $shoes_run = q($shoes);
													 while($shoes_fatch = f($shoes_run)){
												  ?> 
												  <option value="<?=$shoes_fatch['type']?>" ><?=$shoes_fatch['type']?></option>
												  <?}?>
									   </select></td>
					<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Dress Size</span></td>
				
					
							   <td><select id="dress" name="dress" class="select_aera">
								  <option value="">-- Select Dress Size --</option>
								  <? $dress = "select * from fs_dress_size order by fld_id ASC";
									 $dress_run = q($dress);
									 while($dress_fatch = f($dress_run)){
								  ?> 
								  <option value="<?=$dress_fatch['type']?>"><?=$dress_fatch['type']?></option>
								  <?}?>
					   </select></td>


				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				 
				  
				  
				 
				  <tr>
					<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Look Like</span></td>
					<td><input class="input_area" name="look" value="" type="text" id="look" size="48" ></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>

        
</table>
 <table  width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">	
 <!------------------------------------------------->
<?}?>


				  <tr>
					<td width="25%">&nbsp;</td>
											<td width="75%">&nbsp;</td>
				  </tr>















<!----------second form end----------->

										<tr>
											<td>&nbsp;</td>
											<td>
												<input type="submit" id="submit" value = "Post Job" name="Submit" class="register_create_ac" style="float:left; margin:0px;">
											</td>
										</tr>
										<tr>
											<td height="40px">&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
									</table>
								</form>
							</div>
							<div class="right_ads">
								<img src="images/ads.jpg" />
							</div>
						</div>
					</div>
					<div>
						<div class="footer_ads">
							<div class="footer_ads_area">
								<div class="footer_ads_left">
									<div class="slider">
										<div id="ei-slider" class="ei-slider">
											<ul class="ei-slider-large">
												<li><img src="images/footer_banner.png" /></li>
												<li><img src="images/footer_banner2.png" /></li>
												<li><img src="images/footer_banner3.png" /></li>
												<li><img src="images/footer_banner2.png" /></li>
												<li><img src="images/footer_banner4.png" /></li>
											</ul><!-- ei-slider-large -->
											<ul class="ei-slider-thumbs">
												<li class="ei-slider-element"></li>
												<li><a href="#">Deal of the day</a></li>
												<li><a href="#">Stationery</a></li>
												<li><a href="#">Perfumes</a></li>
												<li><a href="#">Appliances</a></li>
												<li><a href="#">IPL Kicks off</a></li>
											</ul><!-- ei-slider-thumbs -->
										</div><!-- ei-slider -->
									</div><!-- wrapper -->
									<script type="text/javascript" src="js/jquery.min.js"></script>
									<script type="text/javascript" src="js/jquery.eislideshow.js"></script>
									<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
									<script type="text/javascript">
										$.noConflict();
										jQuery(document).ready(function($) {
										$(function() {
											$('#ei-slider').eislideshow({
												animation			: 'center',
												autoplay			: true,
												slideshow_interval	: 3000,
												titlesFactor		: 0
											});
										});
										});
									</script>
								</div>
								<div class="footer_ads_right"><a href="#"><img src="images/ads_banner_girl.png" width="277" height="226" /></a>
								</div>
							</div>
						</div>
					</div>
					<?include('inner_footer.php');?>
			</div>
		</body>
</html>
