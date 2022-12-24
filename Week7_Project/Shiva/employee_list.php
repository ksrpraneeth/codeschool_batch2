<?php
include 'responce.php';
include 'db.php';

try {

    $statement = $pdo->prepare("select o.name,COUNT(e.employee_id) AS no_of_employees,o.id
    FROM organizations AS o, employees AS e 
    WHERE o.id=e.organization_id 
    GROUP BY o.id;") ;
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($response) == 0) {
        $response['status'] = false;
        $response['message'] = "no data found";
        echo json_encode($response);
        return;
    }
    $statement = $pdo->prepare("SELECT COUNT(employee_id) AS no_of_employees
    FROM employees WHERE organization_id=?;");

    $response['status'] = true;
    $response['message'] = "passed";
    $response['data'] = $resultSet;
    echo json_encode($response);

    // $statement = $pdo->prepare("SELECT COUNT(employee_id) AS no_of_employees
    // FROM employees WHERE organization_id=1;");
    // $statement->execute();
    // $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    // if (count($response) == 0) {
    //     $response['status'] = false;
    //     $response['message'] = "no data found";
    //     echo json_encode($response);
    //     return;
    // }
    // $response['status'] = true;
    // $response['message'] = "passed";
    // $response['data'] = $resultSet;
    // echo json_encode($response);

    // $statement = $pdo->prepare("INSERT INTO employees (organization_id) VALUES (?)");
    // $isQueryExecuted = $statement->execute([$_POST['organization_id']]);
    // if($isQueryExecuted){
    //     $response['status']=true;
    //     $response['message']="Submit Successfull";
    //     echo json_encode($response);
    //     return;
    // }
    

} catch (PDOException $e) {
    echo json_encode([
        'status' => false,
        'message' => $$e->getMessage(),
    ]);
}

?>