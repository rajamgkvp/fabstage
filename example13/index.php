<?php include('../constants.php');
     
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $targ_w = $targ_h = 200;
    $jpeg_quality = 90;

   echo $game_swf = $_SESSION['fab_id'];
    $dest_image = "files/games/".$game_swf."_tb.jpg";
  
   // $src = 'files/image.jpg';
	$src = 'http://fabstage.swtpl.co.in/'.$_REQUEST['link'].'';
    $img_r = imagecreatefromjpeg($src);
    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

    imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
    $targ_w,$targ_h,$_POST['w'],$_POST['h']);



   // header('Content-type: image/jpeg');
    imagejpeg($dst_r,null,$jpeg_quality);
	imagejpeg($dst_r,$dest_image,100);
     
    $crop_img = "example13/".$dest_image."";

	$insert_pic = "UPDATE fs_mamber SET profile_image='".$_REQUEST['link']."', profile_crop_image='".$crop_img."' where fld_id='".$_SESSION['fab_id']."'";

    $run_insert = q($insert_pic);


   
	header('Location: http://fabstage.swtpl.co.in/talent_dashboard.php');
    exit;

}

require_once('templates/jcrop_main.php');
//require_once('templates/footer.html');

?>