<?php

try {
   
    include "dbconnection.php";

    $id=$_POST['employeeid'];

    $statement=$pdo->prepare("select s.month,s.year,s.paid_on,s.gross,s.deduction,s.net from salaries as s where employee_id=?");
    $statement->execute([$id]);
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);

    $statement2=$pdo->prepare("select concat(e.surename,' ',e.firstname,' ',e.lastname) from employees as e where id=?");
    $statement2->execute([$id]);
    $name=$statement2->fetchAll(PDO::FETCH_ASSOC);

    if(count($result)==0 ){
        $response=["status"=>false,"message"=>"No salary","Data"=>$name];
        echo json_encode($response);
        return;
    }



    $response=["status"=>true,"message"=>"","Data"=>["salarydetails"=>$result,"employee_name"=>$name]];
    echo json_encode($response);

}


catch (PDOException $e) {
    
    $response=["status"=>false,"message"=>"Can not login"];
    echo json_encode($response);
    return;

}