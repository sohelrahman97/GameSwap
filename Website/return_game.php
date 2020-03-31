<?php

    require "connection.php";
    session_start();

    $uid = $_SESSION["uid"];

    if(isset($_GET["gid"]))
              {
                $gid = $_GET["gid"];
              }


	  $sql = "UPDATE status SET avail = avail +1 WHERE gid='$gid'";

	  mysqli_query($conn,$sql);

	  $sql = "UPDATE usr_games SET ret = 1 WHERE gid='$gid' AND ret=0";

	  mysqli_query($conn,$sql);

	  echo "<script>window.location='userpanel.php?success=1'</script>";
 
 ?>