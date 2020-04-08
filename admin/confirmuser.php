<?php

require "connection.php";
session_start();



if(!isset($_SESSION["uid"])) 
{
header("Location: index.php?error=2");
exit;
}
if(!isset($_SESSION["uname"]))
{
header("Location: index.php?error=2");
exit;
}
if($_SESSION["admin"] != 1)
{
header("Location: index.php?error=2");
exit;
}

$action = $_GET['action'];



if($action == 1)
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$phone = $_POST['phone'];
	$country = $_POST['country'];

	$sql = "
		INSERT INTO users values('','$name','$email','$pass','$phone','$country','0')
	";

	$result = mysqli_query($conn,$sql);

	header("Location: user_add.php?register=1");
}






?>