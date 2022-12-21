<?php

include "dbconnection.php";




if($_POST['status']){
 $statement=$pdo->prepare("update placeorder set status=1 where orderid=?");
 $isqueryexecuted=$statement->execute([$_POST['orderId']]);
 if(!$isqueryexecuted){
    $response=["status"=>false,"message"=>"Aproved order failed"];
    echo json_encode($response);
    return;
 }
 $response=["status"=>true,"message"=>"Aproved order succesfully"];
    echo json_encode($response);
   



}

else{

    $statement=$pdo->prepare("update placeorder set status=0 where orderid=?");
 $isqueryexecuted=$statement->execute([$_POST['orderId']]);
 if(!$isqueryexecuted){
    $response=["status"=>false,"message"=>"Rejected order failed"];
    echo json_encode($response);
    return;
 }
 $response=["status"=>true,"message"=>"Rejected order succesfully"];
 echo json_encode($response);
 
}
