<?php

include_once 'dbconnection.php';
include_once 'response.php';

$day = substr($_POST['paidOn'], 0, 2);
$month = substr($_POST['paidOn'], 3, 2);
$year = substr($_POST['paidOn'], 6, 4);
$paidOn = $year.'-'.$month.'-'.$day;

try {
    // check whether the salary for same month is present or not in salaries table
    $query = "SELECT id from salaries WHERE employee_id = ? AND for_month = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$_POST['employeeId'], $_POST['forMonth']]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    // if present get salary id
    if(count($result) > 0) {
        $salary_id = $result[0]['id'];
    }

    // if not present insert the salary record and return the salary id
    else {
        $query = "INSERT INTO salaries(employee_id, for_month, paid_on, gross_salary, deductions, net_salary) VALUES(?, ?, ?, ?, ?, ?)";
        $statement = $pdo->prepare($query);
        $result = $statement->execute([$_POST['employeeId'], $_POST['forMonth'], $paidOn, $_POST['grossSalary'], $_POST['deductions'], $_POST['netSalary']]);
        if($result) {
            $query = "SELECT id from salaries WHERE employee_id = ? AND for_month = ?";
            $statement = $pdo->prepare($query);
            $statement->execute([$_POST['employeeId'], $_POST['forMonth']]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $salary_id = $result[0]['id'];
        }
    }

    // based on salary id, first check the salary components are already present or not
    $query = "SELECT id from salary_details WHERE salary_id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$salary_id]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    // if salary components are present, return
    if(count($result) > 0) {
        $response['status'] = false;
        $response['message'] = 'Salary Already Exists!';
        echo json_encode($response);
        return;
    }

    // if not present, then insert the values
    $id = $salary_id;
    $query = 'INSERT INTO salary_details(salary_id, salary_component_id, amount) VALUES('.$id. ', 1, '.$_POST['basicPay'].'), ('.$id. ', 2, '.$_POST['da'].'), ('.$id. ', 3, '.$_POST['hra'].'), ('.$id. ', 4, '.$_POST['ca'].'), ('.$id. ', 5, '.$_POST['medicalAllowance'].'), ('.$id. ', 6, '.$_POST['bonus'].'), ('.$id. ', 7, '.$_POST['tds'].'), ('.$id. ', 8, '.$_POST['pf'].')';
    $statement = $pdo->prepare($query);
    $result = $statement->execute();
    if($result) {
        $response['status'] = true;
        $response['message'] = 'Salary Added Successfully!';
    }
    
} catch(PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
return;

?>