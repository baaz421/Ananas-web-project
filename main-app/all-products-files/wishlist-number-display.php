<?php 
//wishlist-number-display.php
session_start();
require "../db_connnection.php";

if(isset($_SESSION['u_id'])){
    $user_id = $_SESSION['u_id'];
    $count_wishlist = "SELECT * FROM wishlist WHERE user_id = '{$user_id}'";
    $run_count_wishlist = mysqli_query($conn, $count_wishlist);
        if(mysqli_num_rows($run_count_wishlist) > 0){
            $wish_count =mysqli_num_rows($run_count_wishlist);   
        }else{
            $wish_count =0;
        }        
}else{
    $wish_count =0;
}

echo $wish_count;