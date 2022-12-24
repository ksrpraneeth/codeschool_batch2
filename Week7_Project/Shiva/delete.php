<?php
include 'responce.php';
include 'db.php';

try {
      
$statement = $pdo->prepare("DELETE FROM employees WHERE id = ? and organization_id=?;");
$isQueryExecuted = $statement->execute([$_POST['tid'],$_POST['ogid']]);
if(!$isQueryExecuted){
    $response['status']=false;
    $response['message']="Delete can not be perform";
    echo json_encode($response);
    return;
}
$response['status']=true;
$response['message']="Deleted successfully";
echo json_encode($response);
}
catch (PDOException $e) {
echo json_encode([
    'status'=>false,
    'message'=>$e->getMessage(),
]);
}

?>