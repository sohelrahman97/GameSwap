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
  

    $uid = $_SESSION["uid"];




    if(isset($_GET["action"]))  
     {  
          if($_GET["action"] == "add")  
          {

             if(isset($_POST["add_to_cart"]))  
             {  
                  if(isset($_SESSION["shopping_cart"]))  
                  {  
                       $item_array_gid = array_column($_SESSION["shopping_cart"], "item_id");  
                       if(!in_array($_GET["gid"], $item_array_gid))  
                       {  
                            $count = count($_SESSION["shopping_cart"]);  
                            $item_array = array(  
                                 'item_id'                  =>     $_GET["gid"],  
                                 'item_name'                =>     $_POST["hidden_name"],  
                                 'item_price'               =>     $_POST["hidden_price"]  
                                   
                            );  
                            $_SESSION["shopping_cart"][$count] = $item_array;  
                            echo '<script>window.location="game_page.php?gid=' . $_GET["gid"] .  '"</script>';  
                       }  
                       else  
                       {  
                            echo '<script>alert("Item Already Added")</script>';  
                            echo '<script>window.location="game_page.php?gid=' . $_GET["gid"] .  '"</script>';  
                       }  
                  }  
                  else  
                  {  
                       $item_array = array(  
                            'item_id'                 =>     $_GET["gid"],  
                            'item_name'               =>     $_POST["hidden_name"],  
                            'item_price'              =>     $_POST["hidden_price"] 
                       );  
                       $_SESSION["shopping_cart"][0] = $item_array; 
                       echo '<script>window.location="game_page.php?gid=' . $_GET["gid"] .  '"</script>';   
                  }  
             } 
          } 
          
          
     }  

?>