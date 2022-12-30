<?php

include "dbconnection.php";

$status = true;

if ($_POST['employeeName'] == '' || !array_key_exists('employeeName', $_POST)) {
    $status = false;
}

if ($_POST['employeeId'] == '' || !array_key_exists('employeeId', $_POST)) {
    $status = false;
};
if ($_POST['addressaray'] == '' || !array_key_exists('addressaray', $_POST)) {
    $status = false;
};
if ($_POST['userId'] == '' || !array_key_exists('userId', $_POST)) {
    $status = false;
};
   



if(!$status){
    $response=["status"=>false,"message"=>"Please Select all the Fields."];
    echo json_encode($response);
    return;
}




$statement5=$pdo->prepare("select * from employee where employeeid=? ");
$statement5->execute([$_POST['employeeId']]);
$result5=$statement5->fetchAll(PDO::FETCH_ASSOC);
if(count($result5)!=0){
    $response=["status"=>false,"message"=>"Employee Already Exist"];
    echo json_encode($response);
    return;
}



$statement=$pdo->prepare("insert into employee (name,employeeid,user_id) values(?,?,?)");
$isexecuted=$statement->execute([$_POST['employeeName'],$_POST['employeeId'],$_POST['userId']]);
if(!$isexecuted){
    $response=["status"=>false,"message"=>"Data addition failed"];
    echo json_encode($response);
    return;
}


$statement4=$pdo->prepare("select id from employee order by id desc limit 1");
$statement4->execute();
$employeeid=$statement4->fetchAll(PDO::FETCH_ASSOC);





$address=$_POST['addressaray'];
// print_r($address);
// die();

for($i=0;$i<count($address);$i++){
$statement2=$pdo->prepare("insert into address (employee_id,address) values(?,?)");
$isexecuted2=$statement2->execute([$employeeid[0]['id'],$address[$i]]);
}
if(!$isexecuted2){
    $response=["status"=>false,"message"=>"Data addition failed"];
    echo json_encode($response);
    return;
}


$response=["status"=>true,"message"=>"Information saved succesfully"];
echo json_encode($response);