<?
	include('../constants.php');
	echo $sqlActive = "Update fs_admin SET fld_active = 0 WHERE fld_username='".$_SESSION['username']."'";
	$resActive = q($sqlActive); 
	session_unset();
	session_unregister($HTTP_SESSION_VARS['username']) ;

	// Finally, destroy the session.
	session_destroy();

	header("Location:index.php"); 	
?>