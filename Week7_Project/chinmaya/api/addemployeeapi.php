<?php
include "dbconnection.php";


try{
    $statement1=$pdo->prepare("select * from working_status");
    $statement1->execute();
    $workingStatus=$statement1->fetchAll(PDO::FETCH_ASSOC);


    $statement2=$pdo->prepare("select * from designation");
    $statement2->execute();
   $designation=$statement2->fetchAll(PDO::FETCH_ASSOC);


   $statement3=$pdo->prepare("select * from location");
   $statement3->execute();
   $location=$statement3->fetchAll(PDO::FETCH_ASSOC);

   $response=["status"=>true,"message"=>"","Data"=>[$workingStatus,$designation,$location]];
   echo json_encode($response);


}

catch (PDOException $e) {
    $response=["status"=>false,"output"=>"Can not login"];
    echo json_encode($response);
    return;
}