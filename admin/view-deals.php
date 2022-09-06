<?php 
$p_id = $_GET['pid'];
// $p_id = 12;
include 'header.php';
include '../m-admin/deals-ajax-files/deals-functions.php';
?>
<div class="content-inner">
  <!-- Page Header-->
	<header class="page-header">
		<div class="container-fluid">
		  	<h2 class="no-margin-bottom">Categories</h2>
		</div>
	</header>
  <!-- Breadcrumb-->
	<div class="breadcrumb-holder container-fluid">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="products.php">Products</a></li>
			<li class="breadcrumb-item active">View Deals</li>
		</ul>
	</div>

  <!-- Forms Section-->
	<section class="forms"> 
		<div class="container-fluid">

		<!-- ERROR MESSAGE DIV-->
		<div id="error-message"> </div>
		<div id="success-message"></div>
		<!-- ERROR MESSAGE DIV CLOSE-->

			<div class="row">
				<div class="col-lg-12">
				  <div class="card">
				    <div class="card-close">
						<div class="dropdown">
						<button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
						<div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a></div>
						</div>
				    </div>
				    <div class="card-header d-flex align-items-center">
				      <h3 class="h4">Running Deals</h3>
				    </div>
				    <div class="card-body">
				    	<div class="table-responsive">
				    	<table class="table table-striped table-hover">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">#</th>
						      <th scope="col">Name</th>
						      <th scope="col">Market</th>
						      <th scope="col">Estimate</th>
						      <th scope="col">Unit</th>
						      <th scope="col">Zone</th>
						      <th scope="col">Create</th>
						      <th scope="col">Last Update</th>
						    </tr>
						  </thead>
						  <tbody>
<?php
$sql_running = "SELECT * FROM deal WHERE p_id = {$p_id}";
$running_res = mysqli_query($conn, $sql_running);
if(mysqli_num_rows($running_res) > 0){
	while($row_run = mysqli_fetch_assoc($running_res)){
		$sql_pro_run_view = "SELECT * FROM products WHERE ID = {$p_id}";
		$pro_run_view_res = mysqli_query($conn, $sql_pro_run_view);
		$fetch_pro = mysqli_fetch_assoc($pro_run_view_res);
		if($row_run['deal_status'] > 0 ){
		// echo "<br>".$row_run['p_id'];
		// echo "<br>".$row_run['zone'];
		// echo "<br>".$row_run['deal_status'];
		// echo "<br>".$row_run['m_value'];
		// echo "<br>".$row_run['e_value'];
		// echo "<br>".$row_run['unit_price'];
		// echo "<br>".$row_run['create_time'];
		// echo "<br>".$row_run['update_time'];
		// echo "<br>".$fetch_pro['image_0'];
		// echo "<br>".$fetch_pro['product_name'];
		$deal_id = $row_run['DID'];
		$date_create = date("d-m-Y h:i A",strtotime($row_run['create_time']));

		$output_running ="<tr>
							<th>{$row_run['p_id']}</th>
							<td><img src='../All-Products-images/{$fetch_pro['image_0']}' class='rounded img-thumbnail' width='50px' height='50px' ></td>
							<td>{$fetch_pro['product_name']}</td>
							<td>{$row_run['m_value']}</td>
							<td>{$row_run['e_value']}</td>
							<td>{$row_run['unit_price']}</td>
							<td>{$row_run['zone']}</td>
							<td>{$date_create}</td>
							<td>{$row_run['update_time']}</td>							
						  </tr>
						  <tr>
						  	<td colspan = '9'>
								".$progress = zoneProgress($deal_id,$conn,$date)."
							</td>
						  </tr>";
						  echo $output_running;

		}
				
	}
}else{
	echo "<tr><td colspan = '9'><h2> Records not found.</h2><p>Still no deal created.</p> <td></tr>";
}
?>
						  </tbody>
						</table>
					</div>
				    </div>
				  </div>
				</div>

				<div class="col-lg-12">
				  <div class="card">
				    <div class="card-close">
						<div class="dropdown">
						<button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
						<div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a></div>
						</div>
				    </div>
				    <div class="card-header d-flex align-items-center">
				      <h3 class="h4">Completed Deals</h3>
				    </div>
				    <div class="card-body">
				    	<div class="table-responsive">
				    	<table class="table table-striped table-hover">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">#</th>
						      <th scope="col">Name</th>
						      <th scope="col">Market</th>
						      <th scope="col">Estimate</th>
						      <th scope="col">Unit</th>
						      <th scope="col">Winner</th>
						      <th scope="col">Create</th>
						      <th scope="col">Deal Closed</th>
						    </tr>
						  </thead>
						  <tbody>
