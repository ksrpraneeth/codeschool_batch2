<?php

include 'response.php';
include 'db.php';

if (!array_key_exists('room_number', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Room Number";
    echo json_encode($response);
    return;
}
if (!array_key_exists('room_categery', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select Room Categery";
    echo json_encode($response);
    return;
}
if (!array_key_exists('id', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select Room Categery";
    echo json_encode($response);
    return;
}
try {

    $statement = $pdo->prepare("INSERT INTO rooms (room_no,room_categery_id,hotel_id) values (?,?,?)");
    $isQueryExecuted = $statement->execute([$_POST['room_number'], $_POST['room_categery'],$_POST['id']]);
    if ($isQueryExecuted) {
        $response['status'] = true;
        $response['message'] = "Saved Successfully";
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