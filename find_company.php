<?
include('constants.php');
include_once('paging1.php');
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

if($_REQUEST['username']!=""){
		             
   $query = "select * from fs_mamber where user_name = '".$_REQUEST['username']."' and password = '".$_REQUEST['login_password']."' AND fld_status=1";
   $run = q($query);
   $num = nr($run);
   if($num==0)
   {
	   header('Location: login.php?ms=fail');
   }
   else
   {
	    $row_login = f($run);
   
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
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FabStage.Com</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<link href="css/dropdown.linear.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/default.ultimate.linear.css" media="screen" rel="stylesheet" type="text/css" />
<link href="paging.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/slider.css" />


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
<SCRIPT language=JavaScript>
    function validateform1()
	{
		var errText = "";
		var errorflag = false;
		//alert('test new function');

		errText += "There are following error(s):\n\n";
		

		if(document.getElementById("login_email").value == "Email Address" ){
			 errText += "- Please enter your Email\n";
			 errorflag = true;
		} else if(document.getElementById("login_email").value != ""){
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(document.getElementById("login_email").value)){
					errorflag = false;	
			}else{
			errText += "- Please Enter currect email address\n";
			errorflag = true;	
			}
		}

		if(document.getElementById("login_password").value == "Email Address" ){
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
	<form id="logform" name="logform" autocomplete="off" method="post" action="" onsubmit="return validateform1();">
	<div>
    	<div class="header">
        	<div class="fabstage_logo"><a href="#"><img src="images/fabstage_logo.png" /></a></div>
		  <?
		    if($_SESSION['fab_id']=='')
			{
		  ?>
          <div class="header_right">
          <div>

                <input class="head_input" type="text" onblur="if(this.value=='') this.value='Username';" value="Username" onfocus="if(this.value=='Username') this.value='';" name="username" id="username">

                <input class="head_input" type="password" onblur="if(this.value=='') this.value='Email Address';" value="Email Address" onfocus="if(this.value=='Email Address') this.value='';" name="login_password" id="login_password">

                <input class="head_signin" name="" type="submit" value="Sign In" />
                <div class="head_login">Login with:</div> 
                <div class="head_fb"><a href="#"><img src="images/f_login.png" /></a></div>
              </div>
              
          <div class="header_forgot">
              	<div class="head_loggedin"><input class="head_checkbox" name="" type="checkbox" value="" /> Keep me logged in</div>
          <div class="head_loggedin"><a href="#">Forgot Your Password ?</a></div>
              </div>
              
              <div class="head_like"><a href="#"><img src="images/head_like.png" /></a></div>
          </div>
          <?
			}		  
		  ?>
        </div>
    </div>
   </form> 
    <div class="navigation">
    <div class="nav">
    <ul id="nav" class="dropdown dropdown-linear">
	<li><a href="./" class="dir">Home</a></li>                                                            
	<li><a href="./" class="dir">Find Talent</a></li>
	<li><a href="./" class="dir">Companies & Agencies</a></li>
	<li><a href="./" class="dir">Jobs & Auditions</a></li>
	<li><a href="./" class="dir">Ask & Articles</a></li>
	<li><a href="./" class="dir">Market Place</a></li>
	<li><a href="./" class="dir" style="background:none;">Gallery</a></li>
	 <?
		    if($_SESSION['fab_id']!='')
			{
	?>
	<li><a href="logout.php" class="dir" style="background:none;">Logout</a></li>
	<?
			}	
	?>
	</ul></div>
    </div>
    
    <div>
    	<div class="main_body">
        	<div class="body_left">
            	<div class="talent_area">
                	<div class="talent_text">
                    	<h1><a href="#">10,000</a></h1>
                        <h2>Talent</h2>
                    </div>
                    <div class="talent_text">
                    	<h1><a href="#">500</a></h1>
                        <h2>Companies</h2>
                    </div>
                    <div class="talent_text">
                    	<h1><a href="#">3,278</a></h1>
                        <h2>Jobs</h2>
                    </div>
                    <div class="talent_text">
                    	<h1><a href="#">2,344</a></h1>
                        <h2>Requirements</h2>
                    </div>
                </div>
           
            
            <div class="talent_tab_area">
            <link rel="stylesheet" type="text/css" href="css/tabcontent.css" />

<script type="text/javascript" src="js/tabcontent.js"></script>
            <div class="seller-prod-box">
       
        <div class="toptabbg">
        <div id="flowertabs" class="modernbricksmenu2">
        <ul>
            <li><a href="#" rel="tcontent1" class="selected"><span>Talent</span></a></li>
            <li><a href="#" rel="tcontent2"><span>Companies/Agencies</span></a></li>
             <li><a href="#" rel="tcontent3"><span>Jobs</span></a></li>
              <li><a href="#" rel="tcontent4"><span>Auditions</span></a></li>
        </ul>
        </div>
        </div>
            
     <div style="clear: left"></div>
    
	    </div>
        
<!--<script type="text/javascript">
var countries=new ddtabcontent("countrytabs")
countries.setpersist(true)
countries.setselectedClassTarget("link") //"link" or "linkparent"
countries.init()
</script>-->
<script type="text/javascript">

var myflowers=new ddtabcontent("flowertabs")
myflowers.setpersist(true)
myflowers.setselectedClassTarget("link") //"link" or "linkparent"
myflowers.init()

</script>
            </div>
            
            
          
			
			
			
			
			
			
			
			
			
			
			
			
            
            
			
			
			
			<div>
            <div class="title_head">Talent List</div>
            <div class="latest_job_area">
       	 
		  
		  <?

                if($_REQUEST['page'] == '' || $_REQUEST['page'] == 1){
				$limit = "LIMIT 0,5";
			    }else if($_REQUEST['page'] > 1){
				$off = ($_REQUEST['page']-1)*5;
				$value = 5;
				$limit = "LIMIT ".$off.",".$value." ";

				}     

                 $sql="SELECT * FROM fs_company where main_skill !='' " .$limit;
	             $res=q($sql);
	             $count=nr($res);
	             if($count>0)
	              {
	                 while($fatch_talent=f($res))
		               {


				$skill = str_replace(",,",",",$fatch_talent['main_skill']);
				$skill = substr($skill,1,-1);

				
		  ?>
		  
		  
		  <div class="job_content">
                	<h1><b><?=ucwords($fatch_talent['company_name'])?></b> [<?=$skill?>]</h1>
                    <div class="job_content_img"><img src="images/jobs_logo.png" width="100" height="88" /></div>
                    <div class="job_details">
						   <table> 
						            
									<!-- <tr><td><h2>Expertise: <?if($fatch_talent['expertise']!=''){echo ucwords($fatch_talent['expertise']);}else{?>Not Available <?}?></h2><tr><td> -->
									

									<tr><td><h5>Work Area: <span><?if($fatch_talent['work_area']!=''){echo ucwords($fatch_talent['work_area']);}else{?>Not Available <?}?></span></h5><tr><td>

									

									<tr><td><h5>Expectation: <span><?if($fatch_talent['expectation']!=''){echo ucwords($fatch_talent['expectation']);}else{?>Not Available <?}?></span></h5><tr><td>

									

									<tr><td><h5>About: &nbsp;&nbsp;&nbsp;<span><?if($fatch_talent['summary']!=''){echo ucfirst(substr($fatch_talent['summary'],0,100));}else{?>Not Available <?}?></span></h5><tr><td>

									
<!-- 
									<tr><td><h5>Nationality: <span><?if($fatch_talent['nationality']!=''){echo ucwords($fatch_talent['nationality']);}else{?>Not Available <?}?></span></h5><tr><td> -->
									
						  </table>
                    </div>
                    <div class="apply_btn_area">
                    	<!-- <div class="job_apply"><a href="#">View Details</a></div>
                        <div class="job_apply"><a href="#">Apply</a></div> -->
                    </div>
                </div>

    
	  
	  <?
	  
	  
	       }
		$x++;?>
		<div class="job_content">
		<tr>
		<td colspan="2" height="10px" style="color: #B00000">
								<?
								 $sqlag = "SELECT * FROM fs_company where main_skill!=''";
						   
									$rescs = q($sqlag);
									 $countcs = nr($rescs);
									if($countcs >5){
										doPages(5, 'find_company.php', '', $countcs); 
									}
								?>
		</td>
	</tr>

				<?  }

				

	  
	  
	  
	else
	{
		?>
		<tr bgcolor="#CCCCFF">
		  <td colspan="2" style="font-family:arial;padding:5px 5px 5px 5px"><span style="font-size:14px;font-family:arial"><b>Any Company not found.... </b></span></td>
	    </tr>
		<?
	}
	?>

</div>
                
               
            </div>
            </div>


</div>
       </div>
            
                  
             <!-------Register Here----------->
      <form id="regform" name="regform" autocomplete="off" method="post" action="" onsubmit="return validateform();"> 
            <div class="body_right">
            	<div>
				 
                	<div class="register_area">To get Jobs or Hire Professionals Register Here</div>
                    <div class="register_form">
					    <div align="center"><?=$msg?></div>
                    	<select class="register_select" name="type" id="type">
                        	<option value="">-- Select Your Mamber Type --</option>
							<option value="1">Talent</option>
                            <option value="2">Company</option>
                            <option value="3">Client</option>
                        </select>
                    	<input class="register_input" type="text" onblur="if(this.value=='') this.value='Name';" value="Name" onfocus="if(this.value=='Name') this.value='';" name="name" id="name">
                        <input class="register_input" type="text" onblur="if(this.value=='') this.value='Email';" value="Email" onfocus="if(this.value=='Email') this.value='';" name="email" id="email">
						<input class="register_input" type="text" onblur="if(this.value=='') this.value='User Name';" value="User Name" onfocus="if(this.value=='User Name') this.value='';" name="user_name" id="user_name">
                        <input class="register_input" type="password" onblur="if(this.value=='') this.value='Password';" value="Password" onfocus="if(this.value=='Password') this.value='';" name="password" id="password">

                        <input class="register_signin" value="Sign Up"  type="submit" />
                        <div class="head_login">Login with:</div> 
                		<div class="head_fb"><a href="#"><img src="images/f_login.png" /></a></div>
						
                    </div>
                </div>
			</form>
			 <!-------Register Here End--------->
                           
                <div>
                <div class="latest_contest">Latest Contests</div>
                <div class="contest_area">
                	<a href="#"><img src="images/contest_img1.png" width="268" /></a>
                    <a href="#"><img src="images/contest_img2.png" width="268" /></a>
                    <a href="#"><img src="images/contest_img3.png" width="268" /></a>
                    <span><a href="#">View All</a></span>
                </div>
                </div>
                
                <div>
                <div class="latest_contest">Job Alerts / Newsletters</div>
                <div class="contest_area">
                	<input class="newsletter_input" name="" type="text" />
                    <input class="newsletter_go" name="" type="button" value="GO" />
                </div>
                </div>
                
                <div style="margin-top:6px; margin-bottom:6px; float:left;">
           	    <a href="#"><img src="images/ads_banner.png" width="277" height="128" /></a>
                </div>
                
                <div>
                 <div class="title_head">Tastimonials</div>
              	 <div class="testimonials_area">
                 	<h1>Sonia Sapra</h1>
                    <p>CR Model Management & Scouting the placement agency that successfully established a worldwide network by helping.</p>
		        	<img src="images/testimonial_img1.png" width="89" height="90" />
                 </div>
                 <div class="testimonials_area">
                 	<h1>Sonia Sapra</h1>
                    <p>CR Model Management & Scouting the placement agency that successfully established a worldwide network by helping.</p>
		        	<img src="images/testimonial_img2.png" width="89" height="90" />
                 </div>
              	 <div class="testimonials_area" style="border:none;">
                 	<h1>Sonia Sapra</h1>
                    <p>CR Model Management & Scouting the placement agency that successfully established a worldwide network by helping.</p>
		        	<img src="images/testimonial_img3.png" width="89" height="90" />
                 </div>
               </div>
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
