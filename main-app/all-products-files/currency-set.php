<?php
// currency-set.php

// sessions and cookie check for currency 
if(isset($_SESSION['currency_rate']) || isset($_COOKIE['currency_rate'])){
    $cur_rate = isset($_SESSION['currency_rate']) ? $_SESSION['currency_rate'] : $_COOKIE['currency_rate'];
    $currency = $_SESSION['currency'];
}else{
    $cur_rate = 1;
    $currency = $_SESSION['currency'];
}