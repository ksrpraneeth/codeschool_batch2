<?php

include "dbconnection.php";




if($_POST['status']){
 $statement=$pdo->prepare("update placeorder set status=1 where orderid=?");
 $isqueryexecuted=$statement->execute([$_POST['orderId']]);
 if(!$isqueryexecuted){
    $response=["status"=>false,"message"=>"Approved order failed"];
    echo json_encode($response);
    return;
 }
 $response=["status"=>true,"message"=>"Approved order succesfully"];
    echo json_encode($response);
   



}


