<?php
include "dbconnection.php";
try{
    $statement=$pdo->prepare("select concat(e.surename,' ',e.firstname,' ',e.lastname),s.id,s.month,s.year,to_char(s.paid_on,'DD-MM-YYYY')as paid_on,to_char(s.gross,'fm999G999D99')as gross,to_char(s.deduction,'fm999G999D99')as deduction,to_char(s.net,'fm999G999D99')as net,s.employee_id from employees as e,salaries as s where e.id=s.employee_id");


     $statement->execute();
     $result=$statement->fetchAll(PDO::FETCH_ASSOC);





if(count($result)==0){
    $response=["status"=>false,"message"=>"Data not found"];
    echo json_encode($response);
    return;
}



$response=["status"=>true,
"message"=>"",
"Data"=>$result];
echo  json_encode($response);
}



catch (PDOException $e) {
    $response=["status"=>false,"output"=>"Can not login"];
    echo json_encode($response);
    return;
}