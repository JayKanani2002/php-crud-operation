<?php

$con=mysqli_connect("localhost","root","","product");
$id=$_GET['id'];
$query=mysqli_query($con,"delete from product1 where product_id='$id'");

echo "row deleted";
echo "<button><a href='formdb.php'>back</a></button>";

 ?>