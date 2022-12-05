<?php
include "dbconnection.php";


$usertoken=$_POST['userid'];

$statement=$pdo->prepare("select id from users where token =?");
$isqueryexecuted=$statement->execute([$usertoken]);

if(!$isqueryexecuted){
    $response=["status"=>false,"message"=>"Data not found"];
    echo json_encode($response);
    return;
}
$result=$statement->fetchAll(PDO::FETCH_ASSOC);



$statement2=$pdo->prepare("select productid from orders where userid=?");
$statement2->execute([$result[0]['id']]);
$productid=$statement2->fetchAll(PDO::FETCH_ASSOC);

if(count($productid)==0){
    $response=["status"=>false,"message"=>"NO item in cart"];
    echo json_encode($response);
    return;
}


for ($i=0;$i<count($productid);$i++){
    $statement3=$pdo->prepare("insert into placeorder(user_id,product_id)values(?,?)");
    $statement3->execute([$result[0]['id'],$productid[$i]['productid']]);
}

$placeorderdetails=$statement3->fetchAll(PDO::FETCH_ASSOC);


if(count($placeorderdetails)==0){
    $response=["status"=>false,"message"=>"NO Order Placed"];
    echo json_encode($response);
    return;
}

$statement4=$pdo->prepare("delete from orders where userid=?");
 $isexecute=$statement4->execute([$result[0]['id']]);
if(!$isexecute)
{
    $response=["status"=>false,"message"=>"Something went wrong"];
    echo json_encode($response);
    return;
}
$response=["status"=>true,"message"=>"Order placed succesfully"];
    echo json_encode($response);


