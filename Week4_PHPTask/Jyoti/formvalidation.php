<?php

$error= array();

if (!isset($_POST['partyAccountNumber'])){
     array_push($error,"Please Enter Party Account Number");
}
elseif (!is_numeric($_POST['partyAccountNumber'])){
    array_push($error,"Party Account Number schould be only Number");
    
}

elseif ((strlen($_POST['partyAccountNumber']))<12 or strlen(strlen($_POST['partyaccountNumber']))>22){
    array_push($error,' Party Account Number should be between 12 and 22 characters');
}

//conirm party account number
if(!isset($_POST['confirmPartyaccountNumber'])){
    array_push($error,' Confirm  Party Account Number schould not be kept blank');
   
}
elseif (($_POST['confirmPartyaccountNumber'])!=($_POST['partyAccountNumber'])){
    array_push($error,' Confirm Party Account Number mismatched, Please Enter correct Party Account Number');
    
}

//Party name

if (!isset($_POST['partyName'])){
    array_push($error,'Please Enter the Party Name');
    
}
elseif (is_numeric($_POST['partyName'])){
    array_push($error,"Party Name schould not contain any number");
    
}
elseif (preg_match("/[^a-zA-Z]+/",($_POST['partyName']))){
    array_push($error,"Party Name schould not contain any Special character");
}

if(count($error)>0){
    $response=["status"=>false,"output"=>$error];
      echo json_encode($response);

}  
?>