<?php
$sql_running = "SELECT * FROM deal WHERE p_id = {$p_id}";
$running_res = mysqli_query($conn, $sql_running);
if(mysqli_num_rows($running_res) > 0){
	while($row_run = mysqli_fetch_assoc($running_res)){
		$sql_pro_run_view = "SELECT * FROM products WHERE ID = {$p_id}";
		$pro_run_view_res = mysqli_query($conn, $sql_pro_run_view);
		$fetch_pro = mysqli_fetch_assoc($pro_run_view_res);
		if($row_run['zone'] == "completed" ){
		$date_create = date("d-m-Y h:i A",strtotime($row_run['create_time']));

		$output_running ="<tr>
							<th>{$row_run['p_id']}</th>
							<td><img src='../All-Products-images/{$fetch_pro['image_0']}' class='rounded img-thumbnail' width='50px' height='50px' ></td>
							<td>{$fetch_pro['product_name']}</td>
							<td>{$row_run['m_value']}</td>
							<td>{$row_run['e_value']}</td>
							<td>{$row_run['unit_price']}</td>
							<td>{$row_run['winner_id']}</td>
							<td>{$date_create}</td>
							<td>{$row_run['update_time']}</td>							
						  </tr>
						  <tr>
						  	<td colspan = '9'>
								<div class='progress'>
								  <div class='progress-bar progress-bar-striped progress-bar-animated bg-success' role='progressbar' style='width: 100%'> This Product Deal Completed</div>
								</div>
							</td>
						  </tr>";
						  echo $output_running;

		}
				
	}
}else{
	echo "<tr><td colspan = '9'><h2> Records not found.</h2><p>Still no deal created.</p> <td></tr>";
}
?>
						  </tbody>
						</table>
					</div>
				    </div>
				  </div>
				</div>

				<div class="col-lg-12">
				  <div class="card">
				    <div class="card-close">
						<div class="dropdown">
						<button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
						<div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a></div>
						</div>
				    </div>
				    <div class="card-header d-flex align-items-center">
				      <h3 class="h4">Cancel/Stop Deals</h3>
				    </div>
				    <div class="card-body">
				    	<div class="table-responsive">
				    	<table class="table table-striped table-hover">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">#</th>
						      <th scope="col">Name</th>
						      <th scope="col">Market</th>
						      <th scope="col">Estimate</th>
						      <th scope="col">Unit</th>
						      <th scope="col">Create</th>
						      <th scope="col">Deal Closed</th>
						    </tr>
						  </thead>
<?php
$sql_running = "SELECT * FROM deal WHERE p_id = {$p_id}";
$running_res = mysqli_query($conn, $sql_running);
if(mysqli_num_rows($running_res) > 0){
	while($row_run = mysqli_fetch_assoc($running_res)){
		$sql_pro_run_view = "SELECT * FROM products WHERE ID = {$p_id}";
		$pro_run_view_res = mysqli_query($conn, $sql_pro_run_view);
		$fetch_pro = mysqli_fetch_assoc($pro_run_view_res);
		if($row_run['deal_status'] == 0 ){
		$date_create = date("d-m-Y h:i A",strtotime($row_run['create_time']));

		$output_running ="<tr>
							<th>{$row_run['p_id']}</th>
							<td><img src='../All-Products-images/{$fetch_pro['image_0']}' class='rounded img-thumbnail' width='50px' height='50px' ></td>
							<td>{$fetch_pro['product_name']}</td>
							<td>{$row_run['m_value']}</td>
							<td>{$row_run['e_value']}</td>
							<td>{$row_run['unit_price']}</td>
							<td>{$date_create}</td>
							<td>{$row_run['update_time']}</td>							
						  </tr>";
						  echo $output_running;

		}
				
	}
}else{
	echo "<tr><td colspan = '9'><h2> Records not found.</h2><p>Still no deal created.</p> <td></tr>";
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
	</section>

</div>



</div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script type="text/javascript">

    </script>




  </body>
</html>





















