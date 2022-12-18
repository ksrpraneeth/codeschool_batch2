<?php

include 'response.php';
include 'db.php';

if (!array_key_exists('hotel_name', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Hotel Name";
    echo json_encode($response);
    return;
}
if (!array_key_exists('hotel_type', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select Hotel id";
    echo json_encode($response);
    return;
}
if (!array_key_exists('hotel_id', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select Hotel id";
    echo json_encode($response);
    return;
}

try {

    $statement = $pdo->prepare("UPDATE  hotels set name=?,hotel_type_id=? where id=?");
    $isQueryExecuted = $statement->execute([$_POST['hotel_name'], $_POST['hotel_type'],$_POST['hotel_id']]);
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

