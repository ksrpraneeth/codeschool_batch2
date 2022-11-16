<?php
$errors = [
    "partyAccountNumber" => [],
    "confirmAccountnumber" => [],
    "partyname" => [],
    "purpose" =>[]
];
$isErrorExist = false;
//partyaccountnumber
if (!isset($_POST["partyAccountnumber"])){
    array_push($errors["partyAccountNumber"],"please enter party account number");
    $isErrorExist = true;
}
if(array_key_exists("partyAccountnumber", $_POST)){  
    if(!is_numeric($_POST["partyAccountnumber"])){
        array_push($errors["partyAccountNumber"], "Enter only numbers"); 
        $isErrorExist = true;
    }
    $range =strlen($_POST["partyAccountnumber"]);
     if(($range < 12)|| ($range >22) ){
        array_push($errors["partyAccountNumber"],"Account number should be between 12 and 22");
        $isErrorExist = true;
    }
}
//ConfirmAccountNumber
if(!isset($_POST["confirmAccountnumber"])){
    array_push($errors["confirmAccountnumber"], "Enter the party account number");
    $isErrorExist = true;
}
if(array_key_exists("confirmAccountnumber", $_POST)){
  if($_POST["partyAccountnumber"] != $_POST["confirmAccountnumber"]){
      array_push($errors[ "confirmAccountnumber"],"Account number doesnot match");
      $isErrorExist = true;
    }
 }
 // partyname
 if (!isset($_POST["partyname"])){
    array_push($errors["partyname"],"Enter party Name");
    $isErrorExist = true;
}
if(array_key_exists("partyname", $_POST)){
$partyname =$_POST["partyname"];

if (preg_match("/[^a-z0-9A-Z]/",$partyname)){
    array_push($errors["partyname"],"Party name shouldnot contain special characters");
    $isErrorExist = true;
}
}
// purpose
if (!isset($_POST["purpose"])){
    array_push($errors["purpose"], "Please enter your purpose");
    $isErrorExist = true;
}
if(array_key_exists("purpose",$_POST)){
$range = strlen($_POST["purpose"]);
 if(($range < 0)|| ($range >10) ){
    array_push($errors["purpose"],"Purpose should be between 0 and 10 characters");
    $isErrorExist = true;
}
}
// echo count($errors);
if($isErrorExist){
    $response = ["status"=>false,"message"=>$errors];
    echo json_encode($response);
    return;
} 
else {
    $response = ["status"=>true,"message"=>"Success"];
    echo json_encode($response);
    return;   
}

// print_r($errors);
