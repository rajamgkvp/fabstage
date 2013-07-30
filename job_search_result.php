<?php
include('constants.php');
//include('check_session.php');	
include('paging1.php');
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FabStage.Com</title>
	<link href="css/inside_css.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/slider.css" />
    <link href="paging.css" rel="stylesheet" type="text/css" />
	<!-- <script type="text/javascript">
		var GB_ROOT_DIR = "greybox/";
	</script>

	<script type="text/javascript" src="greybox/AJS.js"></script>
	<script type="text/javascript" src="greybox/AJS_fx.js"></script>
	<script type="text/javascript" src="greybox/gb_scripts.js"></script>
	<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
 -->







</head>

<body onload="getCityList(<?=$_REQUEST['cat']?>);">

<?if($_SESSION['fab_id']!=''){
include('left_tab.php');
}
?>
<div id="main_container">	

<?include('top.php');?>
		   

			<div>
				<div class="main_body_area">
					<div class="left_area">
					</div>

					<div class="center_body" style="width:800px;">
					<!-- INCLUDED FILE TO DISPLAY SIDE TAB ON CENTER TAB -->
					 <?include('advance_search_job.php');?>
						
						<!----------talent search------------------------->
						
							
							
							  
					   <table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
							<!-- <tr>
								<td colspan="2" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Match Jobs List
								</td>
							</tr>-->
								<tr>
								
								
								<td colspan="2" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Job List
								</td>
							</tr> 


 



							<?
                             if($_REQUEST['category']!="")
							{
                                 //$str .= ' main_skill LIKE "%'.$_REQUEST['category'].'%"';
							}

						      if($_REQUEST['assosiation_name']!="")
							{
                                 $str .= "  association_name LIKE '%".$_REQUEST['assosiation_name']."%' ";
							}
                            if($_REQUEST['to_experience']!="")
							{
								
								$str .= " AND experience BETWEEN ".$_REQUEST['to_experience']." AND ".$_REQUEST['from_experience']."";


							}
						 
						
                             if($_REQUEST['wag_to']!="")
							{
                                 $str .= " AND wages BETWEEN ".$_REQUEST['wag_to']." AND ".$_REQUEST['wag_from']."";

                             
							}
							 
							
                             if($_REQUEST['language']!="")
							{
                                 $str .= " AND language LIKE '%".$_REQUEST['language']."%'";
							}

                             
                               if($_REQUEST['job_type']!="")
							{
                                 $str .= " AND job_type LIKE '%".$_REQUEST['job_type']."%' ";
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
							     if($_REQUEST['look']!=""){
							
                                 $str .= " AND look LIKE '%".$_REQUEST['look']."%' ";
							}

				
						
						 
					/////////////////////////
						 if($_REQUEST['category']!= "" AND $_REQUEST['category']!= "Enter Your Skill...")
						 {
						   $ptr .= " main_skill LIKE '%".$_REQUEST['category']."%'";
						 }
                         






						  if($_REQUEST['location']!= "" AND $_REQUEST['location']!= "Enter Your Location..."){
                              if($_REQUEST['category']!=''){
						  $ptr .= " AND (interview_country LIKE '%".$_REQUEST['location']."%' OR interview_state LIKE '%".$_REQUEST['location']."%' OR interview_city LIKE '%".$_REQUEST['location']."%')";
							  }else{
							  
							   $ptr .= " interview_country LIKE '%".$_REQUEST['location']."%' OR interview_state LIKE '%".$_REQUEST['location']."%' OR interview_city LIKE '%".$_REQUEST['location']."%' ";
							  
							  }
						 }
                 
                  ////////////////////////////////
                 
                        if($ptr!=''){
				            $query_job = "select * from fs_job where ".$ptr." order by interview_city ASC";	 
						}else{
						    $query_job = "select * from fs_job  order by interview_city ASC";	
						}






                     $job_run = q($query_job);        
                         while($fatch_job = f($job_run)){

                              $f_id .= $fatch_job['fld_id'];
							  $f_id .= ",";
                            }
                              $f_id;
                              $f_id = substr($f_id,0,-1);

                              if($str!=""){

                             $query_job1 = "select * from fs_job_details  where ".$str." AND job_id IN (".$f_id.")   ";
					   }else{
							    
								  $query_job1 = "select * from fs_job_details  where  job_id IN (".$f_id.")   ";
							  
						}

						      $job_run1 = q($query_job1);
                              while($fatch = f($job_run1)){
                               
                              $jobid .=  $fatch['job_id'];
                              $jobid .=",";
						}
                              $jobid = substr($jobid,0,-1);
                              $joi_d = array_unique(explode(",",$jobid));
							  foreach ($joi_d as &$value1) {
							  $jobid1 .=  $value1;
                              $jobid1 .=",";
						}
                              $f_id = substr($jobid1,0,-1);
                               

                              $i = 1;
							//  $array = explode(",",$f_id);







					       //   foreach ($array as &$value2) {
                               

                         if($_REQUEST['page'] == '' || $_REQUEST['page'] == 1){
                            $limit2 = "ORDER BY fld_id DESC LIMIT 0,8";
                        }else if($_REQUEST['page'] > 1){
                            $off = ($_REQUEST['page']-1)*8;
                            $value = 8;
                            $limit2 = "ORDER BY fld_id DESC LIMIT ".$off.",".$value." ";
                        }

                              
							  $member_fiend = "select * from fs_job where fld_id IN (".$f_id.") ".$limit2."";
                              
							  //$member_fiend = "select * from fs_job where fld_id = '".$value2."' ";
							  $runnn = q($member_fiend);
							
							  
							  
							  
							  
							  while($fatchhh = f($runnn)){
							  $select_company_name = f(q("select * from fs_mamber where fld_id=".$fatchhh['company_id'].""));
						?>
							
					




                        <!------------------>
                            <tR><td colspan="3">
							 <div class="talent_result_area">
                        <h1><a href="view_job_details.php?id=<?=$fatchhh['fld_id']?>"><?=$fatchhh['title']?></a></h1>
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="clear:both;">
  <tr>
    <td valign="top" width="70"><img src="<?=$select_company_name['profile_crop_image']?>" width="60" height="60" /></td>
                            <td valign="top" class="talent_result"><h1><a href="view_job_details.php?id=<?=$fatchhh['fld_id']?>"><?=$select_company_name['name']?></a></h1>
                           	  <p><strong>Location:</strong> <?=$fatchhh['interview_city']?>,<?=$fatchhh['interview_state']?>,<?=$fatchhh['interview_country']?></p>
                              <p><strong>Needs:</strong> <?=str_replace(',,',',',substr($fatchhh['main_skill'],1,50))?></p></td>
                            <td width="100" style="font-size:11px; text-align:center;" align="center">
                            <a href="view_job_details.php?id=<?=$fatchhh['fld_id']?>"><input class="search_btn" name="" type="button" value="Apply" /></a><br />
							<em><strong>Expires on:</strong><br />
 <?=$fatchhh['expire_date']?></em></td>
  </tr>
</table>

                        </div>
                         </td></tr>
						<!------------------>









						<? 
						
							$i = $i+1; }$x++;

						?>


								<tr >
                                  <td colspan="3" align="center" height="10px" style="color: #B00000">
                                            <?
                                             $sqlag = "select * from fs_job where fld_id IN (".$f_id.")";
                                       
                                                $rescs = q($sqlag);
                                                 $countcs = nr($rescs);
                                                if($countcs >8){
                                                    doPages(8, 'job_search_result.php', 'cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'&to_experience='.$_REQUEST['to_experience'].'&from_experience='.$_REQUEST['from_experience'].'&language='.$_REQUEST['language'].'&wag_to='.$_REQUEST['wag_to'].'&wag_from='.$_REQUEST['wag_from'].'&assosiation_name='.$_REQUEST['assosiation_name'].'&nationality='.$_REQUEST['nationality'].'&to_height='.$_REQUEST['to_height'].'&from_height='.$_REQUEST['from_height'].'&from_height='.$_REQUEST['from_height'].'&from_height='.$_REQUEST['from_height'].'&from_height='.$_REQUEST['from_height'].'&from_height='.$_REQUEST['from_height'].'&weight='.$_REQUEST['weight'].'&ethenicity='.$_REQUEST['ethenicity'].'&eye='.$_REQUEST['eye'].'&hair='.$_REQUEST['hair'].'&body='.$_REQUEST['body'].'&skin='.$_REQUEST['skin'].'&shoes='.$_REQUEST['shoes'].'&dress='.$_REQUEST['dress'].'&look='.$_REQUEST['look'].'&job_type='.$_REQUEST['job_type'].'', $countcs); 
                                                }
                                            ?>
                                   </td>
                           </tr>		 
							 
						
					</table>
                    
                    
                    
				

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
