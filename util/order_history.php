<?
	include('constants.php');
	include('chk_session.php');	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> SEN SPORT  </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<script language="JavaScript" type="text/javascript">
//EDIT ITEM
function changeP(id){
	winparam = 'width=400,height=200,scrollbars=1,left=100,top=100,screenX=100,screenY=100';
	window.open('ChangePassword.php','',winparam);
}
</script>
<link rel="shortcut icon" href="favicon.ico">
</HEAD>

<link href="css/home.css" rel="stylesheet" type="text/css" />
<BODY>
<table cellpadding="0" border=0 cellspacing="0" width="100%">
	<tr>
		<td align="center"   style="font-size: 11px;" colspan="3">
			<?
				include('header.php');
			?>
		</td>
	</tr>
	<tr>
		<td align="center" height="420px" valign="top">
		
		
		
			<table cellpadding="0" cellspacing="0" width="100%" >
				<tr>
					<td width="230px" valign="top">
						<table cellpadding="1" cellspacing="1" width="100%">
							<tr>
								<td height="33px">
								<?
									include('left_menu.php');
								?>
								</td>
							</tr>							
						</table>	
									
					</td>
					
					<td style="font-size: 11px;padding-top: 10px;" valign="top" align="left">
					
						
					
									
					<!-- MY ACCOUNT SECTION -->
						<table cellpadding="0" cellspacing="0" width="95%" height="100%">
					
						<tr>
							<td colspan="2"><span class="label_join_red"><b><?=$_SESSION['member_stokist']?></b></span><span class="label_join_white"> Welcomes you</span></td>
						</tr>
						
						<tr><td colspan="2"><hr></td></tr>	
						<tr>
							<td colspan="2" ><span style="color:#F70000; font-weight: bold;">You are here : </span><a href="index.php">Home</a> >> <a href="MyProfile.php">My Account</a></td>
						</tr>
						<tr><td colspan="2"><hr></td></tr>
						<tr><td height="20px" colspan="2"></td></tr>
						<tr>
							<td colspan="2" height="18px" class="achead"><b>Customer Order Status</b></td>
						</tr>
						<tr><td height="20px" colspan="2"></td></tr>
						<tr><td height="20px" colspan="2">You have no active orders.</td></tr>
						<tr><td height="20px" colspan="2"></td></tr>
						<tr>
							<td height="20px"><a href="order_history.php" class="red">View my order history</a></td>
							<td height="20px"><a href="create_order.php" class="red">Create My Order</a> <strong>»</strong> </td>
						</tr>
						<tr><td height="20px" colspan="2"></td></tr>
						<tr>
							<td colspan="2" height="18px" class="achead"><b>Account Settings</b></td>
						</tr>
						<tr><td height="20px" colspan="2"></td></tr>
						<tr><td height="20px" colspan="2"><a href="javascript:changeP();" class="red">Change Password</a></td></tr>
						<tr><td height="20px" colspan="2"></td></tr>
						<tr>
							<td colspan="2" height="18px" class="achead"><b>Customer Personal Information</b></td>
						</tr>
						<tr><td height="20px" colspan="2"></td></tr>
						<tr><td height="20px" colspan="2"><a href="UpdateProfile.php" class="red">My Information</a></td></tr>
						<tr><td height="5px" colspan="2"></td></tr>
						<tr><td height="20px" colspan="2"><a href="ShippingAddress.php" class="red">My Shipping Information</a></td></tr>
						<tr><td height="5px" colspan="2"></td></tr>
						<tr><td height="10px" colspan="2"><a href="BillingAddress.php" class="red">My Billing Information</a></td></tr>
					</table>
			
			
			
		</td>
		
		
	</tr>
	<tr>
		<td align="center" colspan="3" height="50px" style="font-size: 11px;">
			<?
				include('footer.php');
			?>
		</td>
	</tr>
	
</table>	

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
</BODY>
</HTML>