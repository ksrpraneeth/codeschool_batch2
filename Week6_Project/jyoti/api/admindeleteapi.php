<?php

include "dbconnection.php";
$productid=$_POST['productId'];

$statement=$pdo->prepare("delete from products where id=?");
$isqueryexecuted=$statement->execute([$productid]);
if(!$isqueryexecuted){
    $response=["status"=>false,"output"=>"Can not deleted"];
    echo json_encode($response);
    return;
}

$response=["status"=>true,"output"=>"Deleted Successfully"];
echo json_encode($response);