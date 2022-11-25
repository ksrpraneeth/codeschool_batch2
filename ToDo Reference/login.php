<?php
include 'response.php';

include 'db.php';


if(!array_key_exists('email',$_POST)){
    $response['status']=false;
    $response['message']="Please enter EMAIL";
    echo json_encode($response);
    return;
}

if(strlen($_POST['email'])==0){
    $response['status']=false;
    $response['message']="Please enter EMAIL";
    echo json_encode($response);
    return;
}


if(strlen($_POST['password'])==0){
    $response['status']=false;
    $response['message']="Please enter PASSWORD";
    echo json_encode($response);
    return;
}

if(!array_key_exists('password',$_POST)){
    $response['status']=false;
    $response['message']="Please enter PASSWORD";
    echo json_encode($response);
    return;
}

$statement = $pdo->prepare("Select id,email from users where email =? and password=?");
$statement->execute([$_POST['email'],md5($_POST['password'])]);

$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($resultSet)==0){
    $response['status']=false;
    $response['message']="Email or Password is wrong";
    echo json_encode($response);
    return;
}

$bytes = random_bytes(5);
$token=  bin2hex($bytes);


$statement = $pdo->prepare("UPDATE users set token =? where id = ?");
$statement->execute([$token,$resultSet[0]['id']]);

$response['status']=true;
$response['message']="Login Successfull";
$response['data'] =$token;
echo json_encode($response);
return;
