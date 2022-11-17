<?php

$errors = [
    "partyAccountnoerr"=>[],
    "confirmPartyaccountnoerr"=>[],
    "partyNameerr"=>[],
];

$data = [];


$partyAccountno = isset($_POST['partyAccountno']) ? $_POST['partyAccountno'] : null;


if (empty($partyAccountno)) {
    array_push($errors["partyAccountnoerr"],"Please enter party Account no");
} 
else {
    if (strlen($partyAccountno) < 12 || strlen($partyAccountno) > 22) {
       array_push($errors["partyAccountnoerr"] ,"Account no should be greaterthan 12 and lessthan 22 digits");
    }
}
$confirmPartyaccountno = isset($_POST['confirmPartyaccountno']) ? $_POST["confirmPartyaccountno"] : null;
if (empty($confirmPartyaccountno)) {
    array_push($errors["confirmPartyaccountnoerr"] , "Please enter party Account no");
} else {
    $confirmPartyaccountno = $_POST['confirmPartyaccountno'];
    if ($confirmPartyaccountno != $partyAccountno) {
    array_push($errors["confirmPartyaccountnoerr"] , "Account no doesn't match");
    }
}

$partyName = isset($_POST['partyName']) ? $_POST["partyName"] : null;
if (empty($partyName)) {
    array_push($errors["partyNameerr"], "Please enter party Name");
} else {
    $partyName = $_POST['partyName'];
    if (preg_match("[^a-zA-Z0-9]", $partyName)) {
         array_push($errors["partyNameerr"],"Party Name should not contain any Special Characters");
    }
}
if (count($errors) > 0) {
    echo json_encode(['status' => false, 'errors' => $errors]);
} else {
   echo json_encode(['status' => true, 'data' => $data]);
}
?>