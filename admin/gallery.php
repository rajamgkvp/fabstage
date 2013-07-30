<?php 
	include_once('constants.php');
	include('check_session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
	<!------------>
        <link rel="stylesheet" type="text/css" href="fab_gallery/css/demo.css" />
         <link rel="stylesheet" type="text/css" href="fab_gallery/css/style3.css" /> 
    <!------------>


    <!-----delete------------->
<script>
       function delete_image(id){
	      if(confirm('Are you sure to delete this Image'))
	       window.location.href='delete_gallery_image.php?image_id='+id;
          }

</script>
	<!----------------->
			<script>
			function open(){
				winparam = 'width=900,height=600,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
				window.open('edit_talent_step8.php','',winparam);
			}
		</script>
 
		<!-- sCRIPT TO DISPLAY GRAYBOX -->
<!--<script type="text/javascript">
			var GB_ROOT_DIR = "greybox/";
		</script>
		<script type="text/javascript" src="greybox/AJS.js"></script>
		<script type="text/javascript" src="greybox/AJS_fx.js"></script>
		<script type="text/javascript" src="greybox/gb_scripts.js"></script>
		<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
		<!-- sCRIPT TO DISPLAY GRAYBOX --> 
		

		<!----audio file player script-->
		<script>
			function create(){
				winparam = 'width=900,height=600,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
				window.open('create_albums.php','',winparam);
			}
		</script>

        <!-- end -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>FabStage.Com</title>
		
		<script type="text/javascript" src="js/jquery.js"></script>	
		<!-- CSS STYLE -->
		<link rel="stylesheet" type="text/css" href="css/style-full.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/settings-full.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/lightbox-full.css" media="screen">
		<!-- jQuery PORTFOLIO   -->
		<script type="text/javascript" src="js/jquery_003.js"></script>		
		<script type="text/javascript" src="js/jquery_002.js"></script>		
		<script type="text/javascript" src="js/flowplayer-3.js"></script>		
		<!-- FONT IMPORT -->
		<link href="css/css.css" rel="stylesheet" type="text/css">
		<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/slider.css" />

		

<script type="text/javascript" src="gallery/js/jquery-1.9.0.min.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="gallery/js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="gallery/css/jquery.fancybox.css" media="screen" />


	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="gallery/css/jquery.fancybox-thumbs.css" />
	<script type="text/javascript" src="gallery/js/jquery.fancybox-thumbs.js"></script>

	

	<script type="text/javascript">
		$(document).ready(function() {
		$('.fancybox').fancybox();

		$('.fancybox-thumbs').fancybox({
				prevEffect : true,
				nextEffect : true,

				closeBtn  : true,
				arrows    : true,
				nextClick : true,

				helpers : {
					thumbs : {
						width  :50,
						height :50
					}
				}
			});
		});
	</script>


	</head>

	<body style="background:url(images/bg.jpeg) center top no-repeat fixed;" onload="MM_preloadImages('images/gallery/profile_hover.png','images/gallery/home_hover.png')">
	<?include('left_tab.php');?> 
        <div style="width:100%; float:left; background:url(images/gallery/white_bg.png) left top;">
<?include('top.php');?> 
	<div class="clear"></div>
	
	<div id="content_wrap" style="z-index:100;">	
		<div class="portfolio_left_area">
            <div class="portfolio_headline">
                <ul>
                	<li><a href="profile.php" class="active">Profile</a></li>
                    <li><a href="#">Biography</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="project.php">Work</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
			</div>
			<div class="portfolio_name">
                <h1>Abbery Nettles</h1>
                    <div class="portfolio_subscribe_btn_area">
                    	<div class="subscribe"><a href="#">+Select</a></div>
                        <!-- <div class="subscribe"><a href="#">Subscribe</a></div> -->
                    </div>
                    <h2>Mum, Maharastra, India</h2>
			</div>
		</div>
		<!-- THE SELECTED FILTER -->









	<!------	<h3>
			<div style="transition-duration: 0.5s, 0.5s; transition-property: opacity, opacity; transition-timing-function: ease, ease; opacity: 1;" id="selected-filter-title" class="fullwidth">
				<div class="listitem" style="position:relative;left:0px; color:#fff; clear:both;">Add Portfolio
				</div>
			</div>
		</h3>

		<div style="width:100%; float:left; margin-bottom:25px;">
			<div style="width:352px; float:left; border:1px #333 solid; padding:5px; margin-right:5px; margin-bottom:5px;">
				 <a href="talent_portfolio.php" ><img src="images/gallery/thumb1.jpg"></a>



			</div>

			
		</div>
-->

        <div style="width:990px; height:30px; float:left; background:#313131; margin:15px 0px;clear:both;">
        <div style="float:left; font-size:13px; color:#ccc; font-weight:bold; font-family: Arial, Helvetica, sans-serif; line-height:30px; padding-left:10px; "> Portfolio</div>
        
		<!---   <div class="upload_btn"><a href="talent_portfolio.php">+ Upload File</a></div>        -->

			<div class="upload_btn"><a href="#" onClick="javascript:open()">+ Upload File</a></div>
		</div>
		
      
	   
	   
	   
	   
	   
	   
	   
	   <div style="clear:both;"></div>
	   
	<table>
	 <tr>
	  <td valign="top">
	       <div style="float:left; width:170px; clear:both;">
				<?include('include_gallery_skill.php');?>
			</div>
	  </td>
	   
	 
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   <td>


	   <h3>
			<div style="transition-duration: 0.5s, 0.5s; transition-property: opacity, opacity; transition-timing-function: ease, ease; opacity: 1;" id="selected-filter-title" class="fullwidth">
				<div class="listitem" style="position:relative;left:0px; color:#fff; clear:both;">Portfolio Image</div>
				</div>
		</h3>
	



 <div style="width:100%; float:left; margin-bottom:25px;">
		
	   <ul class="thumbnail-tabs">
		
		   <?
				if($_REQUEST['skill']==''){
                        $jpg = ".jpg";
				        $png = ".png";
				        $gif = ".gif";
					  
					   $query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND (portfolio_data LIKE '%".$jpg."%' OR portfolio_data LIKE '%".$png."%' OR portfolio_data LIKE '%".$gif."%')";
					   $run = q($query_gallery);
					   while($run_gallery = f($run)){

                       $link = "portfolio_uploader/savefiles/".$run_gallery['portfolio_data']."";

							?>
					
        <li>
				
				
				
				<span class="img-title"><!-- Image img-title here --></span><a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?=$link?>"><img src="<?=$link?>" width="150" alt="" /></a>
				<div style="float:right;">
				
				<!-- <a href="#"><img src="http://vs.sitebysite.us/fabstage/Gallery/images/edit_icon.png" title="Edit"></a> -->

				<a href="#" onClick="javascript:delete_image(<?=$run_gallery['fld_id']?>)">
							<img src="http://vs.sitebysite.us/fabstage/Gallery/images/close_icon.png" title="Delete Image" alt="Delete Image"></a>

				<a href="example13/index.php?link=<?=$link?>"><img src="http://vs.sitebysite.us/fabstage/Gallery/images/set_profile_icon.png" title="Set Profile Image" alt="Set As Profile "></a>
				
				
				</div>




       </li>
	<?}?>
							  <!-- Close here -->
	<?}else{
					

						$jpg = ".jpg";
				        $png = ".png";
				        $gif = ".gif";
					  
					   $query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND (portfolio_data LIKE '%".$jpg."%' OR portfolio_data LIKE '%".$png."%' OR portfolio_data LIKE '%".$gif."%') AND skill LIKE '%".$_REQUEST['skill']."%'";
					   $run = q($query_gallery);
					   while($run_gallery = f($run)){

                       $link = "portfolio_uploader/savefiles/".$run_gallery['portfolio_data']."";

		?>
					
                       
		<li>
				
				

				<span class="img-title"><!-- Image img-title here --></span><a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?=$link?>"><img src="<?=$link?>" width="150" alt="" /></a>
				<div style="float:right;">

				<!-- <a href="#"><img src="http://vs.sitebysite.us/fabstage/Gallery/images/edit_icon.png" title="Edit"></a> -->
			    <a href="#" onClick="javascript:delete_image(<?=$run_gallery['fld_id']?>)">
							<img src="http://vs.sitebysite.us/fabstage/Gallery/images/close_icon.png" title="Delete Image" alt="Delete Image"></a>

				<a href="example13/index.php?link=<?=$link?>"><img src="http://vs.sitebysite.us/fabstage/Gallery/images/set_profile_icon.png" title="Set Profile Image" alt="Set As Profile "></a>
				
				</div>



       </li>
						  
						  
						  
	 <?}?>
							  <!-- Close here -->
 <?}?>

		</ul>
                    
				 </div> 
				<!-- Image Finished -->



			<!-- </div> -->
	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
<!------portpolio audio start------------>	 

    <?
                        $mp3 = ".mp3";
				        $wav = ".wav";
				      
					   $i = 1;

					   if($_REQUEST['skill']==''){
					   $query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND (portfolio_data LIKE '%".$mp3."%' OR portfolio_data LIKE '%".$wav."%')";
                       }else{
					    $query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND (portfolio_data LIKE '%".$mp3."%' OR portfolio_data LIKE '%".$wav."%')AND skill LIKE '%".$_REQUEST['skill']."%'";
					   
					   }

					   $run = q($query_gallery);

					   $fatch_num_of_audio = nr($run);
					   if( $fatch_num_of_audio!=0){
	?> 
	 
	 <h3>
			<div style="transition-duration: 0.5s, 0.5s; transition-property: opacity, opacity; transition-timing-function: ease, ease; opacity: 1;" id="selected-filter-title" class="fullwidth">
				<div class="listitem" style="position:relative;left:0px; color:#fff; clear:both;">Portfolio Audio</div>
				
			</div>
	</h3>
	<?}?>

     <div style="width:100%; float:left; margin-bottom:25px;">

        <div class="container">
			<section>
				<ul class="lb-album"> 
					
					<?

					   while($run_gallery = f($run)){
					?>
					
					<li>
						<a  href="portfolio_uploader/savefiles/<?=$run_gallery['portfolio_data']?>"> <!-- <a href="#image-<?=$i?>"> -->
							<img src="images/mp3.png" width="150"  alt="image01"><!-- </a> -->
							<span><?=$run_gallery['title']?></span>
						 </a> 
						<div class="lb-overlay" id="image-<?=$i?>">
							<a href="portfolio_uploader/savefiles/<?=$run_gallery['portfolio_data']?>"><img src="images/mp3.png" alt="image01" /></a>
                            <a href="#page" class="lb-close">x Close</a>
							<div>
                            	<h2><?=$run_gallery['title']?></h2>
								<p><?=$run_gallery['description']?><br></p>
								
								<a href="#image-<?=$i-1?>" class="lb-prev">Prev</a>
								<a href="#image-<?=$i+1?>" class="lb-next">Next</a>
							</div>
							
						</div>
					</li>

              <?$i = $i+1;}?>

				</ul>
			</section>
        </div>

     </div>


<script src="http://mediaplayer.yahoo.com/js"></script>

<!----------- portpolio audio end here ------------>













<!--------------portfolio video section-------------------->

       
		
		
		<?
		                $jpg = ".jpg";
						$png = ".png";
						$gif = ".gif";
						$i = 1;
						 if($_REQUEST['skill']==''){
						$query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND video != ''";
						 }else{
						 
						 $query_gallery = "select * from fs_talent_portfolio where talent_id = '".$_SESSION['fab_id']."' AND skill LIKE '%".$_REQUEST['skill']."%'  AND video != ''";
						 
						 }
						$run = q($query_gallery);
						$num_of_item = nr($run);
						if($num_of_item!=0){
		
		?>
		
		
		
		<h3>
			<div style="transition-duration: 0.5s, 0.5s; transition-property: opacity, opacity; transition-timing-function: ease, ease; opacity: 1;" id="selected-filter-title" class="fullwidth">
				<div class="listitem" style="position:relative;left:0px; color:#fff; clear:both;">Portfolio Video</div>
				
			</div>
		</h3>
<?}?>
   
	
	<div style="width:100%; float:left; margin-bottom:25px;">
         <div >
			
				<ul> 
					
					
					  <?

						
						while($run_gallery = f($run)){

                         $videog = $run_gallery['video'];
					   
					?>
					
					 <li>
						
							<iframe width="150" height="150" src="<?=$videog?>" frameborder="0" allowfullscreen></iframe>
							
						
						
					</li>
					<li>&nbsp;<li>

              <?}?>

			</ul>
			
        </div>

     </div>


		 

</div>
			
		
			<div style="" class="pagination" id="pagination"></div>
</div>
		<!-- EXAMPLE WRAP END -->
</td></tr>
</table>



	</div>


	<div class="clear"></div>
	<div class="footer_area">
		<div class="footer_content">
			<div class="footer_links">
				<h1>Home Links</h1>
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Find Talent</a></li>
					<li><a href="#">Companies & Agencies</a></li>
					<li><a href="#">Jobs & Auditions</a></li>
					<li><a href="#">Ask & Articles</a></li>
					<li><a href="#">Market Place</a></li>
					<li><a href="#">Gallery</a></li>
				</ul>
			</div>
			<div class="footer_links">
				<h1>Footer Links</h1>
				<ul>
					<li><a href="#">Models</a></li>
					<li><a href="#">Agencies</a></li>
					<li><a href="#">Photographers</a></li>
					<li><a href="#">Castings</a></li>
					<li><a href="#">Membership</a></li>
					<li><a href="#">Blogs</a></li>
					<li><a href="#">Community</a></li>
				</ul>
			</div>
			<div class="footer_links">
				<h1>Important Links</h1>
				<ul>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Company Details</a></li>
					<li><a href="#">Contact Us</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Trems of Use</a></li>
				</ul>
			</div>
			<div class="footer_links">
				<h1>Important Links</h1>
				<ul>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Company Details</a></li>
					<li><a href="#">Contact Us</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Trems of Use</a></li>
				</ul>
			</div>
			<div class="follow_us">
				<h1>Follow Us</h1>
				<a href="#"><img src="images/social_icon1.png" width="22" height="22" /></a>
				<a href="#"><img src="images/social_icon2.png" width="22" height="22" /></a>
				<a href="#"><img src="images/social_icon3.png" width="22" height="22" /></a>
				<a href="#"><img src="images/social_icon4.png" width="22" height="22" /></a>
				<a href="#"><img src="images/social_icon5.png" width="22" height="22" /></a>
				<a href="#"><img src="images/social_icon6.png" width="22" height="22" /></a>
				<a href="#"><img src="images/social_icon7.png" width="22" height="22" /></a>
			</div>
			<div class="follow_us" style="margin-top:25px;">
				<h2>In Cooperation with</h2>
				<a href="#"><img src="images/footer_logo.png" /></a>
				<h3>@ 2013 - fabstage.com, All Rights reserved</h3>
			</div>
			<div class="contact_id">
			  To Advertise with us contact: <a href="#">info@fabstage.com</a>
			</div>
		</div>
	</div>
    <div class="network_bg">
    	<div class="network_area">
        	<div class="network_text">TBSL Network</div>
            <ul>
				<li><A href="#">MagicBricks<br />
				<span>Real Estate in India</span></A></li>
                <li><A href="#">TimesJobs<br />
				<span>Job in India</span></A></li>
                <li><A href="#">MagicBricks<br />
				<span>Matrimonial India</span></A></li>
                <li><A href="#">Ads2Book<br />
				<span>Classified Print Ads</span></A></li>
                <li><A href="#">TCNext<br />
				<span>Internet Classifieds</span></A></li>
                <li style="background:none;"><A href="#">TechGig<br />
				<span>Jobs in IT Software & Hardware</span></A></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>