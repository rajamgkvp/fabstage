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

<?
 if($_SESSION['fab_id']!=''){
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
					
					 
					 <?
					
					 include('advance_search_company.php');
					
					 ?>
						
						<!----------talent search------------------------->
						
			<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
                            
                            
                


 



							<?
                            

						  if($_REQUEST['category']!= "" AND $_REQUEST['category']!= "Enter Your Skill...")
							{
                                 $str .= ' main_skill LIKE "%'.$_REQUEST['category'].'%"';
							}

							
						  if($_REQUEST['to_experience']!="")
							{
								
								$str .= " AND experience BETWEEN ".$_REQUEST['to_experience']." AND ".$_REQUEST['from_experience']."";

							}
						 
                          if($_REQUEST['assosiation_name']!="")
							{
                                 $str .= " AND association_name=".$_REQUEST['assosiation_name']." ";
							}
                           



							 
					     if($_REQUEST['page'] == '' || $_REQUEST['page'] == 1){
                            $limit2 = "ORDER BY fld_id DESC LIMIT 0,8";
                        }else if($_REQUEST['page'] > 1){
                            $off = ($_REQUEST['page']-1)*8;
                            $value = 8;
                            $limit2 = "ORDER BY fld_id DESC LIMIT ".$off.",".$value." ";
                        }
							
							 
							 if($_SESSION['fab_id']!=''){

                                       if($str!=''){
							               $quer = "select * from fs_company where ".$str." AND work_area != ''  ".$limit2."" ;
									   }else{
									   
									    $quer = "select * from fs_company where work_area!=''  ".$limit2."" ; 
									   }
							 }else{
							 
							      if($str!=''){
							  $quer = "select * from fs_company where ".$str." AND work_area != ''  ".$limit2."" ;
								  }else{
								  
								        $quer = "select * from fs_company where work_area!=''  ".$limit2."" ;    
								  }
							 }
                             
                           
							 
							 
							  if($_REQUEST['location']!= "" AND $_REQUEST['location']!= "Enter Your Location..."){
							 
                             $location = explode(",",$_REQUEST['location']);
   	                         $quer_run = q($quer);
							 while($fatch = f($quer_run)){
							 	   $location1 = explode(",",$fatch['work_area']);
							 	  	 
									foreach ($location as &$value) {
										 // echo $value;
										if (in_array($value,$location1)){
										
										   $search_result .= $fatch['member_id'];
										   $search_result .= ",";
										}


									}






							 }
							 //echo $search_result;
							 $i = 1;
							 $search_result_array = explode(",",$search_result);
							 $search_result_array_unique = array_unique($search_result_array);


							// foreach ($search_result_array_unique as &$final) {	
                              
                         if($_REQUEST['page'] == '' || $_REQUEST['page'] == 1){
                            $limit2 = "ORDER BY fld_id DESC LIMIT 0,8";
                        }else if($_REQUEST['page'] > 1){
                            $off = ($_REQUEST['page']-1)*8;
                            $value = 8;
                            $limit2 = "ORDER BY fld_id DESC LIMIT ".$off.",".$value." ";
                        }

							  $final_query = "select * from fs_mamber where fld_id IN (".$search_result_array.") ".$limit2."";

								
								//$final_query = "select * from fs_mamber where fld_id = '".$final."'"; 
								$final_run = q($final_query); 
								while($final_fatch = f($final_run)){


								  $select_company_info = f(q("select * from fs_company where member_id = ".$final_fatch['fld_id'].""));
                            $select_company_location = f(q("select * from fs_company_contact where company_id = ".$final_fatch['fld_id']." order by fld_id DESC limit 1")); 
								 
								 ?>



					                       <tr>
                            
                     <td colspan="3">
							 <div class="talent_result_area">
                                <!-- <h1><a href="#">aaaaaaa</a></h1> -->
                        	           <table width="100%" border="0" cellspacing="0" cellpadding="0" style="clear:both;">
                                         <tr>
                                             <td valign="top" width="70"><img src="<?=$final_fatch['profile_crop_image']?>" width="60" height="60" /></td>
                                             <td valign="top" class="talent_result"><h1><a href="#"><?=$select_company_info['company_name']?></a></h1>
											 <p><strong>Location:</strong> <?=$select_company_location['address']?></p>
											 <p><strong>Skills:</strong><?=substr($select_company_info['main_skill'],1,20)?></p></td>
                                             <td width="100" style="font-size:11px; text-align:center;" align="center">
                                             <!-- <a href="#"><input class="search_btn" name="" type="button" value="Apply" /></a> --><br />
							                 </td>
                                         </tr>
                                    </table>

                              </div>
                         </td>
				</tr>



							<?$i =$i+1;}$x++;?>


                            <tr >
                                  <td colspan="3" align="center" height="10px" style="color: #B00000">
                                            <?
                                             $sqlag = "select * from fs_mamber where fld_id IN (".$search_result_array.")";
                                       
                                                $rescs = q($sqlag);
                                                 $countcs = nr($rescs);
                                                if($countcs >8){
                                                    doPages(8, 'company_search_result.php', 'cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'&to_experience='.$_REQUEST['to_experience'].'&from_experience='.$_REQUEST['from_experience'].'&assosiation_name='.$_REQUEST['assosiation_name'].'', $countcs); 
                                                }
                                            ?>
                                   </td>
                           </tr>		 






                        <?
                          }else{ 
							  $i = 1;
							  $quer_run = q($quer);




							  while($fatch = f($quer_run)){
								  
								$final_query = "select * from fs_mamber where fld_id = '".$fatch['member_id']."'"; 
								$final_run = q($final_query); 
								$final_fatch = f($final_run);



                            $select_company_info = f(q("select * from fs_company where member_id = ".$final_fatch['fld_id'].""));
                            $select_company_location = f(q("select * from fs_company_contact where company_id = ".$final_fatch['fld_id']." order by fld_id DESC limit 1")); 

								  ?>
							  
							
				   <tr>
                            
                     <td colspan="3">
							 <div class="talent_result_area">
                                <!-- <h1><a href="#">aaaaaaa</a></h1> -->
                        	         <table width="100%" border="0" cellspacing="0" cellpadding="0" style="clear:both;">
                                         <tr>
                                             <td valign="top" width="70"><img src="<?=$final_fatch['profile_crop_image']?>" width="60" height="60" /></td>
                                             <td valign="top" class="talent_result"><h1><a href="#"><?=$select_company_info['company_name']?></a></h1>
											 <p><strong>Location:</strong> <?=$select_company_location['address']?></p>
											 <p><strong>Skills:</strong><?=substr($select_company_info['main_skill'],1,20)?></p></td>
                                             <td width="100" style="font-size:11px; text-align:center;" align="center">
                                             <!-- <a href="#"><input class="search_btn" name="" type="button" value="Apply" /></a> --><br />
							                 </td>
                                         </tr>
                                    </table>

                              </div>
                         </td>
				</tr>

						  

						  <?$i++;}
						  
						  
						  
						  
						  
						  
						  
						  
						  }$x++;?>

                                 <tr >
                                  <td colspan="3" align="center" height="10px" style="color: #B00000">
                                            <?
                                             //$sqlag = "SELECT * FROM fs_talent  ".$str."";
                                       
                                                $rescs = q($quer);
                                                 $countcs = nr($rescs);
                                                if($countcs >8){
                                                    doPages(8, 'company_search_result.php', 'cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'&to_experience='.$_REQUEST['to_experience'].'&from_experience='.$_REQUEST['from_experience'].'&assosiation_name='.$_REQUEST['assosiation_name'].'', $countcs); 
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
