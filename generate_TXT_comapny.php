<?
include_once("constants.php");
ob_start();
session_start();

//CREATE TEXT DOCUEMNT FOR AUTO SUGGEST - CAT
$sqlct = "select * from fs_company_sub_category";
$resct = q($sqlct);
while($rowct = f($resct)){
	$txt2 .=  '"C'.$rowct['sub_category'].'" : "'.$rowct['sub_category'].'",';
}

//CREATE TEXT DOCUEMNT FOR AUTO SUGGEST - BUSINESS NAME
$sqlbn = "select * from fs_company_sub_category";
$resbn = q($sqlbn);
while($rowbn = f($resbn)){
	$txt3 .=  '"B'.$rowbn['sub_category'].'" : "'.$rowbn['sub_category'].'",';
}
$txt3 = substr($txt3, 0,-1);

$txt = ' { '.$txt3.' } ';

//ADS XML
$myFile3 = "content/countries2.txt";
$fh3 = fopen($myFile3, 'w') or die("can't open file");
fwrite($fh3, $txt);


// TO SEND HTML MAIL, THE CONTENT-TYPE HEADER MUST BE SET
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// ADDITIONAL HEADERS
$headers .= 'From: Web Master <info@/attamarketonline.com>' . "\r\n";

// MAIL IT
$mail = mail('rohit.guptagnit@gmail.com', 'Fab stage  Cron Running well', 'SA GENERATE TXTs - Cron is Working Fine....', $headers);
if($mail){
	echo "SA CATEGORY Feeds - Cron is Working Fine....";	
}

?>