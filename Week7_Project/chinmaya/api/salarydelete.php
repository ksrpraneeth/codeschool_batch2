<?php
include "dbconnection.php";
try{


    $salaryid=$_POST['salartID'];
    $statement2=$pdo->prepare("delete from salary_details where salary_id=? and employee_id=?");
    $isqueryexecute2=$statement2->execute([$salaryid,$_POST['employeeid']]);
    
    

    if(!$isqueryexecute2){
        $response=["status"=>false,"message"=>"Can not delete"];
        echo json_encode($response);
        return;
    }
   
    $statement=$pdo->prepare("delete from salaries where id=? and month=? and year=? and employee_id=?");
    $isqueryexecute1=$statement->execute([$salaryid,$_POST['month'],$_POST['year'],$_POST['employeeid']]);

    if(!$isqueryexecute1){
        $response=["status"=>false,"message"=>"Can not delete"];
        echo json_encode($response);
        return;
    }

    $response=["status"=>true,"message"=>"Delete Salary data succesfully"];
    echo json_encode($response);

}
catch (PDOException $e) {
    $response=["status"=>false,"output"=>"Can not login"];
    echo json_encode($response);
    return;
}