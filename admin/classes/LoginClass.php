<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/DbOperation.php");
include_once ($filepath."/../libs/CrudOperation.php");

class LoginClass{

    private $db;
    private $command;

    public function __construct(){
        $this->db = new DbOperation();
        $this->command = new CrudOperation();
    }
 
     public function login()
    {
 	// Define variables and initialize with empty values
	$username = $input_password = "";
	$username_err = $password_err = "";
	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
    	// Check if username is empty
    	if(empty(trim($_POST["username"]))){
       	 	$username_err = "Please enter username.";
    	} else{
        	$username = trim($_POST["username"]);
    	}
    
    	// Check if password is empty
    	if(empty(trim($_POST["password"]))){
        	$password_err = "Please enter your password.";
    	} else{
        	$input_password = trim($_POST["password"]);
    	}
    
    	// Validate credentials
    	if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id,username, password FROM user WHERE username = '$username'";
        if($stmt = $this->command->select($sql)){
            $password =  $stmt[0]["password"];
                if(count($stmt) == 1){                  
                        if($input_password == $password){
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;                            
                            // Redirect user to welcome page
                            header("location: http://localhost/php/php_quiz/admin/index.php");
                            exit;
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                            return $password_err;
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                    return $username_err;
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
	   	}
    }
}
