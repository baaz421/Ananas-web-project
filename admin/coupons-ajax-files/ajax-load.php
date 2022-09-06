<?php
session_start();
require "../db_connnection.php";
$admin_id = $_SESSION['a_id'];
$limit_per_page = 5;
$page ="";
if(isset($_POST["page_no"])){
	$page = $_POST["page_no"];
}else{
	$page =1;
}

$offset =($page - 1)*$limit_per_page;

$sql ="SELECT * FROM coupons WHERE admin_id = '{$admin_id}' ORDER BY coupon_id DESC LIMIT {$offset},{$limit_per_page}";
$result =mysqli_query($conn,$sql) or die("Query failed..!");

// this for pagination
$sql2 ="SELECT * FROM coupons WHERE admin_id = '{$admin_id}'";
$result2 =mysqli_query($conn,$sql) or die("Query failed..!");
$total_records = mysqli_num_rows($result2);
$total_page = ceil($total_records/$limit_per_page);
// pagination end for sql


$output = "";

if(mysqli_num_rows($result)>0){
	 $output = '<div class="table-responsive">   
		            <table class="table table-striped table-sm">
		              <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Coupon Code</th>
		                  <th>Percentage</th>
		                  <th>Created</th>
		                  <th>Expired</th>
		                  <th>Status</th>
		                  <th>Edit</th>
		                </tr>
		              </thead>
		              <tbody>';
		              while ($row = mysqli_fetch_assoc($result)) {
		              	if($row['coupon_status'] == 1){
		              		$status = "Active";
		              		$color = "success";
		              	}else{
		              		$status = "Disable";
		              		$color =  "warning";
		              	}
		              	// check for expiry date
		              	$expire_date = $row['expire_date'];
		              	$current_date = date('d-m-Y',strtotime($date));
						$expired_date = date('d-m-Y',strtotime($expire_date." +1 days"));
						if (strtotime($expired_date) <= strtotime($current_date)){
						    $status = "Expired";
		              		$color =  "danger";
		              		$disabled = "Disabled";   
						}else{
							$disabled = "";
						}

		              	$output .="<tr>
		                  <th scope='row'>{$row["coupon_id"]}</th>
		                  <td>{$row["coupon_code"]}</td>
		                  <td>{$row["coupon_percentage"]}</td>
		                  <td>{$row["created_date"]}</td>
		                  <td>{$row["expire_date"]}</td>
		                  <td ><button type='button' class='btn btn-sm btn-$color' data-sid ='{$row["coupon_id"]}' id='status-button' {$disabled}>$status<span class='badge'></span></button></td>
		                  <td>
		                  	<button type='button' class='btn btn-sm btn-info' data-eid='{$row["coupon_id"]}' id='eid'>Edit</button>
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


?>