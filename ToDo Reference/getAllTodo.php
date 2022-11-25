<?php
include "response.php";
include "db.php";


if (!array_key_exists('token', $_POST)) {
    $response['status'] = false;
    $response['message'] = "User is not present";
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
$statement = $pdo->prepare("select * from todolist where user_id = ?");
$statement->execute([$resultSet['id']]);

$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultSet);
return;