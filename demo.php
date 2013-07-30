<?include('constants.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

               
               
  <div class="profile_slide">
                
                <link rel="stylesheet" type="text/css" href="css/tabcontent1.css" />
				<script type="text/javascript" src="js/tabcontent.js"></script>
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

                	<div class="seller-prod-box">
       
        <div class="toptabbg">
        <div id="flowertabs" class="modernbricksmenu2">
        <ul>
            <li><a href="#" rel="tcontent1" class="selected"><span>Photo</span>  </a></li>
            <li><a href="#" rel="tcontent2"><span>Audio</span></a></li>
             <li><a href="#" rel="tcontent3"><span>Video</span></a></li>
        </ul>
        </div>
        </div>
            
     <div style="clear: left"></div>
     <div class="main-prod-mid">
        <div style="clear: left"></div>
       
		
		
		
		
		<div id="tcontent1" class="tabcontent">




        
<link href="css/amazon_scroller.css" rel="stylesheet" type="text/css"></link>
<script type="text/javascript" src="js/amazon_scroller.js"></script>
        
        <script language="javascript" type="text/javascript">
		
            $(function() {
				$("#amazon_scroller3").amazon_scroller({
                    scroller_title_show: 'enable',
                    scroller_time_interval: '3000',
                    scroller_window_background_color: "none",
                    scroller_images_width: '124',
                    scroller_images_height: '160',
                    scroller_title_size: '11',
                    scroller_title_color: 'black',
                    scroller_show_count: '5',
                    directory: 'images'
                });
            });
		
        </script>
        
        	<div id="amazon_scroller3" class="amazon_scroller">
                   <div class="amazon_scroller_mask">
                       <ul>
              <?
                  $jpg = ".jpg";
				  $png = ".png";
				  $gif = ".gif";
				  $select_image = "select * from fs_talent_portfolio where talent_id='".$_SESSION['fab_id']."'  AND (portfolio_data LIKE '%".$jpg."%' OR portfolio_data LIKE '%".$png."%' OR portfolio_data LIKE '%".$gif."%') AND portfolio_data!='' ";
                  $select_image = q($select_image);
				  while($fatch_image = f($select_image)){
  

              ?>



                        <li><img src="portfolio_uploader/savefiles/<?=$fatch_image['portfolio_data']?>" width="124" height="160"/>
						 </li>
                    <?}?>



                       </ul>
                   </div>
                   <ul class="amazon_scroller_nav">
                       <li></li>
                       <li></li>
                   </ul>
                   <div style="clear: both"></div>
               </div>
               
               
               
               
        </div>

   <div id="tcontent2" class="tabcontent">
   
   
  bvvvvvvvvvvvvvvvvvvvvv
		
		
		</div>


        <div id="tcontent3" class="tabcontent">
		
		

			  cccccccccccccccccccc

		</div>

		</div>
        
	    </div>
        <script type="text/javascript">

		var countries=new ddtabcontent("countrytabs")
		countries.setpersist(true)
		countries.setselectedClassTarget("link") //"link" or "linkparent"
		countries.init()
		
		</script>
		<script type="text/javascript">
		
		var myflowers=new ddtabcontent("flowertabs")
		myflowers.setpersist(true)
		myflowers.setselectedClassTarget("link") //"link" or "linkparent"
		myflowers.init()
		
		</script>
                </div>
               

</body>
</html>
