<?php
//products-functions.php
// $cur_rate = 1;

// all products view html code 
function LoadProducts($label,$p_id,$img_src,$p_cat,$p_name,$p_bar,$p_amt,$w_disable,$c_disable,$deal_id){
	$link =  "quickview.php?p_id=".$p_id;
return'
<div class="col-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2">
    <div class="product">
        <figure class="product-media">
        	'.$label.'
            <a href="product-view.php?p_id='.$p_id.'">
                <img src="'.$img_src.'" alt="Product image" class="product-image">
            </a>

            <div class="product-action-vertical">
                <a href="#" class="btn-product-icon btn-wishlist btn-expandable '.$w_disable.'" id="add-to-Wishlist" data-p_id="'.$p_id.'"><span>add to wishlist</span></a>
            </div>

            <div class="product-action action-icon-top">
                <a href="#" class="btn-product btn-cart '.$c_disable.'" id="add-to-cart" data-p_id="'.$p_id.'" data-d_id="'.$deal_id.'"></a>
                <a href="'.$link.'" class="btn-product btn-quickview" id="quickView" title="Quick view"></a>
            </div>
        </figure>

        <div class="product-body">
            <div class="product-cat">
                <a href="#">'.$p_cat.'</a>
            </div>
            
            <h3 class="product-title"><a href="product-view.php?p_id='.$p_id.'">'.$p_name.'</a></h3>
            <div class="product-price">
                '.$p_amt.'
            </div>
           '.$p_bar.'
        </div>
    </div>
</div>';
}

// get categories name 
function GetCatName($cat_id,$conn){
	$get_cat = "SELECT * FROM categories WHERE ID =  '$cat_id'";
  	$run_get_cat = mysqli_query($conn, $get_cat);
  	$fetch_cat_name = mysqli_fetch_assoc($run_get_cat);
  	$cat_name = $fetch_cat_name['cat_name'];
  	return $cat_name;
}

// progres bar 
function progressBarHtml(){
	$p = '
	<div class="progress" style="height:20px; font-size: 14px">
	  	<div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 40.50%"> 40.50 %</div>
	</div>
	';
	return $p;
}

// singal product left vertical image check if image present or not 
function check_img_db($img_name,$pro_img_src){
    $img_path = $pro_img_src;
    $image_src = $img_path.$img_name;
    if($img_name == "null" || $img_name == null){
        $small_imgs = "";
    }else{
        $small_imgs ="
        <a class='product-gallery-item active' href='#' data-image='".$image_src."'data-zoom-image='".$image_src."'>
            <img src='".$image_src."' >
        </a>";
    }
  return $small_imgs;
}

// next product function
function nextProduct($p_id,$conn){
    $next_p = "SELECT * FROM products WHERE p_status = 1 AND ID > '{$p_id}' ORDER BY ID ASC LIMIT 1";
    $run_next_p = mysqli_query($conn,$next_p);
    if(mysqli_num_rows($run_next_p) > 0){
        $fetch_p = mysqli_fetch_assoc($run_next_p);
        $next_id = $fetch_p['ID'];
        return $next_id; 
    }else{
        return "null";
    }    
}

// previous product function
function preProduct($p_id,$conn){
    $pre_p = "SELECT * FROM products WHERE p_status = 1 AND ID < '{$p_id}' ORDER BY ID DESC LIMIT 1";
    $run_pre_p = mysqli_query($conn,$pre_p);
    if(mysqli_num_rows($run_pre_p) > 0){
        $fetch_p = mysqli_fetch_assoc($run_pre_p);
        $pre_id = $fetch_p['ID'];
        return $pre_id; 
    }else{
        return "null";
    }    
}

// wishlist table code 

