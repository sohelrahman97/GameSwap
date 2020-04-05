

<!DOCTYPE html>
<html>
  <head>
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
                       }  
                       else  
                       {  
                            echo '<script>alert("Item Already Added")</script>';  
                            echo '<script>window.location="cart.php" ' . $_GET["gid"] .  '</script>';  
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
                  }  
             } 
          } 
          if($_GET["action"] == "delete")  
          {  
              $count = count($_SESSION["shopping_cart"]); 
              $count--;

               foreach($_SESSION["shopping_cart"] as $key => $value)  
               {  
                    if($value["item_id"] == $_GET["gid"])  
                    {  
                        if($key == $count)
                        {
                          unset($_SESSION["shopping_cart"][$key]);  
                           //echo '<script>alert("Item Removed")</script>';  
                           echo '<script>window.location="cart.php?gid= " ' . $_GET["gid"] . '</script>';
                        }
                        else
                        {
                          $_SESSION["shopping_cart"][$key] = $_SESSION["shopping_cart"][$count];
                          unset($_SESSION["shopping_cart"][$count]);
                           
                        }  

                        }
               }  
          } 
          if($_GET["action"] == "confirm")
          {
            $count = count($_SESSION["shopping_cart"]); 

            for($i=0; $i < $count; $i++)
            {
              $tempid = $_SESSION["shopping_cart"][$i]["item_id"];

              //echo $tempid . " ";

              $sql = "INSERT INTO usr_games VALUES('','$uid','$tempid',NOW(),NOW(),0)";
              mysqli_query($conn,$sql);




              $sql = "UPDATE status SET avail = avail -1 WHERE gid='$tempid'";

              mysqli_query($conn,$sql);

              
            }

            unset($_SESSION["shopping_cart"]);

            echo "<script>window.location='landing_user.php'</script>";
          } 
     }  

    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameSwap | Doom Eternal</title>
    <link rel="stylesheet" href="bulma.css">
    <link rel="icon" href="icon.png">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <style>

      .hero-body
      {
        background: url(background.jpg) center/cover;
      }
    
    </style>

  



  </head>


<body>


  <section class="hero is-black ">
  <div class="hero-head">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item">
            <h1 class="title">GameSwap</h1>
            <p>Keep gaming</p>
          </a>
          <span class="navbar-burger burger" data-target="navbarMenuHeroB">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="navbarMenuHeroB" class="navbar-menu">
          <div class="navbar-end">
            <a class="navbar-item is-active" href="landing_user.php">Home</a>
            <a class="navbar-item" href="about.php">About us</a>
            <a class="navbar-item" href="userpanel.php"><?php     echo $_SESSION['uname'];   ?></a>
            <a class="navbar-item" href="cart.php">My cart 

            <?php 

            $count = 0;
            if(isset($_SESSION["shopping_cart"]))
            {
              $count = count($_SESSION["shopping_cart"]); 
            }  
            echo "(" . $count . ")";

            ?></a>
            <a class="navbar-item" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <section class="hero is-white is-fullheight">
  <div class="hero-body">

    <div class="container">
      
      


      <div class='notification has-text-left has-background-light' style='opacity: 0.95'>
          
          
 
                 
                <h3 class="title is-3 has-text-black">Your cart </h3> 
                <div class="table">  
                     <table class="table is-striped is-bordered">  
                          <tr>  
                               <th width="40%">Name</th>  
                                
                               <th width="30%">Price</th>  
                                
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $key => $value)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $value["item_name"]; ?></td>  
                                
                               <td>$ <?php echo $value["item_price"]; ?></td>  
                               
                               <td><a href="cart.php?action=delete&gid=<?php echo $value["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + $value["item_price"];  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="2" align="right">Total</td>  
                               <td align="right"><b>$ <?php echo number_format($total, 2); ?></b></td>  

                                
                          </tr>  
                          <?php  
                          }  


                          

                          ?>  
                        </table>
                        
                        <?php 

                        //print_r($_SESSION["shopping_cart"]);
                        //echo ;

                        ?>
                      </div>

                      <center><form method='post' action='cart.php?action=confirm'>
                          <input class='button is-primary is-medium' type='submit' value='Confirm' name='confirm'>
                        </form></center> 

  	   </div>






	   </div>


      

  

    </section>



<div class="hero-foot"><div class="container has-text-centered"><br><p>© 2020 GameSwap. All rights reserved. All trademarks are property of their respective owners. VAT included in all prices where applicable.<br><br></p></div></div>

</section>



</body>
</html>



