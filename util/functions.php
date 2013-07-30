<?php

function println($str, $nl = false){
	if($nl){
		$str .= '<br/>'."\n";
	}else{
		$str .= "\n";
	}
	print $str;
}

function buildUrl($qStr='', $rebuild=false){
	global $system;
	$url ='index.php?';
	$url .= 'module='.$system->get('moduleFilename');
	if(!$rebuild){
		if($system->get('pageFilename')) $url .= '&page='.$system->get('pageFilename');
	}
	if(!empty($qStr)) $url .= '&'.$qStr;
	return $url;
}

function image($url, $alt='', $border=false, $id='', $title=''){
	$img = '<img src="'.$url.'" alt="'.$alt.'"';
	$img .= empty($id) ? ' id="'.$alt.'"' : ' id="'.$id.'"';
	$img .= empty($title) ? ' title="'.$alt.'"' : ' title='.$title.'"';
	$img .= !$border ? ' border="0"' : 'border="'.$border.'"';
	$img .= '/>';
	return $img;
}

function icon($icon, $alt='', $id=''){
	$img = '<img src="images/icons/'.$icon.'" alt="'.$alt.'" class="button" title="'.$alt.'" id="'.$id.'"/>';
	return $img;
}

function includeFck(){
	return '<script type="text/javascript" src="js/fckeditor.js"></script>';
}

function attachFck($textarea, $width='600px', $height='300px'){
$editor='
<script type="text/javascript">
	var editor = new FCKeditor("'.$textarea.'", "'.$width.'", "'.$height.'");
	editor.basePath = "js/";
	editor.ReplaceTextarea();
</script>';
return $editor;
}

function throw404(){
	include('/home/httpd/web/cyberwire/cyberwire1/linkex/integrate404.php');
/*
$not_found_body='<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
<link rel="shortcut icon" href="favicon.ico">
</HEAD><body>
<h1>Not Found</h1>
<!-- FROM TEMPLATE -->
The requested URL '.$_SERVER['REQUEST_URI'].' was not found on this server.<p>
<hr>
'.$_SERVER["SERVER_SIGNATURE"].                   
</body></html>';
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
print $not_found_body;
exit;
*/
}

function ed($str){
	if(empty($str)){
		return '-';
	}else{
		return $str;
	}
}

function generateUrls($site=''){
	if(!empty($site)){
		$url = CYBERWIRE_ADMIN.'?module=generate&page=default&site='.$site;
		$str = file_get_contents($url);
		if(!empty($str)){
			return true;
		}else{
			return false;
		}
	}else{
		$sql = 'SELECT id FROM site';
		$res = q($sql);
		if(!e($res)){
			while($row = f($res)){
				$id = $row['id'];
				$url = CYBERWIRE_ADMIN.'?module=generate&page=default&site='.$id;
				$str = file_get_contents($url);
			}
		}
		
	}
}

function encryptUrl($url){
	$str = md5($url);
	//$str .= urlencode(crypt($url, CYBERWIRE_PASSWORD));
	$str .= crypt($url);
	//$str .= md5(crypt($url));
	return $str;
}

function siteName($id){
	$sql='SELECT name FROM site WHERE id='.$id.';';
	$res=q($sql);
	if(!e($res)){
		while($row=f($res)){
			$name=$row['name'];
		}
		return $name;
	}else{
		return false;
	}
}

?>