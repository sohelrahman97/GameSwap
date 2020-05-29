<?php

  require "connection.php";
  session_start();
  
?>

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
              <li><a href="user_add.php">Add user</a></li>
              <li><a href="user_mod.php">View/Delete user</a></li>
            </ul>
          </li>
          <li>
            <a>Manage Games</a>
            <ul>
              <li><a href="game_add.php" class="is-active">Add game</a></li>
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

    if(isset($_GET["success"]))
          {
            echo "<div class='notification is-success'>
                 Game added successfully
                </div>";
          }

    if(isset($_GET["error"]))
          {
            echo "<div class='notification is-danger'>"
                 . $_GET["error"] .
                "</div>";
          }

    ?>

    <h1 class="title has-text-black is-2">Enter game details: </h1>

    
    <form name='myForm' action="game_add2.php" onsubmit="return validategameForm()" method='post' enctype="multipart/form-data">
          
          <div class='field'>
          <label class='label'>Name:</label>
          <div class='control'>
            <input class='input' name='name' type='text' placeholder=''>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Year:</label>
          <div class='control'>
            <input class='input' name='year' type='text' placeholder=''>
          </div>
          </div>

          <div class='field'>
            <label class='label'>Rating:</label>
            <div class="control">
              <label class="radio">
                <input type="radio" name="rating" value="1" checked>
                1
              </label>
              <label class="radio">
                <input type="radio" name="rating" value="2">
                2
              </label>
              <label class="radio">
                <input type="radio" name="rating" value="3">
                3
              </label>
              <label class="radio">
                <input type="radio" name="rating" value="4">
                4
              </label>
              <label class="radio">
                <input type="radio" name="rating" value="5">
                5
              </label>
            </div>
          </div>

          <div class='field'>
          <label class='label'>Price:</label>
          <div class='control'>
            <input class='input' name='price' type='text' placeholder=''>
          </div>
          </div>

          <div class="field">
            <label class="label">Category</label>
            <div class="control">
              <div class="select">
                <select name="category">
          
                <?php 

                require "connection.php";

                  $sql = "
                    SELECT cid, name
                    FROM category";

                  $result = mysqli_query($conn,$sql);

                    //$rowcount = mysqli_num_rows($result);

                  while ($row = mysqli_fetch_assoc($result))
                  {
                  

                ?>

          
                <option value="<?php echo $row['cid']; ?>"><?php echo $row['name'];?></option>
                

              <?php 

              }

              ?>

                </select>
                </div>
              </div>
            </div>

          <div class="field">
            <div class="control">
              <label class="label">Description</label>
              <textarea class="textarea is-primary" placeholder="Description" name="description"></textarea>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <label class="label">Units available:</label>
              <input class='input' name='availnum' type='text' placeholder=''>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <label class="label">Cover image (must be 1920x1080 and .jpg format):</label>
              <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
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



