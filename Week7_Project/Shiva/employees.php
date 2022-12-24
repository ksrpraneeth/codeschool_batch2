<?php
include 'responce.php';
include 'db.php';

try {
    // die('message');
    $statement = $pdo->prepare("SELECT e.organization_id,e.id,e.employee_id, o.name AS org_name, e.employee_name, e.mobile,  e.email_id, e.income, d.description AS designation 
    FROM   employees AS e, organizations AS o, designations AS d
    WHERE  e.organization_id=o.id AND e.designation=d.id and o.id=?");
    $statement->execute([$_POST['oid']]);
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