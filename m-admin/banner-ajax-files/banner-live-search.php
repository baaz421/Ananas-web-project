<?php
//all-country-admins/admins-live-search.php
include "../db_connnection.php";
$search_val = $_POST["search"];
//$search_val = "إلكترونيات";

$sql ="SELECT * FROM admin WHERE 
a_fullname LIKE '%{$search_val}%' OR 
a_email LIKE '%{$search_val}%' OR 
a_country LIKE '%{$search_val}%' OR 
a_phonecode LIKE '%{$search_val}%' OR 
a_phone LIKE '%{$search_val}%' ORDER BY AID DESC";
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
		              	if($row['a_status'] == 1){
		              		$status = "Active";
		              		$color = "success";
		              	}else{
		              		$status = "Block";
		              		$color =  "warning";
		              	}
		              	// condition for verification of user
		              	if($row['a_vcode'] == 0){
		              		$v_status = "Verified";
		              		$v_color = "success";
		              	}else{
		              		$v_status = "Notverified";
		              		$v_color =  "warning";
		              	}
		              	

    	$output .="<tr>
			        <th scope='row'>{$serial_num}</th>
			        <td>{$row["a_fullname"]}</td>
			        <td>{$row["a_email"]}</td>
			        <td>{$row["a_country"]}</td>
			        <td>+{$row["a_phonecode"]}-{$row["a_phone"]}</td>
			        <td>{$row["a_createtime"]}</td>
			        <td>{$row["a_vcode"]}</td>
			        <td><button type='button' class='btn btn-sm btn-info' data-eid='{$row["AID"]}' id='eid'>Edit</button></td>
			        <td ><button type='button' class='btn btn-sm btn-$color' data-sid ='{$row["AID"]}' id='status-button' >$status</button></td>
					<td><button type='button' class='btn btn-sm btn-$v_color' data-vid='{$row["AID"]}' id='verify-button' >$v_status</button></td>
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