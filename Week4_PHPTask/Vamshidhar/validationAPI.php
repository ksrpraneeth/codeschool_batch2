<?php
//Party Account Number validation

$doesErrorExist = false;
$errors = [
    "partyAccountNoErrors" => [],
    "confirmAccountNoErrors" => [],
    "partyNameErrors" =>[],

];


if(!array_key_exists("partyAccountNumber",$_POST)){
    $errors[ "partyAccountNoErrors"]= " Party account number key is missing";
    $doesErrorExist = true;
}

if(!array_key_exists("confirmAccountNumber",$_POST)){
    $errors["confirmAccountNoErrors"] = "confirm Account Number key is missing";
    $doesErrorExist = true;
}


if(!array_key_exists("partyName",$_POST)){
    $errors["partyNameErrors"] = " Party Name key is missing";    
    $doesErrorExist = true;
}


if($doesErrorExist){
    // echo "Mandatory fields are missing";
    echo json_encode($errors);
    return;
}

$errors = [
    "partyAccountNoErrors" => [],
    "confirmAccountNoErrors" => [],
    "partyNameErrors" =>[],


];


$partyAccountNo = $_POST['partyAccountNumber'];

if(!isset($partyAccountNo) || empty($partyAccountNo) ){
    $errors[ "partyAccountNoErrors"][]= " Please enter Party Account Number!";
    $doesErrorExist = true;


}
if(!is_numeric($partyAccountNo)){
    $errors[ "partyAccountNoErrors"][]= " Enter only numbers!";
    $doesErrorExist = true;
 

}

$length = strlen($partyAccountNo);

if(($length < 12) || ($length >22) ){
    $errors[ "partyAccountNoErrors"][]= " Invalid Account Number";
    $doesErrorExist = true;
   
}


//Confirm account no validation

   
$confirmAccountNo = $_POST['confirmAccountNumber'];

if(!isset($confirmAccountNo)|| empty($confirmAccountNo)){
    $errors["confirmAccountNoErrors"][] = " Confirm Account number is empty";
    $doesErrorExist = true;

}
        
if(($partyAccountNo) != ($confirmAccountNo)){
    $errors["confirmAccountNoErrors"][]= " Account number doesn't match";    
    $doesErrorExist = true;
     
}

// Party Name validation

$partyName = $_POST['partyName'];
if((!isset($partyName))|| empty($partyName)){
    $errors["partyNameErrors"][] = " Enter Party Name";    
    $doesErrorExist = true;
}

if((preg_match("/^[a-zA-Z0-9 ]+$/",$partyName))==0){
    $errors["partyNameErrors"][] = " Special Characters are not accepted";    
    $doesErrorExist = true;
}


if($doesErrorExist){
    echo json_encode($errors);
}

