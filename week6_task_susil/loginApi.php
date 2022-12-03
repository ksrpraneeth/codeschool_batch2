<?php
include('dbconnect.php');
$response = [
    'status'=>false,
    'message'=>'',
    'data'=>null
];

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
$statement = $pdo->prepare("Select * from users where email =? and password=?");
$statement->execute([$_POST['email'],$_POST['password']]);

$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($resultSet)==0){
    $response['status']=false;
    $response['message']="Email or Password is wrong";
    echo json_encode($response);
    return;
}
session_start();
$_SESSION['userdetails']=$resultSet;


$response['status'] = true;
$response['message'] = "Login successful";
$response['data'] =$resultSet;
echo json_encode($response);
return;



