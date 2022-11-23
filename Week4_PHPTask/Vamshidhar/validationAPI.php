<?php
//Party Account Number validation

$doesErrorExist = false;
$errors = [
    "partyAccountNoErrors" => [],
    "confirmAccountNoErrors" => [],
    "partyNameErrors" =>[],
    "purpose_error" =>[]

];
$partyAccountNo = isset($_POST['partyAccountNumber'])? $_POST['partyAccountNumber']: null;
$confirmAccountNo = isset($_POST['confirmAccountNumber']) ? $_POST['confirmAccountNumber'] : null ;
$partyName = isset($_POST['partyName']) ? $_POST['partyName'] :null;
$purpose = isset($_POST['purpose']) ? $_POST['purpose'] :null;



//Party Acc No Validation

if(!$partyAccountNo ) {
    $errors[ "partyAccountNoErrors"]= " Party account number is required";
    $doesErrorExist = true;
}
else{
    if(!is_numeric($partyAccountNo)){
        $errors[ "partyAccountNoErrors"][]= " Enter only numbers!";
        $doesErrorExist = true;         
    }
    
    $length = strlen($partyAccountNo);
    
    if(($length < 12) || ($length >22) ){
        $errors[ "partyAccountNoErrors"][]= " Invalid Account Number";
        $doesErrorExist = true;
       
    }    

}

//Confirm account no validation

if(!$confirmAccountNo){
    $errors["confirmAccountNoErrors"] = "Confirm Account Number key is required";
    $doesErrorExist = true;
}else{
    if(!is_numeric($confirmAccountNo)){
        $errors[ "confirmAccountNoErrors"][]= " Enter only numbers!";
        $doesErrorExist = true;         
    }
           
    if(($partyAccountNo) != ($confirmAccountNo)){
        $errors["confirmAccountNoErrors"][]= " Account number doesn't match";    
        $doesErrorExist = true;
    }
     
}

// Party Name validation

if(!$partyName){
    $errors["partyNameErrors"] = " Party Name key is missing";    
    $doesErrorExist = true;
}else{
    if(!preg_match("/^[a-zA-Z0-9 ]+$/",$partyName)){
        $errors["partyNameErrors"][] = " Special Characters are not accepted";    
        $doesErrorExist = true;
    }
    
}

// Purpose Validation

if(!$purpose ) {
    $errors[ "purpose_error"]= " Purpose is required";
    $doesErrorExist = true;
}
if(strlen($purpose)>500){
    $errors[ "purpose_error"]= " Max 500 Characters";
    $doesErrorExist = true;
}

if($doesErrorExist){
    echo json_encode($errors);
    return;
}

