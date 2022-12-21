<?php
include('dbconnect.php');
$response = [];
$statement = $pdo->prepare("update users set email=?, password=?,roleid=? where id=?");
$statement->execute([$_POST['email'],$_POST['password'],$_POST['roleId'],$_POST['userId']]);
$result = $statement->fetchall(PDO::FETCH_ASSOC);
if($result){
    $response['status']=true;
    $response['output']=$result;
    echo json_encode($response);
    return;
}


?>