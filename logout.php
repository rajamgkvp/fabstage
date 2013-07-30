<?
	include('constants.php');

	session_unset();
	session_unregister($HTTP_SESSION_VARS['fab_id']) ;

	session_unregister($HTTP_SESSION_VARS['fab_username']) ;

	session_unregister($HTTP_SESSION_VARS['fab_email']) ;

	session_unregister($HTTP_SESSION_VARS['work_as']) ;

	session_unregister($HTTP_SESSION_VARS['logout_url']) ;
	

	// Finally, destroy the session.
	session_destroy();
    
	 
	header("Location: index.php"); 	
?>