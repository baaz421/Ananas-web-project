<?php
//all-country-admins/load-admins-data.php
session_start();
include "../db_connnection.php";
$a_id = $_SESSION['ma_id'];

$limit_per_page = 10;
$page ="";
if(isset($_POST["page_no"])){
	$page = $_POST["page_no"];
}else{
	$page =1;
}

$offset =($page - 1)*$limit_per_page;

$sql ="SELECT * FROM banners ORDER BY b_id DESC LIMIT {$offset},{$limit_per_page}";
$result =mysqli_query($conn,$sql) or die("Query failed..!");
$output = "";
if(mysqli_num_rows($result)>0){
	 $output = '<div class="table-responsive">   
		            <table class="table table-striped table-sm">
		              <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Destop</th>
		                  <th>Mobile</th>		                  
		                  <th colspan = "2" >Title / Country / Created Date</th>
		                  <th>Product</th>
		                  <th>Edit</th>
		                  <th>Status</th>
		                </tr>
		              </thead>
		              <tbody>';
		              $serial_num =$offset + 1;
		              while ($row = mysqli_fetch_assoc($result)) {
		              	// condition for status of user
		              	if($row['b_status'] == 1){
		              		$status = "Active";
		              		$color = "success";
		              	}else{
		              		$status = "Disable";
		              		$color =  "warning";
		              	}
		              	$b_count =$row["b_country"];
		              	$countryname = getCountryName($b_count, $conn);

    	$output .="<tr>
					        <th scope='row'>{$serial_num}</th>
					        <td><img src='banner-ajax-files/banner-images/{$row["des_img"]}' class='rounded img-thumbnail' width='100px'></td>
					        <td><img src='banner-ajax-files/banner-images/{$row["mob_img"]}' class='rounded img-thumbnail' width='55px'></td>					        
					        <td colspan ='2'>
					        	<span class='text-dark text-bold'>{$row['b_title']}</span><br>({$countryname}) {$row["create_date"]}
					        </td>
					        
					        <td><a href='product-ajax-files/edit-product.php?pid={$row["b_link"]}'><button type='button' class='btn btn-sm btn-info'>View</button></a></td>
					        <td><a href='banner-edit.php?b_id={$row["b_id"]}'><button type='button' class='btn btn-sm btn-info'>Edit</button></a></td>
					        <td ><button type='button' class='btn btn-sm btn-$color' data-sid ='{$row["b_id"]}' id='status-button' >$status</button></td>
					      </tr>";
$serial_num ++;
		              }
		                
		          $output .=" </tbody> </table> </div>";
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
    				$sql ="SELECT * FROM admin";
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
   
   $next = $page +1;
   if($total_page == $next-1){
   		$disable_next_id = "disabled";
	}else{
		$disable_next_id = "";
	}


   $output .=" <li class='page-item $disable_next_id'>
      <a class='page-link' id='$next' href=''>Next</a>
    </li>
  </ul>
</nav>";
	mysqli_close($conn);
	echo $output;   

}else{

	echo "<h3> Records not found ....</h3>";

}

function getCountryName($id, $conn){
	$sql ="SELECT * FROM countries WHERE id = $id";
	$run = mysqli_query($conn, $sql);
	$fetch = mysqli_fetch_assoc($run);
	$c_name = $fetch['name'];
	return $c_name;
}

?>