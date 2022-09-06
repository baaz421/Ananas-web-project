<?php
include "../db_connnection.php";
$search_val = $_POST["search"];
//$search_val = "إلكترونيات";

$sql ="SELECT * FROM users WHERE 
name LIKE '%{$search_val}%' OR 
email LIKE '%{$search_val}%' OR 
country LIKE '%{$search_val}%' OR 
countrycode LIKE '%{$search_val}%' OR 
mobile LIKE '%{$search_val}%' ORDER BY id DESC";
//echo $sql;
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
		              $serial_num =@$offset + 1;
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
	mysqli_close($conn);
	echo $output;   

}else{

	echo "<h3> Records not found ....</h3>";

}


 ?>