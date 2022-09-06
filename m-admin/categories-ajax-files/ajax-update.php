<?php 
$id_cat = $_POST["id_cat"];
$english_cat = $_POST["english_cat"];
$arabic_cat = $_POST["arabic_cat"];

require "../db_connnection.php";
$sql ="UPDATE categories SET cat_name = '{$english_cat}', cat_name_arabic = '{$arabic_cat}'  WHERE ID = {$id_cat}";
//echo  $sql;
//$result =mysqli_query($conn,$sql) or die("Query failed..!");

if(mysqli_query($conn,$sql)){
	echo 1;
}else{
	echo 0;
}

?>