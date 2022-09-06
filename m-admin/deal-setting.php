<?php
//deal-setting.php
?>

<?php
include 'header.php';

?>
<div class="content-inner">

  	<!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Deal Setting</h2>
    </div>
  </header>
  	<!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Deal Setting</li>
    </ul>
  </div>

  <!-- Forms Section-->
	<section class="forms"> 
		<div class="container-fluid">
			<!-- ERROR MESSAGE DIV-->
			<div id="error-message"> </div>
			<div id="success-message"></div>
			<!-- ERROR MESSAGE DIV CLOSE-->

		  <div class="row" id="load-orange">
		    <!-- Inline Form-->
		    
		  </div>

		    <div class="row" id="load-green">
		    <!-- Inline Form-->
		    
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
  // load fileds for deal setting
  function loadOrangeDealFileds(){
	$.ajax({
		url : "deals-ajax-files/load-orange-deal-setting.php",
		success : function(data){
			$("#load-orange").html(data); 
		}
	});
	}
loadOrangeDealFileds();

  // load fileds for deal setting
  function loadGreenDealFileds(){
	$.ajax({
		url : "deals-ajax-files/load-green-deal-setting.php",
		success : function(data){
			$("#load-green").html(data); 
		}
	});
	}
loadGreenDealFileds();


  // update orange data 
  $(document).on("click", "#o_update", function(o){
	// $("#o_update").on("click",function(o){
		o.preventDefault();
		var o_p 	=$("#o-p").val();
		var o_t 	=$("#o-t").val();
		var o_id 	= $("#o-id").val();
		var o_m 	= $("#o-m").val();
		if(o_p == "" || o_t == ""){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>All fields are required please don't leave blank .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
			$("#success-message").slideUp();
			setTimeout(function() {$("#error-message").fadeOut("slow")}, 3000);
		}else{
				$.ajax({
				url : "deals-ajax-files/ajax-deal-setting.php",
				type : "POST",
				data : {o_p:o_p,o_t:o_t,o_id:o_id,o_m:o_m},
				success : function(data){
					if(data == 1){
						loadOrangeDealFileds();						
						$("#success-message ").html("<div class='alert alert-dismissible fade show alert-success' role='alert'>Orange zone Deal Setting updated.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
						$("#error-message").slideUp();
						setTimeout(function() {$("#success-message").fadeOut("slow")}, 3000);
					}else{
						
						$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>"+data+"Can't update Orange zone record....!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
						$("#success-message").slideUp();
						setTimeout(function() {$("#error-message").fadeOut("slow")}, 3000);
					}
					
				}

			});
		}
	});

  // update green data
  $(document).on("click", "#g_update", function(g){
	//$("#g_update").on("click",function(g){
		g.preventDefault();
		var g_p 	=$("#g-p").val();
		var g_t 	=$("#g-t").val();		
		var g_id 	= $("#g-id").val();
		var g_m 	= $("#g-m").val();
		if(g_p == "" || g_t == ""){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>All fields are required please don't leave blank .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
			$("#success-message").slideUp();
			setTimeout(function() {$("#error-message").fadeOut("slow")}, 3000);
		}else{
				$.ajax({
				url : "deals-ajax-files/ajax-deal-setting.php",
				type : "POST",
				data : {g_p:g_p,g_t:g_t,g_id:g_id,g_m:g_m},
				success : function(data){
					if(data == 1){	
						loadGreenDealFileds();					
						$("#success-message ").html("<div class='alert alert-dismissible fade show alert-success' role='alert'>Green zone Deal setting Updated.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
						$("#error-message").slideUp();
						setTimeout(function() {$("#success-message").fadeOut("slow")}, 3000);
					}else{
						
						$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>"+data+"Can't Update Green zone record....!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
						$("#success-message").slideUp();
						setTimeout(function() {$("#error-message").fadeOut("slow")}, 3000);
					}
					
				}

			});
		}
		

	});







	
});


    </script>




  </body>
</html>





















