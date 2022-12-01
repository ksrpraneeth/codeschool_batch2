<?php

include_once 'dbconnection.php';
include_once 'response.php';

if(!array_key_exists('id', $_POST)) {
    $response['status'] = false;
    $response['message'] = 'Invalid Request';
    echo json_encode($response);
    return;
}

if($_POST['id'] == '*') {
    $query = "SELECT s.id, CONCAT(e.surname, ' ', e.firstname, ' ', e.lastname) AS employee_name, MONTHNAME(s.for_month) AS salary_month, YEAR(s.for_month) AS salary_year, s.paid_on, s.gross_salary, s.deductions, s.net_salary, s.created_at FROM salaries AS s, employees AS e WHERE s.employee_id = e.id ORDER BY s.id";

    try {
        $statement = $pdo->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $response['status'] = true;
        $response['message'] = 'Records found.';
        $response['data'] = $result;
        
    } catch(PDOException $e) {
        $response['status'] = false;
        $response['message'] = $e->getMessage();
    }

} else {
    $query = "SELECT employee_id, MONTHNAME(for_month) AS salary_month, YEAR(for_month) AS salary_year, paid_on, net_salary FROM salaries WHERE employee_id = ?";

    try {
        $statement = $pdo->prepare($query);
        $statement->execute([$_POST['id']]);
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
}

echo json_encode($response);
return;
?>