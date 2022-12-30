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

// print_r($result);
// die();



if(count($result)==0){
    $response=["status"=>false,"output"=>"Please Enter Valid HOA"];
            echo json_encode($response);
            return;
 }

 $hoaId=$result[0]['id'];

//  print_r($hoaId);
//  die();


 $statement2=$pdo->prepare("select * from adminsanction where hoanumber=?");
 $statement2->execute([$hoaId]);
 $result2=$statement2->fetchAll(PDO::FETCH_ASSOC);

//  print_r($result2);
//  die();

 
 $response=["status"=>true,"output"=>$result2];
 echo json_encode($response);

