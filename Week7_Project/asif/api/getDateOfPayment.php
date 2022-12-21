<?php

include_once 'dbconnection.php';
include_once 'response.php';

try {
    $query = "SELECT DISTINCT paid_on, DATE_FORMAT(paid_on, '%d/%m/%Y') as date_of_payment FROM salaries";
    
    if(array_key_exists('salaryMonth', $_POST) && $_POST['salaryMonth'] != "") {
        $query .= ' WHERE for_month = ?';
        $statement = $pdo->prepare($query);
        $statement->execute([$_POST['salaryMonth']]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $statement = $pdo->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

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