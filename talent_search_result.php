<?php
include('constants.php');
include('check_session.php');	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FabStage.Com</title>
	<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/slider.css" />

	<script type="text/javascript">
		var GB_ROOT_DIR = "greybox/";
	</script>

	<script type="text/javascript" src="greybox/AJS.js"></script>
	<script type="text/javascript" src="greybox/AJS_fx.js"></script>
	<script type="text/javascript" src="greybox/gb_scripts.js"></script>
	<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />








</head>

<body onload="getCityList(<?=$_REQUEST['cat']?>);">
<?include('left_tab.php');?>
<div id="main_container">	
<?include('top.php');?>
		   

			<div>
				<div class="main_body_area">
					<div class="left_area">
					</div>

					<div class="center_body" style="width:800px;">
					<!-- INCLUDED FILE TO DISPLAY SIDE TAB ON CENTER TAB -->
					 <?include('advance_search_talent.php');?>
						
						<!----------talent search------------------------->
						<?if($_REQUEST['cat']==1){?>
						<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
							
							
							
							
							<tr>
								<td colspan="3" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Search Talent List
								</td>
							</tr>

							<!-- <tr>
								
								<td >&nbsp;</td>
								<td width="60%" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Name
								</td>
								<td  style="color:#cc0000;font-size:14px;font-weight:bold;">
									Email
								</td>
							</tr> -->


 



							<?
                             if($_REQUEST['category']!="")
							{
                                 $str .= ' main_skill LIKE "%'.$_REQUEST['category'].'%"';
							}

						
                            if($_REQUEST['to_experience']!="")
							{
								
								$str .= " AND experience BETWEEN ".$_REQUEST['to_experience']." AND ".$_REQUEST['from_experience']."";

							}
						 
						
							 if($_REQUEST['language']!="")
							{
                                 $str .= " AND language LIKE '%".$_REQUEST['language']."%'";
							}

							 if($_REQUEST['wag_to']!="")
							{
                                 $str .= " AND amount BETWEEN ".$_REQUEST['wag_to']." AND ".$_REQUEST['wag_from']."";

							}
						
                             if($_REQUEST['assosiation_name']!="")
							{
                                 $str .= " AND association_name=".$_REQUEST['assosiation_name']." ";
							}
                            if($_REQUEST['nationality']!="")
							{
                                 $str .= " AND nationality LIKE '%".$_REQUEST['nationality']."%' ";
							}

							 if($_REQUEST['to_height']!="")
                            
							{
                                 $num1 = substr($_REQUEST['to_height'],0,3);
                                 $num2 = substr($_REQUEST['from_height'],0,3);
                                 
                                $str .= " AND height BETWEEN ".$num1." AND ".$num2."";
							}



							  if($_REQUEST['weight']!="")
							{
                                 $str .= " AND weight LIKE '%".$_REQUEST['weight']."%' ";
							}
							  if($_REQUEST['ethenicity']!="")
							{
                                 $str .= " AND ethenicity LIKE '%".$_REQUEST['ethenicity']."%' ";
							}
							  if($_REQUEST['eye']!="")
							{
                                 $str .= " AND eye LIKE '%".$_REQUEST['eye']."%' ";
							}
                              if($_REQUEST['hair']!="")
							{
                                 $str .= " AND hair LIKE '%".$_REQUEST['hair']."%' ";
							}
                              if($_REQUEST['body']!="")
							{
                                 $str .= " AND body LIKE '%".$_REQUEST['body']."%' ";
							}
							  if($_REQUEST['skin']!="")
							{
                                 $str .= " AND skin LIKE '%".$_REQUEST['skin']."%' ";
							}
							  if($_REQUEST['shoes']!="")
							{
                                 $str .= " AND shoes LIKE '%".$_REQUEST['shoes']."%' ";
							}
                               if($_REQUEST['dress']!="")
							{
                                 $str .= " AND dress LIKE '%".$_REQUEST['dress']."%' ";
							}
							     if($_REQUEST['look']!="")
							{
                                 $str .= " AND look LIKE '%".$_REQUEST['look']."%' ";
							}

						 
							 $location = explode(",",$_REQUEST['location']);
							 $quer = "select * from fs_talent where ".$str." AND member_id != ".$_SESSION['fab_id']." order by fld_id desc" ;


   	                         $quer_run = q($quer);
							 $f_count = nr($quer_run);
							 if($f_count!=0){
							 while($fatch = f($quer_run)){
							 	   $location1 = explode(",",$fatch['location']);
							 	  
									foreach ($location as &$value) {
									
										if (in_array($value,$location1)){
										
										   $search_result .= $fatch['member_id'];
										   $search_result .= ",";
										}


									}

							 } } else{
							 
							 	 echo " No Result Found";
							 }
							 //echo $search_result;
							 $i = 1;
							 $search_result_array = explode(",",$search_result);
							 $search_result_array_unique = array_unique($search_result_array);
							 foreach ($search_result_array_unique as &$final) {	
								// echo $final;
								  //$i =$i+1 ;
								   if($final!=""){
								$final_query = "select * from fs_mamber where fld_id = '".$final."'"; 
								$final_run = q($final_query); 
								$final_fatch = f($final_run);
								$dselect = f(q("select * from fs_talent where member_id = '".$final."'")); 
								 
								 ?>

			<tr>				
			<td colspan="3">					
           <div class="talent_result_area">
                 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="clear:both;">
                    <tr>
                       <td valign="top" width="70"><img src="<?=$final_fatch['profile_crop_image']?>" width="60" height="60" /></td>
                       <td valign="top" class="talent_result"><h1><a href="talent_profile.php?talent_id=<?=$final?>"><?=$final_fatch['name']?></a></h1>
                           <p><strong>Location:</strong> <?=$dselect['location']?></p>
                           <p><strong></strong><?=substr($dselect['main_skill'],0,70)?>...</p></td>
                       <td width="60">
                         <input class="search_btn" name="" type="button" value="Select" />
					   </td>
                    </tr>
                </table>

            </div>	</td>
      </tr>

						    <!-- <tr>
								<td width="3%"><?=$i?>)</td>
								<td width="60%" ><a style="text-decoration:none;color:#603F3F;" href="talent_profile.php?talent_id=<?=$final_fatch['fld_id']?>"  title="Talent Information" target="_BLANK"><?=$final_fatch['name']?> </a></td>

								<td width="30%"><?=$final_fatch['email']?></td>
							</tr>
 -->



							<?}$i =$i+1; 
						   } ?>
						  
						</table>
						
						
						
						<?}?>



					</div>
					<div class="right_ads">
						<img src="images/ads.jpg" />
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
						<div class="footer_ads_right"><a href="#">
							<img src="images/ads_banner_girl.png" width="277" height="226" /></a>
						</div>
					</div>
				</div>
			</div>
			<?include('inner_footer.php');?>
		</div>
	</body>
</html>
