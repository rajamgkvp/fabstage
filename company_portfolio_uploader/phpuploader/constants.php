<?php
session_start();

// CLEAR GARBAGE VALUE
ob_start();

// SYSTEM RESOURCE REFERENCES 
define('MF_SYSTEM', '');

// SITE PATH
define('MF_ROT', 'http://192.168.0.2/ Agency Insure/index.php');

// CONNECTION PARAMETER
define('MF_MYSQL_HOST', 'mysql305.ixwebhosting.com');
define('MF_MYSQL_USER', 'ssystem_hrms');
define('MF_MYSQL_PASS', 'HrMs1Shash');

// DATABASE
define('MF_SYSTEM_DB', 'ssystem_hrms');

//GLOBAL VARIABLE -- ADMIN
define('FOOTER_TEXT', '&copy; Copyright &lt; Fabstage.com  &gt; &lt; Site by: <a href="http://shashwatco.com" alt="Web Design, SEO Services, Bulk SMS India, USA, UK" title="Web Design, SEO Services, Bulk SMS India, USA, UK">Shashwat India</a> &gt; &lt; 2013-14 &gt;, All Rights Reserved. &nbsp;&nbsp;');
define('TITLE', 'Fabstage.com - Administration Control Panel Version 1.0');
define('LOGO_ADMIN', 'admin_img/fabstage_logo.jpg');

// AUTOLOAD ALL CLASS 
function __autoload($class){
	require_once MF_SYSTEM.'class/'.$class.'.class.php';
}


// FUNCTIONS AND UTIL GLOBAL AVAILABILE
include(MF_SYSTEM.'util/functions.php');
include(MF_SYSTEM.'util/randFunctions.php');
include(MF_SYSTEM.'util/dbFunctions.php');
include(MF_SYSTEM.'class/uploadimage.php');
include('class/image.class.php');
include('function.php');


//define url
define('urlname','FabStage');

define('URL','http://fs.sitebysite.us/');

// GLOBAL VARIBALE
$system = new System();
$system->init();
?>