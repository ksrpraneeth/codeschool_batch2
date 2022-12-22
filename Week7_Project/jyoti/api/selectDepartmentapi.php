<?php

include "dbconnectionapi.php";

$statement=$pdo->prepare("select * from department");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);

$response=["status"=>true,"output"=>$result];
echo json_encode($response);


