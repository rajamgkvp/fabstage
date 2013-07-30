<?
include('../constants.php');

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
		                  header('Location: ../talent_dashboard.php');
		               }
					   else
						   if($work_as==2){
		                       header('Location: ../company_dashboard.php');
		                   }
						   else 
							   if($work_as==3){
		                            header('Location: ../client_dashboard.php');
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
	   header('Location: ../login.php?ms=fail');
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
		                  header('Location: ../talent_dashboard.php');
		               }
					   else
						   if($work_as==2){
		                       header('Location: ../company_dashboard.php');
		                   }
						   else 
							   if($work_as==3){
		                            header('Location: ../client_dashboard.php');
		                        }
   }
}
?>


<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FabStage</title>
<script type="text/javascript" src="js/html5.js" ></script>
<script src="js/jquery-1.8.0.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery_bxslider_v4_min.js"></script>


<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
<script type="text/javascript" src="js/tytabs.jquery.min.js"></script>
<script type="text/javascript">
<!--
$(document).ready(function(){
	$("#tabsholder").tytabs({
							tabinit:"2",
							fadespeed:"fast"
							});
	$("#tabsholder2").tytabs({
							prefixtabs:"tabz",
							prefixcontent:"contentz",
							classcontent:"tabscontent",
							tabinit:"3",
							catchget:"tab2",
							fadespeed:"normal"
							});
});
-->
</script>




