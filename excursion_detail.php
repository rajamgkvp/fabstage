<?
include('constants.php');
include('paging1.php');
                $sql1 = "SELECT * FROM tbl_tour WHERE fld_id='".$_REQUEST['id']."'";
				$res1 = q($sql1);
				$row = f($res1);



if($_REQUEST['name']!='')
{   
    //echo $_REQUEST['name'];
    //echo $_SESSION['security_code'];
    //echo $_REQUEST['captcha']; 
    $lang = "EN";	
	if($_SESSION['security_code'] == $_REQUEST['captcha']){

				
	$sql = "Insert into mydom_excursion_reviews (
	        excursion_id,
			name,
			email,
			lang,
			comment,
			rating,
			
			added_on 
		
			
		)VALUES(
			'".$_REQUEST['id']."',
			'".$_REQUEST['name']."',
			'".$_REQUEST['email']."',
			'".$lang."',
			'".htmlEntities($_REQUEST['comment'])."',
			'".$_REQUEST['rating']."',
				
			'".date('Y-m-d h:i:s')."'
			
            )";
		
		$sqla = q($sql);
		
		

		if($sqla)
	    {
             //SEND EMAIL NOTIFICATION

			//$to = EMAIL;
			$to = EMAIL;
			$subject = 'Excursion Review : Notification.';
			// MESSAGE
			$message = '
			<div style="width:620px;margin:auto;color:#000000;background:#e5e5e5;font-size:14px;font-weight:bold;padding:7px 0px 7px 15px;">Dominican Quest Review For - '.ucfirst($row['title']).'</div>
			<div style="width:608px;margin:auto;height:auto;font-size:11px;padding:7px 10px 7px 15px;border:solid #7E0109 1px ;">
			Dear Admin,<br /><BR><BR>
			You have recieved a new review:<br/><br/>
			<B>Review Details given below:</B><br/><br/>
			<table cellpadding="2" cellspacing="2" width="100%">
		      <tr>
			   <td height="10px" colspan=2></td>
		      </tr>
		     <tr>
			   <td style="font-size: 12px; color: #4B4B4B; font-weight: bold; font-family: arial"><B>Name </B></td>
			   <td style="font-size: 12px; color: #4B4B4B; font-weight: bold; font-family: arial">'.$_REQUEST['name'].'</td>
		     </tr>
		     <tr>
			   <td style="font-size: 12px; color: #4B4B4B; font-weight: bold; font-family: arial">Email: </td>
			   <td style="font-size: 12px; color: #4B4B4B;  font-family: arial">'.$_REQUEST['email'].'</td>
		     </tr>
			  <tr>
			   <td style="font-size: 12px; color: #4B4B4B; font-weight: bold; font-family: arial">Review For: </td>
			   <td style="font-size: 12px; color: #4B4B4B;  font-family: arial">'.ucfirst($row['title']).'</td>
		     </tr>
		    
			 <tr>
		       <td style="font-size: 12px; color: #4B4B4B; font-weight: bold; font-family: arial"> Your feedback: </td>
			   <td style="font-size: 12px; color: #4B4B4B;  font-family: arial">'.$_REQUEST['comment'].'</td>
		     </tr>
		     <tr>
			   <td style="font-size: 12px; color: #4B4B4B; font-weight: bold; font-family: arial">Service Rating: </td>
			   <td style="font-size: 12px; color: #4B4B4B;  font-family: arial">'.$_REQUEST['rating'].'</td>
		     </tr>
	     </table>
			
			<br><br>
			
			Regards,<br>
			Dominican Quest Team
			</div>
		';
			
			// TO SEND HTML MAIL, THE CONTENT-TYPE HEADER MUST BE SET
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// ADDITIONAL HEADERS
			$headers .= 'From:  Dominican Quest<admin@dominicanquest.com>'. "\r\n";
			
			// MAIL IT
			mail($to, $subject, $message, $headers);

			 /////////////////////////

			 $msg='<span style="font-size:12px;font-family:arial;color:green">- Your Review has been Submitted Successfully.</span>';
			 header('Location:thanks_for_excursion_review.php');
		}
		else
	    {
           $msg='<span style="font-size:12px;font-family:arial;color:red">- Your Review has not been  Submitted Successfully.</span>';
	    }
		
	}else{

		$msg='<span style="font-size:12px;font-family:arial;color:red">- Wrong Security code. Please try again.</span>';
		
		
	}
   
 
}








