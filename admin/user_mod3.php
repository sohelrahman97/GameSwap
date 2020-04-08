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
$temp_uid = $_GET['temp_uid'];


if($action == 1)
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$phone = $_POST['phone'];
	$country = $_POST['country'];

	$sql = "
		UPDATE users
		SET name='$name',email='$email',password='$pass',phone='$phone',country='$country'
		WHERE uid='$temp_uid'
	";

	$result = mysqli_query($conn,$sql);

	header("Location: user_mod.php?success=1");

}
if($action==2)
{


$sql = "
		DELETE FROM users WHERE uid='$temp_uid';
	";

	$result = mysqli_query($conn,$sql);

	header("Location: user_mod.php?success=1");
}



?>