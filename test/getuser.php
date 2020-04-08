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

$con = mysqli_connect('localhost','root','','lab08');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

//mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM product WHERE brand_name LIKE '$q%'";
$result = mysqli_query($con,$sql);

echo "<table class='table'>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    
    echo "<td>" . $row['brand_name'] . "</td>";
    
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
