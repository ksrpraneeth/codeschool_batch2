<?php

include_once 'dbconnection.php';
include_once 'response.php';

try {

    $query = "SELECT e.id, CONCAT(e.surname, ' ', e.firstname, ' ', e.lastname) AS name,  DATE_FORMAT(e.date_of_joining, '%d/%m/%Y') AS date_of_joining, DATE_FORMAT(e.date_of_birth, '%d/%m/%Y') AS date_of_birth, e.gender, e.phone, w.description AS working_status, d.description AS designation, l.district AS location, FORMAT(e.gross_salary, 2, 'en_IN') AS gross_salary, DATE_FORMAT(e.created_at, '%d/%m/%Y %h:%i %p') AS created_at FROM employees AS e, working_status AS w, designations AS d, locations AS l WHERE e.working_status_id = w.id AND e.designation_id = d.id AND e.location_id = l.id AND e.id > 0";
    
    if(array_key_exists('workingStatusId', $_POST) && $_POST['workingStatusId'] != "") {
        $query .= ' AND working_status_id = '.$_POST['workingStatusId'].'';
    } if(array_key_exists('designationId', $_POST) && $_POST['designationId'] != "") {
        $query .= ' AND designation_id = '.$_POST['designationId'].'';
    } if(array_key_exists('locationId', $_POST) && $_POST['locationId'] != "") {
        $query .= ' AND location_id = '.$_POST['locationId'].'';
    } 
    $query .= ' ORDER BY e.id ';

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