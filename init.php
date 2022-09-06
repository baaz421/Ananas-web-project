<?php 
session_start();
//echo "hello<br>";
require "config/db.php";
require "config/functions.php";
include "config/langconfig.php";



// RewriteEngine on
// RewriteCond %{REQUEST_FILENAME} !-d
// RewriteCond %{REQUEST_FILENAME}\.php -f
// RewriteRule ^(.*)$ $1.php [NC,L] 

// RewriteCond %{REQUEST_FILENAME} !-f
// RewriteRule ^([^/]+)/$ $1.php
// RewriteRule ^([^/]+)/([^/]+)/$ /$1/$2.php
// RewriteCond %{REQUEST_FILENAME} !-f
// RewriteCond %{REQUEST_FILENAME} !-d
// RewriteCond %{REQUEST_URI} !(\.[a-zA-Z0-9]{1,5}|/)$
// RewriteRule (.*)$ /$1/ [R=301,L]


// ErrorDocument 404 https://qegmolla.herokuapp.com/app/404.php 





?>