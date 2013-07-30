 <?include_once('constants.php'); 
 if($_REQUEST['submit11']!=''){
 
     if($_REQUEST['cat']==1){
	  header('location:talent_search_result.php?cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'');
	 }else if($_REQUEST['cat']==2){

	 header('location:company_search_result.php?cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'');


	 }else if($_REQUEST['cat']==3){
	  header('location:job_search_result.php?cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'');
	 }else if($_REQUEST['cat']==4){
	  header('location:audition_search_result.php?cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'');
	 }
 
 
 
 }
 
 
 
 ?>
  
<style>
  .autocomplete-suggestions { border: 1px solid #999; background: #FFF; font-size: 16px; cursor: default; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; font-size: 16px; color: #3399FF; }


</style>

   

<!-- x.style.visibility = 'hidden';
x.style.display = 'none';

To put it back:
x.style.visibility = 'visible';
x.style.display = 'block'; -->
<script>
   function f1() {
        if(document.getElementById("cat").value == 2)
    {
       
      
       document.getElementById('category').style.visibility = 'hidden';
	   document.getElementById('category1').style.visibility = 'visible';
       document.getElementById('category1').style.width = '183px';
	   document.getElementById('category').style.width = '1px';
       
    }else
	{
		
	   document.getElementById('category').style.visibility = 'visible';
	   document.getElementById('category1').style.visibility = 'hidden';
	    document.getElementById('category').style.width = '183px';
	   document.getElementById('category1').style.width = '1px';
	
	}
}
</script>

	
<!-- <script>
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




				function getform(){	
											
				var strURL='runtime.php?pno='+encodeURI(document.getElementById('cat').value);
					//alert(strURL);
					var req = getXMLHTTP();
					if (req) {
						document.getElementById('statuscat11').innerHTML='<img src="images/ld.gif">';	
						req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "ok"
							if (req.status == 200) {
							//alert(req.responseText);											
							document.getElementById('statuscat11').innerHTML=req.responseText;
							
							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
								}
						}				
						}			
						req.open("GET", strURL, true);
						req.send(null);
					}
			}



</script>  -->
   

<div class="header_nav">
    	<div class="header_main">
        	<div class="header_logo"><a href="index.php"><img src="images/inside/fab_logo.png" /></a></div>
            <div class="head_nav">
            	<ul>
                	<li><a href="index.php">Home</a></li>          
                    <li><a href="talent_search_result_front.php">Find Talent</a></li>
                    <li><a href="company_search_result.php">Companies & Agencies</a></li>
                    <li><a href="job_search_result.php">Jobs</a></li>
					<li><a href="audition_search_result.php">Auditions</a></li>
                   
                   <?if($_SESSION['fab_id']!=''){?>
					<li><a href="logout.php">Logout</a></li>
                   <?}else{?>
                     <li><a href="login.php">Login</a></li>
				   <?}?>

                </ul>
            </div>
        </div>
    </div>



    <div class="search_area">
    	<div class="search_main">
        	
		
			<div class="talent_area">
                <link rel="stylesheet" href="css/index_002.css" media="screen and (min-width: 1200px)">
                <link type="text/css" rel="stylesheet" href="css/index_004.css">

				<script type="text/javascript" src="js/index.js"></script>

					<form enctype="multipart/form-data" name="form" id="form" action="" method="POST" >
				     <select name="cat" id="cat" class="category_input" onchange="f1();">
            	        <option value="1" <?if($_REQUEST['cat']==1){?>selected<?}?>>Talent</option>
						<option value="2" <?if($_REQUEST['cat']==2){?>selected<?}?>>Companies</option>
						<option value="3" <?if($_REQUEST['cat']==3){?>selected<?}?>>Jobs</option>
						<option value="4" <?if($_REQUEST['cat']==4){?>selected<?}?>>Auditions</option>
					 </select>
          	  

            </div>


                
				    <input class="category_input" type="text" onblur="if(this.value=='') this.value='Enter Your Skill...';" value="Enter Your Skill..." onfocus="if(this.value=='Enter Your Skill...') this.value='';" name="category" id="category"  />

					<input class="category_input" type="text" onblur="if(this.value=='') this.value='Enter Your Skill...';" value="Enter Your Skill..." onfocus="if(this.value=='Enter Your Skill...') this.value='';" name="category1" id="category1" style= "visibility:hidden;width:1px;"/>
				
				
		



               <input class="category_input" type="text" onblur="if(this.value=='') this.value='Enter Your Location...';" value="<?=$_REQUEST['location']?>" onfocus="if(this.value=='Enter Your Location...') this.value='';" name="location" id="location"  />

			 
			
            <input name="submit11" id="submit11"  type="submit" value="Search" class="search_btn" style="margin-left:10px;" /> 

		  </form>

        </div>
    </div>

	<!-- AUTO SUGGESTION SCRIPT -->
		<script type="text/javascript" src="scripts/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="scripts/jquery.mockjax.js"></script>
		<script type="text/javascript" src="src/jquery.autocomplete.js"></script>
		<script type="text/javascript" src="scripts/demo.js"></script>
		<script type="text/javascript" src="scripts/demo1.js"></script>