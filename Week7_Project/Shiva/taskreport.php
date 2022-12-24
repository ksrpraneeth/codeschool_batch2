<?php
include 'responce.php';
include 'db.php';

if(!array_key_exists('organization_id',$_POST)){
    $response['status']=false;
    $response['message']="Select Organization";
    echo json_encode($response);
    return;
}

if(strlen($_POST['organization_id'])==0){
    $response['status']=false;
    $response['message']="Select Organization";
    echo json_encode($response);
    return;
}

if(!array_key_exists('status',$_POST)){
    $response['status']=false;
    $response['message']="Select filter";
    echo json_encode($response);
    return;
}

if(strlen($_POST['status'])==0){
    $response['status']=false;
    $response['message']="Select filter";
    echo json_encode($response);
    return;
}

try {
    $statement = $pdo->prepare("select organization_id from organizations where id=?;");
    $statement->execute([$_POST['organization_id']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    $orgid = $resultSet[0]['organization_id'];

    $statement = $pdo->prepare("SELECT * FROM tasks
    where status = ? and employee_id::text like '$orgid%';");
    $statement->execute([$_POST['status']]);
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
        'message'=>$e->getMessage(),
    ]);
}

?>