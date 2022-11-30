<?php
include "dbconnection.php";
$statement=$pdo->prepare("select concat(e.surename,' ',e.firstname,' ',e.lastname),s.month,s.year,s.paid_on,s.gross,s.deduction,s.net,s.employee_id from employees as e,salaries as s where e.id=s.employee_id");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
if(count($result)==0){
    $response=["status"=>false,"message"=>"something went wrong"];
    echo json_encode($response);
    return;
}
$response=["status"=>true,"output"=>$result];
echo  json_encode($response);