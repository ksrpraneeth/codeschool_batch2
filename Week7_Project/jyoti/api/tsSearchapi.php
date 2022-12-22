<?php


include "dbconnectionapi.php";
if(array_key_exists('asId',$_POST)){
    $statement=$pdo->prepare("select * from technicalsanction where as_id=?");
    $statement->execute([$_POST['asId']]);
    $result=$statement->fetchAll(PDO::FETCH_ASSOC); 
}
if(array_key_exists('tsid',$_POST)){
    $statement=$pdo->prepare("select * from technicalsanction where id=?");
    $statement->execute([$_POST['tsid']]);
    $result=$statement->fetchAll(PDO::FETCH_ASSOC); 
}



if(count($result)==0){
    $response=["status"=>false,"message"=>"Data not found"];
    echo json_encode($response);
    return;
}
 
 $response=["status"=>true,"output"=>$result];
 echo json_encode($response);
