<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register| People's Portal </title>
    <link rel="stylesheet" href="bulma.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="registerValidate.js"></script>
    <link rel="icon" href="icon.png">
    <style>

      .hero-body
      {
        background: url(background.jpg) center/cover;
      }
    
    </style>
    

  </head>


<body>

  <section class="hero is-danger is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-5-tablet is-4-desktop is-3-widescreen">
        <div class="box">

        <p><b>Register</b></p>
        <hr>

        <form name='myForm' action="confirmregister.php" onsubmit="return validateForm()" method='post'>
          
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
        
        
        <br>
        </div>
        </div>
      </div>
    </div>
  </div>
  </section>



</body>
</html>


