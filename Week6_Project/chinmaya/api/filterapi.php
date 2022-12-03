<?php
include "dbconnection.php";
try{
$workingstatus=$_POST['workingstatus'];
$location=$_POST['location'];
$designation=$_POST['designation'];

if(!$workingstatus && !$location && !$designation){
    $response=["status"=>false,"message"=>"No filter"];
    echo json_encode($response);
    return;
}
if(!$location && !$designation){
    $statement=$pdo->prepare("select e.id,concat(e.surename,' ',e.firstname,' ',e.lastname),e.date_of_joining,e.dob,e.gender,w.status_description,d.description,l.district,e.gross from employees as e,working_status as w,location as l,designation as d
    where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id and e.working_status_id=?");
    $statement->execute([$workingstatus]);
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    $response=["status"=>true,"message"=>"data found","Data"=>$result];
    echo json_encode($response);
    return;
}
if(!$workingstatus && !$designation){
    $statement=$pdo->prepare("select e.id,concat(e.surename,' ',e.firstname,' ',e.lastname),e.date_of_joining,e.dob,e.gender,w.status_description,d.description,l.district,e.gross from employees as e,working_status as w,location as l,designation as d
    where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id and e.location_id=?");
    $statement->execute([$location]);
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    $response=["status"=>true,"message"=>"data found","Data"=>$result];
    echo json_encode($response);
    return;
}


if(!$workingstatus && !$location){
    $statement=$pdo->prepare("select e.id,concat(e.surename,' ',e.firstname,' ',e.lastname),e.date_of_joining,e.dob,e.gender,w.status_description,d.description,l.district,e.gross from employees as e,working_status as w,location as l,designation as d
    where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id and e.designation_id=?");
    $statement->execute([$designation]);
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    $response=["status"=>true,"message"=>"data found","Data"=>$result];
    echo json_encode($response);
    return;
}
if(!$workingstatus){
    $statement=$pdo->prepare("select e.id,concat(e.surename,' ',e.firstname,' ',e.lastname),e.date_of_joining,e.dob,e.gender,w.status_description,d.description,l.district,e.gross from employees as e,working_status as w,location as l,designation as d
    where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id and e.designation_id=? and e.location_id=?");
    $statement->execute([$designation,$location]);
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    $response=["status"=>true,"message"=>"data found","Data"=>$result];
    echo json_encode($response);
    return;
}

if(!$location){
    $statement=$pdo->prepare("select e.id,concat(e.surename,' ',e.firstname,' ',e.lastname),e.date_of_joining,e.dob,e.gender,w.status_description,d.description,l.district,e.gross from employees as e,working_status as w,location as l,designation as d
    where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id and e.designation_id=? and e.working_status_id=?");
    $statement->execute([$designation,$workingstatus]);
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    $response=["status"=>true,"message"=>"data found","Data"=>$result];
    echo json_encode($response);
    return;
}

if(!$designation){
    $statement=$pdo->prepare("select e.id,concat(e.surename,' ',e.firstname,' ',e.lastname),e.date_of_joining,e.dob,e.gender,w.status_description,d.description,l.district,e.gross from employees as e,working_status as w,location as l,designation as d
    where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id and e.location_id=? and e.working_status_id=?");
    $statement->execute([$location,$workingstatus]);
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    $response=["status"=>true,"message"=>"data found","Data"=>$result];
    echo json_encode($response);
    return;
}


$statement=$pdo->prepare("select e.id,concat(e.surename,' ',e.firstname,' ',e.lastname),e.date_of_joining,e.dob,e.gender,w.status_description,d.description,l.district,e.gross from employees as e,working_status as w,location as l,designation as d
where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id and e.location_id=? and e.working_status_id=? and e.designation_id=? ");
$statement->execute([$location,$workingstatus,$designation]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
$response=["status"=>true,"message"=>"data found","Data"=>$result];
echo json_encode($response);



}

catch (PDOException $e) {
    $response=["status"=>false,"output"=>"Can not login"];
    echo json_encode($response);
    return;
}