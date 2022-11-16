<?php

status :true;

$errorsArray = [
    "partyAccountNumber"=>"",
    "confirmPartyAccountNumber"=>"",
    "partyName"=>"",
    "purpose"=>"",
    "partyAmount"=>""
];

$doesErrorExist = true;
// for party account number

if(!isset($_POST["partyAccountNumber"])){
    array_push($errorsArray["partyAccountNumber"],"Please enter party account number");
    $doesErrorExist = false;

}

if(!isset($_POST["confirmPartyAccountNumber"])){
    array_push($errorsArray,"Please confirm party account number");
    $doesErrorExist = false;
}

if(!isset($_POST["partyName"])){
    array_push($errorsArray,"Please enter party name");
    $doesErrorExist = false;
}

if(!isset($_POST["purpose"])){
    array_push($errorsArray,"Please enter purpose");
    $doesErrorExist = false;
}

if(!isset($_POST["partyAmount"])){
    array_push($errorsArray,"Please enter party amount");
      $doesErrorExist = false;
}

if(!is_numeric($_POST["partyAccountNumber"])){
    array_push($errorsArray,"party account number should only contain numbers");
    $doesErrorExist = false;
}

if(!preg_match("/\d{12,22}/",$_POST["partyAccountNumber"])){
   array_push($errorsArray,"Party account number should be min 12 and max 22 digits");
   $doesErrorExist = false;
}

// for confirm party acount number

if(($_POST["partyAccountNumber"]) != ($_POST["confirmPartyAccountNumber"])){
    array_push($errorsArray,"Should be same as party account number");
    $doesErrorExist = false;
}

// for party name

if(preg_match("/[^A-Za-z0-9]/",$_POST["partyName"])){
    array_push($errorsArray,"party name Should not contain special charcters");
    $doesErrorExist = false;
}

// for purpose

if(strlen($_POST["purpose"]) >= 500){
    array_push($errorsArray,"Max 500 characters");
    $doesErrorExist = false;
}

// for party amount

$amount = $_POST["partyAmount"];

if($amount%1 != 0){
    array_push($errorsArray,"Party amount should not be in fractions");
    $doesErrorExist = false;
}

// for printing errors

if(count($errorsArray)>0){
    $response = ["status"=>false,"message"=>$errorsArray];
    echo json_encode($response);
}

else{
    $response = ["status"=>true,"message"=>"Success"];
    echo json_encode($response);
    return;

}

if(!$doesErrorExist = false){

    echo json_encode($errorsArray);
     
}
else{
    
}

?>