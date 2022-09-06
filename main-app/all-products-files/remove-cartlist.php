<?php 
// remove-cartlist.php

require "../db_connnection.php";
if(isset($_POST['c_id'])){
	$c_id = $_POST['c_id'];
$sql ="DELETE FROM cart WHERE ID = {$c_id}";

if(mysqli_query($conn,$sql)){
	echo 1;
}else{
	echo 0;
}

}
