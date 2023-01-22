<?php
// function.php
// get product data by its id
function GetProductData($conn, $pro_id){
  $sql = "SELECT * FROM products WHERE ID = $pro_id";
  $run = mysqli_query($conn, $sql);
  return $run;
}
// get deal data by it id
function GetDealData($conn, $deal_id){
    $sql = "SELECT * FROM deal WHERE DID = $deal_id";
    $run = mysqli_query($conn, $sql);
    return $run;
}
// get user data by it id
function GetUserData($conn, $user_id){
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $run = mysqli_query($conn, $sql);
    return $run;
}

// get admin/vendor/seller data by it id
function GetAdminData($conn, $admin_id){
    $sql = "SELECT * FROM admin WHERE AID = $admin_id";
    $run = mysqli_query($conn, $sql);
    return $run;
}

// get winner table data by it  winner id
function GetWinnerData($conn, $w_id){
    $sql = "SELECT * FROM winner WHERE w_id = $w_id";
    $run = mysqli_query($conn, $sql);
    return $run;
}