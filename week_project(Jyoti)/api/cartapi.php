<?php
include "dbconnection.php";
$userid=$_POST['userid'];

$statement=$pdo->prepare("select id from users where token=?");
$statement->execute([$userid]);
$id=$statement->fetchAll(PDO::FETCH_ASSOC);


$statement2=$pdo->prepare("select * from orders as o ,products as p where o.productid=p.id and o.userid=?");
$statement2->execute([$id[0]['id']]);
$result=$statement2->fetchAll(PDO::FETCH_ASSOC);


$response=["status"=>true,"output"=>$result];
echo json_encode($response);