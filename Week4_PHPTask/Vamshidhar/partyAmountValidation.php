<?php
$errors = [
    "partyAmount_error" => [],
    "PartyAmountInWords" => []
];


if(!isset($_POST['partyAmount'])){
    $errors["partyAmount_error"][] = "Party Amount is required";
    echo json_encode($errors["partyAmount_error"]);
    return;
}


$partyAmount = $_POST['partyAmount'];

if($partyAmount==0){
    $errors[ "PartyAmountInWords"][]= " Zero";
    echo json_encode($errors["PartyAmountInWords"]);
    return;
}


if(!$partyAmount){
    $errors[ "partyAmount_error"][]= " Party Amount is empty!!";
    echo json_encode($errors["partyAmount_error"]);
    return;
}


if($partyAmount<0){
    $errors[ "partyAmount_error"][]= " Negative numbers are accepted!";
    echo json_encode($errors["partyAmount_error"]);
    return;
}

if(!is_numeric($partyAmount)){
    $errors[ "partyAmount_error"][]= " Enter only numbers!";
    echo json_encode($errors["partyAmount_error"]);
    return;
}

if(round($partyAmount)!=$partyAmount) {
    $errors[ "partyAmount_error"][]= " Fractions are not accepted";
    echo json_encode($errors["partyAmount_error"]);
    return;
}

// Numbers to words

$partyAmount = ltrim($partyAmount, "0");
echo $partyAmount;

if(strlen($partyAmount)>10){
    $errors[ "partyAmount_error"][]= " Number overflow(Enter value less than 100,00,00,000)";
    echo json_encode($errors["partyAmount_error"]);
    return;
}



?>