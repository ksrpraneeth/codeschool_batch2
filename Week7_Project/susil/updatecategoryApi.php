<?php
include('dbconnect.php');
$response = [];
$statement = $pdo->prepare("update categories set categoryname=?, description=? where categoryid=?");
$statement->execute([$_POST['categoryName'],$_POST['Description'],$_POST['categoryId']]);
$result = $statement->fetchall(PDO::FETCH_ASSOC);
if($result){
    $response['status']=true;
    $response['output']=$result;
    echo json_encode($response);
    return;
}


?>