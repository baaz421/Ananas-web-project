<?php
include 'header.php';
$current_date_from_php =date('d-m-Y h:i A');
$current_date = date('Y-m-d H:i A',strtotime('+2 day',strtotime($current_date_from_php)));
$exp_date = explode(" ",$current_date);
?>
<div class="content-inner">


  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Categories</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Coupon's</li>
    </ul>
    <?php 
  //   echo"<pre>";
		// print_r($exp_date);
		// echo"</pre>";
     ?>
  </div>

  <!-- Forms Section-->
	<section class="forms"> 
		<div class="container-fluid">
			<!-- MODAL  edit START HERE-->
			
				
					<div class="modal " id="modal">
					  <div class="modal-dialog modal-dialog-centered">
					    <div class="modal-content">
					       <div class="card-header d-flex align-items-center">
					          <h3 class="h4">Add new Coupon</h3>
					        </div>
					        <div class="card-body">
					          <form class="form-inline">
					          </form>
					        </div>

					    </div>
					  </div>
					</div>									      
				
			
			<!-- MODAL edit CLOSE HERE-->

			<!-- ERROR MESSAGE DIV-->
			<div id="error-message"> </div>
			<div id="success-message"></div>
			<!-- ERROR MESSAGE DIV CLOSE-->

		  <div class="row">
		    <!-- Inline Form-->
		    <div class="col-lg-12">                           
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
		          <h3 class="h4">Add new Categories</h3>
		        </div>
		        <div class="card-body">
		          <form class="form-inline col-lg-12" id="addform">
		            <div class="form-group col-lg-3">
		              <input id="cou-code" type="text" placeholder="Coupon code" class="mb-2 form-control w-100">
		            </div>
		            <div class="form-group col-lg-3">
		              <input id="cou-per" type="number" placeholder="Coupon Percentage" class="mb-2 form-control w-100">
		            </div>
		            <div class="form-group col-lg-3">
		              <input type="date" class="mb-2 form-control w-100" id="cou-expire" min="<?php echo $exp_date[0]; ?>">
		            </div>		            
		            <div class="form-group col-lg-2">
		              <button type="submit" class="mb-2 btn btn-success w-100 " id="save-button">Submit</button>
		            </div>
		          </form>
		        </div>
		      </div>
		    </div>
		    <div class="form-group w-100">
          <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Search</span></div>
            <input type="text" id="search_val" class="form-control" autocomplete="off" >
          </div>
        </div>
		     <!-- categories table data -->
		    <div class="col-lg-12">
		      <div class="card">
		        <div class="card-close">
		          <div class="dropdown">
		            <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
		            <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
		          </div>
		        </div>
		        <div class="card-header d-flex align-items-center">
		        	<h3 class="h4">View all	Coupons</h3>
		        </div>
		        <div class="card-body" id="table-data">
		          <!-- ajax categories data table load here -->
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</section>

</div>



</div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
	// load table data
	function loadTable(page){
		$.ajax({
			url : "coupons-ajax-files/ajax-load.php",
			type : "POST",
			data : {page_no:page},
			success : function(data){
				$("#table-data").html(data); 
			}
		});
		}
	loadTable();

	//pagination
	$(document).on("click","#pagination a",function(e){
		e.preventDefault();
		var page_id =$(this).attr("id");
		//console.log(page_id);
		loadTable(page_id);
	});

	// insert data
	$("#save-button").on("click",function(e){
		e.preventDefault();
		var cou_code 		=	$("#cou-code").val();
		var cou_per 		=	$("#cou-per").val();
		var cou_expire 	= $("#cou-expire").val();
		if(cou_code == "" || cou_per == ""){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>All fields are required .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
			$("#success-message").slideUp();
		}else{
				$.ajax({
				url : "coupons-ajax-files/ajax-insert.php",
				type : "POST",
				data : {coupon_code:cou_code,coupon_per:cou_per,coupon_expiry:cou_expire},
				success : function(data){
					if(data == 1){
						loadTable();
						$("#addform").trigger("reset"); 
						$("#success-message ").html("<div class='alert alert-dismissible fade show alert-success' role='alert'>Coupon Added successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
						$("#error-message").slideUp();
					}else{
						
						$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Can't Add record....!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
						$("#success-message").slideUp();
					}
					
				}

			});
		}
		

		});


	//show modal box
	$(document).on("click", "#eid", function(){
		$("#modal").show();
		var cou_id = $(this).data("eid");

			$.ajax({
				url : "coupons-ajax-files/ajax-load-update.php",
				type : "POST",
				data : {id:cou_id},
				success : function(data){
					$("#modal form").html(data); 

				}

			});

		});

	//close modal  box
	$(document).on("click", "#close-button", function(){
		$("#modal").hide();
		});

	//update categories 
	$(document).on("click", "#change-button", function(e){
		var cou_u_id 			= $("#cou-u-id").val();
		var cou_u_code 		= $("#cou-u-code").val();
		var cou_u_per 		= $("#cou-u-per").val();
		var cou_u_expire 	= $("#cou-u-expire").val();
			$.ajax({
				 url : "coupons-ajax-files/ajax-update.php",
				 type : "POST",
				 data : {id_cou:cou_u_id,code_cou:cou_u_code,per_cou:cou_u_per,expire_cou:cou_u_expire},
				 success : function(data){
				 	if(data == 1){
				 		$("#modal").hide();
				 		loadTable();
				 	}
				 }
			});
			e.preventDefault();
		});

	//live search
	$("#search_val").on("keyup",function(){
		var search_term = $(this).val();
		if(search_term == ""){
			$("#search_val").trigger("reset"); 
			loadTable();
		}else{
			//alert(search_term, "Hello, world!");
			$.ajax({
				url : "coupons-ajax-files/ajax-live-search.php",
				type : "POST",
				data :  {search:search_term},
				success : function(data){
					$("#table-data").html(data);
				}

			});
		}	

		});

	//active deactive
	$(document).on("click", "#status-button", function(){

		var sta_id = $(this).data("sid");
		var sta_element = this;
			$.ajax({
				url : "coupons-ajax-files/ajax-status-update.php",
				type : "POST",
				data : {statusId:sta_id},
				success : function(data){
					if(data == 1){
						var cp = $("#cpage").val();
						loadTable(cp);
					}else{
						$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Can't able to active this category..!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
						$("#success-message").slideUp();
					}
				}
			});

		});

	
});


    </script>




  </body>
</html>
