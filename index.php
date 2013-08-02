<?php
include('constants.php');
include('loginHeader.php');

?>


<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FabStage</title>
  

<script type="text/javascript" src="newhome/js/html5.js" ></script>
<script src="newhome/js/jquery-1.8.0.js" type="text/javascript"></script>
<script type="text/javascript" src="newhome/js/jquery_bxslider_v4_min.js"></script>


<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
<script type="text/javascript" src="newhome/js/tytabs.jquery.min.js"></script>
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

 <script>

            function getXMLHTTP() { //fuction to return the xml http object
                var xmlhttp=false;    
                try{
                    xmlhttp=new XMLHttpRequest();
                }
                catch(e) {    
                    try{    
                        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    catch(e){
                        try{
                            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                        }
                        catch(e1){
                            xmlhttp=false;
                        }
                    }
                }
                return xmlhttp;
                }
</script>
<script type="text/javascript" src="ajax.js"></script>

<script>
            function getform(){    
                                            
                var strURL='check_user.php?pno='+encodeURI(document.getElementById('user_name').value);
                    //alert(strURL);
                    var req = getXMLHTTP();
                    if (req) {
                        document.getElementById('statuscat1').innerHTML='<img src="../images/ld.gif">';    
                        req.onreadystatechange = function() {
                        if (req.readyState == 4) {
                            // only if "ok"
                            if (req.status == 200) {
                            //alert(req.responseText);                                            
                            document.getElementById('statuscat1').innerHTML=req.responseText;
                            
                            } else {
                                alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                                }
                        }                
                        }            
                        req.open("GET", strURL, true);
                        req.send(null);
                    }
            }

   </script>

<!-----check email--------->
    
     <script>
            function getform1(){    
                                            
                var strURL='check_email.php?pno='+encodeURI(document.getElementById('email').value);
                    //alert(strURL);
                    var req = getXMLHTTP();
                    if (req) {
                        document.getElementById('statuscat').innerHTML='<img src="../images/ld.gif">';    
                        req.onreadystatechange = function() {
                        if (req.readyState == 4) {
                            // only if "ok"
                            if (req.status == 200) {
                            //alert(req.responseText);                                            
                            document.getElementById('statuscat').innerHTML=req.responseText;
                            
                            } else {
                                alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                                }
                        }                
                        }            
                        req.open("GET", strURL, true);
                        req.send(null);
                    }
            }

   </script>



<!------ open login on -------------------->
<script>
function login(){
	winparam = 'width=840,height=300,scrollbars=1,left=340,top=60,screenX=240,screenY=210';
	//window.open('login.php',winparam);
	window.open('login_page.php','',winparam);
}
</script>


<!----------------------------->

<link rel="stylesheet" type="text/css" href="newhome/css/flicker.css" media="screen" >
<link href="newhome/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <header>
    <!--TopBlackStrip Start-->
    <div class="TopBlackStrip">
      <div class="mainHolder">
        <ul class="loginBtn">

		  <?
		    if($_SESSION['fab_id']!=''){
				  if($_SESSION['work_as']==1){
		                  echo '<li class="login"><a href="talent_dashboard.php">Go Dashboard</a></li>';
		               }
					   else
						   if($_SESSION['work_as']==2){
		                       echo '<li class="login"><a href="company_dashboard.php">Go Dashboard</a></li>';
		                   }
				?>
               
               <li class="login"><a href="logout.php">Logout</a></li>

		  <?}else{
		  ?>
          <li><a href="#"><img src="newhome/images/facebook.png" alt="" /></a></li>
          <li><a href="#"><img src="newhome/images/twitter.png" alt="" /></a></li>
		  <li class="login"><a href="signup.php">Register Now</a></li>
          <!-- <li class="login"><a  href="#" onClick="javascript:login()">Login</a></li> -->
          <li class="login"><a  href="login.php" >Login</a></li> 
		 <?}?>   
        </ul>
      </div>
    </div>
    <!--TopBlackStrip END-->
    <!--BIG Slider Start-->
    <div class="top-slider">
      <div class="flicker">
        <ul id="slider-top" class="multiple">
          <li><img src="newhome/images/slider1.jpg" height="616" /></li>
          <li><img src="newhome/images/slider2.jpg" height="616"/></li>
          <li><img src="newhome/images/slider3.jpg" height="616" /></li>
          <li><img src="newhome/images/slider4.jpg" height="616" /></li>
        </ul>
      </div>
    </div>
    <!--BIG Slider End-->
    <!--Navigation Start-->
    <nav class="Navigation">
      <div class="mainHolder">
        <logo><a href="/" title="FabStage"><img src="newhome/images/logo.png" alt=""></a></logo>
        <ul class="nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="talent_search_result_front.php">Find Talent</a></li>
          <li><a href="company_search_result.php">Companies &amp; Agencies</a></li>
          <li><a href="job_search_result.php">Jobs </a></li>
	  <li><a href="audition_search_result.php">Auditions</a></li>
          
        </ul>
      </div>
    </nav>
    <!--Navigation END-->
    <!--Search Box Start-->
    <div class="mainHolder">
      <div class="search-box">
        <article class="find-job-heading">
          <h2>Find Jobs or Hire in Entertainment & Glamour Industry </h2>
          <p>Fabstage is world's largest marketplace, empowering Talents ,Companies and Agencies in Entertainment and Glamour business worldwide.</p>
        </article>
        
        <div id="tabsholder">
			<ul class="tabs">
                <li id="tab1">Talent</li>
                <li id="tab2">Companies/Agencies</li>
                <li id="tab3">Jobs</li>
                <li id="tab4">Auditions</li>
            </ul>
           
			
			
			
<div class="contents marginbot">
    <!----------talent search------------->
  <div id="content1" class="tabscontent">
     <form action="" id="form1" name="form1" method="post">
          <ul class="Category">
            <li>
              <select name="talent_category" id="talent_category"  class="inputCategory">
			 <option value=""><b>Select Category</b></option>

				   <?
				  $sql_c = "select * from fs_category order by category_name asc";
				  $sql_run_c = q($sql_c);
				  while($fatch_c =  f($sql_run_c)){ ?>
				  

				            <option value=""> </option>
					        <optgroup  label="<?=$fatch_c['category_name']?>">
				  
				  		  
						   <? $sql_a = "select * from fs_sub_category where category_id = '".$fatch_c['fld_id']."' order by sub_category asc";
				            $sql_run_a = q($sql_a);
				            while($fatch_a =  f($sql_run_a)){ ?>
				  			 <option value="<?=$fatch_a['sub_category']?>"><?=$fatch_a['sub_category']?></option>
				  
				  
				 <? }  ?>

				   </optgroup>
				<? } ?> 

				
			  </select>
            </li>
			<li>
			    &nbsp;
			</li>
           
            <li>
             
                <input type="text"  class="inputCategory" value="Location" name="talent_location" id="talent_location"/>
              
            </li>

            <li>
			    &nbsp;
			</li>

             <li>
              Exp: &nbsp;<select name="talent_exp1" style="width:80px;" class="inputCategory" >
                <option value="">To</option>
						<?php
						  $query_s = "select * from fs_experience";
						  $query_run = q($query_s);
						  while($fatch_s = f($query_run)){
						?>
						<option value="<?=$fatch_s['value']?>"><?=$fatch_s['value']?> </option>
						<?}?>
              </select>
            </li>

           <li>
			    &nbsp;
			</li>



			   <li>
              <select name="talent_exp2"  style="width:80px;" class="inputCategory">
                <option value="">From</option>
						<?php
						  $query_s = "select * from fs_experience";
						  $query_run = q($query_s);
						  while($fatch_s = f($query_run)){
						?>
						<option value="<?=$fatch_s['value']?>"><?=$fatch_s['value']?> </option>
						<?}?>
              </select>
            </li>


			<li>
			    &nbsp;
			</li>

			<li>
			<!-- class="inputCategory" -->
				Nationality: 
					&nbsp;<input value="" class="inputCategory" type="text"  name="talent_nationality" id="talent_nationality" >
				
			</li> 



          </ul>
         <input class="search-btn" type="image" src="newhome/images/search-btn.png" value="tab11" id="tab11" name="tab11"/>
    </form>
 </div>

<!-------Tab company----------->

 <div id="content2"  class="tabscontent">
    <form action="" id="form2" name="form2"  method="post">
          <ul class="Category">
            <li>
              <select name="company_category" id="company_category"  class="inputCategory">
                <option value=""><b>Select Category</b></option>
 <?
				  $sql_c = "select * from fs_company_category order by category_name asc";
				  $sql_run_c = q($sql_c);
				  while($fatch_c =  f($sql_run_c)){ ?>
				  

				           
					        <optgroup  label="<?=$fatch_c['category_name']?>">
				  
				  		  
						   <? $sql_a = "select * from fs_company_sub_category where category_id = '".$fatch_c['fld_id']."' order by sub_category asc";
				            $sql_run_a = q($sql_a);
				            while($fatch_a =  f($sql_run_a)){ ?>
				  			 <option value="<?=$fatch_a['sub_category']?>"><?=$fatch_a['sub_category']?></option>
				  
				  
				 <? }  ?>

				   </optgroup>
				<? } ?> 




              </select>
            </li>
          
            <li>
               <input type="text"  class="inputCategory" value="Location" name="company_location" id="company_location"/>
            </li>
           
          </ul>
          <!-- <a href="#" class="search-btn"><img src="images/search-btn.png" alt=""></a> -->
		  <input class="search-btn" type="image" src="newhome/images/search-btn.png" id="tab21" value="tab21" name="tab21"/>
      </form>
   </div>

<!----------------->

<!-------tab3- Job---------->

    <div id="content3"  class="tabscontent">
      <form action="" id="form3" name="form3" method="post">
          <ul class="Category">
            <li>
             <select name="job_category" id="job_category"  class="inputCategory">
              <option value=""><b>Select Category</b></option>

				   <?
				  $sql_c = "select * from fs_category order by category_name asc";
				  $sql_run_c = q($sql_c);
				  while($fatch_c =  f($sql_run_c)){ ?>
				  

				            <option value=""> </option>
					        <optgroup  label="<?=$fatch_c['category_name']?>">
				  
				  		  
						   <? $sql_a = "select * from fs_sub_category where category_id = '".$fatch_c['fld_id']."' order by sub_category asc";
				            $sql_run_a = q($sql_a);
				            while($fatch_a =  f($sql_run_a)){ ?>
				  			 <option value="<?=$fatch_a['sub_category']?>"><?=$fatch_a['sub_category']?></option>
				  
				  
				 <? }  ?>

				   </optgroup>
				   <? } ?> 
              </select>
            </li>
			<li>
			    &nbsp;
			</li>
           
            <li>
             
                <input type="text"  class="inputCategory" value="Location" name="job_location" id="job_location"/>
              
            </li>
			<li>
			    &nbsp;
			</li>
         
              <li>
				Job Type: &nbsp;
					<select id="job_type" name="job_type" class="inputCategory">
					  <option value="">Select Job type</option>
					  <option value="regular">Regular</option>
					  <option value="contractual">Contractual</option>
					</select>
				
			</li>
           
           
          	<li>
			    &nbsp;
			</li>

			

             <li>
             Exp: &nbsp;<select name="job_exp1" style="width:80px" class="inputCategory">
                <option value="">To</option>
						<?php
						  $query_s = "select * from fs_experience";
						  $query_run = q($query_s);
						  while($fatch_s = f($query_run)){
						?>
						<option value="<?=$fatch_s['value']?>"><?=$fatch_s['value']?> </option>
						<?}?>
              </select>
            </li>

           <li>
			    &nbsp;
			</li>



			   <li>
              <select name="job_exp2"  style="width:80px;" class="inputCategory">
                <option value="">From</option>
						<?php
						  $query_s = "select * from fs_experience";
						  $query_run = q($query_s);
						  while($fatch_s = f($query_run)){
						?>
						<option value="<?=$fatch_s['value']?>"><?=$fatch_s['value']?> </option>
						<?}?>
              </select>
            </li>






          </ul>
         <input class="search-btn" type="image" src="newhome/images/search-btn.png" value="tab31" id="tab31" name="tab31"/>
        </form>
      </div>

<!--------------->

<!---------tab3- Audition------>

   <div id="content4" class="tabscontent">
      <form action="" id="form4" name="form4" method="post">
          <ul class="Category">
            <li>
               <select name="audition_category" id="audition_category"  class="inputCategory">
              <option value=""><b>Select Category</b></option>

				   <?
				  $sql_c = "select * from fs_category order by category_name asc";
				  $sql_run_c = q($sql_c);
				  while($fatch_c =  f($sql_run_c)){ ?>
				  

				            <option value=""> </option>
					        <optgroup  label="<?=$fatch_c['category_name']?>">
				  
				  		  
						   <? $sql_a = "select * from fs_sub_category where category_id = '".$fatch_c['fld_id']."' order by sub_category asc";
				            $sql_run_a = q($sql_a);
				            while($fatch_a =  f($sql_run_a)){ ?>
				  			 <option value="<?=$fatch_a['sub_category']?>"><?=$fatch_a['sub_category']?></option>
				  
				  
				 <? }  ?>

				   </optgroup>
				   <? } ?> 
              </select>
            </li>
            <li>
			    &nbsp;
			</li>
           
            <li>
             
                <input type="text"  class="inputCategory" value="Location" name="audition_location" id="audition_location"/>
              
            </li>
               	<li>
			    &nbsp;&nbsp;
			</li>


             <li>
             Exp: &nbsp;<select name="audition_exp1" style="width:80px;" class="inputCategory" >
                <option value="">To</option>
						<?php
						  $query_s = "select * from fs_experience";
						  $query_run = q($query_s);
						  while($fatch_s = f($query_run)){
						?>
						<option value="<?=$fatch_s['value']?>"><?=$fatch_s['value']?> </option>
						<?}?>
              </select>
            </li>

           <li>
			    &nbsp;
			</li>



			   <li>
              <select name="audition_exp2"  style="width:80px;" class="inputCategory">
                <option value="">From</option>
						<?php
						  $query_s = "select * from fs_experience";
						  $query_run = q($query_s);
						  while($fatch_s = f($query_run)){
						?>
						<option value="<?=$fatch_s['value']?>"><?=$fatch_s['value']?> </option>
						<?}?>
              </select>
            </li>
           
          </ul>
         <input class="search-btn"  type="image" src="newhome/images/search-btn.png" id="tab41" value="tab41" name="tab41"/>
     </form>
  </div>

<!------------->

            </div>
    </div>
        
        
      </div>
    </div>
    <!--Search Box END-->
    <!--Talent Box start-->
	<?
	  $select_no_talent = nr(q("select * from fs_mamber where work_as=1"));
	  $select_no_company = nr(q("select * from fs_mamber where work_as=2"));
	  $select_no_jobs = nr(q("select * from fs_job "));
	  $select_no_auditions = nr(q("select * from fs_oudition "));

	?>
    <div class="talentBox">
      <div class="mainHolder">
        <ul class="talent">
          <li>
            <div class="talent-digit"><a href="talent_search_result_front.php"><?=$select_no_talent?></a></div>
            <p><a href="talent_search_result_front.php">Talent</a></p>
          </li>
          <li>
            <div class="talent-digit"><a href="company_search_result.php"><?=$select_no_company?></a></div>
            <p><a href="company_search_result.php">Companies</a></p>
          </li>
          <li>
            <div class="talent-digit"><a href="job_search_result.php"><?=$select_no_jobs?></a></div>
            <p><a href="job_search_result.php">Jobs</a></p>
          </li>
          <li>
            <div class="talent-digit"><a href="audition_search_result.php"><?=$select_no_auditions?></a></div>
            <p><a href="audition_search_result.php">Audition </a></p>
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
           <? if($_SESSION['work_as']==1) { ?>
                 <h3><a href="gallery.php">Submit Portfolio</a></h3>
            <?}else{?>
                 <h3><a href="company_gallery.php">Submit Portfolio</a></h3>
			<?}?>
          <p> to get hired</p>
        </li>
        <li>
		 <? if($_SESSION['work_as']==2) { ?>
          <h3><a href="post_job.php">Post Job</a></h3>
		  <?}else{?>
          <h3><a href="talent_dashboard.php">Post Job</a></h3>
		  <?}?>
          <p>Auditions/Contests </p>
        </li>
        <li>
		 <? if($_SESSION['work_as']==2) { ?>
          <h3><a href="audition.php">Post Audition</a></h3>
		  <?}else{?>
           <h3><a href="talent_dashboard.php">Post Audition</a></h3>
		  <?}?>
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
            <div class="job-logo"><a href="#"><img src="newhome/images/job-logo.jpg" alt="Profile Image"></a></div>
            <figcaption class="com-summery"><a href="#" class="com-neme"> <?=$fatch_company_name['name']?></a><br>
              <b>Work Location:</b> <?=$fatch['interview_venue']?> <br>
              <b>Need:</b> <?=substr($fatch['main_skill'],1)?>
              <a href="view_job_details.php?id=<?=$fatch['fld_id']?>" class="Apply">Apply Now</a></figcaption>
          </figure>
         <?}else{?>
		  
		  <figure class="job-profile jp-brdr">
            <h4><?=$fatch['title']?></h4>
            <div class="job-logo"><a href="#"><img src="newhome/images/job-logo.jpg" alt="Profile Image"></a></div>
            <figcaption class="com-summery"><a href="#" class="com-neme"> <?=$fatch_company_name['name']?></a><br>
              <b>Work Location:</b> <?=$fatch['interview_venue']?> <br>
              <b>Need:</b> <?=substr($fatch['main_skill'],1)?>
              <a href="view_job_details.php?id=<?=$fatch['fld_id']?>" class="Apply">Apply Now</a></figcaption>
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
		  <form id="regform" name="regform" autocomplete="off" method="post" action="" onSubmit="return validateform();"> 
          <ul class="Register-from">
            <li><div align="center"><?=$msg?></div>
               <select class="sign-input-work" name="type" id="type">
                        	<option value=""> Select Your Mamber Type </option>
							<option value="1">Talent</option>
                            <option value="2">Company</option>                            
                        </select>


            
            </li>
            <li>
              <input type="text" class="sign-input-name" onBlur="if(this.value=='') this.value='Name';" value="Name" onFocus="if(this.value=='Name') this.value='';" name="name" id="name">
            </li>
            <li>
			 <span name="statuscat" id="statuscat"></span>
              <input type="text" onKeyUp="getform1();" onBlur="if(this.value=='') this.value='Email';" value="Email" onFocus="if(this.value=='Email') this.value='';" name="email" id="email" class="sign-input-email">
            </li>
            <li>
			  <span name="statuscat1" id="statuscat1"></span>
              <input type="text" onKeyUp="getform();"  onblur="if(this.value=='') this.value='User Name';" value="User Name" onFocus="if(this.value=='User Name') this.value='';"  name="user_name" id="user_name" class="sign-input-user"><br/><br/>
			  <span style="font-size:12px;font-family:arial;color:#993366"><b>fabstage.com/Username</b></span><br><br>
              
              


            </li>
            <li>
        
            </li>
            <li>
              <input type="password" onBlur="if(this.value=='') this.value='Password';" value="Password" onFocus="if(this.value=='Password') this.value='';" name="password" id="password" class="sign-input-pass">
            </li>
            <li class="terms">
              <input type="checkbox" id="term" name="term" value="1"> <a href="#">Terms and Conditions</a></li>

            <li class="btn" > <input type="image" name="submit" id="submit" src="newhome/images/sign-in.png" alt=""> <a href="#" class="login-btn"><img src="newhome/images/login.png" alt=""></a> </li>
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
				  if($fatch_select_mamber['profile_crop_image']!=''){
			?>
               
               <li><A href="company_profileview.php?company_id=<?=$fatch_select_mamber['fld_id']?>"><img src="<?=$fatch_select_mamber['profile_crop_image']?>" width="85" width="85" title="<?=$fatch_select_mamber['name']?>"/></A><br>
				</li>
          
		     <?}else{?>
			 
			 <li><a href="company_profileview.php?company_id=<?=$fatch_select_mamber['fld_id']?>"><img src="newhome/images/images.jpg" width="85" width="85" title="<?=$fatch_select_mamber['name']?>"/></a><br>
			</li>
			 
			 <?}}?>


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
               
				<?
				  $select_testmo = q("select * from fs_testimonials where status1=2 order by fld_id desc");
                  $no_of = nr($select_testmo);
                  if($no_of!=0){
				  while($fatch_testmo = f($select_testmo)){
				
				?>

				<li><a href="testimonials_list.php" style="text-decoration:none;" class="test-img"><img  src="images/test.jpg" alt="" width="89" height="90">
                  <h4><?=$fatch_testmo['name']?></h4>
                  <p><?=substr($fatch_testmo['comment'],0,60)?> ...</p></a>
                </li>


               <?}}else{?>
			   <li><a href="#" class="test-img"><img src="newhome/images/sonia.png" alt=""></a>
                  <h4>Testimonial Not Found...</h4>
                  <p></p>
                </li>
			   
			  <? }?>
               
              
			  
			  
			  
			  </ul>
            </div>
            <br clear="all"/>
            <a class="Apply fr" href="testimonials_list.php">Read More</a> </div>
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
				  if($fatch_select_mamber['profile_crop_image']!=''){
			?>
               
               <li><a href="talent_profile.php?talent_id=<?=$fatch_select_mamber['fld_id']?>"><img src="<?=$fatch_select_mamber['profile_crop_image']?>" width="90" width="90" title="<?=$fatch_select_mamber['name']?>"/></a></li>
          
		     <?}else{?>
			 
			 <li><a href="talent_profile.php?talent_id=<?=$fatch_select_mamber['fld_id']?>"><img src="newhome/images/images.jpg" width="90" width="90" title="<?=$fatch_select_mamber['name']?>"/></a></li>
			 
			 <?}}?>

          
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
   		<a href="#"><img src="newhome/images/upcoming_banner.png" alt="" width="580" height="226" ></a>
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
                <div id="latest_talent_areatext_holder_2"> <a href="#"><img src="newhome/images/latest_talent_banner.png" alt="" width="277" ></a>
                </div><!-- text_holder_2 ends -->
                </div>
                <div id="latest_talent_area_wrapper">
                <div id="latest_talent_area"> </div><!-- alpha_2 ends -->
                <div id="latest_talent_areatext_holder_2"> <a href="#"><img src="newhome/images/latest_talent_banner.png" alt="" width="277" ></a>
                </div><!-- text_holder_2 ends -->
                </div>
                <div id="latest_talent_area_wrapper">
                <div id="latest_talent_area"> </div><!-- alpha_2 ends -->
                <div id="latest_talent_areatext_holder_2"> <a href="#"><img src="newhome/images/latest_talent_banner.png" alt="" width="277" ></a>
                </div><!-- text_holder_2 ends -->
                </div>
                
                
            </div>
            <!--Latest Talent end-->
    </div>
       <!--Upcoming event end-->
    
    
  </div>
  
  </div>
  
 
  <?php include("footer.php");?>

</div>
<script type="text/javascript" src="newhome/js/boxslider-verival.js"></script>
</body>
</html>
