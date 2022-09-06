
<?php
include "../db_connnection.php";


$sql ="SELECT ID,cat_name FROM categories WHERE status = 1";
$result =mysqli_query($conn,$sql) or die("Query failed..!");

if(mysqli_num_rows($result)>0){
	$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($output);
}else{
	echo "no data found";
}


?>