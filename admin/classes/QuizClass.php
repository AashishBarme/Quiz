<?php

declare(strict_types = 1);

$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/DbOperation.php");
include_once ($filepath."/../libs/CrudOperation.php");

class QuizClass {

	private $db;
	private $command;

	public function __construct(){
		$this->db = new DbOperation();
		$this->command = new CrudOperation();
	}


	public function insertQA(string $question,string $answer1,string $status1,string $answer2,string $status2,string $answer3,string $status3,string $answer4,string $status4)
	{
	    $this->command->insert("INSERT INTO questions(question) VALUES('$question')");
		$que_id = $this->command->last_insert_id();	
		
		$sql = "INSERT INTO answers
		        (que_id,answer,status) 
		       VALUES
		       ('$que_id','$answer1','$status1'),
		       ('$que_id','$answer2','$status2'),
		       ('$que_id','$answer3','$status3'),
		       ('$que_id','$answer4','$status4')";
		$inserted = $this->command->insert($sql);   
		if ($inserted){
			$msg = "Insert Succesfully";
			return $msg;
		} else {
			$msg = "Try Again";
			return $msg;
		} 
	}



	// public function list(){
	// 	$sql = 'SELECT ID,work FROM task';
	// 	$list = $this->command->select($sql);
	// 	if ($list){
	// 		return $list;
	// 	} else {
	// 		$msg = "No Data";
	// 		return $msg;
	// 	}
	// }

	// public function delete(int $id){
	// 	$sql = "DELETE FROM task WHERE ID = $id";
	// 	$deleted = $this->command->delete($sql);
	// 	if ($deleted){
	// 		$msg = "Deleted";
	// 		return $msg;
	// 	} else {
	// 		$msg = "something went wrong";
	// 		return $msg;
	// 	}
	// }



}
