<?php

include "dbconnection.php";
$orderid=$_POST['orderId'];


$statement=$pdo->prepare("delete from orders where orderid=?");
$isqueryexecuted=$statement->execute([$orderid]);


if(!$isqueryexecuted){
    $response=["status"=>false,"output"=>"Can't delete the Item 😔"];
    echo json_encode($response);
    return;
}

$response=["status"=>true,"output"=>"Removed succesfully"];
echo json_encode($response);