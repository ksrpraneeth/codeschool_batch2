<?php

include 'db.php';

$result = [
    "status" => true,
    "message"=>"",
    "data"=>""
];


$statement = $pdo->prepare("select d.balance,d.saving,c.accounttype,c.firstname,c.lastname,c.aadharnumber,c.pannumber,c.mobilenumber,c.accountnumber,c.emailid,u.username,u.password from dashboard as d,customer_details as c,user_credentials as u where c.id = d.user_id AND c.id = u.userid AND c.id=?");
$statement->execute([$_POST['id']]);

$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
$result['status']=true;
$result['message']="";
$result['data'] = $resultSet;
echo json_encode($result);
return;