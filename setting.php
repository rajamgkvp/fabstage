<?php
include('constants.php');
include('check_session.php');	
include('paging1.php');



    $id = $_SESSION['fab_id'];
	if(isset($_REQUEST['userName']) && $_REQUEST['userName'] != '') {

	$sql1 = "SELECT * FROM fs_mamber WHERE user_name = '".$_REQUEST['userName']."' AND fld_id != ".$id."";
		$res1 = q($sql1);
		$count = nr($res1);
		if($count == 0){
			$sql_member = "UPDATE fs_mamber SET 
			name = '".$_REQUEST['fname']."',
			email = '".$_REQUEST['email']."',
			password = '".$_REQUEST['Password']."',
			user_name = '".$_REQUEST['userName']."' 
			WHERE fld_id = '".$id."'";
			$res_member = q($sql_member);

        $msg = '- Save Successfully.';

		} else {
			$msg = '- Duplicate User Name Not Allowed.';
		}

	}












$sql_member = "SELECT * FROM fs_mamber WHERE fld_id = ".$id."";
$res_member = q($sql_member);
$row_member = f($res_member);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FabStage.Com</title>
	<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/slider.css" />
	<link href="paging.css" rel="stylesheet" type="text/css" />
   
<script>
	function validate(){

		var errText = "";
		var errorflag = false;
			

		if(document.upload_form.fname.value == "Profile Name"){
			 errText += "- Please Enter First Name\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.fname.focus();
			 return false;
		}

		
		if(document.upload_form.email.value == "Email"){
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

		
		


		if(document.upload_form.Password.value == "Password"){
			 errText += "- Please Enter Password.\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.Password.focus();
			 return false;
		}
		
if(document.upload_form.userName.value == "User Name"){
			 errText += "- Please Enter Username.\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.userName.focus();
			 return false;
		}

		
		if(errorflag==true){
			return false;
		}else{
			return true;
		}
	 }
</script>



</head>

<body>
<?include('left_tab.php');?>
	<div id="main_container">
		
<?include('top.php');?> 	
			<div>
				<div class="main_body_area">
					<div class="left_area">
					</div>

					<div class="center_body" style="width:800px;">
					<!-- INCLUDED FILE TO DISPLAY SIDE TAB ON CENTER TAB -->
			   
			   
			   
			        <div >

					</div>





						<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
						<tr>
						  <td>           
						
					
					
					
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="clear:both;">
                          <tr>
                            
                            <td colspan="2" valign="top" class="talent_result" style="color:#666; font-size:34px; font-weight:normal; height:50px; font-family:'robotothin',Arial,Helvetica,sans-serif; text-indent:10px; border-bottom:1px #ccc solid;">
							
							<b>General Settings</b>

							</td>
					   </tr>
					
					   <tr>
			   <td colspan="2">&nbsp;</td>
			</tr>
			   		
						
 		<form name="upload_form" action="" method="POST" onsubmit="return validate();">				
            
			<?
			  if($msg){
			?>
			<tr>
			  <td>&nbsp;</td>
			  <td  align="left"><i><?=$msg?></i></td>
			</tr>
			<?}?>
			<tr>
			   <td colspan="2">&nbsp;</td>
			</tr>
					
			<tr>
				<td><span class="style1"></span>&nbsp;<span class="register_headtext">Profile Name</span></td>

                <td><input class="register_input" style="width:300px; height:40px;" type="text" onblur="if(this.value=='') this.value='Profile Name';" value="<?=$row_member['name']?>" onfocus="if(this.value=='Profile Name') this.value='';" name="fname" id="fname"></td>




				<!-- <td><input class="profile_input" name="fname" value="<?=$row_member['name']?>" type="text" id="fname" size="50" ></td> -->
            </tr>

            <tr>
			   <td colspan="2">&nbsp;</td>
			</tr>



			<tr>
                <td><span class="style1"></span>&nbsp;<span class="register_headtext">Email</span></td>
				<!-- <td><input class="profile_input" name="email" value="<?=$row_member['email']?>" type="text" id="email" size="50"></td> -->

                 <td><input class="register_input"  style="width:300px; height:40px;" type="text" onblur="if(this.value=='') this.value='Email';" value="<?=$row_member['email']?>" onfocus="if(this.value=='Email') this.value='';" name="email" id="email"></td>



			</tr>
			  <tr>
			   <td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1"></span>&nbsp;<span class="register_headtext">Password</span></td>
				<!-- <td><input class="profile_input" name="Password" value="<?=$row_member['password']?>" type="password" id="Password" size="50" ></td> -->

                 <td><input class="register_input"  style="width:300px; height:40px;" type="password" onblur="if(this.value=='') this.value='Password';" value="<?=$row_member['password']?>" onfocus="if(this.value=='Password') this.value='';" name="password" id="password"></td>


            </tr>


			  <tr>
			   <td colspan="2">&nbsp;</td>
			</tr>


			<tr> 
                <td ><span class="style1"></span>&nbsp;<span class="register_headtext">User Name</span> </td>
				<!-- <td ><input class="profile_input" name="userName" type="text" value="<?=$row_member['user_name']?>" id="userName" size="50" ></td> -->
				 <td><input class="register_input"  style="width:300px; height:40px;" type="text" onblur="if(this.value=='') this.value='User Name';" value="<?=$row_member['user_name']?>" onfocus="if(this.value=='User Name') this.value='';" name="userName" id="userName"></td>

			</tr>


			 <tr>
			   <td colspan="2">&nbsp;</td>
			</tr>
			

		   
		     <tr>  
			   <td>&nbsp;</td>
			   <td><input name=""  style="float:left;"  type="submit" value="Save Settings" class="register_create_ac" /></td>
		     </tr>
		   					  
		</form>				
                          	
							
							
						
                           </table>



                          </td></tr>

						</table>
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
						<div class="footer_ads_right"><a href="#">
							<img src="images/ads_banner_girl.png" width="277" height="226" /></a>
						</div>
					</div>
				</div>
			</div>
			<?include('inner_footer.php');?>
		</div>
	</body>
</html>
