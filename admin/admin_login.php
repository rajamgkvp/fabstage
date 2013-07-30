<?php 
session_start();
define('MF_MYSQL_HOST', 'localhost');
define('MF_MYSQL_USER', 'root');
define('MF_MYSQL_PASS', '123456');
				   
// DATABASE
define('MF_SYSTEM_DB', 'fab');

$conn = mysql_connect(MF_MYSQL_HOST, MF_MYSQL_USER, MF_MYSQL_PASS);
mysql_select_db(MF_SYSTEM_DB,$conn);


//GET THE POSTED VALUES
$user_name = $_REQUEST['user_name'];
$pass = $_REQUEST['password'];

//NOW VALIDATING THE USERNAME AND PASSWORD
$sql = "SELECT * FROM fs_admin WHERE fld_username='".$_REQUEST['user_name']."' AND fld_password ='".$pass."'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

if(mysql_num_rows($result)>0){
	echo "yes";
	$_SESSION['username'] = $user_name; 
	$_SESSION['email'] = $row['fld_email']; 
	$sqlActive = "Update fs_admin SET fld_active = 1 WHERE fld_username='".$_REQUEST['user_name']."'";
	$resActive = mysql_query($sqlActive); 
	$sqlL = "INSERT INTO fs_admin_logs (valid_ip, login_time, username) VALUES('".$_SERVER['REMOTE_ADDR']."', '".date('Y-m-d h:m:s')."', '".$user_name."')";
	mysql_query($sqlL);
}else{
	echo "no"; //Invalid Login
}

?>