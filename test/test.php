<?php

$gid = 2;

if (!isset($_COOKIE["cards"])) 
  {
    $visitArray=array($gid);
    $json = json_encode($visitArray);
    setcookie("cards", $json);
  }
else
  {
    $cookie = $_COOKIE["cards"];
    $cookie = stripslashes($cookie);
    $savedvisitArray = json_decode($cookie, true);

    if (!in_array($gid, $savedvisitArray)) 
    {
      array_push($savedvisitArray, $gid);
      $json = json_encode($savedvisitArray);
      setcookie("cards", $json);
    }


    echo '<pre>';
    print_r($savedvisitArray);
    echo '</pre>';
  }

//echo count($savedvisitArray);

?>