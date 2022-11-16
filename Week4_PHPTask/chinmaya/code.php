<?php

$accountnumber=$_POST['party_Account_Number'];
$error=["accountNumbererror"=>[],
"confirmaccountNumbererror"=>[],
"partyNameerror"=>[]
];
$status=true;

#account number cheack
if(!$accountnumber){
    array_push($error['accountNumbererror'],"Account number can not be blank");
    $status=false;
   
}
if($status){
    if(strlen($accountnumber)<12 or strlen($accountnumber)>22 ){
    
        array_push($error['accountNumbererror'],"Account number should contan minimum 12 and maximum 22 character");
        $status=false;
    }
    if(is_numeric($accountnumber)!=1){
        array_push($error['accountNumbererror'],"Account number should be number only");
        $status=false;
    }
}
//confirm account number validation

$confirmpartyaccountNumber=$_POST['confirm_Party_Account_Number'];
if(!$confirmpartyaccountNumber){
    array_push($error['confirmaccountNumbererror'],"Enter Confirm Account number");
    $status=false;
}
if($confirmpartyaccountNumber!=$accountnumber){
    array_push($error['confirmaccountNumbererror'],"Confirm Party Account Number should be same as Account number");
    $status=false;
}
//validating the party name:
$partyname=$_POST['party_Name'];
if(!$partyname){
    array_push($error['partyNameerror'],"Enter Party Name");
    $status=false;
}
if(preg_match('/[^a-zA-Z]/',$partyname)==1){
    array_push($error['partyNameerror']," Party Name can not contain number and special character");
    $status=false;
}
//cheacking empty ifsc code
$ifsccode=$_POST['ifsc_Code'];
if(!$ifsccode){
    $error['ifscCodeerror']="IFSC code can not be blank";
    $status=false;
}
elseif(strlen($ifsccode)!=11){
    $error['ifscCodeerror']="IFSC code should be 11 character";
    $status=false;
}
elseif(preg_match('/[^a-zA-z0-9]/',$ifsccode)){
    $error['ifscCodeerror']="Special character are not allowed";
    $status=false;
}
elseif(preg_match('/[^a-zA-z]/',substr($ifsccode,0,4))){
    $error['ifscCodeerror']="First four sholud be in character";
    $status=false;  
}
elseif(substr($ifsccode,0,4)!=strtoupper(substr($ifsccode,0,4))){
    $error['ifscCodeerror']="First four sholud be in uppercase";
    $status=false; 
}
elseif($ifsccode[4]!=0){
    $error['ifscCodeerror']="fifth character should be zero";
    $status=false; 
}
//cheacking for head of account
$headAccount=$_POST['head_Of_Account'];
if($headAccount=='options'){
    $error['headofAccounterror']="Head Of account can not be blank";
    $status=false;
}
//expenditure type blank cheack
$expenditureTypee=$_POST['expenditure_Type'];
if($expenditureTypee=="option"){
    $error['expenditureTypeerror']="Expenditure type can not be blank";
    $status=false;
}
//party amount cheack
$partyamount=$_POST['party_Amount'];
if(!$partyamount){
    $error['partyAmounterror']="Party amount error can not be blank";
    $status=false;
}
if(!$status){
    $coderesponse=["status"=>false,"output"=>$error];
json_encode ($coderesponse);
echo json_encode ($coderesponse);
return;
}

