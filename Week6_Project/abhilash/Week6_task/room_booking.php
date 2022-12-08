<?php

include 'response.php';
include 'db.php';

if ((!array_key_exists('room_id', $_POST)) && (!array_key_exists('user_id', $_POST)) && (!array_key_exists('total_amount', $_POST)) && (!array_key_exists('check_in', $_POST)) && (!array_key_exists('check_out', $_POST))) {
    $response['status'] = false;
    $response['message'] = "Please Select Room ";
    echo json_encode($response);
    return;
}
if (strlen($_POST['room_id']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Enter Room Id ";
    echo json_encode($response);
    return;
}
if (strlen($_POST['user_id']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Enter User Id ";
    echo json_encode($response);
    return;
}
if (strlen($_POST['check_in']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please  Select Check In Date ";
    echo json_encode($response);
    return;
}

if (strlen($_POST['total_amount']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Total Amount";
    echo json_encode($response);
    return;
}
if (strlen($_POST['check_out']) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Enter Check Out Date ";
    echo json_encode($response);
    return;
}



try {

    $check_in = date('Y-m-d H:i:s', strtotime($_POST['check_in']));
    $check_out = date('Y-m-d H:i:s', strtotime($_POST['check_out']));

    $statement = $pdo->prepare("select id from users where token=?");
    $resultSet = $statement->execute([($_POST['user_id'])]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    $userId = ($resultSet[0]['id']);



    $statement = $pdo->prepare("Insert into booking_transactions (user_id,room_id,total_amount,check_in,check_out) values (?,?,?,?,?)");
    $isQueryExecuted = $statement->execute([$userId, $_POST['room_id'], $_POST['total_amount'], $check_in, $check_out]);
    if ($isQueryExecuted) {
        $response['status'] = true;
        $response['message'] = "Booking Successful";
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