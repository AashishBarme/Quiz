<?php
declare(strict_types = 1);

$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../config/config.php");

class DbOperation{
	 public $link;

     public $host   = DB_HOST;
	 public $user   = DB_USER;
	 public $pass   = DB_PASS;
	 public $dbname = DB_NAME;

	public function __construct(){
	    $this->connectDB();
		$this->createTable();
	 }

	private function connectDB(){
		 $this->link = new mysqli($this->host, $this->user, $this->pass,$this->dbname);
		 if(!$this->link){
		   $this->error ="Connection fail".$this->link->connect_error;
		  return false;
		 }
	}

	private function createTable()
	{

		$table1 = "CREATE TABLE IF NOT EXISTS questions (
			id int(6) auto_increment primary key,
			question varchar(255),
			category_id int(6)
		)";
		$table2 = "CREATE TABLE IF NOT EXISTS answers (
		    id int(6) auto_increment primary key,
			que_id int(6),
			answer varchar(30),
			status varchar(10)
		)";	
		$table3 = "CREATE TABLE IF NOT EXISTS user(
			id int(6) auto_increment primary key,
			username varchar(30) NOT NULL UNIQUE,
			password varchar(255) NOT NULL,
			create_at DATETIME DEFAULT CURRENT_TIMESTAMP,
			role varchar(30) NOT NULL
	    )";

	    $table4 = "CREATE TABLE IF NOT EXISTS category(
	    	id int(6) auto_increment primary key,
	    	category varchar(30) NOT NULL UNIQUE,
	    	slug varchar(30) NOT NULL,
	    	description varchar(255)
		)";
		$tables = [$table1,$table2,$table3,$table4];
		foreach ($tables as $sql)
		{
				$query = $this->link->query($sql);
				if (!$query)
				echo $this->link->error;
		}
	}



}