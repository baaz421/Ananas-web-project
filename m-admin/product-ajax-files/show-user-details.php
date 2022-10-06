<?php
//show-user-details.php

$user_edit_id = $_POST["id"];
include "../db_connnection.php";
$sql ="SELECT * FROM users WHERE id = {$user_edit_id}" ;
$result =mysqli_query($conn,$sql) or die("Query failed..!");
$output = "";
if(mysqli_num_rows($result)>0){

      while ($row = mysqli_fetch_assoc($result)) {
        $output.="  <div class='form-group col-lg-12'>
        			  	<input id='user_id_edit' type='text' value='{$row["id"]}' class='mb-2 form-control w-100' hidden>
        			  	<label>Name</label>
		              	<input id='user_name_edit' type='text' value='{$row["name"]}' class='mb-2 form-control w-100' readonly >
		            </div>
		            <div class='form-group col-lg-6 '>
		            	<label>Country Code</label>
		             	<input id='user_c_code_edit' type='number' value='{$row["countrycode"]}' class='mb-2 form-control w-100' readonly>
		            </div>
		            <div class='form-group col-lg-6 '>
		            	<label>Mobile Number</label>
		              	<input id='user_mobile_edit' type='number' value='{$row["mobile"]}' class='mb-2 form-control w-100' readonly>
		            </div>
		            <div class='form-group col-lg-12'>
        			  	<label>Email</label>
		              	<input id='user_email_edit' type='email' value='{$row["email"]}' class='mb-2 form-control w-100' readonly>
		            </div>
		            <div class='form-group col-lg-12'>
		              <button type='button' class='mb-2 btn btn-secondary w-100 ' id='close-button'>Close</button>
		            </div>";
      }
        
  
	mysqli_close($conn);
	echo $output;   

}else{

	echo "<h3> Records not found ....</h3>
				<div class='form-group col-lg-6'>
          <button type='button' class='mb-2 btn btn-secondary w-100 ' id='close-button'>Close</button>
        </div>";

}