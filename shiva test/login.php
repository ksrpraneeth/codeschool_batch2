<?php
include 'response.php';

include 'dbconnection.php';


if(!array_key_exists('username',$_POST)){
    $response['status']=false;
    $response['message']="Please enter Username";
    echo json_encode($response);
    return;
}

if(strlen($_POST['username'])==0){
    $response['status']=false;
    $response['message']="Please enter Username";
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

$statement = $pdo->prepare("Select id,username from users where username =? and password=?");
$statement->execute([$_POST['username'],md5($_POST['password'])]);

$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($resultSet)==0){
    $response['status']=false;
    $response['message']="Username or Password is wrong";
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
