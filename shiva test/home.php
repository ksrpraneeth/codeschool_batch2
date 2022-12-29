<?php
include 'response.php';

include 'dbconnection.php';


if(!array_key_exists('employee_name',$_POST)){
    $response['status']=false;
    $response['message']="Please enter employee name";
    echo json_encode($response);
    return;
}

if(strlen($_POST['employee_name'])==0){
    $response['status']=false;
    $response['message']="Please enter employee name";
    echo json_encode($response);
    return;
}


if(strlen($_POST['date_of_birth'])==0){
    $response['status']=false;
    $response['message']="Select date of birth";
    echo json_encode($response);
    return;
}

if(!array_key_exists('date_of_birth',$_POST)){
    $response['status']=false;
    $response['message']="Select date of birth";
    echo json_encode($response);
    return;
}

if(strlen($_POST['father_name'])==0){
    $response['status']=false;
    $response['message']="Please enter father name";
    echo json_encode($response);
    return;
}

if(!array_key_exists('father_name',$_POST)){
    $response['status']=false;
    $response['message']="Please enter father name";
    echo json_encode($response);
    return;
}
if(strlen($_POST['mother_name'])==0){
    $response['status']=false;
    $response['message']="Please enter mother name";
    echo json_encode($response);
    return;
}

if(!array_key_exists('mother_name',$_POST)){
    $response['status']=false;
    $response['message']="Please enter mother name";
    echo json_encode($response);
    return;
}

try{

$statement = $pdo->prepare("Insert into employees (employee_name,date_of_birth,father_name,mother_name) values (?,?,?,?)");
$isQueryExecuted = $statement->execute([$_POST['employee_name'],$_POST['date_of_birth'],$_POST['father_name'],$_POST['mother_name']]);
if($isQueryExecuted){
    $response['status']=true;
    $response['message']="Inserted Successfully";
    echo json_encode($response);
        return;
}

$statement = $pdo->prepare("Insert into address (employee_id,address) values (?,?)");
$isQueryExecuted = $statement->execute([$_POST['employee_id'],$_POST['address']]);
if($isQueryExecuted){
    $response['status']=true;
    $response['message']="Inserted Successfully";
    echo json_encode($response);
    return;
}

} catch (PDOException $e) {
die($e->getMessage());
}
