<?php

// include 'api/db.php';

//for login

$result = [
    "status" => true,
    "errors" => [
        "userName"=>"",
        "password"=>""
    ],
    "message"=>"",
    "data"=>""
];  

//for user name
if (!array_key_exists("userName", $_POST) || strlen($_POST["userName"]) == 0) {
    $result['status'] = false;
    $result['errors']["userName"] = "Please enter user Name";
}

if(!array_key_exists("password",$_POST)||strlen($_POST["password"])==0){
    $result['status'] = false;
    $result['errors']["password"]= "Please enter password";
}

//for printing errors
echo json_encode($result);
return;
    


// $statement = $pdo->prepare("select * from user_credentials where userName=? and password =?");
// $statement->execute([$_POST['userName'], md5($_POST['password'])]);

// $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
// if(count($resultSet)==0){
//     $result['status'] = false;
//     $result['message']= "User Name or Password is invalid";
//     echo json_encode($result);
//     return;
// }

// $bytes = random_bytes(5);
// $token=  bin2hex($bytes);

// $statement = $pdo->prepare("UPDATE user_credentials set token =? where id = ?");
// $statement->execute([$token,$resultSet[0]['id']]);

// $result['status']=true;
// $result['message']="Login Successfull";
// $result['data'] =$token;

// echo json_encode($result);
// return;