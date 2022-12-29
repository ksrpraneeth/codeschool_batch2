<?php

include 'response.php';
include 'dbconnection.php';

if(!array_key_exists('username',$_POST)){
    $response['status']=false;
    $response['message']="Please enter Username";
    echo json_encode($response);
    return;
}

if(strlen($_POST['username'])==0){
    $response['status']=false;
    $response['message']="Please enter Username";
    echo json_encode($response);
    return;
}

if (!preg_match_all("/[a-zA-Z0-9]{2,30}/i", ($_POST['username']))) {
    $response['status'] = false;
    $response['message'] = "username should not contain special charaters";
    echo json_encode($response);
    return;
}

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
    $statement = $pdo->prepare("select * from users where username = ?");
    $statement->execute([$_POST['email']]);
    $response = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($response)>0){
        $response['status']=false;
        $response['message']="Username Already exists";
        echo json_encode($response);
        return;
    }

    $statement = $pdo->prepare("Insert into users (username,email,password,date_of_birth) values (?,?,?,?)");
    $isQueryExecuted = $statement->execute([$_POST['username'],$_POST['email'],md5($_POST['password']),$_POST['date_of_birth']]);
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