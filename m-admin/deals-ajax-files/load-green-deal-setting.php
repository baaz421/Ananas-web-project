<?php 
//load-green-deal-setting.php
require_once "../db_connnection.php";

// green zone get deal setting
$sql_get_data_2 = "SELECT * FROM deal_setting where ID = 9";
$run_sql_get_data_2 = mysqli_query($conn, $sql_get_data_2);
$get_data_2 = mysqli_fetch_assoc($run_sql_get_data_2);

// green zone variable data
$g_p = $get_data_2['d_percentage'];
$g_t = $get_data_2['d_time'];
$g_m = $get_data_2['d_method'];
$g_id = 9;


$output = '<div class="col-lg-12"> 
		      <div class="card">

		        <div class="card-close">
		          <div class="dropdown">
		            <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
		            <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
		            	<a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>
		            </div>
		          </div>
		        </div>

		        <div class="card-header d-flex align-items-center">
		          <h3 class="h4">Green Zone Method for Admin</h3>
		        </div>

		        <div class="card-body">
		          <form class="form-inline col-lg-12" id="green-form">
		            <div class="form-group col-lg-3">
		              <small class="form-group-text" >Percentage</small>
		              <input id="g-p" type="number" placeholder="Percentage" value='.$g_p.' class="mb-2 form-control w-100">
		            </div>
		            <div class="form-group col-lg-3">
		              <small class="form-group-text" >days</small>
		              <input id="g-t" type="number" placeholder="days" value='.$g_t.' class="mb-2 form-control w-100">
		              <input type="text" id="g-id" value="'.$g_id.'" name="" hidden>
		            </div>
		            <div class="form-group col-lg-3">
		              <small class="form-group-text" >Method</small>
		              <select id="g-m" class="form-control w-100 mb-2">';
		              
		              		if($g_m == "t"){
		              			$g_selected = "selected";
		              		}else{
		              			$g_selected = "";
		              		}
		              	

                      	$output.='<option value="p"'.$g_selected.' >Percentage</option>
                      	<option value="t" '.$g_selected.' >Date/Time</option>
                      </select>
		            </div>
		            <div class="form-group col-lg-3">
		            	<small class="form-group-text" >&nbsp</small>
		              <button type="submit" class="mb-2 btn btn-primary w-100 " id="g_update">Update</button>
		            </div>
		          </form>
		        </div>

		      </div>
		    </div>';
 echo $output;
?>