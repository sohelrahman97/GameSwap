

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameSwap | Home</title>
    <link rel="stylesheet" href="bulma.css">
    <link rel="icon" href="icon.png">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="registerValidate.js"></script>
    <style>

      
    
    </style>

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
  if($_SESSION["admin"] != 1)
  {
    header("Location: index.php?error=2");
    exit;
  }

  ?>



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
            <a class="navbar-item is-active" href="/gameswap/admin/landing_admin.php">Home</a>
            <a class="navbar-item"><?php     echo $_SESSION['uname'];   ?></a>
            <a class="navbar-item" href="/gameswap/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <section class="hero is-white ">
  <div class="hero-body">

      
<div class="columns is-variable is-3">
  <div class="column is-one-fifth">
    <div class="menu-container px-1 has-background-white">
      <div class="menu wrapper">

        <aside class="menu">
        <p class="menu-label">
          General
        </p>
        <ul class="menu-list">
          <li><a href="landing_admin.php">Dashboard</a></li>
          
        </ul>
        <p class="menu-label">
          Administration
        </p>
        <ul class="menu-list">
          <li>
            <a>Admins</a>
              <ul>
              <li><a href="admin_add.php">Add admin</a></li>
              <li><a href="admin_view.php">View admins</a></li>
            </ul>
          </li>
          <li>
            <a>Manage Users</a>
            <ul>
              <li><a href="user_add.php" class="is-active">Add user</a></li>
              <li><a href="user_mod.php">View/Delete user</a></li>
            </ul>
          </li>
          <li>
            <a>Manage Games</a>
            <ul>
              <li><a href="game_add.php">Add game</a></li>
              <li><a href="game_mod.php">View/Delete games</a></li>
            </ul>
          </li>
        </ul>
      </aside>

      </div>
    </div>
  </div>
  <div class="column"  style="padding: 30px">

    <?php 

    if(isset($_GET["register"]))
          {
            echo "<div class='notification is-success'>
                 New admin added.
                </div>";
          }

    if(isset($_GET["error"]))
          {
            echo "<div class='notification is-danger'>
                 Error occured.
                </div>";
          }

    ?>

    <h1 class="title has-text-black is-2">Enter user details: </h1>

    
    <form name='myForm' action="confirmuser.php?action=1" onsubmit="return validateForm()" method='post'>
          
          <div class='field'>
          <label class='label'>Name:</label>
          <div class='control'>
            <input class='input' name='name' type='text' placeholder='e.g.yourname'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Email:</label>
          <div class='control'>
            <input class='input' name='email' type='text' placeholder='example@gmail.com'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Password:</label>
          <div class='control'>
            <input class='input' name='pass' type='password' placeholder='must be between 8 and 32 characters'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Confirm password:</label>
          <div class='control'>
            <input class='input' name='pass2' type='password' placeholder='must match previous entry'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Phone:</label>
          <div class='control'>
            <input class='input' name='phone' type='text' placeholder='e.g.+8801623778118'>
          </div>
          </div>

          <div class="field">
            <label class="label">Country</label>
            <div class="control">
              <div class="select">
                <select name="country">
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="India">India</option>
                  <option value="Nepal">Nepal</option>
                </select>
              </div>
            </div>
          </div>
     
        <br>
        <div class='field is-grouped'>
          <div class='control'>
            <button class='button is-success' type='submit'>Submit</button>
          </div>
        </div>
        </form>
      


    
  </div>
</div>
  
</div>

</section>


<div class="hero-foot"><div class="container has-text-centered"><br><p>© 2020 GameSwap. All rights reserved. All trademarks are property of their respective owners. VAT included in all prices where applicable.<br><br></p></div></div>

</section>



</body>
</html>



