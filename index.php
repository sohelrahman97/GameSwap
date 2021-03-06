

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameSwap | Home</title>
    <link rel="stylesheet" href="bulma.css">
    <link rel="icon" href="icon.png">
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
            <a class="navbar-item is-active" href="index.php">Home</a>
            <a class="navbar-item" href="about2.php">About us</a>
            <a class="navbar-item" href="register.php">Register</a>
            <a class="navbar-item" href="login.php">Login</a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <section class="hero is-white">
  <div class="hero-body">

    <div class="container">
      
      <center>
    	<div class="columns  is-vcentered">
      <div class="column">
        

        
        <div class="notification has-text-left has-background-light" style="opacity: 0.8">

          <?php
        if(isset($_GET["register"]))
        {
          echo "<div class='notification is-success'>
               Registered successfully.
              </div>";
        }

        if(isset($_GET["logout"]))
        {
          echo "<div class='notification is-success'>
               Logged out successfully
              </div>";
        }

        if(isset($_GET["error"]))
        {
          echo "<div class='notification is-danger'>
               Error occured.
              </div>";
        }
        ?>

          <h1 class="title has-text-black is-1"><b>Gaming redefined </b></h1><br>
          <ul class="is-size-3">
            <li>20,000+ games</li>
            <li>2 million+ users</li>
            <li>Constant updates</li>
          </ul>  

          <br><p class="is-size-4">What are you waiting for? <a href="register.php">Join now!</a></p>
          
         
          
        </div>
      

      </div>
      <div class="column is-three-fifths">
        
        <img src="doomguy.png" alt="Smiley face" >
      
      </div>
      
      </div>
    </center>

  	</div>






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



