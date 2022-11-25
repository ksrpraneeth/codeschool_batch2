<?php

include 'response.php';
include 'db.php';

if(!array_key_exists('token',$_POST)){
    $response['status']=false;
    $response['message']="Token is not present";
    echo json_encode($response);
    return;
}

if(!array_key_exists('task',$_POST)){
    $response['status']=false;
    $response['message']="task not present";
    echo json_encode($response);
    return;
}

$statement = $pdo->prepare('select id from users where token =?');
$statement->execute([$_POST['token']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC)[0];

if(!$resultSet){
    $response['status']=false;
    $response['message']="Token is invalid";
    echo json_encode($response);
    return;
}
$statement = $pdo->prepare("INSERT INTO todolist (user_id,task) values (?,?)");
$isQueryExecuted = $statement->execute([$resultSet['id'],$_POST['task']]);
if($isQueryExecuted){
    $response['status']=true;
    $response['message']="Saved Successfully";
    echo json_encode($response);
    return;
}

