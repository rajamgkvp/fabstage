<?php

//EXECUTE QUERY
function q($query){
	global $system;
	$res = $system->db->query($query);
	return $res;
}

//FETCH ROW
function f($res){
	global $system;
	return $system->db->fetchRow($res);
}

//CHECK EMPTY
function e($res){
	global $system;
	return $system->db->isEmpty($res);
}

//TRIM
function es($str, $trim=true){
	global $system;
	if($trim) $str = trim($str);
	$str=stripslashes($str);
	return $system->db->escape($str);
}

//LAST INSERT ID
function id(){
	global $system;
	return $system->db->lastInsertId();
}

//NUM ROWS
function nr($res){
	global $system;
	return $system->db->numRows($res);
}
?>
