<?php
class Data{

private $arr;

public function __construct(){
	$this->arr = array();
}

public function __destruct(){
	unset($this->arr);
}

public function set($name, $value){
	$this->arr[$name]=$value;
}

public function get($name){
	if(array_key_exists($name, $this->arr)){
		return $this->arr[$name];
	}else{
		return false;
	}
}

}
?>