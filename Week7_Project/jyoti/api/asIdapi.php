<?php
include "dbconnectionapi.php";

$status = true;


if(!array_key_exists('asId',$_POST)){
    $status = false;
}

$asId =$_POST['asId'];
$statement=$pdo->prepare("select * from adminsanction where id=?");
$statement->execute([$asId]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);


$response=["status"=>true,"output"=>$result];
echo json_encode($response);