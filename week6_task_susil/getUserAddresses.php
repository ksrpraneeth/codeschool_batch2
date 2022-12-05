<?php
include('dbconnect.php');
$response = [];
$userID = $_GET['user_id'];

$statement = $pdo->prepare(" select * from useraddress where id = ?");
$statement->execute([$userID]);
$result = $statement->fetchall(PDO::FETCH_ASSOC);
if($result){
    $response['status']=true;
    $response['output']=$result;
    echo json_encode($response);
    return;
}else{
    $response['status'] = false;
}
