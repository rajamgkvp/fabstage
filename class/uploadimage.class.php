<?
	
function current_millis() {
    list($usec, $sec) = explode(" ", microtime());
    return round(((float)$usec + (float)$sec) * 1000);
}

function upload_image($uploaddir, $input_name, $imgsize=2097152)
{
  $Image_name		=	$_FILES[$input_name]['name'];
	$Image_type		=	$_FILES[$input_name]['type'];
	$Image_size		=	$_FILES[$input_name]['size'];
if(!empty($Image_name)){
if (!is_dir($uploaddir))
{				umask(0);
				mkdir($uploaddir, 0777);
}
  $uploadfile =time().'_'.$_FILES[$input_name]['name'];
$target_path=$uploaddir.$uploadfile;

if(file_exists($target_path)) {
chmod($target_path,0777);
unlink($target_path);

}
if(empty($imgsize))
$imgsize=2097152;
if($Image_size <= $imgsize){
if(($Image_type=="image/gif")||($Image_type=="image/jpeg")||($Image_type=="image/png")||($Image_type=="image/pjpeg")){
if(move_uploaded_file($_FILES[$input_name]['tmp_name'], $target_path))
{ 
	chmod($target_path,0755);
	
return  $uploadfile;

}
  else{ $_SESSION['message']	=	"There was error in uploading the file ".  basename( $_FILES['Image']['name']). ", please try again!";
 return; }
}
else{
$_SESSION['message']	=	"Image Type not Allowed !!!";
return;
}}
else{
$_SESSION['message']	=	"Image Size should not be > 2MB !!!";
return;
}
}
}

?>
