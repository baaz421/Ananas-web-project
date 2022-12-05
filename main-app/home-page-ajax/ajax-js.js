// ajax-js.js
$(document).ready(function(){
  'use strict';
  console.log("ajax-js-files-showing");

  // load Green zone products
    function load_winner_details(){
      $.ajax({
        url: "home-page-ajax/load-recent-winner.php",
          success:function(data){
            $("#winner-details").html(data);
          }
      });
    }
  load_winner_details();

});