?>

 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<title><?=$i3?> <?=getLang('278')?></title>
<meta name="description" content="<?=getLang('278')?> in <?=$i3?>,<?=getLang('278')?> includes <?=substr($description, 0, -1)?>,Dominican republic" />
<meta name="keywords" content="<?=$i3?> <?=getLang('278')?>" />
	<meta http-equiv="content-Language" content="EN-GB" />
	<meta name="country" content="Dominican Republic" />
	<meta name="robots" content="Index,Follow,All"/>
	<meta name="revisit-after" content="7 days"/>
	<meta name="classification" content="Dominican Shuttle And Airport Transfers"/>
<link href="paging.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="SHORTCUT ICON" href="images/favicon.ico" />
<script type="text/javascript">
  var __lc = {};
  __lc.license = 1092783;

  (function() {
    var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
    lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
  })();
</script>

<!-- Thumb & Tab Slide -->

<link href="excrsion_slide_js/bootstrap.css" media="screen" rel="stylesheet" type="text/css">
<script src="excrsion_slide_js/jquery-1.js" type="text/javascript"></script>
<script src="excrsion_slide_js/bootstrap.js" type="text/javascript"></script>
<script src="excrsion_slide_js/functions.js" type="text/javascript"></script>




<SCRIPT language=JavaScript>
	function validateForm1(){
		var errText = "";
		var errorflag = false;

		errText += "<?=getLang('470')?>:\n\n";



		if(document.getElementById("name").value == "" ){
			 errText += "<?=addslashes(getLang('481'))?>\n";
			 errorflag = true;
		}
		
        
		if(document.getElementById("comment").value == ""){
			 errText += "<?=addslashes(getLang('483'))?>\n";
			 errorflag = true;
		}

		if(document.getElementById("rating").value == ""){
			 errText += "<?=addslashes(getLang('484'))?>\n";
			 errorflag = true;
		}

		if(document.getElementById("captcha").value == ""){
			 errText += "<?=addslashes(getLang('485'))?>\n";
			 errorflag = true;
		}
		
		
		if(errorflag==true){
			alert(errText);
			return false;
		}else{
			return true;
		}
	 }
</SCRIPT>



<script type="text/javascript"> 
	function new_captcha(){
		var c_currentTime = new Date();
		var c_miliseconds = c_currentTime.getTime();
		document.getElementById('captcha12').src = 'CaptchaSecurityImages.php?width=120&height=30&characters=5"?x='+ c_miliseconds;
	}
</script>

</head>

<body>
<?
include("top.php");
?>

<?
include("menu.php");
?>

