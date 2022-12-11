<?php
include "dbconnection.php";
try{


    $salaryid=$_POST['salartID'];
    $statement=$pdo->prepare("delete from salaries where id=? and month=? and year=?");
    $isqueryexecute1=$statement->execute([$salaryid,$_POST['month'],$_POST['year']]);

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