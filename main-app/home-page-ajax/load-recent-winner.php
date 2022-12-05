<?php
// load-recent-winner.php
require "../db_connnection.php";
?>
<div class="widget widget-products">
    <h4 class="widget-title"><span> Recent Winners </span></h4><!-- End .widget-title -->

    <div class="products">
        <?php
        $get_date = strtotime($date);
        $compare_date = date("Y-m-d");
        // $sql_get_deal_data = "SELECT date_format(str_to_date(update_time, '%d-%m-%Y %H:%i'), '%d-%m-%Y %H:%i') as EndDate, winner_id, unit_price FROM deal WHERE winner_id != '' AND update_time <= DATE_SUB( '{$date}', INTERVAL 2 MONTH ) ORDER BY STR_TO_DATE(update_time, '%d-%m-%Y %H:%i') DESC ";

        // $sql_get_deal_data = "SELECT date_format(str_to_date(update_time, '%d-%m-%Y %H:%i'), '%d-%m-%Y %H:%i') as EndDate, winner_id, unit_price FROM deal WHERE winner_id != '' ORDER BY STR_TO_DATE(update_time, '%d-%m-%Y %H:%i') DESC";

        $sql_get_deal_data = "SELECT * FROM deal WHERE winner_id != '' ORDER BY STR_TO_DATE(update_time, '%d-%m-%Y %H:%i') DESC LIMIT 6"; 
        $run_sql_get_deal_data = mysqli_query($conn,$sql_get_deal_data);
        $s = mysqli_fetch_assoc($run_sql_get_deal_data);

        if($run_sql_get_deal_data){
        	while($row = mysqli_fetch_assoc($run_sql_get_deal_data)){
                $product_id     = $row['p_id'];
                $sql_get_product_details = "SELECT * FROM products WHERE ID = $product_id ";
                $run_sql_get_product_details = mysqli_query($conn, $sql_get_product_details);
                $get_pro = mysqli_fetch_assoc($run_sql_get_product_details);

        		// $winner_date 	= $row['EndDate'];
        		$winner_date 	= $row['update_time'];
        		$convert_date 	= strtotime($winner_date);
                // $img_name       = "product-1.jpg";
        		$img_name 		= $get_pro['image_0'];
		        $pro_link 		= "product-view.php?p_id=".$product_id;
		        $code 			= date("Ymd",$convert_date);
		        $user_info 		= "User-ID -".$code.$row['winner_id'];
		        $unit_price 	= $row['unit_price'].".00";		        
		        $closing_time 	= date("jS \of F Y",$convert_date);
		        echo winner_small_product_show($img_name,$pro_link,$user_info,$unit_price,$closing_time);
        	}
        }else{
        	// if data not found
        	echo "<h5>Sorry, No winner announced.</h5>";
        }

        
        ?>
    </div><!-- End .products -->
</div><!-- End .widget widget-products -->



<?php
function winner_small_product_show($img_name,$pro_link,$user_info,$unit_price,$closing_time){
    // $img_src = "assets/images/demos/demo-14/products/small/".$img_name;
	$img_src = "../All-Products-images/".$img_name;
	$show = "
	<div class='product product-sm'>
        <figure class='product-media'>
            <a href='{$pro_link}'>
                <img src='{$img_src}' alt='Product image' class='product-image'>
            </a>
        </figure>
        <div class='product-body'>
            <h5 class='product-title'><a href='{$pro_link}'>{$user_info}</a></h5>
            <div class='product-price'>{$unit_price}</div>
            <div class='product-price'>{$closing_time}</div>
        </div>
    </div>
	";
	return $show;
}
?>