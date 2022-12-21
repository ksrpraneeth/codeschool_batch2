<?php

include "dbconnection.php";

$statement2=$pdo->prepare("select id from users where token =?");
$statement2->execute([$_POST['usertoken']]);
$id=$statement2->fetchAll(PDO::FETCH_ASSOC);


$statement=$pdo->prepare("select * from placeorder ,products,address where placeorder.product_id=products.id and placeorder.user_id=address.user_id and placeorder.user_id=? and  placeorder.status=1 order by orderid desc");
$statement->execute([$id[0]['id']]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);


$data=[];

for ($i=0;$i<count($result);$i++){
    $results=$result[$i];
    $groupby=$results['orderid'];
    
    if(!isset($data[$groupby])){
        $data[$groupby]=[];
    }
    array_push($data[$groupby],$results);
    }
   

if(count($result)==0){
    $response=["status"=>false,"message"=>"No orders placed or Order Rejected."];
    echo json_encode($response);
    return;
}
$response=["status"=>true,"output"=>$data];
echo json_encode($response);