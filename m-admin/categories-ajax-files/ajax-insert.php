<?php 

$cat_eng = $_POST['cat_english'];
$cat_ara = $_POST['cat_arabic'];
$status = 0;

require "../db_connnection.php";
$sql ="INSERT INTO categories(cat_name, cat_name_arabic, status) VALUES ('{$cat_eng}','{$cat_ara}','$status')";
//$result =mysqli_query($conn,$sql) or die("Query failed..!");

if(mysqli_query($conn, $sql)){
	echo 1;
}else{
	echo 0;
}


?>