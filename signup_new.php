<?
include('constants.php');

include('facebook.php');// this line calls our facebook.php file that is the 
//core of PHP facebook API

function assign_rand_value($num){
// accepts 1 - 36
  switch($num){
    case "1":
     $rand_value = "a";
    break;
    case "2":
     $rand_value = "b";
    break;
    case "3":
     $rand_value = "c";
    break;
    case "4":
     $rand_value = "d";
    break;
    case "5":
     $rand_value = "e";
    break;
    case "6":
     $rand_value = "f";
    break;
    case "7":
     $rand_value = "g";
    break;
    case "8":
     $rand_value = "h";
    break;
    case "9":
     $rand_value = "i";
    break;
    case "10":
     $rand_value = "j";
    break;
    case "11":
     $rand_value = "k";
    break;
    case "12":
     $rand_value = "l";
    break;
    case "13":
     $rand_value = "m";
    break;
    case "14":
     $rand_value = "n";
    break;
    case "15":
     $rand_value = "o";
    break;
    case "16":
     $rand_value = "p";
    break;
    case "17":
     $rand_value = "q";
    break;
    case "18":
     $rand_value = "r";
    break;
    case "19":
     $rand_value = "s";
    break;
    case "20":
     $rand_value = "t";
    break;
    case "21":
     $rand_value = "u";
    break;
    case "22":
     $rand_value = "v";
    break;
    case "23":
     $rand_value = "w";
    break;
    case "24":
     $rand_value = "x";
    break;
    case "25":
     $rand_value = "y";
    break;
    case "26":
     $rand_value = "z";
    break;
    case "27":
     $rand_value = "0";
    break;
    case "28":
     $rand_value = "1";
    break;
    case "29":
     $rand_value = "2";
    break;
    case "30":
     $rand_value = "3";
    break;
    case "31":
     $rand_value = "4";
    break;
    case "32":
     $rand_value = "5";
    break;
    case "33":
     $rand_value = "6";
    break;
    case "34":
     $rand_value = "7";
    break;
    case "35":
     $rand_value = "8";
    break;
    case "36":
     $rand_value = "9";
    break;
  }
return $rand_value;
}

function get_rand_id($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,36);
   $rand_id .= assign_rand_value($num);
   }
  }
return $rand_id;
} 

// Create our Application instance.
$facebook = new Facebook(array(
  'appId' => '574274709277437',
  'secret' => '0414c5ba8b387cd7374f19031abf7568',
  'cookie' => true,
)); // all we are doing is creating an array for facebook to use with our 
//app id and app secret in and setting the cookie to true
try {
  $me = $facebook->api('/me');

  $logoutUrl = $facebook->getLogoutUrl(array(
		'next'	=> 'http://fabstage.swtpl.co.in/logout.php', // URL to which to redirect the user after logging out
		));
		
  $_SESSION['logout_url']=$logoutUrl;
} catch (FacebookApiException $e) {
  error_log($e);
} // this code is saying if the session to the app is created use 
//the $me as a selector for the information or die


//SIGNUP VIA FACEBOOK
if($me['first_name'] !=''){ 
	$fname =  $me['first_name'];
	$lname =  $me['last_name'];
	$email =  $me['email'];

	$sqldu = "Select * from fs_mamber WHERE email = '".$email."'";
	$resdu = q($sqldu);
	$countdu = nr($resdu);

	if($countdu == 0){
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
    <td><input class="register_input" type="text" onblur="if(this.value=='') this.value='Name';" value="<?=$fname.' '.$lname?>" onfocus="if(this.value=='Name') this.value='';" name="name" id="name"></td>
  </tr>
  <tr>
    <td class="register_headtext" valign="top">Email</td>
    <td class="register_headtext" valign="top">Username</td>
  </tr>
  <tr>
    <td valign="top"><input class="register_input" type="text" value="<?echo $me['email'];?>" name="email" id="email"/></td>
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
<?
	}else{
			
		$rowf = f($resdu);
			
			  //SET SESSION
              $_SESSION['fab_id'] = $rowf['fld_id'];
              $_SESSION['fab_username'] = $rowf['user_name'];
              $_SESSION['fab_email'] = $rowf['email'];
		      $_SESSION['work_as'] = $rowf['work_as'];


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

?>