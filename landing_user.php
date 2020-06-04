<?php
    
require "connection.php";
session_start();
  

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameSwap | Welcome</title>
    <link rel="stylesheet" href="bulma.css">
    <link rel="icon" href="icon.png">


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
  ?>

  <script>
  function showUser(str) {
      if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","getgame.php?q="+str,true);
          xmlhttp.send();
      }
  }
  </script>

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
    	<div class="notification has-text-left has-background-light" style="opacity: 0.95">

        
          <?php
          if(isset($_GET["error"]))
          {
            echo "<div class='notification is-danger'>
                 Error occured.
                </div>";
          }
          ?>

          <h1 class="title has-text-black is-2">Lookup games: </h1>

          <div class="field has-addons">
  
          <p class="control is-expanded">
            <input class="input" type="text" id="txt1" onkeyup="showUser(this.value)">
          </p>
          <div class="control">
            <a class="button is-info">
              Search
            </a>
          </div>
        </div>


        <div id="txtHint"></div>

        <h1 class="title has-text-black is-2">Latest additions: </h1><br>
          


          <div class="w3-content w3-section">
          
            <?php



            $sql = "
              SELECT g.gid, g.image
              FROM game g, latest l
              WHERE g.gid=l.gid";

            $result = mysqli_query($conn,$sql);

              //$rowcount = mysqli_num_rows($result);

            while ($row = mysqli_fetch_assoc($result))
            {
            echo "<a href='game_page.php?gid=" . $row['gid'] . "'>" . "<img class='mySlides' src='images/" . $row['image'] . "'></a>";
            }

            ?>

        </div>

        <br><br>

        <h1 class="title has-text-black is-2">Categories: </h1><br>

        <div class="columns is-multiline is-size-3">
        <div class="column is-one-quarter">
          

          <div class="box has-background-danger">
            <br>
            <center>
            <a href="show_category.php?cid=1" style="text-decoration: none;">Action</a>
            </center>
            <br>
            
          </div>

        </div>
        <div class="column is-one-quarter">

          <div class="box has-background-primary">
            <br>
            <center>
            <a href="show_category.php?cid=2" style="text-decoration: none;">Adventure</a>
            </center>
            <br>
            
          </div>
          
        </div>
        <div class="column is-one-quarter">
          

          <div class="box has-background-warning">
            <br>
            <center>
            <a href="show_category.php?cid=3" style="text-decoration: none;">Sports</a>
            </center>
            <br>
            
          </div>

        </div>
        <div class="column is-one-quarter">

          <div class="box has-background-success">
            <br>
            <center>
            <a href="show_category.php?cid=4" style="text-decoration: none;">Educational</a>
            </center>
            <br>
            
          </div>

        </div>
        <div class="column is-one-quarter">

          <div class="box has-background-info">
            <br>
            <center>
            <a href="show_category.php?cid=5" style="text-decoration: none;">FPS</a>
            </center>
            <br>
            
          </div>

        </div>
        <div class="column is-one-quarter">

          <div class="box has-background-success">
            <br>
            <center>
            <a href="show_category.php?cid=6" style="text-decoration: none;">RPG</a>
            </center>
            <br>
            
          </div>
          
        </div>


        <div class="column is-one-quarter">

          <div class="box has-background-danger">
            <br>
            <center>
            <a href="show_category.php?cid=7" style="text-decoration: none;">Horror</a>
            </center>
            <br>
            
          </div>
          
        </div>

        <div class="column is-one-quarter">

          <div class="box has-background-primary">
            <br>
            <center>
            <a href="show_category.php?cid=-1" style="text-decoration: none;"><u>All Games</u></a>
            </center>
            <br>
            
          </div>
          
        </div>
        


        
        </div>

        <h1 class="title has-text-black is-2">Deals: </h1><br>

        <div class="columns is-multiline is-size-5">
        <div class="column is-half">
          
          <div class="box has-background-info">
            
            50% off:
            
            <br>
            
            <a href="game_page.php?gid=1" style="text-decoration: none;">
              <figure class="image">
              <img src="images/slide1.jpg">
              </figure>
            </a>

          </div>
        

        </div>
        <div class="column is-half">

          <div class="box has-background-success">
            
            
            30% off:
            
            <br>
            <a href="game_page.php?gid=2" style="text-decoration: none;">
            <figure class="image">
              <img src="images/slide2.jpg">
            </figure>
            </a>

          </div>


        </div>
        <div class="column is-half">
          

          <div class="box has-background-danger">
            
            20% off:
            
            <br>
            <a href="game_page.php?gid=3" style="text-decoration: none;">
            <figure class="image">
              <img src="images/slide3.jpg">
            </figure>
            </a>

          </div>

        </div>
        <div class="column is-half">

          <div class="box has-background-warning">
            
            10% off:
            
            <br>
            <a href="game_page.php?gid=4" style="text-decoration: none;">
            <figure class="image">
              <img src="images/slide4.jpg">
            </figure>
            </a>

          </div>
            
          

        </div>
        
        
        </div>

        <script>
        var myIndex = 0;
        carousel();

        function carousel() {
          var i;
          var x = document.getElementsByClassName("mySlides");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}    
          x[myIndex-1].style.display = "block";  
          setTimeout(carousel, 3000); 
        }
        </script>
          
         
          
        </div>
      </center>

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



