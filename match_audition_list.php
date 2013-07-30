<?php
error_reporting(0);
include('constants.php');
include('check_session.php');	
include('paging1.php');
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





	<script>
	function apply(job_id){
		
	window.location.href="apply_audition.php?tab=1&job_id="+job_id;
	return true;
	
	}
</script>
</head>

<body>
<!-- FILE TO DISPLAY SIDE TAB -->
<?include('left_tab.php');?>
	<div id="main_container">

		
<?include('top.php');?> 	
			<div>
				<div class="main_body_area">
					<div class="left_area">
					</div>

					<div class="center_body" style="width:800px;">
					<!-- INCLUDED FILE TO DISPLAY SIDE TAB ON CENTER TAB -->
					 <?include('left_work_room.php');?>
						<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
						<tr>
                            	<td colspan="3" style="padding-bottom:5px;">
                                <div class="jobs_tabing">
                                	<ul>
                                    	<li><a href="match_job_list.php?tab=1" >Jobs</a></li>
                                        <li><a href="match_audition_list.php?tab=1" class="active">Auditions</a></li>
                                    </ul>
                                </div>
                                </td>
                            </tr>
							
						 <?php
						  $query1 = "select * from fs_talent where member_id='".$_SESSION['fab_id']."'";
		                  $run1 = q($query1);
		                  $count1 = nr($run1);
		                  $fatch1 = f($run1);
						 
						
						 
						 
						 
						 
						 
						 
						 
						 $main_skill = $fatch1['main_skill'];
									if($main_skill!='') {


		                             $skill = explode(",",$main_skill);
									// echo $main_skill;
		                             foreach ($skill as &$value) {
										 // echo $value;

										 if($value!=""){


				                      $sql_match = "SELECT DISTINCT fld_id	FROM fs_oudition WHERE main_skill LIKE '%".$value."%'"; 
									  $run_match = q($sql_match);
									  while($fatch_match = f($run_match)) {



									  $array .=	$fatch_match['fld_id'];
									  $array.=",";
									  }
									 } 
									 
									 }




                         $array1 = substr($array,0,-1);

                         if($_REQUEST['page'] == '' || $_REQUEST['page'] == 1){
                            $limit2 = "ORDER BY fld_id DESC LIMIT 0,8";
                        }else if($_REQUEST['page'] > 1){
                            $off = ($_REQUEST['page']-1)*8;
                            $value = 5;
                            $limit2 = "ORDER BY fld_id DESC LIMIT ".$off.",".$value." ";
                        }

                        $qls=  "SELECT * FROM fs_oudition WHERE fld_id IN (".$array1.") and fld_id!='' ".$limit2."";




									// echo $array;
									   //$dif_array = explode(",", $array);
									  // $red_array = array_unique($dif_array);
									  // $i = 1;
								//foreach ($red_array as &$value1) {
									//echo $value1;
									
										
										//$qls = "select * from fs_oudition where fld_id = '".$value1."'";



										$qls_run = q($qls);
										$nub_row = nr($qls_run);
										if($nub_row!=0){
										while($qls_fatch = f($qls_run)){
										
										$qls_comp = "select * from fs_mamber where fld_id = '".$qls_fatch['company_id']."'";
										$qls_run_comp = q($qls_comp);
										$qls_fatch_comp = f($qls_run_comp);

										$qls_comp_logo = "select * from fs_portfolio_logo where ex_id = '".$qls_fatch['company_id']."'";
										$qls_run_comp_logo = q($qls_comp_logo);
										$qls_fatch_comp_logo = f($qls_run_comp_logo);
									?>












							<tr>










                                <!------------------------->
								<td class="job_area">
                                
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
                          <td >
							 <div class="talent_result_area" style="border:none;">
						
                        <h1><a href="view_audation_details.php?id=<?=$qls_fatch['fld_id']?>"><?=$qls_fatch['title']?></a></h1>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="clear:both;">
                          <tr>
                            	<?if($qls_fatch_comp['profile_crop_image']!=null){?>
							<td valign="top" width="70"><img src="<?=$qls_fatch_comp['profile_crop_image']?>" width="60" height="60" /></td>
                             <?}else{?>
                            <td valign="top" width="70"><img src="newhome/images/images.jpg" width="60" height="60" /></td>
                            <?}?>
                            <td valign="top" class="talent_result"><h1><a href="view_audation_details.php?id=<?=$qls_fatch['fld_id']?>"><?=$qls_fatch_comp['name']?></a></h1>
                           	  <p><strong>Location:</strong> <?=$qls_fatch['interview_city']?>,<?=$qls_fatch['interview_state']?>,<?=$qls_fatch['interview_country']?></p>
                              <p><strong>Skills:</strong> <?=$qls_fatch['main_skill']?></p></td>
					<?
						   $sql_apply = q("select * from fs_applied_audation where talent_id = '".$_SESSION['fab_id']."' AND audation_id = '".$qls_fatch['fld_id']."'");

						    
						   $sql_f = nr($sql_apply);
						   if($sql_f==0){
					?>

                          <td><div class="reject_btn"><a href="#" onclick="apply(<?=$qls_fatch['fld_id']?>)">Apply</a></div></td>
                         <?}else{?>
                          <td style="padding-left:45px;"><div class="reject_btn"><i>Applied</i></div></td>

                          <?}?>

                            </tr>
                           </table>

                           </div>
                         </td>

							   <!------------------------->








							</tr>

	</table>

                                
                                </td>
							</tr>
							






							<?
							}$x++;?>
							
							
							 <tr >
                                  <td colspan="3" align="center" height="10px" style="color: #B00000">
                                            <?
                                             $sqlag = "SELECT * FROM fs_oudition WHERE fld_id IN (".$array1.") and fld_id!=''";
                                       
                                                $rescs = q($sqlag);
                                                 $countcs = nr($rescs);
                                                if($countcs >8){
                                                    doPages(8, 'match_audition_list.php', '', $countcs); 
                                                }
                                            ?>
                                   </td>
                           </tr>
							
							
							
							
							
							
							
							
							
							<?}else {?>
								 <tr>
							          <td colspan="3"> <a>Audition List not found...</a></td>
								 </tr>
							<?}?>
							
							
							
							
							
							<?}?>
							
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
