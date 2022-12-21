<?php
include "dbconnection.php";





$status=true;






    //if(!array_key_exists('usertoken',$_POST)){
        //$status=false;}


        if (!$status){
            $response=["status"=>false,"output"=>"Failed to Load"];
            echo json_encode($response);
            return;
        }


        
        $usertoken=$_POST['usertoken'];

        $statement=$pdo->prepare("select id from users where token =?");
        $statement->execute([$usertoken]);
        $userid=$statement->fetchAll(PDO::FETCH_ASSOC);
       
        $id=(int)$userid[0]['id'];
      
        
        
        $statement2=$pdo->prepare("select * from orders where userid=?");
       $isqueryexecuted= $statement2->execute([$id]);
$result3=$statement2->fetchAll(PDO::FETCH_ASSOC);
//print_r($result3);
;

 if(count($result3)==0){
    $response=["status"=>true,"output"=>"0"];
            echo json_encode($response);
            return;
 }
 $response=["status"=>true,"output"=>count($result3)];
 echo json_encode($response);
         

       


