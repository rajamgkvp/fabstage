<?php
/* this file contains functions that are most commonly used to manipulate strings */

/* formats a string to that it can be used in javascript alert() and other functions*/
function strAlert($str){
	return addslashes(htmlspecialchars($str));
}


?>