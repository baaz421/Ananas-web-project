<?php 
function current_bal($u_id, $conn)
{
    $check_u_cb = "SELECT * FROM current_balance WHERE u_id ='$u_id'";
    $run_check_u_cb = mysqli_query($conn,$check_u_cb);
    if(mysqli_num_rows($run_check_u_cb) > 0){
        $fetch = mysqli_fetch_assoc($run_check_u_cb);
        $amount = $fetch['cb_amount'];
        return $amount;
    }else{
        $amount = 0;
        return $amount;
    }
}

function TotalProducts($conn){
    $sql ="SELECT * FROM products WHERE p_status = '1'";
    $result =mysqli_query($conn,$sql) or die("Query failed..!");
    $cou_pro = mysqli_num_rows($result);
    return $cou_pro;
}

?>