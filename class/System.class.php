<?php

class System{

public $database;
public $data;

public function __construct(){
	$this->init();
	$this->db = new MySQL(MF_SYSTEM_DB);
	$this->data = new Data();
}

public function __desctruct(){
}

public function set($name, $value){
	$this->data->set($name, $value);
}

public function get($name){
	return $this->data->get($name);
}

public function init(){
//put things that cannot go into the constructor here
}

}
?>