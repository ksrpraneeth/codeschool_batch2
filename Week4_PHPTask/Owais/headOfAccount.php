<?php

// For head of account

$result = [
    "status"=>false,
    "error"=>'',
    "data"=>[]

];

if(!array_key_exists("headOfAccount",$_POST) || $_POST["headOfAccount"] == "") {
    $result["status"] = false;
    $result["error"] = "Please select head of account";
    echo json_encode($result);
    return;
}


$headOfAccount = $_POST["headOfAccount"];

$headOfAccountArray =[
    "0853001020002000000NVN" =>["balance"=>"1000000","loc"=>"5000"],
    "8342001170004001000NVN" =>["balance"=>"1008340","loc"=>"4000"],
    "2071011170004320000NVN" =>["balance"=>"14530000","loc"=>"78000"],
    "8342001170004002000NVN" =>["balance"=>"1056400","loc"=>"34000"],
    "2204000030006300303NVN" =>["balance"=>"123465400","loc"=>"5000"]
];

$result["status"] =true;
$result["error"] ='';
$result["data"] = $headOfAccountArray[$headOfAccount];
echo json_encode($result);
return;

?>