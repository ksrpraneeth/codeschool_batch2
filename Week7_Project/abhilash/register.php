<?php

include 'response.php';
include 'db.php';

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

if (!array_key_exists('confirm_password', $_POST) || !isset($_POST['confirm_password'])) {
    $response['status'] = false;
    $response['message'] = "Please Enter  Confirm Password";
    echo json_encode($response);
    return;
}
if ($_POST['password'] != $_POST['confirm_password']) {
    $response['status'] = false;
    $response['message'] = "Confirm Password Should Match With Password";
    echo json_encode($response);
    return;
}

if (!array_key_exists('name', $_POST) || !isset($_POST['name'])) {
    $response['status'] = false;
    $response['message'] = "Please Enter Name";
    echo json_encode($response);
    return;
}
if (strlen($_POST['name']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Enter Name";
    echo json_encode($response);
    return;
}
if (!preg_match_all("/^[a-zA-Z0-9]{2,30}/i", ($_POST['name']))) {
    $response['status'] = false;
    $response['message'] = " Name Should Not Be Contain Special Charaters";
    echo json_encode($response);
    return;
}

if (!array_key_exists('mobile', $_POST) || !isset($_POST['mobile'])) {
    $response['status'] = false;
    $response['message'] = "Please Enter MObile Number";
    echo json_encode($response);
    return;
}

if (strlen($_POST['mobile']) != 10) {
    $response['status'] = false;
    $response['message'] = "Please Enter MObile Number Should Be In 10 Digits ";
    echo json_encode($response);
    return;
}

if (!array_key_exists('user_role', $_POST) || !isset($_POST['user_role'])) {
    $response['status'] = false;
    $response['message'] = "Please Enter Role ";
    echo json_encode($response);
    return;
}
if (strlen($_POST['user_role']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Enter Role";
    echo json_encode($response);
    return;
}
if (($_POST['user_role']) != 1) {
    $response['status'] = false;
    $response['message'] = "Please Enter User Role";
    echo json_encode($response);
    return;
}

try {
    $statement = $pdo->prepare("select * from users where email = ?");
    $statement->execute([$_POST['email']]);
    $response = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($response) > 0) {
        $response['status'] = false;
        $response['message'] = "Email Already exists";
        echo json_encode($response);
        return;
    }

    $statement = $pdo->prepare("Insert into users (email,password,name,mobile,user_role) values (?,?,?,?,?)");
    $isQueryExecuted = $statement->execute([$_POST['email'], md5($_POST['password']), $_POST['name'], $_POST['mobile'], $_POST['user_role']]);
    if ($isQueryExecuted) {
        $response['status'] = true;
        $response['message'] = "Registration Successful";
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