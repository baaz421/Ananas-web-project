<?php 
$category = $_POST["id"];

require "../db_connnection.php";
$sql ="DELETE FROM categories WHERE ID = {$category}";
//$result =mysqli_query($conn,$sql) or die("Query failed..!");

if(mysqli_query($conn,$sql)){
	echo 1;
}else{
	echo 0;
}

?>