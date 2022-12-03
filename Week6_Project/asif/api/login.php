<?php

include 'dbconnection.php';
include 'response.php';

// return if email and password are empty
if(!array_key_exists('email', $_POST) || strlen($_POST['email']) == 0) {
    $response['status'] = false;
    $response['message'] = 'Error';
    $response['data'] += [ "emailError" => 'Please enter email'];
    
    if(!array_key_exists('password', $_POST) || strlen($_POST['password']) == 0) {
        $response['status'] = false;
        $response['message'] = 'Error';
        $response['data'] += [ "passwordError" => 'Please enter password'];
    }

    echo json_encode($response);
    return;
}

try {
    // fetch data from database to check valid details or not
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$_POST['email'], md5($_POST['password'])]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // if not valid, return
    if(count($result) == 0) {
        $response['status'] = false;
        $response['message'] = 'Invalid Email or Password!';
        echo json_encode($response);
        return;
    }
    
    
    // if valid update status, token, last login
    $id = $result[0]['id'];
    $bytes = random_bytes(5);
    $token = bin2hex($bytes);
    $query = "UPDATE users SET status = 1, token = ?, last_login = CURRENT_TIMESTAMP WHERE id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$token, $id]);

    // get data for the user to send it to frontend 
    $query = "SELECT name, token, DATE_FORMAT(last_login, '%d-%b-%Y') as date, DATE_FORMAT(last_login, '%h:%i %p') as time FROM users WHERE id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$id]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $response['status'] = true;
    $response['message'] = 'Login Success!';
    $response['data'] = $result;
    
} catch(PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
return;

?>