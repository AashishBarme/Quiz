<?php 
declare(strict_types = 1);

$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/DbOperation.php");
include_once ($filepath."/../libs/CrudOperation.php");
include_once($filepath."/../helpers/Helpers.php");

class CategoryClass{
	private $db;
	private $command;
	private $helpers;

	public function __construct(){
		$this->db = new DbOperation();
		$this->command = new CrudOperation();
		$this->helpers = new Helpers();
	}

	public function add(){
		$category = $_POST["category"];
		$description = $_POST["description"];
		$slug = $this->helpers->SlugCreator($_POST["category"]);
		$sql = "INSERT INTO category(category,description,slug) VALUES ('$category','$description','$slug')";
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

	public function getTotalQuestion(int $id){
		$sql = "SELECT COUNT(*) AS total FROM questions WHERE category_id = $id";
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
		$sql = "DELETE q , a from questions q inner join answers a on q.id = a.que_id where q.category_id = $id";
		$delet = $this->command->select($sql);
		if($deleted){
			$msg = "Deleted";
			return $msg;
		} else {
			$msg = "Error";
			return $msg;
		}
	}

}