<?php
include('dbconnect.php');

$statement=$pdo->prepare("delete from timetable where timeid=? and dayid=?");
$isqueryexecuted=$statement->execute([$_POST['dayId'],$_POST['timeId']]);

if(!$isqueryexecuted){
    $response=["status"=>false,"message"=>"Delelted unsuccesfull"];
    echo json_encode($response);
    return;
}

$response=["status"=>true,"message"=>"Delelted Succesfully"];
echo json_encode($response);