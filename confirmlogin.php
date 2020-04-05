<?php

$email = $_POST['email'];
$pass = $_POST['pass'];

require "connection.php";

$sql = "SELECT uid,name,email FROM users WHERE email = '$email' and password = '$pass'";

$result = mysqli_query($conn,$sql);

$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count == 1) 
{
	session_start();
	while ($row = mysqli_fetch_assoc($result))
    {
    $_SESSION["uid"] = $row['uid'];
	$_SESSION["uname"] = $row['name'];
    }

 header("location: landing_user.php");
}

else 
{
 header("location: login.php?error=1");
}

?>