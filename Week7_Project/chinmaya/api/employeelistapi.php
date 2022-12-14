<?php

include "dbconnection.php";

try{
    $statement=$pdo->prepare("select concat(e.surename,' ',e.firstname,' ',e.lastname),e.id from employees as e");
    $statement->execute();
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);

    $response=["status"=>true,"Data"=>$result];
    echo json_encode($response);
}
catch(PDOException $e){
    $response=["status"=>false,"message"=>$e->getMessage()];
    echo json_encode($response);
}