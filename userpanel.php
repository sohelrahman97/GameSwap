<?php

    require "connection.php";
    session_start();
    
?>

<!DOCTYPE html>
<html>
  <head>
    <?php



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
    $uname = $_SESSION['uname'];



    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameSwap | User Panel</title>
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
          
            <?php

            if(isset($_GET["success"]))
            {
              echo "<div class='notification is-success'>
                   Game returned successfully!
                  </div>";
            }

            ?>
 
             <h3 class="title is-3 has-text-black">Return </h3>


             <div class="table">  
                     <table class="table is-striped is-bordered">  
                          <tr>  
                               <th width="40%">Name</th>  
                                
                               <th width="30%">Date/Time rented</th>  
                                
                               <th width="5%">Status</th>  
                          </tr>  
                          
                          <tr>  

                            <?php

                            $sql = "
                              SELECT u.gid AS gid,u.datetime_rent, ret, name
                              FROM usr_games u, game g
                              WHERE u.uid=$uid AND u.ret = 0 AND u.gid=g.gid
                              ORDER BY u.datetime_rent DESC";

                            $result = mysqli_query($conn,$sql);

                              //$rowcount = mysqli_num_rows($result);

                            while ($row = mysqli_fetch_assoc($result))
                            {
                            

                            ?>
                               <td><?php echo  $row['name']; ?></td>  
                                
                               <td><?php echo  $row['datetime_rent']; ?></td>  
                               
                               <td><a href='return_game.php?gid= <?php echo $row['gid'] . "'>" ; ?>Return</a></td>  

                               
                          </tr>  
                            
                           <?php  } ?>
                        </table>
                        
                      </div>



                      <h3 class="title is-3 has-text-black">Renting history </h3>


             <div class="table">  
                     <table class="table is-striped is-bordered is-fullwidth">  
                          <tr>  
                               <th>Name</th>  
                                
                               <th>Date/Time rented</th>  
                                
                               <th>Status</th>  
                          </tr>  
                          
                          <tr>  

                            <?php

                            $sql = "
                              SELECT u.gid AS gid,u.datetime_rent, ret, name
                              FROM usr_games u, game g
                              WHERE u.uid=$uid AND u.gid=g.gid";

                            $result = mysqli_query($conn,$sql);

                              //$rowcount = mysqli_num_rows($result);

                            while ($row = mysqli_fetch_assoc($result))
                            {
                            $temp = $row['ret'];
                            if(!$temp) $temp="Not returned";
                            else $temp = "Returned";

                            ?>
                               <td><?php echo  $row['name']; ?></td>  
                                
                               <td><?php echo  $row['datetime_rent']; ?></td>  
                               
                               <td><?php echo $temp;  ?></td>  

                               
                          </tr>  
                            
                           <?php  } ?>
                        </table>
                        
                      </div>

                      
                          
                       

  	   </div>






	   </div>


      

  

    </section>



<div class="hero-foot"><div class="container has-text-centered"><br><p>© 2020 GameSwap. All rights reserved. All trademarks are property of their respective owners. VAT included in all prices where applicable.<br><br></p></div></div>

</section>



</body>
</html>



