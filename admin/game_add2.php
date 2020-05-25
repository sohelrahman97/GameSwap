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


  // Check if image file is a actual image or fake image
  if($_FILES["fileToUpload"]["tmp_name"] == "")
  {
    header("Location: game_add.php?error=Error - No image uploaded");
    exit;
  }

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check == false) {
    header("Location: game_add.php?error=Error - File uploaded is not an image");
    $flag = 1;
    exit;
  }

  //Check if image is in full HD resolution
  list($imgwidth, $imglength, $type, $attr) = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

  if($imgwidth!=1920 && $imglength!=1080)
  {
    header("Location: game_add.php?error=Error - Image must be in 1920x1080 resolution");
    $flag = 1;
    exit;
  }

  

  $filename = basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
    header("Location: game_add.php?error=Error - File uploaded is too large");
    $flag = 1;
    exit;
  }

  // Allow only JPG files
  if($imageFileType != "jpg" && $imageFileType != "jpeg") {
    header("Location: game_add.php?error=Error - Only JPG and JPEG images are supported.");
    $flag = 1;
    exit;
  }


  //Determine new name of image file to be saved

  $sql = "SELECT COUNT(*) AS num
          FROM game";

  $result = mysqli_query($conn,$sql);
  print_r($result);
  $row = mysqli_fetch_assoc($result);
  
  $game_rows = $row['num'];

  echo $game_rows . " ";
  
  $game_rows++;
  $imgName = "slide" . $game_rows . ".jpg";

  $target_dir = "../images/";
  $target_file = $target_dir . $imgName;



  // Final stage - Upload data if there is no flag error
  if ($flag == 0) {
      $sql = "
      INSERT INTO game values ('','$name','$year','$rating','$price','$category','$description','$imgName')";

      $result = mysqli_query($conn,$sql);

      //Finds out the gid of the newly created game, and updates 'avail' table accordingly

      $sql = "
                    SELECT gid
                    FROM game
                    WHERE name='$name'";

      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $newGID = $row['gid'];

      $sql = "
      INSERT INTO status values ('$newGID','$availnum','$availnum')";

      $result = mysqli_query($conn,$sql);
      

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
    


      header("Location: game_add.php?success=1");
      exit;
    } else {
      header("Location: game_add.php?error=Error - File could not be uploaded");
      exit;
    }
  }
  else
  {
      //Flag's value is not 0
      header("Location: game_add.php?error=Error - One or more of the input values are invalid");
      exit;
  }



?>