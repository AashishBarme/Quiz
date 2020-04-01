<?php 
session_start();
if(!isset($_SESSION['username'])){
  header("location: login.php");
  exit;
}
include("inc/header.php"); ?>


<?php include("inc/footer.php"); ?>