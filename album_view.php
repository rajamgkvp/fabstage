<?include_once('constants.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- sCRIPT TO DISPLAY GRAYBOX -->
<script>
function create(){
	winparam = 'width=900,height=600,scrollbars=1,left=100,top=60,screenX=100,screenY=100';
	window.open('create_albums.php','',winparam);
}
</script>

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
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body style="background:url(images/bg.jpeg) center top no-repeat fixed;" onload="MM_preloadImages('images/gallery/profile_hover.png','images/gallery/home_hover.png')">
		
        <div style="width:100%; float:left; background:url(images/gallery/white_bg.png) left top;">
        
        

	 <?include('left_tab.php');?> 
     
        <?include('top.php');?>
		
<div id="content_wrap" style="z-index:100;">	
				
                
                <div class="portfolio_left_area">
            	<div class="portfolio_headline">
                <ul>
                	<li><a href="#" class="active">Profile</a></li>
                    <li><a href="#">Biography</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Work History</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
                </div>
                
              <div class="portfolio_name">
                	<h1>Abbery Nettles</h1>
                    <div class="portfolio_subscribe_btn_area">
                    	<div class="subscribe"><a href="#">+Select</a></div>
                        <div class="subscribe"><a href="#">Subscribe</a></div>
                    </div>
                    <h2>Mum, Maharastra, India</h2>
                </div>
                </div>
                
			   
					
			<!-- THE SELECTED FILTER -->
			<h3><div style="transition-duration: 0.5s, 0.5s; transition-property: opacity, opacity; transition-timing-function: ease, ease; opacity: 1;" id="selected-filter-title" class="fullwidth"><div class="listitem" style="position:relative;left:0px; color:#fff; clear:both;">All Albums</div></div></h3>

			<div class="portfolio_subscribe_btn_area" style="margin-top:-22px;float:right;margin-right:250px;">
                    	<div class="subscribe"><a href="#" onClick="javascript:create();">Create Albums</a></div>
                   
                    </div>
			<div style="height: 1106px; clear:both;" class="example-wrapper">	
				
				  
				
				<!-- THE FILTER BUTTON -->
				<div id="portfolio-filter" class="filter-fullwidth dropdown ">
				    
					<div class="buttonlight"><span class="category">Albums Selection</span></div>					
					<ul>

					   <li class="selected-filter-item" style="display: none; opacity: 0; top: -20px;" data-category="catall"><div class="listitem" style="position:relative;left:0px;">All Albums</div></li>
						<?
						 $query_g = "SELECT DISTINCT folder_name FROM fs_album where talent_id='".$_SESSION['fab_id']."' order by folder_name asc";
			             $run_g = q($query_g);
			             while($fatch_g = f($run_g)){
						
						
						?>

						
						<li style="display: none; opacity: 0; top: -20px;" data-category="cata"><div class="listitem" style="position:relative;left:0px;"><a style="color:#fff;" href="album_view.php?album=<?=$fatch_g['folder_name']?>"><?=$fatch_g['folder_name']?></a></div></li>

						<?}?>



					</ul>																		
				</div>		
				
				
				
				
				
				
				
				
				
				
				
				<!-- THE PORTFOLIO GRID ITSELF -->
				<div style="position: relative;" id="products" class="tp-portfolio theBigThemePunchGallery">											
						
				
				
				
				 <?
				   $select_q = "select * from fs_album where talent_id = '".$_SESSION['fab_id']."' AND folder_name = '".$_REQUEST['album']."'";
				   $run_q  = q($select_q);
				   $i = 1;
				   while($fatch_q = f($run_q)){
					   if($i==17){
					     $i=1;
					   }
					        

					
					   if($i==1){
				 
				 ?>
				
				
				  
				 <div style="width: 362px; height: 176px; position: absolute; opacity: 1; left: 0px; top: 0px; transition-duration: 0.001s, 0.001s, 0.001s, 0.35s, 0.35s, 0.35s; transition-property: left, opacity, top, opacity, left, top; transition-timing-function: ease, ease, ease, ease, ease, ease; visibility: visible;" class="cell2x1 catb catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo"  src="uploader/savefiles/<?=$fatch_q['pic']?>"><img  style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 125.5px; opacity: 1; top: 125px; visibility: visible;" class="caption">Hipp Hopp Girl</div>	
							
							<div class="entry-info">						
								<div class="media" data-src="images/gallery/large1.jpg"></div>
								<div class="entry-title">Category One - Hipp Hopp Girl</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div> 	
						<?}if($i==2){?>	

						<div style="left: 131px; top: 148px; display: none; opacity: 0;" class="hover-more-sign"></div><a style="left: 191px; top: 148px; display: none; opacity: 0;" href="#" class="blog-link hover-blog-link-sign"></a></div><div style="width: 176px; height: 362px; position: absolute; opacity: 1; left: 372px; top: 0px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell1x2 cata catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="position: absolute; left: 10px; width: 126px; opacity: 1; top: 296px; visibility: visible; transition-duration: 0.2s, 0.2s; transition-property: top, opacity; transition-timing-function: ease, ease;" class="caption">Cool Dude Doing Cool Stuff</div>
							<!--<a href="#" class="blog-link"></a>							-->
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large2.jpg"></div>
								<div class="entry-title">Category One - Cool Dude Doing Cool Stuff</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>
							<?}if($i==3){?>	





						<div style="left: 63px; top: 241px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s; transition-property: top, opacity; transition-timing-function: ease, ease;" class="hover-more-sign"></div></div><div style="width: 362px; height: 362px; position: absolute; opacity: 1; left: 558px; top: 0px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell2x2 cata catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s, 0.2s; transition-property: opacity, opacity; transition-timing-function: ease, ease; opacity: 1;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 132px; opacity: 0; top: 251px; visibility: visible; transition-duration: 0.2s, 0.2s; transition-property: top, opacity; transition-timing-function: ease, ease;" class="caption">Guy In White</div>							
							
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large3.jpg"></div>
								<div class="entry-title">Category One - Guy In White</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>	
							
						 <?}if($i==4){?>	



						<div style="left: 131px; top: 156px; display: block; opacity: 1; transition-duration: 0.3s, 0.3s; transition-property: top, opacity; transition-timing-function: ease, ease;" class="hover-more-sign"></div><a style="left: 191px; top: 156px; display: block; opacity: 1; transition-duration: 0.3s, 0.3s; transition-property: top, opacity; transition-timing-function: ease, ease;" href="#" class="blog-link hover-blog-link-sign"></a></div><div style="width: 176px; height: 176px; position: absolute; opacity: 1; left: 930px; top: 0px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell1x1 catb catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 34.5px; opacity: 1; top: 125px; visibility: visible; transition-duration: 0.2s, 0.2s, 0.2s, 0.2s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" class="caption">Green Hoddie</div>
														
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large4.jpg"></div>
								<div class="entry-title">Category Two - Green Hoddie</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>	
							<?}if($i==5){?>	




						<div style="left: 38px; top: 148px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s, 0.3s, 0.3s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" class="hover-more-sign"></div><a style="left: 98px; top: 148px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s, 0.3s, 0.3s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" href="#" class="blog-link hover-blog-link-sign"></a></div><div style="width: 176px; height: 362px; position: absolute; opacity: 1; left: 1116px; top: 0px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell1x2 catc catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 20px; opacity: 1; top: 311px; visibility: visible; transition-duration: 0.2s, 0.2s; transition-property: top, opacity; transition-timing-function: ease, ease;" class="caption">Red Haired Dancer</div>	
																					
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large5.jpg"></div>
								<div class="entry-title">Category Three - Red Haired Dancer</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>	
						<?}if($i==6){?>		
						



						 <div style="left: 38px; top: 241px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s, 0.3s, 0.3s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" class="hover-more-sign"></div><a style="left: 98px; top: 241px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s, 0.3s, 0.3s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" href="#" class="blog-link hover-blog-link-sign"></a></div><div style="width: 176px; height: 176px; position: absolute; opacity: 1; left: 0px; top: 186px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell1x1 cata catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 47px; opacity: 1; top: 125px; visibility: visible; transition-duration: 0.2s, 0.2s; transition-property: top, opacity; transition-timing-function: ease, ease;" class="caption">Beat This</div>							
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large11.jpg"></div>
								<div class="entry-title">Category One - Beat This</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>	
							
						 <?}if($i==7){?>	



						<div style="left: 63px; top: 148px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s, 0.3s, 0.3s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" class="hover-more-sign"></div></div><div style="width: 362px; height: 176px; position: absolute; opacity: 1; left: 0px; top: 372px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell2x1 catb catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 126.5px; opacity: 1; top: 125px; visibility: visible; transition-duration: 0.2s, 0.2s; transition-property: top, opacity; transition-timing-function: ease, ease;" class="caption">Get A Move On</div>
																					
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large6.jpg"></div>
								<div class="entry-title">Category Two - Get A Move On</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>
							
						<?}if($i==8){?>	




						<div style="left: 131px; top: 148px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s, 0.3s, 0.3s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" class="hover-more-sign"></div><a style="left: 191px; top: 148px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s, 0.3s, 0.3s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" href="#" class="blog-link hover-blog-link-sign"></a></div><div style="width: 176px; height: 176px; position: absolute; opacity: 1; left: 372px; top: 372px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell1x1 catc catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 38.5px; opacity: 1; top: 125px; visibility: visible; transition-duration: 0.2s, 0.2s; transition-property: top, opacity; transition-timing-function: ease, ease;" class="caption blue">Vimeo Video</div>	
																					
							<div class="entry-info">
								<div class="media" data-typ="video" data-width="720" data-height="408" data-src="&lt;iframe class=&quot;video_clip&quot; src=&quot;http://player.vimeo.com/video/24456787?title=0&amp;byline=0&amp;portrait=0&quot; width=&quot;720&quot; height=&quot;408&quot; frameborder=&quot;0&quot; webkitAllowFullScreen allowFullScreen&gt;&lt;/iframe&gt;"></div>
								<div class="entry-title">Category Three - Vimeo Video</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>
							
						 <?}if($i==9){?>	



						<div style="left: 38px; top: 148px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s; transition-property: top, opacity; transition-timing-function: ease, ease;" class="hover-more-sign"></div><a style="left: 98px; top: 148px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s; transition-property: top, opacity; transition-timing-function: ease, ease;" href="#" class="blog-link hover-blog-link-sign"></a></div><div style="width: 362px; height: 362px; position: absolute; opacity: 1; left: 558px; top: 372px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell2x2 cata catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 122.5px; opacity: 1; top: 311px; visibility: visible; transition-duration: 0.2s, 0.2s, 0.2s, 0.2s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" class="caption red">Local FLV Video</div>	
																					
																				
							<div class="entry-info">						
								<div class="media" data-typ="video" data-flv="true" data-width="640" data-height="360" data-flvplayer="megafolio/flowplayer_plugins/flowplayer-3.2.7.swf" data-src="&lt;a href=&quot;http://www.themepunch.com/valiano/wp-content/uploads/2012/03/purpleparty.flv&quot; style=&quot;display:block;width:640px;height:360px&quot; id=&quot;individuellid-1&quot;&gt;&lt;/a&gt;"></div>
    							<div class="entry-title">FLV Video<br><span style="font-size:11px;color:#bbb;">Lorem Ipsum</span></div>
    							<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>							
							</div>	


						<?}if($i==10){?>	


						<div style="left: 131px; top: 241px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s, 0.3s, 0.3s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" class="hover-more-sign"></div><a style="left: 191px; top: 241px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s, 0.3s, 0.3s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" href="#" class="blog-link hover-blog-link-sign"></a></div><div style="width: 176px; height: 362px; position: absolute; opacity: 1; left: 930px; top: 372px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell1x2 catb catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 34px; opacity: 1; top: 311px; visibility: visible; transition-duration: 0.2s, 0.2s; transition-property: top, opacity; transition-timing-function: ease, ease;" class="caption red">Youtube Video</div>	
																					
							<div class="entry-info">
								<div class="media" data-typ="video" data-width="720" data-height="408" data-src="&lt;iframe class=&quot;video_clip&quot; src=&quot;http://www.youtube.com/embed/kjX-8kQmakk?hd=1&amp;wmode=opaque&amp;autohide=1&amp;showinfo=0&quot; height=&quot;408&quot; width=&quot;720&quot; frameborder=&quot;0&quot; webkitAllowFullScreen allowFullScreen&gt;&lt;/iframe&gt;"></div>
								<div class="entry-title">Category Two - Youtube Video</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>	
							
						<?}if($i==11){?>	

						<div style="left: 38px; top: 241px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s, 0.3s, 0.3s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" class="hover-more-sign"></div><a style="left: 98px; top: 241px; display: block; opacity: 0; transition-duration: 0.3s, 0.3s, 0.3s, 0.3s; transition-property: top, opacity, top, opacity; transition-timing-function: ease, ease, ease, ease;" href="#" class="blog-link hover-blog-link-sign"></a></div><div style="width: 362px; height: 176px; position: absolute; opacity: 1; left: 0px; top: 558px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell2x1 catb catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 126.5px; opacity: 1; top: 125px; visibility: visible;" class="caption">Golden Shoes</div>							
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large10.jpg"></div>
								<div class="entry-title">Category Two - Golden Shoes</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>	
							
						 <?}if($i==12){?>	

						<div style="left: 156px; top: 148px; display: none; opacity: 0;" class="hover-more-sign"></div></div><div style="width: 176px; height: 362px; position: absolute; opacity: 1; left: 372px; top: 558px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell1x2 cata catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 39px; opacity: 1; top: 311px; visibility: visible;" class="caption">Envato Bro's</div>							
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large14.jpg"></div>
								<div class="entry-title">Category One - Envato Bro's</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>	
							
						<?}if($i==13){?>	

						<div style="left: 63px; top: 241px; display: none; opacity: 0;" class="hover-more-sign"></div></div><div style="width: 362px; height: 176px; position: absolute; opacity: 1; left: 0px; top: 744px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell2x1 cata catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 139.5px; opacity: 1; top: 125px; visibility: visible;" class="caption">Sideways</div>							
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large13.jpg"></div>
								<div class="entry-title">Category One - Sideways</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>	
							
					   <?}if($i==14){?>	

						<div style="left: 156px; top: 148px; display: none; opacity: 0;" class="hover-more-sign"></div></div><div style="width: 176px; height: 362px; position: absolute; opacity: 1; left: 558px; top: 744px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell1x2 cata catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 55.5px; opacity: 1; top: 311px; visibility: visible;" class="caption">Fit Girl</div>							
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large12.jpg"></div>
								<div class="entry-title">Category One - Fit Girl</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>	
						<?}if($i==15){?>		


						<div style="left: 63px; top: 241px; display: none; opacity: 0;" class="hover-more-sign"></div></div><div style="width: 176px; height: 176px; position: absolute; opacity: 1; left: 744px; top: 744px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell1x1 cata catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 28px; opacity: 1; top: 125px; visibility: visible;" class="caption">Acrobatics Dude</div>							
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large15.jpg"></div>
								<div class="entry-title">Category One - Acrobatics Dude</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div>	

					   <?}if($i==16){?>	

							
						<div style="left: 63px; top: 148px; display: none; opacity: 0;" class="hover-more-sign"></div></div><div style="width: 176px; height: 176px; position: absolute; opacity: 1; left: 930px; top: 744px; transition-duration: 0.35s, 0.35s, 0.35s; transition-property: opacity, left, top; transition-timing-function: ease, ease, ease; visibility: visible;" class="cell1x1 cata catall">
							<div class="thumbnails" data-mainthumb="uploader/savefiles/<?=$fatch_q['pic']?>" data-bwthumb="uploader/savefiles/<?=$fatch_q['pic']?>"><img class="bw-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"><img style="transition-duration: 0.2s; transition-property: opacity; transition-timing-function: ease; opacity: 0;" class="normal-thumbnail-yoyo" src="uploader/savefiles/<?=$fatch_q['pic']?>"></div>							
							<div style="left: 28px; opacity: 1; top: 125px; visibility: visible;" class="caption">Acrobatics Dude</div>							
							<div class="entry-info">
								<div class="media" data-src="images/gallery/large15.jpg"></div>
								<div class="entry-title">Category One - Acrobatics Dude</div>
								<div class="entry-description">Lorem Ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut 
labore et dolore magna aliquyam erat, sed diam voluptua</div>
							</div> 
							
				      <?}
						 $i = $i+1;
					   }?>










							
						<div style="left: 63px; top: 148px; display: none; opacity: 0;" class="hover-more-sign"></div></div></div>
			<div style="" class="pagination" id="pagination"><div class="pageofformat">Page 1 of 2</div><div id="pagebutton0" class="pages buttonlight buttonlight-selected">1</div><div id="pagebutton1" class="pages buttonlight">2</div></div></div>	
			<!-- EXAMPLE WRAP END -->

















            
            <script type="text/javascript">
			
				
				jQuery.fn.css = jQuery.fn.cssOriginal;
								 									
					
															
					<!-- 	PORTFOLIO  	-->
					 jQuery('#products').portfolio({	
					 
						<!-- GRID SETTINGS -->
						gridOffset:90,				<!-- Manual Right Padding Offset for 100% Width -->
						cellWidth:176,						<!-- The Width of one CELL in PX-->						
						cellHeight:176,						<!-- The Height of one CELL in PX-->
						cellPadding:10,						<!-- Spaces Between the CELLS -->
						entryProPage:16,					<!-- The Max. Amount of the Entries per Page, Rest made by Pagination -->
						captionOpacity:100,					<!-- Opacity of Caption -->
						captionPosition:"bottom",
						captionYOffset:-20,
						
						<!-- FILTERING -->
						filterList:"#portfolio-filter",		<!-- Which Filter is used for the Filtering / Pagination -->
						title:"#selected-filter-title",		<!-- Which Div should be used for showing the Selected Title of the Filter -->												
						
						<!-- Page x from All Pages -->
						pageOfFormat:"Page #n of #m",		<!-- The #n will be replaced with the actual Item Nr., #m will be replaced with the amount of all items in the filtered Gallery-->						
						
						<!-- Social Settings-->
						showGoogle:"yes",					<!-- Show The Social Buttons ...-->
						showFB:"yes",
						showTwitter:"yes",
							
						showEmail:"yes",																<!-- ADD EMAIL TO LINK ALSO TO THE LIGHTBOX  -->
						emailLinkText:"Email to Friend",
						emailBody:"mailto:vinay@shashwatco.com?body=I found some great File here #url",	<!-- The #url will be replaced with the url of the image -->
						emailUrlCustomPrefix:"shashwatco.com",								<!-- Use this if you wish a Custom Prefix to Link Path -->						
						emailUrlCustomSuffix:"?ref=...",												<!-- Use This if you wish to use a Custtom Suffix for Link Path -->
						
						urlDivider:"?",						<!-- What is the Divider in the Url to add the Variables, Filter and Image ID . Impotant for WordPress i.e. Social will share this link with this divider -->
						
						<!-- BACKGROUND -->
						backgroundHolder:"#main-background",
						backgroundSlideshow:0
						
			});
			</script>
			
		</div>
			
		
	<div class="clear"></div>
    
<?include('inner_footer.php');?>
    </div>
	

</body></html>