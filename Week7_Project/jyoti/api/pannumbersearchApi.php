<?php


include "dbconnectionapi.php";




if(!array_key_exists('pan',$_POST) || $_POST['pan']==''){
    $response=["status"=>false,"message"=>"Invalid input"];
    echo json_encode($response);
    return; 
}


// if(!array_key_exists('workId',$_POST) || $_POST['workId']==''){
//     $response=["status"=>false,"message"=>"Please Enter Agreement Number."];
//     echo json_encode($response);
//     return; 
// }
$statement=$pdo->prepare("select * from agency where pannumber=?");

$statement->execute([$_POST['pan']]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)==0){
    $response=["status"=>false,"message"=>"No pan number found"];
    echo json_encode($response);
    return;

}

$response=["status"=>true,"output"=>$result];
    echo json_encode($response);

