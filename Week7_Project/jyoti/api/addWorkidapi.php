<?php

include "dbconnectionapi.php";

// print_r($_POST);
// die();
$status = true;

if ($_POST['hoaID'] == '' || !array_key_exists('hoaID', $_POST)) {
    $status = false;
}

if ($_POST['asId'] == '' || !array_key_exists('asId', $_POST)) {
    $status = false;
}

if ($_POST['tsId'] == '' || !array_key_exists('tsId', $_POST)) {
    $status = false;
}
if ($_POST['agreementNumber'] == '' || !array_key_exists('agreementNumber', $_POST)) {
    $status = false;
}
if ($_POST['workName'] == '' || !array_key_exists('workName', $_POST)) {
    $status = false;
}
if ($_POST['sanctionAuthority'] == '' || !array_key_exists('sanctionAuthority', $_POST)) {
    $status = false;
}

if ($_POST['estimateValue'] == '' || !array_key_exists('estimateValue', $_POST)) {
    $status = false;
}

if ($_POST['agreementValue'] == '' || !array_key_exists('agreementValue', $_POST)) {
    $status = false;
}
if ($_POST['expenditureTillDate'] == '' || !array_key_exists('expenditureTillDate', $_POST)) {
    $status = false;
}
if ($_POST['pendingBillAmount'] == '' || !array_key_exists('pendingBillAmount', $_POST)) {
    $status = false;
}
if ($_POST['tenderPercentage'] == '' || !array_key_exists('tenderPercentage', $_POST)) {
    $status = false;
}

if ($_POST['ssrYear'] == '' || !array_key_exists('ssrYear', $_POST)) {
    $status = false;
}

if ($_POST['startDate'] == '' || !array_key_exists('startDate', $_POST)) {
    $status = false;
}
if ($_POST['workPeriodMonth'] == '' || !array_key_exists('workPeriodMonth', $_POST)   || $_POST['workPeriodDate'] == '' || !array_key_exists('workPeriodDate', $_POST)) {
    $status = false;
}

if ($_POST['expectedDateCompletion'] == '' || !array_key_exists('expectedDateCompletion', $_POST)) {
    $status = false;
}
if ($_POST['panId'] == '' || !array_key_exists('panId', $_POST)) {
    $status = false;
}



if(!$status){
    $response=["status"=>false,"message"=>"Please Select all the Fields."];
    echo json_encode($response);
    return;
}


$statement=$pdo->prepare("select * from workid where agreementno =?");
$statement->execute([$_POST['agreementNumber']]);
$result=$statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)!=0){
    $response=["status"=>false,"message"=>"Agreement Number Number already exist"];
    echo json_encode($response);
    return;
}

$statement2=$pdo->prepare("insert into workid (hoa_id,as_id,ts_id,agreementno,workname,sanctionauthority,estimatevalue,agreementvalue,expendituretilldate,pendingbillamount,tenderpercentage,ssryear,startdate,workperiodmonth,workperiodday,expecteddatecompletion) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$isqueryexecuted=$statement2->execute([$_POST['hoaID'],$_POST['asId'],$_POST['tsId'],$_POST['agreementNumber'],$_POST['workName'],$_POST['sanctionAuthority'],$_POST['estimateValue'],$_POST['agreementValue'],$_POST['expenditureTillDate'],$_POST['pendingBillAmount'],$_POST['tenderPercentage'],$_POST['ssrYear'],$_POST['startDate'],$_POST['workPeriodMonth'],$_POST['workPeriodDate'],$_POST['expectedDateCompletion']]);


if(!$isqueryexecuted){
    $response=["status"=>false,"message"=>"Work Id addition failed"];
    echo json_encode($response);
    return;
}

$statement3=$pdo->prepare("select id from workid order by id desc limit 1");
$statement3->execute();
$workId=$statement3->fetchAll(PDO::FETCH_ASSOC);

for($i=0;$i<count($_POST['panId']);$i++){
    $statement4=$pdo->prepare("insert into workidpan (work_id,pan_id) values(?,?)");
  $execute=  $statement4->execute([$workId[0]['id'],$_POST['panId'][$i]]);

}

if(!$execute){
    $response=["status"=>false,"message"=>"Agency Addition Failed"];
    echo json_encode($response);
    return;
}


$response=["status"=>true,"message"=>"WorkId and Agency saved succesfully"];
echo json_encode($response);
return;