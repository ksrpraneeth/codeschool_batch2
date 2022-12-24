<?php
include 'responce.php';
include 'db.php';


try {

    $statement = $pdo->prepare("update tasks set extended_date = ?, remarks = ?, status=2 where employee_id = ?;");
    $isQueryExecuted = $statement->execute([ ($_POST['extended_date']),($_POST['remarks']),($_POST['employee_id'])]);
    if($isQueryExecuted){
        $response['status']=true;
        $response['message']="Update successful";
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