function wishlistTable($link,$img_src,$p_name,$status,$w_id){
return '
<tr>
    <td class="product-col">
        <div class="product">
            <figure class="product-media">
                <a href="'.$link.'">
                    <img src="'.$img_src.'" alt="Product image">
                </a>
            </figure>

            <h3 class="product-title">
                <a href="'.$link.'">'.$p_name.'</a>
            </h3><!-- End .product-title -->
        </div><!-- End .product -->
    </td>
    <td class="stock-col">'.$status.'</td>
    <td class="action-col">
        <button class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>HOLD IT</button>
    </td>
    <td class="remove-col"><button class="btn-remove" id="remove-wishlist" data-w_id="'.$w_id.'"><i class="icon-close"></i></button></td>
</tr>
';
}
// cart page table format
function CartTable($link,$img_src,$p_name,$p_amt,$qty,$c_id){
$total_amount = $p_amt * $qty;
return'
<tr>
    <td class="product-col">
        <div class="product">
            <figure class="product-media">
                <a href="'.$link.'">
                    <img src="'.$img_src.'" alt="Product image">
                </a>
            </figure>

            <h3 class="product-title">
                <a href="'.$link.'">'.$p_name.'</a>
            </h3><!-- End .product-title -->
        </div><!-- End .product -->
    </td>
    <td class="price-col" id="product-amount" >'.$p_amt.'</td>
    <td class="quantity-col">
              <div class="cart-product-quantity">
                  <input type="number" class="form-control" value="'.$qty.'" min="1" max="10" step="1" data-decimals="0" required id="product-qty">
              </div><!-- End .cart-product-quantity -->
          </td>
    <td class="total-col">'.$total_amount.'</td>
    <td class="remove-col"><button class="btn-remove" id="remove-cart-list" data-c_id='.$c_id.'><i class="icon-close"></i></button></td>
</tr>
';

}

// check in wishlist for same product insert
function searchForPid($id, $array) {
   foreach ($array as $key => $val) {
       if ($val['product_id'] == $id) {
           return $val['product_id'];
       }
   }
   return null;
}

// Disable wishlist button
function DisableWishlistButton($user_id,$p_id,$conn){
  if($user_id != ""){
    $check_wishlist = "SELECT product_id FROM wishlist WHERE user_id = '{$user_id}'";
    $run_check_wishlist = mysqli_query($conn, $check_wishlist);
    $row_data = array();
    while($row_2 = mysqli_fetch_array($run_check_wishlist))
    $row_data[] = $row_2;
    $check_pro = searchForPid($p_id,$row_data);
    if(mysqli_num_rows($run_check_wishlist) > 0){
      if($check_pro != ""){
        $w_disable = "isDisabled";                
      }else{
        $w_disable ="";                
      }
    }else{
      $w_disable ="";                                
    }
  }else{
    $w_disable ="";
  }
  return $w_disable;
}

// Disable cart button
function DisableCartButton($user_id,$p_id,$conn){
  if($user_id != ""){
    $check_cart = "SELECT product_id FROM cart WHERE user_id = '{$user_id}'";
    $run_check_cart = mysqli_query($conn, $check_cart);
    $row_data = array();
    while($row_2 = mysqli_fetch_array($run_check_cart))
    $row_data[] = $row_2;
    $check_pro = searchForPid($p_id,$row_data);
    if(mysqli_num_rows($run_check_cart) > 0){
      if($check_pro != ""){
        $c_disable = "isDisabled";                
      }else{
        $c_disable ="";                
      }
    }else{
      $c_disable ="";                                
    }
  }else{
    $c_disable ="";
  }
  return $c_disable;
}

// get product data by its id
function GetProductData($conn, $pro_id){
    $sql = "SELECT * FROM products WHERE ID = $pro_id";
    $run = mysqli_query($conn, $sql);
    return $run;
}
// get deal data by it id
function GetDealData($conn, $deal_id){
    $sql = "SELECT * FROM deal WHERE DID = $deal_id";
    $run = mysqli_query($conn, $sql);
    return $run;
}

// get deal data by it status and zone
function GetDealDataByZone($conn, $zone, $limit = 5){
    $sql = "SELECT * FROM deal WHERE deal_status = 1 AND zone = '{$zone}' LIMIT {$limit}";
    $run = mysqli_query($conn, $sql);
    return $run;
}

// get ending deal data less than 1 day
function GetEndDealData($conn, $zone, $limit = 2){
    $sql = "SELECT * FROM deal WHERE zone = '{$zone}' AND e_time_green != null LIMIT {$limit}";
    $run = mysqli_query($conn, $sql);
    return $run;
}

// function for multipling amount with api rates
function convertPrice($rate,$unit_price){

    if($rate == 1){
        $mul = $rate * $unit_price;
        $out = "<u>".number_format($mul,2,'.',',')."</u>&nbsp".$_SESSION['currency'];
    }else{
        $mul = $rate * $unit_price;
        $out = "<u> ".number_format($mul,2,'.',',')."</u>&nbsp".$_SESSION['currency'];
    }
    
    return $out;
}