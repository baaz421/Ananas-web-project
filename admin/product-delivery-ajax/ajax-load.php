<?php
session_start();
require "../db_connnection.php";
$limit_per_page = 5;
$page ="";
if(isset($_POST["page_no"])){
	$page = $_POST["page_no"];
}else{
	$page =1;
}
$country = $_SESSION['a_country'];
$admin_id = $_SESSION['a_id'];

$offset =($page - 1)*$limit_per_page;

// $sql ="SELECT m_admin.a_username AS m_name, m_admin.a_country AS m_country, users.name, users.country, deal.a_id, admin.a_country, deal.winner_id, deal.DID, deal.create_time, deal.update_time, deal.e_value, deal.unit_price, deal.p_id FROM deal LEFT JOIN admin ON deal.a_id = admin.AID INNER JOIN users ON deal.winner_id = users.id LEFT JOIN m_admin ON deal.a_id = m_admin.AID WHERE deal.d_country= '$country' ORDER BY deal.DID DESC LIMIT {$offset},{$limit_per_page}";

$sql = "SELECT * FROM winner WHERE admin_id = $admin_id";
// $sql ="SELECT * FROM coupons ORDER BY coupon_id DESC LIMIT {$offset},{$limit_per_page}";
$result =mysqli_query($conn,$sql) or die("Query failed..!");

// this for pagination
$total_records = mysqli_num_rows($result);
$total_page = ceil($total_records/$limit_per_page);
// pagination end for sql


$output = "";

