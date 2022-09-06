<?php 
//wishlist-delete.php
require "../db_connnection.php";
if(isset($_POST['w_id'])){
	$w_id = $_POST['w_id'];
$sql ="DELETE FROM wishlist WHERE ID = {$w_id}";

if(mysqli_query($conn,$sql)){
	echo 1;
}else{
	echo 0;
}

}
