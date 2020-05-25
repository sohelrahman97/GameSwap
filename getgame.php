<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
<link rel="stylesheet" href="bulma.css">

</head>
<body>


<?php
$q = $_GET['q'];

require "connection.php";

//mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM game WHERE name LIKE '$q%'";
$result = mysqli_query($conn,$sql);

echo "<table class='table'>";
while($row = mysqli_fetch_array($result)) {
	$thumb = "images/thumb_" . $row['image'];
    echo "<tr>";
    
    echo "<td>" . "<figure class='image is-16by9'><img src='$thumb'></figure>" . "</td>" . "<td>" . "<a href='game_page.php?gid=" . $row['gid'] . "'>" . $row['name'] . "</a> $" . $row['price'] . "</td>";
    
    echo "</tr>";
}
echo "</table>";

?>
</body>
</html>
