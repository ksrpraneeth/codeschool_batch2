<?php

include_once 'dbconnection.php';
include_once 'response.php';

if(!array_key_exists('id', $_POST)) {
    $response['status'] = false;
    $response['message'] = 'Invalid Request';
    echo json_encode($response);
    return;
}

try {
    $query = "SELECT * FROM employees WHERE id = ?";
    
    $statement = $pdo->prepare($query);
    $statement->execute([$_POST['id']]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
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