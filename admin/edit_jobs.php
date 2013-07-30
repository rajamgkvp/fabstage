<?
include('../constants.php');

$id = $_REQUEST['id'];

if(isset($_REQUEST['title']) && $_REQUEST['title'] != ''){
	
	

		//UPDATE THE USER TABLE
		
		
		$sql = "UPDATE fs_job SET 
		
		title = '".$_REQUEST['title']."',
		company_id = '".$_REQUEST['company']."',
		category = '".$_REQUEST['category']."',
		
		
		
		sub_category = '".$_REQUEST['sub_category']."',

		description = '".$_REQUEST['description']."', 

		

		interview_venue = '".$_REQUEST['interview_venue']."', 

		interview_date = '".$_REQUEST['interview_date']."',

		interview_time = '".$_REQUEST['interview_time']."', 

		contact_person = '".$_REQUEST['contact_person']."',


		contact_number = '".$_REQUEST['contact_number']."', 

		contact_email = '".$_REQUEST['contact_email']."',
		
		web_link = '".$_REQUEST['web_link']."',
		
		agencies_applies = '".$_REQUEST['agencies_applies']."',

		expire_date = '".$_REQUEST['expire_date']."', 

		
		sponser = '".$_REQUEST['sponser']."', 

		status = '".$_REQUEST['status']."',
		
		
		

		update_on = '".date('Y-m-d h:m:s')."'
		
		
		


		WHERE fld_id = '".$id."'";
		
		
		$res = q($sql);

		
		
		
		
		
		
		
		
		if($res){
			$msg = '-  Updated Successfully.';

		}else{
			$msg = '-  Not Updated.';
		}
	
}









//POPULATE 
$sql_pop = "SELECT * FROM fs_job WHERE fld_id = ".$id."";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />


<script>
function validate(){

	var errText = "";
	var errorflag = false;
		

	if(document.upload_form.title.value == ""){
		 errText += "- Please Enter Title\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title.focus();
		 return false;
	}
	if(document.upload_form.company.value == ""){
		 errText += "- Please Select Company\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.company.focus();
		 return false;
	}
	if(document.upload_form.category.value == ""){
		 errText += "- Please Select Category\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.category.focus();
		 return false;
	}
	if(document.upload_form.description.value == ""){
		 errText += "- Please Enter Description\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.description.focus();
		 return false;
	}
	if(document.upload_form.interview_venue.value == ""){
		 errText += "- Please Enter Interview Venue\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.interview_venue.focus();
		 return false;
	}
	if(document.upload_form.interview_date.value == ""){
		 errText += "- Please Enter Interview Date\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.interview_date.focus();
		 return false;
	}
	if(document.upload_form.interview_time.value == ""){
		 errText += "- Please Enter Interview Time\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.interview_time.focus();
		 return false;
	}
	if(document.upload_form.contact_person.value == ""){
		 errText += "- Please Enter Contact Person\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.contact_person.focus();
		 return false;
	}
	if(document.upload_form.contact_number.value == ""){
		 errText += "- Please Enter Contact Number\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.contact_number.focus();
		 return false;
	}
if(document.upload_form.contact_email.value == ""){
		errText = "- Email is left blank.\n";
		alert(errText);
		errorflag = true;
		document.upload_form.contact_email.focus();
		return false;
	}else if(document.upload_form.contact_email.value != ""){
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(document.upload_form.contact_email.value)){
			    errorflag = false;

		}else{
		errText += "- Email is not valid.\n";
		alert(errText);
		errorflag = true;
		document.upload_form.contact_email.focus();
		return false;		
		}
	}
	if(document.upload_form.web_link.value == ""){
		 errText += "- Please Enter Web Link\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.web_link.focus();
		 return false;
	}
	if(document.upload_form.expire_date.value == ""){
		 errText += "- Please Enter Expire Date\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.expire_date.focus();
		 return false;
	}
	if(document.upload_form.sponser.value == ""){
		 errText += "- Please Enter Sponser\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.sponser.focus();
		 return false;
	}
	if(document.upload_form.status.value == ""){
		 errText += "- Please Enter Status\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.status.focus();
		 return false;
	}

	
	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }
</script>

