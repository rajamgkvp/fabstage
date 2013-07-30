</div>

<table width="100%" class="menubar" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td height="120" colspan=2>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
					<td class="normalbrown" align="right" height="10px">&nbsp;</td>
				</tr>
				<tr>
					<td class="normalbrown" align="right" height="50"><img src="<?=LOGO_ADMIN?>">&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td  align="right" >&nbsp;</td>
				</tr>	
				<tr>
					<td height="25">
						<link rel="stylesheet" type="text/css" href="pro_dropdown_3/pro_dropdown_3.css" />
						<script src="pro_dropdown_3/stuHover.js" type="text/javascript"></script>

						<ul id="nav">
						<li class="top"><a href="admin_home.php" class="top_link"><span>Home</span></a></li>
						<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">News</span></a>
							<ul class="sub">
								<li><a href="main.php?page_id=add_news" title="Add News">Add News</a></li>
								<li><a href="main.php?page_id=news_list&frm=pcl">News List</a></li>	
							</ul>
						</li>
						<li class="top"><a href="main.php?page_id=user_list" id="products" class="top_link"><span class="down">Admin User</span></a>
							<ul class="sub">
								<li><a href="main.php?page_id=user" title="Add Admin User">Add Admin User</a></li>
								<li><a href="main.php?page_id=user_list" >Admin User List</a></li>
								<li><a href="main.php?page_id=logs" >Admin Logs</a></li>
							</ul>
						</li>

						<!-- <li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">Event</span></a>
							<ul class="sub">
								<li><a href="main.php?page_id=add_event" title="Add Event">Add Event</a></li>
								<li><a href="main.php?page_id=event_list">Event List</a></li>	
							</ul>
						</li>
						
						<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">Blogs</span></a>
							<ul class="sub">
								<li><a href="main.php?page_id=add_blog" title="Add Blog">Add Blog</a></li>
								<li><a href="main.php?page_id=blog_list">Blog Listing</a></li>	
							</ul>
						</li>
						<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">Domestic Flight</span></a>
							<ul class="sub">
								<li><a href="main.php?page_id=add_air_location" title="Add Air Location">Add Air Location</a></li>
								<li><a href="main.php?page_id=airlocation_list">Air Location Listing</a></li>
								<li><a href="main.php?page_id=domestic_flight_booking">Domestic Flight Booking List</a></li>
							</ul>
						</li>
						
						<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">Private Flights</span></a>
							<ul class="sub">
								<li><a href="" onclick="window.open('add_private_flight.php', 'Add Private Flight', 'width=700, height=500, scrollbars=1, left=350, top=80,resizable=0')">Add Private Flight</a></li>
								<li><a href="main.php?page_id=private_flight_list">Private Flight List</a></li>
								<li><a href="" onclick="window.open('add_private_flight_location.php', 'Add Private Flight Location', 'width=500, height=300, scrollbars=1, left=350, top=80,resizable=0')">Add Private Flight Location</a></li>
								<li><a href="main.php?page_id=private_flight_location_list">Private Flight Location List</a></li>
								<li><a href="main.php?page_id=private_flight_booking">Private Flight Booking List</a></li>
							</ul>
						</li>
						<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">Airport Transfer</span></a>
							<ul class="sub">
								<li><a href="main.php?page_id=add_air_transfer_location">Add Airport Transfer Location</a></li>
								<li><a href="main.php?page_id=air_transfer_location_list">Airport Transfer Location List</a></li>
								<li><a  href="main.php?page_id=add_airport_transfer" >Add Airport Transfer</a></li>
								<li><a  href="main.php?page_id=airport_transfer_list" >Airport Transfers List</a></li>
								<li><a  href="main.php?page_id=booking_list" >Airport Transfer Booking List</a></li>
							</ul>
						</li>
						<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">Custome Payment</span></a>
							<ul class="sub">
								<li><a href="main.php?page_id=gen_pay" title="Generate Custom Payment Link" style="cursor: pointer;">Generate Link</a></li>
								<li><a href="main.php?page_id=gen_pay_list">Payment Link Listing</a></li>
							</ul>
						</li>
						
						<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">Misclleneous</span></a>
							<ul class="sub">
								
								<li><a href="main.php?page_id=country_list">Country List</a></li>	
								<li><a href="main.php?page_id=tm">Testimonial Listing</a></li>
								<li><a href="main.php?page_id=review">Review Listing</a></li>
								<li><a href="main.php?page_id=add_site_lang" title="Add Languages">Add Languages</a></li>
								<li><a href="main.php?page_id=site_lang_list">Languages Listing</a></li>
								
							</ul>
						</li> -->
						
					</td>
				</tr>	
			</table>
		</td>
	</tr>

<tr>
	<td class="menudottedline" width="40%" height="25px;">
	<div class="pathway"><strong>Welcome !</strong> <?=$_SESSION['username']?> [ <span style="color: red">Administrator</span> ]</div>	</td>
	<td class="menudottedline" align="right"><a href="admin_home.php"><strong>Home </strong></a> |  <a href="http://fs.sitebysite.us/" target="_blank" ><strong>Visit Site</strong></a> | <a href="logout.php" ><strong>Logout</strong></a></strong></a>&nbsp;&nbsp;</td>
</tr>
</table>
<br/>
<table  border="0">
	<tr>
		<th>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><img src="admin_img/control_panel.png"></td><td><img src="admin_img/cpanel.jpg"></td>
				</tr>
			</table>
		</th>
	</tr>
  </table>
<br/>