<?php

require "../db_connnection.php";
$limit_per_page = 5;
$page ="";
if(isset($_POST["page_no"])){
	$page = $_POST["page_no"];
}else{
	$page =1;
}

$offset =($page - 1)*$limit_per_page;

$sql ="SELECT m_admin.a_username AS m_name, m_admin.a_country AS m_country, users.name, users.country, deal.a_id, admin.a_username, admin.a_country, deal.winner_id, deal.DID, deal.create_time, deal.update_time FROM deal LEFT JOIN admin ON deal.a_id = admin.AID INNER JOIN users ON deal.winner_id = users.id LEFT JOIN m_admin ON deal.a_id = m_admin.AID ORDER BY deal.DID DESC LIMIT {$offset},{$limit_per_page}";

// $sql ="SELECT * FROM coupons ORDER BY coupon_id DESC LIMIT {$offset},{$limit_per_page}";
$result =mysqli_query($conn,$sql) or die("Query failed..!");

// this for pagination
$total_records = mysqli_num_rows($result);
$total_page = ceil($total_records/$limit_per_page);
// pagination end for sql


$output = "";

if(mysqli_num_rows($result)>0){
	 $output = '<div class="table-responsive">   
		            <table class="table table-striped table-sm">
		              <thead>
		                <tr>
		                  <th>Deal ID</th>
		                  <th>User&rsquo;s</th>
		                  <th>Vendor&rsquo;s</th>
		                  <th>Deal Start</th>
		                  <th>Deal End</th>
		                  <th>Vendor status</th>
		                  <th>User status</th>
		                </tr>
		              </thead>
		              <tbody>';
		              while ($row = mysqli_fetch_assoc($result)) {
		              	$output .="<tr>
		                  <th scope='row'>{$row["DID"]}</th>
		                  <td>
		                  	<span class='text-uppercase font-weight-normal' style='letter-spacing:0; display: block'>{$row["name"]}</span>
		                  	<small class ='text-muted'>{$row["country"]}</small>
		                  </td>";
		                  if($row["m_name"] == "" && $row["m_country"] == ""){
		                  	$vendor_name = $row["a_username"];
		                  	$vendor_country = $row["a_country"];
		                  }else{
		                  	$vendor_name = $row["m_name"]." (M)";
		                  	$vendor_country = $row["m_country"];
		                  }
		                  $output .="
		                  <td>
		                  <span class='text-uppercase font-weight-normal' style='letter-spacing:0; display: block'>{$vendor_name}</span>
		                  	<small class ='text-muted'>{$vendor_country}</small>
		                  </td>
		                  <td>{$row["create_time"]}</td>
		                  <td>{$row["update_time"]}</td>
		                  <td >
		                  	<button type='button' class='btn btn-sm btn-warning' id='status-button' Disabled>Pending<span class='badge'></span>
		                  	</button>
		                  </td>
		                  <td >
		                  	<button type='button' class='btn btn-sm btn-warning' id='status-button' Disabled>Pending<span class='badge'></span>
		                  	</button>
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