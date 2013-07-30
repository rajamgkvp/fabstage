<?
include('constants.php');

if(isset($_REQUEST['username']) && trim($_REQUEST['username'])!=''){

$sql_login = "select * from fs_mamber where (user_name = '".$_REQUEST['username']."' OR email = '".$_REQUEST['username']."') and password = '".$_REQUEST['password']."'";
$res_login = q($sql_login);
$count = nr($res_login);
if($count==1){
$row_login = f($res_login);

if($row_login['fld_status'] ==0){
$msg = 'Your Account has not been Activated. Please check your mail to Activate the Account. ';

}else if($row_login['fld_status'] ==2){

$msg = 'Your Account has been Blocked. Please Contact to the Admin. ';
} else{

//SET SESSION
        $_SESSION['fab_id'] = $row_login['fld_id'];
        $_SESSION['fab_username'] = $row_login['fld_username'];
        $_SESSION['fab_email'] = $row_login['fld_email'];
		$_SESSION['work_as'] = $row_login['work_as'];


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
 

}else{
//unsucessfully login
//$msg = 'Wrong Usename / Password. Please Try Again.';
header('Location: login.php?ms=fail');

}


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<script src="js/stuHover.js" type="text/javascript"></script>
<script type="text/javascript">
	var GB_ROOT_DIR = "greybox/";
</script>

<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />



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

			if(document.upload_form.username.value == "") {
				 errText += "- Please Enter Username.\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.username.focus();
				 return false;
			}
			if(document.upload_form.password.value == "") {
				 errText += "- Please Enter Password.\n";
				 alert(errText);
				 errorflag = true;
				 document.upload_form.password.focus();
				 return false;
			}
			
			
			if(errorflag==true) {
				return false;
			} else {
				return true;
			}
		}
	</script>
<!-- facebook login -->



<!-- facebook login -->


</head>

<body>
<div id="main_container">
	<?include('top_signup.php');?>
    <div>
    	<div class="main_body_area">
                        <div class="left_area">
                     
                        </div>
<div class="center_body" style="width:1000px; background:#ededed; margin-left:0px; padding:0px;">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
    		<table width="700" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td class="register_here_head" style="text-align:left;">Sign in to FabStage</td>
              </tr>
              <tr>
                <td class="register_here_head2">Use Facebook, Twitter or your email to sign in.<br />
Don't have a FabStage account yet? No worries, <a style="color:#42b3e5;">joining</a> is easy.</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
               <form method="post" action="" name="login" onsubmit="return validate()" autocomplete="off"> 
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" style="border-right:1px #fff solid;">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <!-- <td><a href="#"><img src="images/fb_icon.jpg" width="304" height="43" /></a></td> -->
	<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '574274709277437', // App ID
    channelUrl : 'channel.html', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
      document.location.href="signup_new.php?lg=fb";
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
    });
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses the JavaScript SDK to
  present a graphical Login button that triggers the FB.login() function when clicked.

  Learn more about options for the login button plugin:
  /docs/reference/plugins/login/ -->

<fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="#"><img src="images/twit_icon.jpg" width="304" height="43" /></a></td>
  </tr>
</table>

    </td>
    <td width="50%" style="border-left:1px #c0c0c2 solid; padding-left:20px;">
   
    	<table width="100%" border="0" cellspacing="6" cellpadding="0">
        <?
		if($_REQUEST['canndidateconf']=='y'){	  
		?>
          <tr>
            <td align="center" style="color:#2CA025;font-size:12px;font-family:arial"><strong>Congratulation!!! Your Account has been  Activated sucessfully. Please Login.</strong></td>
          </tr>
          <? }else if($_REQUEST['canndidateconf']=='n'){ ?>
          <tr>
            <td align="center" style="color:#FF0000;font-size:12px;font-family:arial"><strong>Your Account has not been Activated. Please check your mail to Activate the Account.</strong></td>
          </tr>
          <?
			}else if($_REQUEST['canndidateconf']=='w'){
		  ?>
          <tr>
            <td align="center" style="color:#FF0000;font-size:12px;font-family:arial"><strong>Sorry!!! Your Account has not been Activated. Please Contact to Admin.</strong></td>
          </tr>
          <?
			 }else if($msg!=''){
			  ?>
          <tr>
            <td align="center" style="color:#FF0000;font-size:12px;font-family:arial;"><strong><?=$msg?></strong></td>
          </tr>
          <?
			  }else {

			  ?>
			  <!--<tr>
				<td>&nbsp;</td>
			  </tr>-->
			  <?
			}	  
			  ?>
			  <!-- Login Fail Message -->
			  <?
				 if($_REQUEST['ms']=='email'){	  
			  ?>
          <tr>
            <td align="center" style="color:red;font-size:12px;font-family:arial"><strong>- Username is Blank. Please enter Username.</strong></td>
          </tr>
          <? }else if($_REQUEST['ms']=='pass'){ ?>
          <tr>
            <td align="center" style="color:red;font-size:12px;font-family:arial"><strong>- Password Field is Blank.Please enter Password</strong></td>
          </tr>
          <? }else if($_REQUEST['ms']=='fail'){ ?>
          <tr>
            <td align="center" style="color:red;font-size:12px;font-family:arial"><strong>- Username or Password not match to any Profile.<br/>- Make sure that it is typed correctly.</strong></td>
          </tr>
          <? } ?>
          <tr>
            <td class="register_headtext">Username</td>
          </tr>
          <tr>
            <td><input type="text" value=""  class="register_input"  id="username" name="username" size="35" /></td>
          </tr>
          <tr>
            <td class="register_headtext">Password</td>
          </tr>
          <tr>
            <td><input type="password" value="" class="register_input" id="password" name="password" size="35" /></td>
          </tr>
          <tr>
            <td valign="top" class="tick_text" style="color:#000000;font-size:12px; font-family: arial">Not a Registed Member ? <a  style="color: #866678;cursor: pointer;" href="signup.php" title="Create Account"><u><strong>Click Here</strong></u></a>




					  </td>
          </tr>  
		  
		  <tr>
		    <td> <a href="forgot_password.php" title="Forgot your Password?" style="font-family: calibri; font-size: 16px; color: #bd6d15" rel="gb_page_center[400, 300]"><u><strong>Forget Password</strong></u></a></td>
		  </tr>
        </table>
        

    </td>
  </tr>
</table>

                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
            <td bgcolor="#fff"><input type="submit" name="submit" value="login" class="register_create_ac" /></td>
          </tr>
          </form>
          <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
          </table>
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
