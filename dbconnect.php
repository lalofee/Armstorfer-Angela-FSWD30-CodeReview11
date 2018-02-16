<?php

// this will avoid mysql_connect() deprecation error.

 error_reporting( ~E_DEPRECATED & ~E_NOTICE );

 
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'cr11_armstorfer_angela_php_car_rental');

 
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

mysqli_set_charset($conn, "utf8");

if ( !$conn ) {

  die("Connection failed : " . mysqli_error());

 }

header("Content-Type: text/html;charset=utf-8");

 //echo "verbunden";

?>



