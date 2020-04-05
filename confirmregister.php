<?php

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];
$country = $_POST['country'];

require "connection.php";

$sql = "
		INSERT INTO users values('','$name','$email','$pass','$phone','$country')
	";

$result = mysqli_query($conn,$sql);

header("Location: index.php?register=1");

?>