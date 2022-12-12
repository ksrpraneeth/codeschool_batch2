<?php
 include "dbconnection.php";
 try{

    $statement=$pdo->prepare("select * from salaries where employee_id=? and month=? and year=?");
    $statement->execute([$_POST['employeeid'],$_POST['month'],$_POST['year']]);
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);

    if(count($result)!=0){
        $response=["status"=>false,"message"=>"Salary already exist"];
        echo json_encode($response);
        return;
    }
    $statement2=$pdo->prepare("insert into salaries (employee_id,month,year,paid_on,gross,deduction,net)values(?,?,?,?,?,?,?)");
   $isqueryexecute= $statement2->execute([$_POST['employeeid'],$_POST['month'],$_POST['year'],$_POST['paid_on'],$_POST['gross'],$_POST['deduction'],$_POST['netsalary']]);

   if(!$isqueryexecute){
    $response=["status"=>false,"message"=>"Failed to add salary"];
        echo json_encode($response);
        return;
   }


   
  

   
   $response=["status"=>true,"message"=>"Salary added succesfully"];
   echo json_encode($response);


 }
 catch (PDOException $e) {
    
    $response=["status"=>false,"message"=>"Can not login"];
    echo json_encode($response);
    return;

}