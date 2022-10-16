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
$email = validate($_POST['email']);
$pass = validate($_POST['password']);

if(!empty($uname))
if(empty($uname)){
    $response=array(
        "status" => false,
        "message" => "Username Required!"
    );

}else if(empty($email)){
    $response=array(
        "status" => false,
        "message" => "Email Required!"
    );

}else if(empty($pass)){
    $response=array(
        "status" => false,
        "message" => "Password Required!"
    );

}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $response=array(
        "status" => false,
        "message" => "Invalid Email!"
    );

}else{
    
    $uppercase = preg_match('@[A-Z]@',$pass);
    $lowercase = preg_match('@[a-z]@',$pass);
    $number = preg_match('@[0-9]@',$pass);
    $specialChars = preg_match('@[^\w]@',$pass);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8){
        $response=array(
            "status" => false,
            "message" => "Password Should have atleast 8 characters"
        );
    }
    else{
        $sql = "SELECT * FROM login_rest WHERE username='$uname'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $response=array(
                "status" => false,
                "message" => "Username is Already taken!"
            );
        
        }else{
            $sql2 = "INSERT INTO login_rest(username,email,password) VALUES('$uname','$email','$pass')";
            $result2 = mysqli_query($conn, $sql2);

            if($result2){
                $response=array(
                    "status" => true,
                    "message" => "Successfully SignUp!",
                    "username" => $uname 
                );
            
            }else{
                $response=array(
                    "status" => false,
                    "message" => "Unknown error occured"
                );
            }
        }
    }
}


print_r(json_encode($response));