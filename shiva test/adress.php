<?php
include 'response.php';

include 'dbconnection.php';

try{

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