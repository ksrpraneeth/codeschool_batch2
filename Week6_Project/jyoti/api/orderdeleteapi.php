<?php

include "dbconnection.php";

if($_POST['status']){
$statement=$pdo->prepare("delete from placeorder where orderid=?");
$isqueryexecuted=$statement->execute([$_POST['orderId']]);
if(!$isqueryexecuted){
   $response=["status"=>false,"message"=>"Rejected order failed"];
   echo json_encode($response);
   return;
}
$response=["status"=>true,"message"=>"Rejected order succesfully"];
echo json_encode($response);}