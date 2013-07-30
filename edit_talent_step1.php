<?php
	include('constants.php');
	$id = $_SESSION['fab_id'];
	if(isset($_REQUEST['submit']) && $_REQUEST['submit'] != '') {

	
		for($j=0;$j<count($_REQUEST['cat']);$j++) {
					$check_val.=",";
					$check_val.= $_REQUEST['cat'][$j];
					$check_val.=",";
				}


				//UPDATE THE USER TABLE
				$sql11 = "SELECT * FROM fs_talent WHERE member_id = '".$id."' ";
				$query_run1 = q($sql11);
				$num_run = nr($query_run1);
				if($num_run!=0){
					$sql = "UPDATE fs_talent SET 
					main_skill =  '".$check_val."',
					other1 = '".$_REQUEST['other1']."', 
					other2 = '".$_REQUEST['other2']."',
					other3 = '".$_REQUEST['other3']."', 
					other4 = '".$_REQUEST['other4']."'
					

					WHERE member_id = '".$id."'";
					$res = q($sql);
				}else{

					$sql = "INSERT INTO fs_talent(member_id,main_skill, other1, other2, other3,other4,added_on)
					
					VALUES('".$member_id."','".$check_val."', '".$_REQUEST['other1']."', '".$_REQUEST['other2']."', '".$_REQUEST['other3']."',
					'".$_REQUEST['other4']."','".date('Y-m-d h:m:s')."')";
					$res = q($sql);
				
				}

				if($res){
					$msg = '- Successfully updated.';
				} else {
					$msg = '- Not updated.';
				}
		








}

//POPULATE 
$sql_member = "SELECT * FROM fs_mamber WHERE fld_id = ".$id."";
$res_member = q($sql_member);
$row_member = f($res_member);

//POPULATE 
$sql_pop = "SELECT * FROM fs_talent WHERE member_id = ".$id."";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>

<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<link rel="stylesheet" href="css/edit_talent_css.css" type="text/css" />

<script>
	function validate(){

		var errText = "";
		var errorflag = false;
			

		if(document.upload_form.fname.value == ""){
			 errText += "- Please Enter First Name\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.fname.focus();
			 return false;
		}

		if(document.upload_form.lname.value == ""){
			 errText += "- Please Enter Last Name\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.lname.focus();
			 return false;
		}

		
		if(document.upload_form.userName.value == ""){
			 errText += "- Please Enter Username.\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.userName.focus();
			 return false;
		}


		if(document.upload_form.Password.value == ""){
			 errText += "- Please Enter Password.\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.Password.focus();
			 return false;
		}
		

		if(document.upload_form.email.value == ""){
			errText = "- Email is left blank.\n";
			alert(errText);
			errorflag = true;
			document.upload_form.email.focus();
			return false;
		}else if(document.upload_form.email.value != ""){
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(document.upload_form.email.value)){
					errorflag = false;

			}else{
			errText += "- Email is not valid.\n";
			alert(errText);
			errorflag = true;
			document.upload_form.email.focus();
			return false;		
			}
		}

		
		if(errorflag==true){
			return false;
		}else{
			return true;
		}
	 }
</script>



<!-- CALENDAR INCLUDE-->
<script type="text/javascript" src="admin/src/calendar.js"></script>
<script type="text/javascript" src="admin/src/calendar-setup.js"></script>
<script type="text/javascript" src="admin/lang/calendar-en.js"></script>
<style type="text/css"> @import url("admin/css/calendar-win2k-cold-1.css"); </style>

