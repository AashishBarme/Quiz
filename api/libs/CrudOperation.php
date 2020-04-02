<?php
declare(strict_types = 1);

$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../config/config.php");
include_once ($filepath."/../libs/DbOperation.php");

class CrudOperation extends DbOperation{	 

	 public $error;

	 public function insert($query){
	 	$result = $this->link->query($query) or die($this->link->error.__LINE__);
	 	if ($result)
	 		return $result;
	 	else
	 		return false;
	 }

	 public function select($query){
	 	$result = $this->link->query($query) or die($this->link->error.__LINE__);
	 	if ($result -> num_rows > 0){
	 		$row = $result -> fetch_all(MYSQLI_ASSOC);
	 		return $row;
	 	} else{
	 		return false;
	 	}
	 	}

	 public function delete($query){
	 	$result = $this->link->query($query) or die($this->link->error.__LINE__);
	 	if ($result)
	 		return $result;
	 	else
	 		return false;
	 }

	 public function update($query){
	 	$result = $this->link->query($query) or die($this->link->error.__LINE__);
	 	if ($result)
	 		return $result;
	 	else
	 		return false;
	 }

	 public function last_insert_id(){
	 	$last_id = $this->link->insert_id;
	 	return $last_id;
	 }
}	
