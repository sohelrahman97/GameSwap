<?php
	session_start();
	setcookie("cards", "", time() - 3600);
	session_destroy();
	session_unset();


	header("Location: index.php?logout=1");
?>