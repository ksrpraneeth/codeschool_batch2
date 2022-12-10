<?php
include "dbconnection.php";
try{


    $salaryid=$_POST['salartID'];
    $statement=$pdo->prepare("delete from salaries where id=?");
    $isqueryexecute1=$statement->execute([$salaryid]);

    if(!$isqueryexecute1){
        $response=["status"=>false,"message"=>"Can not delete"];
        echo json_encode($response);
        return;
    }

    $statement2=$pdo->prepare("delete from salary_details where salary_id=?");
    $isqueryexecute2=$statement2->execute([$salaryid]);
    if(!$isqueryexecute2){
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