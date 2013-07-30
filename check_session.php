<?php
	if($_SESSION['fab_id']!=''){
		$usertype = $_SESSION['user_name'];
	}else{
		header('location:login.php?un=ac');
	}
?>