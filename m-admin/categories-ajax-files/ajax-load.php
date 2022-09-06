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

$sql ="SELECT * FROM categories ORDER BY ID DESC LIMIT {$offset},{$limit_per_page}";
$result =mysqli_query($conn,$sql) or die("Query failed..!");
$output = "";
if(mysqli_num_rows($result)>0){
	 $output = '<div class="table-responsive">   
		            <table class="table table-striped table-sm">
		              <thead>
		                <tr>
		                  <th>#</th>
		                  <th>English</th>
		                  <th>Arabic</th>
		                  <th>Status</th>
		                  <th>Edit</th>
		                </tr>
		              </thead>
		              <tbody>';
		              while ($row = mysqli_fetch_assoc($result)) {
		              	if($row['status'] == 1){
		              		$status = "Active";
		              		$color = "success";
		              	}else{
		              		$status = "Disable";
		              		$color =  "warning";
		              	}
		              	$output .="<tr>
		                  <th scope='row'>{$row["ID"]}</th>
		                  <td>{$row["cat_name"]}</td>
		                  <td>{$row["cat_name_arabic"]}</td>
		                  <td ><button type='button' class='btn btn-sm btn-$color' data-sid ='{$row["ID"]}' id='status-button' >$status<span class='badge'></span></button></td>
		                  <td>
		                  	<button type='button' class='btn btn-sm btn-info' data-eid='{$row["ID"]}' id='eid'>Edit</button>
							<button type='button' class='btn btn-sm btn-danger' data-id='{$row["ID"]}' id='del' >Delete</button>
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
	    				$sql ="SELECT * FROM categories";
						$result =mysqli_query($conn,$sql) or die("Query failed..!");
						$total_records = mysqli_num_rows($result);
						$total_page = ceil($total_records/$limit_per_page);

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


$output.= "Total-records = $total_records | Total-page =  $total_page | Limit-per-page =  $limit_per_page | Offset =  $offset | Page-no = $page<br>";
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