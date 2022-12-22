<?php
include 'response.php';

include 'db.php';
if (array_key_exists('id', $_POST)) {
    try {

        $statement = $pdo->prepare("select r.id as room_id,
        r.room_no,
        rc.description as room_categery
    from rooms r,
        room_categery rc,hotels h
    where r.room_categery_id = rc.id and r.hotel_id=h.id and r.id=?");
        $statement->execute([$_POST['id']]);
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($response) == 0) {
            $response['status'] = false;
            $response['message'] = "this is empty";
            echo json_encode($response);
            return;
        } else {
            $response['status'] = true;
            $response['output'] = $resultSet;
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
}

else {
    $_GET['id'];
try {

    $statement = $pdo->prepare("
    select r.id as room_id,
        r.room_no,
        rc.description as room_categery
    from rooms r,
        room_categery rc
    where r.room_categery_id = rc.id and r.hotel_id=? and r.status=1");
    $statement->execute([$_GET['id']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($response) == 0) {
        $response['status'] = false;
        $response['message'] = "this is empty";
        echo json_encode($response);
        return;
    } else {
        $response['status'] = true;
        $response['output'] = $resultSet;
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
}