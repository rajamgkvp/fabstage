<?php
	include('constants.php');
	include('check_session.php');
	include('paging1.php');

	$sql = "select * from fs_oudition where fld_id='".$_REQUEST['id']."'";
	$sql_run = q($sql);
	$sql_fatch = f($sql_run);

	if($_REQUEST['select_all']!=""){
	    for($j=0;$j<count($_REQUEST['cat']);$j++) {
		   $check_val.=",";
		   $check_val.= $_REQUEST['cat'][$j];
		  // $check_val.=",";
		   }
		 $value2 = explode(",", $check_val);
		foreach ($value2 as &$select) {
		 //echo $select;
		$sql_update =  "UPDATE fs_applied_audation SET status = 2 where audation_id = '".$_REQUEST['id']."' AND talent_id = '".$select."'";
		$sql_update_run = q($sql_update);
		}
	}
	// unselect talent 
	 if($_REQUEST['unselect_all']!=""){
	     for($j=0;$j<count($_REQUEST['cat1']);$j++) {
		   $check_val.=",";
		   $check_val.= $_REQUEST['cat1'][$j];
		  // $check_val.=",";
		   }
		$value2 = explode(",", $check_val);
		foreach ($value2 as &$select) {
			$sql_update =  "UPDATE fs_applied_audation SET status = 1 where audation_id = '".$_REQUEST['id']."' AND talent_id = '".$select."'";
			$sql_update_run = q($sql_update);
		}
             
	}
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
		<style type="text/css">
	.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
	.text span{font-size:17px;}
	.button { width:auto; padding:0 10px 4px; height:24px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; margin-bottom:5px;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px 4px; height:24px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	.text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:15px;color:#669966; text-transform:capitalize;}


	.button1 { width:auto; padding:0 10px; height:23px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none; margin-bottom:5px;}
	.button1 a { color:#fff; text-decoration:none;}
	.button1:hover { width:auto; padding:0 10px; height:23px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	.text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:15px;color:#669966; text-transform:capitalize;}

</style>

		<script type="text/javascript">
			var GB_ROOT_DIR = "greybox/";
		</script>

		<script type="text/javascript" src="greybox/AJS.js"></script>
		<script type="text/javascript" src="greybox/AJS_fx.js"></script>
		<script type="text/javascript" src="greybox/gb_scripts.js"></script>
		<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
	</head>

<body>
<!-- FILE TO DISPLAY SIDE TAB -->
	<?include('left_company_tab.php');?> 
	<div id="main_container">
		
		<?include('top.php');?> 
			<div>
				<div class="main_body_area">
					<div class="left_area">
					</div>

					<div class="center_body" style="width:800px;">
					<!-- INCLUDED FILE TO DISPLAY SIDE TAB ON CENTER TAB -->
					 <?include('left_work_room_company.php');?>
					   <!---finally selected condidates---->
						  <table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
							<tr>
								<td colspan="4" align="left" style="color:#727272;font-size:14px;font-weight:bold;">
									Confirmed Talents
								</td>
							</tr>
							<tr>
								<td colspan="4">&nbsp;</td>
								
							</tr>
								 <?php
								 $job_list1 = "select * from fs_applied_audation where audation_id = '".$_REQUEST['id']."' AND company_id='".$_SESSION['fab_id']."' AND status=3" ;
								 $job_run1 = q($job_list1);
								 $job_number1 = nr($job_run1);
								 if($job_number1!=0){
									 $i=1;
								 while($job_fatch = f($job_run1)){

								 $select_talent = "select * from fs_mamber where fld_id = '".$job_fatch['talent_id']."'" ;
								 $run_talent = q($select_talent);
								 $fatch_talent = f($run_talent);
								?>

							<tr>
								<td width="3%">&nbsp;</td>
								<td width="27%">Name</td>
								<td width="35%">Email Id</td>
								<td width="35%">&nbsp;</td>
							</tr>
							<tr>
							    <td width="3%"><?=$i?>)</td>
								<td width="27%">
								<a href="talent_profile.php?talent_id=<?=$fatch_talent['fld_id']?>"  title="Talent Information" target="_BLANK" style="cursor: pointer;"><?=$fatch_talent['name']?></a>
								</td>
								<td width="35%">
									<a href="mailto:<?=$fatch_talent['email']?>"><?=$fatch_talent['email']?></a>
								</td>
								<td width="35%">
								<div class="button1" style="width:100px;">
									<a href="company_posted_audition_msg.php?talent_id=<?=$job_fatch['talent_id']?>&audition_id=<?=$_REQUEST['id']?>"  title="Send Message" rel="gb_page_center[540, 300]" style="cursor: pointer; line-height:21px; color:#fff;">Send Message</a>
								</div>
								</td>
							</tr>
							<?$i = $i+1;}  ?>
							<?} else {?>
								 <tr>
							          <td colspan="4"> <a>Talent List not found...</a></td>
								 </tr>
							<?}?>
						</table>
						<!--------selected talent---------->
					<form name="upload_form1" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
						<table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1" style="float:right;">
							<tr>
								<td colspan="4" align="left" style="color:#727272;font-size:14px;font-weight:bold;">
									Selected Talent
								</td>
							</tr>
							<tr>
								<td >&nbsp;</td>
								<td>&nbsp;</td>
								<td >&nbsp;</td>
								<td >&nbsp;</td>
								
							</tr>
								 <?php
								 $job_list1 = "select * from fs_applied_audation where audation_id = '".$_REQUEST['id']."' AND company_id='".$_SESSION['fab_id']."' AND status=2" ;
								 $job_run1 = q($job_list1);
								 $job_number1 = nr($job_run1);
								 if($job_number1!=0){
									 $i=1;
								 while($job_fatch = f($job_run1)){

								 $select_talent = "select * from fs_mamber where fld_id = '".$job_fatch['talent_id']."'" ;
								 $run_talent = q($select_talent);
								 $fatch_talent = f($run_talent);

								  $dselect = f(q("select * from fs_talent where member_id = ".$job_fatch['talent_id'].""));
								?>
							   <tr>
									<td width="4%"><input type="checkbox" name="cat1[]" id="cat1[]" value="<?=$fatch_talent['fld_id']?>"></td>
								
									<td >
									<a href="talent_profile.php?talent_id=<?=$fatch_talent['fld_id']?>"  title="Talent Information" target="_BLANK" style="cursor: pointer;"><?=$fatch_talent['name']?></a>
									</td>
									
                               <!--------->
                                      <!---------->
			<td valign="top" >

				<a target = "_BLANK" href="talent_profile.php?talent_id=<?=$fatch_talent['fld_id']?>">
				<?if($fatch_talent['profile_crop_image']!=''){?>
				<img src="<?=$fatch_talent['profile_crop_image']?>" width="60" height="60" />
				<?}else{?>
				<img src="newhome/images/images.jpg" width="60" height="60" />
				<?}?>
				</a></td>

                <td valign="top" class="talent_result" style="padding-left:5px;"><h1><a target = "_BLANK" href="talent_profile.php?talent_id=<?=$fatch_talent['fld_id']?>"><?=$fatch_talent['name']?></a></h1>
                <p><strong>Location:</strong> <?=$dselect['location']?></p>
                <p><strong>Skills:</strong><?=str_replace(',,',',',$dselect['main_skill'])?></p>
			</td>

								<!---------->
							   <!-------->









									
									
									
									<td >
										<!-- <a href="mailto:<?=$fatch_talent['email']?>"><?=$fatch_talent['email']?></a> -->
									</td>
							</tr>
							<tr>
							    <td colspan="4">&nbsp; </td>
							</tr>
							<?}  ?>







							<tr>
							    <td colspan="4">&nbsp; </td>
							</tr>
							<tr>
							    <td colspan="4"><input class="button" type="submit" name="unselect_all" id="unselect_all" value="Cancel Short Listed Talent"></td>
							</tr>
							<?} else {?>
							 <tr>
								  <td colspan="4"> <a>Talent List not found...</a></td>
							 </tr>
							<?}?>
						</table>
					</form>

						<form name="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
						<table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1" style="float:right;">
							<tr>
							   
								<td colspan="4" align="left" style="color:#727272;font-size:14px;font-weight:bold;">
									Applied Talent
								</td>
							</tr>
							<tr>
							   <td colspan="4">&nbsp;</td>
							 
							</tr>
								<?php 


					   if($_REQUEST['page'] == '' || $_REQUEST['page'] == 1){
                            $limit2 = "ORDER BY fld_id DESC LIMIT 0,3";
                        }else if($_REQUEST['page'] > 1){
                            $off = ($_REQUEST['page']-1)*3;
                            $value = 3;
                            $limit2 = "ORDER BY fld_id DESC LIMIT ".$off.",".$value." ";
                        }
								 $job_list1 = "select * from fs_applied_audation where audation_id = '".$_REQUEST['id']."' AND company_id='".$_SESSION['fab_id']."' AND status=1 ".$limit2."" ;
								 $job_run1 = q($job_list1);
								 $job_number1 = nr($job_run1);
								 if($job_number1!=0){
									 $i=1;
								 while($job_fatch = f($job_run1)){
								 $select_talent = "select * from fs_mamber where fld_id = '".$job_fatch['talent_id']."'" ;
								 $run_talent = q($select_talent);
								 $fatch_talent = f($run_talent);

								 $dselect = f(q("select * from fs_talent where member_id = ".$job_fatch['talent_id'].""));
								?>
							<tr> 





							    <td width="4%"><input type="checkbox" name="cat[]" id="cat[]" value="<?=$fatch_talent['fld_id']?>"></td>



							 
								
								
								
								
								
								<!-- <td >
								<a href="talent_profile.php?talent_id=<?=$fatch_talent['fld_id']?>"  title="Talent Information" target="_BLANK" style="cursor: pointer;"><?=$fatch_talent['name']?></a>
								</td> -->



								<!---------->
			<td valign="top" >

				<a target = "_BLANK" href="talent_profile.php?talent_id=<?=$fatch_talent['fld_id']?>">
				<?if($fatch_talent['profile_crop_image']!=''){?>
				<img src="<?=$fatch_talent['profile_crop_image']?>" width="60" height="60" />
				<?}else{?>
				<img src="newhome/images/images.jpg" width="60" height="60" />
				<?}?>
				</a></td>

                <td valign="top" class="talent_result" style="padding-left:5px;"><h1><a target = "_BLANK" href="talent_profile.php?talent_id=<?=$fatch_talent['fld_id']?>"><?=$fatch_talent['name']?></a></h1>
                <p><strong>Location:</strong> <?=$dselect['location']?></p>
                <p><strong>Skills:</strong><?=str_replace(',,',',',$dselect['main_skill'])?></p>
			</td>

								<!---------->
								
								
								
								
								
								
								
								
								<td ><!-- <a href="mailto:<?=$fatch_talent['email']?>"><?=$fatch_talent['email']?></a> --></td>





							</tr>

                            <tr>
							    <td colspan="4">&nbsp; </td>
							</tr>





							<?}	$x++;?>







							 <tr>
							    <td colspan="4">&nbsp; </td>
							</tr>
							<tr>
							    <td colspan="4"><input class="button" type="submit" name="select_all" id="select_all" value="Shortlist Talent"></td>
							</tr>

                           <tr >
                                  <td colspan="3" align="center" height="10px" style="color: #B00000">
                                            <?
                                             $sqlag = "select * from fs_applied_audation where audation_id = '".$_REQUEST['id']."' AND company_id='".$_SESSION['fab_id']."' AND status=1";
                                       
                                                $rescs = q($sqlag);
                                                 $countcs = nr($rescs);
                                                if($countcs >3){
                                                    doPages(3, 'view_audation_profile.php', 'id='.$_REQUEST['id'].'', $countcs); 
                                                }
                                            ?>
                                   </td>
                           </tr>







							<?}else{?>
								 <tr>
							          <td colspan="4"> <a>Talent List not found...</a></td>
								 </tr>
							<?}?>
						</table>
					    </form>
						<table class="center_body" width="100%"  border="0" align="center" cellspacing="1" cellpadding="1" style="float:right;">
							<tr>
								<td colspan="2" align="center" style="color:#cc0000;font-size:14px;font-weight:bold;">
									Favourite Talent
								</td>
							</tr>
							<tr>
								<td width="30%">&nbsp;</td>
								<td width="70%">&nbsp;</td>
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
