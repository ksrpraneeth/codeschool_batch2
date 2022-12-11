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
    $query = "SELECT e.id, CONCAT(e.surname, ' ', e.firstname, ' ', e.lastname) AS name, DATE_FORMAT(e.date_of_joining, '%d/%m/%Y') AS date_of_joining, DATE_FORMAT(e.date_of_birth, '%d/%m/%Y') AS date_of_birth, e.gender, e.phone, w.description AS working_status, d.description AS designation, l.district AS location, DATE_FORMAT(e.created_at, '%d/%m/%Y %h:%i %p') AS created_at FROM employees AS e, working_status AS w, designations AS d, locations AS l WHERE e.working_status_id = w.id AND e.designation_id = d.id AND e.location_id = l.id AND e.id = ?";
    
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