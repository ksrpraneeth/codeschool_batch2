<?php

include_once 'dbconnection.php';
include_once 'response.php';

try {
    $query = "SELECT s.id, s.employee_id, CONCAT(e.surname, ' ', e.firstname, ' ', e.lastname) AS employee_name, MONTHNAME(s.for_month) AS salary_month, YEAR(s.for_month) AS salary_year, DATE_FORMAT(s.paid_on, '%d/%m/%Y') AS paid_on, FORMAT(e.gross_salary, 2, 'en_IN') AS gross_salary, FORMAT(s.deductions, 2, 'en_IN') AS deductions, FORMAT(s.net_salary, 2, 'en_IN') AS net_salary, DATE_FORMAT(s.created_at, '%d/%m/%Y %h:%i %p') AS created_at FROM salaries AS s, employees AS e WHERE s.employee_id = e.id";

    if(array_key_exists('salaryMonth', $_POST) && $_POST['salaryMonth'] != "") {
        $query .= ' AND s.for_month = '.'"'.$_POST['salaryMonth'].'"';
    } if(array_key_exists('dateOfPayment', $_POST) && $_POST['dateOfPayment'] != "") {
        $query .= ' AND s.paid_on = '.'"'.$_POST['dateOfPayment'].'"';
    } if(array_key_exists('employeeId', $_POST) && $_POST['employeeId'] != "") {
        $query .= ' AND s.employee_id = '.'"'.$_POST['employeeId'].'"';
    } 
    $query .= ' ORDER BY s.id';

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