<script type="text/javascript" src="ajax.js"></script>
<script>
							
	var ajax = new Array();

	function getCityList(sel){
		var countryCode = document.getElementById('category').value;
		//var countryCode = sel.options[sel.selectedIndex].value;
		//alert(countryCode);
		document.getElementById('sub_category').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'getState.php?countryCode='+countryCode;	// Specifying which file to get
			//alert(ajax[index].requestFile);
			ajax[index].onCompletion = function(){ createCities(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function createCities(index){
		var obj = document.getElementById('sub_category');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}
  </script>

<!-- CALENDAR INCLUDE-->
<script type="text/javascript" src="src/calendar.js"></script>
<script type="text/javascript" src="src/calendar-setup.js"></script>
<script type="text/javascript" src="lang/calendar-en.js"></script>
<style type="text/css"> @import url("css/calendar-win2k-cold-1.css"); </style>


<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<body>

<form name="upload_form" action="" method="POST" onsubmit="return validate();" autocomplete="off">
<table width="90%"  border="0" align="center" cellspacing="1" cellpadding="1">
 
<tr>
    <td colspan="2" align="center" class="msg"><?=$msg?></td>
  </tr>
  
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="70%">&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Title</span></td>
    <td><input class="input" name="title" type="text" value="<?=$row['title']?>" id="title" size="48" ></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><span class="style1">*</span>&nbsp;<span>Company Name</span></td>
    <td>
	     <select id="company" name="company" >
		          <option value="">-- Select Company --</option>
				   <?
				   $sql = "SELECT * FROM fs_mamber where work_as = 2 order by name ASC";
	               $res = q($sql);
				   while($fatch = f($res)){
	               ?>
				  <option value="<?=$fatch['fld_id']?>"<?if($fatch['fld_id']==$row['company_id']){?>selected<?}?>><?=$fatch['name']?></option>
				  <?}?>
				  
           </select>
	
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><span class="style1">*</span>&nbsp;<span>Category</span></td>
    <td>
	     <select id="category" name="category" onchange="getCityList(this)">
		          <option value="">-- Select Category --</option>
				   <?
				   $sql = "SELECT * FROM fs_category order by category_name ASC";
	               $res = q($sql);
				   while($fatch = f($res)){
	               ?>
				  <option value="<?=$fatch['fld_id']?>" <?if($fatch['fld_id']==$row['category']){?>selected<?}?>><?=$fatch['category_name']?></option>
				  <?}?>
				  
           </select>
	
	</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td><span class="style1">*</span>&nbsp;<span>Sub Category</span></td>
    <td>
	    <select id="sub_category" name="sub_category">
		         <option value="">-- Select Category --</option>
				  <?
				   $sql12 = "SELECT * FROM fs_sub_category where category_id = '".$row['category']."' order by sub_category ASC";
	               $res12 = q($sql12);
				   while($fatch12 = f($res12)){
	               ?>
				  <option value="<?=$fatch12['fld_id']?>" <?if($fatch12['fld_id']==$row['sub_category']){?>selected<?}?>><?=$fatch12['sub_category']?></option>
				  <?}?>
				  
           </select>
	
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42%"><span class="style1">*</span>&nbsp;<span>Description</span> </td>
    <td width="58%">
		 <textarea id="description" name="description" rows="4" cols="35"><?=$row['description']?></textarea>
	</td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Interview Venue</span></td>
    <td><input class="input" name="interview_venue" value="<?=$row['interview_venue']?>" type="text" id="interview_venue" size="48" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Interview Date</span></td>
    <td><input class="input" name="interview_date" value="<?=$row['interview_date']?>" type="text" id="interview_date" size="48" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Interview Time</span></td>
    <td><input class="input" name="interview_time" value="<?=$row['interview_time']?>" type="text" id="interview_time" size="48" ></td>
  </tr>
 
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Contact Person</span></td>
    <td><input class="input" name="contact_person" value="<?=$row['contact_person']?>" type="text" id="contact_person" size="48" ></td>
  </tr>
  
     <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Contact Number</span></td>
    <td><input class="input" name="contact_number" value="<?=$row['contact_number']?>" type="text" id="contact_number" size="48" ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Contact Email</span></td>
    <td><input class="input" name="contact_email" value="<?=$row['contact_email']?>" type="text" id="contact_email" size="48" ></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Web Link</span></td>
    <td><input class="input" name="web_link" value="<?=$row['web_link']?>" type="text" id="web_link" size="48" ></td>
  </tr> 
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  
  <tr>
    <td><span class="style1"></span>&nbsp;<span>Agencies Applies</span></td>
    <td>
		   <select id="agencies_applies" name="agencies_applies">
		         
				  <option value="no" <?if($row['agencies_applies']=="no"){?>selected<?}?>>No</option>
				  <option value="yes"<?if($row['agencies_applies']=="yes"){?>selected<?}?>>Yes</option>
				  
           </select>
	
	
	
	</td>
  </tr>
  
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Expire Date</span></td>
    <td><input class="input" name="expire_date" value="<?=$row['expire_date']?>" type="text" id="expire_date" size="48" ></td>
  </tr> 
  
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Sponser</span></td>
    <td><input class="input" name="sponser" value="<?=$row['sponser']?>" type="text" id="sponser" size="48" ></td>
  </tr> 
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1">*</span>&nbsp;<span>Status</span></td>
    <td><textarea id="status" name="status"  rows="4" cols="35"><?=$row['status']?></textarea></td>
  </tr>
  
  
  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="submit" id="submit" value = "Edit Job" name="Submit">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
 </body>