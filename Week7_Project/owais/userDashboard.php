<?php

include 'api/db.php';

$result = [
    "status" => true,
    "message"=>"",
    "data"=>""
];


$statement = $pdo->prepare("select d.balance,d.saving,d.credited,d.debited,c.accountnumber from dashboard as d,customer_details as c where c.id = d.user_id AND c.id=?");
$statement->execute([$_POST['id']]);

$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
$result['status']=true;
$result['message']="";
$result['data'] = $resultSet;
echo json_encode($result);
return;
