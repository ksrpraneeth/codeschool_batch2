<?php

include 'response.php';
include 'db.php';


if (!array_key_exists('username', $_POST)) {
    $response['status'] = false;
    $response['usernameerror'] = "Please Enter a User Name";
}
if (strlen($_POST['username']) == 0) {
    $response['status'] = false;
    $response['usernameerror'] = "Please Enter a User Name";
}

if (!preg_match_all("/[a-zA-Z0-9]{2,30}/i", ($_POST['username']))) {
    $response['status'] = false;
    $response['usernameerror'] = " User Name Should Not Be Contain Special Charaters";
}
if (!array_key_exists('password', $_POST)) {
    $response['status'] = false;
    $response['passworderror'] = "Please enter a Password";
}
if (strlen($_POST['password']) == 0) {
    $response['status'] = false;
    $response['passworderror'] = "Please Enter a Password";
}

if (!array_key_exists('email', $_POST)) {
    $response['status'] = false;
    $response['emailerror'] = "Please enter a valid email address";
}
if (strlen($_POST['email']) == 0) {
    $response['status'] = false;
    $response['emailerror'] = "Please enter a Email Address";
}
if (!array_key_exists('dateofbirth', $_POST)) {
    $response['status'] = false;
    $response['dateofbirtherror'] = "Please select Date of Birth";
}
if (strlen($_POST['dateofbirth']) == 0) {
    $response['status'] = false;
    $response['dateofbirtherror'] = "Please select Date of Birth";
}

if(!$response['status']){
    echo json_encode($response);
    return; 
}


try {
    $pdo = getDbConnection();
    $statement = $pdo->prepare("select * from users where  username =?");
    $statement->execute([$_POST['username']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet) == 1) {
        $response['status'] = false;
        $response['message'] = "User Already Registered";
        echo json_encode($response);
        return;
    }
    $sql = "INSERT INTO users(username,password,email,dateofbirth) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['username'], md5($_POST['password']), $_POST['email'], $_POST['dateofbirth']]);
    $id = $pdo->lastInsertId();
    $statement = $pdo->prepare("select * from users where id=? ");
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->execute([$id]);
    $response['status'] = true;
    $response['message'] = "User Registered";
    $response['data'] = $resultSet;
    echo json_encode($response);
    return;
}catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}