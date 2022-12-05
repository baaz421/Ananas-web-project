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


function LoadCategories($conn,$lang){
    $sql_get_categories = "SELECT * FROM categories WHERE status = 1";
    $run_sql_get_categories = mysqli_query($conn, $sql_get_categories);
    if(mysqli_num_rows($run_sql_get_categories) > 0){
        while($cat_row = mysqli_fetch_assoc($run_sql_get_categories)){
            $cat_link = "category-products.php";
            $cat_id = $cat_row['ID'];
            $link_cat = $cat_link."?c_id=".$cat_id;
            if($lang == "en"){
              $cat_name = $cat_row['cat_name']; 
            }else{
              $cat_name = $cat_row['cat_name_arabic']; 
            }
            
            $show_cat = "<li><a href='{$link_cat}' class='text-uppercase'>{$cat_name}</a></li>";
            echo $show_cat;
        }
    }
}

?>