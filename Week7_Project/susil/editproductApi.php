<?php
include('dbconnect.php');
$response = [];
$statement = $pdo->prepare("select * from products where productid=?");
$statement->execute([$_POST['productID']]);
$result = $statement->fetchall(PDO::FETCH_ASSOC);
if($result){
    $response['status']=true;
    $response['output']=$result;
    echo json_encode($response);
    return;
}


?>