<?php

$ifsccode=$_POST['ifsc_Code'];
$ifscError=["iffsccodeError"=>[]];
$status=true;
if(!$ifsccode){
    array_push($ifscError['iffsccodeError'],"IFSC code can not be blank");
    $response=["status"=>false,"output"=>$ifscError];
    
    echo json_encode($response);
    return;
}
if(strlen($ifsccode)!=11){
    array_push($ifscError['iffsccodeError'],"IFSC code should be 11 character");
    $response=["status"=>false,"output"=>$ifscError];
    
    echo json_encode($response);
    return;
}
if(preg_match('/[^a-zA-z0-9]/',$ifsccode)){
    array_push($ifscError['iffsccodeError'],"Special character are not allowed");
    $status=false;
}
if(preg_match('/[^a-zA-z]/',substr($ifsccode,0,4))){
    array_push($ifscError['iffsccodeError'],"First four sholud be in character");
    $status=false;   
}
if(substr($ifsccode,0,4)!=strtoupper(substr($ifsccode,0,4)) ){
    array_push($ifscError['iffsccodeError'],"First four sholud be in uppercase");
    $status=false;
}
if($ifsccode[4]!=0){
    array_push($ifscError['iffsccodeError'],"Fifth character should be zero");
    $status=false; 
}
if(!$status){
    $response=["status"=>false,"output"=>$ifscError];
   
    echo json_encode($response);
    return;
}


 
 
$bankName=array(
    "SBIN0123456"=>["bankName"=>"STATE BANK OF INDIA","bankLocation"=>"JUBLIE HILLS"],
    "BRBO0789456"=>["bankName"=>"BANK OF BORODA","bankLocation"=>"AMEREPET"],
    'ICIC0456123'=>["bankName"=>"ICICI BANK","bankLocation"=>"SR NAGAR"]
);
if(!array_key_exists($ifsccode,$bankName)){
    array_push($ifscError['iffsccodeError'],"Invalid IFSC code");
    $response=["status"=>false,"output"=>$ifscError];
   
    echo json_encode($response);
    return;
   
}
$response=["status"=>true,"output"=>$bankName[$ifsccode]];

echo json_encode($response);

    



