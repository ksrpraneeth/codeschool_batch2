<?php
include 'responce.php';
include 'db.php';

if(!array_key_exists('employee_id',$_POST)){
    $response['status']=false;
    $response['message']="Please enter Employee ID";
    echo json_encode($response);
    return;
}

if(strlen($_POST['employee_id'])==0){
    $response['status']=false;
    $response['message']="employeeid cannot be blank";
    echo json_encode($response);
    return;
}

if(strlen($_POST['startDate'])==0){
    $response['status']=false;
    $response['message']="Provide Date";
    echo json_encode($response);
    return;
}

if(!array_key_exists('startDate',$_POST)){
    $response['status']=false;
    $response['message']="Provide Date";
    echo json_encode($response);
    return;
}

if(strlen($_POST['endDate'])==0){
    $response['status']=false;
    $response['message']="Provide Date";
    echo json_encode($response);
    return;
}

if(!array_key_exists('endDate',$_POST)){
    $response['status']=false;
    $response['message']="Provide Date";
    echo json_encode($response);
    return;
}

if(strlen($_POST['priority'])==0){
    $response['status']=false;
    $response['message']="Provide Date";
    echo json_encode($response);
    return;
}

if(!array_key_exists('priority',$_POST)){
    $response['status']=false;
    $response['message']="Provide Date";
    echo json_encode($response);
    return;
}

if(strlen($_POST['taskDetails'])==0){
    $response['status']=false;
    $response['message']="Provide Date";
    echo json_encode($response);
    return;
}

if(!array_key_exists('taskDetails',$_POST)){
    $response['status']=false;
    $response['message']="Provide Date";
    echo json_encode($response);
    return;
}

try {
    $statement = $pdo->prepare("select id from employees where employee_id=?");
    $statement->execute([$_POST['employee_id']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet) == 0) {
        $response['status'] = false;
        $response['message'] = "Invalid employee details";
        echo json_encode($response);
        return;
    }
    $statement = $pdo->prepare("SELECT employee_id,startDate,endDate,priority,taskDetails 
    FROM   tasks");
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet) == 0) {
        $response['status'] = false;
        $response['message'] = "no data found";
        echo json_encode($response);
        return;
    }
    $response['status'] = true;
    $response['message'] = "passed";
    $response['data'] = $resultSet;

    $statement = $pdo->prepare("INSERT INTO tasks (employee_id,startDate,endDate,priority,taskDetails) VALUES (?,?,?,?,?)");
    $isQueryExecuted = $statement->execute([$_POST['employee_id'],($_POST['startDate']),($_POST['endDate']),($_POST['priority']),($_POST['taskDetails'])]);
    if($isQueryExecuted){
        $response['status']=true;
        $response['message']="Submit Successfull";
        echo json_encode($response);
        return;
    }

} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}