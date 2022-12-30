<?php
include('dbconnect.php');
$response = [
    'status'=>false,
    'message'=>'',
    'data'=>null
];
$statement = $pdo->prepare("INSERT INTO users(email,password ,roleid) values (?,?,?)");
$isQueryExecuted = $statement->execute([$_POST['Email'],md5($_POST['Password']),$_POST['roleId']]);
if($isQueryExecuted){
    $response['status']=true;
    $response['message']="User added successfull";
    echo json_encode($response);
    return;
}