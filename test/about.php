
application/x-httpd-php about.php ( HTML document, UTF-8 Unicode text, with CRLF line terminators )
<?php

require "connection.php";
    session_start();
    
?>

<!DOCTYPE html>
<html>
  <head>
    <style> 
    #map { 
      height: 400px; 
      width: 100%; 
    } 
    </style> 
    <?php

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
         <h1 class="title has-text-black is-4"><b>Mission statement: </b></h1>
      

        <p>Owning video games can be very expensive. There are only so many times that you can play a game before you're done with every aspect of it. Resell value of video games fall rapidly after its release. Thus, save money and rent games instead using <b>GameSwap</b>!  </p> <br>

        <h1 class="title has-text-black is-4"><b>Our headquarters: </b></h1>

        <div id="map"></div> 
        <script> 
        function initMap() { 
          var temp = {lat: 23.780806, lng: 90.425162}; 
          var map = new google.maps.Map(document.getElementById('map'), { 
          zoom: 18, 
          center: temp 
          }); 
          var marker = new google.maps.Marker({ 
          position: temp, 
          map: map 
          }); 
        } 
        </script> 
        <script async defer 
        src= 
      "https://maps.googleapis.com/maps/api/js?key= 
      AIzaSyDPIQSAsNVDJo6HhME7VLrnB8fKSerdsWM&callback=initMap"> 
        </script>      
                  

       </div>






     </div>


      

  

    </section>



<div class="hero-foot"><div class="container has-text-centered"><br><p>© 2020 GameSwap. All rights reserved. All trademarks are property of their respective owners. VAT included in all prices where applicable.<br><br></p></div></div>

</section>



</body>
</html>


