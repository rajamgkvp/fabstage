<?
class MySQL{

private $host;
private $user;
private $password;
private $database;

private $connection;

public $error;
public $errorNumber;


public function __construct($database){
	$this->database = $database;
	$this->host=MF_MYSQL_HOST;
	$this->user=MF_MYSQL_USER;
	$this->password=MF_MYSQL_PASS;
	$this->error='';
	$this->connect();
}

public function __desctruct(){
}

private function connect(){
	$this->connection = mysql_pconnect($this->host, $this->user, $this->password);
	if(!$this->connection){
		$this->error('Connection failed: '.mysql_error());
		return false;
	}else{
		$this->changeDatabase($this->database);
		return true;
	}
}

public function changeDatabase($database){
	$status = mysql_select_db($database);
	if($status){
		return true;
	}else{
		$this->error('Unable to change database: '.mysql_error());
		return false;
	}
}


private function disconnect() {
	$boolean = mysql_close($this->conection);
	if(!$boolean){
		$this->error('Unable to close connection: '.mysql_error());
	}
}

public function query($query) {
	$result = mysql_query($query, $this->connection);
	if($result){
		return $result;
	}else{
		$this->error('Unable to execute query: '.$query.' '.mysql_error());
		return false;
	}
}

public function lastInsertId(){
	return mysql_insert_id ($this->connection);
}

public function fetchRow($result) {
	return mysql_fetch_assoc($result);
}
	
public function numRows($result) {
	return mysql_num_rows($result);
}

public function affectedRows(){
	return mysql_affected_rows($this->connection);
}

public function isEmpty($result) {
	if($this->numRows($result) > 0) {
		return false;
	} else {
		return true;
	}
}

public function error($error){
	trigger_error($error, E_USER_NOTICE);
}

public function escape($str){
	return mysql_escape_string($str);
}

}//class
 

?>