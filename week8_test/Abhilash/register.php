<?php

include 'response.php';
include 'db.php';

if (!array_key_exists('user_name', $_POST) || !isset($_POST['user_name'])) {
    $response['status'] = false;
    $response['message'] = "Please  User Name";
    echo json_encode($response);
    return;
}
if (strlen($_POST['user_name']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Enter User Name";
    echo json_encode($response);
    return;
}
if (!preg_match_all("/^[a-zA-Z0-9]{2,30}/i", ($_POST['user_name']))) {
    $response['status'] = false;
    $response['message'] = " Name Should Not Be Contain Special Charaters";
    echo json_encode($response);
    return;
}
if (!array_key_exists('email', $_POST) || !isset($_POST['email'])) {
    $response['status'] = false;
    $response['message'] = "Please Enter EMAIL";
    echo json_encode($response);
    return;
}
if (strlen($_POST['email']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Enter EMAIL";
    echo json_encode($response);
    return;
}

if (!array_key_exists('password', $_POST) || !isset($_POST['password'])) {
    $response['status'] = false;
    $response['message'] = "Please Enter Password ";
    echo json_encode($response);
    return;
}
if (strlen($_POST['password']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Enter Password";
    echo json_encode($response);
    return;
}

if(!array_key_exists('date_of_birth',$_POST)){
    $response['status']=false;
    $response['message']="Select Date";
    echo json_encode($response);
    return;
}
if(strlen($_POST['date_of_birth'])==0){
    $response['status']=false;
    $response['message']="Please Select Date";
    echo json_encode($response);
    return;
}
try {
    $statement = $pdo->prepare("select * from users where email = ?");
    $statement->execute([$_POST['email']]);
    $response = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($response)>0){
        $response['status']=false;
        $response['message']="Email Already exists";
        echo json_encode($response);
        return;
    }
    $statement = $pdo->prepare("select * from users where name = ?");
    $statement->execute([$_POST['user_name']]);
    $response = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($response)>0){
        $response['status']=false;
        $response['message']="Username Already exists";
        echo json_encode($response);
        return;
    }

    $statement = $pdo->prepare("Insert into users (name,email,password,date_of_birth) values (?,?,?,?)");
    $isQueryExecuted = $statement->execute([$_POST['user_name'],$_POST['email'],md5($_POST['password']),$_POST['date_of_birth']]);
    if($isQueryExecuted){
        $response['status']=true;
        $response['message']="Registration Successful";
        echo json_encode($response);
        return;
    }




}


   catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}