<?php
// product-delivery.php
include 'header.php';
?>
<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Product Delivery Status</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Product Delivery</li>
    </ul>
  </div>
  <!-- Forms Section-->
  	<div class="col-lg-12 mt-3">
		</div>
		<div class="container-fluid mt-3">
			<div class="row">
		    <!-- Search Field -->
	    	<div class="col-lg-12 mb-2">
	        <div class="input-group">
	        	<div class="input-group-prepend"><span class="input-group-text">Search</span></div>
	          <input type="text" id="search_val" class="form-control" autocomplete="off" >
	        </div>
      	</div>
		     <!-- product delivery table data -->
		    <div class="col-lg-12">
		      <div class="card">
		        <div class="card-close">
		          <div class="dropdown">
		            <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
		            <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a></div>
		          </div>
		        </div>
		        <div class="card-header d-flex align-items-center">
		        	<h3 class="h6">Sort</h3>
		        	<ul class="nav nav-pills card-header-pills ml-2">
					      <li class="nav-item">
					        <a class="nav-link" href="#">Both Confirm</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="#">Both Pending</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="#">User Pending</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="#">Vender Pending</a>
					      </li>
					    </ul>
		        </div>
		        <div class="card-body" id="table-data">
		          <!-- ajax categories data table load here -->
		        </div>
		      </div>
		    </div>
		  </div>
		</div>

</div>



</div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <!-- Main File-->
    <script src="js/front.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// load table data
		function loadTable(page){
			$.ajax({
				url : "product-delivery-ajax/ajax-load.php",
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

		//live search
		$("#search_val").on("keyup",function(){
			var search_term = $(this).val();
			if(search_term == ""){
				$("#search_val").trigger("reset"); 
				loadTable();
			}else{
				$.ajax({
					url : "product-delivery-ajax/ajax-live-search.php",
					type : "POST",
					data :  {search:search_term},
					success : function(data){
						$("#table-data").html(data);
					}

				});
			}	

			});
		
	});
</script>




  </body>
</html>
