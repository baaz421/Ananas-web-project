<?php 
//load-orange-deal-setting.php
require_once "../db_connnection.php";

// orange zone get deal setting
$sql_get_data_1 = "SELECT * FROM deal_setting where ID = 8";
$run_sql_get_data_1 = mysqli_query($conn, $sql_get_data_1);
$get_data_1 = mysqli_fetch_assoc($run_sql_get_data_1);

// orange zone variable data
$o_p = $get_data_1['d_percentage'];
$o_t = $get_data_1['d_time'];
$o_m = $get_data_1['d_method'];
$o_id = 8;


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
		          <h3 class="h4">Orange Zone Method for Admin</h3>
		        </div>

		        <div class="card-body">
		          <form class="form-inline col-lg-12" id="orange-form">
		            <div class="form-group col-lg-3">
		              <small class="form-group-text" >Percentage</small>
		              <input id="o-p" type="number" placeholder="Percentage" value='.$o_p.' class="mb-2 form-control w-100">
		            </div>
		            <div class="form-group col-lg-3">
		              <small class="form-group-text" >days</small>
		              <input id="o-t" type="number" placeholder="days" value='.$o_t.' class="mb-2 form-control w-100">
		              <input type="text" id="o-id" value="'.$o_id.'" name="" hidden>
		            </div>
		            <div class="form-group col-lg-3">
		              <small class="form-group-text" >Method</small>
		              <select id="o-m" class="form-control w-100 mb-2">';
		              
		              		if($o_m == "t"){
		              			$o_selected = "selected";
		              		}else{
		              			$o_selected = "";
		              		}
		              	

                      	$output.='<option value="p"'.$o_selected.' >Percentage</option>
                      	<option value="t" '.$o_selected.' >Date/Time</option>
                      </select>
		            </div>
		            <div class="form-group col-lg-3">
		            	<small class="form-group-text" >&nbsp</small>
		              <button type="submit" class="mb-2 btn btn-primary w-100 " id="o_update">Update</button>
		            </div>
		          </form>
		        </div>

		      </div>
		    </div>';
 echo $output;
?>