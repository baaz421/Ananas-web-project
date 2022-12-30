<?php
//cancelled-deals.php
include "header-user.php";
$get_deal_info = "SELECT * FROM participators WHERE user_id = $u_id AND status =2";
$run_get_deal_info = mysqli_query($conn,$get_deal_info);
?>

<!-- main-panel start -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Your Running Deals</h4>
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
                    <th class="text-center">Progress</th>
                    <th class="text-right">Refunded<br>Unit Price</th>
                  </tr>
                </thead>
                <tbody>
<?php
if(mysqli_num_rows($run_get_deal_info) > 0){
  $deal = "";
while($deal_data = mysqli_fetch_assoc($run_get_deal_info)){
  $deal_ids = $deal_data['deal_id'];
  if($deal<>$deal_data['deal_id']){

$u_price_for_p = $deal_data['unit_price'];

	// getting data from deal table
	$con_deal_table = "SELECT * FROM deal WHERE DID = $deal_ids";
	$run_con_deal_table = mysqli_query($conn, $con_deal_table);
	$fetch_deal = mysqli_fetch_assoc($run_con_deal_table);
	$pro_id = $fetch_deal['p_id'];
	$u_price_for_d = $fetch_deal['unit_price'];
	$deal_id = $fetch_deal['DID'];
	$winner_id = $fetch_deal['winner_id'];

	// getting data from product table
	$con_product_table = "SELECT * FROM products WHERE ID = $pro_id";
	$run_con_product_table = mysqli_query($conn, $con_product_table);
	$fetch_product = mysqli_fetch_assoc($run_con_product_table);
	$pro_image = $fetch_product['image_0'];
	$pro_name = $fetch_product['product_name'];

  // comparing unit price for discounted or not
  if($u_price_for_p == $u_price_for_d){
    $unit_price = "<p><u>$u_price_for_p</u></p>";
  }else{
    $unit_discount_amount = $u_price_for_d - $u_price_for_p;
    $unit_price = "
                  <span>{$u_price_for_d}</span><br>
                  <span class='text-success'>Dis: -$unit_discount_amount</span><br class='mb-1'>
                  <span class='font-weight-bold border-bottom border-top border-dark'>$u_price_for_p</span>
                  ";
  }

  if($deal_data['status'] == 0 ){
  	$status = "<span class='text-success'>Completed</span>";
  }else if($deal_data['status'] == 2){
  	$status = "<span class='text-danger'>Cancelled</span>";
  }else{
  	$status = zoneProgress($deal_ids,$conn,$date);
  }

$out_put ="
  <tr>
    <td>2022$deal_id</td>
    <td class='py-1'>
      <img src='../../All-Products-images/".$pro_image."' alt='image'/>
    </td>
    <td>
    	<a href='../product-view.php?p_id=$pro_id' target='_blank' class='text-dark'>$pro_name</a>
	</td>
    <td class='text-center '>".$status."</td>
    <td class='text-right '>
      $unit_price
    </td>
  </tr>";
  echo $out_put;
 // }
}
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