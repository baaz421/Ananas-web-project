<?php
session_start();
session_unset();
session_destroy();
setcookie("currency_rate",null,60,"/");
setcookie("currency",null,60,"/");
header('location: ../');
?>