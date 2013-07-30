<?
session_start();

if($_SESSION['fab_id']!='' AND $_SESSION['work_as']==1){

?>

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
<body onload="MM_preloadImages('images/gallery/home_hover.png','images/gallery/profile_hover.png','images/gallery/gallery_hover.png','images/gallery/work_room_hover.png','images/gallery/work_hover.png','images/gallery/message_hover.png')">	

	<div class="gallery_left_panel" style="margin-top:110px;">
        	<ul>
            	<li><a href="talent_dashboard.php"><img src="images/gallery/home.png" width="30" height="30" id="Image1" onmouseover="MM_swapImage('Image1','','images/gallery/home_hover.png',1)" onmouseout="MM_swapImgRestore()" /><br />
            Home</a></li>
            	<li><a href="profile.php"><img src="images/gallery/profile.png" width="30" height="30" id="Image2" onmouseover="MM_swapImage('Image2','','images/gallery/profile_hover.png',1)" onmouseout="MM_swapImgRestore()" /><br />
			  Profile</a></li>
                <li><a href="gallery.php"><img src="images/gallery/gallery.png" width="30" height="30" id="Image3" onmouseover="MM_swapImage('Image3','','images/gallery/gallery_hover.png',1)" onmouseout="MM_swapImgRestore()" /><br />
                Portfolio</a></li>
            	<li><a href="match_job_list.php"><img src="images/gallery/work_room.png" width="30" height="30" id="Image4" onmouseover="MM_swapImage('Image4','','images/gallery/work_room_hover.png',1)" onmouseout="MM_swapImgRestore()" /><br />
	      Work Room</a></li>
                <li><a href="project.php"><img src="images/gallery/work.png" width="30" height="30" id="Image5" onmouseover="MM_swapImage('Image5','','images/gallery/work_hover.png',1)" onmouseout="MM_swapImgRestore()" /><br />
          Projects</a></li>
            	<!-- <li><a href="talent_message.php"><img src="images/gallery/profile.png" width="50" height="40" /><br />
          Message</a></li> -->
		  	<li><a href="message_page.php"><img src="images/gallery/message.png" width="30" height="30" id="Image6" onmouseover="MM_swapImage('Image6','','images/gallery/message_hover.png',1)" onmouseout="MM_swapImgRestore()" /><br />
          Message</a></li>
          </ul>
        </div>
<?}?>