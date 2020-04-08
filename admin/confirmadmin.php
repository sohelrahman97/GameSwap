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


$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];
$country = $_POST['country'];



$sql = "
		INSERT INTO users values('','$name','$email','$pass','$phone','$country','1')
	";

$result = mysqli_query($conn,$sql);

header("Location: admin_add.php?register=1");




?>