<?php

include 'response.php';
include 'db.php';

if (!array_key_exists('room_no', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Room no";
    echo json_encode($response);
    return;
}
if (!array_key_exists('room_categery', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select Room Cetegery";
    echo json_encode($response);
    return;
}
if (!array_key_exists('room_id', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select Room id";
    echo json_encode($response);
    return;
}

try {

    $statement = $pdo->prepare("UPDATE  rooms set room_no=?,room_categery_id=? where id=?");
    $isQueryExecuted = $statement->execute([$_POST['room_no'], $_POST['room_categery'],$_POST['room_id']]);
    if ($isQueryExecuted) {
        $response['status'] = true;
        $response['message'] = "Upadated Successfully";
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
