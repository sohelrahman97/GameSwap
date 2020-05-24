<?php 

$flag = 0;
if($_FILES["fileToUpload"]["tmp_name"] == "")
  {
    echo "Error1";
    $flag=1;
  }

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check == false) {
    echo "Error2";
    $flag=1;
  }


  list($imgwidth, $imglength, $type, $attr) = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

  if($imgwidth!=1920 && $imglength!=1080)
  {
  	echo "File is not in full hd resolution";
  }

$imgName = "slide.jpg";
$filename = basename($_FILES["fileToUpload"]["name"]);
                    


  $target_dir = "../images/";
  $target_file = $target_dir . $imgName;

  $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Error3";
    $flag=1;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "jpeg") {
    echo "Error4";
    $flag=1;
  }

 if($flag==0) echo "No error";

?>