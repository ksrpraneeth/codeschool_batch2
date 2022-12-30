<?php

include "dbconnection.php";

$status = true;

if ($_POST['userName'] == '' || !array_key_exists('userName', $_POST)) {
    $status = false;
}

if ($_POST['password'] == '' || !array_key_exists('password', $_POST)) {
    $status = false;
}

if ($_POST['dob'] == '' || !array_key_exists('dob', $_POST)) {
    $status = false;
}
if ($_POST['mail'] == '' || !array_key_exists('mail', $_POST)) {
    $status = false;
}

if(!$status){
    $response=["status"=>false,"message"=>"Please Select all the Fields."];
    echo json_encode($response);
    return;
}

$statement=$pdo->prepare("select * from users where username=?");
$statement->execute([$_POST['userName']]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);



if(count($result)!=0){
    $response=["status"=>false,"message"=>"User Already Exist"];
    echo json_encode($response);
    return;
}




$password=$_POST['password'];

// $bytes = random_bytes(5);
// $token=  bin2hex($bytes);

$statement2=$pdo->prepare("insert into users(username,password,dob,email) values(?,?,?,?)");
$isqueryexecuted=$statement2->execute([$_POST['userName'],md5($password),$_POST['dob'],$_POST['mail']]);


if(!$isqueryexecuted){
    $response=["status"=>false,"message"=>"Failed to Register."];
    echo json_encode($response);
    return;
};

$response=["status"=>true,"output"=>"Registred Successfully."];
echo json_encode($response);