<?php 
$name = "slide6.jpg";
$thumbdir = "thumb_" . $name;

$width = 128; 
$height = 72; 
   
// Get image dimensions 
list($width_orig, $height_orig) = getimagesize($name); 
   
// Resample the image 
$image_p = imagecreatetruecolor($width, $height); 
$image = imagecreatefromjpeg($name); 
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig); 
   
// Output the image 
header('Content-Type: image/jpeg'); 
imagejpeg($image_p, $thumbdir); 
imagedestroy($image_p);

?>