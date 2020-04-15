<?php

$url = $_SERVER['REQUEST_URI'];


$trimmed_url = explode("/",$url);
$url_value = end($trimmed_url);
$prev = prev($trimmed_url);

if($url_value == '/' || $url_value == ''){
require __DIR__ . '/frontend/pages/home.php';
} elseif($prev =='category'){
require __DIR__ . '/frontend/pages/category.php';
}else{
require __DIR__ . '/frontend/pages/404.php';
}
