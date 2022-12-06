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
    $query = "SELECT sc.description, sc.type, FORMAT(sd.amount, 2, 'en_IN') AS amount, MONTHNAME(s.for_month) AS salary_month, YEAR(s.for_month) AS salary_year, DATE_FORMAT(s.paid_on, '%d/%m/%Y') as paid_on, FORMAT(s.gross_salary, 2, 'en_IN') AS gross_salary, FORMAT(s.deductions, 2, 'en_IN') AS deductions, FORMAT(s.net_salary, 2, 'en_IN') AS net_salary FROM salary_details AS sd, salary_components AS sc, salaries AS s WHERE sd.salary_id = s.id AND sd.salary_component_id = sc.id AND s.id = ?"; 
    
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

echo json_encode($response);
return;
?>