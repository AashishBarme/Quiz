<?php
declare(strict_types=1);

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/CrudOperation.php");

 	$command = new CrudOperation();
 	$result = [];
 	$answer = [];
 	$sql = "SELECT id from questions";
 	$ids = $command->select($sql);
 	foreach($ids as $count => $id)
 	{
 		$que_sql = "SELECT question FROM questions WHERE id = $id[id]";
 		$question = $command->select($que_sql);

 		$ans_sql = "SELECT answer FROM answers WHERE que_id = $id[id]";
 		$answers = $command->select($ans_sql);
 		foreach($answers as $ans)
 		{
 			$answer[] = $ans[answer];
 		}

 		$cor_sql = "SELECT answer FROM answers WHERE status = 'True'";
 		$correct = $command->select($cor_sql);

 		$result[] = array(
                   "question" => $question[0][question],
                   "option" => $answer,
                   "answer" => $correct[$count][answer]
 		           );
 		unset($answer);
 	}
 	echo (json_encode($result));
 



