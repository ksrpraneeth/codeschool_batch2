<?php
include "dbconnection.php";
$employeeid=$_POST['eId'];

try{
$statement=$pdo->prepare("select e.id, e.surename,e.firstname,e.lastname,e.date_of_joining,e.dob,e.gender,w.status_description,l.district,d.description ,e.working_status_id,e.location_id,e.designation_id ,e.gross from employees as e,location as l ,designation as d,working_status as w where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id and e.id=?");
$statement->execute([$employeeid]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
if(count($result)==0){
    $response=["status"=>false,"message"=>"Data not found "];
    echo json_encode($response);
    return;
}
$response=["status"=>true,"Data"=>$result];
echo json_encode($response);

}

catch(PDOException $e){
    $response=["status"=>false,"message"=>$e->getMessage()];
    echo json_encode($response);
}