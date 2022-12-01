<?php

include_once 'dbconnection.php';
include_once 'response.php';


if(!array_key_exists('id', $_POST)) {
    $response['status'] = false;
    $response['message'] = 'Invalid Request';
    echo json_encode($response);
    return;
}

$query = "SELECT s.employee_id, sd.id, sc.description, sc.type, sd.amount FROM salary_details AS sd, salary_components AS sc, salaries AS s WHERE sd.salary_id = s.id AND sd.salary_component_id = sc.id AND s.id = ?"; 

try {
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