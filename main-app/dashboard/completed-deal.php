<?php
//completed-deal.php
include "header-user.php";
// $get_deal_info = "SELECT * FROM participators WHERE user_id = $u_id AND status = 0";
// // $get_deal_info = "SELECT * FROM participators WHERE status = 0";
// $run_get_deal_info = mysqli_query($conn,$get_deal_info);

// $w_u = array();
// while($r = mysqli_fetch_assoc($run_get_deal_info)){
// $w_u[] = $r['user_id'];
// }
// shuffle($w_u);
// // echo $w_u[0];
// print_r($w_u[0]);

function sumAmount($conn,$u_id,$d_id){
  $sum_info = "SELECT unit_price FROM participators WHERE user_id = $u_id AND status = 0 AND deal_id = $d_id";
  $run_sum_info = mysqli_query($conn,$sum_info);
  $sum = array();
    while ($sum_row = mysqli_fetch_assoc($run_sum_info)){
      $sum[] = $sum_row['unit_price'];
    }
  $sum_amount = array_sum($sum);
  return $sum_amount;
}
function CountQty($conn,$u_id,$d_id){
  $count_info = "SELECT unit_price FROM participators WHERE user_id = $u_id AND status = 0 AND deal_id = $d_id";
  $run_count_info = mysqli_query($conn,$count_info);
  return mysqli_num_rows($run_count_info);
}



?>

<!-- main-panel start -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Completed Deals</h4>
            <p class="card-description">
              <a href="../productsvall.php">Add More Deals</a>
            </p>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Deal ID</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Qty</th>
                    <th class='text-center'>Total Amount</th>
                  </tr>
                </thead>
                <tbody>
<?php

$get_deal_info = "SELECT DISTINCT deal_id FROM participators WHERE user_id = $u_id AND status = 0";
$run_get_deal_info = mysqli_query($conn,$get_deal_info);

if(mysqli_num_rows($run_get_deal_info) > 0){
  $get_part_info = "SELECT * FROM participators WHERE user_id = $u_id AND status = 0";
  $run_get_part_info = mysqli_query($conn,$get_part_info);
  while ($row = mysqli_fetch_assoc($run_get_part_info) AND $row2 = mysqli_fetch_assoc($run_get_deal_info)) {
    $deal_ids =$row2['deal_id'];

      // getting data from deal table
      $con_deal_table = "SELECT * FROM deal WHERE DID = $deal_ids";
      $run_con_deal_table = mysqli_query($conn, $con_deal_table);
      $fetch_deal = mysqli_fetch_assoc($run_con_deal_table);
      $pro_id = $fetch_deal['p_id'];
      $winner_id = $fetch_deal['winner_id'];

      if($winner_id == $u_id){
        $msg = "<p class='text-success'>You Won!</p>";
      }else{
        $msg = "<p class='text-danger'>You Loss!</p>";
      }

      // getting data from product table
      $con_product_table = "SELECT * FROM products WHERE ID = $pro_id";
      $run_con_product_table = mysqli_query($conn, $con_product_table);
      $fetch_product = mysqli_fetch_assoc($run_con_product_table);
      $pro_image = $fetch_product['image_0'];
      $pro_name = $fetch_product['product_name'];

    $out_put ="
      <tr>
        <td>$deal_ids</td>
        <td class='py-1'>
          <img src='../../All-Products-images/".$pro_image."' alt='image'/>
        </td>
        <td>
          <a href='../product-view.php?p_id=$pro_id' target='_blank' class='text-dark'>$pro_name</a>
      </td>
        <td class='text-center'><u>$msg</u></td>
        <td class='text-center'><u>".CountQty($conn,$u_id,$deal_ids)."</u></td>
        <td class='text-center'><u>".sumAmount($conn,$u_id,$deal_ids).".00</u></td>
      </tr>";
      echo $out_put;

  }

// $c_d_u = array_combine($u_p,$d_id);
// print_r($c_d_u);
// echo "<br>";

// $a_sum = array_sum($c_d_u);
// print_r($a_sum);
// echo "<br>";
// $c_v = array_count_values($d_id);
// print_r($c_v);
// echo "<br>";

// print_r($p_id);
// echo "<br>";

// print_r($d_id);
// echo "<br>";

// $mer = array_combine($p_id,$d_id);
// print_r($mer);
// echo "<br>";

// $d = array_unique($mer);
// print_r($d);
  

}else{
	echo "<tr><td><h3>No records found .....</h3>
	<p>To make a deal click here. <a href='../productsvall.php' >Deal now.</a></p></td></tr>";
}
?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>     
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
<?php
include "footer-user.php";
?>


<?php
// if(mysqli_num_rows($run_get_deal_info) > 0){
//   $total = 0;
//   $qty = 1;
//   $deal_id_show = 0;

// while($deal_data = mysqli_fetch_assoc($run_get_deal_info)){

// $deal_ids = $deal_data['deal_id'];
// $de
// $u_price = $deal_data['unit_price'];
// $total += $u_price;
// $u_id = $deal_data['user_id'];

//   // getting data from deal table
//   $con_deal_table = "SELECT * FROM deal WHERE DID = $deal_ids";
//   $run_con_deal_table = mysqli_query($conn, $con_deal_table);
//   $fetch_deal = mysqli_fetch_assoc($run_con_deal_table);
//   $pro_id = $fetch_deal['p_id'];
//   $winner_id = $fetch_deal['winner_id'];

//   if($winner_id == $u_id){
//     $msg = "<p class='text-success'>You Won!</p>";
//   }else{
//     $msg = "<p class='text-danger'>You Loss!</p>";
//   }

//   // getting data from product table
//   $con_product_table = "SELECT * FROM products WHERE ID = $pro_id";
//   $run_con_product_table = mysqli_query($conn, $con_product_table);
//   $fetch_product = mysqli_fetch_assoc($run_con_product_table);
//   $pro_image = $fetch_product['image_0'];
//   $pro_name = $fetch_product['product_name'];

// $out_put ="
//   <tr>
//     <td>$deal_ids</td>
//     <td class='py-1'>
//       <img src='../../All-Products-images/".$pro_image."' alt='image'/>
//     </td>
//     <td>
//       <a href='../product-view.php?p_id=$pro_id' target='_blank' class='text-dark'>$pro_name</a>
//   </td>
//     <td class='text-center '><u>$msg</u></td>
//     <td>
//       <p>$qty X <u>$u_price.00</u></p>
//       <p><u>$total.00</u></p>
//     </td>
//   </tr>";
//   $qty ++;
//   echo $out_put;
// }
// }else{
//   echo "<tr><td><h3>No records found .....</h3>
//   <p>To make a deal click here. <a href='../productsvall.php' >Deal now.</a></p></td></tr>";
// }
?>
