<?php
include "dbconnection.php";
try{

$query="select e.id,concat(e.surename,' ',e.firstname,' ',e.lastname),e.date_of_joining,e.dob,e.gender,w.status_description,d.description,l.district,e.gross from employees as e,working_status as w,location as l,designation as d
where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id ";

if(array_key_exists('workingstatus', $_POST) && $_POST['workingstatus'] != "") {
    $query .= ' AND e.working_status_id = '.$_POST['workingstatus'].'';
}

if(array_key_exists('location', $_POST) && $_POST['location'] != "") {
    $query .= ' AND e.location_id = '.$_POST['location'].'';
}

if(array_key_exists('designation', $_POST) && $_POST['designation'] != "") {
    $query .= ' AND e.designation_id = '.$_POST['designation'].'';
}

$statement=$pdo->prepare($query);
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
$response=["status"=>true,"message"=>"data found","Data"=>$result];
echo json_encode($response);



} catch (PDOException $e) {
    $response=["status"=>false,"message"=>$e->getMessage()];
    echo json_encode($response);
    return;
}