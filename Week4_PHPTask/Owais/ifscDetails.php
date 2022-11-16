<?php

$result = [
    "status"=>false,
    "error"=>'',
    "data"=>[]
];

if(!isset($_POST["ifscCode"])){
    $result["status"] = false;
    $result["error"] = "Please enter IFSC code";
    echo json_encode($result);
    return;
}

if(!array_key_exists("ifscCode",$_POST)){
    $result["status"] = false;
    $result["error"] = "Please enter IFSC code";
    echo json_encode($result);
    return;
}
$ifscCode = $_POST["ifscCode"];

if(strlen($ifscCode) == 0){
    $result["status"] = false;
    $result["error"] = "Enter IFSC code";
    echo json_encode($result);
    return;
}

if(strlen($ifscCode) != 11){
    $result["status"] = false;
    $result["error"] =    "IFSC code should be 11 characters long";
    echo json_encode($result);
    return; 
}

if(!preg_match("/^[A-Z]{1,4}/",$_POST["ifscCode"])){
    $result["status"] = false;
    $result["error"] =  "First four characters should be upper case alphabets";
    echo json_encode($result);
    return; 

}

if(!preg_match("/[0]/",$ifscCode)){
    $result["status"] = false;
    $result["error"] = "The fifth character should be zero";
    echo json_encode($result);
    return; 
    
}

if(!preg_match("/[0-9A-Z]{6}$/",$ifscCode)){
    $result["status"] = false;
    $result["error"] = "The last six character can be numeric and alphabetics";
    echo json_encode($result);
    return; 
    
}

$ifscCodeArray = [

    "SBIN0123456"=>[
        "Bank Name"=>"SBI",
        "Bank Branch"=>"Jubli hills"
    ],
    "SBIN0054321"=>[
        "Bank Name"=>"SBI",
        "Bank Branch"=>"Banjara hills"
    ],
    "SBIN0021543"=>[
        "Bank Name"=>"SBI",
        "Bank Branch"=>"Masabtank"
    ]
];

$result["status"] =true;
$result["error"] ='';
$result["data"] = $ifscCodeArray[$ifscCode];
echo json_encode($result);
return;

?>