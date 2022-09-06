<?php 
// load-products.php
require "db_connnection.php";
require "products-functions.php";
require "../m-admin/deals-ajax-files/deals-functions.php";

 $query_s  = "SELECT * FROM products WHERE ID = '{$_GET['p_id']}'";
 $run_query_s = mysqli_query($conn, $query_s);
 $get_status = mysqli_fetch_assoc($run_query_s);
 $status_p = $get_status['p_status'];
 
if(isset($_GET['p_id']) && $status_p == 1){
  $query  = "SELECT * FROM products WHERE ID = '{$_GET['p_id']}'";
  $result = mysqli_query($conn, $query);
  $get 	  = mysqli_fetch_assoc($result);
  
  $p_id     = $get['ID'];
  $p_name 	= $get['product_name'];
  $p_cat 		= GetCatName($get['category_id'],$conn);
  $p_name 	= $get['product_name'];
  $p_amt 		= $get['m_price'];
  $p_des 		= $get['description'];

  // image path and image name  for left side small image
  $img_path     = "../All-Products-images/";
  $p_img_name1 	= $get['image_0'];
  $p_img_name2 	= $get['image_1'];
  $p_img_name3 	= $get['image_2'];
  $p_img_name4 	= $get['image_3'];

  // image name and path for singal image
  $p_img_src  = $img_path.$p_img_name1;

// next product link
  $next =  nextProduct($_GET['p_id'],$conn);
  if($next == "null"){
      $n_class_dis  = "isDisabled";
      $n_id_dis     = "dis-n-p";
      $n_link       = "";
  }else{
      $n_class_dis  = "";
      $n_id_dis     = "";
      $n_link       = $next;
  }
// pre product link
  $pre =preProduct($_GET['p_id'],$conn);
  if($pre == "null"){
      $p_class_dis  = "isDisabled";
      $p_id_dis     = "dis-n-p";
      $p_link       = "";
  }else{
      $p_class_dis  = "";
      $p_id_dis     = "";
      $p_link       = $pre;
  }
// check wishlist in database for user

    $pvw_disable = DisableWishlistButton($user_id,$p_id,$conn);
    $pvc_disable = DisableCartButton($user_id,$p_id,$conn);

}else{
   
header('location: productsvall.php');
}
