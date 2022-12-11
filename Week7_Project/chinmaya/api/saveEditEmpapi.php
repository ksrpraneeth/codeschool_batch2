<?php
include "dbconnection.php";

try{
    $statement=$pdo->prepare("select * from employees where id=?");
    $statement->execute([$_POST['employeeId']]);
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
   

    $surename=$_POST['sureName'];
    $firstname=$_POST['firstName'];
    $lastaname=$_POST['lastName'];
    $doj=$_POST['doj'];
    $dob=$_POST['dob'];

     if(!$surename){
        $surename=$result[0]['surename'];
     }
     if(!$firstname){
        $firstname=$result[0]['firstname'];
     }
     if(!$lastaname){
        $lastaname=$result[0]['lastname'];
     }
     if(!$doj){
        $doj=$result[0]['date_of_joining'];
     }
     if(!$dob){
        $dob=$result[0]['dob'];

     }

     $statement2=$pdo->prepare("update employees set firstname=?,lastname=?,surename=?,date_of_joining=?,dob=?,gender=?,working_status_id=?,designation_id=?,location_id=?,created_at=now() where id=?");
    $isqueryexecute= $statement2->execute([$firstname,$lastaname,$surename,$doj,$dob,$_POST['gender'],$_POST['status'],$_POST['designation'],$_POST['location'],$_POST['employeeId']]);
    if(!$isqueryexecute){
        $response=["status"=>false,"message"=>"Can not update the employee"];
        echo json_encode($response);
        return;
    }
    $response=["status"=>true,"message"=>"Employee updated succesfully"];
    echo json_encode($response);


}
catch (PDOException $e) {
    $response=["status"=>false,"output"=>"Can not login"];
    echo json_encode($response);
    return;
}