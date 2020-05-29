<?php

require "connection.php";
session_start();
    
?>

<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {width: 100%; height: 600px;}
    </style>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />

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

        <div id='map'></div>
        <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic29oZWxyYWhtYW45NyIsImEiOiJjazhyN2w4MHAwYnVrM2RwZGwwb21vZXFoIn0.64QVA4qIA8bVGnUqm9ridQ';
        var map = new mapboxgl.Map({
        container: 'map',
        center: [90.425162, 23.780806],
        zoom: 13,
        style: 'mapbox://styles/mapbox/streets-v11'
        });

        var marker = new mapboxgl.Marker()
        .setLngLat([90.425162, 23.780806])
        .addTo(map);
        </script>

      
       </div>
     </div>

    </section>



<div class="hero-foot"><div class="container has-text-centered"><br><p>© 2020 GameSwap. All rights reserved. All trademarks are property of their respective owners. VAT included in all prices where applicable.<br><br></p></div></div>

</section>

<script>
document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
</script>

</body>
</html>


