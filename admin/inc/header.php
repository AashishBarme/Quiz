<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);


	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../config/config.php");
	include_once ($filepath."/../classes/QuizClass.php");
  include_once($filepath."/../helpers/Helpers.php");


	$quizClass = new QuizClass();
  $helpers = new Helpers();
  
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Bitter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>/assets/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo ADMIN_URL; ?>">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo SITE_URL; ?>">Back to Site <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo ADMIN_URL; ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Question
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo ADMIN_URL; ?>/pages/question/add.php">Add</a>
          <a class="dropdown-item" href="<?php echo ADMIN_URL; ?>/pages/question/list.php">List</a>
        </div>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo ADMIN_URL; ?>/pages/category/add.php">Add</a>
          <a class="dropdown-item" href="<?php echo ADMIN_URL; ?>/pages/category/list.php">List</a>
        </div>
      </li>
    </ul>
  </div>
    <a href="<?php echo ADMIN_URL; ?>/logout.php"><button type="button" class="btn btn-danger">Logout!</button></a>
</nav>
