<?php
error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
$host='localhost';
$user='root';
$password='';
$db='getglow';
$conn=mysqli_connect($host,$user,$password,$db) or die('Not Connect');
?>