<?
include("menu_services.php");
?>
<table width="1032" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
  <td >
 
      

      </td>
      </tr>
      
  	
		<tr>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  					
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="13"><img src="https://mydominicantransfers.com/images/text_head_left.png" alt=" " width="13" height="52" /></td>
                        
						
						<!-- <td class="text_head_bg welcome_head"><?=getLang('278')?> >> <a style="color:white"href="excursion.php?id=<?=$_REQUEST['id']?>"><?=$i3?></a></td> -->

                          <td class="text_head_bg welcome_head"><?=ucfirst(getLang('278'))?> >> <a style="text-decoration:none; color: #ffffff" href="excursion.php?id=<?=$row['tour_type']?>" ><?=ucwords(str_replace('/',' / ', (str_replace("_", " ", $_REQUEST['excursion']))))?></a> >> <a style="text-decoration:none; color: #ffffff"  href=""><?=ucfirst($row['title'])?></a></td>




                        <td width="13"><img src="https://mydominicantransfers.com/images/text_head_right.png" alt=" " width="13" height="52" /></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr><td bgcolor="#EAEAEA" height="10px;"></td></tr>
                  <tr>
                    <td  valign="top" bgcolor="#EAEAEA" class="welcome_text">
                     <div class="excursionview">   
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td valign="top">
                            	<table width="749" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                  	<td style="background: #FFF;">
                                    
                                    <div class="page-header type3" >
 									 <h1> <img src="images/new_icon.jpg" width="42" height="24" style="vertical-align:middle;" /><?=ucfirst($row['title'])?></h1>
  										<div class="puntacana_ed_icons"><img src="images/puntacana_icon_ed.jpg" /> <?=getLang('1112')?> </div>
                                        <div class="puntacana_ed_icons"><img src="images/full_day_icon_ed.jpg" /> <?=getLang('1304')?> </div>
                                        <div class="puntacana_ed_icons">
                                        	<div id="fb-root"></div>
											<script>(function(d, s, id) {
                                              var js, fjs = d.getElementsByTagName(s)[0];
                                              if (d.getElementById(id)) return;
                                              js = d.createElement(s); js.id = id;
                                              js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                              fjs.parentNode.insertBefore(js, fjs);
                                            }(document, 'script', 'facebook-jssdk'));</script>
                                            <div class="fb-like" data-href="https://www.mydominicantransfers.com/" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true" data-font="arial"></div>
                                        </div>
									</div>
                                    		
  <div class="content_details" >
					 
					  
					
					  
					  
					  <div id="myCarousel" class="carousel slide" >
							  <!-- Carousel items -->
										<div class="carousel-inner" >
												<?
												$sqlg = "Select * from ex_gallery_pic Where ex_id = '".$_REQUEST['id']."' order by fld_id DESC";
												$resg = q($sqlg);
												$countg = nr($resg);

                                                 if($countg!=0)
												 {

												$i =1;
												while($rowg = f($resg)){

												if($i==1){
											  ?>	
											      <div class="item active">
													  <img alt="<?=$i?>" src="Lightbox/<?=$rowg['large_pic']?>">
													</div> 
                                               <?}else{?>   
													<div class="item">
													  <img alt="<?=$i?>" src="Lightbox/<?=$rowg['large_pic']?>">
													</div>								  
													 
												<?}?>	

                                               <?$i=$i+1;}}else{?>

                                                   <div class="item active">
													  <img alt="<?=$i?>" src="myadmin/tour_img1/<?=$row['tmap']?>">
													</div> 

											<?}?>		  
									    </div>




							  <!-- Carousel nav -->
											  <div class="nave" style="width:673px;padding-left: 0;margin-bottom: 20px; ">
															<div class="well">
															 <?
																$sqlg = "Select * from ex_gallery_pic Where ex_id = '".$_REQUEST['id']."' order by fld_id DESC";
																$resg = q($sqlg);
																$i = 1;
																$countg = nr($resg);
																 if($countg!=0)
												                    {
																	while($rowg = f($resg)){
															  ?>  
															   <a href="#" class="carousel-nav"><img alt="<?=$i?>" width="60" height="36" src="Lightbox/<?=$rowg['large_pic']?>" ></a>
															   
															   <?$i=$i+1;}}else{?>
															        
                                                                <a href="#" class="carousel-nav"><img alt="<?=$i?>" width="60" height="36" src="myadmin/tour_img1/<?=$row['tmap']?>" ></a>



															 <?}?>
															</div>
												
											  </div>
							</div>






    

</div>
<div class="content_details">
  <div class="article well" style="margin-bottom:0px; border-bottom:none;">
    <p class="title"><?=getLang('1305')?></p>
    <div style="width:auto; float:left; padding-top: 8px;">
    	<!-- facebook code -->
    	<div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like" data-href="https://www.mydominicantransfers.com/" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true" data-font="arial"></div> 
        
        <!-- twitter code -->
        <a href="https://twitter.com/share" class="twitter-share-button"><?=getLang('1306')?></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script> &nbsp; &nbsp;

<!-- google code -->
<div class="g-plusone" data-size="medium" data-annotation="none"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
 </div>


<div style="width:auto; padding:8px 0 0 5px; float:left;">

