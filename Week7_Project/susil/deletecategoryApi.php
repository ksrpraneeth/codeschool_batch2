<?php
include('dbconnect.php');
 $statement1=$pdo->prepare("delete from products where categoryid=?");
 $isqueryexecuted1=$statement1->execute([$_POST['categoryid']]);

 if($isqueryexecuted1 == false){
    $response=["status"=>false,"message"=>"can not delete the item"];
    echo json_encode($response);
    return;
}


$statement2=$pdo->prepare("delete from categories where categoryid=?");
$isqueryexecuted2=$statement2->execute([$_POST['categoryid']]);
if($isqueryexecuted2 == false){
    $response=["status"=>false,"message"=>"can not delete the item"];
    echo json_encode($response);
    return;
}
$response=["status"=>true,"message"=>"Item deleted succesfully"];
echo json_encode($response);
