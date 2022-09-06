<?php

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

$sql ="SELECT * FROM users ORDER BY id DESC LIMIT {$offset},{$limit_per_page}";
$result =mysqli_query($conn,$sql) or die("Query failed..!");
$output = "";
if(mysqli_num_rows($result)>0){
	 $output = '<div class="table-responsive">   
		            <table class="table table-striped table-sm">
		              <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Name</th>
		                  <th>Email</th>
		                  <th>Country</th>
		                  <th>Mobile</th>
		                  <th>Date</th>
		                  <th>Verification code</th>
		                  <th>Edit</th>
		                  <th>Status</th>
		                  <th>Verified or not</th>
		                </tr>
		              </thead>
		              <tbody>';
		              $serial_num =$offset + 1;
		              while ($row = mysqli_fetch_assoc($result)) {
		              	// condition for status of user
		              	if($row['u_status'] == 1){
		              		$status = "Active";
		              		$color = "success";
		              	}else{
		              		$status = "Block";
		              		$color =  "warning";
		              	}
		              	// condition for verification of user
		              	if($row['vcode'] == 0){
		              		$v_status = "Verified";
		              		$v_color = "success";
		              	}else{
		              		$v_status = "Notverified";
		              		$v_color =  "warning";
		              	}
		              	

    	$output .="<tr>
					        <th scope='row'>{$serial_num}</th>
					        <td>{$row["name"]}</td>
					        <td>{$row["email"]}</td>
					        <td>{$row["country"]}</td>
					        <td>+{$row["countrycode"]}-{$row["mobile"]}</td>
					        <td>{$row["createtime"]}</td>
					        <td>{$row["vcode"]}</td>
					        <td><button type='button' class='btn btn-sm btn-info' data-eid='{$row["id"]}' id='eid'>Edit</button></td>
					        <td ><button type='button' class='btn btn-sm btn-$color' data-sid ='{$row["id"]}' id='status-button' >$status</button></td>
									<td><button type='button' class='btn btn-sm btn-$v_color' data-vid='{$row["id"]}' id='verify-button' >$v_status</button></td>
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
    				$sql ="SELECT * FROM users";
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

?>