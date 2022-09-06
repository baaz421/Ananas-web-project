<?php
$title = "Products";
include 'header.php';
?>

<!-- =============================body starts ===================================-->
<div class="col-lg-12">
  <!-- =================  add product modal starts ====================--->
    <div>
      <!-- <a href="product-ajax-files/add-new-product-img.php"><button type="button" class="btn btn-info shadow mb-3 mt-3 rounded">+ ADD NEW PRODUCT</button></a> -->
      <a href="product-ajax-files/create-new-product-id.php"><button type="button" class="btn btn-info shadow mb-3 mt-3 rounded">+ ADD NEW PRODUCT</button></a>
    </div>
  <!-- =================  add product modal close ====================--->

  <!-- =================  add product view in table starts ====================--->
    <div class="card col-lg-10">
       <!-- ERROR MESSAGE DIV-->
                <div id="error-message"> </div>
                <div id="success-message"></div>
              <!-- ERROR MESSAGE DIV CLOSE-->
      <div class="card-close">
        <div class="dropdown">
          <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
          <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a></div>
        </div>
      </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">All Products<span class="badge badge-secondary"></span></h3>
      </div>
      <div class="card-body" id="table-data">
        <!-- ajax categories data table load here -->
      </div>
    </div>
  <!-- =================  add product view in table close ====================--->
</div>
<!-- =============================body close ===================================-->

</div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/dropzone.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
  // load table data
    function loadTable(page){
      $.ajax({
        url : "product-ajax-files/load-products.php",
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

  // delete data
    $(document).on("click", "#del", function(){
      if(confirm("Do you real want to delete this Product.?")){ 
         var product_id = $(this).data("id");
         var element = this;
         $.ajax({
          url : "product-ajax-files/product-delete.php",
          type : "POST",
          data :{p_id : product_id},
          success :function(data){
            if(data == 1){
              $(element).closest("tr").fadeOut();
              loadTable();
            }else{
            $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Can't delete record....!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
              $("#success-message").slideUp();

            }

          }
         });
        }

      });

  //show modal box
    // $(document).on("click", "#eid", function(){
    //   $("#modal").show();
    //   var cat_id = $(this).data("eid");

    //     $.ajax({
    //       url : "ajax-load-update.php",
    //       type : "POST",
    //       data : {id:cat_id},
    //       success : function(data){
    //         $("#modal form").html(data); 

    //       }

    //     });

    //   });

  //close modal  box
    // $(document).on("click", "#close-button", function(){
    //   $("#modal").hide();
    //   });

  //update categories 
    // $(document).on("click", "#change-button", function(){
    //   var cat_edit_id = $("#cat_id_edit").val();
    //   var cat_edit_english = $("#cat_english_edit").val();
    //   var cat_edit_arabic = $("#cat_arabic_edit").val();
    //     $.ajax({
    //        url : "ajax-update.php",
    //        type : "POST",
    //        data : {id_cat:cat_edit_id,english_cat:cat_edit_english,arabic_cat:cat_edit_arabic},
    //        success : function(data){
    //         if(data == 1){
    //           $("#modal").hide();
    //           loadTable();
    //         }
    //        }
    //     });

    //   });

  //live search
    // $("#search_val").on("keyup",function(){
    //   var search_term = $(this).val();
    //   //alert(search_term, "Hello, world!");
    //     $.ajax({
    //       url : "ajax-live-search.php",
    //       type : "POST",
    //       data :  {search:search_term},
    //       success : function(data){
    //         $("#table-data").html(data);
    //       }

    //     });

    //   });

  //active deactive
    $(document).on("click", "#status-button", function(){

      var sta_id = $(this).data("sid");
      var sta_element = this;
        $.ajax({
          url : "product-ajax-files/product-status-update.php",
          type : "POST",
          data : {statusId:sta_id},
          success : function(data){
            if(data == 1){
              loadTable();
            }else{
              $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Can't able to active this category..!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
              $("#success-message").slideUp();
            }
          }
        });

      });


    
  //deal cancel
    $(document).on("click", "#deal-cancel", function(){
      if(confirm("Do you real want to cancel the DEAL.?")){
      var pro_id_deal = $(this).data("dcid");
      var sta_element = this;
        $.ajax({
          url : "product-ajax-files/deal-cancel.php",
          type : "POST",
          data : {deal_pro_Id:pro_id_deal},
          success : function(data){
            if(data == 1){
              loadTable();
            }else if(data == 2){
              $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Sorry, Can't able to cancel the Deal, Because its not running in red zone<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
              $("#success-message").slideUp();
            }else{
               $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Sorry, Can't able to cancel the Deal..! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
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






















 