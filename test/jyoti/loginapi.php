<?php

include "dbconnection.php";

$status = true;

if ($_POST['userName'] == '' || !array_key_exists('userName', $_POST)) {
    $status = false;
}

if ($_POST['password'] == '' || !array_key_exists('password', $_POST)) {
    $status = false;
};


$password=$_POST['password'];

$statement=$pdo->prepare("select * from users where username=? AND password=?");
$statement->execute([$_POST['userName'],md5($password)]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);



if(count($result)==0){
    $response=["status"=>false,"message"=>"User Name or Password is incorrect."];
    echo json_encode($response);
    return;
}

$bytes = random_bytes(5);
$token=  bin2hex($bytes);

$statement2=$pdo->prepare("update users set token=? where id=?");
$statement2->execute([$token,$result[0]['id']]);


$statement3=$pdo->prepare("select * from users where token=?");
$statement3->execute([$token]);
$result2=$statement3->fetchAll(PDO::FETCH_ASSOC);


$response=["status"=>true,"output"=>$result2];
echo json_encode($response);