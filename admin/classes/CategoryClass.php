<?php 
declare(strict_types = 1);

$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/DbOperation.php");
include_once ($filepath."/../libs/CrudOperation.php");

class CategoryClass{
	private $db;
	private $command;

	public function __construct(){
		$this->db = new DbOperation();
		$this->command = new CrudOperation();
	}

	public function add(){
		$category = $_POST["category"];
		$description = $_POST["description"];
		$sql = "INSERT INTO category(category,description) VALUES ('$category','$description')";
		$result = $this->command->insert($sql);
		if($result){
			$msg = "Insert Succesfully";
			return $msg;				
		} else {
			$msg = "Error";
			return $msg;
		}
	}

	public function list(){
		$sql = "SELECT * FROM category";	
		$value = $this->command->select($sql);
		if($value) {
			return $value;
		} else {
			return false;
		}
	}

	public function getbyid(int $id){
		$sql =  "SELECT * FROM category WHERE id = $id";
		$value = $this->command->select($sql);
		if($value){
			return $value;
		} else {
			$msg = "Error";
			return $msg;
		}
	}

	public function update(int $id)
	{
		$category = $_POST['category'];
		$description = $_POST['description'];
		$sql = "UPDATE category
		        SET category = '$category',
		            description = '$description'
		        WHERE id = $id";
		$update = $this->command->update($sql);        
	}

	public function delete(int $id){
		$sql =  "DELETE FROM category WHERE id = $id";
		$deleted = $this->command->select($sql);
		if($deleted){
			$msg = "Deleted";
			return $msg;
		} else {
			$msg = "Error";
			return $msg;
		}
	}

}