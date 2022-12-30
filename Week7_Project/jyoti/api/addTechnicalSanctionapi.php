<?php

include "dbconnectionapi.php";


$status = true;

if ($_POST['tsNumber'] == '' || !array_key_exists('tsNumber', $_POST)) {
    $status = false;
}

if ($_POST['asId'] == '' || !array_key_exists('asId', $_POST)) {
    $status = false;
}

if ($_POST['tsAmount'] == '' || !array_key_exists('tsAmount', $_POST)) {
    $status = false;
}
if ($_POST['tsDate'] == '' || !array_key_exists('tsDate', $_POST)) {
    $status = false;
}
if ($_POST['sanctionAuthority'] == '' || !array_key_exists('sanctionAuthority', $_POST)) {
    $status = false;
}



if(!$status){
    $response=["status"=>false,"message"=>"Please Select all the Fields."];
    echo json_encode($response);
    return;
}

$statement=$pdo->prepare("select * from technicalsanction where tsnumber=?");
$statement->execute([$_POST['tsNumber']]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)!=0){
    $response=["status"=>false,"message"=>"TS Number already exist"];
    echo json_encode($response);
    return;
}


$statement2=$pdo->prepare("insert into technicalsanction (tsnumber,as_id,tssanctionauthority,tsdate,tsamount) values(?,?,?,?,?)");
$isqueryexecuted=$statement2->execute([$_POST['tsNumber'],$_POST['asId'],$_POST['sanctionAuthority'],$_POST['tsDate'],$_POST['tsAmount']]);

if(!$isqueryexecuted){
    $response=["status"=>false,"message"=>"Failed to Add Technical Sanction ."];
    echo json_encode($response);
    return;
};

$response=["status"=>true,"output"=>"Technical Sanction Added Successfully."];
echo json_encode($response);