<?php
include('dbconnect.php');
 $statement1=$pdo->prepare("delete from orderdetails where productid=?");
 $isqueryexecuted1=$statement1->execute([$_POST['productid']]);

 if($isqueryexecuted1 == false){
    $response=["status"=>false,"message"=>"can not delete the item"];
    echo json_encode($response);
    return;
}


$statement2=$pdo->prepare("delete from products where productid=?");
$isqueryexecuted2=$statement2->execute([$_POST['productid']]);
if($isqueryexecuted2 == false){
    $response=["status"=>false,"message"=>"can not delete the item"];
    echo json_encode($response);
    return;
}
$response=["status"=>true,"message"=>"Item deleted succesfully"];
echo json_encode($response);
