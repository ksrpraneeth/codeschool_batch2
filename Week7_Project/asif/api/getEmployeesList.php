<?php

include_once 'dbconnection.php';
include_once 'response.php';

try {

    $query = "SELECT id, CONCAT(surname, ' ', firstname, ' ', lastname) AS name FROM employees WHERE working_status_id = 1 ORDER BY id";
    
    $statement = $pdo->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(count($result) == 0) {
        $response['status'] = false;
        $response['message'] = 'Records Not Found';
        echo json_encode($response);
        return;
    }
    
    $response['status'] = true;
    $response['message'] = 'Records found.';
    $response['data'] = $result;
    
} catch(PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
return;

?>