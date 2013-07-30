		<div class="portfolio_headline">
                <ul>
                	<li><a href="talent_profile.php?talent_id=<?=$_REQUEST['talent_id']?>" class="active">Profile</a></li>
              
                    <li><a href="talent_gallery.php?talent_id=<?=$_REQUEST['talent_id']?>">Portfolio</a></li>
                    <li><a href="talent_project.php?talent_id=<?=$_REQUEST['talent_id']?>">Projects</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
			</div>
			  <?
						$query = "select * from fs_mamber where fld_id='".$_REQUEST['talent_id']."'";
						$run =   q($query);
						$count = nr($run);
						$fatch = f($run);

						$query1 = "select * from fs_talent where member_id='".$_REQUEST['talent_id']."'";
						$run1 =   q($query1);
						$count1 = nr($run1);
						$fatch1 = f($run1);
			 
			 ?>
			<div class="portfolio_name">
                <h1><?=$fatch['name']?></h1>
                    <div class="portfolio_subscribe_btn_area">
                    	<!-- <div class="subscribe"><a href="#">+Select</a></div> -->
                      
                    </div>
                    <h2><?=$fatch1['location']?></h2>
			</div>
