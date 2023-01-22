<?php
include 'header.php';
?>
<div class="content-inner">


  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">All Users Details</h2>
    </div>
  </header>
  <!-- Forms Section-->
	<section class="forms"> 
		<div class="container-fluid">
			<!-- MODAL  edit START HERE-->
			
				
					<div class="modal " id="modal">
					  <div class="modal-dialog modal-dialog-centered">
					    <div class="modal-content">
					       <div class="card-header d-flex align-items-center">
					          <h3 class="h4">Add new Categories</h3>
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
		        	<h3 class="h4">View all Users</h3>
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
				url : "users-ajax-files/load-user-data.php",
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
			loadTable(page_id);
		});

	//show modal box
		$(document).on("click", "#eid", function(){
			$("#modal").show();
			var cat_id = $(this).data("eid");

				$.ajax({
					url : "users-ajax-files/user-load-edit-data.php",
					type : "POST",
					data : {id:cat_id},
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
		$(document).on("click", "#change-button", function(){
			var user_edit_id = $("#user_id_edit").val();
			var user_edit_name = $("#user_name_edit").val();
			var user_edit_c_code = $("#user_c_code_edit").val();
			var user_edit_mobile = $("#user_mobile_edit").val();
			var user_edit_email = $("#user_email_edit").val();
				$.ajax({
					 url : "users-ajax-files/user-edit-data.php",
					 type : "POST",
					 data : {id_user:user_edit_id,name_user:user_edit_name,c_code_user:user_edit_c_code,mobile_user:user_edit_mobile,email_user:user_edit_email},
					 success : function(data){
					 	if(data == 1){
					 		$("#modal").hide();
					 		loadTable();
					 	}
					 }
				});

			});

	//live search
		$("#search_val").on("keyup",function(){
			var search_term = $(this).val();
			//alert(search_term, "Hello, world!");
				$.ajax({
					url : "users-ajax-files/user-live-search.php",
					type : "POST",
					data :  {search:search_term},
					success : function(data){
						$("#table-data").html(data);
					}

				});

			});

	//active deactive status 
		$(document).on("click", "#status-button", function(){
			if(confirm("Do you real want to Block Or Unblock this User? ")){
			var sta_id = $(this).data("sid");
				$.ajax({
					url : "users-ajax-files/user-status-update.php",
					type : "POST",
					data : {statusId:sta_id},
					success : function(data){
						if(data == 1){
							loadTable();
						}else{
							$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Can't able to Block this user..!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
							$("#success-message").slideUp();
						}
					}
				});
			}

		});

	//verified or not verified 
	$(document).on("click", "#verify-button", function(){
		if(confirm("Do you real want to verify this User Mobile Number? NOTE:- Once you Verify this user you cannot unverified ")){
		var verfiy_id = $(this).data("vid");
			$.ajax({
				url : "users-ajax-files/user-verify-update.php",
				type : "POST",
				data : {verifyId:verfiy_id},
				success : function(data){
					if(data == 1){
						loadTable();
					}else{
						$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>User Mobile Already Verified !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
						$("#success-message").slideUp();
					}
				}
			});
		}

		});
	
});


    </script>




  </body>
</html>





















