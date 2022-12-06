<?php

include 'responce.php';
include 'db.php';

$token = isset($_POST['token']) ? $_POST['token'] : null;



if(!$token){
    $response['status'] = false;
    $response['message'] = "Invalid";
    echo json_encode($response);
    return;
}

$statement = $pdo->prepare("Select id from users where token=?");
$statement->execute([$token]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($resultSet)==0){
    $response['status'] = false;
    $response['message'] = "Invalid";
    echo json_encode($response);
    return;
}
$response['status'] = true;
$response['message'] = "Valid";
$response['data'] = $resultSet[0];
echo json_encode($response);
return;

// session_start();

// if(array_key_exists('user_data',$_SESSION))

// $_SESSION["user_data"];



// $statement = $pdo->prepare("select * from employees");
// $statement->execute()



?>