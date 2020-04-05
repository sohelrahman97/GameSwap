<?php

$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password,"gameswap_db");
// Check connection
if (!$conn) 
{
	header("Location: index.php?error=1");
	exit;
}     

?>