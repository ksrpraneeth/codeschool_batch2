<?php
include "dbconnection.php";

try{

$statement=$pdo->prepare("select e.id,concat(e.surename,' ',e.firstname,' ',e.lastname),e.date_of_joining,e.dob,e.gender,w.status_description,d.description,l.district,e.gross from employees as e,working_status as w,location as l,designation as d
where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id");
$statement->execute();
 $result=$statement->fetchAll(PDO::FETCH_ASSOC);



if(count($result)==0){
    $response=["status"=>false,"message"=>"something went wrong"];
    echo json_encode($response);
    return;
}



$response=["status"=>true,
"message"=>"",
"Data"=>$result];
echo  json_encode($response);
}


catch(PDOException $e){
    $response=["status"=>false,"message"=>$e->getMessage()];
    echo json_encode($response);
}