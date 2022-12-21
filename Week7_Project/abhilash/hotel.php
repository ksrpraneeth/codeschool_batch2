<?php
include 'response.php';

include 'db.php';
if (array_key_exists('id', $_POST)) {
    try {

        $statement = $pdo->prepare("select h.id as hotel_id,h.name,ht.description as hotel_type from hotels as h,hotel_type as ht where h.hotel_type_id=ht.id and h.id=?");
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
    
} else {
    try {

        $statement = $pdo->prepare("select h.id as hotel_id,h.name,ht.description as hotel_type,h.status from hotels as h,hotel_type as ht where h.hotel_type_id=ht.id and h.status=1");
        $statement->execute();
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