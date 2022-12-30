<?php
include('dbconnect.php');
$response = [];
$statement = $pdo->prepare("update products set  productname =?, categoryid=?,productimg =?, description=?,price=? where productid=?");
$statement->execute([$_POST['productName'],$_POST['categoryId'],$_POST['productImg'],$_POST['description'],$_POST['price'],$_POST['productId']]);
$result = $statement->fetchall(PDO::FETCH_ASSOC);
if($result){
    $response['status']=true;
    $response['output']=$result;
    echo json_encode($response);
    return;
}


?>