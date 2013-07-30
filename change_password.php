<?php
include('constants.php');
	
include('paging1.php');



    $id = $_SESSION['fab_id'];
	if(isset($_REQUEST['password1']) && $_REQUEST['password1'] != '') {

	
			$sql_member = "UPDATE fs_mamber SET 
			
			
			password = '".$_REQUEST['password1']."'
		
			WHERE email = '".$_REQUEST['email']."'";
			$res_member = q($sql_member);

        $msg = '- Change Successfully.';




$sql_member1 = "SELECT * FROM fs_mamber WHERE email = '".$_REQUEST['email']."'";
$res_member1 = q($sql_member1);
$row_member1 = f($res_member1);


                  //SET SESSION
        $_SESSION['fab_id'] = $row_member1['fld_id'];
        $_SESSION['fab_username'] = $row_member1['fld_username'];
        $_SESSION['fab_email'] = $row_member1['fld_email'];
		$_SESSION['work_as'] = $row_member1['work_as'];


  // header('Location: dashboard.php');
					   $work_as = $_SESSION['work_as'];   
   		               if($work_as==1){
		                  header('Location: talent_dashboard.php');
		               }
					   else
						   if($work_as==2){
		                       header('Location: company_dashboard.php');
		                   }
						   else 
							   if($work_as==3){
		                            header('Location: client_dashboard.php');
		                        }
	














	}











$emailg = base64_decode($_REQUEST['email']); 
$sql_member = "SELECT * FROM fs_mamber WHERE email = '".$emailg."'";
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
			

		if(document.upload_form.password1.value == ""){
			 errText += "- Please Enter Password.\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.password1.focus();
			 return false;
		}


		if(document.upload_form.password2.value == ""){
			 errText += "- Please Enter Password.\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.password2.focus();
			 return false;
		}

    if(document.upload_form.password1.value != document.upload_form.password2.value){
	
	 errText += "- Password and Confirm Password Does not match Please Recheck.\n";
			 alert(errText);
			 errorflag = true;
			 document.upload_form.password1.focus();
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
							
							<b>Change Password</b>

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
			   <td colspan="2"><i>Hi <b><?=ucfirst($row_member['name'])?></b> ! Please change your password....</i></td>
			</tr>



			
			  <tr>
			   <td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td><span class="style1"></span>&nbsp;<span class="register_headtext">Password</span></td>
				<td><input class="register_input"  style="width:300px; height:40px;" type="password" onblur="if(this.value=='') this.value='Password';" value="" onfocus="if(this.value=='Password') this.value='';" name="password1" id="password1"></td>

            </tr>


			  <tr>
			   <td colspan="2">&nbsp;</td>
			</tr>


			<tr> 
                <td ><span class="style1"></span>&nbsp;<span class="register_headtext">Confirm Password</span> </td>
				<td><input class="register_input"  style="width:300px; height:40px;" type="password" onblur="if(this.value=='') this.value='Confirm Password';" value="" onfocus="if(this.value=='Confirm Password') this.value='';" name="password2" id="password2"></td>


			</tr>


			 <tr>
			   <td colspan="2"><input type="hidden" value="<?=$emailg?>" id="email" name="email"></td>
			</tr>
			

		   
		     <tr>  
			   <td>&nbsp;</td>
			   <td><input name=""  style="float:left;"  type="submit" value="Save Password" class="register_create_ac" /></td>
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
