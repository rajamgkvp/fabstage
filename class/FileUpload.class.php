<?php
 
 /** Class FileUpload
 * 
 * A class to upload a number of files to the required destination
 * @package _______________
 */
 class FileUpload{

	/**
	*@access private
	*@var array
	*/
	private $allowedFileTypes;
	/**
	*@access private
	*@var array
	*/
	private $filesUploaded;
	/**
	*@access private
	*@var string
	*/
	private $uploadDir;
	/**
	*@access public
	*@var string
	*/
	public $error;
	/**
	* Constructs a new instance of this class
	* 
	* @param string $allowedFileTypes
	*/
	public function __construct($allowedFileTypes='', $uploadDir=CYBERWIRE_CC_IMG){
	$this->uploadDir=$uploadDir.'/';
	$this->error='';
	if(empty($allowedFileTypes)){
		$this->allowedFileTypes=array();
	}else{
		$this->allowedFileTypes=explode(',', $allowedFileTypes);
		$size=sizeof($this->allowedFileTypes);
		for($i=0;$i<$size;$i++){
			$this->allowedFileTypes[$i]=trim($this->allowedFileTypes[$i]);
		}
	}
	}

	/**
	* Destructor
	* 
	* Unset all variables.
	*/
	public function __destruct(){
	unset ($this->allowedFileTypes);
	unset ($this->uploadDir);
	unset ($this->error);
	}
	/**
	* Simple function to upload the files
	* @return array
	*/
	public function doUpload($rename=''){
	while(list($key, $val) = each($_FILES)){//run in a loop
		if(!empty($_FILES[$key]['tmp_name'])){
			$tmpFileName = $_FILES[$key]['tmp_name'];
			$fileName= stripslashes($_FILES[$key]['name']);
			$type=$_FILES[$key]['type'];
			$size=$_FILES[$key]['size'];
			$uniq = uniqid();
			$fileName = $uniq.ereg_replace('([^A-Za-z0-9\.\\]*)', '', $fileName);
			if(empty($rename)){
				$path = $this->uploadDir.$fileName;
			}else{
				$path=$this->uploadDir.$rename;
			}
			if(!empty($fileName)){
				if(!empty($path)){
					if(in_array($type, $this->allowedFileTypes) || empty($this->allowedFileTypes)){
						if(is_uploaded_file($tmpFileName)){
							$this->filesUploaded[$fileName]=$this->uploadDir;
							move_uploaded_file($tmpFileName, $path);
						}else{
							$this->error='An internal error occured while trying to move '.$tmpFileName.' to '.$path;
						}
					}else{
						$this->error='Sorry, uploading a file of this type is not allowed - '.$type;
					}
				}else{
					$this->error='ERROR: No path defined';
				}
			}else{
				$this->error='EMPTY filename';
			}
		}
	}
	if(empty($this->error)){
		//the format of this array should probably be configurable
		return $this->filesUploaded;
	}else{
		return FALSE;
	}
	}
	/**
	* Simple function to upload the files
	* @return array
	*/
	public function remove($arr){
	if(is_array($arr)){
		reset($arr);
		while(list($filename, $path) = each($arr)){
			$file = $path.$filename;
			if(file_exists($file)){
				unlink($file);
			}
		}
	}
	}
}
?>
