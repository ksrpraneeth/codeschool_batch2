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


$query="select e.id,concat(e.surename,' ',e.firstname,' ',e.lastname),e.date_of_joining,e.dob,e.gender,w.status_description,d.description,l.district,e.gross from employees as e,working_status as w,location as l,designation as d
where e.working_status_id=w.id and e.location_id=l.id and e.designation_id=d.id ";



if(!$location && !$designation){
    $query=$query.'and e.working_status_id='."{$workingstatus}";
  
}
else if(!$workingstatus && !$designation){
    $query=$query.'and e.location_id='."{$location}";
   
}


else if(!$workingstatus && !$location){

    $query=$query.'and e.designation_id='.'{$designation}';
    
}
else if(!$workingstatus){
    $query=$query.'and e.designation_id='."{$designation}".'and e.location_id='.'{$location}';
    
}

else if(!$location){

    $query=$query.'and e.designation_id='.'{$designation}'."and e.working_status_id=".'{$workingstatus}';
   
}

else if(!$designation){
    $query=$query.'and e.location_id='."{$location}".'and e.working_status_id'.'{$workingstatus}';
    
}

else{
    $query=$query.'and e.location_id='.'{$location}'.'and e.working_status_id='.'{$workingstatus}'.'and e.designation_id='.'{$designation}';
}
$statement=$pdo->prepare($query);
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
$response=["status"=>true,"message"=>"data found","Data"=>$result];
echo json_encode($response);



}

catch (PDOException $e) {
    $response=["status"=>false,"output"=>"Can not login"];
    echo json_encode($response);
    return;
}