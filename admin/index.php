<?
include('../constants.php');
?>

<html>
<head>
<title><?=TITLE?></title>
<style type="text/css">
@import url(admin_img/css/admin_login.css);
</style>
<script src="javascript/jquery.js" type="text/javascript" language="javascript"></script>


<script language="javascript">
$(document).ready(function(){
	
	$("#login_form").submit(function(){
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Validating....').fadeIn(1000);
		//check the username exists or not from ajax
		$.post("admin_login.php",{ user_name:$('#username').val(),password:$('#password').val(),rand:Math.random() } ,function(data) {
        	//alert(data);
		  if(data=='yes') //if correct login detail
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Logging in.....').addClass('messageboxok').fadeTo(900,1,
              function()
			  { 
			  	 //redirect to secure page
				 document.location='admin_home.php';
			  });
			  
			});
		  }
		  else 
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Invalid Login Details...').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
				
        });
 		return false; //not to post the  form physically
	});
	//now call the ajax also focus move from 
	$("#password").blur(function()
	{
		$("#login_form").trigger('submit');
	});
});
</script>


<link rel="stylesheet" type="text/css" href="jqtransformplugin/jqtransform.css" />
<link rel="stylesheet" type="text/css" href="formValidator/validationEngine.jquery.css" />
<link rel="stylesheet" type="text/css" href="demo.css" />

<?=$css?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="jqtransformplugin/jquery.jqtransform.js"></script>
<script type="text/javascript" src="formValidator/jquery.validationEngine.js"></script>

<script type="text/javascript" src="script.js"></script>
<link rel="shortcut icon" href="favicon.ico">
</HEAD>

<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="120">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td class="normalbrown" align="right" height="10px">&nbsp;</td>
				</tr><tr>
					<td class="normalbrown" align="right" height="50"><img src="<?=LOGO_ADMIN?>" border="0">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td class="normalbrown" align="right" height="10px">&nbsp;</td>
				</tr>
				<tr>
					<td >
					
						<link rel="stylesheet" type="text/css" href="pro_dropdown_3/pro_dropdown_3.css" />
						<script src="pro_dropdown_3/stuHover.js" type="text/javascript"></script>

						<ul id="nav">
						<li class="top"><a href="index.php" class="top_link"><span>Home</span></a></li>	
						<li class="top"><a href="fabstage.com" target=_blank class="top_link"><span>Fabstage.com</span></a></li>
						</ul>
					
					</td>
				</tr>

			</table>
		</td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td class="heading">
			<table width="716" align="center" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center"><br><br><br>
						<table width="360" bgcolor="#494949" border="0" cellpadding="0" cellspacing="0">
							<form  name="login_form" id="login_form" action="" method="post">
							<tr>
								<td>
									<table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td>
											<div id="main-container">

												<div id="form-container">
												<table cellpadding="2" cellspacing="2">
													<tr>
														<td><img src="admin_img/lock.png" width="22px"></td><td><span style="font-variant:small-caps; font-family: arial; font-size: 19px; font-weight: bold; color: #21717C">Administrator Login</span>
														</td>
													</tr>
													<tr>
														<td height="10px"></td>
													</tr>
												</table>

												<form id="contact-form" name="contact-form" method="post" action="submit.php">
												  <table width="100%" border="0" cellspacing="0" cellpadding="5">
													<tr>
													  <td width="15%"><label for="name"><B>Username</B></label></td>
													  <td width="70%"><input name="username" style="font-family: tahoma; font-size: 12px;border: 1px solid #333333;height: 22px;" type="text" id="username" value="" size="30" /></td>
													 
													</tr>
											   
													 <tr>
													  <td width="15%"><label for="name"><B>Password</B></label></td>
													  <td width="70%"><input name="password" style="font-family: tahoma; font-size: 12px;border: 1px solid #333333;height: 22px;" type="password" id="password" value="" size="30"/></td>
													  
													</tr>
													<tr>
													  <td valign="top">&nbsp;</td>
													  <td colspan="2"><input type="image" src="admin_img/login-button.gif" name="button" id="button" value="Submit" /><span id="msgbox" style="display:none"></span>	
													 
													 </td>
													</tr>
												  </table>
												  </form>
												
												</div>
											</div>

											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
		<tr>
			<td class="normalgrey_12" height="27">&nbsp;</td>
		</tr>
		<tr>
			<td class="normalgrey_12" height="27">&nbsp;</td>
		</tr>
		<tr>
			<td bgcolor="#cccccc" height="1"><img src="images/spacer.htm" width="1" height="1"></td>
		</tr>
		<tr>
			<td style="font-family: tahoma; font-size: 11px;" align="right" height="27"><br><?=FOOTER_TEXT?></td>
		</tr>
		<tr>
			<td class="normalgrey_12" align="right">&nbsp;</td>
		</tr>
		<tr>
			<td></td></tr>
		<tr>
			<td></td>
		</tr>
	</table>
</body>
</html>