

<!DOCTYPE html>
<html>
  <head>
    <?php
    require "connection.php";
    session_start();
    
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameSwap | View game</title>
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
      
      <center>


        <div class='notification has-text-left has-background-light' style='opacity: 0.95'>
          
          <?php
              if(isset($_GET["gid"]))
              {
                $gid = $_GET["gid"];
              }


        if (!isset($_COOKIE["cards"])) 
        {
          $cookieflag = 0;
          $visitArray=array($gid);
          $json = json_encode($visitArray);
          setcookie("cards", $json);
        }
        else
        {
          $cookieflag = 1;
          $cookie = $_COOKIE["cards"];
          $cookie = stripslashes($cookie);
          $savedvisitArray = json_decode($cookie, true);

          if (!in_array($gid, $savedvisitArray)) 
          {
            array_push($savedvisitArray, $gid);
            $json = json_encode($savedvisitArray);
            setcookie("cards", $json);
          }


              $sql = "
                SELECT avail
                FROM status
                WHERE gid='$gid'";

              $result = mysqli_query($conn,$sql);

                //$rowcount = mysqli_num_rows($result);

              while ($row = mysqli_fetch_assoc($result))
              {
                $avail = $row['avail'];
              }

              $avail_flag = 0;
              if($avail == 0) 
                {
                  $avail_flag = 1;
                  $str = "Not available";
                }
                else
                {
                  $str = "Available";
                }



               $sql = "
                SELECT gid, g.name AS gname, year, rating, price, description, image, c.name AS cname
                FROM game g, category c
                WHERE gid='$gid' AND g.cid=c.cid";

              $result = mysqli_query($conn,$sql);

                //$rowcount = mysqli_num_rows($result);

              while ($row = mysqli_fetch_assoc($result))
              {
                $name = $row['gname'];
                $price = $row['price'];

              echo "



              <div class='columns  is-vcentered'>
              <div class='column'>
                

                <img src=' ". $row['image'] . "' alt='slide9.jpg' >
                
              

              </div>
              <div class='column is-three-fifths'>
                
                

                <div class='notification has-text-left has-background-light' style='opacity: 0.8'>


                  

                  <h1 class='title has-text-black is-1'>". $row['gname'] . "</h1>
                  <ul class='is-size-3'>
                    <li>Year released: ". $row['year'] . " </li>
                    <li>Genre: ". $row['cname'] . "</li>
                    <li>Rating: ". $row['rating'] . "/5</li>
                    <li>Status: ". $str . "</li>
                    <li>Price: $". number_format($row['price'], 2) . "</li>
                  </ul>  




                  <br>
                  
                 
                  
                </div>
              
              </div>
              
              </div>
              
              <p class='is-size-4'><b>Synopsis: </b> ". $row['description'] . "</p>



              ";
              }


              ?>

          

          <br><br>


          <?php
            $sql = "
              SELECT ret
              FROM usr_games
              WHERE gid = '$gid' AND ret=0";

            $result = mysqli_query($conn,$sql);

            $rowcount = mysqli_num_rows($result);

            if($rowcount != 0) $avail_flag = 1;



            if($avail_flag==0) 
              {
                echo "<form method='post' action='cart.php?action=add&gid=" . $gid . "'>";
                echo "<input class='button is-primary is-medium' type='submit' value='Add to cart' name='add_to_cart'>";
          ?>


                <input type="hidden" name="hidden_name" value="<?php echo $name; ?>" />  
                <input type="hidden" name="hidden_price" value="<?php echo $price; ?>" /> 


          <?php
                echo "</form>";
              }
            else echo "<input class='button is-danger is-medium' type='submit' value='Not available'>";
            echo "<br><hr>";
            echo "<h3 class='title is-3 has-text-black'><u>Previously visited</u></h3>";
            if($cookieflag!=0)
            {
              echo "<div class='columns'>";

            foreach($savedvisitArray as $key => $value)  
               {  
                    //echo $value . " ";
                    $sql = "
                    SELECT image
                    FROM game
                    WHERE gid='$value'";

                  $result = mysqli_query($conn,$sql);

                    //$rowcount = mysqli_num_rows($result);

                  while ($row = mysqli_fetch_assoc($result))
                  {
                    $imglink = $row['image'];
                  }

                  echo "
                  <div class = 'column'>
                  <figure class='image is-256x256'>
                  <img src='$imglink'>
                  </figure> 
                  </div>";

               }  

               echo "</div>";
            }
            

          ?>
          
          

          

          <!--<article class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img src="https://bulma.io/images/placeholders/128x128.png">
            </p>
          </figure>
          <div class="media-content">
            <div class="content">
              <p>
                <strong>John Smith</strong>  <small>31m</small>
                <br>
                This is a great game! 
              </p>
            </div>
            
          </div>
          
        </article>
      
          <article class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img src="https://bulma.io/images/placeholders/128x128.png">
            </p>
          </figure>
          <div class="media-content">
            <div class="field">
              <p class="control">
                <textarea class="textarea" placeholder="Add a comment..."></textarea>
              </p>
            </div>
            <nav class="level">
              <div class="level-left">
                <div class="level-item">
                  <a class="button is-info">Submit</a>
                </div>
              </div>
              <div class="level-right">
                <div class="level-item">
                  
                </div>
              </div>
            </nav>
          </div>
        </article>-->
        </div>
        <?php

          
        }

        ?>

      </center>

  	</div>






	 </div>

      

  

    </section>

<div class="hero-foot"><div class="container has-text-centered"><br><p>© 2020 GameSwap. All rights reserved. All trademarks are property of their respective owners. VAT included in all prices where applicable.<br><br></p></div></div>

</section>



</body>
</html>



