<?include('constants.php');

	    $query = "select * from fs_mamber where fld_id='".$_SESSION['fab_id']."'";
		$run =   q($query);
		$count = nr($run);
		$fatch = f($run);

	    $query1 = "select * from fs_company where member_id='".$_SESSION['fab_id']."'";
		$run1 =   q($query1);
		$count1 = nr($run1);
		$fatch1 = f($run1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>




<script>
function EvalSound(soundobj) {
  var thissound=document.getElementById(soundobj);
  thissound.play();
}
</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FabStage.Com</title>
<link href="css/inside_css.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/slider.css" />

<style>
		.links{margin:10px;}
		.links a{display:inline-block; padding:3px 15px; margin:7px 10px; background:#444; text-decoration:none; -webkit-border-radius:15px; -moz-border-radius:15px; border-radius:15px;}
		.links a:hover{background:#eb3755; color:#fff;}
		.output{margin:20px 40px;}
		code{color:#5b70ff;}
		.content{ width:580px; height:185px; padding:10px; overflow:auto; background:#444; -webkit-border-radius:2px; -moz-border-radius:2px; border-radius:2px;}
		.content .images_container{overflow:hidden;}
		.content .images_container img{display:block; float:left; margin:0px; border:5px solid #777;}
		a[rel='toggle-buttons-scroll-type']{display:inline-block; text-decoration:none; padding:3px 15px; -webkit-border-radius:15px; -moz-border-radius:15px; border-radius:15px; background:#000; margin:5px 20px 5px 0;}
	</style>
    
    <link href="css/jquery.css" rel="stylesheet">

	<!-- sCRIPT TO DISPLAY GRAYBOX -->
		<script type="text/javascript">
			var GB_ROOT_DIR = "greybox/";
		</script>
		<script type="text/javascript" src="greybox/AJS.js"></script>
		<script type="text/javascript" src="greybox/AJS_fx.js"></script>
		<script type="text/javascript" src="greybox/gb_scripts.js"></script>
		<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body style="background:#f0f0f0;">
<div id="main_container">
	<?include('top.php');?>
    
    <div>
    
    
    	<div class="main_body_area">
        
    	<div class="right_ads">
					<img src="images/ads.jpg" />
				</div>
        	
            <div class="work_page_area">
            <ul>
            <li>
            	<h2>Heading 1</h2>
            	<div class="mod_img"></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p> 
            </li>
            
            <li>
            	<h2>Heading 2</h2>
            	<div class="mod_img2"></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p> 
            </li>
            
            <li>
            	<h2>Heading 3</h2>
            	<div class="mod_img3"></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry....</p> 
            </li>
            <li>
            	<h2>Heading 4</h2>
            	<div class="mod_img"></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p> 
            </li>
            
            <li>
            	<h2>Heading 5</h2>
            	<div class="mod_img2"></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p> 
            </li>
            
            <li>
            	<h2>Heading 6</h2>
            	<div class="mod_img3"></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry....</p> 
            </li>
            </ul>
            </div>
          
       
        
        
    </div>
    
    </div>
    
    
    
    <div>
    	<div class="footer_ads">
   	    <div class="footer_ads_area">
            	<div class="footer_ads_left">
                	<div class="slider">
              <div id="ei-slider" class="ei-slider">
                    <ul class="ei-slider-large">
						<li><img src="images/footer_banner.png" /></li>
                        <li><img src="images/footer_banner2.png" /></li>
                        <li><img src="images/footer_banner3.png" /></li>
                        <li><img src="images/footer_banner2.png" /></li>
                        <li><img src="images/footer_banner4.png" /></li>
                       
                    </ul><!-- ei-slider-large -->
                    <ul class="ei-slider-thumbs">
                    <li class="ei-slider-element"></li>
						<li><a href="#">Deal of the day</a></li>
                        <li><a href="#">Stationery</a></li>
                        <li><a href="#">Perfumes</a></li>
                        <li><a href="#">Appliances</a></li>
                        <li><a href="#">IPL Kicks off</a></li>
                </ul><!-- ei-slider-thumbs -->
                </div><!-- ei-slider -->
            </div><!-- wrapper -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.eislideshow.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript">
		$.noConflict();
  jQuery(document).ready(function($) {
            $(function() {
                $('#ei-slider').eislideshow({
					animation			: 'center',
					autoplay			: true,
					slideshow_interval	: 3000,
					titlesFactor		: 0
                });
            });
			});
        </script>
                </div>
                
            <div class="footer_ads_right"><a href="#"><img src="images/ads_banner_girl.png" width="277" height="226" /></a></div>
          </div>
        </div>
    </div>
    
    <?include('inner_footer.php');?>
    
</div>
</body>
</html>
