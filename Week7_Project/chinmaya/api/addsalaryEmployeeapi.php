<?php
 include "dbconnection.php";

 try{

    $statement=$pdo->prepare("select e.id ,concat(e.surename,' ',e.firstname,' ',e.lastname) from employees as e where working_status_id=1");
    $statement->execute();
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);

    if(count($result)==0){
$response=["status"=>false,"message"=>"Can not fetch the data"];
echo json_encode($response);
return;
    }
    $response=["status"=>true,"message"=>"Fetch data succesfully","Data"=>$result];
    echo json_encode($response);
    

 }
 catch (PDOException $e) {
    
    $response=["status"=>false,"message"=>"Can not login"];
    echo json_encode($response);
    return;

}