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


	public function insertQA()
	{
		$questions = $_POST['question'];
		$category = $_POST['category'];
		
		foreach ($questions as $count => $question)
		{
	    $this->command->insert("INSERT INTO questions(question,category_id) VALUES('$question','$category')");
		$que_id = $this->command->last_insert_id();	
		$answer1 = $_POST['answer1'][$count];
		$answer2 = $_POST['answer2'][$count];
		$answer3 = $_POST['answer3'][$count];
		$answer4 = $_POST['answer4'][$count];
		$status1 = empty($_POST['status1'][$count]) ? 'False' : $_POST['status1'][$count];
		$status2 = empty($_POST['status2'][$count]) ? 'False' : $_POST['status2'][$count];
		$status3 = empty($_POST['status3'][$count]) ? 'False' : $_POST['status3'][$count];
		$status4 = empty($_POST['status4'][$count]) ? 'False' : $_POST['status4'][$count];
		$sql = "INSERT INTO answers
		        (que_id,answer,status) 
		       VALUES
		       ('$que_id','$answer1','$status1'),
		       ('$que_id','$answer2','$status2'),
		       ('$que_id','$answer3','$status3'),
		       ('$que_id','$answer4','$status4')";
		$inserted = $this->command->insert($sql); 
		}  
		if ($inserted){
			$msg = "Insert Succesfully";
			return $msg;
		} else {
			$msg = "Try Again";
			return $msg;
		} 
	}



	public function list()
	{
		$sql = 'SELECT q.id,q.question,a.answer,c.category FROM questions q INNER JOIN  answers a on q.id = a.que_id inner join category c on c.id = q.category_id where a.status ="True"';
		$list = $this->command->select($sql);
		if ($list){
			return $list;
		} else {
			$msg = "No Data";
			return $msg;
		}
	}

	public function getQuestion(int $id)
	{
	   $sql = 'SELECT id,question,category_id FROM questions WHERE id = '.$id.'';
	   $questions = $this->command->select($sql);
	   if ($questions){
	   	 return $questions;
	   } else {
	   	$msg = "No Data";
	   	return $msg;
	   }
	}

	public function getAnswers(int $que_id)
	{
	   $sql = 'SELECT id,answer,status FROM answers WHERE que_id = '.$que_id.'';
	   $answers = $this->command->select($sql);
	      if ($answers){
	   	 return $answers;
	   } else {
	   	$msg = "No Data";
	   	return $msg;
	   }
	}

	public function updateQuestion(int $id)
	{
		$question = $_POST['question'];
		$category_id = $_POST['category'];
		$this->command->update("UPDATE questions SET question = '$question' , category_id = '$category_id'  WHERE id = $id");
	}

	public function updateAnswer()
	{
		$answers = $_POST['answer'];
		$ansid = $_POST['ansid'];
		$status = $_POST['status'];
		foreach ($answers as $count => $answer) {
		$status_index = $ansid[$count];
		$stat_val = empty($status[$status_index]) ? 'False' : $status[$status_index]; 
		$sql = "UPDATE answers 
		        SET    answer = '$answer',
		               status= '$stat_val' 
		        WHERE  id = $ansid[$count]";
	   	$this->command->update($sql);
		}
	}

	public function delete(int $id){
		$sql = "DELETE FROM questions WHERE id = $id";
		$questiondel = $this->command->delete($sql);
		$sql = "DELETE FROM answers WHERE que_id = $id";
		$answerdel = $this->command->delete($sql);
		if ($questiondel && $answerdel){
			$msg = "Deleted";
			return $msg;
		} else {
			$msg = "something went wrong";
			return $msg;
		}
	}



}
