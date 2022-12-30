<?php
include('dbconnect.php');
$response = [];
$statement = $pdo->prepare("select * from users where id=?");
$statement->execute([$_POST['UserId']]);
$result = $statement->fetchall(PDO::FETCH_ASSOC);
if($result){
    $response['status']=true;
    $response['output']=$result;
    echo json_encode($response);
    return;
}


?>