<!-- Linkedin code -->    
<script src="//platform.linkedin.com/in.js" type="text/javascript">
 lang: en_US
</script>
<script type="IN/Share" data-url="https://www.mydominicantransfers.com/" data-counter="right"></script>


<!-- pin it -->

<a href="//pinterest.com/pin/create/button/?url=https%3A%2F%2Fwww.mydominicantransfers.com%2F&media=http%3A%2F%2Ffarm8.staticflickr.com%2F7027%2F6851755809_df5b2051c9_z.jpg&description=Next%20stop%3A%20Pinterest" data-pin-do="buttonPin" data-pin-config="none"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
   </div> 
   
  <div class="article-content">
 
   
   <?=$row['description']?>


  </div>
  <div class="article-aside">
    <ol>
      <li><strong><?=getLang('449')?></strong> <br><?=$row['point']?></li>
      <li><strong><?=getLang('1307')?>:</strong> <br>
      	<!-- <ul > -->
        	<!-- <li><?=getLang('1308')?></li>
            <li><?=getLang('264')?></li>
            <li><?=getLang('1309')?></li>
            <li><?=getLang('1310')?></li>
            <li><?=getLang('1311')?></li>
            <li><?=getLang('1312')?></li> -->
            <?=$row['include']?>


        <!-- </ul> -->
      
      <li><strong><?=getLang('262')?>:</strong> <span ><?=$row['bring']?></span></li>
    </ol>
  </div>
  <div class="clearfix"></div>
</div>
  <ul class="nave nav-tabs comm-tabs-nav well" style="border:none; border-radius:0px; box-shadow:0px !important; border-bottom:1px #c8c8c8 solid ; padding-bottom:0px;">
    <li class="active"><a href="#comm-tab1" data-toggle="tab"><?=getLang('1313')?></a></li>
    <li><a href="#comm-tab2" data-toggle="tab"><?=getLang('1314')?></a></li>
  </ul>
</div>

