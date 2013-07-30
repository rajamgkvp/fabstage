<?php
	include('constants.php');

	//ADD ADMIN USER
	if(isset($_REQUEST['title']) && $_REQUEST['title'] != ''){

			  for($j=0;$j<count($_REQUEST['cat']);$j++)
                       {
					   $check_val.=",";
                       $check_val.= $_REQUEST['cat'][$j];
                      // $check_val.=",";
                       }


		$sql_duplicate = "SELECT * FROM fs_oudition WHERE title = '".$_REQUEST['title']."'";
		$res_duplicate = q($sql_duplicate);
		$count = nr($res_duplicate);
		if($count == 0){
			$sql_admin = "INSERT INTO fs_oudition (company_id,title,main_skill ,description, added_on) VALUES('".$_SESSION['fab_id']."','".$_REQUEST['title']."','".$check_val."', '".$_REQUEST['desc1']."', '".date('Y-m-d h:m:s')."')";
			$res_admin = q($sql_admin);
			if($res_admin){
					//GET LAST INSERTED ID
			    $query = "SELECT LAST_INSERT_ID()";
			    $result = q($query);
			    if ($result) {
				
				$row = mysql_fetch_row($result);
				$audition_id = $row[0];
				$_SESSION['audition_id'] = $audition_id;
				$_SESSION['number'] = $_REQUEST['audition'];
				
			}
			  header('Location: audition_details.php');


			}
		}else{
			$msg = '- Duplicate Audition Title Not Allowed.';
		}
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>FabStage.Com</title>
		<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />

		<!-- SCRIPT TO VALIDATE CONTROLS -->
		<script>
			function validate() {
				var errText = "";
				var errorflag = false;

				if(document.upload_form.title.value == "") {
					 errText += "- Please Enter Oudition Title. \n";
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
				if(document.upload_form.desc1.value == "") {
					 errText += "- Please Enter Oudition Description.\n";
					 alert(errText);
					 errorflag = true;
					 document.upload_form.desc1.focus();
					 return false;
				}

				if(errorflag==true) {
					return false;
				}else{
					return true;
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
	<body>
	<?include('left_company_tab.php');?> 
	 
		<div id="main_container">
			<?include('top.php');?> 
				<div>
					<div class="main_body_area">
						<div class="left_area">
						</div>
						<div class="center_body" style="width:800px;">
							<form name="upload_form" action="" method="POST" onsubmit="return validate();" autocomplete="off">
								<table width="100%"  border="0" align="left" cellspacing="1" cellpadding="1">
									<tr>
										<td colspan="2"  align="center" class="msg" style="font-size: 12px"><?=$msg?></td>
									</tr>
									<tr>
										<td colspan="2" height="8"></td>
									</tr>
									<tr>
										<td width="30%" class="text_heading"><span class="style1">*</span>&nbsp;<span>Title</span> </td>
									  <td width="70%"><input name="title" type="text" value="" id="title" size="50" class="input_area" style="width:500px;"></td>
									</tr>
									<tr>
										<td colspan="2" height="8"></td>
									</tr>
								  </table>

								  
				  <?
			$sql = "SELECT * FROM fs_category order by category_name ASC";
				$res = q($sql);	
					while($fatch = f($res)){  ?>
                    <div style="clear:both;"></div>
							 <table width="100%"  border="0" align="center" cellspacing="1" cellpadding="1">
									 
									  <tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
				                      </tr>
									  <tr>
											<td class="text_heading" align="left"><?=$fatch['category_name']?>  </td>
											
										 </tr>
										
							   </table>
							   
							   <table width="90%"  border="0" align="right" cellspacing="0" cellpadding="0">
									
									  <tr align="center">  
										  <?
											     $i=0;
											     $sql1 = "SELECT * FROM fs_sub_category where category_id ='".$fatch['fld_id']."'   order by sub_category ASC";
											     $res1 = q($sql1);	
											     while($fatch1 = f($res1)){ 
												   if($i%4==0){
											    ?>
													 </tr><tr>
												<?}?>
											     <td width="25%;" align="left" style="font-size: 12px; color: #999; padding-top: 5px;"><input style="float: left; margin-right: 5px;" type="checkbox" name="cat[]" id="cat[]" value="<?=$fatch1['sub_category']?>"<?if(strpos($quer_fatch['main_skill'],$fatch1['sub_category'])){?>checked<?}?>><?=$fatch1['sub_category']?> </td>

											  <?$i=$i+1; }?>

										 </tr>
										 

									  <tr><td colspan="4"><div class="border"></div></td></tr>
							   </table>


						   
						   	 <?}?>















								  <table width="100%"  border="0" align="left" cellspacing="1" cellpadding="1">
                                  	<tr>
                                    	<td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
									
									<tr>
										<td class="text_heading"><span class="style1">*</span>&nbsp;<span>Description</span></td>
										<td>
											<textarea name="desc1" id="desc1" rows="8" cols="50" class="input_area" style="width:500px; height:110px;"></textarea>
										</td>
									</tr>
									<tr>
										<td colspan="2" height="8"></td>
									</tr>
									<tr>
										<td class="text_heading"><span class="style1">*</span>&nbsp;
										<span>Number Of Audition</span></td>
										<td>
											<input type="text" name="audition" id="audition" size="5" class="input_area" style="width:80px;" ></td>
										</td>
									</tr>
									<tr>
										<td colspan="2" height="8"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>
											<input type="submit" id="submit" value="Add Oudition" name="submit" class="register_create_ac" style="margin:0px; float:left;">
										</td>
									</tr>
									<tr>
										<td height="30%">&nbsp;</td>
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
										</ul>
										<!-- ei-slider-large -->
										<ul class="ei-slider-thumbs">
											<li class="ei-slider-element"></li>
											<li><a href="#">Deal of the day</a></li>
											<li><a href="#">Stationery</a></li>
											<li><a href="#">Perfumes</a></li>
											<li><a href="#">Appliances</a></li>
											<li><a href="#">IPL Kicks off</a></li>
										</ul>
										<!-- ei-slider-thumbs -->
									</div>
									<!-- ei-slider -->
								</div>
								<!-- wrapper -->
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
							<div class="footer_ads_right">
								<a href="#"><img src="images/ads_banner_girl.png" width="277" height="226" /></a>
							</div>
						</div>
					</div>
				</div>

				<?include('inner_footer.php');?>
			</div>
	</body>
</html>
