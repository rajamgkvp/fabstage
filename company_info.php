<div class="portfolio_headline">
                <ul>
                	<li><a href="#" class="active">Profile</a></li>
                    <!-- <li><a href="#">Biography</a></li> -->
                    <li><a href="company_gallery.php">Gallery</a></li>
                    <li><a href="company_project.php">Work History</a></li>
                    <li><a href="company_contact.php">Contacts</a></li>
                </ul>
			</div>
			<div class="portfolio_name">

			<?
			  $select_profile_info = "select * from fs_company where member_id = ".$_SESSION['fab_id']."";
			  $query_profile =  q($select_profile_info);
			  $faych_profile = f($query_profile);



			   $select_profile_info_con = "select * from  fs_company_contact where company_id = ".$_SESSION['fab_id']." and address!='' order by fld_id asc limit 1";
			  $query_profile_con =  q($select_profile_info_con);
			  $faych_contact = f($query_profile_con);
			?>
                <h1><?=ucfirst($faych_profile['company_name'])?></h1>
                    <div class="portfolio_subscribe_btn_area">
                    	
                    </div>
                    <h2><?=$faych_contact['address']?></h2>
			</div>