<!--validation-->
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

		if(document.getElementById("term").checked == false){
			 errText += "- Please Accept Term & Conditions \n";
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


<link rel="stylesheet" type="text/css" href="css/flicker.css" media="screen" >
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <header>
    <!--TopBlackStrip Start-->
    <div class="TopBlackStrip">
      <div class="mainHolder">
        <ul class="loginBtn">
          <li><a href="#"><img src="images/facebook.png" alt="" /></a></li>
          <li><a href="#"><img src="images/twitter.png" alt="" /></a></li>
          <li class="login"><a href="../login.php">Login</a></li>
        </ul>
      </div>
    </div>
    <!--TopBlackStrip END-->
    <!--BIG Slider Start-->
    <div class="top-slider">
      <div class="flicker">
        <ul id="slider-top" class="multiple">
          <li><img src="images/slider1.jpg" height="616" /></li>
          <li><img src="images/slider2.jpg" height="616"/></li>
          <li><img src="images/slider3.jpg" height="616" /></li>
          <li><img src="images/slider4.jpg" height="616" /></li>
        </ul>
      </div>
    </div>
    <!--BIG Slider End-->
    <!--Navigation Start-->
    <nav class="Navigation">
      <div class="mainHolder">
        <logo><a href="/" title="FabStage"><img src="images/logo.png" alt=""></a></logo>
        <ul class="nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="../talent_search_result_front.php">Find Talent</a></li>
          <li><a href="../company_search_result.php">Companies &amp; Agencies</a></li>
          <li><a href="../job_search_result.php">Jobs </a></li>
		  <li><a href="../audition_search_result.php">Auditions</a></li>
          <li><a href="#">Ask &amp; Articles</a></li>
          <li><a href="#">Market Place Gallery</a></li>
        </ul>
      </div>
    </nav>
    <!--Navigation END-->
    <!--Search Box Start-->
    <div class="mainHolder">
      <div class="search-box">
        <article class="find-job-heading">
          <h2>Find Jobs or Hire Professionals </h2>
          <p>Fabstage is world's largest outsourcing marketplace, empowring entrepreneurs & small business worldwide.</p>
        </article>
        
        <div id="tabsholder">
			<ul class="tabs">
                <li id="tab1">Talent</li>
                <li id="tab2">Companies/Agencies</li>
                <li id="tab3">Jobs</li>
                <li id="tab4">Auditions</li>
            </ul>
           
			
			
			
			<div class="contents marginbot">
    
                <div id="content1" class="tabscontent">
                <form action="" id="form1" name="form1" method="post">
          <ul class="Category">
            <li>
              <select name="talent_category" value="Category" class="inputCategory">
                
				<option>Category</option>
              	<option>Category 1</option>
                <option>Category 2</option>
                <option>Category 3</option>
                <option>Category 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Category" class="inputCategory">
                <option>Category</option>
              	<option>Category 1</option>
                <option>Category 2</option>
                <option>Category 3</option>
                <option>Category 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Location" class="inputCategory">
                <option>Location</option>
              	<option>Location 1</option>
                <option>Location 2</option>
                <option>Location 3</option>
                <option>Location 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Gender" class="inputCategory2">
                <option>Male</option>
              	<option>Female</option>
              </select>
            </li>
          </ul>
         <input class="search-btn" type="image" src="images/search-btn.png" id="tab1"/>
        </form>
       </div>

<!-------Tab 1----------->

                <div id="content2" class="tabscontent">
    <form action="" method="post">
          <ul class="Category">
            <li>
              <select name="" value="Category" class="inputCategory">
                <option>Category</option>
              	<option>Category 1</option>
                <option>Category 2</option>
                <option>Category 3</option>
                <option>Category 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Category" class="inputCategory">
                <option>Category</option>
              	<option>Category 1</option>
                <option>Category 2</option>
                <option>Category 3</option>
                <option>Category 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Location" class="inputCategory">
                <option>Location</option>
              	<option>Location 1</option>
                <option>Location 2</option>
                <option>Location 3</option>
                <option>Location 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Gender" class="inputCategory2">
                <option>Male</option>
              	<option>Female</option>
              </select>
            </li>
          </ul>
          <!-- <a href="#" class="search-btn"><img src="images/search-btn.png" alt=""></a> -->
		  <input class="search-btn" type="image" src="images/search-btn.png" id="tab1"/>
        </form>
               </div>

<!----------------->

<!-------tab2----------->

                <div id="content3" class="tabscontent">
                <form action="" method="post">
          <ul class="Category">
            <li>
              <select name="" value="Category" class="inputCategory">
                <option>Category</option>
              	<option>Category 1</option>
                <option>Category 2</option>
                <option>Category 3</option>
                <option>Category 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Category" class="inputCategory">
                <option>Category</option>
              	<option>Category 1</option>
                <option>Category 2</option>
                <option>Category 3</option>
                <option>Category 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Location" class="inputCategory">
                <option>Location</option>
              	<option>Location 1</option>
                <option>Location 2</option>
                <option>Location 3</option>
                <option>Location 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Gender" class="inputCategory2">
                <option>Male</option>
              	<option>Female</option>
              </select>
            </li>
          </ul>
         <input class="search-btn" type="image" src="images/search-btn.png" id="tab1"/>
        </form>
                </div>

<!--------------->

<!---------tab3------->

                <div id="content4" class="tabscontent">
                <form action="" id="form1" name="form2" method="post">
          <ul class="Category">
            <li>
              <select name="" value="Category" class="inputCategory">
                <option>Category</option>
              	<option>Category 1</option>
                <option>Category 2</option>
                <option>Category 3</option>
                <option>Category 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Category" class="inputCategory">
                <option>Category</option>
              	<option>Category 1</option>
                <option>Category 2</option>
                <option>Category 3</option>
                <option>Category 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Location" class="inputCategory">
                <option>Location</option>
              	<option>Location 1</option>
                <option>Location 2</option>
                <option>Location 3</option>
                <option>Location 4</option>
              </select>
            </li>
            <li>
              <select name="" value="Gender" class="inputCategory2">
                <option>Male</option>
              	<option>Female</option>
              </select>
            </li>
          </ul>
         <input class="search-btn" type="image" src="images/search-btn.png" id="tab1"/>
        </form>
                </div>

<!------------->

            </div>
    </div>
        
        </form>
      </div>
    </div>
    <!--Search Box END-->
    <!--Talent Box start-->
    <div class="talentBox">
      <div class="mainHolder">
        <ul class="talent">
          <li>
            <div class="talent-digit"><a href="#">10,000</a></div>
            <p>Talent</p>
          </li>
          <li>
            <div class="talent-digit"><a href="#">500</a></div>
            <p>Companies</p>
          </li>
          <li>
            <div class="talent-digit"><a href="#">3,278</a></div>
            <p>Jobs</p>
          </li>
          <li>
            <div class="talent-digit"><a href="#">2,344</a></div>
            <p>Requirements</p>
          </li>
        </ul>
      </div>
    </div>
    <!--Talent Box END-->
  </header>
  <div class="mainHolder">
   <!--Buttons Start--> <div class="sumbitFile">
      <ul class="SubmitBox">
        <li>
          <h3><a href="#">Submit Portfolio</a></h3>
          <p> to get hired</p>
        </li>
        <li>
          <h3><a href="#">Post Job</a></h3>
          <p>Auditions/Contests </p>
        </li>
        <li>
          <h3><a href="#">Post Requirements</a></h3>
          <p>as Client Visitors</p>
        </li>
      </ul>
    </div><!--Buttons END-->
    
  <!--LHS MAIN Box Start-->
	<div class="contentCont">
      <div class="lhs">
        <!--Latest Job Start-->


        <aside class="letestJob">
          <h2>Latest Jobs</h2>
         
		  
		  <ul id="latest-jobs" class="multiple">


          <?
		     $query_select = "select * from fs_job order by fld_id desc limit 20";
			 $run = q($query_select);
			 $i = 1;
			 while($fatch = f($run)){
				 if($i%2!=0){

				$select_company_name= "select name from fs_mamber where fld_id='".$fatch['company_id']."'";
				$run_company_name = q($select_company_name);
				$fatch_company_name = f($run_company_name);
		  ?>
         
		 <li> 
		  <figure class="job-profile">
            <h4><?=$fatch['title']?></h4>
            <div class="job-logo"><a href="#"><img src="images/job-logo.jpg" alt=""></a></div>
            <figcaption class="com-summery"><a href="#" class="com-neme"> <?=$fatch_company_name['name']?></a><br>
              <b>Work Location:</b> <?=$fatch['interview_venue']?> <br>
              <b>Need:</b> <?=substr($fatch['main_skill'],1)?><br>
              <a href="#" class="Apply">Apply Now</a></figcaption>
          </figure>
         <?}else{?>
		  
		  <figure class="job-profile jp-brdr">
            <h4><?=$fatch['title']?></h4>
            <div class="job-logo"><a href="#"><img src="images/job-logo.jpg" alt=""></a></div>
            <figcaption class="com-summery"><a href="#" class="com-neme"> <?=$fatch_company_name['name']?></a><br>
              <b>Work Location:</b> <?=$fatch['interview_venue']?> <br>
              <b>Need:</b> <?=substr($fatch['main_skill'],1)?><br>
              <a href="#" class="Apply">Apply Now</a></figcaption>
          </figure>
        </li>

        <?}
		$i=$i+1;}?> 

          </ul>
        </aside>






        <!--Latest Job END-->       
      </div>
      <!--LHS MAIN Box END-->
      
      <!--RHS MAIN Box Start-->
      <div class="rhs">
        <aside class="RHS-White-Box">
          <h2>To Hire Professionals Register Here</h2>
		  <form id="regform" name="regform" autocomplete="off" method="post" action="" onsubmit="return validateform();"> 
          <ul class="Register-from">
            <li><div align="center"><?=$msg?></div>
               <select class="sign-input-work" name="type" id="type">
                        	<option value=""> Select Your Mamber Type </option>
							<option value="1">Talent</option>
                            <option value="2">Company</option>
                            <option value="3">Client</option>
                        </select>


            
            </li>
            <li>
              <input type="text" class="sign-input-name" onblur="if(this.value=='') this.value='Name';" value="Name" onfocus="if(this.value=='Name') this.value='';" name="name" id="name">
            </li>
            <li>
              <input type="text" onblur="if(this.value=='') this.value='Email';" value="Email" onfocus="if(this.value=='Email') this.value='';" name="email" id="email" class="sign-input-email">
            </li>
            <li>
              <input type="text" onblur="if(this.value=='') this.value='User Name';" value="User Name" onfocus="if(this.value=='User Name') this.value='';" name="user_name" id="user_name" class="sign-input-user">
            </li>
            <li>
        
            </li>
            <li>
              <input type="password" onblur="if(this.value=='') this.value='Password';" value="Password" onfocus="if(this.value=='Password') this.value='';" name="password" id="password" class="sign-input-pass">
            </li>
            <li class="terms">
              <input type="checkbox" id="term" name="term" value="1"> <a href="#">Terms and Conditions</a></li>

            <li class="btn" > <input type="image" name="submit" id="submit" src="images/sign-in.png" alt=""> <a href="#" class="login-btn"><img src="images/login.png" alt=""></a> </li>
          </ul>
		  </form>
        </aside>
        
      </div>
      <!--RHS MAIN Box END-->
    </div>
    
    <div class="contentCont"> <!--Top Recruiters Start-->
        <div class="Top-Recruiters">
          <h2>Top Recruiters</h2>
	    <div class="recruiters-slider">
      <div class="flicker">
        <ul id="recruiters-slider" class="multiple">
            <?
			  $mamber = "select * from fs_mamber where work_as=2 order by fld_id desc limit 50";
			  $run_mamber_select = q($mamber);
			  while($fatch_select_mamber = f($run_mamber_select)){
			?>

               <li><img src="images/images.jpg" width="85" width="112" title="<?=$fatch_select_mamber['name']?>"/></li>
          
		     <?}?>


        </ul>
      </div>
    </div>
        </div>
        <!--Top Recruiters Start--> <div class="rhs"><aside class="RHS-White-Box">
          <h2>Testimonials</h2>
          <!--BIG Slider Start-->
          <div class="top-slider Testimonials">
            <div class="flicker">
              <ul id="testimonials" class="multiple">
                <li><a href="#" class="test-img"><img src="images/sonia.png" alt=""></a>
                  <h4>Sonia Sapra</h4>
                  <p>Add a spoon full of sugar to your wardrobe with Dower & Hall’s pretty new Add a spoon full of sugar to  pretty new ...</p>
                </li>
                <li><a href="#" class="test-img"><img src="images/sonia.png" alt=""></a>
                  <h4>Sapra Sonia Sapra</h4>
                  <p>Add a  wardrobe with Dower & Hall’s pretty new Add a spoon full of sugar to  with Dower & Hall’s pretty new ...</p>
                </li>
                <li><a href="#" class="test-img"><img src="images/sonia.png" alt=""></a>
                  <h4>Shakti Sonia Sapra</h4>
                  <p>Add a spoon full of sugar to your  Hall’s pretty new Add a spoon full of sugar to  with Dower & Hall’s pretty new ...</p>
                </li>
                <li><a href="#" class="test-img"><img src="images/sonia.png" alt=""></a>
                  <h4>Web Sapra Sonia</h4>
                  <p>Add a spoon full of sugar to your  Dower & Hall’s pretty new Add a spoon full of sugar to  with Dower & Hall’s pretty new ...</p>
                </li>
              </ul>
            </div>
            <br clear="all"/>
            <a class="Apply fr" href="#">Read More</a> </div>
          <!--BIG Slider End-->
        </aside></div></div>
        
        <div class="contentCont"> <!--Top Recruiters Start-->
        <div class="Top-Recruiters" style="width:970px;	">
          <h2>Latest Talent</h2>
	    <div class="recruiters-slider">
      <div class="flicker" style="width:880px;">
        <ul id="talent" class="multiple">
             <?
			  $mamber = "select * from fs_mamber where work_as=1 order by fld_id desc limit 50";
			  $run_mamber_select = q($mamber);
			  while($fatch_select_mamber = f($run_mamber_select)){
			?>


                  <li><img src="images/images.jpg" width="77" height="102" ></li>
           <?}?>

          
        </ul>
      </div>
    </div>
        </div>
        <!--Top Recruiters end-->
       </div>
        
        
        <!--Upcoming event Start-->
<div class="upcoming_event">
			<!--Upcoming event Start-->
            <div class="events">
            <h2>Upcoming Events</h2>
        	<!--<div class="upcoming_event_area"><a href="#"><img src="images/upcoming_banner.png" alt="" ></a></div>-->
            
            
            <div id="alpha_wrapper">
   
    <div id="alpha_2">

    </div><!-- alpha_2 ends -->
   
    <div id="text_holder_2">
   		<a href="#"><img src="images/upcoming_banner.png" alt="" width="580" height="226" ></a>
    </div><!-- text_holder_2 ends -->

</div>
            
            </div>
            <!--Upcoming event end-->
            
            <!--Latest Talent Start-->
            <div class="lates_talent">
            <h2>Latest Talent</h2>
            <div id="slider-top3" class="multiple">

                
                <div id="latest_talent_area_wrapper">
                <div id="latest_talent_area"> </div><!-- alpha_2 ends -->
                <div id="latest_talent_areatext_holder_2"> <a href="#"><img src="images/latest_talent_banner.png" alt="" width="277" ></a>
                </div><!-- text_holder_2 ends -->
                </div>
                <div id="latest_talent_area_wrapper">
                <div id="latest_talent_area"> </div><!-- alpha_2 ends -->
                <div id="latest_talent_areatext_holder_2"> <a href="#"><img src="images/latest_talent_banner.png" alt="" width="277" ></a>
                </div><!-- text_holder_2 ends -->
                </div>
                <div id="latest_talent_area_wrapper">
                <div id="latest_talent_area"> </div><!-- alpha_2 ends -->
                <div id="latest_talent_areatext_holder_2"> <a href="#"><img src="images/latest_talent_banner.png" alt="" width="277" ></a>
                </div><!-- text_holder_2 ends -->
                </div>
                
                
            </div>
            <!--Latest Talent end-->
    </div>
       <!--Upcoming event end-->
    
    
  </div>
  
  </div>
  <!--main footer Start-->
  <footer>
    <div class="mainHolder">
    	<!--footer links Start-->
    	<div class="main_footer">
        	<!--home link Start-->
        	<div class="footer_link">
            	<h2>Home Links</h2>
                <ul>
                <li><a href="#">Home</a></li>
				<li><a href="#">Find Talent</a></li>
				<li><a href="#">Companies & Agencies</a></li>
				<li><a href="#">Jobs & Auditions</a></li>
				<li><a href="#">Ask & Articles</a></li>
				<li><a href="#">Market Place</a></li>
				<li><a href="#">Gallery</a></li>
                </ul>
            </div>
            <!--home link end-->
            
            <!--footer link Start-->
            <div class="footer_link">
            	<h2>Footer Links</h2>
                <ul>
                <li><a href="#">Models</a></li>
				<li><a href="#">AgenciesP</a></li>
				<li><a href="#">hotographers</a></li>
				<li><a href="#">Castings</a></li>
				<li><a href="#">Membership</a></li>
				<li><a href="#">Blogs</a></li>
				<li><a href="#">Community</a></li>
                </ul>
            </div>
            <!--footer link end-->
            
            <!--important link Start-->
            <div class="footer_link" style="border:none;">
            	<h2>Important Links</h2>
                <ul>
                <li><a href="#">About Us</a></li>
				<li><a href="#">Company Details</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">Privacy Policy</a></li>
				<li><a href="#">Trems of Use</a></li>
                </ul>
            </div>
            <!--important link end-->
        </div>
        <!--footer links end-->
        
        
        <!--copyright footer Start-->
        <div class="bottom_footer">
        	<!--copyright left Start-->
        	<div class="bottom_logo_area">
            	<div class="bottom_logo"><A href="#"><img src="images/fabstage_footer_logo.png" alt="" ></A></div>
                <div class="copyright">@ 2013 - fabstage.com, All Rights reserved</div>
            </div>
            <!--copyright left end-->
            
            <!--copyright right Start-->
            <div class="followus_area">
            	<div class="join_in">
                	<input class="join_input" type="text" onBlur="if(this.value=='') this.value='Your email address...';" value="Your email address..." onFocus="if(this.value=='Your email address...') this.value='';" name="firstname">
                    <input name="" value="Join in" type="button" class="joinin_btn">
                </div>
          <div class="follow_us">
                	<div class="follow_us_text">Follow Us</div><a href="#"><img src="images/f_ivon.png" alt="" ></a> <a href="#"><img src="images/t_icon.png" alt=""></a> <a href="#"><img src="images/in_icon.png" alt=""></a>
            </div>
            </div>
            <!--copyright right Start-->
        </div>
        <!--copyright footer end-->
        
    </div>
  </footer>
  <!--main footer end-->
</div>
<script type="text/javascript" src="js/boxslider-verival.js"></script>
</body>
</html>
