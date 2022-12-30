<?php

include 'response.php';
include 'db.php';

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
if(!array_key_exists('employee_id',$_POST)){
    $response['status']=false;
    $response['message']="Please enter employee name";
    echo json_encode($response);
    return;
}

if(strlen($_POST['employee_id'])==0){
    $response['status']=false;
    $response['message']="Please enter employee name";
    echo json_encode($response);
    return;
}

if(!array_key_exists('address',$_POST)){
    $response['status']=false;
    $response['message']="Please enter Address ";
    echo json_encode($response);
    return;
}

if(strlen($_POST['address'])==0){
    $response['status']=false;
    $response['message']="Please enter Address";
    echo json_encode($response);
    return;
}
try{

    $statement = $pdo->prepare("Insert into employees (employee_name,employee_id) values (?,?)");
    $isQueryExecuted = $statement->execute([$_POST['employee_name'],$_POST['employee_id']]);
    if($isQueryExecuted){
        $response['status']=true;
        $response['message']="Inserted Successfully";
        echo json_encode($response);
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