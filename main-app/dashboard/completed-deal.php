<?php
//completed-deal.php
include "header-user.php";

echo $_SESSION['u_name'];
echo $_SESSION['u_id'];
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
                    <th>Product Received / Not</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Qty</th>
                    <th class='text-center'>Total Amount</th>
                  </tr>
                </thead>
                <tbody>
<?php
// get winner table information

// get deal table information 
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
        $sql3 = "SELECT * FROM winner WHERE user_id = $winner_id";
        $run_sql3 = mysqli_query($conn, $sql3);
          if(mysqli_num_rows($run_sql3) > 0){
            $winner_data = mysqli_fetch_assoc($run_sql3);
            $w_id = $winner_data['w_id'];
            $user_confirm = $winner_data['user_confirm'];
            $link= "../product-received-successfully.php?wid=".$w_id;
              if($user_confirm == 1){
                $confirm_btn = "<td class='text-center'><a href='$link' class='btn btn-success btn-sm'>Click to Confirm<br>You Received Product</a></td>";
              }else{
                $confirm_btn = "<td class='text-center text-success'>Product Received</td>";             
              }
          }else{
            $confirm_btn = "<td></td>";
          }
      }else{
        $msg = "<p class='text-danger'>You Loss!</p>";
        $confirm_btn = "<td></td>";
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
        $confirm_btn
        <td class='text-center'><u>$msg</u></td>
        <td class='text-center'><u>".CountQty($conn,$u_id,$deal_ids)."</u></td>
        <td class='text-center'><u>".sumAmount($conn,$u_id,$deal_ids)."</u></td>
      </tr>";
      echo $out_put;

  }

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
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.<a href="../" target="_blank">Ananas.com.co</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Baaz Designer <i class="ti-heart text-danger ml-1"></i></span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
<?php
include "footer-user.php";
?>

