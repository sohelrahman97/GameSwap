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
              <li><a href="user_mod.php" class="is-active">View/Delete user</a></li>
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

  if(isset($_GET["success"]))
    {
      echo "<div class='notification is-success'>
           Task successful!
          </div>";
    }

  if(isset($_GET["register"]))
    {
      echo "<div class='notification is-success'>
           New user added.
          </div>";
    }

  if(isset($_GET["error"]))
    {
      echo "<div class='notification is-danger'>
           Error occured.
          </div>";
    }

  $sql = "SELECT uid, name,email, phone, country FROM users WHERE admin='0'";

  $result = mysqli_query($conn,$sql);

  ?>

  <h1 class="title has-text-black is-2">Users: </h1>

  <div class="table">  
                     <table class="table is-striped is-bordered is-fullwidth">  
                          <tr>  
                               <th>Name</th>  
                                
                               <th>Email</th> 

                               <th>Phone</th>

                               <th>Country</th>

                               <th></th>

                               <th></th>
                          </tr>  
                          
                          <tr>  

                            
                            <?php

                            while ($row = mysqli_fetch_assoc($result))
                            {
                            

                            ?>
                               <td><?php echo  $row['name']; ?></td>  
                                
                               <td><?php echo  $row['email']; ?></td> 

                               <td><?php echo  $row['phone']; ?></td> 

                               <td><?php echo  $row['country']; ?></td> 

                               <td><a href="user_mod2.php?uid=<?php echo  $row['uid']; ?> "> View details/Edit </a></td>

                               <td>
                                 <div class='field is-grouped'>
                                  <div class='control'>
                                    <button class='button is-danger' type='submit'><a href='user_mod3.php?temp_uid=<?php echo $row['uid']; ?>&action=2'>Delete</a></button>
                                  </div>
                                  </div>

                               </td>

                          </tr>  
                            
                           <?php  } ?>
                        </table>
                        
                      </div>


    
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



