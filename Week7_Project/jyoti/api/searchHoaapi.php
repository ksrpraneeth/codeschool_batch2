<?php


include "dbconnectionapi.php";


$status = true;


if(!array_key_exists('hoa',$_POST)){
    $status=false;
}


if (!$status){
    $response=["status"=>false,"output"=>"Please Enter HOA."];
    echo json_encode($response);
    return;
}

$hoaNumber=$_POST['hoa'];


$statement=$pdo->prepare("select * from hoa where hoa =?");
$statement->execute([$hoaNumber]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)==0){
    $response=["status"=>false,"output"=>"Please Enter Valid HOA"];
            echo json_encode($response);
            return;
 }
 $response=["status"=>true,"output"=>$result];
 echo json_encode($response);