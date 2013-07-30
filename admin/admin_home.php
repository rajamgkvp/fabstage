


<?
include('../constants.php');

if($_SESSION['username'] == ''){
	header('Location: index.php');
}
?>

<html>
<head>
<title><?=TITLE?></title>
<script type="text/javascript">
	var GB_ROOT_DIR = "greybox/";
</script>

<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<link rel="stylesheet" href="admin_img/css/theme.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="favicon.ico">



	<link rel="stylesheet" type="text/css" href="../css/menu.css">
</HEAD>

<?
include_once('admin_header.php');
?>
		<table class="adminform">
			<tr>
				<td width="90%" valign="top">
				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_user.php" title="Add Admin User" rel="gb_page_center[500, 500]" style="cursor: pointer;">
								<img src="admin_img/add-user.PNG" alt="Add User" width="48" height="48"  border="0" align="middle" />
								<span>Add Admin User </span>
							</a>
						</div>
					</div>
				</div>
				
				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=user_list">
								<img src="admin_img/user_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Admin User List</span>
							</a>
						</div>
					</div>
				</div>
				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=logs">
								<img src="admin_img/logs.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Admin Logs</span>
							</a>
						</div>
					</div>
				</div>
				
			 <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_news.php" title="Add News" rel="gb_page_center[540, 520]" style="cursor: pointer;">
								<img src="admin_img/internet-news-reader-128.png"  width="50" height="50"  border="0" align="middle" />
								<span>Add News</span>
							</a>
						</div>
					</div>
				</div>
				 <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=news_list">
								<img src="admin_img/news_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>News List</span>
							</a>
						</div>
					</div>
				</div>
					 <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_talent.php" title="Add Talent" rel="gb_page_center[900, 600]" style="cursor: pointer;">
								<img src="admin_img/add_news.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Add Talent</span>
							</a>
						</div>
					</div>
				</div> 

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=talent_list">
								<img src="admin_img/member.jpg"  width="48" height="48"  border="0" align="middle" />
								<span>Talent List</span>
							</a>
						</div>
					</div>
				</div>	
					 

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_company.php" title="Add Company" rel="gb_page_center[900, 600]" style="cursor: pointer;">
								<img src="admin_img/Company.png"  width="48" height="48"  border="0" align="middle" />
								<span>Add Company</span>
							</a>
						</div>
					</div>
				</div> 

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=company_list">
								<img src="admin_img/news_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Company List</span>
							</a>
						</div>
					</div>
				</div>	
				

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_client.php" title="Add Client" rel="gb_page_center[600, 500]" style="cursor: pointer;">
								<img src="admin_img/add_users-icon.gif"  width="48" height="48"  border="0" align="middle" />
								<span>Add Client</span>
							</a>
						</div>
					</div>
				</div> 

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=client_list">
								<img src="admin_img/news_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Client List</span>
							</a>
						</div>
					</div>
				</div>		 
					 
					 
					 
					 <!-- <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_talent_comp.php" title="Add Talent or Company " rel="gb_page_center[900, 600]" style="cursor: pointer;">
								<img src="admin_img/add_news.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Add Talent & Company</span>
							</a>
						</div>
					</div>
				</div> -->

				
					 <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_skill.php" title="Add Skill " rel="gb_page_center[900, 600]" style="cursor: pointer;">
								<img src="admin_img/add_news.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Add Skill</span>
							</a>
						</div>
					</div>
				</div>

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=skill_list">
								<img src="admin_img/news_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Skill List</span>
							</a>
						</div>
					</div>
				</div>



				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_category.php" title="Add Category " rel="gb_page_center[900, 300]" style="cursor: pointer;">
								<img src="admin_img/shopping1.png"  width="48" height="48"  border="0" align="middle" />
								<span>Add Category</span>
							</a>
						</div>
					</div>
				</div>

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=category_list">
								<img src="admin_img/category.png"  width="48" height="48"  border="0" align="middle" />
								<span>Category List</span>
							</a>
						</div>
					</div>
				</div>



				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_subcategory.php" title="Add Sub Category " rel="gb_page_center[900, 500]" style="cursor: pointer;">
								<img src="admin_img/subcategory.png"  width="48" height="48"  border="0" align="middle" />
								<span>Add Sub Category</span>
							</a>
						</div>
					</div>
				</div>

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=sub_category_list">
								<img src="admin_img/category.png"  width="48" height="48"  border="0" align="middle" />
								<span>Sub Category List</span>
							</a>
						</div>
					</div>
				</div>

				<!--------------->
				  <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_company_category.php" title="Add Company Category " rel="gb_page_center[900, 300]" style="cursor: pointer;">
								<img src="admin_img/add_news.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Add Company Category</span>
							</a>
						</div>
					</div>
				</div>

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=company_category_list">
								<img src="admin_img/news_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Company Category List</span>
							</a>
						</div>
					</div>
				</div>



				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_company_subcategory.php" title="Add Company Sub Category " rel="gb_page_center[900, 500]" style="cursor: pointer;">
								<img src="admin_img/add_news.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Add Company Sub Category</span>
							</a>
						</div>
					</div>
				</div>

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=company_sub_category_list">
								<img src="admin_img/news_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Company Sub Category List</span>
							</a>
						</div>
					</div>
				</div>

				<!--------------->





					<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_jobs.php" title="Add Jobs " rel="gb_page_center[900, 500]" style="cursor: pointer;">
								<img src="admin_img/job.jpg"  width="48" height="48"  border="0" align="middle" />
								<span>Add Jobs</span>
							</a>
						</div>
					</div>
				</div>

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=jobs_list">
								<img src="admin_img/stock_task.png"  width="48" height="48"  border="0" align="middle" />
								<span>Jobs List</span>
							</a>
						</div>
					</div>
				</div>



				<!-------Oudition---------->
				 <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="add_oudition.php" title="Add Audition " rel="gb_page_center[900, 400]" style="cursor: pointer;">
								<img src="admin_img/add_news.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Add Audition</span>
							</a>
						</div>
					</div>
				</div>

				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=oudition_list">
								<img src="admin_img/news_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Audition List</span>
							</a>
						</div>
					</div>
				</div>
				<!----------------->



               <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=fs_help">
								<img src="admin_img/news_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Help</span>
							</a>
						</div>
					</div>
				</div>


				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=fs_help_list">
								<img src="admin_img/news_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Help List</span>
							</a>
						</div>
					</div>
				</div>



				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=fs_testimonials">
								<img src="admin_img/news_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Testimonials</span>
							</a>
						</div>
					</div>
				</div>


				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="main.php?page_id=feedback_list">
								<img src="admin_img/news_list.PNG"  width="48" height="48"  border="0" align="middle" />
								<span>Feedback_List</span>
							</a>
						</div>
					</div>
				</div>


				<div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="update_about_us.php" title="About Us" rel="gb_page_center[900, 500]" style="cursor: pointer;">
								<img src="admin_img/add-user.PNG" alt="About Us" width="48" height="48"  border="0" align="middle" />
								<span>Update About Us </span>
							</a>
						</div>
					</div>
				</div>


                <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="update_company_details.php" title="Company Details" rel="gb_page_center[900, 500]" style="cursor: pointer;">
								<img src="admin_img/add-user.PNG" alt="Company Details" width="48" height="48"  border="0" align="middle" />
								<span>Update Company Details </span>
							</a>
						</div>
					</div>
				</div>

                 <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="update_contact_us.php" title="Contact Us" rel="gb_page_center[900, 500]" style="cursor: pointer;">
								<img src="admin_img/add-user.PNG" alt="Contact Us" width="48" height="48"  border="0" align="middle" />
								<span>Update Contact Us </span>
							</a>
						</div>
					</div>
				</div>


				 <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="update_privacy_policy.php" title="Privacy Policy" rel="gb_page_center[900, 500]" style="cursor: pointer;">
								<img src="admin_img/add-user.PNG" alt="Privacy Policy" width="48" height="48"  border="0" align="middle" />
								<span>Update Privacy Policy </span>
							</a>
						</div>
					</div>
				</div>
               


			    <div id="cpanel">
					<div style="float:left;">
						<div class="icon">
							<a href="update_term_of_use.php" title="Term of Use" rel="gb_page_center[900, 500]" style="cursor: pointer;">
								<img src="admin_img/add-user.PNG" alt="Term of Use" width="48" height="48"  border="0" align="middle" />
								<span>Update Term of Use </span>
							</a>
						</div>
					</div>
				</div>


				</td>
			</tr>
		</table>
	</td>
	</tr>
</table>

	
<? include_once('admin_footer.php');?>

 
</body>
</html>