

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


    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameSwap | Category</title>
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
          
      if(isset($_GET["cid"]))
              {
                $cid = $_GET["cid"];
              }

      ?>

      <?php

                            $sql = "
                              SELECT g.name AS gname, c.name AS cname, gid, price 
                              FROM game g, category c
                              WHERE g.cid = c.cid AND c.cid='$cid'";

                            $result = mysqli_query($conn,$sql);

                              //$rowcount = mysqli_num_rows($result);

                            
                            

                            ?>

      <div class="table">  
                     <table class="table is-striped is-bordered">  
                          <tr>  
                               <th width="40%">Name</th>  
                                
                               <th width="30%">Price</th>  
                                
                               <th width="1%"></th>  
                          </tr>  

                          <?php

                          while ($row = mysqli_fetch_assoc($result))
                            {

                          ?>
                          
                          <tr>  

                            
                               <td><?php echo  $row['gname']; ?></td>  
                                
                               <td><?php echo  "$" . number_format($row['price'], 2); ?></td>  
                               
                               <td><a href='game_page.php?gid= <?php echo $row['gid'] . "'>" ; ?>View</a></td>  

                               
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



