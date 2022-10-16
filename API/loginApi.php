<?php

include_once "../constants/db_conn.php";

$response=array();

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$uname = validate($_POST['username']);
$pass = validate($_POST['password']);

if(empty($uname)){
    $response=array(
        "status" => false,
        "message" => "Username is Required"
    );
}else if(empty($pass)){
    $response=array(
        "status" => false,
        "message" => "Password is Required"
    );
}else{
    $sql = "SELECT * FROM login_rest WHERE username='$uname' AND password='$pass' ";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_assoc($result);

        if($row['username'] === $uname && $row['password'] === $pass){
            $response=array(
                "status" => true,
                "message" => "Successfully SignUp!",
                "username" => $uname 
            );
            header("Location: ../home.php");
        }else{
            $response=array(
                "status" => false,
                "message" => "Incorrect Username or Password"
            );
        }
    }else{
        $response=array(
            "status" => false,
            "message" => "Incorrect Username or Password"
        );
    }
}

print_r(json_encode($response));