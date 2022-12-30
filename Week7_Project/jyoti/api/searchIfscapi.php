<?php


include "dbconnectionapi.php";


$status=true;

if(!array_key_exists('ifscCode',$_POST)){
    $status=false;}
   

    if (!$status){
        $response=["status"=>false,"output"=>"Please Enter IFSC Code."];
        echo json_encode($response);
        return;
    }



    
$ifscCode=$_POST['ifscCode'];

if(strlen($ifscCode)==0){
    $response=["status"=>false,"output"=>"Please Enter IFSC Code."];
        echo json_encode($response);
        return;
}

$statement=$pdo->prepare("select * from ifsc where ifsccode=? ");
$statement->execute([$ifscCode]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);


if(count($result)==0){
    $response=["status"=>false,"output"=>"IFSC Code not Found"];
            echo json_encode($response);
            return;
 }
 $response=["status"=>true,"output"=>$result];
 echo json_encode($response);




