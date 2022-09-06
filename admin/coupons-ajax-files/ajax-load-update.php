<?php 

require "../db_connnection.php";

$cou_id = $_POST["id"];
$sql ="SELECT * FROM coupons WHERE coupon_id = {$cou_id}" ;
$result =mysqli_query($conn,$sql) or die("Query failed..!");
$output = "";
if(mysqli_num_rows($result)>0){

      while ($row = mysqli_fetch_assoc($result)) {
      	

        $output.="<div class='form-group col-lg-6'>
        			  <input id='cou-u-id' type='text' value='{$row["coupon_id"]}' class='mb-2 form-control w-100' hidden>
        			  	<small class='form-group-text' >Coupon Code</small>
		              <input id='cou-u-code' type='text' value='{$row["coupon_code"]}' class='mb-2 form-control w-100'>
		            </div>
		            <div class='form-group col-lg-6 '>
        			  	<small class='form-group-text' >Coupon Percentage</small>		            	
		              <input id='cou-u-per' type='number' value='{$row["coupon_percentage"]}' class='mb-2 form-control w-100'>
		            </div>
		            <div class='form-group col-lg-12 '>
        			  	<small class='form-group-text' >Coupon Expiry Date</small>		            	
		              <input type='date' class='mb-2 form-control w-100' id='cou-u-expire' min='' value='{$row["expire_date"]}'>
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