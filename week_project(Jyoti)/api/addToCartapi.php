<?php
include "dbconnection.php";





$status=true;



if(!array_key_exists('productid',$_POST)){
    $status=false;}


    if(!array_key_exists('usertoken',$_POST)){
        $status=false;}


        if (!$status){
            $response=["status"=>false,"output"=>"Failed to Load"];
            echo json_encode($response);
            return;
        }


        $productName=$_POST['productid'];
        $usertoken=$_POST['usertoken'];

        $statement=$pdo->prepare("select id from users where token =?");
        $statement->execute([$usertoken]);
        $userid=$statement->fetchAll(PDO::FETCH_ASSOC);

        $statement2=$pdo->prepare("insert into orders(userid,productid)values(?,?)");
       $isqueryexecuted= $statement2->execute([$userid[0]['id'],$productName]);
         

       if($isqueryexecuted){
        $response=["status"=>true,"message"=>"Add to cart sucessfully"];
        echo json_encode($response);
       }



