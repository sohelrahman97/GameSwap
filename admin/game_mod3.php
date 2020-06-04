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

$gid = $_GET['gid'];
$action = $_GET['action'];


if($action==1)
{
  $sql = "
          DELETE FROM game
          WHERE gid='$gid'";

  $result = mysqli_query($conn,$sql);

  $sql = "
          DELETE FROM status
          WHERE gid='$gid'";

  $result = mysqli_query($conn,$sql);

  $sql = "
          DELETE FROM usr_games
          WHERE gid='$gid'";

  $result = mysqli_query($conn,$sql);

  header("Location: game_mod.php?success=1");
  exit; 
}
if($action==2)
{
  $name = $_POST['name'];
  $year = $_POST['year'];
  $rating = $_POST['rating'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $availnum = $_POST['availnum'];
  $flag = 0;

  // Take care of apostrophes in the description text.
  $description = mysqli_real_escape_string($conn, $description);
  //$description = strip_tags($_POST['description']);   
  //$description = nl2br($description);


  // Find out the current amount of copies availble, and only allow new values if it's greater than the current value
  $sql = "
                SELECT total
                FROM status
                WHERE gid='$gid'";

  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  $curravailnum = $row['gid'];

  //Digital game codes do not get damaged, so the number of total game copies of GameSwap should not decrease
  if($availnum<$curravailnum)
  {
    header("Location: game_mod2.php?gid=$gid&error=Error - You cannot reduce the number of available copies");
    $flag = 1;
    exit; 
  }

  //check if new image is uploaded
  if($_FILES["fileToUpload"]["tmp_name"] == "")
  {
    $image = 0;

    // Finds out the name of the current image
    $sql = "SELECT image
        FROM game
        WHERE gid = '$gid'";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($result);

    $imgName = $row['image'];
  }
  else $image = 1;

  if($image == 1)
  {
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check == false) {
      header("Location: game_mod2.php?gid=$gid&error=Error - File uploaded is not an image");
      $flag = 1;
      exit;
    }

    //Check if image is in full HD resolution
    list($imgwidth, $imglength, $type, $attr) = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if($imgwidth!=1920 && $imglength!=1080)
    {
      header("Location: game_mod2.php?gid=$gid&error=Error - Image must be in 1920x1080 resolution");
      $flag = 1;
      exit;
    }

    

    $filename = basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
      header("Location: game_mod2.php?gid=$gid&error=Error - File uploaded is too large");
      $flag = 1;
      exit;
    }

    // Allow only JPG files
    if($imageFileType != "jpg" && $imageFileType != "jpeg") {
      header("Location: game_mod2.php?gid=$gid&error=Error - Only JPG and JPEG images are supported.");
      $flag = 1;
      exit;
    }


    //Determine new name of image file to be saved

    $sql = "SELECT image
            FROM game
            WHERE gid = '$gid'";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($result);
    
    $imgName = $row['image'];

    $target_dir = "../images/";
    $target_file = $target_dir . $imgName;


  }



  // Final stage - Update data if there is no flag error
  if ($flag == 0) {
      $sql = "
      UPDATE game
      SET name='$name', year='$year', rating='$rating', price='$price', cid='$category', description='$description',image='$imgName'
      WHERE gid='$gid'";

      $result = mysqli_query($conn,$sql);

      //Updates 'avail' table
      $sql = "
      UPDATE status
      SET total='$availnum'
      WHERE gid='$gid'";

      $result = mysqli_query($conn,$sql);

    if($image == 1)
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        //Create resized thumbnail from uploaded image
        $original_dir = "../images/" . $imgName; 
        $thumb_dir = "../images/thumb_" . $imgName;
        $width = 128; 
        $height = 72; 
           
        // Get image dimensions 
        list($width_orig, $height_orig) = getimagesize($original_dir); 
           
        // Resample the image 
        $image_p = imagecreatetruecolor($width, $height); 
        $image = imagecreatefromjpeg($original_dir); 
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig); 
           
        // Save the image in location $thumb_dir
        header('Content-Type: image/jpeg'); 
        imagejpeg($image_p, $thumb_dir); 
        imagedestroy($image_p);
      


        header("Location: game_mod.php?success=1");
        exit;
      } else {
        header("Location: game_mod2.php?gid=$gid&error=Error - File could not be uploaded");
        exit;
      }
    }
      
    header("Location: game_mod.php?success=1");
    exit;
    
  }
  else
  {
      //Flag's value is not 0
      header("Location: game_mod2.php?gid=$gid&error=Error - One or more of the input values are invalid");
      exit;
  }


}




?>