if(mysqli_num_rows($result)>0){
 	$output = '
 	<div class="table-responsive">   
	  <table class="table table-striped table-sm">
	    <thead>
	      <tr>
	        <th>Deal ID</th>
	        <th>Product</th>
	        <th>User&rsquo;s</th>
	        <th>Amount</th>
	        <th>Deal Start</th>
	        <th>Deal End</th>
	        <th>Vendor status</th>
	        <th>User status</th>
	      </tr>
	    </thead>
	    <tbody>';
	    while ($row = mysqli_fetch_assoc($result)) {
	    	// winner table information
	    	$winner_id			= $row['w_id'];
	    	$deal_id 				= $row['deal_id'];
	    	$user_id 				= $row['user_id'];	    	
	    	$start_date 		= $row['start_date'];
	    	$end_date 			= $row['end_date'];
	    	$user_confirm 	= $row['user_confirm'];
	    	$vendor_confirm = $row['vendor_confirm'];	    	
	    	$user_confirm_date =$row['user_confirm_date'];
	    	$vendor_confirm_date =$row['vendor_confirm_date'];

	    	// deal table information
	    	
	    	$deal_data 		= mysqli_fetch_assoc(GetDealData($conn, $deal_id));
	    	$pro_id 			= $deal_data['p_id'];
	    	$expect				= $deal_data['e_value'];
	    	$unit_price 	= $deal_data['unit_price'];

	    	// product table information
	    	
	    	$get_pro_data = mysqli_fetch_assoc(GetProductData($conn, $pro_id));
		    $pro_img_name = $get_pro_data['image_0'];
		    $pro_img_path = "../All-Products-images/";
		    $pro_image    = $pro_img_path.$pro_img_name;
		    $host 				= $_SERVER['HTTP_HOST'];
    		$portal 			= $_SERVER['REQUEST_SCHEME'];
		    if($host != "http"){
		    	$link= $portal."://".$host."/molla/admin/product-ajax-files/edit-product.php?pid=".$pro_id;
		    }else{
		    	$link= $portal."://".$host."/admin/product-ajax-files/edit-product.php?pid=".$pro_id;
		    }

		    // user table information		    
	    	$user_data 		= mysqli_fetch_assoc(GetUserData($conn, $user_id));
	    	$user_name  	= $user_data['name'];
	    	$user_country	= $user_data['country'];

	    	// conditions for dispatch or deliverd
	    	if($vendor_confirm == 1){
	    		$vendor_confirm_button ="
	    		<button type='button' class='btn btn-sm btn-primary' id='dispatch' data-wid='{$winner_id}'>Dispatch<span class='badge'></span>
	        	</button>";
	    	}elseif ($vendor_confirm == 0) {
	    		$vendor_confirm_button ="
	    		<button type='button' class='btn btn-sm btn-success' Disabled>Delivered</button>
	    		<br><small class ='text-muted'>{$vendor_confirm_date}</small>";
	    	}

	    	// conditons for user confirm or not
	    	if($user_confirm == 1){
	    		$user_confirm_button ="
	    		<button type='button' class='btn btn-sm btn-warning' Disabled>Pending</button>";
	    	}elseif ($user_confirm == 0) {
	    		$user_confirm_button ="
	    		<button type='button' class='btn btn-sm btn-success' Disabled>Received</button>
	    		<br><small class ='text-muted'>{$user_confirm_date}</small>";
	    	}

	    	$output .="
	    	<tr>
	        <th scope='row'>{$deal_id}</th>
	        <td>
	        	<a href='{$link}'>
	        		<img src='{$pro_image}' class='rounded img-thumbnail' width='50px' height='50px'>
	        	</a
	        </td>
	        <td>
	        	<span class='text-uppercase font-weight-normal' style='letter-spacing:0; display: block'>{$user_name}</span>
	        	<small class ='text-muted'>{$user_country}</small>
	        </td>
	        <td>
	        	<span class='text-uppercase font-weight-normal' style='letter-spacing:0; display: block'>Expected: {$expect} USD</span>
	        	<small class ='text-muted'>Unit Price: {$unit_price} USD</small>
	        </td>
	        <td>{$start_date}</td>
	        <td>{$end_date}</td>
	        <td >
	        	{$vendor_confirm_button}
	        </td>
	        <td >
	        	{$user_confirm_button}
	        </td>
	      </tr>";
			}
	                
	$output .=" </tbody> </table> </div>";
	// ======================================
	$previous=$page - 1;
	if($previous == 0){
		$disable_pre_id = "disabled";
	}else{
		$disable_pre_id = "";
	}
				        
			          $output .="<nav aria-label='Page navigation example' id='pagination'>
	  <ul class='pagination pagination-sm justify-content-center'>
	    <li class='page-item $disable_pre_id '>
	      <a class='page-link' id='$previous' href='' tabindex='-1' aria-disabled='true'>Previous</a>
	    </li>";
	    				
						$start = 1;
						$end = $total_page;

						for ($i=$start; $i <=$end ; $i++) { 

							if($i == $page){
								$class_name = "active";
							}else{
								$class_name = "";
							}
							
							$output .="<li class='page-item $class_name'><a id='{$i}'class='page-link' href=''><input type='text' id='cpage' value='{$page}' hidden />{$i}</a></li>";
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


// get product data by its id
function GetProductData($conn, $pro_id){
  $sql = "SELECT * FROM products WHERE ID = $pro_id";
  $run = mysqli_query($conn, $sql);
  return $run;
}
// get deal data by it id
function GetDealData($conn, $deal_id){
    $sql = "SELECT * FROM deal WHERE DID = $deal_id";
    $run = mysqli_query($conn, $sql);
    return $run;
}
// get user data by it id
function GetUserData($conn, $user_id){
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $run = mysqli_query($conn, $sql);
    return $run;
}


// function custom_pagination($page, $totalpage, $link, $show)  //$link = '&page=%s' 
// 	{ 
// 	    //show page 
// 	if($totalpage == 0) 
// 	{ 
// 	return 'Page 0 of 0'; 
// 	} else { 
// 	    $nav_page = '<div class="navpage"><span class="current">Page '.$page.' of '.$totalpage.': </span>'; 
// 	    $limit_nav = 3; 
// 	    $start = ($page - $limit_nav <= 0) ? 1 : $page - $limit_nav; 
// 	    $end = $page + $limit_nav > $totalpage ? $totalpage : $page + $limit_nav; 
// 	    if($page + $limit_nav >= $totalpage && $totalpage > $limit_nav * 2){ 
// 	        $start = $totalpage - $limit_nav * 2; 
// 	    } 
// 	    if($start != 1){ //show first page 
// 	        $nav_page .= '<span class="item"><a href="'.sprintf($link, 1).'"> [1] </a></span>'; 
// 	    } 
// 	    if($start > 2){ //add ... 
// 	        $nav_page .= '<span class="current">...</span>'; 
// 	    } 
// 	    if($page > 5){ //add prev 
// 	        $nav_page .= '<span class="item"><a href="'.sprintf($link, $page-5).'">&laquo;</a></span>'; 
// 	    } 
// 	    for($i = $start; $i <= $end; $i++){ 
// 	        if($page == $i) 
// 	            $nav_page .= '<span class="current">'.$i.'</span>'; 
// 	        else 
// 	            $nav_page .= '<span class="item"><a href="'.sprintf($link, $i).'"> ['.$i.'] </a></span>'; 
// 	    } 
// 	    if($page + 3 < $totalpage){ //add next 
// 	        $nav_page .= '<span class="item"><a href="'.sprintf($link, $page+4).'">&raquo;</a></span>'; 
// 	    } 
// 	    if($end + 1 < $totalpage){ //add ... 
// 	        $nav_page .= '<span class="current">...</span>'; 
// 	    }     
// 	    if($end != $totalpage) //show last page 
// 	        $nav_page .= '<span class="item"><a href="'.sprintf($link, $totalpage).'"> ['.$totalpage.'] </a></span>'; 
// 	    $nav_page .= '</div>'; 
// 	    return $nav_page; 
// 	} 
// 	} 




// if(mysqli_num_rows($result)>0){
//  	$output = '
//  	<div class="table-responsive">   
// 	  <table class="table table-striped table-sm">
// 	    <thead>
// 	      <tr>
// 	        <th>Deal ID</th>
// 	        <th>Product</th>
// 	        <th>User&rsquo;s</th>
// 	        <th>Amount</th>
// 	        <th>Deal Start</th>
// 	        <th>Deal End</th>
// 	        <th>Vendor status</th>
// 	        <th>User status</th>
// 	      </tr>
// 	    </thead>
// 	    <tbody>';
// 	    while ($row = mysqli_fetch_assoc($result)) {
// 	    	$pro_id = $row['p_id'];
// 	    	$get_pro_data = mysqli_fetch_assoc(GetProductData($conn, $pro_id));
// 		    $pro_img_name = $get_pro_data['image_0'];
// 		    $pro_img_path = "../All-Products-images/";
// 		    $pro_image    = $pro_img_path.$pro_img_name;
// 		    $host 				= $_SERVER['HTTP_HOST'];
//     		$portal 			= $_SERVER['REQUEST_SCHEME'];
// 		    if($host != "http"){
// 		    	$link= $portal."://".$host."/molla/admin/product-ajax-files/edit-product.php?pid=".$pro_id;
// 		    }else{
// 		    	$link= $portal."://".$host."/admin/product-ajax-files/edit-product.php?pid=".$pro_id;
// 		    }

// 	    	$output .="
// 	    	<tr>
// 	        <th scope='row'>{$row["DID"]}</th>
// 	        <td>
// 	        	<a href='{$link}'>
// 	        		<img src='{$pro_image}' class='rounded img-thumbnail' width='50px' height='50px'>
// 	        	</a
// 	        </td>
// 	        <td>
// 	        	<span class='text-uppercase font-weight-normal' style='letter-spacing:0; display: block'>{$row["name"]}</span>
// 	        	<small class ='text-muted'>{$row["country"]}</small>
// 	        </td>
// 	        <td>
// 	        	<span class='text-uppercase font-weight-normal' style='letter-spacing:0; display: block'>Expected: {$row["e_value"]} USD</span>
// 	        	<small class ='text-muted'>Unit Price: {$row["unit_price"]} USD</small>
// 	        </td>
// 	        <td>{$row["create_time"]}</td>
// 	        <td>{$row["update_time"]}</td>
// 	        <td >
// 	        	<button type='button' class='btn btn-sm btn-warning' id='status-button' Disabled>Pending<span class='badge'></span>
// 	        	</button>
// 	        </td>
// 	        <td >
// 	        	<button type='button' class='btn btn-sm btn-warning' id='status-button' Disabled>Pending<span class='badge'></span>
// 	        	</button>
// 	        </td>
// 	      </tr>";
// 			}
	                
// 	$output .=" </tbody> </table> </div>";
// 	// ======================================
// 	$previous=$page - 1;
// 	if($previous == 0){
// 		$disable_pre_id = "disabled";
// 	}else{
// 		$disable_pre_id = "";
// 	}
				        
// 			          $output .="<nav aria-label='Page navigation example' id='pagination'>
// 	  <ul class='pagination pagination-sm justify-content-center'>
// 	    <li class='page-item $disable_pre_id '>
// 	      <a class='page-link' id='$previous' href='' tabindex='-1' aria-disabled='true'>Previous</a>
// 	    </li>";
	    				
// 						$start = 1;
// 						$end = $total_page;

// 						for ($i=$start; $i <=$end ; $i++) { 

// 							if($i == $page){
// 								$class_name = "active";
// 							}else{
// 								$class_name = "";
// 							}
							
// 							$output .="<li class='page-item $class_name'><a id='{$i}'class='page-link' href=''><input type='text' id='cpage' value='{$page}' hidden />{$i}</a></li>";
// 						}				
	   
// 	   $next = $page +1;
// 	   if($total_page == $next-1){
// 	   		$disable_next_id = "disabled";
// 		}else{
// 			$disable_next_id = "";
// 		}


// 	   $output .=" <li class='page-item $disable_next_id'>
// 	      <a class='page-link' id='$next' href=''>Next</a>
// 	    </li>
// 	  </ul>
// 	</nav>";


// 	mysqli_close($conn);
// 	echo $output;   

// }else{

// 	echo "<h3> Records not found ....</h3>";

// }

?>