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

	<style type="text/css">
		.text{color:#fff; font-size:16px; font-weight:normal; background:#6BC0F7; height:30px; text-indent:10px; border:2px solid #fff;}
	</style>
	
</head>

<body>
<div id="main_container">
	<?include('top.php');?>
    <div>
    	<div class="main_body_area">
                        <div class="left_area">
                     
                        </div>
<div class="center_body" style="width:800px;">
		<form name="upload_form" action="" method="POST" onsubmit="return validate();" autocomplete="off">
			<table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">
<?
	if(isset($_REQUEST['msg']) && $_REQUEST['msg'] =='del'){
		$msg = ' - Record Deleted Successfully.';
	?>
<tr>
    <td colspan="2" width="100%" align="left" class="msg"><?=$msg?></td>
  </tr>
  <?
  }
?>


					<table width="100%" border="0" align="left" cellspacing="0" cellpadding="0">
							<tr align="left" >
							
								<th class="text">Talent Name</th>
								<th class="text">Job Title</th>
								
									
								<th class="text">View Full Conversation</th>
								<th class="text">Date/Time</th>
								<th class="text">Delete</th>
							</tr>
							<? 

							include_once('admin/paging_class.php'); 
							$comm=q("SELECT DISTINCT job_id,receiver_id FROM fs_message where sender_id = '".$_SESSION['fab_id']."' ORDER BY `fld_id` DESC");
							if(nr($comm) > 0)
							{
							$paging=new paging(25,5);
							$paging->query("SELECT DISTINCT job_id,receiver_id FROM fs_message where sender_id = '".$_SESSION['fab_id']."' ORDER BY `fld_id` DESC");
							$page=$paging->print_info();
								$x=1;
								while($rec_mem=$paging->result_assoc()){	
									$color = $x%2==0?'#E9F3F3':'#FFFFEA';
									$receiver = $rec_mem['receiver_id'];

									$query_member = "select * from fs_mamber where fld_id = '".$receiver."'";
									$query_member_run = q($query_member);
									$fatch_member = f($query_member_run);


									$job = $rec_mem['job_id'];

									$query_job = "select * from fs_job where fld_id = '".$job."'";
									$query_job_run = q($query_job);
									$fatch_job = f($query_job_run);

								
									
									$added_on = $rec_mem['time'];
								?>
								<tr align="left" bgcolor="<?=$color?>">
									<td><?=$fatch_member['name']?> </td>
									<td><?=$fatch_job['title']?></td>
								
									
									
									<td><?=$added_on?></td>

									<td><a href="view.php?id=<?=$rec_mem['fld_id']?>" title="News Details" rel="gb_page_center[540, 520]" style="cursor: pointer;"><U>View Conversation</U></a></td>

									<td><a href="#" onClick="javascript:delete_news(<?=$rec_mem['fld_id']?>)"><img src="admin/admin_img/delete.png" border="0"></a></td>
								</tr>
								<?
									$x++;
								}
								?>
								<? if($page){?>
								<tr>
									<td colspan="7" style="border-top:#cccccc 1px solid; ">&nbsp;<? echo $paging->print_link();?></td>
								</tr>
							<?}?>
								<?
							}else{
								?>
								<tr align="right">
									<td colspan="6">No Record Found. 
									  </td>
								</tr>
								<?
							}
							?>	
				     </table>
							<tr><th colspan="3"></th></tr>
				</table>
		</form>
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
                
            <div class="footer_ads_right"><a href="#"><img src="images/ads_banner_girl.png" width="277" height="226" /></a></div>
          </div>
        </div>
    </div>
    
    <?include('inner_footer.php');?>
    
</div>
</body>
</html>
