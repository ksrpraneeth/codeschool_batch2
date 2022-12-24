<?php
include 'responce.php';
include 'db.php';
try {

    // $statement = $pdo->prepare("SELECT tasks.employee_id , startDate , endDate, priority , taskDetails, extended_date , remarks
    // FROM  employees AS e, organizations AS o, tasks
    // WHERE  e.organization_id=o.id AND e.organization_id=?;");
    // $statement->execute([$_POST['org_id']]);
    // $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

    $statement = $pdo->prepare("SELECT employee_id , startDate , endDate, priority , taskDetails, extended_date , remarks
    FROM   tasks WHERE employee_id IN (SELECT employee_id FROM employees WHERE organization_id = ?);");
    $statement->execute([$_POST['organization_id']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($resultSet) == 0) {
        $response['status'] = false;
        $response['message'] = "No data found";
        echo json_encode($response);
        return;
    }

    $response['status'] = true;
    $response['message'] = "passed";
    $response['data'] = $resultSet;
    echo json_encode($response);
}
catch (PDOException $e) {
    echo json_encode([
        'status'=>false,
        'message'=>$$e->getMessage(),
    ]);
}

?>