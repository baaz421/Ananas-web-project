<?php
//all-country-admins/load-admins-edit-options.php
$user_edit_id = $_POST["id"];
include "../db_connnection.php";
$sql ="SELECT * FROM admin WHERE AID = {$user_edit_id}" ;
$result =mysqli_query($conn,$sql) or die("Query failed..!");
$output = "";
if(mysqli_num_rows($result)>0){

      while ($row = mysqli_fetch_assoc($result)) {
        $output.="  <div class='form-group col-lg-12'>
        			  	<input id='user_id_edit' type='text' value='{$row["AID"]}' class='mb-2 form-control w-100' hidden>
        			  	<label>Name</label>
		              	<input id='user_name_edit' type='text' value='{$row["a_fullname"]}' class='mb-2 form-control w-100'>
		            </div>
		            <div class='form-group col-lg-6 '>
		            	<label>Country Code</label>
		             	<input id='user_c_code_edit' type='number' value='{$row["a_phonecode"]}' class='mb-2 form-control w-100'>
		            </div>
		            <div class='form-group col-lg-6 '>
		            	<label>Mobile Number</label>
		              	<input id='user_mobile_edit' type='number' value='{$row["a_phone"]}' class='mb-2 form-control w-100'>
		            </div>
		            <div class='form-group col-lg-12'>
        			  	<label>Email</label>
		              	<input id='user_email_edit' type='email' value='{$row["a_email"]}' class='mb-2 form-control w-100'>
		            </div>
		            <div class='form-group col-lg-6'>
		              <button type='submit' class='mb-2 btn btn-warning w-100 ' id='change-button'>save changes</button>
		            </div>
		            <div class='form-group col-lg-6'>
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

?>