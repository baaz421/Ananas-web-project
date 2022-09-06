<?php
//cart-number-display.php
session_start();
require "../db_connnection.php";

if(isset($_SESSION['u_id'])){
    $user_id = $_SESSION['u_id'];
    $count_cart = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
    $run_count_cart = mysqli_query($conn, $count_cart);
        if(mysqli_num_rows($run_count_cart) > 0){
            $cart_count =mysqli_num_rows($run_count_cart);   
        }else{
            $cart_count =0;
        }        
}else{
    $cart_count =0;
}

echo $cart_count;