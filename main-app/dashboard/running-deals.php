<?php
// running-deals.php
include "header-user.php";
$get_deal_info = "SELECT * FROM participators WHERE user_id = $u_id AND status = 1";
$run_get_deal_info = mysqli_query($conn,$get_deal_info);

// $a=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"red");
// $dxx = array_unique($a);
// print_r($dxx);
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
              <a href="../productsvall.php">Join More Deals</a>
            </p>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Deal ID</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th class="text-center">Progress</th>
                    <th class="text-right">Unit Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(mysqli_num_rows($run_get_deal_info) > 0){
                    while($deal_data = mysqli_fetch_assoc($run_get_deal_info)){
                      $deal_ids = $deal_data['deal_id'];
                      $u_price_for_p = $deal_data['unit_price'];
                      $unit_percent = $deal_data['unit_percent'];

	                     // getting data from deal table
                      $con_deal_table = "SELECT * FROM deal WHERE DID = $deal_ids";
                      $run_con_deal_table = mysqli_query($conn, $con_deal_table);
                      $fetch_deal = mysqli_fetch_assoc($run_con_deal_table);
                      $pro_id = $fetch_deal['p_id'];
                      $u_price_for_d = $fetch_deal['unit_price'];
                      $deal_id = $fetch_deal['DID'];

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
                        <span class='text-success'>$unit_percent% Dis: -$unit_discount_amount.00</span><br class='mb-1'>
                        <span class='font-weight-bold border-bottom border-top border-dark'>$u_price_for_p</span>
                        ";
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
                      <td class='text-center '>".zoneProgress($deal_ids,$conn,$date)."</td>
                      <td class='text-right '>
                      $unit_price
                      </td>
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
 </div>
<!-- main-panel ends -->
<?php
include "footer-user.php";
?>
