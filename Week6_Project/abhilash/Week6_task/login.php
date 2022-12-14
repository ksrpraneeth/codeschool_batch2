<?php
include 'response.php';

include 'db.php';


if (!array_key_exists('email', $_POST) || !isset($_POST['email'])) {
    $response['status'] = false;
    $response['message'] = "Please Enter Email";
    echo json_encode($response);
    return;
}
if (strlen($_POST['email']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Enter Email";
    echo json_encode($response);
    return;
}
if (strlen($_POST['password']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Enter Password";
    echo json_encode($response);
    return;
}
if (!array_key_exists('password', $_POST) || !isset($_POST['password'])) {
    $response['status'] = false;
    $response['message'] = "Please Enter Password ";
    echo json_encode($response);
    return;
}

try {
      
    $statement = $pdo->prepare("Select * from users where email =? and password=?");
    $statement->execute([$_POST['email'], md5($_POST['password'])]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet) == 0) {
        $response['status'] = false;
        $response['message'] = "Email or Password Is Wrong";
        echo json_encode($response);
        return;
    }
if( $resultSet[0]['user_role']=="2"){
        $response['status'] = true;
        $response['message'] = "admin Login successful";
        $response['type'] = ['Admin'];
    }
 else {
        $response['status'] = true;
        $response['message'] = "user Login successful";
        $response['type'] = 'user';
    }
 
$bytes = random_bytes(5);
    $token = bin2hex($bytes);

    $statement = $pdo->prepare("UPDATE users SET token = ? where id = ?");
    $statement->execute([$token, $resultSet[0]['id']]);
    $response['status'] = true;
    $response['message'] = "Login Successfull";
    $response['data'] = $token;
    $response['user_role'] = [1,2];
    echo json_encode($response);
    return;
}
 catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}