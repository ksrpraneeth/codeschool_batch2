<?php
include 'responce.php';
include 'db.php';

try {

$statement = $pdo->prepare("update tasks set status = ? where employee_id= ? ;");
$isQueryExecuted = $statement->execute([ ($_POST['status']),($_POST['employee_id'])]);
if($isQueryExecuted){
    $response['status']=true;
    $response['message']="Task Completed";
    echo json_encode($response);
    return;
}
}
catch (PDOException $e) {
echo json_encode([
    'status'=>false,
    'message'=>$e->getMessage(),
]);
}

?>