<div class="content_details tab-content comm-tabs">
  <div class="tab-pane active" id="comm-tab1">
    <div class="bar">
      <p class="title"><?=getLang('1315')?></p>
      <div class="rating star0"><img src="../images/rating_review_grey.jpg" width="117" height="20" style="vertical-align:top;" /></div>
       <a href="#" class="add-review"><!-- <a class="add-review" href="#comm-tab2" data-toggle="tab"> --><?=getLang('1316')?></a>
      <div class="clearfix"></div>
    </div>

    <div id="content-reviews">
		<strong style="color:#5f5f61; font-size:15px; text-align:center;">
		<!-- Been on this tour? Share your experiences! Please write a <a href="" style="color:#124989;">review</a> -->
		
		
		<!------------------------->
  <table id="mt" width="100%" border="0" align="center" cellpadding="4" cellspacing="4">
    
	<div>		  
	<?

	if($_REQUEST['page'] == '' || $_REQUEST['page'] == 1){
				$limit = "LIMIT 0,5";
			}else if($_REQUEST['page'] > 1){
				$off = ($_REQUEST['page']-1)*5;
				$value = 5;
				$limit = "LIMIT ".$off.",".$value." ";
			}


	$sql="SELECT * FROM mydom_excursion_reviews WHERE status='2' AND excursion_id='".$_REQUEST['id']."' ORDER BY fld_id DESC ".$limit;
	$res=q($sql);
	$count=nr($res);
	if($count>0)
	{
	      while($row=f($res))
		{
			 $added_on=explode(" ",$row['added_on']);
	?>
	 <tr bgcolor="#e5e5e5">
	   <td style="padding:5px 5px 5px 5px" width="35" align="center" valign="top"><img src="images/speechbubble.png" width="26" height="26"/></td>
	   <td style="padding:5px 5px 5px 5px;" align="left"><br>  <img src="images/leftquote.png"><span style="font-size: 18px; font-family: calibri; text-decoration: none;color: #0070a6" rel="gb_page_center[750, 500]" > <?=html_entity_decode($row['comment'])?><img src="images/rightquote.png"></span><br>

	             <br />
	            <br/>
                <strong style="font-size:15px;font-family:calibri; color: #005f8c"><?=getLang('223')?> : </strong><span style="font-size: 15px; font-family: calibri; color: #000000; "><?=$row['name']?></span><br>
				
				
				
				
				<table cellpadding="2" cellspacing="2">
										<tr><td width="65" valign="top" style="font-size: 15px; font-family: calibri; color: #000000; "><b><?=getLang('486')?> :</b></td>
										<td width="52" style="font-size: 15px; font-family: calibri; color: #008c00; ">
											<?
												if($row['rating'] =='Unacceptable'){
													echo $row['rating'];				
												}else if($row['rating'] =='Very Poor'){
													echo $row['rating'];
												}else if($row['rating'] =='Poor'){
													echo $row['rating'];
												}else if($row['rating'] =='Average'){
													echo $row['rating'];
												}else if($row['rating'] =='Above Average'){
													echo $row['rating'];
												}else if($row['rating'] =='Good' || $row['rating'] =='Very Good'){
													echo $row['rating'];
												}else if($row['rating'] =='Excellent'){
													echo $row['rating'];
												}
											?>										</td>
										<td width="416">
											<?
												if($row['rating'] =='Unacceptable'){
													?>
													<img src="images/1.png">
													<?
					
												}else if($row['rating'] =='Very Poor'){
													?>
													<img src="images/22.png">
													<?
												}else if($row['rating'] =='Poor'){
													?>
														<img src="images/2.png">
													<?
												}else if($row['rating'] =='Average'){
													?>
														<img src="images/3.png">
													<?
												}else if($row['rating'] =='Above Average'){
													?>
														<img src="images/3.png">
													<?
												}else if($row['rating'] =='Good' || $row['rating'] =='Very Good'){
													?>
														<img src="images/4.png"> 
													<?
												}else if($row['rating'] =='Excellent'){
													?>
														<img src="images/5.png">
													<?
												}
											?>										</td>
										</tr>
									</table><strong><span  style="font-size:15px;font-family:calibri; color: #005f8c"><?=getLang('222')?> : </span></strong><span style="font-size:15px;font-family:calibri; color: #494949"><?=$added_on[0]?></span>
	   </td>
	 </tr>
	 <?
		}
		$x++;
	?>
	<tr>
		<td colspan="2" height="10px" style="color: #B00000">
								<?
								 $sqlag = "SELECT * FROM mydom_excursion_reviews WHERE status='2' AND excursion_id = '".$_REQUEST['id']."' ORDER BY fld_id DESC";
						   
									$rescs = q($sqlag);
									 $countcs = nr($rescs);
									if($countcs >5){
										doPages(5, 'my_dominican_reviews.php', '', $countcs); 
									}
								?>
		</td>
	</tr>
		     
	 <?
	}
	else
	{
		?>
		<tr bgcolor="#6d7d1b">
		  <td colspan="2" style="font-family:arial;padding:8px 5px"><span style="font-size:15px;font-family:arial; color:#fff;"><b>Any Reviews not found.... </b></span></td>
	    </tr>
		<?
	}
	?>
	  <div id="green" style="margin: auto;">
      </div>
	</div>	 
	</table>  

		<!-------------------------->
		
		
		
		
		
		</strong>

    </div>

    
  </div>
  <div class="tab-pane" id="comm-tab2">
		<div id="content-reviews">
		<strong style="color:#5f5f61; font-size:15px; text-align:center;">
		
		
		
		
		<!-- 1. Been on this tour? Share your experiences! Please write a <a href="" style="color:#124989;">review</a> -->
		<!------Add review--------------->
     <form id="reviewForm" name="reviewForm" autocomplete="off" method="POST" action="" onSubmit="return validateForm1();">
	  <table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" class="customer_service">	       <tr>
	        <td colspan="3"><?=$msg?></td>
	    </tr>
	       <tr>
           		<td width="10"></td>
		     <td  style="font-size:13px;font-family:arial;"><span style="color:red;">*</span>&nbsp;<b><?=getLang('118')?> : </b></td>
			 <td  align="left"><input type="text" name="name" id="name" size="35" value="" style="border: 1px solid #000000; height:25px; padding:0 5px;"/></td>
		   </tr>
		   <tr>
           		<td width="5"></td>
		     <td  style="font-size:13px;font-family:arial;">&nbsp;&nbsp;<b><?=getLang('120')?> : </b></td>
			 <td  align="left"><input type="text" name="email" id="email" size="35" value="" style="border: 1px solid #000000; height:25px; padding:0 5px;"/></td>
		   </tr>
	
		   <tr>
           <td width="5"></td>
		     <td valign="top" style="font-size:13px;font-family:arial;"><span style="color:red">*</span>&nbsp;<b><?=getLang('228')?> : </b></td>
			 <td align="left"><textarea name="comment" id="comment" cols="40" rows="5" style="border: 1px solid #000000; padding:0 5px;width:350px;" /></textarea></td>
		   </tr>
		   <tr>
           <td width="5"></td>
		     <td  style="font-size:13px;font-family:arial;"><span style="color:red">*</span>&nbsp;<b><?=getLang('229')?> : </b></td>
			 <td align="left">
		          <select name="rating" id="rating" class="text_field_bform" style="font-size:11px;font-family:arial;width:140px;height:26px;border: 1px solid #000000; padding:4px 3px 2px;">
                               <!-- <option value="Unacceptable"><?=getLang('231')?></option> -->
						       <option value="Very Poor"><?=getLang('232')?></option>
						       <option value="Poor"><?=getLang('233')?></option>
						       <!-- <option value="Average"><?=getLang('234')?></option>
						       <option value="Above Average"><?=getLang('235')?></option> -->
						       <option value="Good"><?=getLang('236')?></option>
						       <option value="Very Good"><?=getLang('237')?></option>
						       <option selected value="Excellent"><?=getLang('238')?></option>
											     
                  </select>
		      </td>
			</tr>


		   <tr>
           			<td width="5"></td>
                  <!-- <td align="right">&nbsp;</td> -->
                 <td  style="font-size:13px;font-family:arial;"></td>
                  <td align="left"><img align="left" id="captcha12" src="CaptchaSecurityImages.php?width=120&height=30&characters=5" alt="captcha security code" /><a  href="JavaScript: new_captcha();"><img  border="0"  alt="Change verification code " src="images/refresh.png" /></a></td>

                  
           </tr>



                <tr>
                <td width="5"></td>
                  <td align="right">&nbsp;</td>
                  <td style="font-family:calibri, verdana; font-size:15px;" align="left"><?=getLang('230')?>.</td>
                </tr>
                <tr>
                  <td colspan="3" align="right"></td>
                  </tr>
                <tr>
                <td width="5"></td>
                  <td width="150" style="font-size:13px;font-family:arial;"><strong><?=getLang('196')?></strong></td>
                  <td align="left"><input style="width:140px;border: 1px solid #000000; height:25px; padding:0 5px;" class="text_field_bform" name="captcha" id="captcha" type="text" /></td>
                </tr>
                <tr>
                  <td colspan="3" align="right"></td>
                  </tr>
		   <tr>
			   <td width="5"></td>
			   <td>&nbsp;</td>
			   <td><input name="submit" id="submit" type="submit" class="main_button" value="<?=getLang('226')?>" ></td>
		  </tr>
		   <tr>
           <td width="5"></td>
		     <td>&nbsp;</td>
		     <td style="color:red"><div id="error">
                  &nbsp;
                 </div></td>
		  </tr>
	  </table>
	  </form>

		<!------------------->
		
		
		
		
		
		
		</strong>

    </div>
  </div>
</div>    

                                    </td>
                                  </tr>
                                </table>

                            </td>
                            <td align="right" class="rightcolumn" valign="top" >
                            	
                                <?php include("excursion_details_right1.php");?>

                            </td>
                          </tr>
                    </table>
                   </div> 
                    
                    </td>
                  </tr>
                  
                
                </table>
                </td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
          </tr>
          
          
        </table>		
        </td>
      </tr>
</table>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29218913-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<br />
<?
include("footer.php");
?>
</body>
</html>
