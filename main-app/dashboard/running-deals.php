<?php
// running-deals.php
include "header-user.php";
$get_deal_info = "SELECT * FROM checkout WHERE user_id = $u_id AND status = 1";
$run_get_deal_info = mysqli_query($conn,$get_deal_info);
?>

<!-- main-panel start -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Striped Table</h4>
            <p class="card-description">
              Add class <code>.table-striped</code>
            </p>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Progress</th>
                    <th>Unit & Qty</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
<?php
if(mysqli_num_rows($run_get_deal_info) > 0){
while($deal_data = mysqli_fetch_assoc($run_get_deal_info)){
$deal_ids = $deal_data['deal_ids'];
$deal_qtys = $deal_data['deal_qtys'];
$percentage = $deal_data['coupon_per'];
$deal_explode = explode("-",$deal_ids);
$qtys_explode = explode("-",$deal_qtys);
$combine_deals_qtys = array_combine($deal_explode, $qtys_explode);
foreach ($combine_deals_qtys as $d_id => $d_qty) {
	// getting data from deal table
	$con_deal_table = "SELECT * FROM deal WHERE DID = $d_id";
	$run_con_deal_table = mysqli_query($conn, $con_deal_table);
	$fetch_deal = mysqli_fetch_assoc($run_con_deal_table);
	$pro_id = $fetch_deal['p_id'];
	$unit_price = $fetch_deal['unit_price'];

	// getting data from product table
	$con_product_table = "SELECT * FROM products WHERE ID = $pro_id";
	$run_con_product_table = mysqli_query($conn, $con_product_table);
	$fetch_product = mysqli_fetch_assoc($run_con_product_table);
	$pro_image = $fetch_product['image_0'];
	$pro_name = $fetch_product['product_name'];

	// calculate unit price if percentage give
	$update_unit_price = cal_unit_price_with_percentage($unit_price,$percentage);
	$total_unit_price = $update_unit_price*$d_qty;
$out_put ="
  <tr>
    <td class='py-1'>
      <img src='../../All-Products-images/".$pro_image."' alt='image'/>
    </td>
    <td>
    	<a href='../product-view.php?p_id=$pro_id' target='_blank' class='text-dark'>$pro_name</a>
	</td>
    <td class='text-center'>".zoneProgress($d_id,$conn,$date)."</td>
    <td>
      <p><u>$update_unit_price.00</u> X $d_qty </p>
      <p>Total: $total_unit_price.00</p>
    </td>
    <td>
      <button type='submit' class= 'btn btn-primary mb-2' id= 'cancel-deal'>Cancel</button>
    </td>
  </tr>";
  echo $out_put;
 }
}
}else{
	echo "<tr><td><h3>No records found .....</h3>
	<p>To make a deal click here. <a href='../' >Deal now.</a></p></td></tr>";
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
