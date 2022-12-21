<?php
include('dbconnect.php');
$response = [];
$statement = $pdo->prepare("select * from timetable as t ,deliveryday as d where d.dayid=t.dayid and d.dayid=?");
$statement->execute([$_POST['deliveryDay']]);
$result = $statement->fetchall(PDO::FETCH_ASSOC);
if($result){
    $response['status']=true;
    $response['output']=$result;
    echo json_encode($response);
    return;
}


?>