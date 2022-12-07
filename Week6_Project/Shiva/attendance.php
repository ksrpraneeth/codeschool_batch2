<?php
include 'responce.php';
include 'db.php';
try {

    $statement = $pdo->prepare("SELECT o.name AS org_name, e.employee_name, e.mobile, e.designation, date(a.logintime) as logintime, a.logouttime
    FROM   employees AS e, organizations AS o, attendance AS a
    WHERE  e.organization_id=o.id AND a.employee_id=e.employee_id AND e.organization_id=? AND date(a.logintime)=?");
    $statement->execute([$_POST['org_id'],$_POST['date']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($resultSet) == 0) {
        $response['status'] = false;
        $response['message'] = "  No data found";
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