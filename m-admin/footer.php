<?php

$uri = $_SERVER['REQUEST_URI'];
$ex_link = explode("/", $uri);
$file_directry ="product-ajax-files";

if(in_array($file_directry,$ex_link)){
  $file_back= "../";
}else{
  $file_back= "";
}

?>
</div>
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo $file_back; ?>vendor/jquery/jquery.js"></script>
    <script src="<?php echo $file_back; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $file_back; ?>vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo $file_back; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $file_back; ?>vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo $file_back; ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo $file_back; ?>vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo $file_back; ?>js/charts-home.js"></script>
    <script src="<?php echo $file_back; ?>js/dropzone.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <!-- Main File-->
    <script src="<?php echo $file_back; ?>js/front.js"></script>
    
  </body>
</html>