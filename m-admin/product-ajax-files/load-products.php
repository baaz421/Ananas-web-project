<?php
session_start();
include "../db_connnection.php";
$a_id = $_SESSION['ma_id'];

// $sql_select_country = "SELECT a_country FROM admin WHERE AID = {$a_id}";
// $run_select_country = mysqli_query($conn,$sql_select_country);
// $admin_country = mysqli_fetch_assoc($run_select_country);



$limit_per_page = 7;
$page ="";

if(isset($_POST["page_no"])){
	$page = $_POST["page_no"];
}else{
	$page =1;
}

$offset =($page - 1)*$limit_per_page;

$sql ="SELECT * FROM products ORDER BY ID DESC LIMIT {$offset},{$limit_per_page}";
$result =mysqli_query($conn,$sql) or die("Query failed..!");
$output = "";
if(mysqli_num_rows($result)>0){
	 $output = '<div class="table-responsive">   
		            <table class="table table-striped table-sm">
		              <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Image</th>
		                  <th>Product Name</th>
		                  <th>Category</th>
		                  <th>Deals</th>
		                  <th>Status</th>
		                  <th>Edit</th>
		                </tr>
		              </thead>
		              <tbody>';
		              while ($row = mysqli_fetch_assoc($result)) {
		              	if($row['adding'] == null){
		              	if($row['p_status'] == 1){
		              		$status = "Active";
		              		$color = "success";
		              	}else{
		              		$status = "Disable";
		              		$color =  "warning";
		              	}
		              	$check_pro_deal = "SELECT * FROM deal WHERE p_id ='{$row['ID']}'";
						$run_check_pro_deal = mysqli_query($conn, $check_pro_deal);
						if(mysqli_num_rows($run_check_pro_deal) > 0){
							$border = "";
						}else{
							$border = " border-success ";
						}

		              	$output .="<tr>
		                  <th scope='row'>{$row["ID"]}</th>
		                  <td><img src='../All-Products-images/{$row["image_0"]}' class='rounded {$border}    img-thumbnail' width='50px' height='50px' ></td>
		                  <td>{$row["product_name"]}</td>";
		                  $sql_cat = "SELECT * FROM categories WHERE ID = {$row["category_id"]}";
		                  $cat_result = mysqli_query($conn, $sql_cat);
		                  @$fetch_data = mysqli_fetch_assoc($cat_result);


		                  $output .="<td>{$fetch_data["cat_name"]}</td>";

		                  if($row["p_status"] == 0 || $row["deal_check"] > 0){
		                  	
		                  	$a_styel = "style='pointer-events: none;cursor: default'";
		                  	$b_dis = "disabled";	
		                  	
		                  }else{
		                  	$a_styel = "";
		                  	$b_dis = "";
		                  }

		                  if($row["deal_check"] == 1){
		                  	$sql_deal_zone = "SELECT * FROM deal WHERE p_id = {$row['ID']} AND deal_status = 1";
		                  	$deal_zone_res = mysqli_query($conn, $sql_deal_zone);
		                  	$get_zone = mysqli_fetch_assoc($deal_zone_res);
		                  	$deal_id = $get_zone['DID'];
		                  	if($get_zone['zone'] == "red"){
		                  		$color_circle ="red";
		                  	}elseif($get_zone['zone'] == "orange"){
		                  		$color_circle = "orange";
		                  	}elseif($get_zone['zone'] == "green"){
		                  		$color_circle ="green";
		                  	}else{
		                  		$color_circle ="black";
		                  	}
		                  	$s_d_ = "disabled";
		                  	$deal_text = "Running";
		                  	$spinner = "<button class='btn btn-outline-info mb-2 pb-0 pt-1 pr-2 pl-2' ><i class='fa fa-refresh fa-spin' style='color:{$color_circle}'></i></button>";
		                  	if($get_zone['zone'] == "red"){
		                  		$deal_cancel_button = "<button type='button' class='btn btn-sm btn-primary mb-2' data-dcid='{$deal_id}' id='deal-cancel' >Cancel</button>";
		                  	}else{
		                  		$deal_cancel_button = "";
		                  	}
		                  	
		                  }else{
		                  	$s_d_ = "";
		                  	$deal_text = "Deal";
		                  	$spinner = "";
		                  	$deal_cancel_button = "";
		                  }
		                  $view_button = "<a href='product-ajax-files/view-deals.php?pid={$row["ID"]}'>
		                  				<button type='button' class='btn btn-sm btn-primary mb-2' >View</button>
		                  				</a>";

		                  $output .="
		                  <td>
		                  	$view_button
		                  	$deal_cancel_button
		               
		                  	$spinner		                  	
		                  </td>

		                  <td>
		                  	<button type='button' class='btn btn-sm btn-$color mb-2' data-sid ='{$row["ID"]}' id='status-button' $s_d_ >
		                  	$status<span class='badge'></span>
		                  	</button>
		                  </td>
		                  <td>
		                  	<button type='button' class='btn btn-sm btn-info mb-2' $s_d_><a class='text-white' href='product-ajax-files/edit-product.php?pid={$row["ID"]}' $a_styel >Edit</a></button>
						 					</td>
		                </tr>";
		            	}
		              }

		                
		          $output .=" </tbody> </table> </div>";
# pagination code here  

// previous page 	          
$previous=$page - 1;
if($previous == 0){
	$disable_pre_id = "disabled";
 }else{
	$disable_pre_id = "";
}

$output .="<nav aria-label='Page navigation example' id='pagination'>
				<ul class='pagination justify-content-center'>
					<li class='page-item $disable_pre_id '>
						<a class='page-link' id='$previous' href='' tabindex='-1' aria-disabled='true'>Previous</a>
					</li>";

					$sql ="SELECT * FROM products";
					$result =mysqli_query($conn,$sql) or die("Query failed..!");
					$total_records = mysqli_num_rows($result);
					$total_page = ceil($total_records/$limit_per_page);

					for ($i=1; $i <=$total_page ; $i++) { 
					if($i == $page){
					$class_name = "active";
					}else{
					$class_name = "";
					}
		$output .="<li class='page-item $class_name'><a id='{$i}'class='page-link' href=''>{$i}</a></li>";
					}				

					// next page 
					$next = $page +1;
					if($total_page == $next-1){
						$disable_next_id = "disabled";
					 }else{
						$disable_next_id = "";
					}


		$output .="<li class='page-item $disable_next_id'>
						<a class='page-link' id='$next' href=''>Next</a>
					</li>
				</ul>
			</nav>";


mysqli_close($conn);
echo $output;   

}else{

	echo "<h3> Records not found ....</h3>";

}
/* deal button code*/
// <a href='deals.php?pid={$row["ID"]}' $a_styel>
// <button class='btn btn-sm btn-primary mb-2' data-did='{$row["ID"]}' id='{$row["ID"]}' $b_dis >$deal_text</button></a>

?>