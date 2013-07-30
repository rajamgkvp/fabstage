<?php
include('constants.php');

if($_REQUEST['name']!=""){
		
			$query = "select * from fs_mamber where email = '".$_REQUEST['email']."'";
			$run = q($query);
			$num = nr($run);
			if($num == 0){
					    $query1 = "select * from fs_mamber where user_name = '".$_REQUEST['user_name']."'";
						$run1 = q($query1);
						$num1 = nr($run1);
						if($num1 == 0) {

				$insert = "insert into fs_mamber(name,email,user_name,password,work_as,added_on)VALUES('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['user_name']."','".$_REQUEST['password']."','".$_REQUEST['type']."','".date('Y-m-d h:i:s')."')";
				$ins_run = q($insert);

				if($ins_run){

							 /*if($_REQUEST['type']==1){
							  $query = q("insert into fs_talent(userName,email,added_on)values('".$_REQUEST['user_name']."','".$_REQUEST['email']."','".date('Y-m-d h:i:s')."')");
							}else if($_REQUEST['type']==2){
							  $query = q("insert into fs_company(userName,email,added_on)values('".$_REQUEST['user_name']."','".$_REQUEST['email']."','".date('Y-m-d h:i:s')."')");
							}else if($_REQUEST['type']==3){
							  $query = q("insert into fs_client(userName,email,added_on)values('".$_REQUEST['user_name']."','".$_REQUEST['email']."','".date('Y-m-d h:i:s')."')");
							}*/

							$query = "SELECT LAST_INSERT_ID()";
					        $result = q($query);
					        if ($result) {
					           $nrows = nr($result);
					           $row = mysql_fetch_row($result);
					           $user_id = $row[0];
				            }				

					   $_SESSION['fab_id'] = $user_id;
                       $_SESSION['fab_username'] = $_REQUEST['user_name'];
                       $_SESSION['fab_email'] = $_REQUEST['email'];
		               $_SESSION['work_as'] = $_REQUEST['type'];

					   $msg='<span style="font-size:12px;font-family:arial;color:#336699;"><b> - Registration Successful</b></span>';

		// SEND E-MAIL TO 
		   $to = $_REQUEST['email'];

		// YOUR SUBJECT
		   $subject = 'FabStage - Thank you for register with us.';
		
		// MESSAGE
           $message = '
			<div style="width:620px;margin:auto;color:#FFFFFF;background:#0099ff;font-size:14px;font-weight:bold;padding:7px 0px 7px 15px;">FabStage</div>
			<div style="width:608px;margin:auto;height:auto;font-size:11px;padding:7px 10px 7px 15px;border:solid #0099ff 1px ;">
			Dear '.ucfirst($_POST['user_name']).',<br /><br />Welcome to FabStage Portal.<BR><BR>
			<B>Your Login Details are as follows:</B><br/><br/>
			<B>Username :</B> '.$_POST['user_name'].' <br/>
			<B>Password :</B> '.$_POST['password'].' 
			<br><br>
			Kindly click on the link below to Activate your Account<B>:</B><br/><br/>
			<a href='.URL.'confirmation_user.php?passkey='.base64_encode($_POST['user_name']).'> 					'.URL.'confirmation_user.php?passkey='.base64_encode($_POST['user_name']).'</a><br><br>
			Regards,<br>
			FabStage
			</div>
		';

		// TO SEND HTML MAIL, THE CONTENT-TYPE HEADER MUST BE SET
		   $headers  = 'MIME-Version: 1.0' . "\r\n";
		   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// ADDITIONAL HEADERS
		   $headers .= 'From:  FabStage<admin@fs.sitebysite.us>'. "\r\n";
		
		// MAIL IT
		   mail($to, $subject, $message, $headers);

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
				}
			
			else{
				$msg='<span style="font-size:12px;font-family:arial;color:#cc3366;"><b> - User Name is already registered. </b></span>';
			}
		}
			
			else{
				$msg='<span style="font-size:12px;font-family:arial;color:#cc3366;"><b> - Email is already registered. </b></span>';
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
	<SCRIPT language=JavaScript>
    function validateform()
	{
		var errText = "";
		var errorflag = false;
		//alert('test new function');

		errText += "There are following error(s):\n\n";


		if(document.getElementById("type").value == "" ){
			 errText += "- Please Select Your Mamber Type\n";
			 errorflag = true;
		}

		if(document.getElementById("name").value == "Name" ){
			 errText += "- Please enter your Name\n";
			 errorflag = true;
		}

		if(document.getElementById("email").value == "Email" ){
			 errText += "- Please enter your Email\n";
			 errorflag = true;
		} else if(document.getElementById("email").value != ""){
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(document.getElementById("email").value)){
					errorflag = false;	
			}else{
			errText += "- Please Enter currect email address\n";
			errorflag = true;	
			}
		}

		if(document.getElementById("user_name").value == "User Name" ){
			 errText += "- Please enter User Name\n";
			 errorflag = true;
		}

		if(document.getElementById("password").value == "Password" ){
			 errText += "- Please enter Password\n";
			 errorflag = true;
		}

			if(errorflag==true){
			alert(errText);
			return false;
		}else{
			return true;
		}
	}
    
</script>
</head>

<body>
<div id="main_container">
	<?include('top.php');?>
    
    <div>
    	<div class="main_body_area">
                        <div class="left_area">
                     
                        </div>
<div class="center_body" style="width:1000px; background:#ededed; margin-left:0px; padding:0px;">
		
			<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td class="register_here_head">To get Jobs or Hire Professionals Register Here</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
    <table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="235" style="border-right:1px #fff solid;">
    	<table width="214" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="register_here_head">or</td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><a href="#"><img src="images/fb_btn.jpg" width="214" height="56" /></a></td>
  </tr>
  <tr>
    <td><a href="#"><img src="images/t_btn.jpg" width="214" height="56" /></a></td>
  </tr>
  <tr>
    <td><a href="#"><img src="images/in_btn.jpg" width="214" height="56" /></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

    </td>
    <td style="border-left:1px #c0c0c2 solid; padding-left:20px;">
    <form id="regform" name="regform" autocomplete="off" method="post" action="" onsubmit="return validateform();"> 
		<table width="100%" border="0" cellspacing="6" cellpadding="0">
        <?
			if($msg!='')
			{
		?>
        <tr>
		<td colspan="2"><?=$msg?></td>
		</tr>
        <?
		}	  
		?>
  <tr>
    <td class="register_headtext">Member Type</td>
    <td class="register_headtext">Name</td>
  </tr>
  <tr>
    <td><select class="register_select" name="type" id="type">
                        	<option value="">-- Select Your Mamber Type --</option>
							<option value="1">Talent</option>
                            <option value="2">Company</option>
                        </select></td>
    <td><input class="register_input" type="text" onblur="if(this.value=='') this.value='Name';" value="Name" onfocus="if(this.value=='Name') this.value='';" name="name" id="name"></td>
  </tr>
  <tr>
    <td class="register_headtext" valign="top">Email</td>
    <td class="register_headtext" valign="top">Username</td>
  </tr>
  <tr>
    <td valign="top"><input class="register_input" type="text" onblur="if(this.value=='') this.value='Email';" value="Email" onfocus="if(this.value=='Email') this.value='';" name="email" id="email"></td>
    <td valign="top"><input class="register_input" type="text" onblur="if(this.value=='') this.value='User Name';" value="User Name" onfocus="if(this.value=='User Name') this.value='';" name="user_name" id="user_name"><br/>
							<span style="font-size:12px;font-family:arial;color:#42b3e5; float:left; clear:both;"><b>fabstage.com/Username</b></span>
    </td>
  </tr>
  <tr>
    <td class="register_headtext" valign="top">Password</td>
    <td class="register_headtext" valign="top">&nbsp;</td>
  </tr>
  <tr>
  	<td valign="top"><input class="register_input" type="password" onblur="if(this.value=='') this.value='Password';" value="Password" onfocus="if(this.value=='Password') this.value='';" name="password" id="password">
    </td>
    <td valign="top">
    <input class="search_btn" value="Sign Up"  type="submit" />
    </td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
			    
	</form>
    </td>
  </tr>
   
</table>

<tr>
<td>&nbsp;</td>
</tr>

<tr>
    <td align="center">
    	<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#fff" style="padding-left:15px; font-size:13px; color:#999;">
    <input name="" type="checkbox" value="" />
    I acknowledge that I have read and accept the <span style="color:#42b3e5;">Terms of Use Agreement</span><br />
and consent to the <span style="color:#42b3e5;">Privacy Policy</span> and <span style="color:#42b3e5;">Video Privacy Policy</span>
    </td>
    <td bgcolor="#fff"><input name="" type="button" value="Create Account" class="register_create_ac" /></td>
  </tr>
</table>

    </td>
  </tr>
<tr>
<td>&nbsp;</td>
</tr>
    </td>
  </tr>
</table>

		
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
                
            <div class="footer_ads_right"><a href="#"><img src="images/ads_banner_girl.png" width="277" height="226" /></a></div>
          </div>
        </div>
    </div>
    
    <?include('inner_footer.php');?>
    
</div>
</body>
</html>
