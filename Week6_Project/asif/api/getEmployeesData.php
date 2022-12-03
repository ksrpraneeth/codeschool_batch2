<?php

include_once 'dbconnection.php';
include_once 'response.php';

try {
    $query = "SELECT e.id, CONCAT(e.surname, ' ', e.firstname, ' ', e.lastname) AS name, e.date_of_joining, e.date_of_birth, e.gender, e.phone, w.description AS working_status, d.description AS designation, l.district AS location, e.created_at FROM employees AS e, working_status AS w, designations AS d, locations AS l WHERE e.working_status_id = w.id AND e.designation_id = d.id AND e.location_id = l.id ORDER BY e.id";
    
    $statement = $pdo->query($query);
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