<style type="text/css">
	.style1 {color: #FF0000}
</style>

<style type="text/css">
	
	.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
	.text span{font-size:17px;}
	.button { width:auto; padding:0 10px; height:28px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px; height:28px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	 
	 
	 
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
border: 1px #E7E7E7 solid;
color: #7e7e7e;
padding-left: 10px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;}
	 .input_select{width:180px; height:22px; padding:1px; float:left; border:1px #ccc solid; color:#999; -webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px;}
	 .head_text{width:760px; float:left; line-height:34px;}
	 .head_text a{width:760px; color:#666666; font-weight:bold; float:left; line-height:34px; border-top:1px #ccc solid; font-family:Arial, Helvetica, sans-serif; font-size:12px; border-bottom:1px #ccc solid; background:url(images/down_arrow.png) right 10px no-repeat #e7e7e7; padding-left:10px; text-decoration:none;}
	 .head_text a:hover{width:760px; color:#666666; font-weight:bold; float:left; line-height:34px; border-top:1px #ccc solid; border-bottom:1px #ccc solid; background:url(images/down_arrow.png) right 10px no-repeat #d5d5d5;}
	 
	 
	.register_create_ac{background:#42B3E5;
    border: 0 none;
    border-radius: 3px 3px 3px 3px;
    color: #FFFFFF;
    cursor: pointer;
    float: left;
    margin: 0px;
    padding: 10px 15px;
    text-align: center;
    width: auto;}
												  
</style>


  
          <div class="edit_profile_page">
       	<ul>
        <?php include('edit_talent_profile.php'); ?>
        </ul>
       </div>

	
	<form name="upload_form" action="" method="POST" onsubmit="return validate();">
    <table width="80%" border="0" cellspacing="0" cellpadding="10" align="left">
  <tr>
<td><table width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
			<tr>
				<td colspan="2" align="center" class="msg"><?=$msg?></td>
			</tr>
		
		
			<tr>
				<td><span class="style1"></span>&nbsp;<b class="text_heading">Main Skill</b></td>
				<td>&nbsp;</td>
                <td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

			
		</table></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
		<?php
			$sql = "SELECT * FROM fs_category order by category_name ASC";
			$res = q($sql);	
			$k = 0;
			while($fatch = f($res)){ 
				$k = $k+1;
				?>
				<table width="100%"  border="0" align="center" cellspacing="0" cellpadding="0">
					
					
					
					
				                      	<tr>
											 <td class="head_text" align="left"><a href="#" onclick="javascript:if(document.getElementById('<?="r".$k;?>').style.display=='none') document.getElementById('<?="r".$k;?>').style.display='block';else if(document.getElementById('<?="r".$k;?>').style.display=='block') document.getElementById('<?="r".$k;?>').style.display='none';"><?=$fatch['category_name']?></a>  
											 </td>
										</tr>





					<tr><td>&nbsp;</td></tr>
				</table>
				<span id="<?="r".$k;?>" style="display:none;"> 
				<table width="100%"  border="0" align="center" cellspacing="0" cellpadding="0">
					<tr align="center">  
					<?
					 $i=0;
					 $sql1 = "SELECT * FROM fs_sub_category where category_id ='".$fatch['fld_id']."'   order by sub_category ASC";
					 $res1 = q($sql1);	
					 while($fatch1 = f($res1)){ 
					 if($i%5==0){
					?>
					</tr><tr>
					<?}?>
					 <td width="20%" align="left" valign="top" style="font-size:12px; color:#999; padding-top:5px; font-family:Arial, Helvetica, sans-serif;"><input style="margin-right:5px; float:left;" type="checkbox" name="cat[]" id="cat[]" value="<?=$fatch1['sub_category']?>"<?if(strpos($row['main_skill'],$fatch1['sub_category'])){?>checked<?}?>><?=$fatch1['sub_category']?> </td>
					<?$i=$i+1; }?>
					 </tr>
					 <tr><td>&nbsp;</td></tr>
				</table>
				   </span>
				<?}?>
                
                <table width="100%"  border="0" align="left" cellspacing="10" cellpadding="0">
				
				<tr>
				<td width="15%"><span class="text_heading">Other Skill 1</span></td>
                <td width="35%"><input class="input_area" name="other1" value="<?=$row['other1']?>" type="text" id="other1"  ></td>
				<td width="15%"><span class="text_heading">Other Skill 2</span></td>
                <td width="35%"><input class="input_area" name="other2" value="<?=$row['other2']?>" type="text" id="other2"  ></td>
			</tr>
	

			 <tr>
			  	
				<td>
				  <input type="submit" id="submit" value="Edit Talent" name="submit" class="register_create_ac">
                  
			   </td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
				</tr>

			
		</table>
			</table></td>
  </tr>

 
<table>
			
</table></td>
  </tr>
</table>

		
</form>
