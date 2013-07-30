<?
include('constants.php');

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
</head>

<body>
<div id="main_container">
	
    
    <div class="search_area">
    	<div class="search_main">
        	<div class="talent_area">
                <link rel="stylesheet" href="css/index_002.css" media="screen and (min-width: 1200px)">
                <link type="text/css" rel="stylesheet" href="css/index_004.css">

				<script type="text/javascript" src="js/index.js"></script>
            	
            </div>
           
           
           
           
        </div>
    </div>
    
    <div>
    	<div class="main_body_area">
                        











<div class="center_body" style="width:800px;">
		  <!-- Content Start Here -->
			<form method="post" action="login.php" name="login" onsubmit="return validate()" autocomplete="off"> 
			  <table width="90%" align="right" border="0" cellspacing="0" cellpadding="0">
			     <tr><td colspan="4">&nbsp;</td></tr>
			     				 			   
			  
			    
				
				
				
				
				
			
				
				
				
				
				
				
				
				
				
				<tr>
				  <td colspan="4" height="20px">&nbsp;</td>
				</tr>
				
			     <tr>
					  <td width="30%" valign="top" align="right" style="color:#000000;font-size:13px; font-family: arial"><strong>Username</strong></td>
					  <td width="5%" align="center" valign="top"><strong>:</strong></td>
					  <td width="40%" valign="top">
					    <input type="text" value=""  class="text_field_1n"  id="username" name="username" size="35" />
					  </td>
					  <td width="25%">&nbsp;</td>
				 </tr>
				 <tr>
				    <td colspan="4">&nbsp;</td>
				 </tr>				
				 <tr>
					  <td width="30%" valign="top" align="right"  style="color:#000000;font-size:13px;font-family: arial"><strong>Password</strong></td>
					  <td width="5%" align="center" valign="top"><strong>:</strong></td>
					  <td width="40%" valign="top">
					    <input type="password" value="" class="text_field_1n" id="password" name="password" size="35" />
					  </td>
					  <td width="25%">&nbsp;</td>
				 </tr>
				 <tr>
				   <td colspan="4" height="8px"></td>
				 </tr>
				 <tr>
					  <td width="30%" align="right" >&nbsp;</td>
                      <td width="5%" >&nbsp;</td>
					  <td width="40%" align="left" style="font-size:12px;" >
						<input type="submit" name="submit" value="login"/>
					  </td>
					  <td width="25%">&nbsp;</td>
									
									
				 </tr>
				 <tr>
				   <td colspan="4">&nbsp;</td>
				 </tr>			
			
				 <tr>
                      <td width="30%" height="45" align="right" >&nbsp;</td>
                      <td width="5%" class="pound">&nbsp;</td>
                      <td width="40%" valign="top" class="tick_text" style="color:#000000;font-size:12px; font-family: arial">Not a Registed Member ? <a  style="color: #866678;cursor: pointer;" href="signup.php" title="Create Account"><u><strong>Click Here</strong></u></a>
					  </td>
					  <td width="25%">&nbsp;</td>
                  </tr>
				  <tr>
				   <td colspan="4">&nbsp;</td>
				 </tr>
			  </table>
			  </form>
				<!-- Content end Here -->
</div>
				

				
        </div>
        
        
    </div>
    
    
    
    
</body>
</html>
