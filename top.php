 <?include_once('constants.php'); 
 if($_REQUEST['submit11']!=''){
 
     if($_REQUEST['cat']==1){
	 //header('location:talent_search_result.php?cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].''); 
	 header('location:talent_search_result_front.php?cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'');
	 }else if($_REQUEST['cat']==2){

	 header('location:company_search_result.php?cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'');


	 }else if($_REQUEST['cat']==3){
	  header('location:job_search_result.php?cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'');
	 }else if($_REQUEST['cat']==4){
	  header('location:audition_search_result.php?cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'');
	 }
 
 
 
 }
 
 
 
 ?>
 <script>
   function f1() {
        if(document.getElementById("cat").value == 2)
    {
       
      
       document.getElementById('category').style.display = 'none';
	   document.getElementById('category1').style.display = 'block';
       //document.getElementById('category1').style.width = '183px';
	   //document.getElementById('category').style.width = '1px';
       
    }else
	{
		
	    document.getElementById('category').style.display = 'block';
	   document.getElementById('category1').style.display = 'none';
	   //document.getElementById('category').style.width = '183px';
	   //document.getElementById('category1').style.width = '1px';
	
	}
}
</script>

<style>
  .autocomplete-suggestions { border: 1px solid #999; background: #FFF; font-size: 16px; cursor: default; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; font-size: 16px; color: #3399FF; }


</style>


<header>
    <!--Navigation Start-->
    <nav class="Navigation">
      <div class="mainHolder">
      <a href="/" title="FabStage" style="float:left;"><img src="images/logo.png" alt=""></a>
        <ul class="nav">
          <!-- <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Find Talent</a></li>
          <li><a href="#">Companies &amp; Agencies</a></li>
          <li><a href="#">Jobs &amp; Auditions</a></li> -->
		            <li><a href="index.php">Home</a></li>          
                    <li><a href="talent_search_result_front.php">Find Talent</a></li>
                    <li><a href="company_search_result.php">Companies & Agencies</a></li>
                    <li><a href="job_search_result.php">Jobs</a></li>
					<li><a href="audition_search_result.php">Auditions</a></li>
        </ul>

      <?if($_SESSION['fab_id']!=''){
	  
	   $q =  q("select * from fs_mamber where fld_id=".$_SESSION['fab_id']."");
	   $f = f($q);
	  ?>

	     

         <div class="member-box"><a href="#" class="member-img"><img src="<?=$f['profile_crop_image']?>" alt="" width="26" height="23"></a>
          <div class="title-name"><?=$f['name']?></div>
        <?}else{?>
          <div class="member-box"><a href="#" class="member-img"><img src="images/preeti.png" alt="" width="26" height="23"></a>
          <div class="title-name">Preeti</div>
         <?}?>
          <div class="setting-dropdown">
            <ul class="setting-nav">
 
<li style="float:none;"><a href="#">Help</a></li>
              <li style="float:none;"><a href="#">Feedback</a></li>
              <li  style="float:none;"><a href="#">Account Setting</a></li>

              <!-- <li class="last" style="float:none;"><a href="#">LogOut</a></li> -->


			    <?if($_SESSION['fab_id']!=''){?>
					<li style="float:none;">
					
					<?
		              if($_SESSION['logout_url']!='')
		              {
		            ?>
		            <a href="<?=$_SESSION['logout_url']?>" >Logout</a>
		            <?
		              }
		              else
		              {
		           ?>
		           <a href="logout.php" >Logout</a>
		           <?
		              }	
		           ?>
					</li>
                   <?}else{?>
                     <li style="float:none;"><a href="login.php">Login</a></li>
				   <?}?>


             
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!--Navigation END-->
    <!--TopBlackStrip Start-->
    <div class="TopBlackStrip">
      <div class="mainHolder">
      <div style="font-family:Arial, Helvetica, sans-serif; color:#4FBFE3; font-size:13px; float:left; width:auto; line-height:30px;">Search for...</div>
        
     <form enctype="multipart/form-data" name="form" id="form" action="" method="POST" >
		<ul class="loginBtn">
        <li class="first-tab select-box">
		     <!-- <select class="select" title="Select one"> -->
             <select name="cat" id="cat" class="select" title="Select one" onchange="f1();">  
				<!-- <option>Blue</option>
                <option>Red</option>
                <option>Green</option>
                <option>Yellow</option>
                <option>Brown</option> -->

                <option value="1" <?if($_REQUEST['cat']==1){?>selected<?}?>>Talent</option>
				<option value="2" <?if($_REQUEST['cat']==2){?>selected<?}?>>Companies</option>
				<option value="3" <?if($_REQUEST['cat']==3){?>selected<?}?>>Jobs</option>
				<option value="4" <?if($_REQUEST['cat']==4){?>selected<?}?>>Auditions</option>
              </select></li>






            
           <li class="photography-text">

		         <!-- <input type="text"  class="photography"> -->

				  <input class="photography" type="text" onblur="if(this.value=='') this.value='Enter Your Skill...';" value="Enter Your Skill..." onfocus="if(this.value=='Enter Your Skill...') this.value='';" name="category" id="category"  />
		  </li>

         

           <li>

		         <!-- <input type="text"  class="photography textbox-bg"> -->

				 <input class="photography textbox-bg" type="text" onblur="if(this.value=='') this.value='Enter Your Skill...';" value="Enter Your Skill..." onfocus="if(this.value=='Enter Your Skill...') this.value='';" name="category1" id="category1" style= "display:none;"/>
		   
		   </li>

		    <li class="in">in</li>

		   <li>
                 <input class="photography" type="text" onblur="if(this.value=='') this.value='Enter Your Location...';" <?if($_REQUEST['location']!=''){?>value="<?=$_REQUEST['location']?>"
				 <?}else{?>value="Enter Your Location..."<?}?>onfocus="if(this.value=='Enter Your Location...') this.value='';" name="location" id="location"  />

		   </li>
           
		   <li>
		       <!-- <a href="#" class="top-selling-btn"><span>Top Selling</span></a> -->

		       <input name="submit11" id="submit11"  type="submit" value="Search" class="top-selling-btn" style="border:0px;" /> 
		   
		   </li>
         

        </ul>
		</form>
      </div>
    </div>
    <!--TopBlackStrip END-->
  </header>
  
  
  
  
  
  
  

  <!-- AUTO SUGGESTION SCRIPT -->
	<!-- <script type="text/javascript" src="scripts/jquery-1.8.2.min.js"></script> -->
     	<!--   <script type="text/javascript" src="gallery/js/jquery-1.9.0.min.js"></script>-->
		<script type="text/javascript" src="scripts/jquery.mockjax.js"></script>
		<script type="text/javascript" src="src/jquery.autocomplete.js"></script>
		<script type="text/javascript" src="scripts/demo.js"></script>
		<script type="text/javascript" src="scripts/demo1.js"></script>
		<script type="text/javascript" src="scripts/demo2.js"></script>