<?
include_once("constants.php");
ob_start();
session_start();

//CREATE TEXT DOCUEMNT FOR AUTO SUGGEST - CAT
$sqlct = "select * from fs_ind_city";
$resct = q($sqlct);
while($rowct = f($resct)){

	$txt2 .=  '"C'.$rowct['city_name'].'" : "'.$rowct['city_name'].'",';
}

//CREATE TEXT DOCUEMNT FOR AUTO SUGGEST - BUSINESS NAME
$sqlbn = "select * from fs_country ";
$resbn = q($sqlbn);
while($rowbn = f($resbn)){
	$txt1 .=  '"B'.$rowbn['country_name'].'" : "'.$rowbn['country_name'].'",';
}

//CREATE TEXT DOCUEMNT FOR AUTO SUGGEST - BUSINESS NAME
$sqlbn = "select * from fs_state ";
$resbn = q($sqlbn);
while($rowbn = f($resbn)){
	$txt3 .=  '"D'.$rowbn['state'].'" : "'.$rowbn['state'].'",';
}

$txt3 = substr($txt3, 0,-1);





$txt = ' { '.$txt1.$txt2.$txt3.' } ';

//ADS XML
$myFile3 = "content/countries1.txt";
$fh3 = fopen($myFile3, 'w') or die("can't open file");
fwrite($fh3, $txt);


// TO SEND HTML MAIL, THE CONTENT-TYPE HEADER MUST BE SET
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// ADDITIONAL HEADERS
$headers .= 'From: Web Master <info@/attamarketonline.com>' . "\r\n";

// MAIL IT
$mail = mail('info@shashwatco.com', 'ATTA MARKET TXT AUTO SUGGESTION Cron Running well', 'SA GENERATE TXTs - Cron is Working Fine....', $headers);
if($mail){
	echo "SA CATEGORY Feeds - Cron is Working Fine....";	
}

?>