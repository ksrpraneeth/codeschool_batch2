<?php
include "dbconnection.php";


try{

    $statement=$pdo->prepare("delete from employees where id=?");
    $isqueryexecuted=$statement->execute([$_POST['employeeid']]);
    if(!$isqueryexecuted){
        $response=["status"=>false,"message"=>"Can not delete emloyee"];
        echo json_encode($response);
        return;
    }

    $response=["status"=>true,"message"=>"Deleted Sucessfully"];
    echo json_encode($response);
    
}

catch(PDOException $e){
    $response=["status"=>false,"message"=>$e->getMessage()];
    echo json_encode($response);
}