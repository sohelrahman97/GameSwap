<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | GameSwap</title>
    <link rel="stylesheet" href="bulma.css">

    <link rel="icon" href="icon.png">

    

  </head>


<body>

  <section class="hero is-danger is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-5-tablet is-4-desktop is-3-widescreen">
        <div class="box">

        <?php
        if(isset($_GET["error"]))
          {
            echo "<div class='notification is-danger'>
                 Login failed
                </div>";
          }
        ?>

        <p><b>GameSwap</b></p>
        <hr>

        
        <form action="confirmlogin.php" method="post">
          <div class="field">
  		    <label class="label">Email</label>
  		    <div class="control">
  		    <input class="input" name="email" type="text" placeholder="example@gmail.com">
  		    </div>
  		    </div>

          <div class="field">
  		    <label class="label">Password</label>
  		    <div class="control">
  		    <input class="input" name="pass" type="password" placeholder="password">
  		    </div>
  		    </div>

          

          <br>
          <div class="field is-grouped">
  		    <div class="control">
  		    <button class="button is-success" type="submit">Submit</button>
  		    </div>
  		    </div>
        </form>
        
        
        <hr>
        <p>Not a user yet? <a href="register.php"><u>Register here</u></a>
        </div>
        </div>
      </div>
    </div>
  </div>
  </section>


</body>
</html>