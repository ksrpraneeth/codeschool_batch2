<?php
include "dbconnection.php";


try{
$statement=$pdo->prepare("select concat(e.surename,' ',e.firstname,' ',e.lastname) as name,sc.description,sd.amount from salary_details as sd
,salary_component as sc,salaries as s,employees as e
where sd.salary_component_id=sc.id and sd.salary_id=s.id and s.employee_id=e.id");

$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);



if(count($result)==0){
    $response=["status"=>false,"output"=>"something went wrong"];
    echo json_encode($response);
    return;
}



$response=["status"=>true,"output"=>$result];
echo json_encode($response);

}



catch (PDOException $e) {
    $response=["status"=>false,"output"=>"data is not found"];
    echo json_encode($response);
    return;


}