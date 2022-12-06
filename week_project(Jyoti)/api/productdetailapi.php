<?php
include "dbconnection.php";
$id=$_POST['productid'];
$statement=$pdo->prepare("select * from products where id=?");
$statement->execute([$id]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
if(count($result)==0){
    $response=["status"=>false,"output"=>"Can not load the data"];
    echo json_encode($response);
    return;
}






$response=["status"=>true,"output"=>$result];
echo json_encode($response);







