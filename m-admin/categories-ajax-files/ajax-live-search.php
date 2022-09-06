<?php

$search_val = $_POST["search"];
//$search_val = "إلكترونيات";

require "../db_connnection.php";
$sql ="SELECT * FROM categories WHERE cat_name LIKE '%{$search_val}%' OR cat_name_arabic LIKE '%{$search_val}%'";
//echo $sql;
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
	mysqli_close($conn);
	echo $output;   

}else{

	echo "<h3> Records not found ....</h3>";

}


 ?>