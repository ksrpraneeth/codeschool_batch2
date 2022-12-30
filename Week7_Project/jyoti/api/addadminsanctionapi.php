<?php


include "dbconnectionapi.php";
$status = true;

if ($_POST['finacialyear'] == '' || !array_key_exists('finacialyear', $_POST)) {
    $status = false;
}

if ($_POST['typeofSan'] == '' || !array_key_exists('typeofSan', $_POST)) {
    $status = false;
}

if ($_POST['date'] == '' || !array_key_exists('date', $_POST)) {
    $status = false;
}
if ($_POST['adminsanctionnumber'] == '' || !array_key_exists('adminsanctionnumber', $_POST)) {
    $status = false;
}
if ($_POST['amount'] == '' || !array_key_exists('amount', $_POST)) {
    $status = false;
}
if ($_POST['hoa'] == '' || !array_key_exists('hoa', $_POST)) {
    $status = false;
}
if ($_POST['department'] == '' || !array_key_exists('department', $_POST)) {
    $status = false;
}
if ($_POST['sanctionauthority'] == '' || !array_key_exists('sanctionauthority', $_POST)) {
    $status = false;
}


if(!$status){
    $response=["status"=>false,"message"=>"Please Select all the Fields."];
    echo json_encode($response);
    return;
}

$statement=$pdo->prepare("select * from adminsanction where asnumber=?");
$statement->execute([$_POST['adminsanctionnumber']]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)!=0){
    $response=["status"=>false,"message"=>"AS Number already exist"];
    echo json_encode($response);
    return;
}


$statement2=$pdo->prepare("insert into adminsanction (asnumber,hoanumber,sanctionauthority,asdate,year,department_id,asamount,typeofsanction) values(?,?,?,?,?,?,?,?)");
$isqueryexecuted=$statement2->execute([$_POST['adminsanctionnumber'],$_POST['hoa'],$_POST['sanctionauthority'],$_POST['date'],$_POST['finacialyear'],$_POST['department'],$_POST['amount'],$_POST['typeofSan']]);

if(!$isqueryexecuted){
    $response=["status"=>false,"message"=>"Failed to Add Admin Sanction ."];
    echo json_encode($response);
    return;
};

$response=["status"=>true,"output"=>"Admin Sanction Added Successfully."];
echo json_encode($response);
