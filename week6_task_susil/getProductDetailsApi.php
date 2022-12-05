<?php
include('dbconnect.php');
$response = [];
$productId = $_GET['id'];
$statement = $pdo->prepare("select * from Products where productid = ?");
$statement->execute([$productId]);
$result = $statement->fetchall(PDO::FETCH_ASSOC);
if($result){
    $response['status']=true;
    $response['output']=$result;
    echo json_encode($response);
    return;
}else{
    $response['status'] = false;
}
