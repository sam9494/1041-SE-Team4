<?php
session_start();
$host = 'localhost';
$user = 'myid';
$pass = '12345';
$db = 'mydb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //��MyMSQL�s�u�õn�J
mysqli_query($conn,"SET NAMES utf8"); //��ܽs�X
//mysql_select_db($db, $conn); //��ܸ�Ʈw

if(!isset($_SESSION["uNAME"]))
	header("Location:login.php");
if( $_SESSION["uNAME"] == "")
	header("Location:login.php");



?>