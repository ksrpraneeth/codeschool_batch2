<?php
include 'responce.php';
include 'db.php';

try {
    // die('message');
    $statement = $pdo->prepare("SELECT e.employee_id, o.name AS org_name, e.employee_name, e.mobile,  e.email_id, e.income, d.description AS designation 
    FROM   employees AS e, organizations AS o, designations AS d
    WHERE  e.organization_id=o.id AND e.designation=d.id");
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($response) == 0) {
        $response['status'] = false;
        $response['message'] = "no data found";
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