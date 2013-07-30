<?php
function generateName(){
	//The following code segment provides the first name
	$sql = 'SELECT count(*) AS count FROM namedb WHERE type=\'F\';';
	$res = q($sql);
	if(!e($res)){
		while($row = f($res)){
			$count=$row['count'];
		}
		$rand = rand(0, $count - 1);
		$sql = 'SELECT name FROM namedb WHERE type=\'F\' LIMIT '.$rand.',1 ;';
		$res=q($sql);
		if(!e($res)){
			while($row = f($res)){
				$name=$row['name'];
			}
		}
	}

	//The following code segment provides the last name
	$sql = 'SELECT count(*) AS count FROM namedb WHERE type=\'L\';';
	$res = q($sql);
	if(!e($res)){
		while($row = f($res)){
			$count=$row['count'];
		}
		$rand = rand(0, $count - 1);
		$sql = 'SELECT name FROM namedb WHERE type=\'L\' LIMIT '.$rand.',1;';
		$res=q($sql);
		if(!e($res)){
			while($row = f($res)){
				$name .= ' '.$row['name'];
			}
		}
	}
	return $name;
}


function generateEmail($name){
	$domains = array('hotmail.com', 'yahoo.com', 'lycos.com');
	$max = sizeof($domains)-1;
	$rand = rand(0, $max);
	$domain='@'.$domains[$rand];
	$name = strtolower(str_replace(' ', '', $name));
	$rand = rand(3, 6);
	$postfix='';
	for($i=0;$i<$rand; $i++){
		$postfix .= rand(0,9);
	}
	$email = $name.$postfix.$domain;
	return $email;
}

function generateUsername($name){
	$name = strtolower(str_replace(' ', '', $name));
	$rand = rand(3, 5);
	$postfix='';
	for($i=0;$i<$rand; $i++){
		$postfix .= rand(0,9).'';
	}
	$username = $name.$postfix;
	return $username;
}

function generatePassword(){
	$vowels = array('a', 'e', 'i', 'o', 'u');
	$consonant = array('b', 'c', 'd', 'f', 'g', 'h','j','k','l','m','n','p','qu','r','s','t','v','w','x','y','z');
	$length = rand(6, 6);
	$password='';
	$count=0;
	for($i=0;$i<$length;$i++){
		$password .= $i%2 == 0 ? $vowels[array_rand($vowels)] : $consonant[array_rand($consonant)];
		$count++;
	}
	return $password;
}

function generateBlogTitle(){
	$sql = 'SELECT count(id) AS count FROM phrasedb;';
	$res = q($sql);
	while ($row = f($res)){
		$max = $row['count']-1;
	}
	$rand = rand(0, $max);
	$sql = 'SELECT name FROM phrasedb LIMIT '.$rand.',1;';
	$res = q($sql);
	while ($row = f($res)){
		$phrase = $row['name'];
	}
	return $phrase;
}

function generateBlogAddress($name){
	$name = strtolower(str_replace(' ', '', $name));
	$name=ereg_replace('[^a-z]*','',$name);
	$rand = rand(3, 10);
	$name=substr($name, 0, $rand);
	$rand = rand(3, 5);
	$postfix='';
	for($i=0;$i<$rand; $i++){
		$postfix .= rand(0,9).'';
	}
	$address = $name.$postfix;
	return $address;
}

?>