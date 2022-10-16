<?php

//  Defining necessary values
define('SITEURL','http://localhost/Assignment/front-end/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','restfull_api');

$conn = new mysqli(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

if($conn->connect_errno){
    http_response_code(400);
    header('Content_type: text/plain');
    echo $conn->connect_error;
    exit();
}