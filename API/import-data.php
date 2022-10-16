<?php

// This file couldnot run using the rest api used!

include_once "../constants/db_conn.php";

$response=array();


$fileName = $_FILES["csv-file"]["tmp_name"];

if($_FILES["csv-file"]["size"] > 0) {
    $csvFile = fopen($fileName, "r");

    fgetcsv($csvFile);

    while(($colomn = fgetcsv($csvFile,10000,",")) !== FALSE){

        // Check whether product already exists in the database with the same name
        $sqlSelect = "SELECT id FROM product_tb WHERE product_name = '".$colomn[0]."'";
        $result = mysqli_query($conn,$sqlSelect);

        if(mysqli_num_rows($result) > 0){
            // Update product data in the database
            $sqlUpdate= "UPDATE product_tb 
                        SET price = '".$colomn[1]."', SKU = '".$colomn[2]."', description = '".$colomn[3]."'
                        WHERE product_name = '".$colomn[0]."'";
            echo "Data updated";
            
        }else{
            // Insert product data in the database
            $sqlInsert = "INSERT INTO product_tb (product_name,price,SKU,description)
                        VALUES('" .$colomn[0]. "', '" .$colomn[1]. "', '" .$colomn[2]. "', '" .$colomn[3]. "')";
            $result = mysqli_query($conn,$sqlInsert);
        }
    }
    // Close opened CSV file
    fclose($csvFile);
    $statusType = 'alert-success';
    $statusMsg = 'Members data has been imported successfully.';
} else {
    $statusType = 'alert-danger';
    $statusMsg = 'Some problem occurred, please try again.';
}


print_r(json_encode($response));
