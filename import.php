<?php
// Load the database configuration file
include_once "./constants/db_conn.php";

if(isset($_POST["upload"])) {

    if(is_uploaded_file($_FILES['csv-file']['tmp_name'])){
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
            $qstring = '?status=succ';
        } else {
            $qstring = '?status=err';
        }
    } else{
        $qstring = '?status=invalid_file';
    }
    
}

// Redirect to the listing page
header("Location: home.php".$qstring);