<?php 

$cat_id = $_POST["id"];
require "../db_connnection.php";
$sql ="SELECT * FROM categories WHERE ID = {$cat_id}" ;
$result =mysqli_query($conn,$sql) or die("Query failed..!");
$output = "";
if(mysqli_num_rows($result)>0){

      while ($row = mysqli_fetch_assoc($result)) {
      	if($row['status'] == 1){
      		$status = "Active";
      		$color = "success";
      	}else{
      		$status = "Disable";
      		$color =  "danger";
      	}

        $output.="<div class='form-group col-lg-6'>
        			  <input id='cat_id_edit' type='text' value='{$row["ID"]}' class='mb-2 form-control w-100' hidden>
		              <input id='cat_english_edit' type='text' value='{$row["cat_name"]}' class='mb-2 form-control w-100'>
		            </div>
		            <div class='form-group col-lg-6 '>
		              <input id='cat_arabic_edit' type='text' value='{$row["cat_name_arabic"]}' class='mb-2 form-control w-100'>
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