<?php

include 'response.php';
include 'db.php';


if
((!array_key_exists('id', $_POST))) {
    $response['status'] = false;
    $response['message'] = "Keys Not Exist";
    echo json_encode($response);
    return;
}

try {

    $statement = $pdo->prepare("UPDATE  rooms set status=2 where id=?");
    $isQueryExecuted = $statement->execute([$_POST['id']]);
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


