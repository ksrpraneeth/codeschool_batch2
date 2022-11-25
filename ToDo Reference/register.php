<?php

include 'response.php';
include 'db.php';

if(!array_key_exists('email',$_POST)){
    $response['status']=false;
    $response['message']="Please enter EMAIL";
    echo json_encode($response);
    return;
}

if(strlen($_POST['email'])==0){
    $response['status']=false;
    $response['message']="Please enter EMAIL";
    echo json_encode($response);
    return;
}


if(strlen($_POST['password'])==0){
    $response['status']=false;
    $response['message']="Please enter PASSWORD";
    echo json_encode($response);
    return;
}

if(!array_key_exists('password',$_POST)){
    $response['status']=false;
    $response['message']="Please enter PASSWORD";
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

    $statement = $pdo->prepare("Insert into users (email,password) values (?,?)");
    $isQueryExecuted = $statement->execute([$_POST['email'],md5($_POST['password'])]);
    if($isQueryExecuted){
        $response['status']=true;
        $response['message']="Registration Successful";
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